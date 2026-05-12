<?php

class PesquisarController extends Controller{
    public function index(): void{
        $dados = [];
        $this->view('pesquisar', $dados);
    }
}