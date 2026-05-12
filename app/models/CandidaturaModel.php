<?php

class CandidaturaModel
{
    private PDO $pdo;

    public function __construct(?PDO $pdo = null)
    {
        $this->pdo = $pdo ?: Database::pdo();
    }
    public function listarParaRecrutador(int $recrutadorId, array $filtros = []): array
    {
        $vagaId = trim((string)($filtros['vagaId'] ?? ''));
        $status = strtoupper(trim((string)($filtros['status'] ?? '')));
        $q      = trim((string)($filtros['q'] ?? ''));

        $params = [
            ':rid1' => $recrutadorId,
            ':rid2' => $recrutadorId,
        ];

        // candidaturas (confirmadas)
        $sql1 = "
        SELECT
            'candidaturas' AS origem,
            c.id_candidatura AS id_ref,
            c.vaga_id,
            v.cargo,
            c.status,
            c.created_at,
            u.email,
            cand.id_candidato AS candidato_id,
            cand.nome_completo,
            cand.telefone,
            cand.cidade,
            cand.estado
        FROM candidaturas c
        INNER JOIN vaga v         ON v.id_vaga = c.vaga_id
        INNER JOIN candidato cand ON cand.id_candidato = c.candidato_id
        INNER JOIN usuario u      ON u.id_usuario = cand.usuario_id
        WHERE v.recrutador_id = :rid1
    ";

        // pre_candidaturas
        $sql2 = "
        SELECT
            'pre_candidaturas' AS origem,
            pc.id_pre_candidatura AS id_ref,
            pc.vaga_id,
            v.cargo,
            COALESCE(NULLIF(pc.status,''), 'INICIADA') AS status,
            pc.created_at,
            pc.email AS email,
            NULL AS candidato_id,
            NULL AS nome_completo,
            NULL AS telefone,
            NULL AS cidade,
            NULL AS estado
        FROM pre_candidaturas pc
        INNER JOIN vaga v ON v.id_vaga = pc.vaga_id
        WHERE v.recrutador_id = :rid2
          AND COALESCE(NULLIF(pc.status,''), 'INICIADA') IN ('INICIADA','EMAIL_CONFIRMADO')
    ";

        if ($vagaId !== '') {
            $sql1 .= " AND c.vaga_id = :vagaId1";
            $sql2 .= " AND pc.vaga_id = :vagaId2";
            $params[':vagaId1'] = (int)$vagaId;
            $params[':vagaId2'] = (int)$vagaId;
        }

        if ($status !== '' && $status !== 'TODOS') {
            $sql1 .= " AND c.status = :status1";
            $sql2 .= " AND COALESCE(NULLIF(pc.status,''), 'INICIADA') = :status2";
            $params[':status1'] = $status;
            $params[':status2'] = $status;
        }

        if ($q !== '') {
            $sql1 .= " AND (
            cand.nome_completo LIKE :q1
            OR u.email LIKE :q2
            OR cand.cidade LIKE :q3
            OR cand.estado LIKE :q4
        )";
            $sql2 .= " AND pc.email LIKE :q5";

            $like = "%{$q}%";
            $params[':q1'] = $like;
            $params[':q2'] = $like;
            $params[':q3'] = $like;
            $params[':q4'] = $like;
            $params[':q5'] = $like;
        }

        $sql = "
        SELECT *
        FROM (
            {$sql1}
            UNION ALL
            {$sql2}
        ) x
        ORDER BY x.created_at DESC, x.id_ref DESC
    ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }
    public function detalheCandidatoParaRecrutador(int $recrutadorId, int $candidatoId, int $vagaId = 0): ?array
    {
        // ✅ AUTORIZAÇÃO: candidato só aparece se tiver candidatura em vaga do recrutador
        $existsSql = "
        SELECT 1
        FROM candidaturas ca
        JOIN vaga v ON v.id_vaga = ca.vaga_id
        WHERE ca.candidato_id = :cid
          AND v.recrutador_id = :rid
        " . ($vagaId > 0 ? " AND v.id_vaga = :vagaId" : "") . "
        LIMIT 1
    ";

        $st = $this->pdo->prepare($existsSql);
        $params = [':cid' => $candidatoId, ':rid' => $recrutadorId];
        if ($vagaId > 0) $params[':vagaId'] = $vagaId;
        $st->execute($params);

        if (!$st->fetchColumn()) return null;

        // ✅ DADOS DO CANDIDATO + EMAIL (sem expor senha)
        $candSql = "
        SELECT
            c.id_candidato,
            c.nome_completo,
            c.cpf,
            c.telefone,
            c.genero,
            c.data_nascimento,
            c.cidade,
            c.estado,
            c.created_at,
            c.video_apresentacao,
            u.email
        FROM candidato c
        JOIN usuario u ON u.id_usuario = c.usuario_id
        WHERE c.id_candidato = :cid
        LIMIT 1
    ";
        $st = $this->pdo->prepare($candSql);
        $st->execute([':cid' => $candidatoId]);
        $candidato = $st->fetch(PDO::FETCH_ASSOC) ?: null;

        if (!$candidato) return null;

        // ✅ EXPERIÊNCIAS
        $expSql = "
        SELECT
            id_experiencia, empresa, cargo, descricao,
            data_inicio, data_fim, atual
        FROM experiencias
        WHERE candidato_id = :cid
        ORDER BY atual DESC, data_inicio DESC, id_experiencia DESC
    ";
        $st = $this->pdo->prepare($expSql);
        $st->execute([':cid' => $candidatoId]);
        $experiencias = $st->fetchAll(PDO::FETCH_ASSOC) ?: [];

        // ✅ FORMAÇÕES
        $forSql = "
        SELECT
            id_formacao, instituicao, curso, nivel, status,
            data_inicio, data_fim
        FROM formacoes
        WHERE candidato_id = :cid
        ORDER BY data_inicio DESC, id_formacao DESC
    ";
        $st = $this->pdo->prepare($forSql);
        $st->execute([':cid' => $candidatoId]);
        $formacoes = $st->fetchAll(PDO::FETCH_ASSOC) ?: [];

        return [
            'candidato' => $candidato,
            'experiencias' => $experiencias,
            'formacoes' => $formacoes
        ];
    }

    /**
     * Atualiza status (candidaturas ou pre_candidaturas),
     * mas SOMENTE se a vaga for do recrutador logado.
     */
    public function atualizarStatusPorUsuarioId(int $usuarioId, string $origem, int $idRef, string $status): int
    {
        $origem = strtolower(trim($origem));
        $status = strtoupper(trim($status));

        if (!in_array($origem, ['candidaturas', 'pre_candidaturas'], true)) {
            return 0;
        }

        if ($origem === 'candidaturas') {
            $sql = "
            UPDATE candidaturas c
            INNER JOIN vaga v ON v.id_vaga = c.vaga_id
            INNER JOIN recrutador r ON r.id_recrutador = v.recrutador_id
            SET c.status = :status
            WHERE c.id_candidatura = :idRef
              AND r.usuario_id = :uid
        ";
        } else {
            $sql = "
            UPDATE pre_candidaturas pc
            INNER JOIN vaga v ON v.id_vaga = pc.vaga_id
            INNER JOIN recrutador r ON r.id_recrutador = v.recrutador_id
            SET pc.status = :status
            WHERE pc.id_pre_candidatura = :idRef
              AND r.usuario_id = :uid
        ";
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':status' => $status,
            ':idRef'  => $idRef,
            ':uid'    => $usuarioId
        ]);

        return (int)$stmt->rowCount();
    }
    /**
     * Atualiza status (candidaturas ou pre_candidaturas),
     * mas SOMENTE se a vaga for do recrutador logado (recrutador_id).
     */
    public function atualizarStatusParaRecrutador(int $recrutadorId, string $origem, int $idRef, string $status): int
    {
        $origem = strtolower(trim($origem));
        $status = strtoupper(trim($status));

        if (!in_array($origem, ['candidaturas', 'pre_candidaturas'], true)) {
            return 0;
        }

        if ($origem === 'candidaturas') {
            $sql = "
            UPDATE candidaturas c
            INNER JOIN vaga v ON v.id_vaga = c.vaga_id
            SET c.status = :status
            WHERE c.id_candidatura = :idRef
              AND v.recrutador_id = :rid
        ";
        } else {
            $sql = "
            UPDATE pre_candidaturas pc
            INNER JOIN vaga v ON v.id_vaga = pc.vaga_id
            SET pc.status = :status
            WHERE pc.id_pre_candidatura = :idRef
              AND v.recrutador_id = :rid
        ";
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':status' => $status,
            ':idRef'  => $idRef,
            ':rid'    => $recrutadorId
        ]);

        return (int)$stmt->rowCount();
    }



    public function vagaExiste(int $vagaId): bool
    {
        $st = $this->pdo->prepare("SELECT 1 FROM vaga WHERE id_vaga = ? LIMIT 1");
        $st->execute([$vagaId]);
        return (bool) $st->fetchColumn();
    }

    public function jaCandidatou(int $candidatoId, int $vagaId): bool
    {
        $st = $this->pdo->prepare("
            SELECT 1
            FROM candidaturas
            WHERE candidato_id = ? AND vaga_id = ?
            LIMIT 1
        ");
        $st->execute([$candidatoId, $vagaId]);
        return (bool) $st->fetchColumn();
    }

    public function criar(int $candidatoId, int $vagaId, string $status = 'ENVIADA'): array
    {
        $sql = "INSERT INTO candidaturas (candidato_id, vaga_id, status) VALUES (?, ?, ?)";
        $st = $this->pdo->prepare($sql);

        try {
            $st->execute([$candidatoId, $vagaId, $status]);
            $id = (int)$this->pdo->lastInsertId();

            return [
                'ok' => true,
                'id_candidatura' => $id,
                'status' => $status
            ];
        } catch (PDOException $e) {
            // Duplicate key (uk_candidato_vaga)
            if ((int)($e->errorInfo[1] ?? 0) === 1062) {
                return [
                    'ok' => false,
                    'code' => 409,
                    'error' => 'Você já se candidatou nesta vaga'
                ];
            }

            return [
                'ok' => false,
                'code' => 500,
                'error' => 'Erro ao candidatar',
                'detail' => $e->getMessage()
            ];
        }
    }
}
