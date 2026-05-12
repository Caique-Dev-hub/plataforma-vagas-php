<?php

class RedefinirController extends Controller{
    public function index(): void{
        $dados = [];
        $this->view('redefinir', $dados);
    }
}