<?php
class ApiController extends Controller
{
    public function candidaturas()
    {
        header('Content-Type: application/json; charset=utf-8');

        $auth = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
        if (!preg_match('/Bearer\s(\S+)/', $auth, $m)) {
            http_response_code(401);
            echo json_encode(['error' => 'Token ausente']);
            return;
        }
        $token = $m[1];

        $raw = file_get_contents('php://input');
        $body = json_decode($raw, true) ?: [];
        $vagaId = (int)(
            $body['vaga_id'] ??
            $body['vagaId'] ??
            $body['idVaga'] ??
            $body['vaga'] ??
            0
        );

        if ($vagaId <= 0) {
            http_response_code(422);
            echo json_encode(['error' => 'vaga_id inválido']);
            return;
        }

        $javaBase = api_base();
        $me = $this->javaGet($javaBase . '/candidato/me', $token);
        if (!$me) {
            $me = $this->javaGet($javaBase . '/candidatos/me', $token);
        }
        if (!$me) {
            $me = $this->javaGet($javaBase . '/me', $token);
        }
        if (!$me) {
            http_response_code(401);
            echo json_encode(['error' => 'Token inválido/expirado']);
            return;
        }

        try {
            $candId = $this->ensureLocalCandidateFromRemote($me);
        } catch (Throwable $e) {
            http_response_code(500);
            echo json_encode([
                'error' => 'Falha ao sincronizar candidato local',
                'detail' => $e->getMessage(),
            ]);
            return;
        }

        $model = new CandidaturaModel();

        if (!$model->vagaExiste($vagaId)) {
            http_response_code(404);
            echo json_encode(['error' => 'Vaga não encontrada']);
            return;
        }

        $res = $model->criar($candId, $vagaId, 'ENVIADA');

        if (!($res['ok'] ?? false)) {
            http_response_code((int)($res['code'] ?? 500));
            echo json_encode(['error' => $res['error'] ?? 'Erro', 'detail' => $res['detail'] ?? null]);
            return;
        }

        echo json_encode([
            'ok' => true,
            'message' => 'Candidatura enviada',
            'data' => $res,
            'candidato_id' => $candId,
            'vaga_id' => $vagaId,
            'synced' => true,
        ]);
    }

    private function ensureLocalCandidateFromRemote(array $me): int
    {
        $pdo = Database::pdo();
        $email = trim((string)($me['email'] ?? ''));
        if ($email === '') {
            throw new RuntimeException('Resposta do backend sem email do candidato.');
        }

        $nome = trim((string)($me['nomeCompleto'] ?? $me['nome_completo'] ?? $me['nome'] ?? ''));
        if ($nome === '') {
            $nome = preg_replace('/@.*$/', '', $email);
            $nome = ucwords(str_replace(['.', '_', '-'], ' ', $nome));
        }

        $genero = strtoupper(trim((string)($me['genero'] ?? 'OUTRO')));
        if (!in_array($genero, ['FEMININO', 'MASCULINO', 'OUTRO'], true)) {
            $genero = 'OUTRO';
        }

        $dataNascimento = trim((string)($me['dataNascimento'] ?? $me['data_nascimento'] ?? '2000-01-01'));
        if ($dataNascimento === '') {
            $dataNascimento = '2000-01-01';
        }

        $telefone = trim((string)($me['telefone'] ?? ''));
        $cidade = trim((string)($me['cidade'] ?? ''));
        $estado = trim((string)($me['estado'] ?? ''));
        $cpf = trim((string)($me['cpf'] ?? ''));
        $video = trim((string)($me['videoApresentacao'] ?? $me['video_apresentacao'] ?? ''));

        $pdo->beginTransaction();
        try {
            $st = $pdo->prepare('SELECT id_usuario, role FROM usuario WHERE email = ? LIMIT 1');
            $st->execute([$email]);
            $user = $st->fetch(PDO::FETCH_ASSOC) ?: null;

            if ($user) {
                $usuarioId = (int)$user['id_usuario'];
                if (strtoupper((string)$user['role']) !== 'CANDIDATO') {
                    $up = $pdo->prepare('UPDATE usuario SET role = ? WHERE id_usuario = ?');
                    $up->execute(['CANDIDATO', $usuarioId]);
                }
            } else {
                $hash = password_hash('bridge-imported', PASSWORD_BCRYPT);
                $ins = $pdo->prepare('INSERT INTO usuario (ativo, created_at, email, role, senha) VALUES (b\'1\', NOW(6), ?, ?, ?)');
                $ins->execute([$email, 'CANDIDATO', $hash]);
                $usuarioId = (int)$pdo->lastInsertId();
            }

            $st = $pdo->prepare('SELECT id_candidato FROM candidato WHERE usuario_id = ? LIMIT 1');
            $st->execute([$usuarioId]);
            $candId = (int)($st->fetchColumn() ?: 0);

            if ($candId > 0) {
                $up = $pdo->prepare('UPDATE candidato SET nome_completo=?, telefone=?, cidade=?, estado=?, cpf=?, genero=?, data_nascimento=?, video_apresentacao=? WHERE id_candidato=?');
                $up->execute([$nome, $telefone ?: null, $cidade ?: null, $estado ?: null, $cpf ?: null, $genero, $dataNascimento, $video ?: null, $candId]);
            } else {
                $ins = $pdo->prepare('INSERT INTO candidato (cidade, cpf, created_at, data_nascimento, estado, genero, nome_completo, telefone, video_apresentacao, usuario_id) VALUES (?, ?, NOW(6), ?, ?, ?, ?, ?, ?, ?)');
                $ins->execute([$cidade ?: null, $cpf ?: null, $dataNascimento, $estado ?: null, $genero, $nome, $telefone ?: null, $video ?: null, $usuarioId]);
                $candId = (int)$pdo->lastInsertId();
            }

            $pdo->commit();
            return $candId;
        } catch (Throwable $e) {
            if ($pdo->inTransaction()) {
                $pdo->rollBack();
            }
            throw $e;
        }
    }

    private function javaGet(string $url, string $token): ?array
    {
        if (!$url) return null;

        if (function_exists('curl_init')) {
            $ch = curl_init($url);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => ["Authorization: Bearer $token"],
                CURLOPT_TIMEOUT => 8,
            ]);
            $res = curl_exec($ch);
            $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            if ($code < 200 || $code >= 300) return null;
            $json = json_decode($res, true);
            return is_array($json) ? $json : null;
        }

        $opts = [
            'http' => [
                'method' => 'GET',
                'header' => "Authorization: Bearer $token\r\nAccept: application/json\r\n",
                'timeout' => 8,
                'ignore_errors' => true,
            ],
        ];
        $ctx = stream_context_create($opts);
        $res = @file_get_contents($url, false, $ctx);
        $headers = $http_response_header ?? [];
        $statusLine = $headers[0] ?? '';
        if (!preg_match('#\s(\d{3})\s#', $statusLine, $m)) return null;
        $code = (int)$m[1];
        if ($code < 200 || $code >= 300) return null;
        $json = json_decode((string)$res, true);
        return is_array($json) ? $json : null;
    }
}
