<?php

class ResetController extends Controller{
    public function index(): void{
        $dados = [];
        $this->view('reset', $dados);
    }
}