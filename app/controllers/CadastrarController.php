<?php

class CadastrarController extends Controller
{
    public function candidato(): void
    {
        $dados = [];
        $this->view('candidato/cadastrar', $dados);
    }
    public function recrutador(): void
    {
        $dados = [];
        $this->view('recrutador/cadastrar', $dados);
    }
}
