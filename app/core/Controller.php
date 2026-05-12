<?php

class Controller
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    // Metodos reutilizaveis
    public function view(string $pag, array $dados = [])
    {
        extract($dados);

        require_once("../app/views/$pag.php");
    }

    protected function hashEncode(string $dados): string
    {
        $key = base64_decode($_ENV['CRYPTO_KEY']);

        $hash = hash_hmac('sha256', $dados, $key, true);

        return $hash;
    }


    public function cryptoEncode(string $data): string
    {
        $method = $_ENV['METHOD']; // AES-256-GCM
        $key    = base64_decode($_ENV['CRYPTO_KEY']);
        $ivLen  = openssl_cipher_iv_length($method);
        $iv     = random_bytes($ivLen);

        $tag = '';

        $encrypted = openssl_encrypt(
            $data,
            $method,
            $key,
            OPENSSL_RAW_DATA,
            $iv,
            $tag
        );

        return base64_encode($iv . $tag . $encrypted);
    }


    public static function descriptografia(string $crypto)
    {
        $method = $_ENV['METHOD']; // AES-256-GCM
        $key    = base64_decode($_ENV['CRYPTO_KEY']);

        $bin = base64_decode($crypto);

        $ivLen = openssl_cipher_iv_length($method);

        // extrair IV, TAG e TEXTO
        $iv   = substr($bin, 0, $ivLen);
        $tag  = substr($bin, $ivLen, 16);
        $text = substr($bin, $ivLen + 16);

        return openssl_decrypt(
            $text,
            $method,
            $key,
            OPENSSL_RAW_DATA,
            $iv,
            $tag
        );
    }

    public static function tratar_url(string $texto): string
    {
        $textoUrl = trim(strtolower($texto));

        $caracter = [
            'á' => 'a',
            'à' => 'a',
            'â' => 'a',
            'ã' => 'a',
            'ä' => 'a',
            'å' => 'a',

            'Á' => 'a',
            'À' => 'a',
            'Â' => 'a',
            'Ã' => 'a',
            'Ä' => 'a',
            'Å' => 'a',

            'é' => 'e',
            'è' => 'e',
            'ê' => 'e',
            'ë' => 'e',

            'É' => 'e',
            'È' => 'e',
            'Ê' => 'e',
            'Ë' => 'e',

            'í' => 'i',
            'ì' => 'i',
            'î' => 'i',
            'ï' => 'i',

            'Í' => 'i',
            'Ì' => 'i',
            'Î' => 'i',
            'Ï' => 'i',

            'ó' => 'o',
            'ò' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'ö' => 'o',

            'Ó' => 'o',
            'Ò' => 'o',
            'Ô' => 'o',
            'Õ' => 'o',
            'Ö' => 'o',

            'ú' => 'u',
            'ù' => 'u',
            'û' => 'u',
            'ü' => 'u',

            'Ú' => 'u',
            'Ù' => 'u',
            'Û' => 'u',
            'Ü' => 'u',

            'ç' => 'c',
            'Ç' => 'c',

            'ñ' => 'n',
            'Ñ' => 'n',
            '+' => ''
        ];

        $textoUrl = str_replace(' ', '-', $textoUrl);

        $textoUrl = strtr($textoUrl, $caracter);

        return $textoUrl;
    }

    public static function tratar_imagem(array $imagem, string $nomeNovo): string|bool
    {
        $nome = pathinfo($imagem['name'], PATHINFO_BASENAME);

        $nome = explode('.', $nome);

        $nomeNovo = strtolower($nomeNovo);

        $nomeNovo = self::tratar_url($nomeNovo);

        $nome[0] = $nomeNovo;

        $nome = implode('.', $nome);

        if (file_exists("upload/$nome")) {
            return false;
        }

        move_uploaded_file($imagem['tmp_name'], "upload/$nome");

        return $nome;
    }
}
