<?php

class LoginController extends Controller
{
    public function index(): void
    {
        $mode = isset($_GET['mode']) ? trim((string) $_GET['mode']) : '';
        $dest = URL_BASE . 'inicio';
        if ($mode !== '') {
            $dest .= '?mode=' . rawurlencode($mode);
        }
        header('Location: ' . $dest);
        exit;
    }
}
