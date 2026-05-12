<?php
define('METHOD_CRYPTO', 'AES-256-GCM');

$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host   = $_SERVER['HTTP_HOST'] ?? 'localhost';
$script = $_SERVER['SCRIPT_NAME'] ?? '/';
$dir    = rtrim(str_replace('\\', '/', dirname($script)), '/');

define('URL_BASE', rtrim($scheme . '://' . $host . ($dir ? $dir : ''), '/') . '/');

spl_autoload_register(function ($class) {
    $caminhos = [
        "../app/controllers/$class.php",
        "../app/models/$class.php",
        "../app/core/$class.php",
        "../routes/$class.php"
    ];

    foreach ($caminhos as $valor) {
        if (file_exists($valor)) {
            require_once($valor);
        }
    }
});

function env(): void
{
    static $loaded = false;
    if ($loaded) return;

    $envPath = dirname(__DIR__) . '/.env';
    if (!file_exists($envPath)) return;

    $arquivo = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($arquivo as $valor) {
        $valor = trim($valor);
        if ($valor === '' || str_starts_with($valor, '#')) continue;

        $env = explode('=', $valor, 2);
        $_ENV[trim($env[0])] = isset($env[1]) ? trim($env[1]) : '';
    }

    $loaded = true;
}

function api_base(): string
{
    env();
    return rtrim($_ENV['API_BASE'] ?? '', '/');
}

function api_base_json(): string
{
    return json_encode(api_base(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
}

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
