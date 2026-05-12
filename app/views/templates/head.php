<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') : 'JobHub' ?></title>
    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/reset.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    
    <script>
        window.URL_BASE = window.URL_BASE || <?= json_encode(URL_BASE, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>;
        window.JobHub_API_BASE = window.JobHub_API_BASE || <?= api_base_json() ?>;
        window.JobHub_ROUTES = Object.assign({
            HOME: <?= json_encode(URL_BASE, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>,
            LOGIN: <?= json_encode(URL_BASE . 'inicio', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>,
            CANDIDATO_AREA: <?= json_encode(URL_BASE . 'candidato', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>,
            PERFIL_CANDIDATO: <?= json_encode(URL_BASE . 'candidato/perfil', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>,
            EMPRESA_AREA: <?= json_encode(URL_BASE . 'recrutador', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>,
            PERFIL_EMPRESA: <?= json_encode(URL_BASE . 'recrutador/perfil', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>,
            CADASTRO_CANDIDATO: <?= json_encode(URL_BASE . 'cadastrar/candidato', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>,
            CADASTRO_RECRUTADOR: <?= json_encode(URL_BASE . 'cadastrar/recrutador', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>,
            REDEFINIR: <?= json_encode(URL_BASE . 'redefinir', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>,
            RESET: <?= json_encode(URL_BASE . 'reset', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>,
            VAGA_VIEW: <?= json_encode(URL_BASE . 'vaga/{id}', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>
        }, window.JobHub_ROUTES || {});
    </script>
    

    <style id="jobhub-global-fixes">
        html { overflow-x: hidden; }
        *, *::before, *::after { box-sizing: border-box; }
        body { min-height: 100vh; overflow-x: hidden; }
        img, video, iframe, svg { max-width: 100%; height: auto; display: block; }
        button, input, select, textarea { font: inherit; }
        a, button { touch-action: manipulation; }
        p, h1, h2, h3, h4, h5, h6, a, span, small, strong, label, button { overflow-wrap: anywhere; }
        .wrap, .shell, .card, .drawer, .drawerBody, .drawerShell, .jobhubH-wrap, .jobhubMM-panel, .app-shell, .content-shell { max-width: 100%; }
        .table-wrap, .table-responsive, .kanban-wrap, .list-wrap, .grid-wrap { max-width: 100%; overflow-x: auto; }
        .jobhubH-nav, .jobhubMM-nav, .actions, .duo, .grid, .kpis, .toolbar, .filters, .chips, .cards, .card-grid {
            min-width: 0;
        }
        @media (max-width: 768px) {
            .jobhubH-wrap, .shell, .wrap, .card, .drawer, .drawerBody, .content-shell { width: 100%; max-width: 100%; }
            .duo, .actions { flex-wrap: wrap; }
            table { display: block; overflow-x: auto; width: 100%; }
        }
    </style>

</head>
