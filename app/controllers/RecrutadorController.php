<?php

class RecrutadorController extends Controller
{

    private function json($data, int $status = 200): void
    {
        http_response_code($status);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
    }


    private function ensureSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
    }


    private function requireRecrutadorId(): int
    {
        $this->ensureSession();
        $rid = (int)($_SESSION['recrutador_id'] ?? 0);
        if (!$rid) $this->json(['message' => 'Não autorizado. Faça login novamente.'], 401);
        return $rid;
    }


    private function decodeJwtPayload(string $jwt): ?array
    {
        try {
            $parts = explode('.', $jwt);
            if (count($parts) < 2) return null;
            $p = $parts[1];

            // base64url -> base64
            $p = str_replace(['-', '_'], ['+', '/'], $p);
            $pad = strlen($p) % 4;
            if ($pad) $p .= str_repeat('=', 4 - $pad);

            $json = base64_decode($p);
            if (!$json) return null;

            $arr = json_decode($json, true);
            return is_array($arr) ? $arr : null;
        } catch (\Throwable $e) {
            return null;
        }
    }

    public function index()
    {
        // Aqui você renderiza o dashboard (se já existir)
        // Ajuste o caminho conforme seu projeto:
        // $this->view('recrutador/recrutador'); OU $this->view('recrutador/index');
        $this->view('recrutador/recrutador');
    }

    // GET /recrutador/perfil/perfil
    public function perfil()
    {
        // Renderiza a página do perfil/área (sua lista de vagas etc)
        $this->view('recrutador/perfil');
        // se seu arquivo é views/recrutador/perfil.php -> ok.
        // se for views/recrutador/perfil/perfil.php -> use: $this->view('recrutador/perfil/perfil');
    }


    public function recrutador()
    {
        // Ex: views/recrutador/candidatos.php
        $this->view('recrutador/recrutador');
    }

    private function apiBase(): string
    {
        if (function_exists('api_base')) {
            $base = trim((string) api_base());
            if ($base !== '') {
                return rtrim($base, '/');
            }
        }
        return 'http://localhost:8080';
    }

    private function fetchRemoteEmpresa(string $token): ?array
    {
        $url = $this->apiBase() . '/empresa/me';
        $raw = null;
        $code = 0;

        if (function_exists('curl_init')) {
            $ch = curl_init($url);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_TIMEOUT => 15,
                CURLOPT_HTTPHEADER => [
                    'Accept: application/json',
                    'Authorization: Bearer ' . $token,
                ],
            ]);

            $raw = curl_exec($ch);
            $code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
        } else {
            $context = stream_context_create([
                'http' => [
                    'method' => 'GET',
                    'timeout' => 15,
                    'ignore_errors' => true,
                    'header' => "Accept: application/json
Authorization: Bearer {$token}
",
                ],
            ]);
            $raw = @file_get_contents($url, false, $context);
            if (isset($http_response_header) && is_array($http_response_header)) {
                foreach ($http_response_header as $line) {
                    if (preg_match('#^HTTP/\S+\s+(\d{3})#', $line, $m)) {
                        $code = (int) $m[1];
                        break;
                    }
                }
            }
        }

        if ($code < 200 || $code >= 300 || !$raw) {
            return null;
        }

        $data = json_decode($raw, true);
        return is_array($data) ? $data : null;
    }

    private function findLocalRecrutadorId(PDO $pdo, int $usuarioId, string $email): int
    {
        $queries = [
            [
                "SELECT id_recrutador FROM recrutador WHERE usuario_id = :uid LIMIT 1",
                [':uid' => $usuarioId],
            ],
            [
                "SELECT id_recrutador FROM recrutador WHERE email_corporativo = :email LIMIT 1",
                [':email' => $email],
            ],
            [
                "SELECT r.id_recrutador
                 FROM recrutador r
                 INNER JOIN usuario u ON u.id_usuario = r.usuario_id
                 WHERE u.email = :email
                 LIMIT 1",
                [':email' => $email],
            ],
        ];

        foreach ($queries as $item) {
            $stmt = $pdo->prepare($item[0]);
            $stmt->execute($item[1]);
            $id = (int) ($stmt->fetchColumn() ?: 0);
            if ($id > 0) {
                return $id;
            }
        }

        return 0;
    }

    private function findOrCreateLocalUsuario(PDO $pdo, int $usuarioId, string $email): int
    {
        if ($usuarioId > 0) {
            $st = $pdo->prepare("SELECT id_usuario FROM usuario WHERE id_usuario = :id LIMIT 1");
            $st->execute([':id' => $usuarioId]);
            $found = (int) ($st->fetchColumn() ?: 0);
            if ($found > 0) {
                return $found;
            }
        }

        $st = $pdo->prepare("SELECT id_usuario FROM usuario WHERE email = :email LIMIT 1");
        $st->execute([':email' => $email]);
        $found = (int) ($st->fetchColumn() ?: 0);
        if ($found > 0) {
            return $found;
        }

        $hash = password_hash('bridge-imported', PASSWORD_BCRYPT);
        $ins = $pdo->prepare("INSERT INTO usuario (ativo, created_at, email, role, senha) VALUES (b'1', NOW(6), :email, 'RECRUTADOR', :senha)");
        $ins->execute([
            ':email' => $email,
            ':senha' => $hash,
        ]);

        return (int) $pdo->lastInsertId();
    }

    private function findOrCreateLocalEmpresa(PDO $pdo, ?array $remoteEmpresa): int
    {
        if (is_array($remoteEmpresa)) {
            $cnpj = trim((string) ($remoteEmpresa['cnpj'] ?? ''));
            $nome = trim((string) ($remoteEmpresa['nomeEmpresa'] ?? ''));

            if ($cnpj !== '') {
                $st = $pdo->prepare("SELECT id_empresa FROM empresa WHERE cnpj = :cnpj LIMIT 1");
                $st->execute([':cnpj' => $cnpj]);
                $id = (int) ($st->fetchColumn() ?: 0);
                if ($id > 0) {
                    return $id;
                }
            }

            if ($nome !== '') {
                $st = $pdo->prepare("SELECT id_empresa FROM empresa WHERE nome_empresa = :nome LIMIT 1");
                $st->execute([':nome' => $nome]);
                $id = (int) ($st->fetchColumn() ?: 0);
                if ($id > 0) {
                    return $id;
                }
            }

            if ($nome !== '') {
                $ins = $pdo->prepare("INSERT INTO empresa (cnpj, created_at, nome_empresa, possui_filiais, ramo) VALUES (:cnpj, NOW(6), :nome, :filiais, :ramo)");
                $ins->execute([
                    ':cnpj' => $cnpj !== '' ? $cnpj : null,
                    ':nome' => $nome,
                    ':filiais' => !empty($remoteEmpresa['possuiFiliais']) ? 1 : 0,
                    ':ramo' => trim((string) ($remoteEmpresa['ramo'] ?? 'OUTRO')) ?: 'OUTRO',
                ]);
                return (int) $pdo->lastInsertId();
            }
        }

        $st = $pdo->query("SELECT id_empresa FROM empresa ORDER BY id_empresa ASC LIMIT 1");
        $id = (int) ($st->fetchColumn() ?: 0);
        if ($id > 0) {
            return $id;
        }

        $ins = $pdo->prepare("INSERT INTO empresa (cnpj, created_at, nome_empresa, possui_filiais, ramo) VALUES (NULL, NOW(6), 'Empresa JobHub', b'0', 'OUTRO')");
        $ins->execute();
        return (int) $pdo->lastInsertId();
    }

    private function createLocalRecrutador(PDO $pdo, int $usuarioId, string $email, ?array $remoteEmpresa): int
    {
        $empresaId = $this->findOrCreateLocalEmpresa($pdo, $remoteEmpresa);

        $nome = 'Recrutador';
        $telefone = '';

        if (is_array($remoteEmpresa) && !empty($remoteEmpresa['recrutadores']) && is_array($remoteEmpresa['recrutadores'])) {
            foreach ($remoteEmpresa['recrutadores'] as $item) {
                if (!is_array($item)) {
                    continue;
                }
                $mail = trim((string) ($item['emailCorporativo'] ?? ''));
                if ($mail !== '' && strcasecmp($mail, $email) === 0) {
                    $nome = trim((string) ($item['nome'] ?? 'Recrutador')) ?: 'Recrutador';
                    $telefone = trim((string) ($item['telefone'] ?? ''));
                    break;
                }
            }
        }

        $ins = $pdo->prepare("INSERT INTO recrutador (created_at, email_corporativo, nome, telefone, empresa_id, usuario_id) VALUES (NOW(6), :email, :nome, :telefone, :empresa_id, :usuario_id)");
        $ins->execute([
            ':email' => $email,
            ':nome' => $nome,
            ':telefone' => $telefone,
            ':empresa_id' => $empresaId,
            ':usuario_id' => $usuarioId,
        ]);

        return (int) $pdo->lastInsertId();
    }

    public function bridge()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        header("Content-Type: application/json; charset=utf-8");

        $raw  = file_get_contents("php://input");
        $body = json_decode($raw, true);
        $token = $body["token"] ?? "";

        if (!$token) {
            http_response_code(400);
            echo json_encode(["ok" => false, "message" => "Token não enviado."]);
            return;
        }

        $parts = explode(".", $token);
        if (count($parts) < 2) {
            http_response_code(400);
            echo json_encode(["ok" => false, "message" => "Token inválido."]);
            return;
        }

        $payloadB64 = $parts[1];
        $payloadB64 = strtr($payloadB64, "-_", "+/");
        $payloadB64 .= str_repeat("=", (4 - strlen($payloadB64) % 4) % 4);

        $payloadJson = base64_decode($payloadB64);
        $payload = json_decode($payloadJson ?: "", true);

        if (!is_array($payload)) {
            http_response_code(400);
            echo json_encode(["ok" => false, "message" => "Não consegui ler o payload do token."]);
            return;
        }

        $roleRaw = '';
        if (!empty($payload['role'])) {
            $roleRaw = (string) $payload['role'];
        } elseif (!empty($payload['roles'])) {
            $roleRaw = is_array($payload['roles']) ? implode(',', $payload['roles']) : (string) $payload['roles'];
        } elseif (!empty($payload['authorities'])) {
            $roleRaw = is_array($payload['authorities']) ? implode(',', $payload['authorities']) : (string) $payload['authorities'];
        }

        $roleUpper = strtoupper($roleRaw);
        if (strpos($roleUpper, 'RECRUTADOR') === false && strpos($roleUpper, 'EMPRESA') === false) {
            http_response_code(403);
            echo json_encode(["ok" => false, "message" => "Token não é de RECRUTADOR/EMPRESA.", 'role' => $roleRaw]);
            return;
        }

        $usuarioId = (int) ($payload['idUsuario'] ?? $payload['usuarioId'] ?? $payload['id'] ?? 0);
        $email = trim((string) ($payload['sub'] ?? $payload['email'] ?? ''));

        if ($email === '') {
            http_response_code(401);
            echo json_encode(["ok" => false, "message" => "Não encontrei e-mail no token."]);
            return;
        }

        $remoteEmpresa = $this->fetchRemoteEmpresa($token);

        try {
            $pdo = Database::pdo();
            $pdo->beginTransaction();

            $recrutadorId = $this->findLocalRecrutadorId($pdo, $usuarioId, $email);

            if ($recrutadorId <= 0) {
                $localUsuarioId = $this->findOrCreateLocalUsuario($pdo, $usuarioId, $email);
                $recrutadorId = $this->findLocalRecrutadorId($pdo, $localUsuarioId, $email);
                if ($recrutadorId <= 0) {
                    $recrutadorId = $this->createLocalRecrutador($pdo, $localUsuarioId, $email, $remoteEmpresa);
                }
            }

            $pdo->commit();
        } catch (\Throwable $e) {
            if (isset($pdo) && $pdo->inTransaction()) {
                $pdo->rollBack();
            }
            http_response_code(500);
            echo json_encode([
                'ok' => false,
                'message' => 'Falha ao sincronizar recrutador local.',
                'detail' => $e->getMessage(),
                'email' => $email,
                'usuarioId' => $usuarioId,
            ]);
            return;
        }

        if ($recrutadorId <= 0) {
            http_response_code(403);
            echo json_encode([
                'ok' => false,
                'message' => 'Usuário não está cadastrado como recrutador.',
                'usuarioId' => $usuarioId,
                'email' => $email,
                'role' => 'RECRUTADOR'
            ]);
            return;
        }

        $_SESSION['recrutador_id'] = $recrutadorId;
        $_SESSION['recrutador_role'] = 'RECRUTADOR';
        $_SESSION['recrutador_email'] = $email;

        echo json_encode([
            'ok' => true,
            'recrutadorId' => $recrutadorId,
            'email' => $email,
            'role' => 'RECRUTADOR',
            'usuarioId' => $usuarioId,
            'synced' => true,
        ]);
        return;
    }


    public function candidatos()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        $recrutadorId = (int)($_SESSION["recrutador_id"] ?? 0);

        if ($recrutadorId <= 0) {
            return $this->json(["message" => "Não autenticado. Rode o bridge() primeiro."], 401);
        }

        try {
            $model = new CandidaturaModel();
            $items = $model->listarParaRecrutador($recrutadorId, [
                "vagaId" => $_GET["vagaId"] ?? "",
                "status" => $_GET["status"] ?? "",
                "q"      => $_GET["q"] ?? ""
            ]);

            return $this->json(["items" => $items]);
        } catch (\Throwable $e) {
            return $this->json([
                "message" => "Erro interno ao listar candidatos.",
                "detail"  => $e->getMessage(),
            ], 500);
        }
    }


    // GET /recrutador/candidatoDetalhe?candidatoId=123&vagaId=7(opcional)
    public function candidatoDetalhe()
    {
        $recrutadorId = $this->requireRecrutadorId();

        $candidatoId = (int)($_GET['candidatoId'] ?? 0);
        $vagaId = (int)($_GET['vagaId'] ?? 0);

        if ($candidatoId <= 0) {
            $this->json(['message' => 'candidatoId inválido.'], 400);
        }

        $model = new CandidaturaModel();
        $data = $model->detalheCandidatoParaRecrutador($recrutadorId, $candidatoId, $vagaId);

        if (!$data) {
            $this->json(['message' => 'Candidato não encontrado ou não pertence às suas vagas.'], 404);
        }

        $this->json($data, 200);
    }



    public function atualizarStatusCandidatos()
    {
        $recrutadorId = $this->requireRecrutadorId();

        $raw = file_get_contents('php://input');
        $body = json_decode($raw, true) ?: [];

        $origem = strtolower((string)($body['origem'] ?? ''));
        $idRef  = (int)($body['id_ref'] ?? 0);
        $status = strtoupper((string)($body['status'] ?? ''));

        if (!$origem || !$idRef || !$status) $this->json(['ok' => false, 'message' => 'Dados inválidos.'], 400);

        if ($origem !== 'candidaturas') {
            $this->json([
                'ok' => false,
                'message' => 'Este Kanban altera apenas candidaturas confirmadas. (origem=candidaturas)'
            ], 400);
        }

        $allowed = ['ENVIADA', 'EM_ANALISE', 'ENTREVISTA', 'APROVADO', 'REPROVADO'];
        if (!in_array($status, $allowed, true)) {
            $this->json(['ok' => false, 'message' => 'Status inválido.'], 400);
        }

        $model = new CandidaturaModel();

        $affected = (int)$model->atualizarStatusParaRecrutador($recrutadorId, $origem, $idRef, $status);

        if ($affected <= 0) {
            $this->json([
                'ok' => false,
                'message' => 'Nada foi atualizado (ID/origem inválido OU vaga não pertence ao recrutador).',
                'debug' => compact('recrutadorId', 'origem', 'idRef', 'status')
            ], 404);
        }

        $this->json(['ok' => true, 'affected' => $affected], 200);
    }


    public function logout()
    {
        $this->ensureSession();
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        session_destroy();

        // Redireciona pra home (ajuste URL_BASE conforme seu projeto)
        header("Location: " . URL_BASE);
        exit;
    }
}
