<?php

class VagaController extends Controller
{
    public function index($id = null): void
    {
        $id = (int)($id ?? ($_GET['id'] ?? 0));
        if ($id > 0) {
            header('Location: ' . URL_BASE . 'pesquisar?id=' . $id . '&openVaga=' . $id);
            exit;
        }
        header('Location: ' . URL_BASE . 'pesquisar');
        exit;
    }
}
