<?php

class CandidatoController extends Controller
{
    public function index()
    {
        // View com layout
        $this->view('candidato/candidato', [
            'pageTitle' => 'Admin Candidatos'
        ]);
    }
    public function perfil()
    {
        // View com layout
        $this->view('candidato/perfil', [
            'pageTitle' => 'Admin Candidatos'
        ]);
    }
    public function list()
    {
        header('Content-Type: application/json; charset=utf-8');

        try {
            $items = Candidato::all(); // retorna array
            echo json_encode([
                'ok' => true,
                'data' => $items
            ]);
        } catch (Throwable $e) {
            http_response_code(500);
            echo json_encode([
                'ok' => false,
                'message' => 'Erro ao listar candidatos.',
                'detail' => $e->getMessage()
            ]);
        }
    }

    public function create()
    {
        header('Content-Type: application/json; charset=utf-8');

        try {
            $body = $this->readJsonBody();
            $new = Candidato::create($body);

            echo json_encode([
                'ok' => true,
                'data' => $new
            ]);
        } catch (Throwable $e) {
            http_response_code(500);
            echo json_encode([
                'ok' => false,
                'message' => 'Erro ao criar candidato.',
                'detail' => $e->getMessage()
            ]);
        }
    }

    public function update($id)
    {
        header('Content-Type: application/json; charset=utf-8');

        try {
            $body = $this->readJsonBody();
            $updated = Candidato::updateById((int)$id, $body);

            echo json_encode([
                'ok' => true,
                'data' => $updated
            ]);
        } catch (Throwable $e) {
            http_response_code(500);
            echo json_encode([
                'ok' => false,
                'message' => 'Erro ao atualizar candidato.',
                'detail' => $e->getMessage()
            ]);
        }
    }

    public function delete($id)
    {
        header('Content-Type: application/json; charset=utf-8');

        try {
            $ok = Candidato::deleteById((int)$id);
            echo json_encode([
                'ok' => true,
                'deleted' => $ok
            ]);
        } catch (Throwable $e) {
            http_response_code(500);
            echo json_encode([
                'ok' => false,
                'message' => 'Erro ao excluir candidato.',
                'detail' => $e->getMessage()
            ]);
        }
    }

    private function readJsonBody()
    {
        $raw = file_get_contents('php://input');
        $data = json_decode($raw, true);
        if (!is_array($data)) $data = [];
        return $data;
    }
}
