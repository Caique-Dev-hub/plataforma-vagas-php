<?php

class Candidato
{
    private static function storagePath()
    {
        // Ajuste esse caminho se necessário
        return __DIR__ . '/../../storage/candidatos.json';
    }

    private static function readAll()
    {
        $path = self::storagePath();
        if (!file_exists($path)) {
            @mkdir(dirname($path), 0777, true);
            file_put_contents($path, json_encode([]));
        }

        $raw = file_get_contents($path);
        $arr = json_decode($raw, true);
        return is_array($arr) ? $arr : [];
    }

    private static function writeAll($arr)
    {
        $path = self::storagePath();
        @mkdir(dirname($path), 0777, true);
        file_put_contents($path, json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }

    public static function all()
    {
        // Formato padrão do front:
        // id, nome, email, telefone, cidade, estado, vagaTitulo, etapa, score, criadoEm
        return self::readAll();
    }

    public static function create($data)
    {
        $items = self::readAll();
        $now = date('c');

        $id = 1;
        if (!empty($items)) {
            $ids = array_map(fn($x) => (int)($x['id'] ?? 0), $items);
            $id = max($ids) + 1;
        }

        $nome = trim((string)($data['nome'] ?? ''));
        if ($nome === '') throw new Exception('Nome é obrigatório.');

        $item = [
            'id' => $id,
            'nome' => $nome,
            'email' => trim((string)($data['email'] ?? '')),
            'telefone' => trim((string)($data['telefone'] ?? '')),
            'cidade' => trim((string)($data['cidade'] ?? '')),
            'estado' => strtoupper(trim((string)($data['estado'] ?? ''))),
            'vagaTitulo' => trim((string)($data['vagaTitulo'] ?? '')),
            'etapa' => strtoupper(trim((string)($data['etapa'] ?? 'NOVO'))),
            'score' => (int)($data['score'] ?? 0),
            'cvUrl' => trim((string)($data['cvUrl'] ?? '')),
            'linkedin' => trim((string)($data['linkedin'] ?? '')),
            'observacoes' => trim((string)($data['observacoes'] ?? '')),
            'criadoEm' => $now,
            'atualizadoEm' => $now,
        ];

        $items[] = $item;
        self::writeAll($items);

        return $item;
    }

    public static function updateById($id, $data)
    {
        $items = self::readAll();
        $idx = -1;

        foreach ($items as $i => $it) {
            if ((int)($it['id'] ?? 0) === (int)$id) {
                $idx = $i;
                break;
            }
        }
        if ($idx < 0) throw new Exception('Candidato não encontrado.');

        $it = $items[$idx];
        $it['nome'] = trim((string)($data['nome'] ?? $it['nome']));
        $it['email'] = trim((string)($data['email'] ?? $it['email']));
        $it['telefone'] = trim((string)($data['telefone'] ?? $it['telefone']));
        $it['cidade'] = trim((string)($data['cidade'] ?? $it['cidade']));
        $it['estado'] = strtoupper(trim((string)($data['estado'] ?? $it['estado'])));
        $it['vagaTitulo'] = trim((string)($data['vagaTitulo'] ?? $it['vagaTitulo']));
        $it['etapa'] = strtoupper(trim((string)($data['etapa'] ?? $it['etapa'])));
        $it['score'] = (int)($data['score'] ?? $it['score']);
        $it['cvUrl'] = trim((string)($data['cvUrl'] ?? $it['cvUrl']));
        $it['linkedin'] = trim((string)($data['linkedin'] ?? $it['linkedin']));
        $it['observacoes'] = trim((string)($data['observacoes'] ?? $it['observacoes']));
        $it['atualizadoEm'] = date('c');

        $items[$idx] = $it;
        self::writeAll($items);

        return $it;
    }

    public static function deleteById($id)
    {
        $items = self::readAll();
        $before = count($items);

        $items = array_values(array_filter($items, fn($x) => (int)($x['id'] ?? 0) !== (int)$id));
        self::writeAll($items);

        return count($items) < $before;
    }
}
