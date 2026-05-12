<?php

class RecrutadorCandidatosModel
{
    public static function listarPorUsuarioId(int $usuarioId): array
    {
        $pdo = Database::pdo();

        $sql = "
            SELECT 
              x.origem,
              x.id_ref,
              x.vaga_id,
              v.cargo,
              x.status,
              x.created_at,
              x.email,
              x.nome_completo,
              x.telefone,
              x.cidade,
              x.estado
            FROM (
              SELECT
                'candidaturas' AS origem,
                ca.id_candidatura AS id_ref,
                ca.vaga_id,
                ca.status,
                ca.created_at,
                u.email AS email,
                c.nome_completo,
                c.telefone,
                c.cidade,
                c.estado
              FROM candidaturas ca
              JOIN candidato c ON c.id_candidato = ca.candidato_id
              JOIN usuario u ON u.id_usuario = c.usuario_id

              UNION ALL

              SELECT
                'pre_candidaturas' AS origem,
                pc.id_pre_candidatura AS id_ref,
                pc.vaga_id,
                pc.status,
                pc.created_at,
                pc.email AS email,
                NULL AS nome_completo,
                NULL AS telefone,
                NULL AS cidade,
                NULL AS estado
              FROM pre_candidaturas pc
            ) x
            JOIN vaga v ON v.id_vaga = x.vaga_id
            JOIN recrutador r ON r.id_recrutador = v.recrutador_id
            WHERE r.usuario_id = :usuario_id
            ORDER BY x.created_at DESC
            LIMIT 1000
        ";

        $st = $pdo->prepare($sql);
        $st->execute(['usuario_id' => $usuarioId]);
        return $st->fetchAll();
    }
}
