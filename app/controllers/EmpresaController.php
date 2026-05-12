<?php

class EmpresaController extends Controller{
    public function index(): void{
        $dados = [];
        $this->view('empresa', $dados);
    }
}