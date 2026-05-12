<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="color-scheme" content="light" />
    <meta name="theme-color" content="#1F75D8" />
    <title>JobHub Vagas e Currículos</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/home.css" />

    <style>
        :root {
            --jobhub-blue: #1F75D8;
            --jobhub-blue2: #16447F;
            --jobhub-txt: #0F172A;
            --jobhub-muted: #6B7280;
            --jobhub-line: rgba(229, 231, 235, .95);
            --jobhub-card: #fff;
            --jobhub-bg: #F3F5FB;
            --jobhub-radius: 18px;
            --jobhub-shadow: 0 14px 38px rgba(15, 23, 42, .10);
            --jobhub-shadow2: 0 10px 22px rgba(15, 23, 42, .08);
            --jobhub-focus: 0 0 0 4px rgba(31, 117, 216, .18);
        }

        * {
            box-sizing: border-box;
        }

        :focus-visible {
            outline: none;
            box-shadow: var(--jobhub-focus);
            border-radius: 14px;
        }

        .sr-only {
            position: absolute !important;
            width: 1px !important;
            height: 1px !important;
            padding: 0 !important;
            margin: -1px !important;
            overflow: hidden !important;
            clip: rect(0, 0, 0, 0) !important;
            white-space: nowrap !important;
            border: 0 !important;
        }

        .jobhub-skip {
            position: absolute;
            left: -9999px;
            top: 10px;
            background: #fff;
            color: var(--jobhub-txt);
            border: 1px solid var(--jobhub-line);
            border-radius: 999px;
            padding: 10px 14px;
            box-shadow: var(--jobhub-shadow2);
            z-index: 99999;
        }

        .jobhub-skip:focus {
            left: 12px;
        }

        /* ===== CTA row do HERO (premium, sem depender do home.css) ===== */
        .jobhub-hero-ctas {
            margin-top: 12px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
        }

        .jobhub-hero-ctas .jobhub-btn {
            height: 42px;
            border-radius: 999px;
            border: 1px solid var(--jobhub-line);
            background: #fff;
            padding: 0 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 900;
            font-size: 13px;
            color: rgba(15, 23, 42, .92);
            box-shadow: 0 10px 24px rgba(15, 23, 42, .06);
            cursor: pointer;
            text-decoration: none;
            transition: .14s ease;
            -webkit-tap-highlight-color: transparent;
        }

        .jobhub-hero-ctas .jobhub-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 14px 30px rgba(15, 23, 42, .10);
        }

        .jobhub-hero-ctas .jobhub-btn.primary {
            border: none;
            background: #8DA8B7;
            color: #fff;
            box-shadow: 0 12px 24px rgba(31, 117, 216, .18);
        }

        .jobhub-hero-ctas .jobhub-btn.ghost {
            background: rgba(17, 24, 39, .02);
        }

        /* ===== Seção PREMIUM: Vagas em destaque (cards + busca + chips + skeleton) ===== */
        .jobhub-featured {
            max-width: 1200px;
            margin: 18px auto 0;
            padding: 0 16px;
        }

        .jobhub-card {
            background: var(--jobhub-card);
            border-radius: var(--jobhub-radius);
            border: 1px solid var(--jobhub-line);
            box-shadow: var(--jobhub-shadow);
            padding: 14px;
        }

        .jobhub-card-hd {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 10px;
        }

        .jobhub-title {
            margin: 0;
            font-size: 14px;
            font-weight: 950;
            color: var(--jobhub-blue2);
            letter-spacing: -.2px;
        }

        .jobhub-sub {
            margin: 4px 0 0;
            font-size: 12px;
            color: var(--jobhub-muted);
            line-height: 1.45;
        }

        .jobhub-tools {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
            justify-content: flex-end;
        }

        .jobhub-search {
            height: 40px;
            border-radius: 999px;
            border: 1px solid var(--jobhub-line);
            background: #fff;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 0 12px;
            box-shadow: 0 10px 24px rgba(15, 23, 42, .06);
            min-width: min(360px, 86vw);
        }

        .jobhub-search i {
            opacity: .7;
        }

        .jobhub-search input {
            border: 0;
            outline: none;
            width: 100%;
            font-size: 13px;
            font-weight: 800;
            color: rgba(15, 23, 42, .92);
            background: transparent;
        }

        .jobhub-clear {
            width: 34px;
            height: 34px;
            border-radius: 999px;
            border: 1px solid rgba(15, 23, 42, .10);
            background: rgba(15, 23, 42, .03);
            display: grid;
            place-items: center;
            font-size: 16px;
            color: rgba(15, 23, 42, .74);
            cursor: pointer;
        }

        .jobhub-select {
            height: 40px;
            border-radius: 999px;
            border: 1px solid var(--jobhub-line);
            background: #fff;
            padding: 0 12px;
            font-size: 13px;
            font-weight: 900;
            color: rgba(15, 23, 42, .86);
            box-shadow: 0 10px 24px rgba(15, 23, 42, .06);
            outline: none;
        }

        .jobhub-chips {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 8px;
        }

        .jobhub-chip {
            border-radius: 999px;
            padding: 7px 12px;
            font-size: 12px;
            border: 1px solid rgba(148, 163, 184, .7);
            background: #fff;
            color: #374151;
            font-weight: 900;
            line-height: 1;
            transition: .14s ease;
            cursor: pointer;
        }

        .jobhub-chip:hover {
            transform: translateY(-1px);
        }

        .jobhub-chip.active {
            border-color: rgba(31, 117, 216, .75);
            background: rgba(31, 117, 216, .10);
            color: var(--jobhub-blue2);
        }

        .jobhub-kpis {
            margin-top: 10px;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 10px;
        }

        .jobhub-kpi {
            background: rgba(249, 250, 251, .92);
            border: 1px solid rgba(229, 231, 235, .92);
            border-radius: 16px;
            padding: 12px;
        }

        .jobhub-kpi strong {
            display: block;
            font-size: 18px;
            color: var(--jobhub-blue2);
            letter-spacing: -.2px;
        }

        .jobhub-kpi span {
            display: block;
            margin-top: 4px;
            font-size: 12px;
            color: var(--jobhub-muted);
        }

        @media (max-width:540px) {
            .jobhub-kpis {
                grid-template-columns: 1fr;
            }
        }

        .jobhub-vaga {
            margin-top: 10px;
            border: 1px solid rgba(229, 231, 235, .92);
            border-radius: 16px;
            background: rgba(249, 250, 251, .92);
            padding: 12px;
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto;
            gap: 10px;
            transition: .14s ease;
        }

        .jobhub-vaga:hover {
            transform: translateY(-1px);
            background: rgba(31, 117, 216, .06);
            border-color: rgba(148, 163, 184, .95);
        }

        .jobhub-vaga h3 {
            margin: 0;
            font-size: 13.5px;
            font-weight: 950;
            color: var(--jobhub-blue2);
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center;
        }

        .jobhub-vaga small {
            display: block;
            margin-top: 4px;
            font-size: 12px;
            color: var(--jobhub-muted);
            line-height: 1.35;
        }

        .jobhub-desc-mini {
            margin-top: 8px;
            font-size: 12px;
            color: rgba(15, 23, 42, .76);
            line-height: 1.45;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .jobhub-row-meta {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center;
        }

        .jobhub-pill {
            font-size: 11px;
            padding: 5px 9px;
            border-radius: 999px;
            background: rgba(31, 117, 216, .10);
            border: 1px solid rgba(31, 117, 216, .18);
            color: var(--jobhub-blue2);
            font-weight: 950;
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            line-height: 1;
        }

        .jobhub-pill.ok {
            background: rgba(16, 185, 129, .10);
            border-color: rgba(16, 185, 129, .20);
            color: #065f46;
        }

        .jobhub-pill.warn {
            background: rgba(245, 158, 11, .10);
            border-color: rgba(245, 158, 11, .22);
            color: #92400e;
        }

        .jobhub-pill.neutral {
            background: rgba(17, 24, 39, .04);
            border-color: rgba(17, 24, 39, .08);
            color: rgba(15, 23, 42, .82);
        }

        .jobhub-actions {
            display: flex;
            gap: 8px;
            align-items: flex-start;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .jobhub-btn-sm {
            height: 34px;
            border-radius: 999px;
            padding: 0 12px;
            font-size: 12px;
            font-weight: 950;
            border: 1px solid rgba(229, 231, 235, .92);
            background: #fff;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            line-height: 1;
            transition: .14s ease;
            cursor: pointer;
            user-select: none;
            text-decoration: none;
            color: rgba(15, 23, 42, .92);
            box-shadow: 0 10px 24px rgba(15, 23, 42, .06);
        }

        .jobhub-btn-sm:hover {
            transform: translateY(-1px);
        }

        .jobhub-btn-sm.primary {
            border: none;
            box-shadow: 0 12px 24px rgba(31, 117, 216, .16);
        }

        .jobhub-empty {
            margin-top: 10px;
            border: 1px dashed rgba(148, 163, 184, .65);
            border-radius: var(--jobhub-radius);
            padding: 16px;
            color: var(--jobhub-muted);
            background: #fff;
        }

        .jobhub-empty b {
            color: var(--jobhub-blue2);
        }

        .jobhub-empty.error {
            border-style: solid;
            border-color: rgba(239, 68, 68, .28);
            background: rgba(239, 68, 68, .05);
            color: rgba(127, 29, 29, .95);
        }

        /* ===== Skeleton (shimmer) ===== */
        .jobhub-skeleton {
            position: relative;
            overflow: hidden;
            background: rgba(15, 23, 42, .04);
            border-radius: 12px;
        }

        .jobhub-skeleton::after {
            content: "";
            position: absolute;
            inset: 0;
            transform: translateX(-120%);
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .55), transparent);
            animation: jobhubShimmer 1.05s infinite;
        }

        @keyframes jobhubShimmer {
            100% {
                transform: translateX(120%);
            }
        }

        .jobhub-sk-card {
            border: 1px solid rgba(229, 231, 235, .92);
            border-radius: 16px;
            background: rgba(249, 250, 251, .92);
            padding: 12px;
            margin-top: 10px;
        }

        .jobhub-sk-line {
            height: 12px;
            margin: 8px 0;
        }

        .jobhub-sk-line.sm {
            width: 62%;
        }

        .jobhub-sk-line.md {
            width: 82%;
        }

        .jobhub-sk-line.lg {
            width: 92%;
        }

        /* ===== Toast (reuso do premium) ===== */
        .jobhub-toast {
            position: fixed;
            right: 16px;
            bottom: 16px;
            background: #0B1220;
            color: #fff;
            padding: 12px 14px;
            border-radius: 14px;
            box-shadow: 0 18px 50px rgba(0, 0, 0, .35);
            font-size: 13px;
            opacity: 0;
            transform: translateY(10px);
            pointer-events: none;
            transition: .18s ease;
            max-width: 360px;
            z-index: 99999;
            display: flex;
            gap: 10px;
            align-items: flex-start;
        }

        .jobhub-toast.show {
            opacity: 1;
            transform: translateY(0);
        }

        .jobhub-toast .dot {
            width: 9px;
            height: 9px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .85);
            margin-top: 5px;
            flex: 0 0 auto;
        }

        /* ===== Modal simples (alerta de vagas) ===== */
        body.jobhub-modal-open {
            overflow: hidden !important;
            touch-action: none;
        }

        .jobhub-modal {
            position: fixed;
            inset: 0;
            background: rgba(2, 6, 23, .55);
            display: none;
            align-items: flex-start;
            justify-content: center;
            padding: 18px;
            z-index: 9999;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
            overscroll-behavior: contain;
        }

        .jobhub-modal.open {
            display: flex;
        }

        .jobhub-modal-card {
            width: 100%;
            max-width: 560px;
            background: #fff;
            border-radius: 18px;
            border: 1px solid rgba(229, 231, 235, .92);
            box-shadow: 0 22px 60px rgba(0, 0, 0, .26);
            overflow: hidden;
            max-height: calc(100dvh - 36px);
            display: flex;
            flex-direction: column;
            margin: 18px 0;
        }

        .jobhub-modal-top {
            padding: 14px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            border-bottom: 1px solid rgba(229, 231, 235, .92);
            background: rgba(249, 250, 251, .92);
            flex: 0 0 auto;
        }

        .jobhub-modal-top b {
            color: var(--jobhub-blue2);
        }

        .jobhub-modal-body {
            padding: 14px;
            flex: 1 1 auto;
            min-height: 0;
            overflow: auto;
            -webkit-overflow-scrolling: touch;
            overscroll-behavior: contain;
        }

        .jobhub-field label {
            display: block;
            font-size: 12px;
            color: #334155;
            font-weight: 900;
            margin-bottom: 6px;
        }

        .jobhub-field input {
            width: 100%;
            border-radius: 14px;
            border: 1px solid rgba(148, 163, 184, .75);
            background: #fff;
            padding: 12px;
            font-size: 14px;
            outline: none;
            transition: .14s ease;
        }

        .jobhub-field input:focus {
            box-shadow: var(--jobhub-focus);
            border-color: rgba(31, 117, 216, .65);
        }

        .jobhub-err {
            min-height: 16px;
            margin-top: 6px;
            font-size: 12px;
            font-weight: 950;
            color: #ef4444;
        }

        .jobhub-modal-actions {
            padding: 14px;
            border-top: 1px solid rgba(229, 231, 235, .92);
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            flex-wrap: wrap;
            background: rgba(249, 250, 251, .92);
            flex: 0 0 auto;
        }

        @media (prefers-reduced-motion: reduce) {

            * {
                transition: none !important;
                animation: none !important;
                scroll-behavior: auto !important;
            }
        }

        /* modal base */
        .jobhub-modal {
            position: fixed;
            inset: 0;
            background: rgba(2, 6, 23, .55);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000000;
            padding: 18px;
        }

        .jobhub-modal.is-open {
            display: flex;
        }

        .jobhub-modal-card {
            width: min(560px, 96vw);
            background: rgba(255, 255, 255, .98);
            border: 1px solid rgba(15, 23, 42, .10);
            border-radius: 22px;
            box-shadow: 0 26px 90px rgba(15, 23, 42, .30);
            overflow: hidden;
        }

        /* === FIX MODAL (sobrescreve duplicatas) === */
        .jobhub-modal {
            position: fixed;
            inset: 0;
            background: rgba(2, 6, 23, .55);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 18px;
            z-index: 99999;
        }

        .jobhub-modal.open {
            display: flex;
        }

        .jobhub-modal-card {
            width: min(560px, 96vw);
            background: #fff;
            border-radius: 18px;
            border: 1px solid rgba(229, 231, 235, .92);
            box-shadow: 0 22px 60px rgba(0, 0, 0, .26);
            overflow: hidden;
            max-height: calc(100dvh - 36px);
            display: flex;
            flex-direction: column;
        }

        .jobhub-modal-top {
            padding: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid rgba(229, 231, 235, .92);
            background: rgba(249, 250, 251, .92);
        }

        .jobhub-modal-body {
            padding: 14px;
            overflow: auto;
        }

        /* === INPUT + SELECT iguais (fica premium) === */
        .jobhub-field input,
        .jobhub-field select {
            width: 100%;
            border-radius: 14px;
            border: 1px solid rgba(148, 163, 184, .75);
            background: #fff;
            padding: 12px 12px;
            font-size: 14px;
            font-weight: 800;
            color: rgba(15, 23, 42, .92);
            outline: none;
            transition: .14s ease;
        }

        .jobhub-field select {
            appearance: none;
            -webkit-appearance: none;
            background-image:
                linear-gradient(45deg, transparent 50%, rgba(15, 23, 42, .55) 50%),
                linear-gradient(135deg, rgba(15, 23, 42, .55) 50%, transparent 50%);
            background-position:
                calc(100% - 18px) calc(50% - 2px),
                calc(100% - 12px) calc(50% - 2px);
            background-size: 6px 6px, 6px 6px;
            background-repeat: no-repeat;
            padding-right: 38px;
        }

        .jobhub-field input:focus,
        .jobhub-field select:focus {
            box-shadow: var(--jobhub-focus);
            border-color: rgba(31, 117, 216, .65);
        }

        /* === Botão primary do modal (tava sem cor) === */
        .jobhub-btn-sm.primary {
            background: var(--jobhub-blue);
            color: #fff;
            border: none;
        }

        .jobhub-btn-sm.primary i {
            color: inherit !important;
        }
    </style>
</head>

<body class="home-premium">
    <a class="jobhub-skip" href="#main">Pular para o conteúdo</a>

    <main id="main">

        <!-- =========================================================
      HERO NOVO (SEU)
    ========================================================= -->
        <section class="empresaDemo-hero-v2">
            <div class="hero-v2-inner">

                <div class="hero-v2-left">
                    <div class="hero-v2-kicker"> JobHub Vagas e Currículos</div>

                    <h1 class="hero-v2-title">
                        Encontre vagas com rapidez sem complicar.
                    </h1>

                    <p class="hero-v2-sub">
                        Busque por cargo e cidade. Quando fizer sentido, a plataforma te guia para o próximo passo.
                    </p>

                    <form class="hero-v2-search" id="heroSearch" action="<?= URL_BASE ?>pesquisar" method="get">
                        <div class="hero-v2-field hero-v2-suggest">
                            <i class="fa-solid fa-briefcase"></i>
                            <input name="q" type="text" placeholder="Cargo ou área (ex: Auxiliar, Vendas)" autocomplete="off"
                                data-suggest="cargo" aria-label="Buscar por cargo ou área">
                            <div class="empresaDemo-suggest" role="listbox" aria-label="Sugestões de cargo"></div>
                        </div>

                        <div class="hero-v2-field hero-v2-suggest">
                            <i class="fa-solid fa-location-dot"></i>
                            <input name="city" type="text" placeholder="Cidade (ex: São Paulo)" autocomplete="off" data-suggest="city"
                                aria-label="Buscar por cidade">
                            <div class="empresaDemo-suggest" role="listbox" aria-label="Sugestões de cidade"></div>
                        </div>


                        <button type="submit" aria-label="Buscar vagas">Buscar</button>
                    </form>

                    <!-- ADD: CTAs premium (inspirado no dashboard: ações claras) -->
                    <div class="jobhub-hero-ctas" aria-label="Ações rápidas">

                        <a class="jobhub-btn ghost" href="<?= URL_BASE ?>empresa">
                            <i class="fa-solid fa-building"></i> Para empresas
                        </a>
                        <button class="jobhub-btn" id="btnAlertOpen" type="button">
                            <i class="fa-solid fa-bell"></i> Criar alerta
                        </button>
                    </div>
                </div>

                <div class="hero-v2-right">
                    <div class="hero-v2-visual">
                        <img src="<?= URL_BASE ?>assets/img/banner1.png" alt="JobHub">
                    </div>

                    <div class="hero-v2-float">
                        <div class="hero-v2-card">
                            <i class="fa-solid fa-bolt"></i>
                            <div>
                                <strong>Processo rápido</strong>
                                <span>Da busca ao perfil em poucos cliques.</span>
                            </div>
                        </div>
                        <div class="hero-v2-card">
                            <i class="fa-solid fa-shield"></i>
                            <div>
                                <strong>Fluxo organizado</strong>
                                <span>Você sempre sabe onde está e o que falta.</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <svg class="hero-v2-wave" viewBox="0 0 1440 120" preserveAspectRatio="none">
                <path fill="#ffffff"
                    d="M0,70 C220,110 420,110 720,78 C980,50 1180,28 1440,40 L1440,120 L0,120 Z"></path>
            </svg>
        </section>

        <section class="empresaDemo-solucao">
            <div class="solucao-container">

                <div class="solucao-texto">
                    <h2>
                        Soluções de tecnologia e recrutamento
                        <br>para <strong>quem busca um novo emprego</strong>
                        ou deseja <strong>contratar.</strong>
                    </h2>
                </div>

                <div class="solucao-cards">
                    <div class="sol-card">
                        <div class="sol-card-info">
                            <h3>Candidatos</h3>
                            <p>Crie e envie seu currículo grátis</p>
                        </div>
                    </div>

                    <a href="<?= URL_BASE ?>empresa" class="sol-card sol-card-link" aria-label="Ir para a página de empresas">
                        <div class="sol-card-info">
                            <h3>Empresas</h3>
                            <p>Anuncie vagas grátis ilimitadas</p>
                        </div>
                    </a>
                </div>

            </div>
        </section>

        <!-- <section class="jobhub-featured" aria-label="Vagas em destaque">
            <div class="jobhub-card">
                <div class="jobhub-card-hd">
                    <div>
                        <h2 class="jobhub-title">Vagas em destaque</h2>
                        <p class="jobhub-sub">Uma amostra rápida do que está rolando agora. Use a busca e filtre sem bagunça.</p>
                    </div>

                    <div class="jobhub-tools">
                        <div class="jobhub-search" role="search" aria-label="Buscar vagas em destaque">
                            <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                            <input id="featuredSearch" type="search" placeholder="Buscar por cargo, cidade, contrato..."
                                autocomplete="off" />
                            <button class="jobhub-clear" id="featuredClear" type="button" aria-label="Limpar busca">×</button>
                        </div>

                        <select class="jobhub-select" id="featuredSort" aria-label="Ordenar vagas em destaque">
                            <option value="recent" selected>Mais recentes</option>
                            <option value="title">Cargo (A–Z)</option>
                            <option value="salary">Maior salário</option>
                        </select>
                    </div>

                    <div class="jobhub-chips" id="featuredChips" aria-label="Filtrar vagas em destaque">
                        <button class="jobhub-chip active" data-f="todas" type="button">Todas</button>
                        <button class="jobhub-chip" data-f="CLT" type="button">CLT</button>
                        <button class="jobhub-chip" data-f="PJ" type="button">PJ</button>
                        <button class="jobhub-chip" data-f="REMOTO" type="button">Remotas</button>
                        <button class="jobhub-chip" data-f="URGENTE" type="button">Urgentes</button>
                    </div>
                </div>

                <div class="jobhub-kpis" aria-label="Resumo das vagas em destaque">
                    <div class="jobhub-kpi">
                        <strong id="kpiFeaturedTotal">0</strong>
                        <span>Vagas listadas</span>
                    </div>
                    <div class="jobhub-kpi">
                        <strong id="kpiFeaturedRemoto">0</strong>
                        <span>Remotas / híbridas</span>
                    </div>
                    <div class="jobhub-kpi">
                        <strong id="kpiFeaturedUrgente">0</strong>
                        <span>Contratação urgente</span>
                    </div>
                </div>

                <div id="featuredError" class="jobhub-empty error" style="display:none;">
                    <b>Não consegui carregar as vagas em destaque.</b>
                    <div id="featuredErrorMsg" style="margin-top:6px;">—</div>
                    <div style="margin-top:10px;display:flex;gap:10px;flex-wrap:wrap;">
                        <button class="jobhub-btn-sm primary" id="featuredRetry" type="button">
                            <i class="fa-solid fa-rotate-right"></i> Tentar novamente
                        </button>
                        <a class="jobhub-btn-sm" href="<?= URL_BASE ?>pesquisar">
                            <i class="fa-solid fa-compass"></i> Ir para busca
                        </a>
                    </div>
                </div>

                <div id="featuredList" aria-live="polite"></div>

                <div id="featuredEmpty" class="jobhub-empty" style="display:none;">
                    Sem vagas para mostrar agora. <b>Faça uma busca</b> e tente outro cargo/cidade.
                </div>
            </div>
        </section> -->

        <!-- ====================== SEU CARROSSEL (MANTIDO) ====================== -->
        <section class="empresaDemo-ia-carousel">
            <div class="carousel-cursor-layer"></div>

            <div class="carousel-cursor" id="carouselCursor">
                <svg viewBox="0 0 24 24">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </div>

            <h2 class="ia-title">
                RH, Talentos e Lideranças em uma<br>
                plataforma impulsionada por <span>Agentes de IA</span>
            </h2>

            <div class="ia-showcase">
                <button class="ia-nav ia-prev" type="button">‹</button>

                <div class="ia-cards">
                    <div class="ia-card preview" id="cardPrev"></div>
                    <div class="ia-card active" id="cardActive"></div>
                    <div class="ia-card preview" id="cardNext"></div>
                </div>

                <button class="ia-nav ia-next" type="button">›</button>
            </div>

            <div class="ia-dots" id="iaDots"></div>
        </section>

        <!-- ====================== 3 PASSOS — (SEU) ====================== -->
        <section class="empresaDemo-steps jobhub-steps2" id="jobhubSteps2">
            <div class="jobhub-s2-shell">

                <header class="jobhub-s2-head">
                    <div>
                        <h2>3 passos rumo à sua entrevista de emprego</h2>
                        <p>
                            A gente guia você do jeito certo: cria conta, organiza seu CV e foca nas vagas com maior aderência.
                            Sem confusão, sem travar no meio.
                        </p>
                    </div>

                    <div class="jobhub-s2-meta">
                        <span class="jobhub-s2-pill" id="jobhubS2Pill">01 de 03</span>
                        <div class="jobhub-s2-dots" aria-hidden="true">
                            <span class="jobhub-s2-dot is-active"></span>
                            <span class="jobhub-s2-dot"></span>
                            <span class="jobhub-s2-dot"></span>
                        </div>
                    </div>
                </header>

                <div class="jobhub-s2-card">

                    <div class="jobhub-s2-topbar">
                        <nav class="jobhub-s2-nav" role="tablist" aria-label="Etapas do candidato">
                            <button class="jobhub-s2-tab is-active" type="button" data-step="0" role="tab" aria-selected="true">
                                <span class="n">01</span> Criar conta
                            </button>
                            <button class="jobhub-s2-tab" type="button" data-step="1" role="tab" aria-selected="false">
                                <span class="n">02</span> Cadastrar CV
                            </button>
                            <button class="jobhub-s2-tab" type="button" data-step="2" role="tab" aria-selected="false">
                                <span class="n">03</span> Candidate-se
                            </button>
                        </nav>

                        <div class="jobhub-s2-actionsTop">
                            <button class="jobhub-s2-ghost" type="button" id="jobhubS2Auto">
                                <i class="fa-regular fa-circle-play"></i>
                                Auto
                            </button>
                            <button class="jobhub-s2-ghost" type="button" id="jobhubS2Prev">
                                <i class="fa-solid fa-chevron-left"></i>
                                Voltar
                            </button>
                            <button class="jobhub-s2-ghost" type="button" id="jobhubS2Next">
                                Próximo
                                <i class="fa-solid fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>

                    <div class="jobhub-s2-body">
                        <div class="jobhub-s2-main jobhub-s2-anim" id="jobhubS2Main">
                            <span class="jobhub-s2-kicker" id="jobhubS2Kicker">
                                <i class="fa-solid fa-bolt"></i> Passo 01
                            </span>

                            <h3 class="jobhub-s2-title" id="jobhubS2Title">Crie sua conta em 1 minuto</h3>

                            <p class="jobhub-s2-text" id="jobhubS2Text">
                                Comece com seus dados básicos e já entra no fluxo certo. A plataforma passa a entender o que você busca
                                e melhora suas recomendações.
                            </p>

                            <div class="jobhub-s2-badges" id="jobhubS2Badges"></div>

                            <div class="jobhub-s2-cta">
                                <a class="jobhub-s2-btn primary" id="jobhubS2CtaPrimary" href="<?= URL_BASE ?>cadastrar/candidato">
                                    <i class="fa-solid fa-user-plus"></i> Criar conta
                                </a>

                                <a class="jobhub-s2-btn" href="<?= URL_BASE ?>inicio" data-scroll="empresaDemo-categorias">
                                    <i class="fa-regular fa-compass"></i> Ver áreas
                                </a>
                            </div>
                        </div>

                        <aside class="jobhub-s2-side" aria-label="Detalhes da etapa">
                            <div class="jobhub-s2-sideTop">
                                <div class="jobhub-s2-icon" id="jobhubS2Icon">
                                    <i class="fa-solid fa-user-plus"></i>
                                </div>

                                <div style="text-align:right;">
                                    <p class="jobhub-s2-sideTitle">Tempo estimado</p>
                                    <div class="jobhub-s2-sideValue" id="jobhubS2Time">~ 1 min</div>
                                </div>
                            </div>

                            <div class="jobhub-s2-check" id="jobhubS2Check"></div>
                        </aside>
                    </div>

                    <div class="jobhub-s2-progress">
                        <div class="jobhub-s2-bar"><i id="jobhubS2Fill"></i></div>

                        <div class="jobhub-s2-prow">
                            <span><strong id="jobhubS2ProgressTitle">Conta criada</strong> • etapa inicial</span>
                            <span id="jobhubS2ProgressSub">Quanto mais completo, maior sua visibilidade.</span>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- ====================== CATEGORIAS (ID PRA SCROLL) ====================== -->
        <section class="empresaDemo-categorias" id="empresaDemo-categorias">
            <h2 class="cat-title">Ache um emprego na sua área</h2>

            <div class="cat-grid">
                <div class="cat-card"><img src="<?= URL_BASE ?>assets/img/icon_primeiro_emprego.png" alt="Primeiro Emprego">
                    <p>Primeiro Emprego</p>
                </div>
                <div class="cat-card"><img src="<?= URL_BASE ?>assets/img/icon_administrativo.png" alt="Administrativo">
                    <p>Administrativo</p>
                </div>
                <div class="cat-card"><img src="<?= URL_BASE ?>assets/img/icon_vendas.png" alt="Vendas">
                    <p>Vendas</p>
                </div>
                <div class="cat-card"><img src="<?= URL_BASE ?>assets/img/icon_juridico.png" alt="Jurídico">
                    <p>Jurídico</p>
                </div>
                <div class="cat-card"><img src="<?= URL_BASE ?>assets/img/icon_financeiro.png" alt="Financeiro">
                    <p>Financeiro</p>
                </div>
                <div class="cat-card"><img src="<?= URL_BASE ?>assets/img/icon_producao.png" alt="Produção">
                    <p>Produção</p>
                </div>
                <div class="cat-card"><img src="<?= URL_BASE ?>assets/img/icon_rh.png" alt="RH">
                    <p>RH</p>
                </div>
                <div class="cat-card"><img src="<?= URL_BASE ?>assets/img/icon_saude.png" alt="Saúde">
                    <p>Saúde</p>
                </div>
                <div class="cat-card"><img src="<?= URL_BASE ?>assets/img/icon_educacao.png" alt="Educação">
                    <p>Educação</p>
                </div>
                <div class="cat-card"><img src="<?= URL_BASE ?>assets/img/icon_tecnologia.png" alt="Tecnologia">
                    <p>Tecnologia</p>
                </div>
                <div class="cat-card"><img src="<?= URL_BASE ?>assets/img/icon_cozinha.png" alt="Cozinha">
                    <p>Cozinha</p>
                </div>
                <div class="cat-card"><img src="<?= URL_BASE ?>assets/img/icon_PCD.png" alt="PCD">
                    <p>PCD</p>
                </div>
            </div>
        </section>
    </main>

    <!-- ✅ ADD: TOAST -->
    <div class="jobhub-toast" id="jobhubToast" role="status" aria-live="polite">
        <span class="dot" aria-hidden="true"></span>
        <span id="jobhubToastText">—</span>
    </div>

    <!-- ✅ ADD: MODAL ALERTA -->
    <div class="jobhub-modal" id="jobhubAlertModal" aria-hidden="true">
        <div class="jobhub-modal-card" role="dialog" aria-modal="true" aria-labelledby="jobhubAlertTitle">
            <div class="jobhub-modal-top">
                <b id="jobhubAlertTitle">Criar alerta de vagas</b>
                <button class="jobhub-btn-sm" id="jobhubAlertClose" type="button">
                    <i class="fa-solid fa-xmark"></i> Fechar
                </button>
            </div>

            <div class="jobhub-modal-body">

                <form id="jobhubAlertForm" novalidate>
                    <div class="jobhub-field" style="margin-bottom:12px;">
                        <label for="jobhubAlertEmail">Seu e-mail *</label>
                        <input id="jobhubAlertEmail" type="email" placeholder="nome@dominio.com" autocomplete="email" required />
                        <div class="jobhub-err" id="jobhubAlertEmailErr"></div>
                    </div>

                    <div class="jobhub-field" style="margin-bottom:12px;">
                        <label for="jobhubAlertCargo">Cargo / área</label>
                        <input id="jobhubAlertCargo" type="text" placeholder="Ex.: Vendas, Auxiliar, Logística" />
                        <div class="jobhub-err" id="jobhubAlertCargoErr"></div>
                    </div>

                    <div class="jobhub-field" style="margin-bottom:12px;">
                        <label for="jobhubAlertRegion">Região</label>
                        <select id="jobhubAlertRegion">
                            <option value="">Todas</option>
                        </select>
                    </div>

                    <div class="jobhub-field" style="margin-bottom:12px;">
                        <label for="jobhubAlertUF">Estado (UF)</label>
                        <select id="jobhubAlertUF">
                            <option value="">Todos</option>
                        </select>
                    </div>

                </form>
            </div>

            <div class="jobhub-modal-actions">
                <button class="jobhub-btn-sm" id="jobhubAlertCancel" type="button">Cancelar</button>
                <button class="jobhub-btn-sm primary" id="jobhubAlertSave" type="submit" form="jobhubAlertForm">
                    <i style="color: black;" class="fa-solid fa-check"></i> Salvar alerta
                </button>
            </div>
        </div>
    </div>

    <!-- SEU home.js (mantido) -->
    <script src="<?= URL_BASE ?>assets/js/home.js"></script>

    <!-- SEU scroll sem hash (mantido) -->
    <script>
        (() => {
            "use strict";
            const KEY = "jobhub_scroll_to";

            function cleanPath(p) {
                return String(p || "").replace(/\/+$/, "") || "/";
            }

            function scrollToId(id) {
                const el = document.getElementById(id);
                if (!el) return;
                el.scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });
                history.replaceState(null, "", window.location.pathname + window.location.search);
            }

            document.addEventListener("click", (e) => {
                const a = e.target.closest("a[data-scroll]");
                if (!a) return;

                const id = a.getAttribute("data-scroll");
                if (!id) return;

                const url = new URL(a.href, window.location.origin);
                const samePage = cleanPath(url.pathname) === cleanPath(window.location.pathname);

                if (samePage) {
                    e.preventDefault();
                    scrollToId(id);
                } else {
                    sessionStorage.setItem(KEY, id);
                }
            });

            window.addEventListener("DOMContentLoaded", () => {
                const id = sessionStorage.getItem(KEY);
                if (!id) return;
                sessionStorage.removeItem(KEY);
                setTimeout(() => scrollToId(id), 80);
            });
        })();
    </script>

    <!-- SEU steps (mantido) -->
    <script>
        (() => {
            const root = document.getElementById("jobhubSteps2");
            if (!root) return;

            const steps = [{
                    n: "01",
                    kicker: "Passo 01",
                    title: "Crie sua conta em 1 minuto",
                    text: "Comece com seus dados básicos e já entra no fluxo certo. A plataforma passa a entender o que você busca e melhora suas recomendações.",
                    icon: "fa-solid fa-user-plus",
                    time: "~ 1 min",
                    badges: [{
                            type: "primary",
                            html: "<i class='fa-solid fa-shield-halved'></i> Seguro"
                        },
                        {
                            type: "",
                            html: "<i class='fa-regular fa-eye'></i> Mais visibilidade"
                        },
                        {
                            type: "",
                            html: "<i class='fa-solid fa-chart-line'></i> Melhor ranqueamento"
                        },
                    ],
                    checklist: [{
                            title: "Dados básicos",
                            text: "Nome, e-mail e contato em poucos segundos."
                        },
                        {
                            title: "Acesso instantâneo",
                            text: "Você entra no painel e já recebe recomendações."
                        },
                        {
                            title: "Base do match",
                            text: "O sistema entende seu perfil desde o início."
                        }
                    ],
                    ctaHref: "<?= URL_BASE ?>cadastrar/candidato",
                    ctaHtml: "<i class='fa-solid fa-user-plus'></i> Criar conta",
                    progressTitle: "Conta criada",
                    progressSub: "Quanto mais completo, maior sua visibilidade."
                },
                {
                    n: "02",
                    kicker: "Passo 02",
                    title: "Cadastre seu CV com clareza",
                    text: "Formações e experiências organizadas aumentam sua força de perfil. Isso melhora o match e as vagas sugeridas — sem bagunça.",
                    icon: "fa-regular fa-file-lines",
                    time: "~ 4 min",
                    badges: [{
                            type: "primary",
                            html: "<i class='fa-solid fa-circle-check'></i> Perfil forte"
                        },
                        {
                            type: "",
                            html: "<i class='fa-solid fa-wand-magic-sparkles'></i> Match melhor"
                        },
                        {
                            type: "",
                            html: "<i class='fa-regular fa-clock'></i> Mais rapidez"
                        },
                    ],
                    checklist: [{
                            title: "Formações",
                            text: "Cursos e períodos organizados em ordem."
                        },
                        {
                            title: "Experiências",
                            text: "Descrição ajuda recrutador a decidir rápido."
                        },
                        {
                            title: "Força do perfil",
                            text: "Você sobe no ranqueamento da busca."
                        }
                    ],
                    ctaHref: "<?= URL_BASE ?>cadastrar/candidato",
                    ctaHtml: "<i class='fa-regular fa-file-lines'></i> Cadastrar CV",
                    progressTitle: "Currículo preenchido",
                    progressSub: "Seu perfil começa a ranquear melhor nas buscas."
                },
                {
                    n: "03",
                    kicker: "Passo 03",
                    title: "Candidate-se com foco nas melhores vagas",
                    text: "Com o perfil pronto, você aparece com mais relevância e recebe vagas com maior aderência. Menos tentativa, mais acerto.",
                    icon: "fa-solid fa-briefcase",
                    time: "~ contínuo",
                    badges: [{
                            type: "primary",
                            html: "<i class='fa-solid fa-star'></i> Alto match"
                        },
                        {
                            type: "",
                            html: "<i class='fa-regular fa-message'></i> Resposta mais rápida"
                        },
                        {
                            type: "",
                            html: "<i class='fa-solid fa-layer-group'></i> Mais oportunidades"
                        },
                    ],
                    checklist: [{
                            title: "Recomendações",
                            text: "Vagas mais alinhadas com seu histórico."
                        },
                        {
                            title: "Aplicação rápida",
                            text: "Candidatura com menos etapas."
                        },
                        {
                            title: "Acompanhamento",
                            text: "Evolução do status (em breve no painel)."
                        }
                    ],
                    ctaHref: "<?= URL_BASE ?>cadastrar/candidato",
                    ctaHtml: "<i class='fa-solid fa-right-to-bracket'></i> Entrar e candidatar",
                    progressTitle: "Pronto para vagas",
                    progressSub: "Você está no ponto ideal para aplicar com confiança."
                }
            ];

            const tabs = [...root.querySelectorAll(".jobhub-s2-tab")];
            const dots = [...root.querySelectorAll(".jobhub-s2-dot")];

            const pill = document.getElementById("jobhubS2Pill");
            const main = document.getElementById("jobhubS2Main");

            const kicker = document.getElementById("jobhubS2Kicker");
            const title = document.getElementById("jobhubS2Title");
            const text = document.getElementById("jobhubS2Text");
            const badges = document.getElementById("jobhubS2Badges");

            const iconBox = document.getElementById("jobhubS2Icon");
            const timeEl = document.getElementById("jobhubS2Time");
            const check = document.getElementById("jobhubS2Check");

            const cta = document.getElementById("jobhubS2CtaPrimary");

            const fill = document.getElementById("jobhubS2Fill");
            const pTitle = document.getElementById("jobhubS2ProgressTitle");
            const pSub = document.getElementById("jobhubS2ProgressSub");

            const btnPrev = document.getElementById("jobhubS2Prev");
            const btnNext = document.getElementById("jobhubS2Next");
            const btnAuto = document.getElementById("jobhubS2Auto");

            let idx = 0;
            let timer = null;
            let autoOn = false;

            function renderBadges(list) {
                badges.innerHTML = "";
                (list || []).forEach(b => {
                    const el = document.createElement("span");
                    el.className = "jobhub-s2-badge" + (b.type ? (" " + b.type) : "");
                    el.innerHTML = b.html;
                    badges.appendChild(el);
                });
            }

            function renderChecklist(list) {
                check.innerHTML = "";
                (list || []).forEach(item => {
                    const row = document.createElement("div");
                    row.className = "jobhub-s2-checkItem";
                    row.innerHTML = `
            <i class="fa-regular fa-circle-check"></i>
            <div>
              <strong>${item.title}</strong>
              <span>${item.text}</span>
            </div>
          `;
                    check.appendChild(row);
                });
            }

            function setStep(newIdx) {
                idx = Math.max(0, Math.min(steps.length - 1, newIdx));
                const s = steps[idx];

                tabs.forEach((t, i) => {
                    const active = i === idx;
                    t.classList.toggle("is-active", active);
                    t.setAttribute("aria-selected", active ? "true" : "false");
                });

                dots.forEach((d, i) => d.classList.toggle("is-active", i === idx));
                pill.textContent = `${s.n} de 03`;

                main.classList.remove("jobhub-s2-anim");
                void main.offsetWidth;
                main.classList.add("jobhub-s2-anim");

                kicker.innerHTML = `<i class="fa-solid fa-bolt"></i> ${s.kicker}`;
                title.textContent = s.title;
                text.textContent = s.text;

                renderBadges(s.badges);

                iconBox.innerHTML = `<i class="${s.icon}"></i>`;
                timeEl.textContent = s.time;
                renderChecklist(s.checklist);

                cta.href = s.ctaHref;
                cta.innerHTML = s.ctaHtml;

                pTitle.textContent = s.progressTitle;
                pSub.textContent = s.progressSub;

                const pct = Math.round(((idx + 1) / steps.length) * 100);
                fill.style.width = pct + "%";
            }

            function stopAuto() {
                autoOn = false;
                if (timer) clearInterval(timer);
                timer = null;
                btnAuto.innerHTML = `<i class="fa-regular fa-circle-play"></i> Auto`;
            }

            function startAuto() {
                autoOn = true;
                btnAuto.innerHTML = `<i class="fa-regular fa-circle-pause"></i> Auto`;
                if (timer) clearInterval(timer);
                timer = setInterval(() => setStep((idx + 1) % steps.length), 6500);
            }

            tabs.forEach(btn => {
                btn.addEventListener("click", () => {
                    stopAuto();
                    setStep(parseInt(btn.dataset.step || "0", 10));
                });
            });

            btnPrev?.addEventListener("click", () => {
                stopAuto();
                setStep(idx - 1);
            });
            btnNext?.addEventListener("click", () => {
                stopAuto();
                setStep(idx + 1);
            });

            btnAuto?.addEventListener("click", () => {
                if (autoOn) stopAuto();
                else startAuto();
            });

            root.addEventListener("keydown", (e) => {
                if (e.key === "ArrowRight") {
                    stopAuto();
                    setStep(idx + 1);
                }
                if (e.key === "ArrowLeft") {
                    stopAuto();
                    setStep(idx - 1);
                }
            });

            root.addEventListener("mouseenter", () => {
                if (autoOn) stopAuto();
            });

            setStep(0);
        })();
    </script>

    <!-- ✅ ADD: Featured jobs + Modal + Toast (inspirado no dashboard premium) -->
    <script>
        (() => {
            "use strict";

            const BASE = "<?= URL_BASE ?>";
            const SEARCH_URL = BASE + "pesquisar";
            const API_BASE = window.JobHub_API_BASE || "";

            /* ---------- Toast ---------- */
            const toastEl = document.getElementById("jobhubToast");
            const toastText = document.getElementById("jobhubToastText");
            const TOAST_MS = 1900;

            function toast(msg) {
                if (!toastEl) return;
                if (toastText) toastText.textContent = String(msg || "");
                toastEl.classList.add("show");
                clearTimeout(toastEl._t);
                toastEl._t = setTimeout(() => toastEl.classList.remove("show"), TOAST_MS);
            }

            /* ---------- Modal (alerta) ---------- */
            const modal = document.getElementById("jobhubAlertModal");
            const btnOpen = document.getElementById("btnAlertOpen");
            const btnClose = document.getElementById("jobhubAlertClose");
            const btnCancel = document.getElementById("jobhubAlertCancel");
            const form = document.getElementById("jobhubAlertForm");
            const email = document.getElementById("jobhubAlertEmail");
            const cargo = document.getElementById("jobhubAlertCargo");
            const city = document.getElementById("jobhubAlertCity");
            const emailErr = document.getElementById("jobhubAlertEmailErr");
            const saveBtn = document.getElementById("jobhubAlertSave");

            let lastFocus = null;

            function getFocusable(container) {
                return Array.from(container.querySelectorAll(
                    'a[href],button:not([disabled]),textarea,input,select,[tabindex]:not([tabindex="-1"])'
                )).filter(el => el.offsetParent !== null);
            }

            function trapFocus(container) {
                function onKey(e) {
                    if (e.key !== "Tab") return;
                    const focusables = getFocusable(container);
                    if (!focusables.length) return;
                    const first = focusables[0];
                    const last = focusables[focusables.length - 1];

                    if (e.shiftKey && document.activeElement === first) {
                        e.preventDefault();
                        last.focus();
                    } else if (!e.shiftKey && document.activeElement === last) {
                        e.preventDefault();
                        first.focus();
                    }
                }
                container._trapKey = onKey;
                document.addEventListener("keydown", onKey, true);
            }

            function releaseTrap(container) {
                if (container?._trapKey) document.removeEventListener("keydown", container._trapKey, true);
                container._trapKey = null;
            }

            function openModal() {
                if (!modal) return;
                lastFocus = document.activeElement;
                modal.classList.add("open");
                modal.setAttribute("aria-hidden", "false");
                document.body.classList.add("jobhub-modal-open");
                trapFocus(modal);
                setTimeout(() => email?.focus(), 60);
            }

            function closeModal() {
                if (!modal) return;
                modal.classList.remove("open");
                modal.setAttribute("aria-hidden", "true");
                document.body.classList.remove("jobhub-modal-open");
                releaseTrap(modal);
                if (lastFocus && typeof lastFocus.focus === "function") setTimeout(() => lastFocus.focus(), 0);
            }

            btnOpen?.addEventListener("click", () => {
                // pré-preenche com o que a pessoa digitou no HERO
                const heroCargo = document.querySelector('#heroSearch input[name="q"]')?.value || "";
                const heroCity = document.querySelector('#heroSearch input[name="city"]')?.value || "";
                if (cargo && !cargo.value) cargo.value = heroCargo;
                if (city && !city.value) city.value = heroCity;
                openModal();
            });
            btnClose?.addEventListener("click", closeModal);
            btnCancel?.addEventListener("click", closeModal);
            modal?.addEventListener("mousedown", (e) => {
                if (e.target === modal) closeModal();
            });
            document.addEventListener("keydown", (e) => {
                if (e.key === "Escape" && modal?.classList.contains("open")) closeModal();
            });

            function setErr(el, msg) {
                if (el) el.textContent = msg || "";
            }

            function isEmail(v) {
                return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(String(v || "").trim());
            }

            form?.addEventListener("submit", (e) => {
                e.preventDefault();
                setErr(emailErr, "");

                const em = String(email?.value || "").trim();
                if (!em) {
                    setErr(emailErr, "Digite seu e-mail.");
                    email?.focus();
                    return;
                }
                if (!isEmail(em)) {
                    setErr(emailErr, "E-mail inválido. Ex: nome@dominio.com");
                    email?.focus();
                    return;
                }

                const payload = {
                    email: em,
                    cargo: String(cargo?.value || "").trim(),
                    city: String(city?.value || "").trim(),
                    createdAt: Date.now()
                };

                try {
                    const KEY = "jobhub.alerts.v1";
                    const old = JSON.parse(localStorage.getItem(KEY) || "[]");
                    old.unshift(payload);
                    localStorage.setItem(KEY, JSON.stringify(old.slice(0, 20)));
                } catch {}

                toast("Alerta salvo ✅");
                closeModal();
            });

            /* ---------- Featured jobs (API fallback + skeleton) ---------- */
            const featuredList = document.getElementById("featuredList");
            const featuredEmpty = document.getElementById("featuredEmpty");
            const featuredError = document.getElementById("featuredError");
            const featuredErrorMsg = document.getElementById("featuredErrorMsg");
            const featuredRetry = document.getElementById("featuredRetry");

            const kpiTotal = document.getElementById("kpiFeaturedTotal");
            const kpiRemoto = document.getElementById("kpiFeaturedRemoto");
            const kpiUrgente = document.getElementById("kpiFeaturedUrgente");

            const search = document.getElementById("featuredSearch");
            const clear = document.getElementById("featuredClear");
            const sort = document.getElementById("featuredSort");
            const chips = document.getElementById("featuredChips");

            const state = {
                vagas: [],
                filtro: "todas",
                query: "",
                sort: "recent",
            };

            function escapeHTML(str) {
                return String(str ?? "")
                    .replaceAll("&", "&amp;").replaceAll("<", "&lt;").replaceAll(">", "&gt;")
                    .replaceAll('"', "&quot;").replaceAll("'", "&#039;");
            }

            function normalize(s) {
                return String(s || "").toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            }

            function formatMoney(v) {
                const n = Number(v);
                if (!Number.isFinite(n) || n <= 0) return "";
                try {
                    return new Intl.NumberFormat("pt-BR", {
                        style: "currency",
                        currency: "BRL"
                    }).format(n);
                } catch {
                    return `R$ ${n.toFixed(2)}`;
                }
            }

            function renderSkeleton(n = 6) {
                if (!featuredList) return;
                featuredList.innerHTML = Array.from({
                    length: n
                }).map(() => `
          <div class="jobhub-sk-card">
            <div class="jobhub-skeleton jobhub-sk-line lg"></div>
            <div class="jobhub-skeleton jobhub-sk-line md"></div>
            <div class="jobhub-skeleton jobhub-sk-line sm"></div>
          </div>
        `).join("");
            }

            function setDisplay(el, show, display = "block") {
                if (!el) return;
                el.style.display = show ? display : "none";
            }

            function normalizeVagaFromApi(v) {
                const id = Number(v?.idVaga) || Number(v?.id) || Number(v?.vagaId) || 0;
                const loc = v?.localizacao || v?.endereco || v?.local || {};
                const cidade = loc?.cidade || v?.cidade || "";
                const estado = loc?.estado || loc?.uf || v?.estado || "";
                const tipoEndereco = String(loc?.tipoEndereco || v?.tipoEndereco || "").toUpperCase();

                return {
                    id,
                    cargo: v?.cargo || v?.titulo || v?.nome || `Vaga #${id || "—"}`,
                    complemento: v?.complementoCargo ?? v?.complemento ?? "",
                    tipoContrato: String(v?.tipoContrato || v?.contrato || "—").toUpperCase(),
                    salario: v?.salario ?? v?.remuneracao ?? null,
                    urgente: !!(v?.contratacaoUrgente ?? v?.urgente),
                    confidencial: !!(v?.empresaConfidencial ?? v?.confidencial),
                    descricao: v?.descricao || "",
                    cidade: (cidade && estado) ? `${cidade}/${estado}` : (cidade || estado || "—"),
                    modelo: tipoEndereco || "—",
                    _raw: v
                };
            }

            function updateKpis() {
                const total = state.vagas.length;
                const remoto = state.vagas.filter(v => ["REMOTO", "HIBRIDO", "HÍBRIDO"].includes(String(v.modelo || "").toUpperCase())).length;
                const urgente = state.vagas.filter(v => !!v.urgente).length;
                if (kpiTotal) kpiTotal.textContent = String(total);
                if (kpiRemoto) kpiRemoto.textContent = String(remoto);
                if (kpiUrgente) kpiUrgente.textContent = String(urgente);
            }

            function vagasFiltradasOrdenadas() {
                const q = normalize(state.query);

                let arr = state.vagas.filter(v => {
                    const hay = normalize([v.cargo, v.complemento, v.cidade, v.tipoContrato, v.modelo].join(" | "));
                    const okQ = !q || hay.includes(q);

                    const f = String(state.filtro || "todas").toUpperCase();
                    let okF = true;

                    if (f === "CLT" || f === "PJ") okF = String(v.tipoContrato || "").toUpperCase() === f;
                    else if (f === "REMOTO") okF = ["REMOTO", "HIBRIDO", "HÍBRIDO"].includes(String(v.modelo || "").toUpperCase());
                    else if (f === "URGENTE") okF = !!v.urgente;

                    // Condição adicional para verificar o salário maior que 6.000
                    const okSalary = v.salario > 6000;

                    return okQ && okF && okSalary;
                });

                if (state.sort === "recent") {
                    arr.sort((a, b) => (Number(b.id || 0) - Number(a.id || 0)));
                } else if (state.sort === "title") {
                    arr.sort((a, b) => String(a.cargo || "").localeCompare(String(b.cargo || ""), "pt-BR"));
                } else if (state.sort === "salary") {
                    arr.sort((a, b) => (Number(b.salario || 0) - Number(a.salario || 0)));
                }

                return arr;
            }

            function renderFeatured() {
                if (!featuredList) return;

                updateKpis();

                if (!state.vagas.length) {
                    featuredList.innerHTML = "";
                    setDisplay(featuredEmpty, true);
                    return;
                }

                const arr = vagasFiltradasOrdenadas();

                setDisplay(featuredEmpty, !arr.length);

                if (!arr.length) {
                    featuredList.innerHTML = "";
                    return;
                }

                featuredList.innerHTML = arr.slice(0, 8).map(v => {
                    const salarioTxt = formatMoney(v.salario);
                    const urgent = v.urgente ? `<span class="jobhub-pill warn"><i class="fa-solid fa-bolt"></i> urgente</span>` : "";
                    const conf = v.confidencial ? `<span class="jobhub-pill neutral"><i class="fa-solid fa-user-secret"></i> confidencial</span>` : "";
                    const comp = v.complemento ? `<span class="jobhub-pill neutral">${escapeHTML(v.complemento)}</span>` : "";
                    const modelo = v.modelo ? `<span class="jobhub-pill neutral">${escapeHTML(String(v.modelo).toUpperCase())}</span>` : "";

                    // ✅ link seguro: leva pra /pesquisar com vagaId (não depende de rota de detalhe)
                    const href = `${SEARCH_URL}?vagaId=${encodeURIComponent(v.id || "")}`;

                    return `
            <article class="jobhub-vaga" data-id="${v.id}">
              <div>
                <h3>
                  ${escapeHTML(v.cargo)}
                  ${comp}
                </h3>

                <small>
                  ${escapeHTML(v.cidade)} • ${escapeHTML(String(v.tipoContrato || "—").toUpperCase())} ${modelo ? "• " + modelo : ""}
                </small>

                ${v.descricao ? `<div class="jobhub-desc-mini">${escapeHTML(v.descricao)}</div>` : ""}

                <div class="jobhub-row-meta">
                  ${salarioTxt ? `<span class="jobhub-pill"><i class="fa-solid fa-money-bill-wave"></i> ${escapeHTML(salarioTxt)}</span>` : ""}
                  ${urgent}
                  ${conf}
                </div>
              </div>

              <div class="jobhub-actions">
                <a class="jobhub-btn-sm primary" href="${href}">
                  <i class="fa-solid fa-arrow-right"></i> Ver vaga
                </a>
                <a class="jobhub-btn-sm" href="<?= URL_BASE ?>pesquisar">
                  <i class="fa-regular fa-compass"></i> Buscar
                </a>
              </div>
            </article>
          `;
                }).join("");
            }

            async function tryFetchArray(url) {
                const resp = await fetch(url, {
                    method: "GET"
                });
                const raw = await resp.text().catch(() => "");
                let data = null;
                try {
                    data = raw ? JSON.parse(raw) : null;
                } catch {}

                if (!resp.ok) {
                    const msg = (data && (data.mensagem || data.message || data.error)) || raw || `HTTP ${resp.status}`;
                    throw new Error(msg);
                }

                const arr = Array.isArray(data) ?
                    data :
                    (Array.isArray(data?.content) ? data.content : (Array.isArray(data?.data) ? data.data : []));
                return arr;
            }

            async function loadFeatured() {
                setDisplay(featuredError, false);
                renderSkeleton(6);

                const endpoints = [
                    `${API_BASE}/vagas/list`,
                    `${API_BASE}/vagas`,
                ];

                let lastErr = null;

                try {
                    for (const url of endpoints) {
                        try {
                            const arr = await tryFetchArray(url);
                            state.vagas = (arr || []).map(normalizeVagaFromApi);
                            renderFeatured();
                            return;
                        } catch (e) {
                            lastErr = e;
                        }
                    }

                    // fallback visual (se nada responder)
                    throw lastErr || new Error("Sem rotas públicas de vagas disponíveis.");
                } catch (e) {
                    state.vagas = [];
                    renderFeatured();

                    setDisplay(featuredError, true);
                    if (featuredErrorMsg) featuredErrorMsg.textContent = String(e?.message || e || "Erro.");
                }
            }

            /* ---------- Eventos (busca/ordenar/chips) ---------- */
            let t = null;
            search?.addEventListener("input", () => {
                clearTimeout(t);
                t = setTimeout(() => {
                    state.query = String(search.value || "");
                    renderFeatured();
                }, 120);
            });

            clear?.addEventListener("click", () => {
                if (search) search.value = "";
                state.query = "";
                search?.focus();
                renderFeatured();
            });

            sort?.addEventListener("change", () => {
                state.sort = sort.value || "recent";
                renderFeatured();
            });

            chips?.addEventListener("click", (e) => {
                const btn = e.target.closest(".jobhub-chip");
                if (!btn) return;
                chips.querySelectorAll(".jobhub-chip").forEach(b => b.classList.remove("active"));
                btn.classList.add("active");
                state.filtro = btn.getAttribute("data-f") || "todas";
                renderFeatured();
            });

            featuredRetry?.addEventListener("click", () => {
                toast("Recarregando vagas...");
                loadFeatured();
            });

            /* ---------- Boot ---------- */
            window.addEventListener("DOMContentLoaded", () => {
                loadFeatured();
            });
        })();
    </script>
    <script>
        (() => {
            "use strict";

            const API_BASE = window.JobHub_API_BASE || "";

            // Modal
            const modal = document.getElementById("jobhubAlertModal");
            const btnOpen = document.getElementById("btnAlertOpen");
            const btnClose = document.getElementById("jobhubAlertClose");
            const btnCancel = document.getElementById("jobhubAlertCancel");
            const form = document.getElementById("jobhubAlertForm");
            const btnSave = document.getElementById("jobhubAlertSave");

            // Fields
            const emailEl = document.getElementById("jobhubAlertEmail");
            const cargoEl = document.getElementById("jobhubAlertCargo");
            const regionEl = document.getElementById("jobhubAlertRegion");
            const ufEl = document.getElementById("jobhubAlertUF");

            // Errors
            const emailErr = document.getElementById("jobhubAlertEmailErr");

            // Hero (pra pré-preencher)
            const heroForm = document.getElementById("heroSearch");
            const heroQ = heroForm?.querySelector('input[name="q"]');
            const heroCity = heroForm?.querySelector('input[name="city"]');

            const UF_NAME = {
                AC: "Acre",
                AL: "Alagoas",
                AP: "Amapá",
                AM: "Amazonas",
                BA: "Bahia",
                CE: "Ceará",
                DF: "Distrito Federal",
                ES: "Espírito Santo",
                GO: "Goiás",
                MA: "Maranhão",
                MT: "Mato Grosso",
                MS: "Mato Grosso do Sul",
                MG: "Minas Gerais",
                PA: "Pará",
                PB: "Paraíba",
                PR: "Paraná",
                PE: "Pernambuco",
                PI: "Piauí",
                RJ: "Rio de Janeiro",
                RN: "Rio Grande do Norte",
                RS: "Rio Grande do Sul",
                RO: "Rondônia",
                RR: "Roraima",
                SC: "Santa Catarina",
                SP: "São Paulo",
                SE: "Sergipe",
                TO: "Tocantins"
            };

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            function setErr(msg) {
                if (emailErr) emailErr.textContent = msg || "";
                if (emailEl) emailEl.style.borderColor = msg ? "rgba(239,68,68,.55)" : "";
            }

            function openModal() {
                if (!modal) return;

                // pré-preenche do hero
                if (cargoEl && !cargoEl.value) cargoEl.value = (heroQ?.value || "").trim();

                // se quiser puxar "cidade" do hero, dá pra converter em default de região/uf depois.
                // aqui eu só guardo o e-mail salvo:
                const lsEmail = (localStorage.getItem("email") || "").trim();
                if (emailEl && !emailEl.value && lsEmail) emailEl.value = lsEmail;

                setErr("");
                modal.classList.add("open");
                modal.setAttribute("aria-hidden", "false");
                document.body.classList.add("jobhub-modal-open");
                setTimeout(() => emailEl?.focus(), 60);
            }

            function closeModal() {
                if (!modal) return;
                modal.classList.remove("open");
                modal.setAttribute("aria-hidden", "true");
                document.body.classList.remove("jobhub-modal-open");
            }

            async function postAlerta(payload) {
                const resp = await fetch(`${API_BASE}/alerta`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify(payload)
                });

                const text = await resp.text().catch(() => "");
                if (!resp.ok) throw new Error(text || `HTTP ${resp.status}`);
                return text;
            }

            function buildCidade() {
                // ✅ mantém contrato da API: "cidade" string
                const uf = (ufEl?.value || "").trim().toUpperCase();
                const region = (regionEl?.value || "").trim();

                if (uf && UF_NAME[uf]) return `${UF_NAME[uf]} (${uf})`;
                if (region) return region;

                // fallback: se o hero tem city digitado, usa isso
                const heroTypedCity = (heroCity?.value || "").trim();
                if (heroTypedCity) return heroTypedCity;

                return "";
            }

            function setLoading(on) {
                if (!btnSave) return;
                btnSave.disabled = !!on;
                btnSave.style.opacity = on ? ".75" : "";
                btnSave.style.cursor = on ? "not-allowed" : "";
            }

            btnOpen?.addEventListener("click", openModal);
            btnClose?.addEventListener("click", closeModal);
            btnCancel?.addEventListener("click", closeModal);

            modal?.addEventListener("mousedown", (e) => {
                if (e.target === modal) closeModal();
            });
            document.addEventListener("keydown", (e) => {
                if (e.key === "Escape" && modal?.classList.contains("open")) closeModal();
            });

            form?.addEventListener("submit", async (e) => {
                e.preventDefault();

                const email = (emailEl?.value || "").trim();
                const cargo = (cargoEl?.value || "").trim();
                const cidade = buildCidade(); // <- agora vem de UF/Região

                if (!email) return setErr("Informe seu e-mail.");
                if (!emailRegex.test(email)) return setErr("E-mail inválido.");

                setErr("");
                setLoading(true);

                try {
                    await postAlerta({
                        email,
                        cargo,
                        cidade
                    }); // ✅ não manda campos extras (API safe)
                    localStorage.setItem("email", email);

                    btnSave.innerHTML = '<i class="fa-solid fa-check"></i> Salvo!';
                    setTimeout(() => {
                        btnSave.innerHTML = '<i class="fa-solid fa-check"></i> Salvar alerta';
                        closeModal();
                    }, 650);

                } catch (err) {
                    setErr(String(err?.message || err));
                } finally {
                    setLoading(false);
                }
            });
        })();
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const elRegion = document.getElementById("jobhubAlertRegion");
            const elUF = document.getElementById("jobhubAlertUF");

            if (!elRegion || !elUF) {
                console.log("Não achei selects", {
                    elRegion,
                    elUF
                });
                return;
            }

            const UF_NAME = {
                AC: "Acre",
                AL: "Alagoas",
                AP: "Amapá",
                AM: "Amazonas",
                BA: "Bahia",
                CE: "Ceará",
                DF: "Distrito Federal",
                ES: "Espírito Santo",
                GO: "Goiás",
                MA: "Maranhão",
                MT: "Mato Grosso",
                MS: "Mato Grosso do Sul",
                MG: "Minas Gerais",
                PA: "Pará",
                PB: "Paraíba",
                PR: "Paraná",
                PE: "Pernambuco",
                PI: "Piauí",
                RJ: "Rio de Janeiro",
                RN: "Rio Grande do Norte",
                RS: "Rio Grande do Sul",
                RO: "Rondônia",
                RR: "Roraima",
                SC: "Santa Catarina",
                SP: "São Paulo",
                SE: "Sergipe",
                TO: "Tocantins"
            };

            const UF_REGION = {
                AC: "Norte",
                AL: "Nordeste",
                AP: "Norte",
                AM: "Norte",
                BA: "Nordeste",
                CE: "Nordeste",
                DF: "Centro-Oeste",
                ES: "Sudeste",
                GO: "Centro-Oeste",
                MA: "Nordeste",
                MT: "Centro-Oeste",
                MS: "Centro-Oeste",
                MG: "Sudeste",
                PA: "Norte",
                PB: "Nordeste",
                PR: "Sul",
                PE: "Nordeste",
                PI: "Nordeste",
                RJ: "Sudeste",
                RN: "Nordeste",
                RS: "Sul",
                RO: "Norte",
                RR: "Norte",
                SC: "Sul",
                SP: "Sudeste",
                SE: "Nordeste",
                TO: "Norte"
            };

            const REGIONS = ["Norte", "Nordeste", "Centro-Oeste", "Sudeste", "Sul"];

            function ufLabel(uf) {
                uf = String(uf || "").toUpperCase().trim();
                return UF_NAME[uf] ? `${UF_NAME[uf]} (${uf})` : uf;
            }

            function renderRegions() {
                elRegion.innerHTML = `<option value="">Todas</option>` +
                    REGIONS.map(r => `<option value="${r}">${r}</option>`).join("");
            }

            function renderUFs(regionSel = "") {
                const allUFs = Object.keys(UF_NAME);
                const ufs = regionSel ? allUFs.filter(uf => UF_REGION[uf] === regionSel) : allUFs;

                ufs.sort((a, b) => ufLabel(a).localeCompare(ufLabel(b), "pt-BR"));

                elUF.innerHTML = `<option value="">Todos</option>` +
                    ufs.map(uf => `<option value="${uf}">${ufLabel(uf)}</option>`).join("");
            }

            renderRegions();
            renderUFs("");

            elRegion.addEventListener("change", () => {
                const prev = elUF.value || "";
                renderUFs(elRegion.value || "");
                if (prev && [...elUF.options].some(o => o.value === prev)) elUF.value = prev;
            });

            console.log("Regiões/UF carregados ✅");
        });
    </script>
    <script>
        (() => {
            const form = document.getElementById("heroSearch");
            if (!form) return;

        })();
        (() => {
            const BASE = "<?= URL_BASE ?>";
            document.querySelectorAll(".empresaDemo-categorias .cat-card").forEach(card => {
                card.style.cursor = "pointer";
                card.addEventListener("click", () => {
                    const label = card.querySelector("p")?.innerText?.trim() || "";
                    if (!label) return;

                    // manda nos dois parâmetros (compat total)
                    const url = `${BASE}pesquisar?q=${encodeURIComponent(label)}`;
                    window.location.href = url;
                });
            });
        })();
    </script>
</body>

</html>