<?php
require_once __DIR__ . '/../../config/config.php';
env();

header('Content-Type: application/json; charset=utf-8');
session_start();

$API_BASE = api_base();

// Pega token (ajuste se você salva em outro lugar)
$token = $_SESSION['token'] ?? ($_COOKIE['token'] ?? '');

if (!$token) {
    http_response_code(401);
    echo json_encode(["ok" => false, "message" => "Sem token"]);
    exit;
}

function api_get($url, $token)
{
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer $token",
            "Accept: application/json"
        ],
    ]);
    $raw = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($code < 200 || $code >= 300) return null;
    return json_decode($raw, true);
}

/** Normaliza texto p/ comparar */
function norm($s)
{
    $s = strtolower((string)$s);
    $s = iconv('UTF-8', 'ASCII//TRANSLIT', $s);
    $s = preg_replace('/[^a-z0-9\s]/', ' ', $s);
    $s = preg_replace('/\s+/', ' ', $s);
    return trim($s);
}

/** Extrai palavras “boas” do perfil */
function extrair_keywords_perfil($perfil)
{
    $pool = [];

    // tenta pegar campos comuns + arrays
    $pool[] = $perfil['objetivo'] ?? '';
    $pool[] = $perfil['cidade'] ?? '';
    $pool[] = $perfil['estado'] ?? '';

    // experiências e formações (se vierem como array)
    $pool[] = json_encode($perfil['experiencias'] ?? []);
    $pool[] = json_encode($perfil['formacoes'] ?? []);
    $pool[] = json_encode($perfil['habilidades'] ?? []);
    $pool[] = json_encode($perfil['competencias'] ?? []);

    $txt = norm(implode(' ', $pool));
    $palavras = array_filter(explode(' ', $txt), fn($w) => strlen($w) >= 4);

    // remove duplicadas
    $palavras = array_values(array_unique($palavras));
    return $palavras;
}

/** Monta texto “buscável” da vaga */
function texto_vaga($v)
{
    $pool = [];
    $pool[] = $v['titulo'] ?? ($v['nome'] ?? '');
    $pool[] = $v['descricao'] ?? '';
    $pool[] = $v['empresa'] ?? '';
    $pool[] = $v['modeloTrabalho'] ?? ($v['modalidade'] ?? ''); // remoto/presencial/hibrido
    $pool[] = json_encode($v['tags'] ?? []);
    $pool[] = json_encode($v['requisitos'] ?? []);
    return norm(implode(' ', $pool));
}

/** Score simples: quantas keywords do perfil aparecem na vaga */
function score_match($keywords, $vagaText)
{
    if (!$keywords) return 0;
    $hits = 0;
    foreach ($keywords as $w) {
        if (strpos($vagaText, $w) !== false) $hits++;
    }
    // transforma em % (ajuste fino)
    $percent = (int)min(100, round(($hits / max(8, count($keywords))) * 100));
    return $percent;
}

// 1) Perfil
$perfil = api_get("$API_BASE/candidato/me", $token);

// 2) Vagas
$vagas = api_get("$API_BASE/vagas/list", $token);

if (!$perfil || !$vagas || !is_array($vagas)) {
    echo json_encode(["ok" => true, "items" => []], JSON_UNESCAPED_UNICODE);
    exit;
}

$keywords = extrair_keywords_perfil($perfil);

// 3) rankeia e filtra
$out = [];
foreach ($vagas as $v) {
    $t = texto_vaga($v);
    $score = score_match($keywords, $t);

    // só recomenda acima de X
    if ($score < 35) continue;

    $v['score'] = $score;
    $out[] = $v;
}

// 4) ordena maior score primeiro
usort($out, fn($a, $b) => ($b['score'] ?? 0) <=> ($a['score'] ?? 0));

// top 8
$out = array_slice($out, 0, 8);

echo json_encode(["ok" => true, "items" => $out], JSON_UNESCAPED_UNICODE);
