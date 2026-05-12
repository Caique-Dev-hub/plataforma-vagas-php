<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>Meu Perfil</title>

    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>
        :root {
            --bg: #f1f3fb;
            --bgSoft: #e5ecff;
            --cardGlass: rgba(255, 255, 255, .84);
            --cardSolid: #ffffff;
            --text: #020617;
            --muted: #64748b;
            --line: #d4d8e5;
            --accent: #6e88a7;
            --accentSoft: rgba(37, 99, 235, .14);
            --accentStrong: #9cafc9;
            --danger: #ef4444;
            --success: #16a34a;
            --warning: #eab308;
            --shadow: 0 22px 55px rgba(15, 23, 42, .18);
            --shadowSoft: 0 14px 40px rgba(15, 23, 42, .14);
            --radiusXl: 26px;
            --radiusLg: 22px;
            --radius: 16px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            color: var(--text);
            background:
                radial-gradient(1400px 700px at 10% 0%, var(--accentSoft), transparent 55%),
                radial-gradient(1100px 550px at 95% 0%, rgba(56, 189, 248, .14), transparent 55%),
                var(--bg);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            font-family: inherit;
        }

        /* ================= HEADER ================= */
        .pf-header {
            position: sticky;
            top: 0;
            z-index: 40;
            backdrop-filter: blur(12px);
            background: linear-gradient(180deg,
                    rgba(241, 243, 251, .97) 0%,
                    rgba(241, 243, 251, .92) 60%,
                    rgba(241, 243, 251, .0) 100%);
            border-bottom: 1px solid rgba(212, 216, 229, .9);
        }

        .pf-header-inner {
            max-width: 1250px;
            margin: 0 auto;
            padding: 14px 22px;
            display: grid;
            grid-template-columns: auto 1fr auto;
            align-items: center;
            gap: 18px;
        }

        .pf-logo img {
            height: 32px;
            display: block;
        }

        .pf-title {
            min-width: 0;
        }

        .pf-title strong {
            display: block;
            font-size: 17px;
            letter-spacing: .25px;
        }

        .pf-title small {
            display: block;
            font-size: 13px;
            color: var(--muted);
            margin-top: 3px;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .pf-back {
            border: 1px solid var(--line);
            background: #ffffff;
            color: var(--text);
            border-radius: 999px;
            padding: 9px 16px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            font-size: 13.5px;
            font-weight: 600;
            transition: .16s ease;
        }

        .pf-back i {
            font-size: 13px;
        }

        .pf-back:hover {
            transform: translateY(-1px);
            box-shadow: 0 14px 32px rgba(15, 23, 42, .22);
        }

        @media (max-width: 720px) {
            .pf-header-inner {
                grid-template-columns: auto auto;
                grid-template-areas:
                    "logo back"
                    "title title";
                row-gap: 8px;
                padding-inline: 14px;
            }

            .pf-logo {
                grid-area: logo;
            }

            .pf-title {
                grid-area: title;
            }

            .pf-back {
                grid-area: back;
                justify-self: end;
            }
        }

        /* ================= LAYOUT GERAL ================= */
        .pf-wrap {
            padding: 22px 18px 34px;
        }

        .pf-shell {
            max-width: 1250px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 300px minmax(0, 1fr);
            gap: 22px;
            align-items: flex-start;
        }

        @media (max-width: 980px) {
            .pf-shell {
                grid-template-columns: minmax(0, 1fr);
            }
        }

        /* ================= SIDEBAR ================= */
        .pf-sidebar {
            background: var(--cardGlass);
            border-radius: var(--radiusXl);
            border: 1px solid rgba(212, 216, 229, .97);
            box-shadow: var(--shadowSoft);
            padding: 18px 16px 16px;
        }

        .pf-sidebar-top {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-bottom: 14px;
        }

        .pf-sidebar-identity {
            min-width: 0;
        }

        .pf-sidebar-identity h1 {
            font-size: 19px;
            margin: 0;
            line-height: 1.25;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .pf-sidebar-identity p {
            margin: 6px 0 0;
            font-size: 13px;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 6px;
            min-width: 0;
        }

        .pf-sidebar-identity p i {
            font-size: 13px;
        }

        .pf-status-row {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .pf-pill {
            border-radius: 999px;
            font-size: 11.5px;
            padding: 5px 9px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: 1px solid rgba(212, 216, 229, 1);
            background: rgba(255, 255, 255, .9);
            color: var(--muted);
        }

        .pf-pill i {
            font-size: 11px;
        }

        .pf-pill.primary {
            border-color: rgba(37, 99, 235, .25);
            background: rgba(37, 99, 235, .08);
            color: var(--accentStrong);
        }

        .pf-pill.status-ok {
            border-color: rgba(22, 163, 74, .35);
            background: rgba(22, 163, 74, .08);
            color: var(--success);
        }

        .pf-pill.status-review {
            border-color: rgba(234, 179, 8, .35);
            background: rgba(234, 179, 8, .08);
            color: var(--warning);
        }

        /* Barra de força do perfil */
        .pf-progress-box {
            margin: 14px 0 16px;
            padding: 12px 12px 13px;
            border-radius: 16px;
            background: rgba(248, 250, 252, .9);
            border: 1px solid rgba(212, 216, 229, .97);
        }

        .pf-progress-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 12.5px;
            margin-bottom: 6px;
        }

        .pf-progress-top span {
            color: var(--muted);
        }

        .pf-progress-top strong {
            font-size: 14px;
            color: var(--accentStrong);
        }

        .pf-progress-bar {
            position: relative;
            height: 9px;
            border-radius: 999px;
            background: #e5e7eb;
            overflow: hidden;
        }

        .pf-progress-fill {
            position: absolute;
            inset: 0;
            width: 0%;
            border-radius: inherit;
            background: linear-gradient(90deg, #22c55e, #16a34a, #15803d);
            transition: width .4s ease;
        }

        .pf-progress-hint {
            margin-top: 7px;
            font-size: 11.5px;
            color: var(--muted);
        }

        .pf-sidebar-actions {
            display: flex;
            flex-direction: column;
            gap: 7px;
            margin-bottom: 14px;
        }

        .pf-btn {
            border-radius: 999px;
            border: none;
            padding: 10px 13px;
            font-size: 13.5px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: .16s ease;
        }

        .pf-btn-primary {
            background: linear-gradient(90deg, #6e88a7, #9cafc9);
            color: #f9fafb;
            box-shadow: 0 14px 30px rgba(37, 99, 235, .4);
        }

        .pf-btn-primary:hover {
            transform: translateY(-1px);
        }

        .pf-btn-ghost {
            background: #ffffff;
            color: var(--text);
            border: 1px solid var(--line);
        }

        .pf-btn-ghost:hover {
            background: #f9fafb;
        }

        .pf-sidebar-menu {
            margin-top: 6px;
            border-top: 1px solid rgba(212, 216, 229, .9);
            padding-top: 10px;
            display: grid;
            gap: 4px;
        }

        .pf-sidebar-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 13px;
            padding: 8px 6px;
            border-radius: 11px;
            color: var(--muted);
            cursor: default;
        }

        .pf-sidebar-link span {
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .pf-sidebar-link span i {
            font-size: 13px;
        }

        .pf-sidebar-link.active {
            background: rgba(37, 99, 235, .08);
            color: var(--accentStrong);
        }

        .pf-sidebar-link strong {
            font-size: 11.5px;
            color: var(--accentStrong);
        }

        /* ================= MAIN ================= */
        .pf-main {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .pf-tabs {
            background: rgba(255, 255, 255, .9);
            border-radius: var(--radiusXl);
            border: 1px solid rgba(212, 216, 229, .97);
            box-shadow: var(--shadowSoft);
            padding: 9px 12px;
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
        }

        .pf-tab {
            border-radius: 999px;
            padding: 8px 14px;
            font-size: 13px;
            border: 1px solid transparent;
            background: transparent;
            color: var(--muted);
            display: inline-flex;
            align-items: center;
            gap: 7px;
            cursor: default;
        }

        .pf-tab i {
            font-size: 13px;
        }

        .pf-tab.active {
            background: rgba(37, 99, 235, .08);
            border-color: rgba(37, 99, 235, .26);
            color: var(--accentStrong);
        }

        /* Hero resumo */
        .pf-hero {
            border: 1px solid rgba(212, 216, 229, .97);
            background: var(--cardGlass);
            backdrop-filter: blur(12px);
            border-radius: var(--radiusXl);
            box-shadow: var(--shadow);
            padding: 18px 18px 15px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .pf-hero-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 14px;
        }

        .pf-hero-left {
            min-width: 0;
        }

        .pf-hero-name {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 6px;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .pf-muted-row {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
            font-size: 13px;
            color: var(--muted);
        }

        .pf-muted-row span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .pf-muted-row i {
            font-size: 13px;
        }

        .pf-chips {
            margin-top: 9px;
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
        }

        .chip {
            border-radius: 999px;
            padding: 6px 10px;
            font-size: 12px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: 1px solid rgba(212, 216, 229, 1);
            background: rgba(255, 255, 255, .96);
            color: var(--muted);
        }

        .chip i {
            font-size: 12px;
        }

        .chip.primary {
            border-color: rgba(37, 99, 235, .26);
            background: rgba(37, 99, 235, .08);
            color: var(--accentStrong);
        }

        .chip.status-ok {
            border-color: rgba(22, 163, 74, .35);
            background: rgba(22, 163, 74, .08);
            color: var(--success);
        }

        .chip.status-review {
            border-color: rgba(234, 179, 8, .35);
            background: rgba(234, 179, 8, .08);
            color: var(--warning);
        }

        .pf-hero-right {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 8px;
            flex: 0 0 auto;
        }

        .pf-metric-row {
            display: flex;
            gap: 8px;
            font-size: 12px;
            color: var(--muted);
        }

        .pf-metric-row span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .pf-metric-row i {
            font-size: 13px;
        }

        .pf-hero-bottom {
            margin-top: 8px;
            padding-top: 9px;
            border-top: 1px dashed rgba(212, 216, 229, .97);
            font-size: 12.5px;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .pf-hero-bottom i {
            font-size: 13px;
            color: var(--accent);
        }

        /* GRID PRINCIPAL */
        .pf-grid {
            margin-top: 12px;
            display: grid;
            grid-template-columns: minmax(0, 1.15fr);
            gap: 14px;
        }

        @media (max-width: 980px) {
            .pf-grid {
                grid-template-columns: minmax(0, 1fr);
            }
        }

        .pf-card {
            background: rgba(255, 255, 255, .94);
            border: 1px solid rgba(212, 216, 229, .98);
            border-radius: var(--radiusXl);
            box-shadow: var(--shadowSoft);
            overflow: hidden;
        }

        .pf-card-head {
            padding: 14px 16px 11px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            border-bottom: 1px solid rgba(212, 216, 229, .97);
        }

        .pf-card-head h2 {
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 9px;
            margin: 0;
        }

        .pf-card-head h2 i {
            font-size: 15px;
            color: var(--accentStrong);
        }

        .pf-tag {
            font-size: 12px;
            color: var(--muted);
            background: rgba(248, 250, 252, .95);
            border: 1px solid rgba(212, 216, 229, .97);
            padding: 7px 10px;
            border-radius: 999px;
        }

        .pf-card-body {
            padding: 13px 16px 16px;
        }

        /* Timeline */
        .pf-timeline {
            display: flex;
            flex-direction: column;
            gap: 11px;
        }

        .t-item {
            position: relative;
            border: 1px solid rgba(212, 216, 229, .98);
            border-radius: 18px;
            background: rgba(255, 255, 255, .98);
            padding: 11px 12px;
            opacity: 0;
            transform: translateY(10px);
        }

        .t-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 10px;
        }

        .t-title {
            font-weight: 700;
            font-size: 13.5px;
            line-height: 1.3;
        }

        .t-sub {
            margin-top: 4px;
            color: var(--muted);
            font-size: 12.5px;
        }

        .t-badge {
            flex: 0 0 auto;
            font-size: 11.5px;
            padding: 6px 9px;
            border-radius: 999px;
            border: 1px solid rgba(37, 99, 235, .22);
            background: rgba(37, 99, 235, .06);
            color: var(--accentStrong);
        }

        .t-desc {
            margin-top: 8px;
            color: #334155;
            font-size: 12.5px;
            line-height: 1.45;
            white-space: pre-wrap;
        }

        @keyframes slideInPulse {
            0% {
                opacity: 0;
                transform: translateY(12px);
                box-shadow: 0 0 0 0 rgba(37, 99, 235, 0);
            }

            60% {
                opacity: 1;
                transform: translateY(0);
                box-shadow: 0 10px 30px rgba(37, 99, 235, .25);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
                box-shadow: 0 0 0 0 rgba(37, 99, 235, 0);
            }
        }

        .t-item-animated {
            animation: slideInPulse .6s ease forwards;
        }

        /* Empty */
        .pf-empty {
            display: flex;
            gap: 11px;
            align-items: flex-start;
            border: 1px dashed rgba(148, 163, 184, .85);
            background: rgba(248, 250, 252, .92);
            border-radius: 18px;
            padding: 11px 11px;
            color: var(--muted);
            font-size: 12.5px;
            margin-top: 3px;
        }

        .pf-empty i {
            font-size: 17px;
            color: var(--accent);
            margin-top: 2px;
        }

        .pf-empty strong {
            display: block;
            color: var(--text);
            font-size: 12.5px;
        }

        .pf-empty p {
            margin: 4px 0 0;
            font-size: 12.5px;
            line-height: 1.35;
        }

        /* ================= VAGAS RECOMENDADAS ================= */
        .jobs-section {
            margin-top: 20px;
            background: rgba(255, 255, 255, .96);
            border-radius: var(--radiusXl);
            border: 1px solid rgba(212, 216, 229, .98);
            box-shadow: var(--shadowSoft);
            padding: 18px 18px 18px;
        }

        .jobs-head {
            display: flex;
            justify-content: space-between;
            gap: 14px;
            align-items: center;
            border-bottom: 1px solid rgba(212, 216, 229, .95);
            padding-bottom: 10px;
        }

        .jobs-head-left h2 {
            margin: 0;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .jobs-head-left h2 i {
            font-size: 17px;
            color: var(--accentStrong);
        }

        .jobs-head-left p {
            margin: 4px 0 0;
            font-size: 13px;
            color: var(--muted);
        }

        .jobs-filters {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
            font-size: 12.5px;
        }

        .jobs-filter-pill {
            border-radius: 999px;
            padding: 6px 10px;
            border: 1px solid rgba(212, 216, 229, .97);
            background: rgba(248, 250, 252, .96);
            color: var(--muted);
            display: inline-flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
        }

        .jobs-filter-pill i {
            font-size: 12px;
        }

        .jobs-filter-pill.active {
            border-color: rgba(37, 99, 235, .26);
            background: rgba(37, 99, 235, .08);
            color: var(--accentStrong);
        }

        .jobs-body {
            margin-top: 12px;
            display: grid;
            gap: 10px;
        }

        .job-card {
            border-radius: 18px;
            border: 1px solid rgba(212, 216, 229, .98);
            background: rgba(255, 255, 255, .98);
            padding: 13px 13px 12px;
            display: grid;
            grid-template-columns: minmax(0, 2.2fr) minmax(0, 1.6fr);
            gap: 12px;
            position: relative;
            overflow: hidden;
        }

        @media (max-width: 960px) {
            .job-card {
                grid-template-columns: minmax(0, 1fr);
            }
        }

        .job-main-title {
            font-size: 14.5px;
            font-weight: 700;
            margin-bottom: 3px;
        }

        .job-company-line {
            font-size: 13px;
            color: var(--muted);
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center;
        }

        .job-company-line span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .job-company-line i {
            font-size: 12px;
        }

        .job-tags {
            margin-top: 8px;
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            font-size: 11.5px;
        }

        .job-tag {
            border-radius: 999px;
            padding: 5px 9px;
            background: rgba(248, 250, 252, .98);
            border: 1px solid rgba(226, 232, 240, 1);
            color: var(--muted);
        }

        .job-summary {
            margin-top: 7px;
            font-size: 12.5px;
            color: #334155;
            line-height: 1.4;
        }

        .job-right {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            justify-content: space-between;
            gap: 8px;
        }

        .job-match-box {
            text-align: right;
        }

        .job-match-label {
            font-size: 11.5px;
            color: var(--muted);
            margin-bottom: 3px;
        }

        .job-match-value {
            font-size: 14px;
            font-weight: 700;
            color: var(--accentStrong);
        }

        .job-match-bar {
            margin-top: 5px;
            height: 6px;
            border-radius: 999px;
            background: #e5e7eb;
            overflow: hidden;
            width: 140px;
        }

        .job-match-fill {
            height: 100%;
            width: 0;
            border-radius: inherit;
            background: linear-gradient(90deg, #22c55e, #16a34a, #15803d);
            transition: width .4s ease;
        }

        .job-meta {
            font-size: 11.5px;
            color: var(--muted);
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 3px;
        }

        .job-meta span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .job-meta i {
            font-size: 12px;
        }

        .job-actions {
            margin-top: 6px;
            display: flex;
            gap: 8px;
        }

        .job-btn {
            border-radius: 999px;
            border: 1px solid var(--line);
            padding: 7px 10px;
            font-size: 12.5px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #f9fafb;
            color: var(--text);
        }

        .job-btn-primary {
            border-color: rgba(37, 99, 235, .26);
            background: linear-gradient(90deg, #2563eb, #4f46e5);
            color: #f9fafb;
        }

        .job-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(220px 140px at 110% -20%, rgba(37, 99, 235, .16), transparent 60%);
            pointer-events: none;
        }

        .jobs-empty {
            border-radius: 18px;
            border: 1px dashed rgba(148, 163, 184, .9);
            background: rgba(248, 250, 252, .96);
            padding: 12px 12px;
            display: flex;
            gap: 10px;
            align-items: flex-start;
            font-size: 12.5px;
            color: var(--muted);
        }

        .jobs-empty i {
            font-size: 18px;
            color: var(--accent);
            margin-top: 2px;
        }

        .jobs-empty strong {
            color: var(--text);
            font-size: 13px;
        }

        .jobs-empty p {
            margin: 3px 0 0;
        }

        .job-card.is-hidden {
            display: none !important;
        }

        /* ================= RESPONSIVO FINO ================= */
        @media (max-width: 720px) {
            .pf-wrap {
                padding: 16px 12px 24px;
            }

            .pf-sidebar {
                border-radius: 22px;
            }

            .pf-hero {
                padding-inline: 14px;
            }

            .jobs-section {
                padding-inline: 14px;
            }
        }

        /* ================== FIX: EMAIL GRANDE SEM QUEBRAR CARD ================== */
        #emailUsuario,
        #emailUsuarioHero {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            word-break: break-word;
            overflow-wrap: anywhere;
            line-height: 1.25;
            cursor: default;
        }

        /* ================= VÍDEO DE APRESENTAÇÃO ================= */
        .pf-video-grid {
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            gap: 14px;
            align-items: start;
        }

        @media (max-width: 980px) {
            .pf-video-grid {
                grid-template-columns: 1fr;
            }
        }

        .pf-video-title {
            margin: 0 0 6px;
            font-size: 14px;
            font-weight: 800;
            color: #0f172a;
        }

        .pf-video-text {
            margin: 0;
            font-size: 12.8px;
            color: #334155;
            line-height: 1.45;
        }

        .pf-video-tips {
            margin: 10px 0 0;
            padding: 0;
            list-style: none;
            display: grid;
            gap: 6px;
            font-size: 12.5px;
            color: var(--muted);
        }

        .pf-video-tips li {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .pf-video-tips i {
            color: var(--accent);
        }

        .pf-video-preview-wrap {
            border-radius: 18px;
            border: 1px solid rgba(212, 216, 229, .98);
            background: rgba(248, 250, 252, .98);
            overflow: hidden;
            position: relative;
        }

        .pf-video-empty {
            min-height: 220px;
            padding: 14px 14px;
            display: flex;
            gap: 12px;
            align-items: flex-start;
            color: var(--muted);
        }

        .pf-video-empty i {
            font-size: 22px;
            color: var(--accent);
            margin-top: 2px;
        }

        .pf-video-empty strong {
            display: block;
            color: var(--text);
            font-size: 13px;
        }

        .pf-video-empty p {
            margin: 4px 0 0;
            font-size: 12.5px;
            line-height: 1.35;
        }

        .pf-video-preview {
            width: 100%;
            height: auto;
            display: block;
            aspect-ratio: 16/9;
            background: #0b1220;
        }

        .pf-video-actions {
            margin-top: 12px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
        }

        .pf-video-hint {
            font-size: 12px;
            color: #64748b;
        }

        .pf-video-meta {
            margin-top: 10px;
            padding: 9px 11px;
            border-radius: 14px;
            background: rgba(248, 250, 252, .96);
            border: 1px solid rgba(212, 216, 229, .97);
            color: #334155;
            font-size: 12.5px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        /* ================= MINHAS CANDIDATURAS (premium) ================= */
        #minhasCandidaturas .pf-card-body {
            padding-top: 12px;
        }

        .mc-toolbar {
            display: flex;
            gap: 12px;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 12px;
        }

        .mc-chips {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .mc-chip {
            border: 1px solid rgba(212, 216, 229, .98);
            background: rgba(248, 250, 252, .96);
            color: var(--muted);
            border-radius: 999px;
            padding: 7px 11px;
            font-size: 12.5px;
            font-weight: 600;
            cursor: pointer;
            transition: .15s ease;
        }

        .mc-chip:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(15, 23, 42, .08);
        }

        .mc-chip.active {
            border-color: rgba(37, 99, 235, .28);
            background: rgba(37, 99, 235, .08);
            color: var(--accentStrong);
        }

        .mc-actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .mc-search {
            width: min(340px, 80vw);
            border: 1px solid rgba(212, 216, 229, .98);
            background: rgba(248, 250, 252, .96);
            border-radius: 999px;
            padding: 10px 12px;
            font-size: 13px;
            outline: none;
        }

        .mc-search:focus {
            border-color: rgba(37, 99, 235, .42);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, .12);
        }

        .mc-list {
            display: grid;
            gap: 10px;
        }

        .mc-item {
            position: relative;
            border-radius: 18px;
            border: 1px solid rgba(212, 216, 229, .98);
            background: rgba(255, 255, 255, .98);
            padding: 12px 12px;
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto;
            gap: 12px;
            overflow: hidden;
            transition: .16s ease;
        }

        .mc-item::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(260px 160px at 110% -20%, rgba(37, 99, 235, .14), transparent 60%);
            pointer-events: none;
        }

        .mc-item:hover {
            transform: translateY(-1px);
            box-shadow: 0 18px 44px rgba(15, 23, 42, .12);
        }

        .mc-title {
            font-size: 14.5px;
            font-weight: 900;
            color: #0f172a;
            line-height: 1.2;
            margin: 0 0 6px 0;
        }

        .mc-meta {
            font-size: 12.5px;
            color: var(--muted);
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
            line-height: 1.5;
        }

        .mc-meta span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .mc-meta i {
            font-size: 12px;
        }

        .mc-right {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            justify-content: space-between;
            gap: 10px;
            min-width: 180px;
        }

        .mc-pill {
            border-radius: 999px;
            padding: 7px 10px;
            font-size: 12px;
            font-weight: 800;
            border: 1px solid rgba(212, 216, 229, .98);
            background: rgba(248, 250, 252, .96);
            color: var(--muted);
            white-space: nowrap;
        }

        .mc-pill.warn {
            border-color: rgba(234, 179, 8, .35);
            background: rgba(234, 179, 8, .10);
            color: #854d0e;
        }

        .mc-pill.ok {
            border-color: rgba(22, 163, 74, .35);
            background: rgba(22, 163, 74, .10);
            color: #166534;
        }

        .mc-pill.bad {
            border-color: rgba(239, 68, 68, .35);
            background: rgba(239, 68, 68, .10);
            color: #991b1b;
        }

        .mc-pill.neutral {
            border-color: rgba(37, 99, 235, .25);
            background: rgba(37, 99, 235, .08);
            color: var(--accentStrong);
        }

        .mc-btn {
            border-radius: 999px;
            border: 1px solid rgba(212, 216, 229, .98);
            background: #fff;
            color: #0f172a;
            padding: 9px 12px;
            font-size: 12.5px;
            font-weight: 800;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: .15s ease;
        }

        .mc-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 26px rgba(15, 23, 42, .12);
        }

        .mc-btn.primary {
            border-color: rgba(37, 99, 235, .28);
            background: linear-gradient(90deg, #6e88a7, #9cafc9);
            color: #fff;
        }

        @media (max-width: 720px) {
            .mc-item {
                grid-template-columns: minmax(0, 1fr);
            }

            .mc-right {
                min-width: 0;
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }
        }

        /* ========================= Drawer Detalhe da Vaga ========================= */
        .vaga-drawer {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: none;
        }

        .vaga-drawer.is-open {
            display: block;
        }

        .vaga-drawer-overlay {
            position: absolute;
            inset: 0;
            background: rgba(15, 23, 42, .55);
            backdrop-filter: blur(6px);
        }

        .vaga-drawer-panel {
            position: absolute;
            top: 0;
            right: 0;
            height: 100%;
            width: min(520px, 94vw);
            background: #fff;
            border-left: 1px solid rgba(212, 216, 229, .95);
            box-shadow: -24px 0 80px rgba(15, 23, 42, .35);
            display: flex;
            flex-direction: column;
            transform: translateX(110%);
            transition: transform .22s ease;
        }

        .vaga-drawer.is-open .vaga-drawer-panel {
            transform: translateX(0);
        }

        .vaga-drawer-head {
            padding: 16px 16px 12px;
            border-bottom: 1px solid rgba(212, 216, 229, .95);
            display: flex;
            justify-content: space-between;
            gap: 12px;
            align-items: flex-start;
        }

        .vaga-drawer-title {
            font-size: 16px;
            font-weight: 900;
            color: #0f172a;
            line-height: 1.2;
        }

        .vaga-drawer-sub {
            margin-top: 4px;
            font-size: 12.5px;
            color: #64748b;
        }

        .vaga-drawer-close {
            width: 34px;
            height: 34px;
            border-radius: 999px;
            border: none;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .vaga-drawer-body {
            padding: 14px 16px 16px;
            overflow: auto;
            flex: 1;
        }

        .vaga-drawer-section {
            margin-top: 12px;
        }

        .vaga-drawer-section h3 {
            margin: 0 0 6px;
            font-size: 13px;
            font-weight: 900;
            color: #0f172a;
        }

        .vaga-drawer-text {
            font-size: 15px;
            color: #334155;
            line-height: 1.55;
            white-space: pre-wrap;
        }

        .vaga-drawer-skeleton {
            border: 1px dashed rgba(148, 163, 184, .7);
            background: rgba(248, 250, 252, .96);
            border-radius: 16px;
            padding: 12px 12px;
            font-size: 13px;
            color: #64748b;
        }

        .vaga-drawer-foot {
            padding: 12px 16px 14px;
            border-top: 1px solid rgba(212, 216, 229, .95);
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            flex-wrap: wrap;
        }

        .vaga-drawer-btn {
            border-radius: 999px;
            border: 1px solid rgba(37, 99, 235, .26);
            background: linear-gradient(90deg, #2563eb, #4f46e5);
            color: #fff;
            padding: 10px 14px;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .vaga-drawer-btn.ghost {
            background: #fff;
            color: #0f172a;
            border: 1px solid rgba(212, 216, 229, .98);
        }

        /* ====== MODAIS (fix) ====== */
        .pf-modal {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: none;
            /* ESCONDE por padrão */
            align-items: center;
            justify-content: center;
            padding: 18px;
        }

        .pf-modal[aria-hidden="true"] {
            display: none;
            /* garante escondido */
        }

        .pf-modal.is-open {
            display: flex;
            /* abre quando tiver is-open */
        }

        .pf-modal-overlay {
            position: absolute;
            inset: 0;
            background: rgba(2, 6, 23, .55);
            backdrop-filter: blur(2px);
        }

        .pf-modal-dialog {
            position: relative;
            width: min(720px, 100%);
            max-height: calc(100vh - 36px);
            overflow: auto;
            border-radius: 18px;
            background: #fff;
            border: 1px solid rgba(148, 163, 184, .45);
            box-shadow: 0 20px 60px rgba(2, 6, 23, .25);
        }
    </style>
    <style>
        :root {
            --bg: #f1f3fb;
            --bgSoft: #e5ecff;
            --cardGlass: rgba(255, 255, 255, .84);
            --cardSolid: #ffffff;
            --text: #020617;
            --muted: #64748b;
            --line: #d4d8e5;
            --accent: #9cafc9;
            --accentSoft: rgba(37, 99, 235, .14);
            --accentStrong: #9cafc9;
            --danger: #ef4444;
            --success: #16a34a;
            --warning: #eab308;
            --shadow: 0 22px 55px rgba(15, 23, 42, .18);
            --shadowSoft: 0 14px 40px rgba(15, 23, 42, .14);
            --radiusXl: 26px;
            --radiusLg: 22px;
            --radius: 16px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            color: var(--text);
            background:
                radial-gradient(1400px 700px at 10% 0%, var(--accentSoft), transparent 55%),
                radial-gradient(1100px 550px at 95% 0%, rgba(56, 189, 248, .14), transparent 55%),
                var(--bg);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            font-family: inherit;
        }

        /* ================= HEADER ================= */

        .pf-header {
            position: sticky;
            top: 0;
            z-index: 40;
            backdrop-filter: blur(12px);
            background: linear-gradient(180deg,
                    rgba(241, 243, 251, .97) 0%,
                    rgba(241, 243, 251, .92) 60%,
                    rgba(241, 243, 251, .0) 100%);
            border-bottom: 1px solid rgba(212, 216, 229, .9);
        }

        .pf-header-inner {
            max-width: 1250px;
            margin: 0 auto;
            padding: 14px 22px;
            display: grid;
            grid-template-columns: auto 1fr auto;
            align-items: center;
            gap: 18px;
        }

        .pf-logo img {
            height: 72px;
            display: block;
        }

        .pf-title {
            min-width: 0;
        }

        .pf-title strong {
            display: block;
            font-size: 17px;
            letter-spacing: .25px;
        }

        .pf-title small {
            display: block;
            font-size: 13px;
            color: var(--muted);
            margin-top: 3px;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .pf-back {
            border: 1px solid var(--line);
            background: #ffffff;
            color: var(--text);
            border-radius: 999px;
            padding: 9px 16px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            font-size: 13.5px;
            font-weight: 600;
            transition: .16s ease;
        }

        .pf-back i {
            font-size: 13px;
        }

        .pf-back:hover {
            transform: translateY(-1px);
            box-shadow: 0 14px 32px rgba(15, 23, 42, .22);
        }

        @media (max-width: 720px) {
            .pf-header-inner {
                grid-template-columns: auto auto;
                grid-template-areas:
                    "logo back"
                    "title title";
                row-gap: 8px;
                padding-inline: 14px;
            }

            .pf-logo {
                grid-area: logo;
            }

            .pf-title {
                grid-area: title;
            }

            .pf-back {
                grid-area: back;
                justify-self: end;
            }
        }

        /* ================= LAYOUT GERAL ================= */

        .pf-wrap {
            padding: 22px 18px 34px;
        }

        .pf-shell {
            max-width: 1250px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 300px minmax(0, 1fr);
            gap: 22px;
            align-items: flex-start;
        }

        @media (max-width: 980px) {
            .pf-shell {
                grid-template-columns: minmax(0, 1fr);
            }
        }

        /* ================= SIDEBAR ================= */

        .pf-sidebar {
            background: var(--cardGlass);
            border-radius: var(--radiusXl);
            border: 1px solid rgba(212, 216, 229, .97);
            box-shadow: var(--shadowSoft);
            padding: 18px 16px 16px;
        }

        .pf-sidebar-top {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 14px;
        }

        .pf-avatar-wrapper {
            position: relative;
            flex: 0 0 auto;
        }

        .pf-avatar {
            width: 82px;
            height: 82px;
            border-radius: 26px;
            background: linear-gradient(135deg, #2563eb, #4f46e5);
            color: #e0edff;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 24px 50px rgba(37, 99, 235, .42);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .pf-avatar i {
            font-size: 32px;
        }

        .pf-avatar-overlay {
            position: absolute;
            inset: auto 0 0 0;
            height: 42%;
            background: linear-gradient(to top,
                    rgba(15, 23, 42, .82),
                    rgba(15, 23, 42, .0));
            color: #e5e7eb;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            padding-bottom: 6px;
            font-size: 11px;
            font-weight: 500;
            gap: 6px;
            opacity: 0;
            pointer-events: none;
            transition: .18s ease;
        }

        .pf-avatar:hover .pf-avatar-overlay {
            opacity: 1;
            pointer-events: auto;
        }

        .pf-avatar-overlay i {
            font-size: 11px;
        }

        .pf-avatar-edit-badge {
            position: absolute;
            right: -3px;
            bottom: -3px;
            width: 26px;
            height: 26px;
            border-radius: 999px;
            background: #f9fafb;
            border: 1px solid rgba(148, 163, 184, .9);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accentStrong);
            font-size: 12px;
            box-shadow: 0 10px 22px rgba(15, 23, 42, .3);
        }

        .pf-sidebar-identity {
            min-width: 0;
        }

        .pf-sidebar-identity h1 {
            font-size: 19px;
            margin: 0;
            line-height: 1.25;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .pf-sidebar-identity p {
            margin: 6px 0 0;
            font-size: 13px;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .pf-sidebar-identity p i {
            font-size: 13px;
        }

        .pf-status-row {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .pf-pill {
            border-radius: 999px;
            font-size: 11.5px;
            padding: 5px 9px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: 1px solid rgba(212, 216, 229, 1);
            background: rgba(255, 255, 255, .9);
            color: var(--muted);
        }

        .pf-pill i {
            font-size: 11px;
        }

        .pf-pill.primary {
            border-color: rgba(37, 99, 235, .25);
            background: rgba(37, 99, 235, .08);
            color: var(--accentStrong);
        }

        .pf-pill.status-ok {
            border-color: rgba(22, 163, 74, .35);
            background: rgba(22, 163, 74, .08);
            color: var(--success);
        }

        .pf-pill.status-review {
            border-color: rgba(234, 179, 8, .35);
            background: rgba(234, 179, 8, .08);
            color: var(--warning);
        }

        /* Barra de força do perfil */

        .pf-progress-box {
            margin: 14px 0 16px;
            padding: 12px 12px 13px;
            border-radius: 16px;
            background: rgba(248, 250, 252, .9);
            border: 1px solid rgba(212, 216, 229, .97);
        }

        .pf-progress-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 12.5px;
            margin-bottom: 6px;
        }

        .pf-progress-top span {
            color: var(--muted);
        }

        .pf-progress-top strong {
            font-size: 14px;
            color: var(--accentStrong);
        }

        .pf-progress-bar {
            position: relative;
            height: 9px;
            border-radius: 999px;
            background: #e5e7eb;
            overflow: hidden;
        }

        .pf-progress-fill {
            position: absolute;
            inset: 0;
            width: 0%;
            border-radius: inherit;
            background: linear-gradient(90deg, #22c55e, #16a34a, #15803d);
            transition: width .4s ease;
        }

        .pf-progress-hint {
            margin-top: 7px;
            font-size: 11.5px;
            color: var(--muted);
        }

        .pf-sidebar-actions {
            display: flex;
            flex-direction: column;
            gap: 7px;
            margin-bottom: 14px;
        }

        .pf-btn {
            border-radius: 999px;
            border: none;
            padding: 10px 13px;
            font-size: 13.5px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: .16s ease;
        }

        .pf-btn-primary {
            background: linear-gradient(90deg, #6e88a7, #9cafc9);
            color: #f9fafb;
            box-shadow: 0 14px 30px rgba(37, 99, 235, .4);
        }

        .pf-btn-primary:hover {
            transform: translateY(-1px);
        }

        .pf-btn-ghost {
            background: #ffffff;
            color: var(--text);
            border: 1px solid var(--line);
        }

        .pf-btn-ghost:hover {
            background: #f9fafb;
        }

        .pf-sidebar-menu {
            margin-top: 6px;
            border-top: 1px solid rgba(212, 216, 229, .9);
            padding-top: 10px;
            display: grid;
            gap: 4px;
        }

        .pf-sidebar-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 13px;
            padding: 8px 6px;
            border-radius: 11px;
            color: var(--muted);
            cursor: default;
        }

        .pf-sidebar-link span {
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .pf-sidebar-link span i {
            font-size: 13px;
        }

        .pf-sidebar-link.active {
            background: rgba(37, 99, 235, .08);
            color: var(--accentStrong);
        }

        .pf-sidebar-link strong {
            font-size: 11.5px;
            color: var(--accentStrong);
        }

        /* ================= MAIN ================= */

        .pf-main {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        /* Abas / nav visual */

        .pf-tabs {
            background: rgba(255, 255, 255, .9);
            border-radius: var(--radiusXl);
            border: 1px solid rgba(212, 216, 229, .97);
            box-shadow: var(--shadowSoft);
            padding: 9px 12px;
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
        }

        .pf-tab {
            border-radius: 999px;
            padding: 8px 14px;
            font-size: 13px;
            border: 1px solid transparent;
            background: transparent;
            color: var(--muted);
            display: inline-flex;
            align-items: center;
            gap: 7px;
            cursor: default;
        }

        .pf-tab i {
            font-size: 13px;
        }

        .pf-tab.active {
            background: rgba(37, 99, 235, .08);
            border-color: rgba(37, 99, 235, .26);
            color: var(--accentStrong);
        }

        /* Hero resumo */

        .pf-hero {
            border: 1px solid rgba(212, 216, 229, .97);
            background: var(--cardGlass);
            backdrop-filter: blur(12px);
            border-radius: var(--radiusXl);
            box-shadow: var(--shadow);
            padding: 18px 18px 15px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .pf-hero-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 14px;
        }

        .pf-hero-left {
            min-width: 0;
        }

        .pf-hero-name {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 6px;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .pf-muted-row {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
            font-size: 13px;
            color: var(--muted);
        }

        .pf-muted-row span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .pf-muted-row i {
            font-size: 13px;
        }

        .pf-chips {
            margin-top: 9px;
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
        }

        .chip {
            border-radius: 999px;
            padding: 6px 10px;
            font-size: 12px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: 1px solid rgba(212, 216, 229, 1);
            background: rgba(255, 255, 255, .96);
            color: var(--muted);
        }

        .chip i {
            font-size: 12px;
        }

        .chip.primary {
            border-color: rgba(37, 99, 235, .26);
            background: rgba(37, 99, 235, .08);
            color: var(--accentStrong);
        }

        .chip.status-ok {
            border-color: rgba(22, 163, 74, .35);
            background: rgba(22, 163, 74, .08);
            color: var(--success);
        }

        .chip.status-review {
            border-color: rgba(234, 179, 8, .35);
            background: rgba(234, 179, 8, .08);
            color: var(--warning);
        }

        .pf-hero-right {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 8px;
            flex: 0 0 auto;
        }

        .pf-metric-row {
            display: flex;
            gap: 8px;
            font-size: 12px;
            color: var(--muted);
        }

        .pf-metric-row span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .pf-metric-row i {
            font-size: 13px;
        }

        .pf-hero-bottom {
            margin-top: 8px;
            padding-top: 9px;
            border-top: 1px dashed rgba(212, 216, 229, .97);
            font-size: 12.5px;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .pf-hero-bottom i {
            font-size: 13px;
            color: var(--accent);
        }

        /* GRID PRINCIPAL */

        .pf-grid {
            margin-top: 12px;
            display: grid;
            grid-template-columns: minmax(0, 1.15fr);
            gap: 14px;
        }

        @media (max-width: 980px) {
            .pf-grid {
                grid-template-columns: minmax(0, 1fr);
            }
        }

        .pf-card {
            background: rgba(255, 255, 255, .94);
            border: 1px solid rgba(212, 216, 229, .98);
            border-radius: var(--radiusXl);
            box-shadow: var(--shadowSoft);
            overflow: hidden;
        }

        .pf-card-head {
            padding: 14px 16px 11px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            border-bottom: 1px solid rgba(212, 216, 229, .97);
        }

        .pf-card-head h2 {
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 9px;
            margin: 0;
        }

        .pf-card-head h2 i {
            font-size: 15px;
            color: var(--accentStrong);
        }

        .pf-tag {
            font-size: 12px;
            color: var(--muted);
            background: rgba(248, 250, 252, .95);
            border: 1px solid rgba(212, 216, 229, .97);
            padding: 7px 10px;
            border-radius: 999px;
        }

        .pf-card-body {
            padding: 13px 16px 16px;
        }

        /* Timeline experiências / formações */

        .pf-timeline {
            display: flex;
            flex-direction: column;
            gap: 11px;
        }

        .t-item {
            position: relative;
            border: 1px solid rgba(212, 216, 229, .98);
            border-radius: 18px;
            background: rgba(255, 255, 255, .98);
            padding: 11px 12px;
            opacity: 0;
            transform: translateY(10px);
        }

        .t-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 10px;
        }

        .t-title {
            font-weight: 700;
            font-size: 13.5px;
            line-height: 1.3;
        }

        .t-sub {
            margin-top: 4px;
            color: var(--muted);
            font-size: 12.5px;
        }

        .t-badge {
            flex: 0 0 auto;
            font-size: 11.5px;
            padding: 6px 9px;
            border-radius: 999px;
            border: 1px solid rgba(37, 99, 235, .22);
            background: rgba(37, 99, 235, .06);
            color: var(--accentStrong);
        }

        .t-desc {
            margin-top: 8px;
            color: #334155;
            font-size: 12.5px;
            line-height: 1.45;
            white-space: pre-wrap;
        }

        /* Animação timeline */

        @keyframes slideInPulse {
            0% {
                opacity: 0;
                transform: translateY(12px);
                box-shadow: 0 0 0 0 rgba(37, 99, 235, 0);
            }

            60% {
                opacity: 1;
                transform: translateY(0);
                box-shadow: 0 10px 30px rgba(37, 99, 235, .25);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
                box-shadow: 0 0 0 0 rgba(37, 99, 235, 0);
            }
        }

        .t-item-animated {
            animation: slideInPulse .6s ease forwards;
        }

        /* Empty */

        .pf-empty {
            display: flex;
            gap: 11px;
            align-items: flex-start;
            border: 1px dashed rgba(148, 163, 184, .85);
            background: rgba(248, 250, 252, .92);
            border-radius: 18px;
            padding: 11px 11px;
            color: var(--muted);
            font-size: 12.5px;
            margin-top: 3px;
        }

        .pf-empty i {
            font-size: 17px;
            color: var(--accent);
            margin-top: 2px;
        }

        .pf-empty strong {
            display: block;
            color: var(--text);
            font-size: 12.5px;
        }

        .pf-empty p {
            margin: 4px 0 0;
            font-size: 12.5px;
            line-height: 1.35;
        }

        /* FOOT PERFIL */

        .pf-foot {
            margin-top: 10px;
            color: var(--muted);
            font-size: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .pf-foot i {
            font-size: 12px;
            color: var(--accent);
        }

        /* ================= VAGAS RECOMENDADAS ================= */

        .jobs-section {
            margin-top: 20px;
            background: rgba(255, 255, 255, .96);
            border-radius: var(--radiusXl);
            border: 1px solid rgba(212, 216, 229, .98);
            box-shadow: var(--shadowSoft);
            padding: 18px 18px 18px;
        }

        .jobs-head {
            display: flex;
            justify-content: space-between;
            gap: 14px;
            align-items: center;
            border-bottom: 1px solid rgba(212, 216, 229, .95);
            padding-bottom: 10px;
        }

        .jobs-head-left h2 {
            margin: 0;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .jobs-head-left h2 i {
            font-size: 17px;
            color: var(--accentStrong);
        }

        .jobs-head-left p {
            margin: 4px 0 0;
            font-size: 13px;
            color: var(--muted);
        }

        .jobs-filters {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
            font-size: 12.5px;
        }

        .jobs-filter-pill {
            border-radius: 999px;
            padding: 6px 10px;
            border: 1px solid rgba(212, 216, 229, .97);
            background: rgba(248, 250, 252, .96);
            color: var(--muted);
            display: inline-flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
        }

        .jobs-filter-pill i {
            font-size: 12px;
        }

        .jobs-filter-pill.active {
            border-color: rgba(37, 99, 235, .26);
            background: rgba(37, 99, 235, .08);
            color: var(--accentStrong);
        }

        .jobs-body {
            margin-top: 12px;
            display: grid;
            gap: 10px;
        }

        .job-card {
            border-radius: 18px;
            border: 1px solid rgba(212, 216, 229, .98);
            background: rgba(255, 255, 255, .98);
            padding: 13px 13px 12px;
            display: grid;
            grid-template-columns: minmax(0, 2.2fr) minmax(0, 1.6fr);
            gap: 12px;
            position: relative;
            overflow: hidden;
        }

        @media (max-width: 960px) {
            .job-card {
                grid-template-columns: minmax(0, 1fr);
            }
        }

        .job-main-title {
            font-size: 14.5px;
            font-weight: 700;
            margin-bottom: 3px;
        }

        .job-company-line {
            font-size: 13px;
            color: var(--muted);
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center;
        }

        .job-company-line span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .job-company-line i {
            font-size: 12px;
        }

        .job-tags {
            margin-top: 8px;
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            font-size: 11.5px;
        }

        .job-tag {
            border-radius: 999px;
            padding: 5px 9px;
            background: rgba(248, 250, 252, .98);
            border: 1px solid rgba(226, 232, 240, 1);
            color: var(--muted);
        }

        .job-summary {
            margin-top: 7px;
            font-size: 12.5px;
            color: #334155;
            line-height: 1.4;
        }

        .job-right {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            justify-content: space-between;
            gap: 8px;
        }

        .job-match-box {
            text-align: right;
        }

        .job-match-label {
            font-size: 11.5px;
            color: var(--muted);
            margin-bottom: 3px;
        }

        .job-match-value {
            font-size: 14px;
            font-weight: 700;
            color: var(--accentStrong);
        }

        .job-match-bar {
            margin-top: 5px;
            height: 6px;
            border-radius: 999px;
            background: #e5e7eb;
            overflow: hidden;
            width: 140px;
        }

        .job-match-fill {
            height: 100%;
            width: 0;
            border-radius: inherit;
            background: linear-gradient(90deg, #22c55e, #16a34a, #15803d);
            transition: width .4s ease;
        }

        .job-meta {
            font-size: 11.5px;
            color: var(--muted);
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 3px;
        }

        .job-meta span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .job-meta i {
            font-size: 12px;
        }

        .job-actions {
            margin-top: 6px;
            display: flex;
            gap: 8px;
        }

        .job-btn {
            border-radius: 999px;
            border: 1px solid var(--line);
            padding: 7px 10px;
            font-size: 12.5px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #f9fafb;
            color: var(--text);
        }

        .job-btn-primary {
            border-color: rgba(37, 99, 235, .26);
            background: linear-gradient(90deg, #6e88a7, #9cafc9);
            color: #f9fafb;
        }

        .job-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(220px 140px at 110% -20%, rgba(37, 99, 235, .16), transparent 60%);
            pointer-events: none;
        }

        .jobs-empty {
            border-radius: 18px;
            border: 1px dashed rgba(148, 163, 184, .9);
            background: rgba(248, 250, 252, .96);
            padding: 12px 12px;
            display: flex;
            gap: 10px;
            align-items: flex-start;
            font-size: 12.5px;
            color: var(--muted);
        }

        .jobs-empty i {
            font-size: 18px;
            color: var(--accent);
            margin-top: 2px;
        }

        .jobs-empty strong {
            color: var(--text);
            font-size: 13px;
        }

        .jobs-empty p {
            margin: 3px 0 0;
        }

        /* ================= RESPONSIVO FINO ================= */

        @media (max-width: 720px) {
            .pf-wrap {
                padding: 16px 12px 24px;
            }

            .pf-sidebar {
                border-radius: 22px;
            }

            .pf-hero {
                padding-inline: 14px;
            }

            .jobs-section {
                padding-inline: 14px;
            }
        }

        /* ================= MODAIS PERFIL – JobHub ================= */

        .pf-modal {
            position: fixed;
            inset: 0;
            z-index: 999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 16px;
        }

        .pf-modal.is-open {
            display: flex;
        }

        .pf-modal-overlay {
            position: absolute;
            inset: 0;
            background: rgba(15, 23, 42, .55);
            backdrop-filter: blur(6px);
        }

        .pf-modal-dialog {
            position: relative;
            max-width: 720px;
            width: 100%;
            max-height: 90vh;
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 24px 80px rgba(15, 23, 42, .35);
            padding: 20px 22px 18px;
            overflow-y: auto;
            z-index: 1;
        }

        /* header do modal */
        .pf-modal-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 12px;
        }

        .pf-modal-title {
            font-size: 18px;
            font-weight: 700;
        }

        .pf-modal-sub {
            font-size: 13px;
            color: #6b7280;
            margin-top: 3px;
        }

        .pf-modal-close {
            border: none;
            background: #f3f4f6;
            width: 32px;
            height: 32px;
            border-radius: 999px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            flex: 0 0 auto;
        }

        .pf-modal-close i {
            font-size: 15px;
            color: #111827;
        }

        /* corpo do modal */
        .pf-modal-body {
            font-size: 13.5px;
            color: #111827;
        }

        /* grid simples de infos */
        .pf-info-grid {
            display: grid;
            grid-template-columns: 1.2fr 1.2fr;
            gap: 10px 16px;
            margin: 10px 0 14px;
        }

        @media (max-width: 640px) {
            .pf-info-grid {
                grid-template-columns: 1fr;
            }
        }

        .pf-info-item {
            padding: 10px 11px;
            border-radius: 14px;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
        }

        .pf-info-label {
            font-size: 11.5px;
            color: #6b7280;
        }

        .pf-info-value {
            margin-top: 2px;
            font-size: 13.5px;
            font-weight: 600;
        }

        .pf-modal-section-title {
            margin-top: 14px;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: 700;
        }

        /* listas dentro do modal currículo */
        #cvExperiencias,
        #cvFormacoes {
            display: grid;
            gap: 8px;
        }

        .cv-empty {
            border-radius: 14px;
            border: 1px dashed #cbd5e1;
            background: #f9fafb;
            padding: 10px 11px;
            font-size: 12.5px;
            color: #64748b;
        }

        /* reaproveita visual dos cards da timeline dentro do modal */
        #cvExperiencias .t-item,
        #cvFormacoes .t-item {
            box-shadow: none;
        }

        /* rodapé do modal */
        .pf-modal-footer {
            margin-top: 16px;
            padding-top: 10px;
            border-top: 1px solid #e5e7eb;
            font-size: 12px;
            color: #6b7280;
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .pf-modal-footer span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .pf-modal-footer i {
            font-size: 13px;
        }

        /* botão pequeno dentro do modal (se precisar) */
        .pf-modal-btn-small {
            border-radius: 999px;
            border: 1px solid #e5e7eb;
            padding: 7px 12px;
            font-size: 12.5px;
            background: #f9fafb;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        /* ================== FIX: EMAIL GRANDE SEM QUEBRAR CARD ================== */

        /* Em layout flex, isso evita o "estouro" por falta de shrink */
        .pf-sidebar-top {
            align-items: flex-start;
        }

        .pf-sidebar-identity {
            min-width: 0;
        }

        /* Linha do email precisa poder encolher */
        .pf-sidebar-identity p {
            min-width: 0;
        }

        /* Trava em até 2 linhas e não deixa “vazar” */
        #emailUsuario,
        #emailUsuarioHero {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;

            word-break: break-word;
            overflow-wrap: anywhere;
            line-height: 1.25;
        }

        /* Se quiser o email sempre inteiro ao passar o mouse */
        #emailUsuario,
        #emailUsuarioHero {
            cursor: default;
        }

        /* ===== FORM DO MODAL (editar perfil) — clean/premium ===== */
        .pf-form {
            margin-top: 2px;
        }

        .pf-form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px 14px;
            margin: 6px 0 12px;
        }

        @media (max-width: 640px) {
            .pf-form-grid {
                grid-template-columns: 1fr;
            }
        }

        .pf-form-field label {
            display: block;
            font-size: 12px;
            color: #475569;
            margin-bottom: 6px;
            font-weight: 700;
        }

        .pf-form-field input,
        .pf-form-field select {
            width: 100%;
            padding: 11px 12px;
            border-radius: 14px;
            border: 1px solid rgba(212, 216, 229, .98);
            background: rgba(248, 250, 252, .96);
            color: #0f172a;
            font-size: 13.5px;
            outline: none;
            transition: box-shadow .16s ease, border-color .16s ease, background .16s ease;
        }

        .pf-form-field input::placeholder {
            color: #94a3b8;
        }

        .pf-form-field input:focus,
        .pf-form-field select:focus {
            border-color: rgba(37, 99, 235, .42);
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, .12);
        }

        .pf-field-note {
            display: block;
            margin-top: 6px;
            font-size: 11.5px;
            color: #64748b;
        }

        .pf-form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 10px;
        }

        .pf-form-btn {
            border-radius: 999px;
            padding: 10px 14px;
            font-size: 13px;
            font-weight: 800;
            border: 1px solid rgba(212, 216, 229, .98);
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: transform .16s ease, box-shadow .16s ease, background .16s ease, border-color .16s ease;
        }

        .pf-form-btn.ghost {
            background: #ffffff;
            color: #0f172a;
        }

        .pf-form-btn.ghost:hover {
            background: rgba(248, 250, 252, .96);
        }

        .pf-form-btn.primary {
            border-color: rgba(37, 99, 235, .26);
            background: linear-gradient(90deg, #2563eb, #4f46e5);
            color: #f9fafb;
            box-shadow: 0 14px 30px rgba(37, 99, 235, .35);
        }

        .pf-form-btn.primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 18px 44px rgba(37, 99, 235, .42);
        }

        .pf-form-btn[disabled] {
            opacity: .7;
            cursor: not-allowed;
            transform: none !important;
            box-shadow: none !important;
        }

        .pf-form-alert {
            border-radius: 14px;
            padding: 10px 11px;
            font-size: 12.5px;
            border: 1px solid rgba(148, 163, 184, .6);
            background: rgba(248, 250, 252, .96);
            color: #334155;
        }

        .pf-form-alert.ok {
            border-color: rgba(22, 163, 74, .35);
            background: rgba(22, 163, 74, .08);
            color: #166534;
        }

        .pf-form-alert.err {
            border-color: rgba(239, 68, 68, .35);
            background: rgba(239, 68, 68, .08);
            color: #991b1b;
        }

        .pf-form-note {
            margin: 10px 0 0;
            font-size: 12px;
            color: #64748b;
        }

        /* ================= VÍDEO DE APRESENTAÇÃO ================= */

        .pf-video-card .pf-card-head h2 i {
            color: var(--accentStrong);
        }

        .pf-video-grid {
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            gap: 14px;
            align-items: start;
        }

        @media (max-width: 980px) {
            .pf-video-grid {
                grid-template-columns: 1fr;
            }
        }

        .pf-video-title {
            margin: 0 0 6px;
            font-size: 14px;
            font-weight: 800;
            color: #0f172a;
        }

        .pf-video-text {
            margin: 0;
            font-size: 12.8px;
            color: #334155;
            line-height: 1.45;
        }

        .pf-video-tips {
            margin: 10px 0 0;
            padding: 0;
            list-style: none;
            display: grid;
            gap: 6px;
            font-size: 12.5px;
            color: var(--muted);
        }

        .pf-video-tips li {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .pf-video-tips i {
            color: var(--accent);
        }

        .pf-video-preview-wrap {
            border-radius: 18px;
            border: 1px solid rgba(212, 216, 229, .98);
            background: rgba(248, 250, 252, .98);
            overflow: hidden;
            position: relative;
        }

        .pf-video-empty {
            min-height: 220px;
            padding: 14px 14px;
            display: flex;
            gap: 12px;
            align-items: flex-start;
            color: var(--muted);
        }

        .pf-video-empty i {
            font-size: 22px;
            color: var(--accent);
            margin-top: 2px;
        }

        .pf-video-empty strong {
            display: block;
            color: var(--text);
            font-size: 13px;
        }

        .pf-video-empty p {
            margin: 4px 0 0;
            font-size: 12.5px;
            line-height: 1.35;
        }

        .pf-video-preview {
            width: 100%;
            height: auto;
            display: block;
            aspect-ratio: 16 / 9;
            background: #0b1220;
        }

        .pf-video-actions {
            margin-top: 12px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
        }

        .pf-video-hint {
            font-size: 12px;
            color: #64748b;
        }

        .pf-video-meta {
            margin-top: 10px;
            padding: 9px 11px;
            border-radius: 14px;
            background: rgba(248, 250, 252, .96);
            border: 1px solid rgba(212, 216, 229, .97);
            color: #334155;
            font-size: 12.5px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
    </style>
    <style>
        .pf-modal {
            position: fixed;
            inset: 0;
            display: none;
            z-index: 9999
        }

        .pf-modal.is-open {
            display: block
        }

        .pf-modal-overlay {
            position: absolute;
            inset: 0;
            background: rgba(2, 6, 23, .55);
            backdrop-filter: blur(3px)
        }

        .pf-modal-dialog {
            position: relative;
            width: min(720px, calc(100% - 26px));
            margin: 26px auto;
            background: rgba(255, 255, 255, .98);
            border-radius: 18px;
            box-shadow: 0 30px 80px rgba(2, 6, 23, .25);
            overflow: hidden;
        }

        .pf-modal-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            padding: 16px 16px 10px;
            border-bottom: 1px solid rgba(212, 216, 229, .9);
        }

        .pf-modal-title {
            font-weight: 900;
            font-size: 16px;
            color: #0f172a
        }

        .pf-modal-sub {
            margin-top: 4px;
            color: #64748b;
            font-size: 12.5px
        }

        .pf-modal-close {
            border: 1px solid rgba(212, 216, 229, .95);
            background: #fff;
            border-radius: 12px;
            height: 38px;
            width: 38px;
            cursor: pointer;
            display: grid;
            place-items: center;
        }

        .pf-modal-body {
            padding: 14px 16px 16px
        }

        .pf-form-alert {
            border-radius: 14px;
            padding: 10px 12px;
            font-size: 12.5px;
            font-weight: 800;
            margin-bottom: 12px;
            border: 1px solid transparent;
        }

        .pf-form-alert.ok {
            background: rgba(34, 197, 94, .10);
            border-color: rgba(34, 197, 94, .25);
            color: #166534
        }

        .pf-form-alert.err {
            background: rgba(239, 68, 68, .10);
            border-color: rgba(239, 68, 68, .25);
            color: #991b1b
        }

        .pf-form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px
        }

        .pf-field {
            display: grid;
            gap: 6px
        }

        .pf-field.full {
            grid-column: 1/-1
        }

        .pf-field label {
            font-weight: 900;
            font-size: 12px;
            color: #334155
        }

        .pf-field input,
        .pf-field select {
            width: 100%;
            border-radius: 14px;
            border: 1px solid rgba(212, 216, 229, .98);
            background: rgba(248, 250, 252, .96);
            padding: 11px 12px;
            font-size: 13.5px;
            outline: none;
        }

        .pf-form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            flex-wrap: wrap
        }

        .pf-form-btn {
            height: 40px;
            padding: 0 14px;
            border-radius: 999px;
            cursor: pointer;
            border: 1px solid rgba(212, 216, 229, .98);
            background: #fff;
            font-weight: 900
        }

        .pf-form-btn.primary {
            border-color: rgba(37, 99, 235, .25);
            background: #2563eb;
            color: #fff
        }

        .pf-form-btn.ghost {
            background: #fff
        }

        @media (max-width:720px) {
            .pf-form-grid {
                grid-template-columns: 1fr
            }
        }
    </style>

</head>

<body>

    <header class="pf-header">
        <div class="pf-header-inner">
            <a href="<?= URL_BASE ?>inicio" class="pf-logo" aria-label="Ir para início do candidato">
                <img src="<?= URL_BASE ?>assets/img/logo_preta.svg" alt="EmpresaDemo">
            </a>

            <div class="pf-title">
                <strong>Meu Perfil</strong>
                <small>Visão geral do seu currículo e das vagas alinhadas ao seu perfil</small>
            </div>

            <button class="pf-back" type="button" onclick="history.back()">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Voltar</span>
            </button>
        </div>
    </header>

    <main class="pf-wrap">
        <section class="pf-shell">

            <!-- SIDEBAR / COLUNA ESQUERDA -->
            <aside class="pf-sidebar">
                <div class="pf-sidebar-top">
                    <div class="pf-sidebar-identity">
                        <h1 id="nomeUsuario">Candidato</h1>
                        <p>
                            <i class="fa-regular fa-envelope"></i>
                            <span id="emailUsuario">—</span>
                        </p>

                        <div class="pf-status-row">
                            <span class="pf-pill primary">
                                <i class="fa-solid fa-shield-halved"></i>
                                Conta verificada
                            </span>
                            <span class="pf-pill status-review" id="chipStatus">
                                <i class="fa-regular fa-circle-question"></i>
                                Perfil em revisão
                            </span>
                        </div>
                    </div>
                </div>

                <div class="pf-progress-box">
                    <div class="pf-progress-top">
                        <span>Força do perfil</span>
                        <strong id="scorePerfil">—</strong>
                    </div>
                    <div class="pf-progress-bar">
                        <div class="pf-progress-fill" id="scorePerfilBar"></div>
                    </div>
                    <div class="pf-progress-hint">
                        Complete experiências, formações e dados pessoais para aumentar sua visibilidade.
                    </div>
                </div>

                <div class="pf-sidebar-actions">
                    <button class="pf-btn pf-btn-primary" type="button" id="btnAtualizarPerfil">
                        <i class="fa-solid fa-pen"></i>
                        Atualizar dados do perfil
                    </button>


                </div>

                <nav class="pf-sidebar-menu" aria-label="Menu do candidato">
                    <div class="pf-sidebar-link active">
                        <span><i class="fa-solid fa-id-badge"></i> Meu perfil</span>
                        <strong>Em destaque</strong>
                    </div>
                    <div class="pf-sidebar-link"><span><i class="fa-solid fa-briefcase"></i> Minhas experiências</span></div>
                    <div class="pf-sidebar-link"><span><i class="fa-solid fa-graduation-cap"></i> Minha formação</span></div>
                    <div class="pf-sidebar-link"><span><i class="fa-regular fa-bell"></i> Alertas de vagas (em breve)</span></div>
                </nav>
            </aside>

            <!-- MAIN / COLUNA DIREITA -->
            <section class="pf-main">

                <!-- Abas visuais -->
                <div class="pf-tabs" role="tablist">
                    <button class="pf-tab active" type="button"><i class="fa-solid fa-gauge-high"></i> Visão geral</button>
                    <button class="pf-tab" type="button"><i class="fa-solid fa-briefcase"></i> Experiências</button>
                    <button class="pf-tab" type="button"><i class="fa-solid fa-graduation-cap"></i> Formações</button>
                    <button class="pf-tab" type="button"><i class="fa-regular fa-bell"></i> Vagas recomendadas</button>
                </div>

                <!-- HERO RESUMO -->
                <section class="pf-hero" aria-label="Resumo do perfil">
                    <div class="pf-hero-top">
                        <div class="pf-hero-left">
                            <div class="pf-hero-name" id="nomeUsuarioHero">Candidato</div>

                            <div class="pf-muted-row">
                                <span><i class="fa-regular fa-envelope"></i> <span id="emailUsuarioHero">—</span></span>
                                <span><i class="fa-solid fa-briefcase"></i> <span>Candidato JobHub</span></span>
                            </div>

                            <div class="pf-chips">
                                <span class="chip primary"><i class="fa-solid fa-circle-check"></i> Currículo pronto para vagas</span>
                                <span class="chip" id="chipStatusHero"><i class="fa-regular fa-eye"></i> Visível para recrutadores</span>
                            </div>
                        </div>

                        <div class="pf-hero-right">
                            <div class="pf-metric-row">
                                <span><i class="fa-solid fa-briefcase"></i> <strong id="countExperiencias">0</strong> experiências</span>
                            </div>
                            <div class="pf-metric-row">
                                <span><i class="fa-solid fa-graduation-cap"></i> <strong id="countFormacoes">0</strong> formações</span>
                            </div>
                        </div>
                    </div>

                    <div class="pf-hero-bottom">
                        <i class="fa-regular fa-lightbulb"></i>
                        Quando seu perfil está completo e atualizado, aumentam as chances de receber vagas alinhadas ao que você busca.
                    </div>
                </section>

                <!-- GRID PRINCIPAL -->
                <section class="pf-grid">

                    <!-- EXPERIÊNCIAS -->
                    <section class="pf-card" id="blocoExperiencias">
                        <header class="pf-card-head">
                            <h2><i class="fa-solid fa-briefcase"></i> Experiências</h2>
                            <span class="pf-tag" id="tagExperiencias">Atualizado agora</span>
                        </header>

                        <div class="pf-card-body">
                            <div id="listaExperiencias" class="pf-timeline"></div>

                            <div class="pf-empty" id="emptyExperiencias" style="display:none;">
                                <i class="fa-regular fa-face-smile"></i>
                                <div>
                                    <strong>Sem experiências ainda</strong>
                                    <p>Tudo bem. Quando você adicionar sua primeira experiência, ela aparecerá aqui de forma organizada e cronológica.</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- FORMAÇÕES -->
                    <section class="pf-card" id="blocoFormacoes">
                        <header class="pf-card-head">
                            <h2><i class="fa-solid fa-graduation-cap"></i> Formações</h2>
                            <span class="pf-tag" id="tagFormacoes">Organizado</span>
                        </header>

                        <div class="pf-card-body">
                            <div id="listaFormacoes" class="pf-timeline"></div>

                            <div class="pf-empty" id="emptyFormacoes" style="display:none;">
                                <i class="fa-regular fa-circle-check"></i>
                                <div>
                                    <strong>Sem formações cadastradas</strong>
                                    <p>Ao incluir suas formações (escola, curso, período), seu perfil ganha mais relevância nas buscas de vagas.</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- MINHAS CANDIDATURAS -->
                    <section class="pf-card" id="minhasCandidaturas">
                        <header class="pf-card-head">
                            <h2><i class="fa-solid fa-paper-plane"></i> Minhas candidaturas</h2>
                            <span class="pf-tag" id="candTotalTag">0 no total</span>
                        </header>

                        <div class="pf-card-body">
                            <div class="mc-toolbar">
                                <div class="mc-chips" id="mcChips">
                                    <button class="mc-chip active" type="button" data-st="TODAS">Todas</button>
                                    <button class="mc-chip" type="button" data-st="ENVIADA">Enviada</button>
                                    <button class="mc-chip" type="button" data-st="EM_ANALISE">Em análise</button>
                                    <button class="mc-chip" type="button" data-st="ENTREVISTA">Entrevista</button>
                                    <button class="mc-chip" type="button" data-st="APROVADO">Aprovado</button>
                                    <button class="mc-chip" type="button" data-st="REPROVADO">Reprovado</button>
                                </div>

                                <div class="mc-actions">
                                    <input class="mc-search" id="mcSearch" placeholder="Buscar por cargo, empresa, cidade..." />
                                </div>
                            </div>

                            <div class="mc-list" id="mcList"></div>

                            <div class="pf-empty" id="mcEmpty" style="display:none;">
                                <i class="fa-regular fa-circle-check"></i>
                                <div>
                                    <strong>Você ainda não se candidatou em nenhuma vaga</strong>
                                    <p>Quando você se candidatar, suas vagas aparecerão aqui com status e histórico.</p>
                                </div>
                            </div>
                        </div>
                    </section>

                </section>

                <!-- VAGAS RECOMENDADAS -->
                <section class="jobs-section" id="vagasRelacionadas">
                    <header class="jobs-head">
                        <div class="jobs-head-left">
                            <h2><i class="fa-solid fa-briefcase"></i> Vagas recomendadas para você</h2>
                            <p id="jobsSub">Listando vagas com base no seu alerta salvo.</p>
                        </div>

                        <div class="jobs-filters">
                            <button class="jobs-filter-pill active" type="button" data-filter="todas">
                                <i class="fa-solid fa-layer-group"></i> Todas
                            </button>
                            <button class="jobs-filter-pill" type="button" data-filter="alto-match">
                                <i class="fa-solid fa-star"></i> Alto match
                            </button>
                            <button class="jobs-filter-pill" type="button" data-filter="presencial">
                                <i class="fa-solid fa-building"></i> Presencial
                            </button>
                            <button class="jobs-filter-pill" type="button" data-filter="remoto">
                                <i class="fa-solid fa-house-laptop"></i> Remoto
                            </button>
                        </div>
                    </header>

                    <div class="jobs-body" id="listaVagasRelacionadas">
                        <div class="jobs-empty" id="jobsEmpty">
                            <i class="fa-regular fa-circle-question"></i>
                            <div>
                                <strong>Nenhuma vaga sugerida ainda</strong>
                                <p>Crie um alerta (cargo/cidade) e as vagas compatíveis vão aparecer aqui.</p>
                            </div>
                        </div>
                    </div>


                </section>

                <!-- VIDEO DE APRESENTAÇÃO -->
                <section class="pf-card pf-video-card" id="blocoVideo">
                    <header class="pf-card-head">
                        <h2><i class="fa-solid fa-video"></i> Vídeo de apresentação</h2>
                        <span class="pf-tag" id="tagVideo">Opcional</span>
                    </header>

                    <div class="pf-card-body">
                        <div class="pf-video-grid">
                            <div class="pf-video-copy">
                                <p class="pf-video-title">Mostre seu jeito de trabalhar em 30–60s</p>
                                <p class="pf-video-text">
                                    Envie um vídeo curto se apresentando (objetivo, experiência e o que você busca).
                                    Recrutadores poderão assistir direto no seu perfil.
                                </p>

                                <ul class="pf-video-tips">
                                    <li><i class="fa-regular fa-circle-check"></i> Grave na vertical ou horizontal</li>
                                    <li><i class="fa-regular fa-circle-check"></i> Ambiente iluminado e áudio claro</li>
                                    <li><i class="fa-regular fa-circle-check"></i> Seja direto (até 1 min)</li>
                                </ul>
                            </div>

                            <div class="pf-video-preview-wrap">
                                <div class="pf-video-empty" id="videoEmpty">
                                    <i class="fa-regular fa-circle-play"></i>
                                    <div>
                                        <strong>Nenhum vídeo anexado</strong>
                                        <p>Assim que você enviar, ele ficará disponível aqui para visualização.</p>
                                    </div>
                                </div>

                                <video id="videoApresentacao" class="pf-video-preview" controls playsinline preload="metadata"
                                    style="display:none;"></video>
                            </div>
                        </div>

                        <div class="pf-video-actions">
                            <input id="inputVideoApresentacao" type="file" accept="video/mp4,video/webm,video/quicktime,video/*"
                                hidden />

                            <button class="pf-btn pf-btn-primary" id="btnAnexarVideo" type="button">
                                <i class="fa-solid fa-upload"></i> Anexar vídeo
                            </button>
                            <button class="pf-btn pf-btn-primary" id="btnSalvarVideo" type="button" disabled>
                                <i class="fa-solid fa-floppy-disk"></i> Salvar vídeo
                            </button>

                            <button class="pf-btn pf-btn-ghost" id="btnRemoverVideo" type="button" disabled>
                                <i class="fa-regular fa-trash-can"></i> Remover
                            </button>

                            <span class="pf-video-hint" id="videoHint" aria-live="polite">Formatos comuns: MP4 / MOV / WebM</span>
                        </div>

                        <div class="pf-video-meta" id="videoMeta" style="display:none;">
                            <i class="fa-regular fa-file-video"></i>
                            <span id="videoMetaText">—</span>
                        </div>
                    </div>
                </section>


            </section>
        </section>

        <!-- DRAWER: Detalhe da vaga -->
        <div class="vaga-drawer" id="vagaDrawer" aria-hidden="true">
            <div class="vaga-drawer-overlay" id="vagaDrawerOverlay"></div>

            <aside class="vaga-drawer-panel" role="dialog" aria-modal="true" aria-label="Detalhe da vaga">
                <header class="vaga-drawer-head">
                    <div>
                        <div class="vaga-drawer-title" id="vagaDrawerTitulo">Carregando…</div>
                        <div class="vaga-drawer-sub" id="vagaDrawerSub">—</div>
                    </div>

                    <button class="vaga-drawer-close" type="button" id="vagaDrawerClose" aria-label="Fechar">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </header>

                <div class="vaga-drawer-body" id="vagaDrawerBody">
                    <div class="vaga-drawer-skeleton">Carregando detalhes da vaga…</div>
                </div>

                <!-- <footer class="vaga-drawer-foot">
                    <button class="vaga-drawer-btn ghost" type="button" id="vagaDrawerIrParaVaga">Ir para vaga</button>
                    <button class="vaga-drawer-btn" type="button" id="vagaDrawerCandidatar">Me candidatar</button>
                </footer> -->

            </aside>
        </div>
        <!-- =========================
  MODAL: Atualizar dados pessoais (SEM SENHA)
========================= -->
        <div class="pf-modal" id="modalAtualizarPerfil" aria-hidden="true">
            <div class="pf-modal-overlay" data-close-modal="modalAtualizarPerfil"></div>

            <div class="pf-modal-dialog" role="dialog" aria-modal="true" aria-labelledby="titleAtualizarPerfil">
                <header class="pf-modal-header">
                    <div>
                        <div class="pf-modal-title" id="titleAtualizarPerfil">Atualizar dados do perfil</div>
                        <p class="pf-modal-sub">Atualize seus dados pessoais. (Senha não é alterada aqui)</p>
                    </div>

                    <button class="pf-modal-close" type="button" data-close-modal="modalAtualizarPerfil" aria-label="Fechar">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </header>

                <div class="pf-modal-body">
                    <div class="pf-form-alert" id="pf_formAlert" style="display:none;"></div>

                    <form id="formAtualizarPerfil" autocomplete="on">
                        <div class="pf-form-grid">
                            <div class="pf-field full">
                                <label for="pf_nomeCompleto">Nome completo</label>
                                <input id="pf_nomeCompleto" name="nomeCompleto" type="text" placeholder="Ex.: Ana Paula Santos" required />
                            </div>

                            <div class="pf-field">
                                <label for="pf_email">E-mail</label>
                                <input id="pf_email" name="email" type="email" placeholder="ex.: ana.backend@gmail.com" required />
                            </div>

                            <div class="pf-field">
                                <label for="pf_telefone">Telefone</label>
                                <input id="pf_telefone" name="telefone" type="tel" placeholder="(11) 98888-1111" required />
                            </div>

                            <div class="pf-field">
                                <label for="pf_cpf">CPF</label>
                                <input id="pf_cpf" name="cpf" type="text" placeholder="000.000.000-00" required />
                            </div>

                            <div class="pf-field">
                                <label for="pf_genero">Gênero</label>
                                <select id="pf_genero" name="genero" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="MASCULINO">Masculino</option>
                                    <option value="FEMININO">Feminino</option>
                                    <option value="OUTRO">Outro</option>
                                </select>
                            </div>

                            <div class="pf-field">
                                <label for="pf_dataNascimento">Nascimento (mês/ano)</label>
                                <input id="pf_dataNascimento" name="dataNascimento" type="month" required />
                            </div>

                            <div class="pf-field">
                                <label for="pf_cidade">Cidade</label>
                                <input id="pf_cidade" name="cidade" type="text" placeholder="Ex.: São Paulo" required />
                            </div>

                            <div class="pf-field">
                                <label for="pf_estado">Estado (UF)</label>
                                <input id="pf_estado" name="estado" type="text" maxlength="2" placeholder="Ex.: SP" required />
                            </div>
                        </div>

                        <div class="pf-line" style="margin:14px 0;"></div>

                        <div class="pf-form-actions">
                            <button class="pf-form-btn ghost" type="button" data-close-modal="modalAtualizarPerfil">Cancelar</button>
                            <button class="pf-form-btn primary" id="btnSalvarPerfil" type="submit">
                                <i class="fa-solid fa-floppy-disk"></i> Salvar alterações
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="modalCurriculo" class="pf-modal" aria-hidden="true" style="display:none;">
            <div class="pf-modal-card">
                <button type="button" class="pf-modal-close" aria-label="Fechar">×</button>
                <div class="pf-modal-body"></div>
            </div>
        </div>

    </main>


    <script>
        window.JobHub_API_BASE = window.JobHub_API_BASE || <?= api_base_json() ?>;
    </script>

    <script src="<?= URL_BASE ?>assets/js/perfil.js"></script>
    <script src="<?= URL_BASE ?>assets/js/perfil-api.js"></script>
    <script src="<?= URL_BASE ?>assets/js/perfil-vagas.js"></script>


    <script>
        (() => {
            "use strict";

            const API_BASE = window.JobHub_API_BASE || "";
            const STREAM_PREFIX = "/candidatos/video/stream/";

            const $ = (id) => document.getElementById(id);

            const input = $("inputVideoApresentacao");
            const btnAnexar = $("btnAnexarVideo");
            const btnSalvar = $("btnSalvarVideo");
            const btnRemover = $("btnRemoverVideo");

            const videoEl = $("videoApresentacao");
            const emptyEl = $("videoEmpty");
            const metaWrap = $("videoMeta");
            const metaText = $("videoMetaText");
            const hint = $("videoHint");
            const tagVideo = $("tagVideo");

            if (!videoEl || !emptyEl || !btnAnexar || !btnSalvar || !btnRemover || !input) return;

            let selectedFile = null;
            let objectUrl = null;

            function getToken() {
                return localStorage.getItem("token") || localStorage.getItem("accessToken") || "";
            }

            function decodeJwt(token) {
                try {
                    const parts = token.split(".");
                    if (parts.length < 2) return null;
                    const b64 = parts[1].replace(/-/g, "+").replace(/_/g, "/");
                    const padded = b64 + "===".slice((b64.length + 3) % 4);
                    const json = decodeURIComponent(
                        atob(padded).split("").map((c) => "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2)).join("")
                    );
                    return JSON.parse(json);
                } catch {
                    return null;
                }
            }

            function getCandidatoId() {
                const fromPerfil =
                    window.__PERFIL_ME__?.candidato?.idCandidato ??
                    window.__PERFIL_ME__?.candidatoId ??
                    window.__PERFIL_ME__?.rawMe?.idCandidato ??
                    window.__PERFIL_ME__?.rawMe?.id;

                if (fromPerfil) return String(fromPerfil);

                const ls = localStorage.getItem("candidato_id");
                if (ls) return String(ls);

                const token = getToken();
                if (token) {
                    const jwt = decodeJwt(token);
                    const maybe =
                        jwt?.idCandidato ||
                        jwt?.candidatoId ||
                        jwt?.id ||
                        (typeof jwt?.sub === "string" && /^\d+$/.test(jwt.sub) ? jwt.sub : "");
                    if (maybe) return String(maybe);
                }
                return "";
            }

            function setHint(msg, type = "info") {
                if (!hint) return;
                hint.textContent = msg || "";
                hint.style.color = type === "err" ? "#b91c1c" : type === "ok" ? "#166534" : "#64748b";
            }

            function setTag(text) {
                if (tagVideo) tagVideo.textContent = text || "Opcional";
            }

            function formatBytes(bytes) {
                const b = Number(bytes || 0);
                if (!b) return "0 B";
                const units = ["B", "KB", "MB", "GB"];
                let i = 0,
                    v = b;
                while (v >= 1024 && i < units.length - 1) {
                    v /= 1024;
                    i++;
                }
                return `${v.toFixed(i === 0 ? 0 : 1)} ${units[i]}`;
            }

            function resolveVideoStreamUrl(pathOrUrl) {
                const raw = String(pathOrUrl || "").trim();
                if (!raw) return "";

                if (/^https?:\/\//i.test(raw)) return raw;

                const base = API_BASE.replace(/\/+$/, "");

                if (raw.startsWith("/")) return base + raw;

                return base + STREAM_PREFIX + raw.replace(/^\/+/, "");
            }

            function resetVideoUI(reason = "Formatos comuns: MP4 / MOV / WebM") {
                selectedFile = null;

                if (objectUrl) {
                    URL.revokeObjectURL(objectUrl);
                    objectUrl = null;
                }

                videoEl.removeAttribute("src");
                videoEl.load();

                videoEl.style.display = "none";
                emptyEl.style.display = "flex";

                if (metaWrap) metaWrap.style.display = "none";
                if (metaText) metaText.textContent = "—";

                btnSalvar.disabled = true;
                btnRemover.disabled = true;

                setTag("Opcional");
                setHint(reason, "info");
            }

            function showPreviewFromFile(file) {
                if (!file) return;

                if (objectUrl) URL.revokeObjectURL(objectUrl);
                objectUrl = URL.createObjectURL(file);

                videoEl.src = objectUrl;
                videoEl.style.display = "block";
                emptyEl.style.display = "none";

                if (metaWrap && metaText) {
                    metaWrap.style.display = "inline-flex";
                    metaText.textContent = `${file.name} • ${formatBytes(file.size)}`;
                }

                btnSalvar.disabled = false;
                btnRemover.disabled = true;

                setTag("Pronto para salvar");
                setHint("Pré-visualização pronta. Clique em “Salvar vídeo” para gravar no seu perfil.", "info");
            }

            function showVideoFromUrl(urlFinal, note = "Vídeo salvo no perfil") {
                if (objectUrl) {
                    URL.revokeObjectURL(objectUrl);
                    objectUrl = null;
                }

                videoEl.src = urlFinal;
                videoEl.style.display = "block";
                emptyEl.style.display = "none";
                videoEl.load();

                if (metaWrap && metaText) {
                    metaWrap.style.display = "inline-flex";
                    metaText.textContent = note;
                }

                btnSalvar.disabled = true;
                btnRemover.disabled = false;

                setTag("Salvo");
                setHint("Seu vídeo de apresentação está visível no seu perfil.", "ok");
            }

            function attachVideoDebugOnce() {
                if (videoEl.dataset.debugAttached === "1") return;
                videoEl.dataset.debugAttached = "1";

                videoEl.addEventListener("loadstart", () => setHint("Carregando vídeo…", "info"));
                videoEl.addEventListener("loadedmetadata", () => setHint("Vídeo carregado ✅", "ok"));
                videoEl.addEventListener("canplay", () => {
                    if ((hint?.textContent || "").includes("Falha")) return;
                    setHint("Pronto para reproduzir", "ok");
                });

                videoEl.addEventListener("error", () => {
                    const code = videoEl.error?.code;
                    const map = {
                        1: "Carregamento abortado",
                        2: "Erro de rede ao baixar o vídeo (URL/host/CORS/auth)",
                        3: "Erro ao decodificar o vídeo (arquivo corrompido/formato)",
                        4: "Formato não suportado / MIME errado (Content-Type)",
                    };
                    setHint(`Falha ao carregar vídeo: ${map[code] || "erro desconhecido"} (code ${code || "?"})`, "err");
                    console.warn("[VIDEO ERROR]", {
                        code,
                        src: videoEl.currentSrc || videoEl.src
                    });
                });
            }

            async function fetchVideoPathByCandidato(idCandidato) {
                const token = getToken();
                const url = `${API_BASE.replace(/\/+$/, "")}/candidatos/${idCandidato}/video`;

                const resp = await fetch(url, {
                    method: "GET",
                    headers: token ? {
                        Authorization: `Bearer ${token}`
                    } : {},
                });

                if (resp.status === 404) return null;

                const txt = (await resp.text().catch(() => "")).trim();
                if (!resp.ok) throw new Error(txt || `GET vídeo falhou (${resp.status})`);

                return txt || null;
            }

            async function uploadVideo(file, idCandidato) {
                const token = getToken();
                if (!token) throw new Error("Sem token. Faça login novamente.");

                const url = `${API_BASE.replace(/\/+$/, "")}/candidatos/${idCandidato}/video`;

                const fd = new FormData();
                fd.append("video", file);

                const resp = await fetch(url, {
                    method: "POST",
                    headers: {
                        Authorization: `Bearer ${token}`
                    },
                    body: fd,
                });

                const raw = await resp.text().catch(() => "");
                if (!resp.ok) throw new Error(raw || `Upload falhou (${resp.status})`);

                try {
                    const j = raw ? JSON.parse(raw) : null;
                    const p = j?.url || j?.videoUrl || j?.path || j?.link || j?.filename;
                    return p ? String(p) : null;
                } catch {
                    return raw.trim() || null;
                }
            }

            async function deleteVideo(idCandidato) {
                const token = getToken();
                if (!token) throw new Error("Sem token. Faça login novamente.");

                const base = API_BASE.replace(/\/+$/, "");

                // ✅ endpoint que você pediu:
                const primary = `${base}/${idCandidato}/video/deletar`;

                // (Opcional) fallbacks pra não quebrar se o back estiver com prefixo /candidatos
                const candidates = [
                    primary,
                    `${base}/candidatos/${idCandidato}/video/deletar`,
                    `${base}/candidatos/${idCandidato}/video`,
                ];

                let lastText = "";

                for (const url of candidates) {
                    const resp = await fetch(url, {
                        method: "DELETE",
                        headers: token ? {
                            Authorization: `Bearer ${token}`
                        } : {},
                    });

                    // muita API retorna 204 sem body
                    const txt = await resp.text().catch(() => "");
                    lastText = txt || lastText;

                    if (resp.ok) return; // 200/204 etc.
                    if (resp.status === 404) continue; // tenta o próximo
                }

                throw new Error(lastText || "Não consegui remover o vídeo (endpoint de delete não respondeu OK).");
            }



            async function boot() {
                attachVideoDebugOnce();

                const idCandidato = getCandidatoId();
                if (!idCandidato) {
                    resetVideoUI("Não consegui identificar seu ID de candidato.");
                    return;
                }

                setTag("Carregando...");
                setHint("Buscando seu vídeo salvo…", "info");

                try {
                    const path = await fetchVideoPathByCandidato(idCandidato);

                    if (!path) {
                        resetVideoUI("Nenhum vídeo anexado ainda.");
                        return;
                    }

                    const urlFinal = resolveVideoStreamUrl(path);
                    showVideoFromUrl(urlFinal);
                } catch (e) {
                    console.error("[VIDEO GET]", e);
                    resetVideoUI(e?.message || "Erro ao carregar seu vídeo.");
                    setTag("Erro");
                    setHint(e?.message || "Erro ao carregar seu vídeo.", "err");
                }
            }

            btnAnexar.addEventListener("click", () => input.click());

            input.addEventListener("change", () => {
                const file = input.files && input.files[0] ? input.files[0] : null;
                if (!file) return;

                const MAX_MB = 80;
                if (file.size > MAX_MB * 1024 * 1024) {
                    input.value = "";
                    setHint(`Arquivo muito grande. Máx: ${MAX_MB}MB.`, "err");
                    return;
                }

                selectedFile = file;
                showPreviewFromFile(file);
            });

            btnSalvar.addEventListener("click", async () => {
                const idCandidato = getCandidatoId();
                if (!idCandidato) return setHint("Sem ID do candidato.", "err");
                if (!selectedFile) return;

                btnSalvar.disabled = true;
                btnAnexar.disabled = true;
                setTag("Salvando...");
                setHint("Salvando vídeo no seu perfil…", "info");

                try {
                    const returned = await uploadVideo(selectedFile, idCandidato);
                    const path = returned || (await fetchVideoPathByCandidato(idCandidato));
                    if (!path) throw new Error("Upload ok, mas não consegui obter a URL do vídeo.");

                    const urlFinal = resolveVideoStreamUrl(path);

                    console.log("[VIDEO UPLOAD] returned =", returned);
                    console.log("[VIDEO UPLOAD] urlFinal =", urlFinal);

                    showVideoFromUrl(urlFinal);
                    btnRemover.disabled = false;
                } catch (e) {
                    console.error("[VIDEO SAVE ERROR]", e);
                    btnSalvar.disabled = false;
                    setTag("Erro");
                    setHint(e?.message || "Erro ao salvar o vídeo.", "err");
                } finally {
                    btnAnexar.disabled = false;
                }
            });

            btnRemover.addEventListener("click", async () => {
                const idCandidato = getCandidatoId();
                if (!idCandidato) return setHint("Sem ID do candidato.", "err");

                btnRemover.disabled = true;
                btnAnexar.disabled = true;
                btnSalvar.disabled = true;

                setTag("Removendo...");
                setHint("Removendo vídeo…", "info");

                try {
                    await deleteVideo(idCandidato);

                    input.value = "";
                    resetVideoUI("Vídeo removido do seu perfil.");
                    setHint("Vídeo removido do seu perfil.", "ok");
                } catch (e) {
                    console.error("[VIDEO DELETE ERROR]", e);
                    setTag("Erro");
                    setHint(e?.message || "Erro ao remover o vídeo.", "err");
                    btnRemover.disabled = false;
                } finally {
                    btnAnexar.disabled = false;
                    btnSalvar.disabled = !selectedFile;
                }
            });

            document.addEventListener("DOMContentLoaded", boot);
            window.addEventListener("perfil:loaded", boot);
        })();
    </script>

    <!-- =========================================================
       VER MAIS VAGAS (recoMore) — corrigido
  ========================================================== -->
    <script>
        (() => {
            "use strict";

            const BTN_ID = "recoMore";
            const CONTAINER_IDS = ["listaVagasRelacionadas", "recoCards"];
            const BATCH = 4;

            const btn = document.getElementById(BTN_ID);
            if (!btn) return;

            function getContainer() {
                for (const id of CONTAINER_IDS) {
                    const el = document.getElementById(id);
                    if (el && el.querySelector(".job-card")) return el;
                }
                return document.getElementById(CONTAINER_IDS[0]) || document.getElementById(CONTAINER_IDS[1]);
            }

            function applyShowMore() {
                const container = getContainer();
                if (!container) return;

                const cards = Array.from(container.querySelectorAll(".job-card"));
                if (cards.length === 0) {
                    btn.style.display = "none";
                    return;
                }

                const visibleCount = cards.filter(c => !c.classList.contains("is-hidden")).length;

                if (visibleCount === cards.length) {
                    cards.forEach((c, idx) => c.classList.toggle("is-hidden", idx >= BATCH));
                }

                const hidden = cards.filter(c => c.classList.contains("is-hidden")).length;
                btn.style.display = hidden > 0 ? "inline-flex" : "none";
            }

            btn.addEventListener("click", () => {
                const container = getContainer();
                if (!container) return;

                const cards = Array.from(container.querySelectorAll(".job-card"));
                const hidden = cards.filter(c => c.classList.contains("is-hidden"));
                hidden.slice(0, BATCH).forEach(c => c.classList.remove("is-hidden"));

                applyShowMore();
            });

            const observer = new MutationObserver(() => applyShowMore());

            function boot() {
                const container = getContainer();
                if (container) observer.observe(container, {
                    childList: true,
                    subtree: true
                });
                applyShowMore();
            }

            document.addEventListener("DOMContentLoaded", boot);
            window.addEventListener("perfil:loaded", boot);
        })();
    </script>

    <!-- =========================================================
       MINHAS CANDIDATURAS — corrigido
  ========================================================== -->
    <script>
        (() => {
            "use strict";

            const API_BASE = window.JobHub_API_BASE || "";
            const ENDPOINT = "/candidato/minhas-candidaturas";

            const $ = (s, el = document) => el.querySelector(s);

            function getToken() {
                return localStorage.getItem("token") || localStorage.getItem("accessToken") || "";
            }

            function escapeHTML(str) {
                return String(str ?? "")
                    .replaceAll("&", "&amp;").replaceAll("<", "&lt;").replaceAll(">", "&gt;")
                    .replaceAll('"', "&quot;").replaceAll("'", "&#039;");
            }

            function fmtDateTimeBR(v) {
                if (!v) return "";
                const iso = String(v).includes("T") ? String(v) : String(v).replace(" ", "T");
                const d = new Date(iso);
                if (isNaN(d.getTime())) return String(v);
                const dd = String(d.getDate()).padStart(2, "0");
                const mm = String(d.getMonth() + 1).padStart(2, "0");
                const hh = String(d.getHours()).padStart(2, "0");
                const mi = String(d.getMinutes()).padStart(2, "0");
                return `${dd}/${mm} ${hh}:${mi}`;
            }

            function pillStatus(st) {
                const s = String(st || "").toUpperCase();
                if (s === "EM_ANALISE" || s === "ENTREVISTA") return {
                    cls: "warn",
                    label: s === "ENTREVISTA" ? "Entrevista" : "Em análise",
                    icon: "fa-solid fa-magnifying-glass"
                };
                if (s === "APROVADO") return {
                    cls: "ok",
                    label: "Aprovado",
                    icon: "fa-solid fa-circle-check"
                };
                if (s === "REPROVADO") return {
                    cls: "bad",
                    label: "Reprovado",
                    icon: "fa-solid fa-circle-xmark"
                };
                if (s === "ENVIADA") return {
                    cls: "neutral",
                    label: "Enviada",
                    icon: "fa-regular fa-paper-plane"
                };
                return {
                    cls: "neutral",
                    label: s || "—",
                    icon: "fa-regular fa-circle"
                };
            }

            function normalizeOne(raw) {
                const o = raw || {};
                const vagaBase = o.vagaDTO || o.vaga || o.job || o.jobDTO || o.item?.vaga || o.item?.vagaDTO || {};
                const loc = vagaBase.localizacao || vagaBase.localizacaoDTO || {};

                const idVaga = o.idVaga ?? o.vagaId ?? o.vaga_id ?? o.id_vaga ?? vagaBase.idVaga ?? vagaBase.vagaId ?? vagaBase.id_vaga ?? vagaBase.id;
                const cargo = o.cargo ?? o.titulo ?? o.nomeVaga ?? vagaBase.cargo ?? vagaBase.titulo ?? vagaBase.nomeVaga ?? vagaBase.nome;
                const empresa = o.empresa ?? o.nomeEmpresa ?? o.razaoSocial ?? vagaBase.empresa ?? vagaBase.empresaNome ?? vagaBase.razaoSocial ?? vagaBase.empresaDTO?.empresaNome ?? vagaBase.empresaDTO?.razaoSocial;
                const cidade = o.cidade ?? vagaBase.cidade ?? loc.cidade ?? "";
                const estado = o.estado ?? vagaBase.estado ?? vagaBase.uf ?? loc.estado ?? loc.uf ?? "";
                const status = o.status ?? o.statusCandidatura ?? o.situacao ?? "ENVIADA";
                const created_at = o.created_at ?? o.dataCriacao ?? o.createdAt ?? o.criadoEm ?? "";

                return {
                    idVaga: idVaga ? Number(idVaga) : 0,
                    cargo: cargo || "Vaga",
                    empresa: empresa || "—",
                    cidade: cidade || "",
                    estado: estado || "",
                    status: status || "",
                    created_at: created_at || ""
                };
            }

            function normalizeList(payload) {
                const arr = Array.isArray(payload) ? payload : (payload?.items || payload?.data || []);
                return (Array.isArray(arr) ? arr : []).map(normalizeOne);
            }

            function renderMinhasCandidaturas(items) {
                const list = $("#mcList");
                const empty = $("#mcEmpty");
                const tag = $("#candTotalTag");

                const arr = Array.isArray(items) ? items : [];
                if (tag) tag.textContent = `${arr.length} no total`;

                if (!list || !empty) return;

                if (!arr.length) {
                    list.innerHTML = "";
                    empty.style.display = "flex";
                    return;
                }
                empty.style.display = "none";

                list.innerHTML = arr.map(v => {
                    const p = pillStatus(v.status);
                    const local = [v.cidade, v.estado].filter(Boolean).join("/") || "—";
                    const idNum = Number(v.idVaga || 0);

                    return `
            <article class="mc-item">
              <div>
                <h3 class="mc-title">${escapeHTML(v.cargo || "Vaga")}</h3>
                <div class="mc-meta">
                  <span><i class="fa-solid fa-building"></i> ${escapeHTML(v.empresa || "—")}</span>
                </div>
              </div>

              <div class="mc-right">
                <span class="mc-pill ${p.cls}">
                  <i class="${p.icon}"></i> ${escapeHTML(p.label)}
                </span>

                <button class="mc-btn primary" type="button"
                  data-ver-vaga="1" data-idvaga="${escapeHTML(idNum)}" ${idNum ? "" : "disabled"}>
                  <i class="fa-solid fa-eye"></i> Ver vaga
                </button>
              </div>
            </article>
          `;
                }).join("");
            }

            let _base = [];
            let filtro = "TODAS";
            let q = "";

            function norm(s) {
                return String(s || "")
                    .toLowerCase()
                    .normalize("NFD")
                    .replace(/[\u0300-\u036f]/g, "");
            }

            function applyFilters() {
                const qq = norm(q);

                const filtered = _base.filter(v => {
                    const okSt = (filtro === "TODAS") ? true : String(v.status).toUpperCase() === filtro;
                    const hay = norm([v.cargo, v.empresa, v.cidade, v.estado, v.idVaga, v.status].join(" "));
                    const okQ = !qq || hay.includes(qq);
                    return okSt && okQ;
                });

                renderMinhasCandidaturas(filtered);
            }

            async function fetchMinhasCandidaturas() {
                const token = getToken();
                if (!token) throw new Error("Sem token. Faça login novamente.");

                const url = new URL(ENDPOINT, API_BASE).toString();

                const resp = await fetch(url, {
                    method: "GET",
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                });

                if (resp.status === 401 || resp.status === 403) {
                    throw new Error("Sem autorização (token inválido ou expirado).");
                }

                const text = await resp.text().catch(() => "");
                if (!resp.ok) throw new Error(text || `Falha ao buscar candidaturas (${resp.status})`);

                let data;
                try {
                    data = text ? JSON.parse(text) : [];
                } catch {
                    data = [];
                }

                return normalizeList(data);
            }

            async function boot() {
                try {
                    _base = await fetchMinhasCandidaturas();
                    applyFilters();
                } catch (err) {
                    console.error("[minhas-candidaturas]", err);
                    _base = [];
                    applyFilters();
                }
            }

            document.addEventListener("DOMContentLoaded", () => {
                $("#mcChips")?.addEventListener("click", (e) => {
                    const b = e.target.closest(".mc-chip");
                    if (!b) return;
                    $("#mcChips").querySelectorAll(".mc-chip").forEach(x => x.classList.remove("active"));
                    b.classList.add("active");
                    filtro = b.getAttribute("data-st") || "TODAS";
                    applyFilters();
                });

                $("#mcSearch")?.addEventListener("input", () => {
                    q = $("#mcSearch").value || "";
                    applyFilters();
                });

                boot();
            });

            window.addEventListener("perfil:loaded", boot);
        })();
    </script>


    <script>
        (() => {
            "use strict";

            const API_BASE = window.JobHub_API_BASE || "";
            const base = API_BASE.replace(/\/+$/, "");
            const $ = (id) => document.getElementById(id);

            const drawer = $("vagaDrawer");
            const overlay = $("vagaDrawerOverlay");
            const btnClose = $("vagaDrawerClose");
            const titleEl = $("vagaDrawerTitulo");
            const subEl = $("vagaDrawerSub");
            const bodyEl = $("vagaDrawerBody");
            const btnCandidatar = $("vagaDrawerCandidatar");
            const btnIrParaVaga = $("vagaDrawerIrParaVaga");
            const btnSalvar = $("vagaDrawerSalvar");

            if (!drawer || !overlay || !btnClose || !titleEl || !subEl || !bodyEl) return;

            function getToken() {
                return localStorage.getItem("token") || localStorage.getItem("accessToken") || "";
            }

            function escHtml(v) {
                return String(v ?? "")
                    .replaceAll("&", "&amp;")
                    .replaceAll("<", "&lt;")
                    .replaceAll(">", "&gt;")
                    .replaceAll('"', "&quot;")
                    .replaceAll("'", "&#039;");
            }

            function joinNonEmpty(arr, sep = " • ") {
                return (arr || []).filter(Boolean).join(sep);
            }

            function fmtDateBR(iso) {
                if (!iso) return "";
                const s = String(iso).trim();
                const d = new Date(s.includes("T") ? s : s.replace(" ", "T"));
                if (isNaN(d.getTime())) return s;
                const dd = String(d.getDate()).padStart(2, "0");
                const mm = String(d.getMonth() + 1).padStart(2, "0");
                const yy = d.getFullYear();
                return `${dd}/${mm}/${yy}`;
            }

            function formatMoneyBR(v) {
                const n = Number(v);
                if (!isFinite(n)) return "";
                return n.toLocaleString("pt-BR", {
                    style: "currency",
                    currency: "BRL"
                });
            }

            function getSalaryText(v) {
                const salarioRaw = v?.salarioValor ?? v?.salario ?? v?.remuneracao ?? v?.valorSalario ?? null;
                const salarioValor = Number(salarioRaw);
                const salarioMin = Number(v?.salarioMin ?? v?.faixaSalarialMin ?? v?.valorMin ?? null);
                const salarioMax = Number(v?.salarioMax ?? v?.faixaSalarialMax ?? v?.valorMax ?? null);
                const salarioTipo = String(v?.salarioTipo || "").trim().toUpperCase();

                const hasMin = Number.isFinite(salarioMin) && salarioMin > 0;
                const hasMax = Number.isFinite(salarioMax) && salarioMax > 0;
                const hasVal = Number.isFinite(salarioValor) && salarioValor > 0;

                if (hasMin && hasMax && salarioMin !== salarioMax) return `De ${formatMoneyBR(salarioMin)} a ${formatMoneyBR(salarioMax)}`;
                if (hasMax) return `Até ${formatMoneyBR(salarioMax)}`;
                if (hasMin) return formatMoneyBR(salarioMin);
                if (hasVal) return formatMoneyBR(salarioValor);
                if (salarioTipo.includes("COMBIN")) return "Salário a combinar";
                return "";
            }

            function openDrawer() {
                drawer.classList.add("is-open");
                drawer.setAttribute("aria-hidden", "false");
                document.documentElement.style.overflow = "hidden";
            }

            function closeDrawer() {
                drawer.classList.remove("is-open");
                drawer.setAttribute("aria-hidden", "true");
                document.documentElement.style.overflow = "";
            }

            overlay.addEventListener("click", closeDrawer);
            btnClose.addEventListener("click", closeDrawer);
            document.addEventListener("keydown", (e) => {
                if (e.key === "Escape" && drawer.classList.contains("is-open")) closeDrawer();
            });

            function getRecoVagaFallback(idVaga) {
                try {
                    if (typeof window.__JobHub_RECO_GET_VAGA__ === "function") {
                        return window.__JobHub_RECO_GET_VAGA__(Number(idVaga));
                    }
                } catch (_) {}
                return null;
            }

            async function fetchVagaDetalhe(idVaga) {
                const token = getToken();

                const candidates = [
                    `${base}/vagas/${idVaga}`,
                    `${base}/vagas/me/${idVaga}`,
                    `${base}/vagas/detalhe/${idVaga}`
                ];

                let lastErr = null;

                for (const url of candidates) {
                    try {
                        const resp = await fetch(url, {
                            method: "GET",
                            headers: {
                                ...(token ? {
                                    Authorization: `Bearer ${token}`
                                } : {}),
                                Accept: "application/json",
                            },
                        });

                        const text = await resp.text().catch(() => "");

                        if (resp.status === 404) continue;

                        if (!resp.ok) {
                            lastErr = new Error(text || `Falha ao buscar vaga (${resp.status})`);
                            continue;
                        }

                        try {
                            return text ? JSON.parse(text) : {};
                        } catch {
                            return {
                                descricao: text
                            };
                        }
                    } catch (e) {
                        lastErr = e;
                    }
                }

                const fallback = getRecoVagaFallback(idVaga);
                if (fallback) return fallback;

                throw lastErr || new Error("Não consegui encontrar endpoint de detalhe da vaga.");
            }

            function normalizeVagaFromApi(raw) {
                const src = raw || {};
                const v = src.vagaDTO || src.vaga || src.job || src.jobDTO || src.item?.vaga || src.item?.vagaDTO || src;
                const emp = v.empresaDTO || v.empresa || {};
                const loc = v.localizacao || v.localizacaoDTO || {};

                const cargo = v.cargo || v.titulo || v.nomeVaga || v.nome || "Vaga";
                const nivel = v.complemento || v.nivel || v.nivelHierarquico || "";

                const empresaNome = emp.empresaNome || emp.nome || emp.razaoSocial || v.empresaNome || v.nomeEmpresa || "—";
                const empresaDescricao = emp.empresaDescricao || emp.descricao || v.empresaDescricao || "";
                const empresaSegmento = emp.empresaSegmento || emp.segmento || "";
                const empresaTamanho = emp.empresaTamanho || emp.tamanho || "";
                const empresaSite = emp.empresaSite || emp.site || "";
                const confidencial = !!(emp.empresaConfidencial ?? v.empresaConfidencial);

                const modalidade = v.modalidadeVagaDTO || v.modalidade || v.tipoTrabalho || v.modelo || "";
                const contrato = v.tipoContrato || v.tipo_contrato || "";
                const categoria = v.categoriaVagaDTO || v.categoria || "";
                const salarioTipo = v.salarioTipoDTO || v.salarioTipo || "";
                const salarioValor = v.salarioValor ?? v.salario ?? v.remuneracao ?? v.valorSalario ?? null;
                const salarioMin = v.salarioMin ?? v.faixaSalarialMin ?? v.valorMin ?? null;
                const salarioMax = v.salarioMax ?? v.faixaSalarialMax ?? v.valorMax ?? null;

                const descricao = v.descricao || v.descricaoVaga || v.sobre || "";
                const jornada = v.jornada || "";

                const responsabilidades = Array.isArray(v.responsabilidades) ? v.responsabilidades : [];
                const reqObrig = Array.isArray(v.requisitosObrigatorios) ? v.requisitosObrigatorios : [];
                const reqDesej = Array.isArray(v.requisitosDesejaveis) ? v.requisitosDesejaveis : [];
                const beneficios = Array.isArray(v.beneficios) ? v.beneficios : [];

                const obs = v.observacoes || "";
                const dataPub = v.dataPublicacao || v.publicadoEm || "";
                const interessados = src.totalInteressados ?? src.interessados ?? v.totalInteressados ?? v.interessados ?? 0;
                const urgente = !!(src.contratacaoUrgente ?? src.urgente ?? v.contratacaoUrgente ?? v.urgente);

                const cidade = loc.cidade || v.cidade || "";
                const estado = loc.estado || loc.uf || v.estado || v.uf || "";
                const bairro = loc.bairro || "";
                const endereco = joinNonEmpty([
                    joinNonEmpty([loc.rua, loc.numero].filter(Boolean), ", "),
                    loc.complemento,
                    bairro,
                ], " • ");
                const cep = loc.cep || "";

                const formacao0 = Array.isArray(v.formacao) ? v.formacao[0] : null;
                const escolaridade = formacao0?.escolaridade || "";
                const formacaoObs = formacao0?.experienciaDescricao || "";

                const req0 = Array.isArray(v.requisitos) ? v.requisitos[0] : null;
                const reqGeralObs = req0?.observacao || "";
                const viajar = !!req0?.viajar;
                const mudar = !!req0?.mudarResidencia;

                const idioma0 = Array.isArray(v.idiomas) ? v.idiomas[0] : null;
                const idioma = idioma0?.idioma || "";
                const idiomaNivel = idioma0?.nivelIdioma || "";
                const idiomaObrig = !!idioma0?.obrigatorio;

                return {
                    idVaga: v.idVaga ?? v.id ?? v.vagaId ?? v.id_vaga ?? 0,
                    cargo,
                    nivel,
                    empresaNome,
                    empresaDescricao,
                    empresaSegmento,
                    empresaTamanho,
                    empresaSite,
                    confidencial,
                    modalidade,
                    contrato,
                    categoria,
                    salarioTipo,
                    salarioValor,
                    salarioMin,
                    salarioMax,
                    descricao,
                    jornada,
                    responsabilidades,
                    reqObrig,
                    reqDesej,
                    beneficios,
                    obs,
                    dataPub,
                    interessados,
                    urgente,
                    cidade,
                    estado,
                    endereco,
                    cep,
                    escolaridade,
                    formacaoObs,
                    reqGeralObs,
                    viajar,
                    mudar,
                    idioma,
                    idiomaNivel,
                    idiomaObrig,
                };
            }

            function renderVagaPremium(rawApi) {
                const v = normalizeVagaFromApi(rawApi);

                const title = joinNonEmpty([v.cargo, v.nivel].filter(Boolean), " • ");
                const local = joinNonEmpty([v.cidade, v.estado].filter(Boolean), " / ") || "—";

                const sub = joinNonEmpty([
                    v.confidencial ? "Empresa confidencial" : v.empresaNome,
                    local !== "—" ? local : "",
                    v.modalidade,
                    v.contrato,
                ].filter(Boolean), " • ");

                titleEl.textContent = title || "Detalhe da vaga";
                subEl.textContent = sub || "";

                const money = getSalaryText(v);
                const chips = [];
                if (money) chips.push(` ${money}`);
                if (v.jornada) chips.push(` ${v.jornada}`);
                if (v.categoria) chips.push(` ${v.categoria}`);
                if (v.urgente) chips.push(` Contratação urgente`);
                if (v.interessados) chips.push(` ${Number(v.interessados)} interessado(s)`);

                const empresaMeta = joinNonEmpty([v.empresaSegmento, v.empresaTamanho].filter(Boolean), " • ");
                const addrLine = joinNonEmpty([v.endereco, v.cep ? `CEP ${v.cep}` : ""].filter(Boolean), " • ");

                const listHtml = (arr) => (arr || []).length ?
                    `<ul class="vaga-drawer-ul">${arr.map(x => `<li>${escHtml(x)}</li>`).join("")}</ul>` :
                    `<div class="vaga-drawer-empty">—</div>`;

                const footerMeta = joinNonEmpty([
                    v.dataPub ? `Publicado em ${fmtDateBR(v.dataPub)}` : "",
                    v.salarioTipo ? `Salário: ${v.salarioTipo}` : "",
                ].filter(Boolean), " • ");

                const reqGeral = joinNonEmpty([
                    v.reqGeralObs,
                    v.viajar ? "Pode viajar" : "Não precisa viajar",
                    v.mudar ? "Pode mudar residência" : "Não precisa mudar residência",
                ].filter(Boolean), " • ");

                const idiomaTxt = v.idioma ?
                    joinNonEmpty([`${v.idioma} (${v.idiomaNivel || "—"})`, v.idiomaObrig ? "Obrigatório" : "Não obrigatório"], " • ") :
                    "";

                bodyEl.innerHTML = `
          <style>
            .vaga-drawer-chips{display:flex;flex-wrap:wrap;gap:8px;margin:10px 0 6px}
            .vaga-drawer-chip{font-size:14px;padding:6px 10px;border:1px solid #e2e8f0;background:#f8fafc;border-radius:999px;color:#334155}
            .vaga-drawer-grid{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-top:10px}
            @media (max-width:520px){.vaga-drawer-grid{grid-template-columns:1fr}}
            .vaga-mini{border:1px solid #e5e7eb;background:#f9fafb;border-radius:14px;padding:10px 11px}
            .vaga-mini-k{font-size:13.5px;color:#64748b;font-weight:800}
            .vaga-mini-v{margin-top:2px;font-size:13.5px;color:#0f172a;font-weight:700;line-height:1.35}
            .vaga-drawer-ul{margin:8px 0 0;padding-left:18px;color:#334155;font-size:13px;line-height:1.55}
            .vaga-drawer-ul li{margin:6px 0}
            .vaga-drawer-empty{margin-top:8px;border:1px dashed #cbd5e1;background:#f8fafc;border-radius:14px;padding:10px 11px;color:#64748b;font-size:14.5px}
            .vaga-company{margin-top:8px;color:#334155;font-size:15px;line-height:1.5}
            .vaga-company b{color:#0f172a}
            .vaga-link{display:inline-flex;gap:8px;align-items:center;margin-top:8px;font-size:13.5px;font-weight:800}
            .vaga-link a{color:#2563eb;text-decoration:none}
            .vaga-link a:hover{text-decoration:underline}
            .vaga-footmeta{margin-top:12px;font-size:13.5px;color:#64748b;border-top:1px dashed #e2e8f0;padding-top:10px}
            .vaga-drawer-ul li{font-size:13.5px;}
          </style>

          ${chips.length ? `
            <div class="vaga-drawer-chips">
              ${chips.map(c => `<span class="vaga-drawer-chip">${escHtml(c)}</span>`).join("")}
            </div>` : ""}


          <section class="vaga-drawer-section">
            <h3>Local</h3>
            <div class="vaga-drawer-text">${escHtml(local)}</div>
            ${addrLine ? `<div style="margin-top:8px;color:#64748b;font-size:12.5px;line-height:1.45">${escHtml(addrLine)}</div>` : ""}
          </section>

          <section class="vaga-drawer-section">
            <h3>Sobre a vaga</h3>
            <div class="vaga-drawer-text">${escHtml(v.descricao || "Sem descrição cadastrada.")}</div>
          </section>

          <div class="vaga-drawer-grid">
            ${v.modalidade ? `<div class="vaga-mini"><div class="vaga-mini-k">Modalidade</div><div class="vaga-mini-v">${escHtml(v.modalidade)}</div></div>` : ""}
            ${v.contrato ? `<div class="vaga-mini"><div class="vaga-mini-k">Contrato</div><div class="vaga-mini-v">${escHtml(v.contrato)}</div></div>` : ""}
            ${money ? `<div class="vaga-mini"><div class="vaga-mini-k">Salário</div><div class="vaga-mini-v">${escHtml(money)}</div></div>` : ""}
            ${v.jornada ? `<div class="vaga-mini"><div class="vaga-mini-k">Jornada</div><div class="vaga-mini-v">${escHtml(v.jornada)}</div></div>` : ""}
          </div>

          <section class="vaga-drawer-section"><h3>Responsabilidades</h3>${listHtml(v.responsabilidades)}</section>
          <section class="vaga-drawer-section"><h3>Requisitos obrigatórios</h3>${listHtml(v.reqObrig)}</section>
          <section class="vaga-drawer-section"><h3>Diferenciais</h3>${listHtml(v.reqDesej)}</section>
          <section class="vaga-drawer-section"><h3>Benefícios</h3>${listHtml(v.beneficios)}</section>

          ${v.obs ? `<section class="vaga-drawer-section"><h3>Observações</h3><div class="vaga-drawer-text">${escHtml(v.obs)}</div></section>` : ""}

          ${(v.escolaridade || v.formacaoObs || reqGeral || idiomaTxt) ? `
            <section class="vaga-drawer-section">
              <h3>Requisitos gerais</h3>
              ${v.escolaridade ? `<div style="margin-top:6px;color:#334155;font-size:13px;line-height:1.5"><b>Escolaridade:</b> ${escHtml(v.escolaridade)}</div>` : ""}
              ${v.formacaoObs ? `<div style="margin-top:6px;color:#334155;font-size:13px;line-height:1.5"><b>Experiência:</b> ${escHtml(v.formacaoObs)}</div>` : ""}
              ${reqGeral ? `<div style="margin-top:6px;color:#64748b;font-size:13.5px;line-height:1.45">${escHtml(reqGeral)}</div>` : ""}
              ${idiomaTxt ? `<div style="margin-top:6px;color:#64748b;font-size:13.5px;line-height:1.45"><b>Idioma:</b> ${escHtml(idiomaTxt)}</div>` : ""}
            </section>` : ""}

          ${footerMeta ? `<div class="vaga-footmeta">${escHtml(footerMeta)}</div>` : ""}
        `;

                return v;
            }

            async function openVagaById(id) {
                const idVaga = Number(id || 0);
                if (!idVaga) return;

                titleEl.textContent = "Carregando…";
                subEl.textContent = "—";
                bodyEl.innerHTML = `<div class="vaga-drawer-skeleton">Carregando detalhes da vaga…</div>`;
                openDrawer();

                const pesquisarBase = `${window.URL_BASE || "/"}pesquisar`;
                if (btnIrParaVaga) btnIrParaVaga.onclick = () => {
                    window.location.href = `${pesquisarBase}?vaga=${encodeURIComponent(idVaga)}`;
                };
                if (btnCandidatar) btnCandidatar.onclick = () => {
                    window.location.href = `${pesquisarBase}?vaga=${encodeURIComponent(idVaga)}&apply=1`;
                };
                if (btnSalvar) btnSalvar.onclick = () => console.log("[salvar vaga] idVaga =", idVaga);

                try {
                    const raw = await fetchVagaDetalhe(idVaga);
                    renderVagaPremium(raw);
                } catch (e) {
                    titleEl.textContent = "Falha ao carregar";
                    subEl.textContent = "";
                    bodyEl.innerHTML = `
            <div class="vaga-drawer-skeleton">
              Não consegui carregar os detalhes desta vaga.<br>
              <small style="color:#b91c1c">${escHtml(e?.message || "Erro desconhecido")}</small>
            </div>
          `;
                    console.error("[VAGA DRAWER]", e);
                }
            }

            // Intercepta cliques em "Ver vaga" e abre drawer (NUNCA navega)
            document.addEventListener("click", (e) => {
                const btn = e.target.closest('[data-ver-vaga="1"], .job-btn-primary, .mc-btn.primary');
                if (!btn) return;

                let id = Number(btn.getAttribute("data-idvaga") || btn.dataset.idvaga || btn.getAttribute("data-id") || btn.dataset.id || 0);

                if (!id) {
                    const on = btn.getAttribute("onclick") || "";
                    const m = on.match(/idVaga\s*:\s*(\d+)/i) || on.match(/"idVaga"\s*:\s*(\d+)/i);
                    if (m) id = Number(m[1] || 0);
                }

                if (!id) return;

                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();

                openVagaById(id);
            }, true);

            // Mantém API pública sem redirecionar
            Object.defineProperty(window, "irParaVaga", {
                configurable: true,
                get() {
                    return (obj) => {
                        const id =
                            obj && typeof obj === "object" ?
                            (obj.idVaga ?? obj.id ?? obj.vagaId ?? obj.vaga_id) :
                            obj;
                        return openVagaById(id);
                    };
                },
                set() {
                    console.warn("[irParaVaga] tentativa de sobrescrever ignorada.");
                },
            });

            window.__OPEN_VAGA_DRAWER__ = openVagaById;
            window.JobHub_openVagaDrawer = openVagaById;
        })();
    </script>



</body>

</html>