<?php

class VagasRecomendadasController
{
    private string $API_BASE;

    public function __construct()
    {
        $this->API_BASE = api_base();
    }

    public function index()
    {
        header('Content-Type: application/json; charset=utf-8');

        $token = $this->getBearerToken();
        if (!$token) {
            http_response_code(401);
            echo json_encode(['error' => 'Sem token (Authorization: Bearer ...)']);
            return;
        }

        $body = file_get_contents("php://input");
        $alerta = json_decode($body, true) ?: [];

        $cargo  = $this->norm($alerta['cargo']  ?? '');
        $cidade = $this->norm($alerta['cidade'] ?? '');
        $uf     = $this->norm($alerta['uf']     ?? '');
        $regiao = $this->norm($alerta['regiao'] ?? '');

        // 1) Busca todas as vagas da API Java
        $vagas = $this->apiGet('/vagas/list', $token);
        if (!is_array($vagas)) $vagas = [];

        // 2) Filtra + calcula match
        $out = [];
        foreach ($vagas as $v) {
            $match = $this->calcMatch($v, $cargo, $cidade, $uf, $regiao);
            if ($match['percent'] >= 40) { // ajuste o corte
                $v['matchPercent'] = $match['percent'];
                $v['matchReasons'] = $match['reasons'];
                $out[] = $v;
            }
        }

        usort($out, fn($a, $b) => ($b['matchPercent'] ?? 0) <=> ($a['matchPercent'] ?? 0));
        $out = array_slice($out, 0, 20);

        echo json_encode([
            'total' => count($out),
            'vagas' => $out
        ]);
    }

    private function getBearerToken(): ?string
    {
        $h = $_SERVER['HTTP_AUTHORIZATION'] ?? $_SERVER['REDIRECT_HTTP_AUTHORIZATION'] ?? '';
        if (preg_match('/Bearer\s+(.+)/i', $h, $m)) return trim($m[1]);
        return null;
    }

    private function apiGet(string $path, string $token)
    {
        $url = rtrim($this->API_BASE, '/') . $path;

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer {$token}",
                "Accept: application/json"
            ],
            CURLOPT_TIMEOUT => 12,
        ]);

        $body = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($code < 200 || $code >= 300) return [];
        return json_decode($body, true) ?: [];
    }

    private function norm(string $s): string
    {
        $s = mb_strtolower(trim($s));
        $s = @iconv('UTF-8', 'ASCII//TRANSLIT', $s) ?: $s;
        $s = preg_replace('/[^a-z0-9\s]/', ' ', $s);
        $s = preg_replace('/\s+/', ' ', $s);
        return trim($s);
    }

    private function contains(string $haystack, string $needle): bool
    {
        if ($needle === '') return true;
        return str_contains($this->norm($haystack), $needle);
    }

    private function calcMatch(array $vaga, string $cargo, string $cidade, string $uf, string $regiao): array
    {
        // Ajuste conforme sua API retorna os campos:
        $titulo  = (string)($vaga['titulo'] ?? $vaga['cargo'] ?? $vaga['nome'] ?? '');
        $desc    = (string)($vaga['descricao'] ?? '');
        $cidV    = $this->norm((string)($vaga['cidade'] ?? ''));
        $ufV     = $this->norm((string)($vaga['estado'] ?? $vaga['uf'] ?? ''));
        $regV    = $this->norm((string)($vaga['regiao'] ?? ''));

        $texto = $titulo . ' ' . $desc;

        $score = 0;
        $reasons = [];

        // Cargo (peso 55)
        if ($cargo && $this->contains($texto, $cargo)) {
            $score += 55;
            $reasons[] = "Cargo bate com alerta";
        }

        // Cidade (peso 30)
        if ($cidade && $cidV === $cidade) {
            $score += 30;
            $reasons[] = "Cidade compatível";
        }

        // UF (peso 10)
        if ($uf && $ufV === $uf) {
            $score += 10;
            $reasons[] = "UF compatível";
        }

        // Região (peso 5)
        if ($regiao && $regV === $regiao) {
            $score += 5;
            $reasons[] = "Região compatível";
        }

        $percent = max(0, min(100, $score));
        return ['percent' => $percent, 'reasons' => $reasons];
    }
}
