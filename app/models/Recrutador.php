<?php

class RecrutadorModel
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::pdo();
    }

    /**
     * Lista candidatos das vagas do recrutador
     * - Se $vagaId > 0: filtra uma vaga
     * - Senão: lista de todas as vagas do recrutador
     */
    public function listarCandidatos(int $vagaId, int $recrutadorId): array
    {
        $whereVaga = $vagaId > 0 ? "AND v.id_vaga = :vagaId" : "";

        $sql = "
            SELECT
                v.id_vaga,
                v.cargo,
                v.status AS status_vaga,

                ca.id_candidatura,
                ca.status AS status_candidatura,
                ca.created_at AS candidatura_em,

                c.id_candidato,
                c.nome_completo,
                c.telefone,
                c.cidade,
                c.estado
            FROM vaga v
            JOIN candidaturas ca ON ca.vaga_id = v.id_vaga
            JOIN candidato c ON c.id_candidato = ca.candidato_id
            WHERE v.recrutador_id = :recrutadorId
            $whereVaga
            ORDER BY ca.created_at DESC
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':recrutadorId', $recrutadorId, PDO::PARAM_INT);
        if ($vagaId > 0) $stmt->bindValue(':vagaId', $vagaId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
