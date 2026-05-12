<?php

class JwtUtil
{
    private static function b64url_decode(string $data): string
    {
        $remainder = strlen($data) % 4;
        if ($remainder) $data .= str_repeat('=', 4 - $remainder);
        $data = strtr($data, '-_', '+/');
        return base64_decode($data) ?: '';
    }

    public static function decodePayload(string $jwt): ?array
    {
        $parts = explode('.', $jwt);
        if (count($parts) < 2) return null;

        $payloadJson = self::b64url_decode($parts[1]);
        if (!$payloadJson) return null;

        $payload = json_decode($payloadJson, true);
        return is_array($payload) ? $payload : null;
    }
    public static function requireRecrutador(): array
    {
        if (session_status() !== PHP_SESSION_ACTIVE) session_start();

        $rec = $_SESSION['recrutador'] ?? null;
        if (!$rec) {
            http_response_code(401);
            header("Content-Type: application/json; charset=utf-8");
            echo json_encode(["error" => "Não autorizado (sem sessão de recrutador)."]);
            exit;
        }
        return $rec;
    }
}
