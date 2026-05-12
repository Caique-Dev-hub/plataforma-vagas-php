<?php

class InicioController extends Controller{
    public function index(): void{
        $dados = [];
        $this->view('inicio', $dados);
    }
}