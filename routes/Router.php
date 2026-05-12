<?php

class Router
{
    public static function url(): void
    {
        $rota = trim($_GET['url'] ?? '', '/');

        if ($rota === 'recrutador/candidatos/atualizar-status') {
            self::dispatch('RecrutadorController', 'atualizarStatusCandidatos', []);
            return;
        }

        if (strpos($rota, 'api/') === 0) {
            $resto = substr($rota, 4);
            $partes = array_values(array_filter(explode('/', $resto)));
            $controller = 'ApiController';
            $method = $partes[0] ?? 'index';
            $param = array_slice($partes, 1);
            header('Content-Type: application/json; charset=utf-8');
            self::dispatch($controller, $method, $param, true);
            return;
        }

        if ($rota === '') {
            header('Location: ' . URL_BASE . 'inicio');
            exit;
        }

        $aliases = [
            'login' => ['LoginController', 'index', []],
            'perfil' => ['PerfilController', 'index', []],
            'vaga' => ['VagaController', 'index', []],
        ];

        if (isset($aliases[$rota])) {
            [$controller, $method, $params] = $aliases[$rota];
            self::dispatch($controller, $method, $params);
            return;
        }

        if (preg_match('#^vaga/(\d+)$#', $rota, $m)) {
            self::dispatch('VagaController', 'index', [(int)$m[1]]);
            return;
        }

        $url = array_values(array_filter(explode('/', $rota), 'strlen'));
        $controller = ucfirst($url[0] ?? 'inicio') . 'Controller';
        $method = $url[1] ?? 'index';
        $param = array_slice($url, 2);

        self::dispatch($controller, $method, $param);
    }

    private static function dispatch(string $controller, string $method, array $params = [], bool $json404 = false): void
    {
        if (!class_exists($controller) || !method_exists($controller, $method)) {
            if ($json404) {
                http_response_code(404);
                echo json_encode(['error' => 'Rota não encontrada', 'controller' => $controller, 'method' => $method]);
            } else {
                header('Location: ' . URL_BASE . 'inicio');
            }
            exit;
        }

        call_user_func_array([new $controller(), $method], $params);
    }
}
