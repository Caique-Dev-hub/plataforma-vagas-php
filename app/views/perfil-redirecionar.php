<!DOCTYPE html>
<html lang="pt-BR">
<?php require_once __DIR__ . '/templates/head.php'; ?>
<body style="font-family:Arial,sans-serif;display:grid;place-items:center;min-height:100vh;background:#f8fafc;color:#0f172a;">
<div>Redirecionando para seu perfil…</div>
<script>
(function(){
  const base = <?= json_encode(URL_BASE, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) ?>;
  const role = String(localStorage.getItem('role') || '').toUpperCase();
  if (role === 'RECRUTADOR' || role === 'EMPRESA') {
    window.location.replace(base + 'recrutador/perfil');
    return;
  }
  if (role === 'CANDIDATO') {
    window.location.replace(base + 'candidato/perfil');
    return;
  }
  window.location.replace(base + 'inicio');
})();
</script>
</body>
</html>
