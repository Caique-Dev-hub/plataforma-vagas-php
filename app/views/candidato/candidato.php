<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Plataforma de Vagas</title>

    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/reset.css" />
    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/candidato.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800;900&family=Inter:wght@500;600;700&display=swap');

        /* =========================================================
       HEADER JobHub (isolado)
    ========================================================= */
        .jobhubH-shell,
        .jobhubH-shell * {
            box-sizing: border-box;
        }

        .jobhubH-shell {
            --jobhub-bg: #ffffff;
            --jobhub-text: rgba(15, 23, 42, .92);
            --jobhub-muted: rgba(15, 23, 42, .70);
            --jobhub-line: rgba(15, 23, 42, .10);
            --jobhub-shadow: 0 18px 60px rgba(15, 23, 42, .14);
            --jobhub-shadow2: 0 10px 26px rgba(15, 23, 42, .10);
            --jobhub-r: 16px;
            --jobhub-r2: 12px;

            --jobhub-blue: #6e88a7;
            --jobhub-blue2: #9cafc9;
            --jobhub-pink: #2b81a9;

            position: sticky;
            top: 0;
            z-index: 9990;
            height: 74px;
            background: var(--jobhub-bg);
            border-bottom: 1px solid rgba(15, 23, 42, .06);
            box-shadow: 0 10px 30px rgba(15, 23, 42, .08);
            display: flex;
            align-items: center;
            font-family: "Montserrat", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            transition: transform .18s ease, box-shadow .18s ease, background .18s ease, height .18s ease, border-color .18s ease;
            will-change: transform;
        }

        .jobhubH-shell.is-scrolled {
            background: rgba(255, 255, 255, .88);
            backdrop-filter: blur(12px);
            border-bottom-color: rgba(15, 23, 42, .10);
            box-shadow: 0 18px 60px rgba(15, 23, 42, .16);
        }

        .jobhubH-shell.is-hidden {
            transform: translateY(-110%);
        }

        .jobhubH-wrap {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .jobhubH-logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            flex: 0 0 auto;
        }

        .jobhubH-logoImg {
            height: 75px;
            width: auto;
            display: block;
            transition: height .18s ease;
        }

        .jobhubH-shell.is-scrolled .jobhubH-logoImg {
            height: 60px;
        }

        .jobhubH-nav {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .jobhubH-cta {
            height: 42px;
            padding: 0 18px;
            border-radius: 999px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: 13px;
            letter-spacing: .2px;
            box-shadow: var(--jobhub-shadow2);
            transition: transform .12s ease, filter .12s ease;
            white-space: nowrap;
        }

        .jobhubH-cta:hover {
            transform: translateY(-1px);
            filter: brightness(1.02);
        }

        .jobhubH-cta--empresa {
            color: #fff;
            background: linear-gradient(90deg, var(--jobhub-blue), var(--jobhub-blue2));
        }

        .jobhubH-cta--cv {
            color: rgba(15, 23, 42, .92);
            border: 1px solid rgba(15, 23, 42, .10);
            background: linear-gradient(90deg, rgba(255, 255, 255, .9), rgba(255, 255, 255, 1));
        }

        .jobhubH-burger {
            display: none;
            margin-left: auto;
            height: 44px;
            width: 44px;
            border-radius: 12px;
            border: 1px solid rgba(15, 23, 42, .10);
            background: #fff;
            color: var(--jobhub-text);
            cursor: pointer;
            font-size: 22px;
            box-shadow: var(--jobhub-shadow2);
        }

        .jobhubM-root {
            position: relative;
        }

        .jobhubM-btn {
            height: 42px;
            padding: 0 14px;
            border-radius: 999px;
            border: 1px solid rgba(15, 23, 42, .10);
            background: #fff;
            cursor: pointer;
            font-weight: 900;
            font-size: 13px;
            color: var(--jobhub-text);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: var(--jobhub-shadow2);
            transition: transform .12s ease, background .12s ease;
        }

        .jobhubM-btn:hover {
            transform: translateY(-1px);
            background: rgba(15, 23, 42, .03);
        }

        .jobhubM-ico::before {
            content: "☰";
            font-size: 18px;
            line-height: 1;
            opacity: .9;
        }

        .jobhubM-drop {
            position: absolute;
            right: 0;
            top: calc(100% + 10px);
            width: 220px;
            background: rgba(255, 255, 255, .98);
            border: 1px solid rgba(15, 23, 42, .10);
            border-radius: 14px;
            box-shadow: var(--jobhub-shadow);
            padding: 8px;
            z-index: 9999;
        }

        .jobhubM-drop a {
            display: block;
            padding: 10px 10px;
            border-radius: 12px;
            text-decoration: none;
            color: var(--jobhub-text);
            font-weight: 900;
            font-size: 13px;
        }

        .jobhubM-drop a:hover {
            background: rgba(15, 23, 42, .06);
        }

        .jobhubA-root {
            position: relative;
        }

        .jobhubA-trigger {
            height: 44px;
            padding: 0 14px;
            border-radius: 999px;
            border: 1px solid rgba(15, 23, 42, .10);
            background: #fff;
            cursor: pointer;
            font-weight: 900;
            color: var(--jobhub-text);
            box-shadow: var(--jobhub-shadow2);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: transform .12s ease, background .12s ease;
        }

        .jobhubA-trigger:hover {
            transform: translateY(-1px);
            background: rgba(15, 23, 42, .03);
        }

        .jobhubA-caret {
            opacity: .7;
        }

        .jobhubA-pop {
            position: absolute;
            right: 0;
            top: calc(100% + 12px);
            width: min(360px, 92vw);
            background: rgba(255, 255, 255, .96);
            border: 1px solid rgba(15, 23, 42, .10);
            border-radius: var(--jobhub-r);
            box-shadow: var(--jobhub-shadow);
            padding: 14px;
            z-index: 9999;
            backdrop-filter: blur(10px);
        }

        .jobhubA-pop::before {
            content: "";
            position: absolute;
            top: -7px;
            right: 18px;
            width: 14px;
            height: 14px;
            background: rgba(255, 255, 255, .96);
            border-left: 1px solid rgba(15, 23, 42, .10);
            border-top: 1px solid rgba(15, 23, 42, .10);
            transform: rotate(45deg);
            border-top-left-radius: 4px;
        }

        .jobhubA-tabs {
            display: flex;
            gap: 8px;
            padding: 6px;
            border-radius: 999px;
            background: rgba(15, 23, 42, .06);
            border: 1px solid rgba(15, 23, 42, .08);
            margin-bottom: 10px;
        }

        .jobhubA-tab {
            flex: 1;
            height: 38px;
            border-radius: 999px;
            border: 0;
            background: transparent;
            font-weight: 900;
            cursor: pointer;
            color: rgba(15, 23, 42, .70);
            transition: background .14s ease, color .14s ease, box-shadow .14s ease;
        }

        .jobhubA-tab:hover {
            background: rgba(255, 255, 255, .70);
        }

        .jobhub-is-active {
            background: linear-gradient(90deg, rgba(31, 117, 216, .18), rgba(169, 43, 157, .10));
            color: rgba(15, 23, 42, .92);
            box-shadow: inset 0 0 0 1px rgba(15, 23, 42, .10);
        }

        .jobhubA-alert {
            border-radius: 12px;
            padding: 10px 12px;
            font-weight: 900;
            font-size: 12px;
            margin: 10px 0;
            border: 1px solid rgba(15, 23, 42, .10);
        }

        .jobhubA-alert.jobhub-alert--error {
            background: rgba(239, 68, 68, .10);
            border-color: rgba(239, 68, 68, .25);
            color: #b91c1c;
        }

        .jobhubA-alert.jobhub-alert--success {
            background: rgba(34, 197, 94, .12);
            border-color: rgba(34, 197, 94, .25);
            color: #166534;
        }

        .jobhubA-field {
            display: block;
            margin-bottom: 10px;
        }

        .jobhubA-label {
            display: block;
            font-size: 12px;
            font-weight: 900;
            opacity: .75;
            margin-bottom: 6px;
            font-family: "Montserrat", sans-serif;
        }

        .jobhubA-input {
            width: 100%;
            height: 46px;
            border-radius: 14px;
            border: 1px solid rgba(15, 23, 42, .12);
            background: #fff;
            padding: 0 12px;
            outline: none;
            font-family: "Inter", sans-serif;
            font-weight: 700;
            color: rgba(15, 23, 42, .92);
            transition: box-shadow .12s ease, border-color .12s ease;
        }

        .jobhubA-input:focus {
            border-color: rgba(31, 117, 216, .40);
            box-shadow: 0 0 0 4px rgba(31, 117, 216, .12);
        }

        .jobhub-is-invalid {
            border-color: rgba(239, 68, 68, .45) !important;
            box-shadow: 0 0 0 4px rgba(239, 68, 68, .10) !important;
        }

        .jobhub-is-valid {
            border-color: rgba(34, 197, 94, .35) !important;
        }

        .jobhubA-fieldErr {
            min-height: 16px;
            margin-top: 6px;
            font-size: 12px;
            font-weight: 900;
            color: #ef4444;
        }

        .jobhubA-pass {
            position: relative;
        }

        .jobhubA-pass .jobhubA-input {
            padding-right: 56px;
        }

        .jobhubA-eye {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            border-radius: 12px;
            border: 1px solid rgba(15, 23, 42, .12);
            background: rgba(15, 23, 42, .05);
            cursor: pointer;
            color: rgba(15, 23, 42, .75);
            display: grid;
            place-items: center;
        }

        .jobhubA-eye:hover {
            background: rgba(15, 23, 42, .10);
        }

        .jobhubA-submit {
            width: 100%;
            height: 46px;
            border-radius: 999px;
            border: 0;
            cursor: pointer;
            font-weight: 900;
            letter-spacing: .2px;
            color: #fff;
            background: linear-gradient(90deg, var(--jobhub-blue), var(--jobhub-pink));
            box-shadow: var(--jobhub-shadow2);
        }

        .jobhubA-submit:disabled {
            opacity: .72;
            cursor: not-allowed;
        }

        .jobhubA-links {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 12px;
            padding-top: 10px;
            border-top: 1px solid rgba(15, 23, 42, .08);
            font-size: 12px;
        }

        .jobhubA-links a {
            color: rgba(15, 23, 42, .72);
            text-decoration: none;
            font-weight: 900;
        }

        .jobhubA-links a:hover {
            color: var(--jobhub-blue);
        }

        .jobhubU-mini {
            display: flex;
            gap: 12px;
            align-items: center;
            padding: 10px;
            border-radius: 14px;
            background: rgba(15, 23, 42, .04);
            border: 1px solid rgba(15, 23, 42, .08);
            margin-bottom: 10px;
        }

        .jobhubU-avatar {
            width: 42px;
            height: 42px;
            border-radius: 14px;
            background: linear-gradient(90deg, var(--jobhub-blue), var(--jobhub-pink));
            box-shadow: 0 10px 20px rgba(15, 23, 42, .12);
        }

        .jobhubU-top {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .jobhubU-role {
            font-size: 11px;
            font-weight: 900;
            padding: 4px 8px;
            border-radius: 999px;
            background: rgba(31, 117, 216, .12);
            border: 1px solid rgba(15, 23, 42, .08);
            color: rgba(15, 23, 42, .78);
            text-transform: uppercase;
        }

        .jobhubU-email {
            font-size: 12px;
            font-weight: 800;
            opacity: .75;
            margin-top: 2px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 220px;
        }

        .jobhubU-actions {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .jobhubU-item {
            display: flex;
            align-items: center;
            width: 100%;
            text-align: left;
            padding: 11px 10px;
            border-radius: 12px;
            border: 0;
            background: transparent;
            cursor: pointer;
            text-decoration: none;
            color: rgba(15, 23, 42, .92);
            font-weight: 900;
            transition: background .12s ease, transform .12s ease;
        }

        .jobhubU-item:hover {
            background: rgba(15, 23, 42, .06);
            transform: translateY(-1px);
        }

        .jobhub-is-danger {
            color: #ef4444 !important;
        }

        .jobhubMM-overlay {
            position: fixed;
            inset: 0;
            background: rgba(2, 6, 23, .55);
            opacity: 0;
            transition: opacity .25s ease;
            z-index: 9998;
        }

        .jobhubMM-overlay.jobhub-show {
            opacity: 1;
        }

        .jobhubMM-panel {
            position: fixed;
            top: 0;
            left: -110%;
            width: min(340px, 92vw);
            height: 100vh;
            background: #fff;
            padding: 22px 20px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            transition: left .25s ease;
            z-index: 9999;
            box-shadow: var(--jobhub-shadow);
            border-right: 1px solid rgba(15, 23, 42, .08);
        }

        .jobhubMM-panel.jobhub-show {
            left: 0;
        }

        .jobhubMM-close {
            align-self: flex-end;
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: rgba(15, 23, 42, .06);
            border: 1px solid rgba(15, 23, 42, .08);
            font-size: 22px;
            cursor: pointer;
        }

        .jobhubMM-link {
            font-size: 16px;
            font-weight: 900;
            color: rgba(15, 23, 42, .88);
            text-decoration: none;
            padding: 12px 6px;
            border-bottom: 1px solid rgba(15, 23, 42, .06);
        }

        .jobhubMM-btn {
            margin-top: 6px;
            padding: 12px;
            border-radius: 999px;
            font-weight: 900;
            cursor: pointer;
            border: 0;
            text-decoration: none;
            text-align: center;
            display: inline-flex;
            justify-content: center;
            align-items: center;
        }

        .jobhubMM-btn--outline {
            border: 2px solid var(--jobhub-pink);
            background: transparent;
            color: var(--jobhub-pink);
        }

        .jobhubMM-btn--primary {
            background: linear-gradient(90deg, var(--jobhub-blue), var(--jobhub-pink));
            color: #fff;
        }

        @media (max-width: 900px) {
            .jobhubH-nav {
                display: none !important;
            }

            .jobhubH-burger {
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }
        }

        .jobhubH-shell [hidden],
        .jobhubMM-overlay[hidden] {
            display: none !important;
        }

        /* =========================================================
       NOVO LAYOUT DA PÁGINA
    ========================================================= */
        :root {
            --pg-bg: #f3f6ff;
            --pg-text: #0f172a;
            --pg-muted: #64748b;
            --pg-line: rgba(15, 23, 42, .10);
            --pg-card: #ffffff;
            --pg-shadow: 0 18px 50px rgba(15, 23, 42, .12);

            --pg-blue: #2b81a9;
            --pg-blue2: #6e88a7;
            --pg-accent: #1F75D8;

            --r-xl: 24px;
            --r-lg: 18px;
            --r-md: 14px;
        }

        body {
            background:
                radial-gradient(900px 420px at 12% 0%, rgba(31, 117, 216, .10), transparent 60%),
                radial-gradient(900px 420px at 90% 0%, rgba(43, 129, 169, .12), transparent 60%),
                var(--pg-bg);
            color: var(--pg-text);
            font-family: "Inter", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
        }

        .cand-wrap {
            max-width: 1200px;
            margin: 0 auto;
            padding: 16px 16px 28px;
        }

        .cand-hero {
            margin-top: 16px;
            border-radius: var(--r-xl);
            background: linear-gradient(135deg, rgba(110, 136, 167, .16), rgba(43, 129, 169, .12));
            border: 1px solid rgba(15, 23, 42, .08);
            box-shadow: var(--pg-shadow);
            overflow: hidden;
            position: relative;
        }

        .cand-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(420px 220px at 90% 0%, rgba(31, 117, 216, .18), transparent 60%);
            pointer-events: none;
        }

        .cand-hero-inner {
            position: relative;
            padding: 18px 18px;
            display: grid;
            grid-template-columns: 1.4fr 0.6fr;
            gap: 14px;
            align-items: center;
        }

        @media (max-width: 920px) {
            .cand-hero-inner {
                grid-template-columns: 1fr;
            }
        }

        .cand-hello {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .cand-hello h1 {
            margin: 0;
            font-size: 18px;
            font-weight: 900;
            letter-spacing: .2px;
        }

        .cand-hello p {
            margin: 0;
            color: var(--pg-muted);
            font-weight: 700;
            line-height: 1.35;
            font-size: 13px;
            max-width: 56ch;
        }

        .cand-hero-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
            justify-content: flex-end;
        }

        @media (max-width: 920px) {
            .cand-hero-actions {
                justify-content: flex-start;
            }
        }

        .cand-btn {
            height: 42px;
            padding: 0 16px;
            border-radius: 999px;
            border: 1px solid rgba(15, 23, 42, .10);
            background: #fff;
            color: rgba(15, 23, 42, .92);
            font-weight: 900;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 10px 22px rgba(15, 23, 42, .10);
            text-decoration: none;
            transition: transform .12s ease, filter .12s ease;
            white-space: nowrap;
        }

        .cand-btn:hover {
            transform: translateY(-1px);
            filter: brightness(1.01);
        }

        .cand-btn.primary {
            border: 0;
            color: #fff;
            background: linear-gradient(90deg, var(--pg-blue2), var(--pg-blue));
        }

        .cand-btn.ghost {
            background: rgba(255, 255, 255, .92);
        }

        .cand-bar {
            margin-top: 14px;
            background: rgba(255, 255, 255, .92);
            border: 1px solid rgba(15, 23, 42, .08);
            border-radius: var(--r-xl);
            box-shadow: 0 16px 40px rgba(15, 23, 42, .10);
            padding: 12px 12px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
            justify-content: space-between;
        }

        .cand-chips {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center;
        }

        .cand-chip {
            border-radius: 999px;
            padding: 8px 11px;
            font-size: 12px;
            border: 1px solid rgba(148, 163, 184, .75);
            background: #fff;
            color: rgba(15, 23, 42, .86);
            cursor: pointer;
            font-weight: 900;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            user-select: none;
        }

        .cand-chip.active {
            border-color: rgba(31, 117, 216, .30);
            background: rgba(31, 117, 216, .10);
            color: rgba(15, 23, 42, .92);
        }

        .cand-search {
            flex: 1 1 280px;
            max-width: 420px;
            min-width: 220px;
            display: flex;
            align-items: center;
            gap: 10px;
            border: 1px solid rgba(148, 163, 184, .75);
            background: #fff;
            border-radius: 999px;
            padding: 10px 12px;
            box-shadow: 0 10px 24px rgba(15, 23, 42, .08);
        }

        .cand-search input {
            border: 0;
            outline: 0;
            width: 100%;
            background: transparent;
            font-weight: 800;
            font-family: "Inter", sans-serif;
            color: rgba(15, 23, 42, .92);
        }

        .cand-grid {
            margin-top: 14px;
            display: grid;
            grid-template-columns: minmax(0, 1.55fr) minmax(0, .95fr);
            gap: 14px;
            align-items: start;
        }

        @media (max-width: 980px) {
            .cand-grid {
                grid-template-columns: 1fr;
            }
        }

        .job-feature {
            background: rgba(255, 255, 255, .96);
            border: 1px solid rgba(15, 23, 42, .08);
            border-radius: var(--r-xl);
            box-shadow: var(--pg-shadow);
            overflow: hidden;
            position: relative;
        }

        .job-feature::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(360px 220px at 105% -10%, rgba(31, 117, 216, .14), transparent 60%);
            pointer-events: none;
        }

        .job-head {
            position: relative;
            padding: 14px 14px 10px;
            border-bottom: 1px solid rgba(15, 23, 42, .08);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .job-head h2 {
            margin: 0;
            font-size: 14px;
            font-weight: 900;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .job-head h2 i {
            color: var(--pg-accent);
        }

        .job-kpi {
            font-size: 12px;
            font-weight: 900;
            color: rgba(15, 23, 42, .78);
            background: rgba(15, 23, 42, .04);
            border: 1px solid rgba(15, 23, 42, .08);
            border-radius: 999px;
            padding: 7px 10px;
            white-space: nowrap;
        }

        .job-body {
            position: relative;
            padding: 14px 14px 14px;
        }

        .job-title {
            margin: 0;
            font-size: 18px;
            font-weight: 900;
            letter-spacing: .2px;
            line-height: 1.15;
        }

        .job-subtitle {
            margin: 6px 0 0;
            font-size: 13px;
            font-weight: 800;
            color: rgba(15, 23, 42, .65);
        }

        .job-company {
            margin-top: 6px;
            color: rgba(15, 23, 42, .70);
            font-weight: 800;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
            font-size: 13px;
        }

        .job-company .dot {
            width: 6px;
            height: 6px;
            border-radius: 99px;
            background: rgba(15, 23, 42, .25);
            display: inline-block;
        }

        .job-chips {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .job-chip {
            border-radius: 999px;
            padding: 7px 10px;
            font-size: 11.5px;
            font-weight: 900;
            border: 1px solid rgba(15, 23, 42, .10);
            background: rgba(15, 23, 42, .03);
            color: rgba(15, 23, 42, .86);
            display: inline-flex;
            align-items: center;
            gap: 7px;
            white-space: nowrap;
        }

        .job-chip.blue {
            background: rgba(31, 117, 216, .10);
            border-color: rgba(31, 117, 216, .22);
        }

        .job-chip.green {
            background: rgba(34, 197, 94, .10);
            border-color: rgba(34, 197, 94, .20);
        }

        .job-chip.red {
            background: rgba(239, 68, 68, .10);
            border-color: rgba(239, 68, 68, .20);
        }

        .job-desc {
            margin-top: 12px;
            font-size: 13px;
            color: rgba(15, 23, 42, .78);
            font-weight: 700;
            line-height: 1.45;
            white-space: pre-wrap;
        }

        .job-actions {
            margin-top: 14px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
        }

        .job-actions-left {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
        }

        .job-btn {
            height: 42px;
            padding: 0 16px;
            border-radius: 999px;
            border: 1px solid rgba(15, 23, 42, .10);
            background: #fff;
            color: rgba(15, 23, 42, .92);
            font-weight: 900;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 10px 22px rgba(15, 23, 42, .10);
            transition: transform .12s ease, filter .12s ease;
            text-decoration: none;
        }

        .job-btn:hover {
            transform: translateY(-1px);
            filter: brightness(1.01);
        }

        .job-btn.primary {
            border: 0;
            color: #fff;
            background: linear-gradient(90deg, var(--pg-blue2), var(--pg-blue));
        }

        .job-btn.ghost {
            background: rgba(255, 255, 255, .94);
        }

        .job-btn:disabled {
            opacity: .55;
            cursor: not-allowed;
            transform: none !important;
            filter: none !important;
        }

        .job-list {
            background: rgba(255, 255, 255, .92);
            border: 1px solid rgba(15, 23, 42, .08);
            border-radius: var(--r-xl);
            box-shadow: 0 16px 44px rgba(15, 23, 42, .10);
            overflow: hidden;
        }

        .job-list-head {
            padding: 14px 14px 10px;
            border-bottom: 1px solid rgba(15, 23, 42, .08);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .job-list-head h3 {
            margin: 0;
            font-size: 13px;
            font-weight: 900;
            color: rgba(15, 23, 42, .92);
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .job-list-head h3 i {
            color: var(--pg-accent);
        }

        .job-list-body {
            padding: 10px 10px 12px;
            display: grid;
            gap: 8px;
            max-height: 246px;
            overflow: auto;
        }

        .job-mini {
            border: 1px solid rgba(15, 23, 42, .08);
            background: #fff;
            border-radius: var(--r-lg);
            padding: 11px 11px;
            cursor: pointer;
            box-shadow: 0 10px 20px rgba(15, 23, 42, .07);
            transition: transform .12s ease, box-shadow .12s ease, border-color .12s ease;
            display: grid;
            gap: 6px;
        }

        .job-mini:hover {
            transform: translateY(-1px);
            box-shadow: 0 16px 34px rgba(15, 23, 42, .10);
            border-color: rgba(31, 117, 216, .22);
        }

        .job-mini.active {
            border-color: rgba(31, 117, 216, .30);
            box-shadow: 0 18px 40px rgba(31, 117, 216, .14);
        }

        .job-mini-title {
            margin: 0;
            font-size: 13px;
            font-weight: 900;
            color: rgba(15, 23, 42, .92);
            line-height: 1.2;
        }

        .job-mini-meta {
            margin: 0;
            font-size: 12px;
            font-weight: 800;
            color: rgba(15, 23, 42, .70);
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center;
        }

        .job-mini-meta .mini-pill {
            border-radius: 999px;
            padding: 6px 9px;
            border: 1px solid rgba(15, 23, 42, .10);
            background: rgba(15, 23, 42, .03);
            font-weight: 900;
            font-size: 11px;
            color: rgba(15, 23, 42, .82);
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .job-mini-meta .mini-pill.blue {
            background: rgba(31, 117, 216, .10);
            border-color: rgba(31, 117, 216, .20);
        }

        .job-mini-meta .mini-pill.red {
            background: rgba(239, 68, 68, .10);
            border-color: rgba(239, 68, 68, .20);
        }

        .job-empty {
            padding: 14px 12px;
            border: 1px dashed rgba(15, 23, 42, .18);
            border-radius: var(--r-lg);
            background: rgba(15, 23, 42, .02);
            font-weight: 900;
            color: rgba(15, 23, 42, .70);
        }

        .cand-sections {
            margin-top: 14px;
            display: grid;
            gap: 14px;
        }

        .sec-card {
            background: rgba(255, 255, 255, .96);
            border: 1px solid rgba(15, 23, 42, .08);
            border-radius: var(--r-xl);
            box-shadow: 0 16px 44px rgba(15, 23, 42, .10);
            overflow: hidden;
        }

        .sec-head {
            padding: 14px 14px 10px;
            border-bottom: 1px solid rgba(15, 23, 42, .08);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .sec-head h3 {
            margin: 0;
            font-size: 14px;
            font-weight: 900;
            color: rgba(15, 23, 42, .92);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .sec-head h3 i {
            color: var(--pg-accent);
        }

        .sec-head p {
            margin: 0;
            font-size: 12px;
            font-weight: 800;
            color: rgba(15, 23, 42, .62);
        }

        .sec-body {
            padding: 12px 12px 14px;
            display: grid;
            gap: 10px;
        }

        .sec-row {
            display: grid;
            grid-auto-flow: column;
            grid-auto-columns: minmax(340px, 1fr);
            gap: 10px;
            overflow-x: auto;
            padding-bottom: 4px;
        }

        .sec-row::-webkit-scrollbar {
            height: 10px;
        }

        .sec-row::-webkit-scrollbar-thumb {
            background: rgba(15, 23, 42, .14);
            border-radius: 999px;
        }

        .empresaDemo-footer {
            margin-top: 18px;
            text-align: center;
            opacity: .9;
            padding: 12px 10px 28px;
        }

        /* =========================================================
       MODAL — Detalhes da vaga
    ========================================================= */
        .candModal {
            position: fixed;
            inset: 0;
            z-index: 99999;
            display: grid;
            place-items: center;
            padding: 18px;
            pointer-events: none;
        }

        .candModal__backdrop {
            position: absolute;
            inset: 0;
            background: rgba(2, 6, 23, .58);
            backdrop-filter: blur(6px);
            opacity: 0;
            transition: opacity .18s ease;
        }

        .candModal__dialog {
            position: relative;
            width: min(820px, 96vw);
            max-height: min(82vh, 740px);
            overflow: auto;
            border-radius: 22px;
            border: 1px solid rgba(255, 255, 255, .18);
            background:
                radial-gradient(520px 260px at 90% -20%, rgba(31, 117, 216, .18), transparent 60%),
                rgba(255, 255, 255, .96);
            box-shadow: 0 26px 90px rgba(15, 23, 42, .35);
            transform: translateY(10px) scale(.98);
            opacity: 0;
            transition: transform .18s ease, opacity .18s ease;
            outline: none;
        }

        .candModal.is-open {
            pointer-events: auto;
        }

        .candModal.is-open .candModal__backdrop {
            opacity: 1;
        }

        .candModal.is-open .candModal__dialog {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .candModal__head {
            display: flex;
            gap: 12px;
            justify-content: space-between;
            align-items: flex-start;
            padding: 16px 16px 12px;
            border-bottom: 1px solid rgba(15, 23, 42, .08);
        }

        .candModal__kicker {
            font-size: 12px;
            font-weight: 900;
            color: rgba(15, 23, 42, .65);
        }

        .candModal__title {
            margin: 6px 0 0;
            font-size: 20px;
            font-weight: 900;
            letter-spacing: .2px;
            line-height: 1.15;
            color: rgba(15, 23, 42, .92);
        }

        .candModal__meta {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .candModal__close {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            border: 1px solid rgba(15, 23, 42, .10);
            background: rgba(255, 255, 255, .92);
            cursor: pointer;
            display: grid;
            place-items: center;
            box-shadow: 0 10px 22px rgba(15, 23, 42, .10);
        }

        .candModal__close:hover {
            filter: brightness(1.02);
            transform: translateY(-1px);
        }

        .candModal__body {
            padding: 14px 16px 8px;
            display: grid;
            gap: 14px;
        }

        .candModal__section {
            border: 1px solid rgba(15, 23, 42, .08);
            background: rgba(255, 255, 255, .92);
            border-radius: 18px;
            padding: 12px 12px;
            box-shadow: 0 12px 30px rgba(15, 23, 42, .08);
        }

        .candModal__h3 {
            margin: 0 0 8px;
            font-size: 13px;
            font-weight: 900;
            color: rgba(15, 23, 42, .90);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .candModal__desc {
            margin: 0;
            font-size: 13px;
            font-weight: 700;
            color: rgba(15, 23, 42, .76);
            line-height: 1.55;
            white-space: pre-wrap;
        }

        .candModal__foot {
            padding: 12px 16px 16px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: flex-end;
            border-top: 1px solid rgba(15, 23, 42, .08);
        }

        .pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border-radius: 999px;
            padding: 7px 10px;
            font-size: 11.5px;
            font-weight: 900;
            border: 1px solid rgba(15, 23, 42, .10);
            background: rgba(15, 23, 42, .03);
            color: rgba(15, 23, 42, .86);
            white-space: nowrap;
        }

        .pill--danger {
            background: rgba(239, 68, 68, .10);
            border-color: rgba(239, 68, 68, .20);
            color: rgba(185, 28, 28, .95);
        }

        @media (max-width: 640px) {
            .candModal {
                padding: 10px;
            }

            .candModal__dialog {
                width: 100%;
                max-height: 88vh;
                border-radius: 18px;
            }
        }

        .candModal[hidden] {
            display: none !important;
        }
    </style>
</head>

<body data-guard="CANDIDATO">

    <!-- =========================
       HEADER
  ========================= -->
    <header class="jobhubH-shell" id="jobhubHeader">
        <div class="jobhubH-wrap">

            <a href="<?= URL_BASE ?>" class="jobhubH-logo" aria-label="Ir para a Home">
                <img src="<?= URL_BASE ?>assets/img/logo_preta.svg" alt="EmpresaDemo" class="jobhubH-logoImg">
            </a>

            <nav class="jobhubH-nav" aria-label="Navegação principal">
                <a id="ctaEmpresa" href="<?= URL_BASE ?>cadastrar/recrutador" class="jobhubH-cta jobhubH-cta--empresa" data-guard="logged-out">
                    Anunciar vagas grátis
                </a>

                <a id="ctaCv" href="<?= URL_BASE ?>cadastrar/candidato" class="jobhubH-cta jobhubH-cta--cv" data-guard="logged-out">
                    Cadastrar CV grátis
                </a>

                <!-- AUTH -->
                <div class="jobhubA-root" id="authRoot" data-default-mode="CANDIDATO" data-mode="CANDIDATO">
                    <button class="jobhubA-trigger" id="authBtn" type="button" aria-expanded="false" aria-controls="authPopover">
                        Entrar <span class="jobhubA-caret" aria-hidden="true">▾</span>
                    </button>

                    <div class="jobhubA-pop" id="authPopover" hidden role="dialog" aria-label="Entrar na conta">
                        <!-- VIEW: DESLOGADO -->
                        <div class="jobhubA-view" id="viewLoggedOut">
                            <div class="jobhubA-tabs" role="tablist" aria-label="Tipo de login">
                                <button type="button" class="jobhubA-tab jobhub-is-active" data-mode="CANDIDATO">Candidato</button>
                                <button type="button" class="jobhubA-tab" data-mode="RECRUTADOR">Recrutador</button>
                            </div>

                            <div class="jobhubA-alert" id="authAlert" aria-live="polite" hidden></div>

                            <form id="authLoginForm" autocomplete="on" novalidate>
                                <label class="jobhubA-field">
                                    <span class="jobhubA-label" id="emailLabel">E-mail</span>
                                    <input class="jobhubA-input" id="authEmail" type="email" required placeholder="seu@email.com" autocomplete="username">
                                    <div class="jobhubA-fieldErr" id="authEmailErr" aria-live="polite"></div>
                                </label>

                                <label class="jobhubA-field">
                                    <span class="jobhubA-label">Senha</span>
                                    <div class="jobhubA-pass">
                                        <input class="jobhubA-input" id="authSenha" type="password" required placeholder="••••••••" autocomplete="current-password">
                                        <button class="jobhubA-eye" id="authToggleSenha" type="button" aria-label="Mostrar senha">
                                            <i class="fa-regular fa-eye"></i>
                                        </button>
                                    </div>
                                    <div class="jobhubA-fieldErr" id="authSenhaErr" aria-live="polite"></div>
                                </label>

                                <button class="jobhubA-submit" id="authSubmit" type="submit">
                                    Entrar como Candidato
                                </button>

                                <div class="jobhubA-links">
                                    <a href="<?= URL_BASE ?>cadastrar/candidato">Cadastrar</a>
                                    <a href="<?= URL_BASE ?>reset">Esqueci a senha</a>
                                </div>
                            </form>
                        </div>

                        <!-- VIEW: LOGADO -->
                        <div class="jobhubA-view" id="viewLoggedIn" hidden>
                            <div class="jobhubU-mini">
                                <div class="jobhubU-avatar" aria-hidden="true"></div>

                                <div class="jobhubU-meta">
                                    <div class="jobhubU-top">
                                        <strong id="userName">—</strong>
                                        <span class="jobhubU-role" id="userRoleTag">—</span>
                                    </div>
                                    <div class="jobhubU-email" id="userEmail">—</div>
                                </div>
                            </div>

                            <div class="jobhubU-actions">
                                <a class="jobhubU-item" id="goArea" href="#">Ir para minha área</a>
                                <a class="jobhubU-item" id="goPerfil" href="<?= URL_BASE ?>candidato/perfil">Ver perfil</a>
                                <button class="jobhubU-item jobhub-is-danger" id="logoutBtn" type="button">Sair</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SUBMENU -->
                <div class="jobhubM-root">
                    <button class="jobhubM-btn" id="submenuDesktopBtn" type="button" aria-expanded="false" aria-controls="submenuDesktop">
                        <span class="jobhubM-ico" aria-hidden="true"></span> Menu
                    </button>

                    <div class="jobhubM-drop" id="submenuDesktop" hidden>
                        <a href="<?= URL_BASE ?>cadastrar" data-guard="logged-out">Enviar Currículo</a>
                        <a href="<?= URL_BASE ?>empresa" data-guard="logged-out">Para empresas</a>
                    </div>
                </div>
            </nav>

            <button class="jobhubH-burger" id="openMobileMenu" type="button" aria-label="Abrir menu">☰</button>
        </div>
    </header>

    <div class="jobhubMM-overlay" id="mobileOverlay" hidden></div>

    <aside class="jobhubMM-panel" id="mobileMenu" aria-hidden="true">
        <button class="jobhubMM-close" id="closeMobileMenu" type="button" aria-label="Fechar menu">×</button>

        <a class="jobhubMM-link" href="<?= URL_BASE ?>empresa" data-guard="logged-out">Para empresas</a>
        <a class="jobhubMM-link" href="<?= URL_BASE ?>cadastrar" data-guard="logged-out">Enviar Currículo</a>
        <button class="jobhubMM-btn jobhubMM-btn--outline" id="mobileAuthTrigger" type="button">Entrar</button>
        <a class="jobhubMM-btn jobhubMM-btn--primary" id="mobileGoArea" href="#" hidden>Ir para minha área</a>
        <button class="jobhubMM-btn jobhubMM-btn--outline" id="mobileLogoutBtn" type="button" hidden>Sair</button>
    </aside>

    <!-- =========================
       CONFIG (1 vez só)
  ========================= -->
    <script>
        window.JobHub_API_BASE = window.JobHub_API_BASE || <?= api_base_json() ?>;
        window.JobHub_ROUTES = {
            HOME: "<?= URL_BASE ?>",
            PERFIL_CANDIDATO: "<?= URL_BASE ?>candidato/perfil",
            PERFIL_EMPRESA: "<?= URL_BASE ?>recrutador/perfil",
            CANDIDATO_AREA: "<?= URL_BASE ?>candidato",
            EMPRESA_AREA: "<?= URL_BASE ?>recrutador",
            LOGIN: "<?= URL_BASE ?>inicio",
            VAGA_DETALHE: "<?= URL_BASE ?>vaga/{id}"
        };
    </script>

    <!-- =========================
       CONTEÚDO
  ========================= -->
    <main class="cand-wrap">

        <section class="cand-hero" aria-label="Boas-vindas">
            <div class="cand-hero-inner">
                <div class="cand-hello">
                    <h1 id="helloTitle">Olá! </h1>
                    <p id="helloSub">
                        Aqui aparecem as vagas mais alinhadas ao seu perfil. Use os filtros e clique em uma vaga para ver detalhes.
                    </p>
                </div>

                <div class="cand-hero-actions">
                    <a class="cand-btn ghost" href="<?= URL_BASE ?>candidato/perfil">
                        <i class="fa-regular fa-id-badge"></i> Ver perfil
                    </a>
                    <button class="cand-btn primary" id="btnPular" type="button">
                        <i class="fa-solid fa-shuffle"></i> Próxima vaga
                    </button>
                </div>
            </div>
        </section>

        <section class="cand-bar" aria-label="Filtros e busca">
            <div class="cand-chips" id="chipsFiltro">
                <button class="cand-chip active" type="button" data-filtro="recomendadas">
                    <i class="fa-solid fa-wand-magic-sparkles"></i> Recomendadas
                </button>
                <button class="cand-chip" type="button" data-filtro="salario-alto">
                    <i class="fa-solid fa-sack-dollar"></i> Salário alto
                </button>
                <button class="cand-chip" type="button" data-filtro="urgente">
                    <i class="fa-solid fa-bolt"></i> Urgentes
                </button>
                <button class="cand-chip" type="button" data-filtro="clt">
                    <i class="fa-regular fa-clipboard"></i> CLT
                </button>
            </div>

            <div class="cand-search" title="Filtra dentro das vagas que já carregaram">
                <i class="fa-solid fa-magnifying-glass" style="opacity:.7;"></i>
                <input id="feedSearch" type="text" placeholder="Buscar por cargo ou cidade..." autocomplete="off" />
            </div>
        </section>

        <section class="cand-grid">

            <section class="job-feature" aria-label="Vaga em destaque">
                <header class="job-head">
                    <h2><i class="fa-solid fa-briefcase"></i> Vaga em destaque</h2>
                    <span class="job-kpi" id="kpiCount">Carregando…</span>
                </header>

                <div class="job-body">
                    <h3 class="job-title" id="vagaTitulo">Carregando…</h3>
                    <p class="job-subtitle" id="vagaSubtitulo"></p>



                    <div class="job-chips" id="vagaChips"></div>

                    <div class="job-desc" id="vagaDescricao">Buscando vagas da plataforma…</div>

                    <div class="job-actions">
                        <div class="job-actions-left">
                            <button class="job-btn ghost" id="btnVerDetalhes" type="button" disabled>
                                <i class="fa-regular fa-eye"></i> Ver detalhes
                            </button>

                            <!-- agora ESSE botão FAZ a candidatura (não redireciona) -->
                            <button class="job-btn primary" id="btnCandidatar" type="button" data-vaga-id="" disabled>
                                <i class="fa-solid fa-paper-plane"></i> Me candidatar
                            </button>
                        </div>

                        <div style="font-size:12px;font-weight:900;color:rgba(15,23,42,.62);" id="vagaPublicacao">—</div>
                    </div>
                </div>
            </section>

            <aside class="job-list" aria-label="Mais vagas para você">
                <div class="job-list-head">
                    <h3><i class="fa-solid fa-list"></i> Mais vagas</h3>
                    <span class="job-kpi" id="kpiFiltro">Filtro: Recomendadas</span>
                </div>

                <div class="job-list-body" id="listaVagas">
                    <div class="job-empty">Carregando lista…</div>
                </div>
            </aside>
        </section>

        <section class="cand-sections" id="sectionsRoot">

            <section class="sec-card" id="secSalarios" style="display: none;" hidden>
                <div class="sec-head">
                    <div>
                        <h3><i class="fa-solid fa-sack-dollar"></i> Melhores salários</h3>
                        <p>Vagas com maior faixa salarial (quando informado).</p>
                    </div>
                    <span class="job-kpi" id="secSalariosCount">—</span>
                </div>
                <div class="sec-body">
                    <div class="sec-row" id="secSalariosRow"></div>
                    <div class="job-empty" id="secSalariosEmpty" style="display:none;">Sem vagas com salário informado por enquanto.</div>
                </div>
            </section>

            <section class="sec-card" id="secUrgentes" hidden>
                <div class="sec-head">
                    <div>
                        <h3><i class="fa-solid fa-bolt"></i> Contratação urgente</h3>
                        <p>Vagas marcadas como urgentes pela empresa.</p>
                    </div>
                    <span class="job-kpi" id="secUrgentesCount">—</span>
                </div>
                <div class="sec-body">
                    <div class="sec-row" id="secUrgentesRow"></div>
                    <div class="job-empty" id="secUrgentesEmpty" style="display:none;">Nenhuma vaga urgente agora.</div>
                </div>
            </section>

            <section class="sec-card" id="secClt" hidden>
                <div class="sec-head">
                    <div>
                        <h3><i class="fa-regular fa-clipboard"></i> Vagas CLT</h3>
                        <p>Separadas por tipo de contrato, quando informado.</p>
                    </div>
                    <span class="job-kpi" id="secCltCount">—</span>
                </div>
                <div class="sec-body">
                    <div class="sec-row" id="secCltRow"></div>
                    <div class="job-empty" id="secCltEmpty" style="display:none;">Nenhuma vaga CLT agora.</div>
                </div>
            </section>

        </section>
    </main>

    <!-- =========================
       MODAL DETALHES
  ========================= -->
    <div class="candModal" id="vagaModal" hidden>
        <div class="candModal__backdrop" data-close-modal></div>

        <div class="candModal__dialog" role="dialog" aria-modal="true" aria-labelledby="vagaModalTitle" tabindex="-1">
            <header class="candModal__head">
                <div class="candModal__headLeft">
                    <div class="candModal__kicker" id="vagaModalKicker">Detalhes da vaga</div>
                    <h2 class="candModal__title" id="vagaModalTitle">—</h2>

                    <div class="candModal__meta">
                        <span class="pill" id="mLocal">—</span>
                        <span class="pill" id="mContrato">—</span>
                        <span class="pill" id="mSalario">—</span>
                        <span class="pill pill--danger" id="mUrgente" style="display:none;">
                            <i class="fa-solid fa-bolt"></i> Urgente
                        </span>
                    </div>
                </div>

                <button class="candModal__close" type="button" id="vagaModalClose" aria-label="Fechar modal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </header>

            <div class="candModal__body">
                <div class="candModal__section">
                    <h3 class="candModal__h3"><i class="fa-regular fa-file-lines"></i> Descrição</h3>
                    <p class="candModal__desc" id="mDescricao">—</p>
                </div>

                <div class="candModal__section">
                    <h3 class="candModal__h3"><i class="fa-solid fa-location-dot"></i> Localização</h3>
                    <p class="candModal__desc" id="mEndereco">—</p>
                </div>

                <div class="candModal__section">
                    <h3 class="candModal__h3"><i class="fa-solid fa-graduation-cap"></i> Formação</h3>
                    <p class="candModal__desc" id="mFormacao">—</p>
                </div>

                <div class="candModal__section">
                    <h3 class="candModal__h3"><i class="fa-solid fa-list-check"></i> Requisitos</h3>
                    <p class="candModal__desc" id="mRequisitos">—</p>
                </div>

                <div class="candModal__section">
                    <h3 class="candModal__h3"><i class="fa-solid fa-language"></i> Idiomas</h3>
                    <p class="candModal__desc" id="mIdiomas">—</p>
                </div>

                <div class="candModal__section">
                    <h3 class="candModal__h3"><i class="fa-solid fa-id-card"></i> CNH</h3>
                    <p class="candModal__desc" id="mCnh">—</p>
                </div>

                <div class="candModal__section">
                    <h3 class="candModal__h3"><i class="fa-regular fa-clock"></i> Publicação</h3>
                    <p class="candModal__desc" id="mPublicacao">—</p>
                </div>
            </div>

            <footer class="candModal__foot">
                <!-- Esse link abre a PÁGINA da vaga (se você quiser) -->
                <a class="job-btn ghost" id="mAbrirPagina" href="#" target="_self" rel="noopener">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i> Abrir vaga
                </a>

                <!-- agora ESSE botão FAZ a candidatura (não redireciona) -->
                <button class="job-btn primary" id="mCandidatar" type="button">
                    <i class="fa-solid fa-paper-plane"></i> Me candidatar
                </button>
            </footer>
        </div>
    </div>
    <div class="candModal" id="applyModal" hidden>
        <div class="candModal__backdrop" data-close-apply></div>

        <div class="candModal__dialog" role="dialog" aria-modal="true" aria-labelledby="applyTitle" tabindex="-1">
            <header class="candModal__head">
                <div class="candModal__headLeft">
                    <div class="candModal__kicker">Candidatura</div>
                    <h2 class="candModal__title" id="applyTitle">Confirmar candidatura</h2>
                </div>

                <button class="candModal__close" type="button" id="applyClose" aria-label="Fechar modal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </header>

            <div class="candModal__body">
                <div class="candModal__section">
                    <h3 class="candModal__h3"><i class="fa-solid fa-briefcase"></i> Vaga</h3>
                    <p class="candModal__desc" id="applyVagaResumo">—</p>
                </div>

                <div class="candModal__section">
                    <h3 class="candModal__h3"><i class="fa-regular fa-envelope"></i> E-mail</h3>
                    <input class="jobhubA-input" id="applyEmail" type="email" placeholder="seuemail@dominio.com" />
                </div>

                <div class="candModal__section">
                    <h3 class="candModal__h3"><i class="fa-solid fa-key"></i> Token</h3>
                    <input class="jobhubA-input" id="applyToken" type="text" placeholder="Digite o token recebido" />
                    <p class="candModal__desc" id="applyStatus">Informe seu e-mail e envie o token.</p>
                </div>
            </div>

            <footer class="candModal__foot">
                <button class="job-btn ghost" id="btnSendToken" type="button">
                    <i class="fa-solid fa-envelope-circle-check"></i> Enviar token
                </button>

                <button class="job-btn ghost" id="btnValidateToken" type="button">
                    <i class="fa-solid fa-shield-halved"></i> Validar token
                </button>

                <button class="job-btn primary" id="btnConfirmApply" type="button">
                    <i class="fa-solid fa-check"></i> Confirmar candidatura
                </button>
            </footer>
        </div>
    </div>
    <footer class="empresaDemo-footer">
        <p class="empresaDemo-footer-rights">© 2025 EmpresaDemo – Todos os direitos reservados.</p>
    </footer>

    <!-- =========================
       1) HEADER AUTH + MOBILE + SUBMENU + GUARD
       (mantido robusto)
  ========================= -->
    <script>
        (() => {
            "use strict";

            const API_BASE = window.JobHub_API_BASE || "";
            const ROUTES = window.JobHub_ROUTES || {
                HOME: "/",
                PERFIL_CANDIDATO: "/candidato/perfil",
                PERFIL_EMPRESA: "/recrutador/perfil",
                CANDIDATO_AREA: "/candidato",
                EMPRESA_AREA: "/recrutador",
                LOGIN: "<?= URL_BASE ?>inicio",
                VAGA_DETALHE: "/vaga/{id}"
            };

            const SESSION_KEY = "empresaDemo.session.v1";
            const $ = (s) => document.querySelector(s);

            const authRoot = $("#authRoot");
            if (!authRoot) return;

            const authBtn = $("#authBtn");
            const authPopover = $("#authPopover");
            const viewLoggedOut = $("#viewLoggedOut");
            const viewLoggedIn = $("#viewLoggedIn");

            const authForm = $("#authLoginForm");
            const authEmail = $("#authEmail");
            const authSenha = $("#authSenha");
            const authSubmit = $("#authSubmit");

            const authAlert = $("#authAlert");
            const authEmailErr = $("#authEmailErr");
            const authSenhaErr = $("#authSenhaErr");
            const toggleSenhaBtn = $("#authToggleSenha");
            const emailLabel = $("#emailLabel");

            const userName = $("#userName");
            const userEmail = $("#userEmail");
            const userRoleTag = $("#userRoleTag");
            const goArea = $("#goArea");
            const goPerfil = $("#goPerfil");
            const logoutBtn = $("#logoutBtn");

            const tabButtons = authRoot.querySelectorAll(".jobhubA-tab");
            let currentMode = (authRoot.getAttribute("data-default-mode") || "CANDIDATO").toUpperCase();

            const openMobileBtn = $("#openMobileMenu");
            const closeMobileBtn = $("#closeMobileMenu");
            const mobileMenu = $("#mobileMenu");
            const mobileOverlay = $("#mobileOverlay");
            const mobileAuthTrigger = $("#mobileAuthTrigger");
            const mobileGoArea = $("#mobileGoArea");
            const mobileLogoutBtn = $("#mobileLogoutBtn");

            const header = $("#jobhubHeader");
            let lastScrollY = window.scrollY || 0;

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            function safeJson(v) {
                try {
                    return v ? JSON.parse(v) : null;
                } catch {
                    return null;
                }
            }

            function decodeJwtPayload(token) {
                try {
                    const part = token.split(".")[1];
                    if (!part) return null;
                    const base64 = part.replace(/-/g, "+").replace(/_/g, "/");
                    const json = decodeURIComponent(atob(base64).split("").map(c => "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2)).join(""));
                    return JSON.parse(json);
                } catch {
                    return null;
                }
            }

            function isTokenExpired(token) {
                const p = decodeJwtPayload(token);
                const exp = p?.exp;
                if (!exp) return false;
                return Date.now() >= exp * 1000;
            }

            function normalizeRole(roleFromApi, mode) {
                const r = String(roleFromApi || "").toUpperCase().trim();
                const m = String(mode || "").toUpperCase().trim();
                if (["RECRUTADOR", "EMPRESA", "COMPANY", "RECRUITER"].includes(r)) return "RECRUTADOR";
                if (["CANDIDATO", "CANDIDATE"].includes(r)) return "CANDIDATO";
                return m === "RECRUTADOR" ? "RECRUTADOR" : "CANDIDATO";
            }

            function clearAuthStorage() {
                ["token", "role", "candidato_me", "empresa_me", "recrutador_me", "me", "user", "candidato_id", "accessToken", "access_token", "jwt", "AUTH_TOKEN"].forEach((k) => localStorage.removeItem(k));
                sessionStorage.removeItem(SESSION_KEY);
                sessionStorage.removeItem("just_logged_in");
                sessionStorage.removeItem("flash_login_ok");
            }

            function bridgeSessionStorage(roleUpper, token, user = null) {
                const roleKey = roleUpper === "RECRUTADOR" ? "empresa" : "candidato";
                sessionStorage.setItem(SESSION_KEY, JSON.stringify({
                    role: roleKey,
                    token,
                    user,
                    createdAt: Date.now()
                }));
            }

            function endpointByMode(modeUpper) {
                return modeUpper === "RECRUTADOR" ? `${API_BASE}/auth/login/empresa` : `${API_BASE}/auth/login`;
            }

            async function fetchMeAndCache(roleUpper, token) {
                const paths = roleUpper === "CANDIDATO" ? ["/candidato/me", "/candidatos/me", "/me"] : ["/empresa/me", "/recrutador/me", "/empresa/recrutador/me", "/me"];

                for (const p of paths) {
                    try {
                        const resp = await fetch(`${API_BASE}${p}`, {
                            method: "GET",
                            headers: {
                                Authorization: `Bearer ${token}`
                            }
                        });
                        if (resp.status === 404) continue;
                        if (!resp.ok) return null;
                        const me = await resp.json();
                        localStorage.setItem(roleUpper === "CANDIDATO" ? "candidato_me" : "empresa_me", JSON.stringify(me));
                        return me;
                    } catch {}
                }
                return null;
            }

            function makeRecrutadorFallbackFromJwt(token) {
                const p = decodeJwtPayload(token) || {};
                const email = p.sub || "";
                const left = email.includes("@") ? email.split("@")[0] : email;
                return {
                    idUsuario: p.idUsuario ?? null,
                    email,
                    nomeExibicao: left ? left.replaceAll(".", " ").replace(/\b\w/g, m => m.toUpperCase()) : "Recrutador",
                    role: "RECRUTADOR",
                    _from: "jwt"
                };
            }

            function displayNameFromMe(roleUpper, me, token) {
                if (roleUpper === "CANDIDATO") return me?.nomeCompleto || me?.nome || me?.email || "Candidato";
                return me?.nomeExibicao || me?.nome || me?.razaoSocial || me?.email || makeRecrutadorFallbackFromJwt(token).nomeExibicao || "Recrutador";
            }

            function emailFromMe(me, token) {
                return me?.email || decodeJwtPayload(token)?.sub || "";
            }

            function areaHref(roleUpper) {
                return roleUpper === "RECRUTADOR" ? ROUTES.EMPRESA_AREA : ROUTES.CANDIDATO_AREA;
            }

            function perfilHref(roleUpper) {
                return roleUpper === "RECRUTADOR" ? ROUTES.PERFIL_EMPRESA : ROUTES.PERFIL_CANDIDATO;
            }

            function getStoredSession() {
                const token = localStorage.getItem("token") || "";
                const roleUpper = normalizeRole(localStorage.getItem("role"), "CANDIDATO");
                if (!token) return null;
                if (isTokenExpired(token)) {
                    clearAuthStorage();
                    return null;
                }
                const meKey = roleUpper === "RECRUTADOR" ? "empresa_me" : "candidato_me";
                const me = safeJson(localStorage.getItem(meKey));
                return {
                    token,
                    roleUpper,
                    me
                };
            }

            function setAlert(type, msg) {
                if (!authAlert) return;
                authAlert.classList.remove("jobhub-alert--error", "jobhub-alert--success");
                if (!msg) {
                    authAlert.hidden = true;
                    authAlert.textContent = "";
                    return;
                }
                authAlert.hidden = false;
                authAlert.classList.add(type === "success" ? "jobhub-alert--success" : "jobhub-alert--error");
                authAlert.textContent = msg;
            }

            function setFieldError(inputEl, errEl, msg) {
                if (!inputEl || !errEl) return;
                errEl.textContent = msg || "";
                inputEl.classList.toggle("jobhub-is-invalid", !!msg);
                if (!msg) inputEl.classList.remove("jobhub-is-valid");
            }

            function setFieldValid(inputEl) {
                if (!inputEl) return;
                inputEl.classList.remove("jobhub-is-invalid");
                inputEl.classList.add("jobhub-is-valid");
            }

            function clearAllFeedback() {
                setAlert("", "");
                setFieldError(authEmail, authEmailErr, "");
                setFieldError(authSenha, authSenhaErr, "");
                authEmail?.classList.remove("jobhub-is-valid");
                authSenha?.classList.remove("jobhub-is-valid");
            }

            function applyModeUI(modeUpper) {
                authRoot.dataset.mode = modeUpper;
                tabButtons.forEach(b => b.classList.toggle("jobhub-is-active", b.dataset.mode === modeUpper));

                const label = modeUpper === "RECRUTADOR" ? "Recrutador" : "Candidato";
                if (authSubmit) authSubmit.textContent = `Entrar como ${label}`;
                if (emailLabel) emailLabel.textContent = modeUpper === "RECRUTADOR" ? "E-mail (Recrutador)" : "E-mail (Candidato)";
                clearAllFeedback();
            }

            function setMode(modeUpper) {
                currentMode = modeUpper;
                applyModeUI(currentMode);
            }

            if (tabButtons.length) tabButtons.forEach(btn => btn.addEventListener("click", () => setMode(btn.dataset.mode)));
            setMode(currentMode);

            function openPopover() {
                if (!authPopover) return;
                authPopover.hidden = false;
                authBtn?.setAttribute("aria-expanded", "true");
                if (!viewLoggedOut?.hidden) authEmail?.focus();
            }

            function closePopover() {
                if (!authPopover) return;
                authPopover.hidden = true;
                authBtn?.setAttribute("aria-expanded", "false");

                if (authSenha && authSenha.type !== "password") authSenha.type = "password";
                if (toggleSenhaBtn) {
                    toggleSenhaBtn.setAttribute("aria-label", "Mostrar senha");
                    const icon = toggleSenhaBtn.querySelector("i");
                    if (icon) {
                        icon.classList.add("fa-eye");
                        icon.classList.remove("fa-eye-slash");
                    }
                }
            }

            authBtn?.addEventListener("click", () => {
                if (!authPopover) return;
                authPopover.hidden ? openPopover() : closePopover();
            });

            document.addEventListener("click", (e) => {
                if (!authRoot.contains(e.target)) closePopover();
            });
            document.addEventListener("keydown", (e) => {
                if (e.key === "Escape") closePopover();
            });

            toggleSenhaBtn?.addEventListener("click", () => {
                if (!authSenha) return;
                const isPass = authSenha.type === "password";
                authSenha.type = isPass ? "text" : "password";
                toggleSenhaBtn.setAttribute("aria-label", isPass ? "Ocultar senha" : "Mostrar senha");
                const icon = toggleSenhaBtn.querySelector("i");
                if (icon) {
                    icon.classList.toggle("fa-eye", !isPass);
                    icon.classList.toggle("fa-eye-slash", isPass);
                }
            });

            function setLoading(on) {
                if (!authSubmit) return;
                authSubmit.disabled = on;
                authSubmit.textContent = on ? "Entrando..." : (currentMode === "RECRUTADOR" ? "Entrar como Recrutador" : "Entrar como Candidato");
            }

            function renderLoggedOut() {
                authBtn.innerHTML = `Entrar <span class="jobhubA-caret" aria-hidden="true">▾</span>`;
                viewLoggedOut.hidden = false;
                viewLoggedIn.hidden = true;

                if (mobileAuthTrigger) mobileAuthTrigger.hidden = false;
                if (mobileGoArea) mobileGoArea.hidden = true;
                if (mobileLogoutBtn) mobileLogoutBtn.hidden = true;

                clearAllFeedback();
                applyModeUI(currentMode);
            }

            function renderLoggedIn(roleUpper, token, me) {
                const name = displayNameFromMe(roleUpper, me, token);
                const email = emailFromMe(me, token);

                authBtn.innerHTML = `Olá, <strong>${name}</strong> <span class="jobhubA-caret" aria-hidden="true">▾</span>`;
                viewLoggedOut.hidden = true;
                viewLoggedIn.hidden = false;

                if (userName) userName.textContent = name;
                if (userEmail) userEmail.textContent = email || "—";
                if (userRoleTag) userRoleTag.textContent = roleUpper === "RECRUTADOR" ? "RECRUTADOR" : "CANDIDATO";

                if (goArea) {
                    goArea.href = areaHref(roleUpper);
                    goArea.textContent = roleUpper === "RECRUTADOR" ? "Ir para o painel" : "Ir para minha área";
                }
                if (goPerfil) {
                    goPerfil.href = perfilHref(roleUpper);
                    goPerfil.textContent = "Ver perfil";
                }

                if (mobileAuthTrigger) mobileAuthTrigger.hidden = true;
                if (mobileGoArea) {
                    mobileGoArea.hidden = false;
                    mobileGoArea.href = areaHref(roleUpper);
                    mobileGoArea.textContent = roleUpper === "RECRUTADOR" ? "Ir para o painel" : "Ir para minha área";
                }
                if (mobileLogoutBtn) mobileLogoutBtn.hidden = false;
            }

            function validateForm() {
                clearAllFeedback();
                const email = (authEmail?.value || "").trim();
                const senha = (authSenha?.value || "");
                let ok = true;

                if (!email) {
                    setFieldError(authEmail, authEmailErr, "Digite seu e-mail.");
                    ok = false;
                } else if (!emailRegex.test(email)) {
                    setFieldError(authEmail, authEmailErr, "E-mail inválido. Ex: nome@dominio.com");
                    ok = false;
                } else setFieldValid(authEmail);

                if (!senha) {
                    setFieldError(authSenha, authSenhaErr, "Digite sua senha.");
                    ok = false;
                } else setFieldValid(authSenha);

                if (!ok) setAlert("error", "Corrija os campos destacados para entrar.");
                return ok;
            }

            authForm?.addEventListener("submit", async (e) => {
                e.preventDefault();
                if (!validateForm()) return;

                const email = (authEmail?.value || "").trim();
                const senha = (authSenha?.value || "");
                const url = endpointByMode(currentMode);

                setLoading(true);
                clearAuthStorage();
                setAlert("", "");

                try {
                    const resp = await fetch(url, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            email,
                            senha
                        }),
                    });

                    const raw = await resp.text();
                    let data = null;
                    try {
                        data = raw ? JSON.parse(raw) : null;
                    } catch {}

                    if (!resp.ok) {
                        const msgApi = (data && (data.message || data.error)) || raw || `Erro ${resp.status}`;
                        authEmail?.classList.add("jobhub-is-invalid");
                        authSenha?.classList.add("jobhub-is-invalid");
                        setAlert("error", msgApi || "E-mail ou senha incorretos. Verifique e tente novamente.");
                        return;
                    }

                    const token = data?.token;
                    const roleUpper = normalizeRole(data?.role, currentMode);

                    if (!token) {
                        setAlert("error", "Login realizado, mas a resposta veio sem token.");
                        return;
                    }

                    localStorage.setItem("token", token);
                    localStorage.setItem("role", roleUpper);

                    let me = await fetchMeAndCache(roleUpper, token);
                    if (roleUpper === "RECRUTADOR" && !me) {
                        me = makeRecrutadorFallbackFromJwt(token);
                        localStorage.setItem("empresa_me", JSON.stringify(me));
                    }

                    bridgeSessionStorage(roleUpper, token, me);
                    setAlert("success", "Login realizado com sucesso!");
                    renderLoggedIn(roleUpper, token, me);
                    closePopover();
                } catch (err) {
                    console.error("[LOGIN ERROR]", err);
                    setAlert("error", "Falha de conexão. Verifique sua internet ou o servidor e tente novamente.");
                } finally {
                    setLoading(false);
                }
            });

            function doLogout() {
                clearAuthStorage();
                renderLoggedOut();
                closePopover();
                window.location.href = ROUTES.HOME;
            }
            logoutBtn?.addEventListener("click", doLogout);
            mobileLogoutBtn?.addEventListener("click", doLogout);

            (async function boot() {
                const sess = getStoredSession();
                if (!sess) return renderLoggedOut();

                let me = sess.me;
                if (!me) me = await fetchMeAndCache(sess.roleUpper, sess.token);
                if (sess.roleUpper === "RECRUTADOR" && !me) me = makeRecrutadorFallbackFromJwt(sess.token);

                bridgeSessionStorage(sess.roleUpper, sess.token, me);
                renderLoggedIn(sess.roleUpper, sess.token, me);
            })();

            function openMenu() {
                if (!mobileOverlay || !mobileMenu) return;
                mobileOverlay.hidden = false;
                mobileMenu.classList.add("jobhub-show");
                mobileOverlay.classList.add("jobhub-show");
                mobileMenu.setAttribute("aria-hidden", "false");
            }

            function closeMenu() {
                if (!mobileOverlay || !mobileMenu) return;
                mobileMenu.classList.remove("jobhub-show");
                mobileOverlay.classList.remove("jobhub-show");
                mobileMenu.setAttribute("aria-hidden", "true");
                setTimeout(() => (mobileOverlay.hidden = true), 220);
            }

            openMobileBtn?.addEventListener("click", openMenu);
            closeMobileBtn?.addEventListener("click", closeMenu);
            mobileOverlay?.addEventListener("click", closeMenu);

            document.addEventListener("keydown", (e) => {
                if (e.key === "Escape") closeMenu();
            });

            mobileAuthTrigger?.addEventListener("click", () => {
                closeMenu();
                const visible = authBtn && authBtn.offsetParent !== null;
                if (visible) setTimeout(openPopover, 50);
                else window.location.href = ROUTES.LOGIN || ROUTES.HOME;
            });

            const submenuBtn = $("#submenuDesktopBtn");
            const submenuBox = $("#submenuDesktop");

            function closeSubmenu() {
                if (!submenuBox) return;
                submenuBox.hidden = true;
                submenuBtn?.setAttribute("aria-expanded", "false");
            }

            submenuBtn?.addEventListener("click", (e) => {
                e.preventDefault();
                if (!submenuBox) return;
                const open = submenuBox.hidden === false;
                submenuBox.hidden = open;
                submenuBtn.setAttribute("aria-expanded", String(!open));
            });

            document.addEventListener("click", (e) => {
                if (submenuBox && submenuBtn && !submenuBox.hidden) {
                    const wrap = submenuBtn.closest(".jobhubM-root");
                    if (wrap && !wrap.contains(e.target)) closeSubmenu();
                }
            });

            // scroll hide/show do header
            window.addEventListener("scroll", () => {
                if (!header) return;
                const y = window.scrollY || 0;
                header.classList.toggle("is-scrolled", y > 8);

                const goingDown = y > lastScrollY;
                if (y > 140 && goingDown) header.classList.add("is-hidden");
                else header.classList.remove("is-hidden");

                lastScrollY = y;
            }, {
                passive: true
            });

            // guard (bloqueia links data-guard="logged-out")
            document.addEventListener("click", (e) => {
                const a = e.target.closest('a[data-guard="logged-out"]');
                if (!a) return;

                const token = localStorage.getItem("token") || "";
                if (!token || isTokenExpired(token)) return; // deslogado -> segue
                e.preventDefault();
                e.stopPropagation();

                const roleUpper = normalizeRole(localStorage.getItem("role"), "CANDIDATO");
                const label = roleUpper === "RECRUTADOR" ? "recrutador/empresa" : "candidato";
                alert(`Já existe um usuário (${label}) logado.\n\nSe quiser criar outra conta, faça logout primeiro.`);
                authBtn?.click();
            }, true);

        })();
    </script>

    <!-- =========================
       2) PAGE GUARD (role = CANDIDATO)
  ========================= -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            "use strict";
            const ROUTES = window.JobHub_ROUTES || {
                LOGIN: "<?= URL_BASE ?>inicio"
            };

            const needed = (document.body?.dataset?.guard || "").toUpperCase();
            const token = localStorage.getItem("token") || "";
            const role = (localStorage.getItem("role") || "").toUpperCase();

            function decodeJwtPayload(t) {
                try {
                    const part = t.split(".")[1];
                    if (!part) return null;
                    const base64 = part.replace(/-/g, "+").replace(/_/g, "/");
                    const json = decodeURIComponent(atob(base64).split("").map(c => "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2)).join(""));
                    return JSON.parse(json);
                } catch {
                    return null;
                }
            }

            function isTokenExpired(t) {
                const p = decodeJwtPayload(t);
                const exp = p?.exp;
                if (!exp) return false;
                return Date.now() >= exp * 1000;
            }

            function normalizeRole(r) {
                const up = String(r || "").toUpperCase().trim();
                if (["RECRUTADOR", "EMPRESA"].includes(up)) return "RECRUTADOR";
                if (["CANDIDATO"].includes(up)) return "CANDIDATO";
                return "";
            }

            const roleUpper = normalizeRole(role);

            if (!token || !roleUpper || isTokenExpired(token)) {
                window.location.replace(ROUTES.LOGIN);
                return;
            }

            if (needed && roleUpper !== needed) {
                const mode = roleUpper === "RECRUTADOR" ? "empresa" : "candidato";
                window.location.replace(`${ROUTES.LOGIN}?mode=${mode}`);
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            "use strict";

            const API_BASE = window.JobHub_API_BASE || "";
            const ROUTES = window.JobHub_ROUTES || {};
            const $ = (s) => document.querySelector(s);

            // Hero
            const helloTitle = $("#helloTitle");
            const helloSub = $("#helloSub");

            // Feature
            const kpiCount = $("#kpiCount");
            const kpiFiltro = $("#kpiFiltro");

            const elTitulo = $("#vagaTitulo");
            const elDescricao = $("#vagaDescricao");
            const elPublicacao = $("#vagaPublicacao");
            const elChips = $("#vagaChips");

            const btnPular = $("#btnPular");
            const btnCandidatar = $("#btnCandidatar");
            const btnVerDetalhes = $("#btnVerDetalhes");

            const chipsFiltro = $("#chipsFiltro");
            const feedSearch = $("#feedSearch");
            const listaVagas = $("#listaVagas");

            // Sections
            const secSalarios = $("#secSalarios");
            const secSalariosRow = $("#secSalariosRow");
            const secSalariosEmpty = $("#secSalariosEmpty");
            const secSalariosCount = $("#secSalariosCount");

            const secUrgentes = $("#secUrgentes");
            const secUrgentesRow = $("#secUrgentesRow");
            const secUrgentesEmpty = $("#secUrgentesEmpty");
            const secUrgentesCount = $("#secUrgentesCount");

            const secClt = $("#secClt");
            const secCltRow = $("#secCltRow");
            const secCltEmpty = $("#secCltEmpty");
            const secCltCount = $("#secCltCount");

            // Modal existente desta página
            const vagaModal = $("#vagaModal");
            const vagaModalClose = $("#vagaModalClose");
            const mTitle = $("#vagaModalTitle");
            const mKicker = $("#vagaModalKicker");
            const mLocal = $("#mLocal");
            const mContrato = $("#mContrato");
            const mSalario = $("#mSalario");
            const mUrgente = $("#mUrgente");
            const mDescricao = $("#mDescricao");
            const mEndereco = $("#mEndereco");
            const mFormacao = $("#mFormacao");
            const mRequisitos = $("#mRequisitos");
            const mIdiomas = $("#mIdiomas");
            const mCnh = $("#mCnh");
            const mPublicacao = $("#mPublicacao");
            const mAbrirPagina = $("#mAbrirPagina");
            const mCandidatar = $("#mCandidatar");

            // session / user
            const candidatoMe = (() => {
                try {
                    return JSON.parse(localStorage.getItem("candidato_me") || "null");
                } catch {
                    return null;
                }
            })();

            const name = candidatoMe?.nomeCompleto || candidatoMe?.nome || candidatoMe?.email || "candidato";
            if (helloTitle) helloTitle.textContent = `Olá, ${name}!`;
            if (helloSub) helloSub.textContent = `Abaixo estão as vagas recomendadas para você. Use filtros e clique em uma vaga para ver mais.`;

            // state
            let vagasAll = [];
            let vagasView = [];
            let pos = 0;
            let filtroAtual = "recomendadas";
            let searchQuery = "";
            let vagaAtual = null;

            const brl = new Intl.NumberFormat("pt-BR", {
                style: "currency",
                currency: "BRL"
            });

            const MAP_ESCOLARIDADE = {
                FUNDAMENTAL_INCOMPLETO: "Fundamental incompleto",
                FUNDAMENTAL_COMPLETO: "Fundamental completo",
                MEDIO_INCOMPLETO: "Médio incompleto",
                MEDIO_COMPLETO: "Médio completo",
                TECNICO: "Técnico",
                SUPERIOR_INCOMPLETO: "Superior incompleto",
                SUPERIOR_COMPLETO: "Superior completo",
                POS_GRADUACAO: "Pós-graduação",
                MESTRADO: "Mestrado",
                DOUTORADO: "Doutorado"
            };

            function pretty(map, value, fallback = "") {
                const k = String(value || "").trim();
                return k ? (map[k] || k.replaceAll("_", " ").toLowerCase()) : fallback;
            }

            function formatDateISOToBR(iso) {
                if (!iso) return "—";
                const d = new Date(iso);
                if (Number.isNaN(d.getTime())) return String(iso);
                const dd = String(d.getDate()).padStart(2, "0");
                const mm = String(d.getMonth() + 1).padStart(2, "0");
                const yyyy = String(d.getFullYear());
                return `${dd}/${mm}/${yyyy}`;
            }

            function getVagaId(v) {
                return v?.id ?? v?.idVaga ?? v?.vagaId ?? null;
            }

            function safeText(v, fallback = "—") {
                const s = String(v ?? "").trim();
                return s ? s : fallback;
            }

            function normalizeVagaApi(v) {
                const salario = Number(v?.salarioValor ?? v?.salario ?? v?.salarioMin ?? v?.salarioMax);
                const salarioMin = Number.isFinite(Number(v?.salarioMin)) ? Number(v.salarioMin) : (Number.isFinite(salario) ? salario : null);
                const salarioMax = Number.isFinite(Number(v?.salarioMax)) ? Number(v.salarioMax) : (Number.isFinite(salario) ? salario : null);

                const complemento =
                    v?.complementoCargo &&
                    !["casa", "geral", "interno"].includes(String(v.complementoCargo).toLowerCase().trim()) ?
                    v.complementoCargo :
                    (v?.complemento ? v.complemento : null);

                const titulo = v?.titulo || [v?.cargo, complemento].filter(Boolean).join(" • ") || "—";

                const loc = v?.localizacao || v?.localizacaoDTO || null;
                const cidade = (v?.cidade || loc?.cidade || "") || "";
                const estado = (v?.estado || loc?.estado || "") || "";

                const publicadaEm = v?.publicadaEm || v?.dataPublicacao || v?.criadaEm || v?.createdAt || null;

                return {
                    ...v,
                    id: (v?.id ?? v?.idVaga ?? v?.vagaId ?? null),
                    titulo,
                    empresaConfidencial: !!(v?.empresaConfidencial || v?.empresaDTO?.empresaConfidencial),
                    empresa: v?.empresaDTO?.empresaNome || v?.empresaNome || v?.razaoSocial || v?.empresa || "",
                    cidade,
                    estado,
                    tipoContrato: v?.tipoContrato || v?.tipoContratoDTO || v?.contrato || "",
                    modalidade: v?.modalidadeVagaDTO || v?.modalidade || "",
                    categoria: v?.categoriaVagaDTO || v?.categoria || "",
                    descricao: v?.descricao || v?.resumo || "",
                    jornada: v?.jornada || "",
                    responsabilidades: Array.isArray(v?.responsabilidades) ? v.responsabilidades : [],
                    requisitosObrigatorios: Array.isArray(v?.requisitosObrigatorios) ? v.requisitosObrigatorios : [],
                    requisitosDesejaveis: Array.isArray(v?.requisitosDesejaveis) ? v.requisitosDesejaveis : [],
                    beneficios: Array.isArray(v?.beneficios) ? v.beneficios : [],
                    observacoes: v?.observacoes || "",
                    totalInteressados: Number(v?.totalInteressados ?? v?.totalCandidatos ?? 0) || 0,
                    publicadaEm,
                    contratacaoUrgente: !!(v?.contratacaoUrgente || v?.contratacaoUrgenteDTO),
                    localizacao: loc,
                    formacao: Array.isArray(v?.formacao) ? v.formacao : (v?.formacao ? [v.formacao] : []),
                    requisitos: Array.isArray(v?.requisitos) ? v.requisitos : (v?.requisitos ? [v.requisitos] : []),
                    idiomas: Array.isArray(v?.idiomas) ? v.idiomas : (Array.isArray(v?.idiomasDTO) ? v.idiomasDTO : []),
                    cnhs: Array.isArray(v?.cnhs) ? v.cnhs : (Array.isArray(v?.cnhsDTO) ? v.cnhsDTO : []),
                };
            }

            function cityUf(vaga) {
                const c = String(vaga?.localizacao?.cidade || vaga?.cidade || "").trim();
                const uf = String(vaga?.localizacao?.estado || vaga?.estado || "").trim();
                if (c && uf) return `${c}/${uf}`;
                return c || uf || "—";
            }

            function cardLocation(vaga) {
                const cu = cityUf(vaga);
                if (vaga?.empresaConfidencial) return cu !== "—" ? cu : "Local confidencial";
                const bairro = String(vaga?.localizacao?.bairro || "").trim();
                return [bairro, cu].filter(Boolean).join(" • ") || cu || "—";
            }

            function getSalarioTexto(vaga) {
                const salarioRaw = vaga?.salarioValor ?? vaga?.salario ?? vaga?.remuneracao ?? vaga?.valorSalario ?? null;
                const valor = Number(salarioRaw);
                const min = Number(vaga?.salarioMin ?? vaga?.faixaSalarialMin ?? vaga?.valorMin ?? null);
                const max = Number(vaga?.salarioMax ?? vaga?.faixaSalarialMax ?? vaga?.valorMax ?? null);
                const salarioTipo = String(vaga?.salarioTipoDTO || vaga?.salarioTipo || "").trim().toUpperCase();

                const hasMin = Number.isFinite(min) && min > 0;
                const hasMax = Number.isFinite(max) && max > 0;
                const hasVal = Number.isFinite(valor) && valor > 0;

                if (hasMin && hasMax && min !== max) return `De ${brl.format(min)} a ${brl.format(max)}`;
                if (hasMax) return `Até ${brl.format(max)}`;
                if (hasMin) return brl.format(min);
                if (hasVal) return brl.format(valor);
                if (salarioTipo.includes("COMBIN")) return "Salário a combinar";
                return "Salário a combinar";
            }

            function getMaxSalario(vaga) {
                const max = Number(vaga?.salarioMax);
                const min = Number(vaga?.salarioMin);
                if (Number.isFinite(max) && max > 0) return max;
                if (Number.isFinite(min) && min > 0) return min;
                return null;
            }

            function escolaridadeLabel(vaga) {
                const form = Array.isArray(vaga?.formacao) ? vaga.formacao[0] : null;
                const esc = form?.escolaridade || vaga?.escolaridade;
                return esc ? pretty(MAP_ESCOLARIDADE, esc, "") : "";
            }

            function idiomasResumo(vaga) {
                const arr = Array.isArray(vaga?.idiomas) ? vaga.idiomas : [];
                if (!arr.length) return "";
                const obrig = arr.filter(x => !!x?.obrigatorio);
                if (obrig.length) return `${obrig.length} idioma(s) obrigatório(s)`;
                return `${arr.length} idioma(s)`;
            }

            function cnhResumo(vaga) {
                const cnhs = Array.isArray(vaga?.cnhs) ? vaga.cnhs : [];
                if (!cnhs.length) return "";
                const labels = cnhs.map(x => typeof x === "string" ? x : (x?.tipoCnh || x?.tipo || "")).filter(Boolean);
                return labels.length ? `CNH ${labels.join(", ")}` : "";
            }

            function vehicleRequired(vaga) {
                const req = Array.isArray(vaga?.requisitos) ? vaga.requisitos[0] : null;
                const vp = req?.veiculoProprio;
                return vp === true ? "Veículo próprio" : "";
            }

            function sortRecomendadas(list) {
                return [...list].sort((a, b) => {
                    const da = new Date(a.publicadaEm || 0).getTime() || 0;
                    const db = new Date(b.publicadaEm || 0).getTime() || 0;
                    if (db !== da) return db - da;
                    return (getVagaId(b) || 0) - (getVagaId(a) || 0);
                });
            }

            function filterBySearch(list) {
                const q = (searchQuery || "").trim().toLowerCase();
                if (!q) return list;
                return list.filter(v => {
                    const loc = v?.localizacao || {};
                    const hay = [
                        v.titulo, v.empresa, v.cidade, v.estado, v.tipoContrato, v.descricao,
                        loc.rua, loc.bairro, loc.cidade, loc.estado, loc.cep,
                        escolaridadeLabel(v), idiomasResumo(v), cnhResumo(v), vehicleRequired(v)
                    ].filter(Boolean).join(" ").toLowerCase();
                    return hay.includes(q);
                });
            }

            function applyFeedFilter(filtro) {
                filtroAtual = filtro;

                const base = sortRecomendadas(vagasAll);
                let out = base;

                if (filtro === "salario-alto") out = base.filter(v => (getMaxSalario(v) ?? 0) >= 6000);
                if (filtro === "urgente") out = base.filter(v => !!v.contratacaoUrgente);
                if (filtro === "clt") out = base.filter(v => String(v.tipoContrato || "").toUpperCase().includes("CLT"));

                out = filterBySearch(out);

                vagasView = out;
                pos = 0;

                const mapLabel = {
                    recomendadas: "Recomendadas",
                    "salario-alto": "Salário alto",
                    urgente: "Urgentes",
                    clt: "CLT"
                };
                if (kpiFiltro) kpiFiltro.textContent = `Filtro: ${mapLabel[filtro] || "Recomendadas"}`;

                renderFeature(vagasView[pos] || null);
                renderRightList();
            }

            const FEATURE_APPLIED_KEY = "empresaDemo.applied.v1";

            function featureGetAppliedSet() {
                try {
                    const arr = JSON.parse(localStorage.getItem(FEATURE_APPLIED_KEY) || "[]");
                    return new Set(Array.isArray(arr) ? arr.map(String) : []);
                } catch (_) {
                    return new Set();
                }
            }

            function featureIsApplied(id) {
                if (id === null || id === undefined || String(id) === "") return false;
                return featureGetAppliedSet().has(String(id));
            }

            function isAppliedVagaId(id) {
                return featureIsApplied(id);
            }

            function setFeatureActionsEnabled(on, id) {
                if (btnCandidatar) {
                    if (!btnCandidatar.dataset._defaultHtml) btnCandidatar.dataset._defaultHtml = btnCandidatar.innerHTML;
                    if (!btnCandidatar.dataset._defaultOpacity) btnCandidatar.dataset._defaultOpacity = btnCandidatar.style.opacity || "";

                    const normalizedId = (on && id !== null && id !== undefined && String(id) !== "") ? String(id) : "";
                    btnCandidatar.dataset.vagaId = normalizedId;
                    btnCandidatar.disabled = !normalizedId;
                    btnCandidatar.innerHTML = btnCandidatar.dataset._defaultHtml || '<i class="fa-solid fa-paper-plane"></i> Me candidatar';
                    btnCandidatar.style.opacity = btnCandidatar.dataset._defaultOpacity || "";

                    if (normalizedId && featureIsApplied(normalizedId)) {
                        btnCandidatar.disabled = true;
                        btnCandidatar.innerHTML = '<i class="fa-solid fa-check"></i> Candidatado ✓';
                        btnCandidatar.style.opacity = '0.75';
                    }
                }
                if (btnVerDetalhes) btnVerDetalhes.disabled = !on;
            }

            function renderFeature(vaga) {
                vagaAtual = vaga || null;
                window.__vagaAtual = vagaAtual;

                if (!vaga) {
                    if (elTitulo) elTitulo.textContent = "Nenhuma vaga encontrada";
                    if (elDescricao) elDescricao.textContent = "Tente outro filtro ou limpe a busca.";
                    if (elPublicacao) elPublicacao.textContent = "—";
                    if (elChips) elChips.innerHTML = "";
                    setFeatureActionsEnabled(false, "");
                    return;
                }

                const id = getVagaId(vaga);
                const locCard = cardLocation(vaga);
                const salarioTxt = getSalarioTexto(vaga);
                const contratoTxt = safeText(vaga.tipoContrato || "", "—");
                const publicada = vaga.publicadaEm ? `Publicada em ${formatDateISOToBR(vaga.publicadaEm)}` : "—";

                if (elTitulo) elTitulo.textContent = safeText(vaga.titulo);

                const descRaw = String(vaga.descricao || "").trim();
                const preview = descRaw.length > 240 ? descRaw.slice(0, 240).trim() + "…" : descRaw;
                if (elDescricao) elDescricao.textContent = preview || "Clique em “Ver detalhes” para conhecer melhor esta vaga.";
                if (elPublicacao) elPublicacao.textContent = publicada;

                const subtitulo = [
                    contratoTxt ? contratoTxt : null,
                    escolaridadeLabel(vaga) ? `Formação: ${escolaridadeLabel(vaga)}` : null,
                    vaga.contratacaoUrgente ? "Contratação urgente" : null
                ].filter(Boolean).join(" • ");

                const elSub = document.getElementById("vagaSubtitulo");
                if (elSub) elSub.textContent = subtitulo || "—";

                if (elChips) {
                    const chips = [];
                    chips.push(`<span class="job-chip blue"><i class="fa-solid fa-location-dot"></i>${locCard}</span>`);
                    if (contratoTxt && contratoTxt !== "—") chips.push(`<span class="job-chip"><i class="fa-regular fa-file-lines"></i>${contratoTxt}</span>`);
                    if (salarioTxt) chips.push(`<span class="job-chip green"><i class="fa-solid fa-sack-dollar"></i>${salarioTxt}</span>`);

                    const esc = escolaridadeLabel(vaga);
                    if (esc) chips.push(`<span class="job-chip"><i class="fa-solid fa-graduation-cap"></i>${esc}</span>`);

                    const veic = vehicleRequired(vaga);
                    if (veic) chips.push(`<span class="job-chip"><i class="fa-solid fa-car-side"></i>${veic}</span>`);

                    const idi = idiomasResumo(vaga);
                    if (idi) chips.push(`<span class="job-chip"><i class="fa-solid fa-language"></i>${idi}</span>`);

                    const cnh = cnhResumo(vaga);
                    if (cnh) chips.push(`<span class="job-chip"><i class="fa-solid fa-id-card"></i>${cnh}</span>`);

                    if (vaga.contratacaoUrgente) chips.push(`<span class="job-chip red"><i class="fa-solid fa-bolt"></i>Urgente</span>`);
                    if (vaga.empresaConfidencial) chips.push(`<span class="job-chip"><i class="fa-solid fa-user-secret"></i>Confidencial</span>`);

                    elChips.innerHTML = chips.join("");
                }

                setFeatureActionsEnabled(id !== null && id !== undefined && String(id) !== "", id);
                highlightActiveMini(id);
            }

            function highlightActiveMini(id) {
                if (!listaVagas) return;
                listaVagas.querySelectorAll(".job-mini").forEach(card => {
                    card.classList.toggle("active", card.dataset.vagaId === String(id));
                });
            }

            function miniBadges(v) {
                const out = [];
                const loc = cardLocation(v);
                out.push(`<span class="mini-pill"><i class="fa-solid fa-location-dot"></i>${loc}</span>`);

                const contrato = String(v.tipoContrato || "").toUpperCase();
                if (contrato.includes("CLT")) out.push(`<span class="mini-pill blue"><i class="fa-regular fa-clipboard"></i>CLT</span>`);
                if (v.contratacaoUrgente) out.push(`<span class="mini-pill red"><i class="fa-solid fa-bolt"></i>Urgente</span>`);

                const esc = escolaridadeLabel(v);
                if (esc) out.push(`<span class="mini-pill"><i class="fa-solid fa-graduation-cap"></i>${esc}</span>`);

                const veic = vehicleRequired(v);
                if (veic) out.push(`<span class="mini-pill"><i class="fa-solid fa-car-side"></i>${veic}</span>`);

                const idi = idiomasResumo(v);
                if (idi) out.push(`<span class="mini-pill"><i class="fa-solid fa-language"></i>${idi}</span>`);

                const cnh = cnhResumo(v);
                if (cnh) out.push(`<span class="mini-pill"><i class="fa-solid fa-id-card"></i>${cnh}</span>`);

                out.push(`<span class="mini-pill"><i class="fa-solid fa-sack-dollar"></i>${getSalarioTexto(v)}</span>`);
                return out.join("");
            }

            function renderRightList() {
                if (!listaVagas) return;

                if (!vagasView.length) {
                    listaVagas.innerHTML = `<div class="job-empty">Nenhuma vaga para esse filtro/busca.</div>`;
                    return;
                }

                const top = vagasView.slice(0, 10);
                const html = top.map(v => {
                    const id = getVagaId(v);
                    return `
            <div class="job-mini" data-vaga-id="${String(id ?? "")}">
              <p class="job-mini-title">${safeText(v.titulo)}</p>
              <p class="job-mini-meta">
                ${miniBadges(v)}
              </p>
            </div>
          `;
                }).join("");

                listaVagas.innerHTML = html;

                listaVagas.querySelectorAll(".job-mini").forEach(item => {
                    item.addEventListener("click", () => {
                        const id = item.dataset.vagaId;
                        const chosen = vagasView.find(v => String(getVagaId(v) ?? "") === String(id));
                        if (!chosen) return;
                        renderFeature(chosen);
                        const feature = document.querySelector(".job-feature");
                        if (feature && window.innerWidth < 980) {
                            window.scrollTo({
                                top: feature.offsetTop - 90,
                                behavior: "smooth"
                            });
                        }
                    });
                });

                const current = vagasView[pos] ? getVagaId(vagasView[pos]) : null;
                if (current != null) highlightActiveMini(current);
            }

            function renderSectionRow(rowEl, arr) {
                if (!rowEl) return;
                rowEl.innerHTML = arr.slice(0, 10).map(v => {
                    const id = getVagaId(v);
                    return `
            <div class="job-mini" data-vaga-id="${String(id)}" title="Clique para abrir no destaque">
              <p class="job-mini-title">${safeText(v.titulo)}</p>
              <p class="job-mini-meta">
                ${miniBadges(v)}
              </p>
            </div>
          `;
                }).join("");

                rowEl.querySelectorAll(".job-mini").forEach(item => {
                    item.addEventListener("click", () => {
                        const id = item.dataset.vagaId;
                        const chosen = vagasAll.find(v => String(getVagaId(v) ?? "") === String(id));
                        if (!chosen) return;
                        renderFeature(chosen);
                        const feature = document.querySelector(".job-feature");
                        if (feature) window.scrollTo({
                            top: feature.offsetTop - 90,
                            behavior: "smooth"
                        });
                    });
                });
            }

            function renderSections() {
                const bySal = [...vagasAll].filter(v => (getMaxSalario(v) ?? 0) > 0).sort((a, b) => (getMaxSalario(b) ?? 0) - (getMaxSalario(a) ?? 0));
                if (secSalarios) {
                    secSalarios.hidden = false;
                    secSalarios.style.display = "";
                    if (secSalariosCount) secSalariosCount.textContent = `${bySal.length} vaga(s)`;
                    if (!bySal.length) {
                        if (secSalariosRow) secSalariosRow.innerHTML = "";
                        if (secSalariosEmpty) secSalariosEmpty.style.display = "block";
                    } else {
                        if (secSalariosEmpty) secSalariosEmpty.style.display = "none";
                        renderSectionRow(secSalariosRow, bySal);
                    }
                }

                const urg = vagasAll.filter(v => !!v.contratacaoUrgente);
                if (secUrgentes) {
                    secUrgentes.hidden = false;
                    secUrgentes.style.display = "";
                    if (secUrgentesCount) secUrgentesCount.textContent = `${urg.length} vaga(s)`;
                    if (!urg.length) {
                        if (secUrgentesRow) secUrgentesRow.innerHTML = "";
                        if (secUrgentesEmpty) secUrgentesEmpty.style.display = "block";
                    } else {
                        if (secUrgentesEmpty) secUrgentesEmpty.style.display = "none";
                        renderSectionRow(secUrgentesRow, urg);
                    }
                }

                const clt = vagasAll.filter(v => String(v.tipoContrato || "").toUpperCase().includes("CLT"));
                if (secClt) {
                    secClt.hidden = false;
                    secClt.style.display = "";
                    if (secCltCount) secCltCount.textContent = `${clt.length} vaga(s)`;
                    if (!clt.length) {
                        if (secCltRow) secCltRow.innerHTML = "";
                        if (secCltEmpty) secCltEmpty.style.display = "block";
                    } else {
                        if (secCltEmpty) secCltEmpty.style.display = "none";
                        renderSectionRow(secCltRow, clt);
                    }
                }
            }

            function openVagaModal(vaga) {
                if (!vaga) return;

                const vagaId = String(getVagaId(vaga) ?? "");
                if (isAppliedVagaId(vagaId)) {
                    alert("Essa vaga já está em Minhas candidaturas.");
                    return;
                }

                if (!vagaModal) return;
                if (!vaga || !vagaModal) return;

                vagaAtual = vaga;
                vagaModal.dataset.vagaId = String(getVagaId(vaga) ?? "");

                if (mKicker) mKicker.textContent = "Detalhes da vaga";
                if (mTitle) mTitle.textContent = safeText(vaga.titulo);

                if (mLocal) mLocal.innerHTML = `<i class="fa-solid fa-location-dot"></i> ${cardLocation(vaga)}`;
                if (mContrato) mContrato.innerHTML = `<i class="fa-regular fa-file-lines"></i> ${safeText(vaga.tipoContrato, "—")}`;
                if (mSalario) mSalario.innerHTML = `<i class="fa-solid fa-sack-dollar"></i> ${getSalarioTexto(vaga)}`;

                if (mUrgente) mUrgente.style.display = vaga.contratacaoUrgente ? "inline-flex" : "none";

                if (mDescricao) mDescricao.textContent = safeText(vaga.descricao, "—");
                if (mEndereco) mEndereco.textContent = cardLocation(vaga);

                const form = Array.isArray(vaga.formacao) ? vaga.formacao[0] : null;
                if (mFormacao) {
                    const txt = [];
                    if (form?.escolaridade) txt.push(`Escolaridade: ${pretty(MAP_ESCOLARIDADE, form.escolaridade, form.escolaridade)}`);
                    if (form?.experienciaDescricao) txt.push(`Experiência: ${form.experienciaDescricao}`);
                    mFormacao.textContent = txt.length ? txt.join(" • ") : "—";
                }

                if (mRequisitos) {
                    const reqs = [
                        ...(Array.isArray(vaga.requisitosObrigatorios) ? vaga.requisitosObrigatorios : []),
                        ...(Array.isArray(vaga.requisitosDesejaveis) ? vaga.requisitosDesejaveis : [])
                    ];
                    mRequisitos.textContent = reqs.length ? reqs.join(" • ") : "—";
                }

                if (mIdiomas) {
                    const arr = Array.isArray(vaga.idiomas) ? vaga.idiomas : [];
                    const txt = arr.map(x => {
                        const idioma = x?.idioma || "";
                        const nivel = x?.nivelIdioma || "";
                        return [idioma, nivel].filter(Boolean).join(" - ");
                    }).filter(Boolean);
                    mIdiomas.textContent = txt.length ? txt.join(" • ") : "—";
                }

                if (mCnh) {
                    const arr = Array.isArray(vaga.cnhs) ? vaga.cnhs : [];
                    const txt = arr.map(x => typeof x === "string" ? x : (x?.tipoCnh || x?.tipo || "")).filter(Boolean);
                    mCnh.textContent = txt.length ? txt.join(", ") : "—";
                }

                if (mPublicacao) mPublicacao.textContent = vaga.publicadaEm ? formatDateISOToBR(vaga.publicadaEm) : "—";

                if (mAbrirPagina) {
                    const href = (ROUTES.VAGA_DETALHE || "#").replace("{id}", String(getVagaId(vaga) ?? ""));
                    mAbrirPagina.href = href;
                }

                if (mCandidatar) {
                    mCandidatar.dataset.vagaId = String(getVagaId(vaga) ?? "");
                    if (featureIsApplied(getVagaId(vaga))) {
                        mCandidatar.disabled = true;
                        mCandidatar.innerHTML = '<i class="fa-solid fa-check"></i> Candidatado ✓';
                        mCandidatar.style.opacity = "0.75";
                    } else {
                        mCandidatar.disabled = false;
                        mCandidatar.innerHTML = '<i class="fa-solid fa-paper-plane"></i> Me candidatar';
                        mCandidatar.style.opacity = "";
                    }
                }

                vagaModal.hidden = false;
                vagaModal.classList.add("is-open");
                document.documentElement.style.overflow = "hidden";
                const dialog = vagaModal.querySelector(".candModal__dialog");
                dialog?.focus();
            }
            let vagaSelecionadaParaCandidatura = null;
            let tokenValidado = false;

            function closeVagaModal() {
                if (!vagaModal) return;
                vagaModal.classList.remove("is-open");
                vagaModal.hidden = true;
                document.documentElement.style.overflow = "";
            }

            function nextVaga() {
                if (!vagasView.length) return;
                pos = (pos + 1) % vagasView.length;
                renderFeature(vagasView[pos]);
            }

            async function fetchVagas() {
                const token = localStorage.getItem("token") || "";
                const authHeaders = token ? {
                    Authorization: `Bearer ${token}`
                } : {};

                const attempts = [{
                    path: "/vagas/list",
                    auth: true
                }];

                function extractList(data) {
                    if (!data) return [];
                    if (Array.isArray(data)) return data;
                    if (Array.isArray(data.vagas)) return data.vagas;
                    if (Array.isArray(data.items)) return data.items;
                    if (Array.isArray(data.content)) return data.content;
                    if (Array.isArray(data.data)) return data.data;
                    if (Array.isArray(data.result)) return data.result;
                    return [];
                }

                for (const a of attempts) {
                    const url = `${API_BASE}${a.path}`;
                    try {
                        const resp = await fetch(url, {
                            method: "GET",
                            headers: {
                                Accept: "application/json",
                                ...(a.auth ? authHeaders : {})
                            }
                        });
                        if (resp.status === 404) continue;

                        if ((resp.status === 401 || resp.status === 403) && a.auth) {
                            const raw = await resp.text().catch(() => "");
                            throw new Error(raw || "Sem autorização para buscar vagas (token/role).");
                        }

                        const raw = await resp.text().catch(() => "");
                        let data = null;
                        try {
                            data = raw ? JSON.parse(raw) : null;
                        } catch {}

                        if (!resp.ok) {
                            const msg = (data && (data.message || data.error)) || raw || `Erro ${resp.status}`;
                            throw new Error(msg);
                        }

                        const list = extractList(data);
                        return list.map(normalizeVagaApi).filter(v => !!getVagaId(v));
                    } catch (e) {
                        if (a === attempts[attempts.length - 1]) throw e;
                    }
                }
                throw new Error("Não encontrei nenhum endpoint válido para listar vagas.");
            }

            btnPular?.addEventListener("click", (e) => {
                e.preventDefault();
                nextVaga();
            });

            btnVerDetalhes?.addEventListener("click", (e) => {
                e.preventDefault();
                if (!vagaAtual) return;
                openVagaModal(vagaAtual);
            });
            btnCandidatar?.addEventListener("click", (e) => {
                e.preventDefault();
                if (!vagaAtual) return;
                window.__vagaAtual = vagaAtual;
                document.getElementById("mCandidatar")?.blur();
                document.getElementById("btnCandidatar")?.blur();
            });

            mCandidatar?.addEventListener("click", (e) => {
                e.preventDefault();
                if (!vagaAtual) return;
                window.__vagaAtual = vagaAtual;
            });
            vagaModalClose?.addEventListener("click", closeVagaModal);
            vagaModal?.addEventListener("click", (e) => {
                if (e.target?.matches("[data-close-modal]")) closeVagaModal();
            });
            document.addEventListener("keydown", (e) => {
                if (e.key === "Escape" && vagaModal && !vagaModal.hidden) closeVagaModal();
            });

            chipsFiltro?.querySelectorAll(".cand-chip").forEach(btn => {
                btn.addEventListener("click", () => {
                    chipsFiltro.querySelectorAll(".cand-chip").forEach(b => b.classList.remove("active"));
                    btn.classList.add("active");
                    applyFeedFilter(btn.dataset.filtro || "recomendadas");
                });
            });

            feedSearch?.addEventListener("input", () => {
                searchQuery = feedSearch.value || "";
                applyFeedFilter(filtroAtual);
            });

            (async function bootVagas() {
                try {
                    if (kpiCount) kpiCount.textContent = "Carregando…";
                    if (listaVagas) listaVagas.innerHTML = `<div class="job-empty">Carregando lista…</div>`;

                    const fetched = await fetchVagas();
                    vagasAll = fetched.filter(v => !isAppliedVagaId(getVagaId(v)));
                    if (!vagasAll.length) {
                        if (kpiCount) kpiCount.textContent = "0 vagas";
                        renderFeature(null);
                        if (listaVagas) listaVagas.innerHTML = `<div class="job-empty">Nenhuma vaga disponível agora.</div>`;
                        renderSections();
                        return;
                    }

                    if (kpiCount) kpiCount.textContent = `${vagasAll.length} vaga(s)`;
                    applyFeedFilter("recomendadas");
                    renderSections();
                } catch (err) {
                    console.error("[VAGAS ERROR]", err);
                    if (kpiCount) kpiCount.textContent = "Erro ao carregar";
                    renderFeature(null);
                    if (listaVagas) listaVagas.innerHTML = `<div class="job-empty">Falha ao carregar vagas. Verifique o servidor/API.</div>`;
                }
            })();

        });
    </script>


    <script>
        (() => {
            "use strict";

            // =========================
            // CONFIG (igual seu padrão)
            // =========================
            const API_BASE = window.JobHub_API_BASE || "";

            const $ = (s, el = document) => el.querySelector(s);

            // =========================
            // HELPERS
            // =========================

            const safeText = (v, fb = "") => {
                const s = String(v ?? "").trim();
                return s ? s : fb;
            };

            function getAppliedIdsSet() {
                try {
                    const arr = JSON.parse(localStorage.getItem("empresaDemo.applied.v1") || "[]");
                    return new Set(Array.isArray(arr) ? arr.map(String) : []);
                } catch (_) {
                    return new Set();
                }
            }

            function isAppliedVagaId(id) {
                if (id == null || id === "") return false;
                return getAppliedIdsSet().has(String(id));
            }

            function esc(str) {
                return String(str ?? "")
                    .replaceAll("&", "&amp;")
                    .replaceAll("<", "&lt;")
                    .replaceAll(">", "&gt;")
                    .replaceAll('"', "&quot;")
                    .replaceAll("'", "&#039;");
            }

            function onlyDigits(s) {
                return String(s ?? "").replace(/\D+/g, "");
            }

            function maskPhoneBR(raw) {
                const d = onlyDigits(raw).slice(0, 11);
                if (!d) return "";
                if (d.length <= 10) {
                    // (11) 1234-5678
                    return d.replace(/^(\d{2})(\d{0,4})(\d{0,4}).*$/, (_, a, b, c) =>
                        `(${a}) ${b}${c ? "-" + c : ""}`.trim()
                    );
                }
                // (11) 91234-5678
                return d.replace(/^(\d{2})(\d{0,5})(\d{0,4}).*$/, (_, a, b, c) =>
                    `(${a}) ${b}${c ? "-" + c : ""}`.trim()
                );
            }

            // Aceita: "1998-04-15", "15/04/1998", ISO completo etc -> retorna YYYY-MM-DD pro <input type="date">
            function toInputDate(v) {
                const s = String(v ?? "").trim();
                if (!s) return "";
                if (/^\d{4}-\d{2}-\d{2}$/.test(s)) return s;

                // dd/mm/yyyy
                const m = s.match(/^(\d{2})\/(\d{2})\/(\d{4})$/);
                if (m) return `${m[3]}-${m[2]}-${m[1]}`;

                // ISO datetime
                const d = new Date(s);
                if (!Number.isNaN(d.getTime())) {
                    const yyyy = String(d.getFullYear());
                    const mm = String(d.getMonth() + 1).padStart(2, "0");
                    const dd = String(d.getDate()).padStart(2, "0");
                    return `${yyyy}-${mm}-${dd}`;
                }
                return "";
            }

            // =========================
            // AUTH (Bearer)
            // =========================
            function getToken() {
                return (
                    localStorage.getItem("token") ||
                    localStorage.getItem("access_token") ||
                    localStorage.getItem("jwt") ||
                    ""
                );
            }

            async function apiJSON(url, {
                method = "GET",
                body = null,
                tryAuth = true
            } = {}) {
                const headers = {
                    "Accept": "application/json"
                };
                if (body) headers["Content-Type"] = "application/json";

                let resp = await fetch(url, {
                    method,
                    headers,
                    body: body ? JSON.stringify(body) : undefined
                });

                if (tryAuth && (resp.status === 401 || resp.status === 403) && getToken()) {
                    resp = await fetch(url, {
                        method,
                        headers: {
                            ...headers,
                            "Authorization": `Bearer ${getToken()}`
                        },
                        body: body ? JSON.stringify(body) : undefined
                    });
                }

                const text = await resp.text().catch(() => "");
                let data = null;
                try {
                    data = text ? JSON.parse(text) : null;
                } catch {
                    data = text;
                }

                if (!resp.ok) {
                    const msg =
                        (data && (data.message || data.mensagem || data.error || data.detail)) ? (data.message || data.mensagem || data.error || data.detail) :
                        (typeof data === "string" && data.trim()) ? data :
                        `HTTP ${resp.status}`;
                    const err = new Error(msg);
                    err.status = resp.status;
                    err.payload = data;
                    throw err;
                }
                return data;
            }

            // =========================
            // NORMALIZA CANDIDATO (fallbacks)
            // =========================
            function getIdCandidato(me) {
                return me?.id ?? me?.idCandidato ?? me?.candidatoId ?? me?.id_candidato ?? null;
            }

            function normalizeCandidatoApi(meRaw) {
                // Alguns backends vêm como {data:{...}} ou {candidato:{...}}
                const me = meRaw?.candidato || meRaw?.data || meRaw || {};

                const loc = me?.endereco || me?.localizacao || me?.local || {};

                return {
                    id: getIdCandidato(me),

                    nomeCompleto: me?.nomeCompleto ?? me?.nome ?? me?.nome_completo ?? "",
                    email: me?.email ?? me?.usuario?.email ?? me?.contato?.email ?? "",
                    telefone: me?.telefone ?? me?.celular ?? me?.phone ?? "",
                    genero: me?.genero ?? me?.sexo ?? "NAO_ESPECIFICADO",
                    dataNascimento: me?.dataNascimento ?? me?.nascimento ?? me?.data_nascimento ?? "",

                    cidade: me?.cidade ?? loc?.cidade ?? "",
                    estado: me?.estado ?? me?.uf ?? loc?.estado ?? loc?.uf ?? "",
                    bairro: me?.bairro ?? loc?.bairro ?? "",
                    cep: me?.cep ?? loc?.cep ?? "",
                    rua: me?.rua ?? loc?.rua ?? "",
                    numero: me?.numero ?? loc?.numero ?? "",
                    complemento: me?.complemento ?? loc?.complemento ?? "",

                    linkedin: me?.linkedin ?? me?.linkedIn ?? "",
                    github: me?.github ?? "",
                    portfolio: me?.portfolio ?? me?.site ?? "",

                    // extras “leves” (se existir)
                    resumo: me?.resumo ?? me?.sobre ?? "",
                    objetivo: me?.objetivo ?? "",

                    _raw: me
                };
            }

            // =========================
            // CAMPOS PERMITIDOS NO PUT (sem senha / sem formação/experiência)
            // =========================
            const PUT_ALLOWED = [
                "nomeCompleto", "email", "telefone", "genero", "dataNascimento",
                "cidade", "estado", "bairro", "cep", "rua", "numero", "complemento",
                "linkedin", "github", "portfolio", "resumo", "objetivo"
            ];

            function buildPutPayload(model) {
                const out = {};
                PUT_ALLOWED.forEach(k => {
                    if (model[k] === undefined) return;
                    // telefone vai sem máscara
                    if (k === "telefone") out[k] = onlyDigits(model[k]);
                    else out[k] = model[k];
                });
                return out;
            }

            // =========================
            // DOM (IDs padrão - ajuste se precisar)
            // =========================
            const form = $("#perfilForm");

            const iNome = $("#nomeCompleto");
            const iEmail = $("#email");
            const iTel = $("#telefone");
            const iGenero = $("#genero");
            const iNasc = $("#dataNascimento");

            const iCidade = $("#cidade");
            const iEstado = $("#estado");
            const iBairro = $("#bairro");
            const iCep = $("#cep");
            const iRua = $("#rua");
            const iNumero = $("#numero");
            const iCompl = $("#complemento");

            const iLinkedin = $("#linkedin");
            const iGithub = $("#github");
            const iPortfolio = $("#portfolio");

            const iResumo = $("#resumo");
            const iObjetivo = $("#objetivo");

            const btnSalvar = $("#btnSalvar");
            const statusEl = $("#perfilStatus"); // opcional (p/ texto)

            function setStatus(msg, type = "") {
                if (!statusEl) return;
                statusEl.textContent = msg || "";
                statusEl.className = type ? `status ${type}` : "status";
            }

            // =========================
            // STATE
            // =========================
            let model = null;

            function fillForm(m) {
                if (iNome) iNome.value = safeText(m.nomeCompleto);
                if (iEmail) iEmail.value = safeText(m.email);
                if (iTel) iTel.value = maskPhoneBR(m.telefone);
                if (iGenero) iGenero.value = safeText(m.genero, "NAO_ESPECIFICADO");
                if (iNasc) iNasc.value = toInputDate(m.dataNascimento);

                if (iCidade) iCidade.value = safeText(m.cidade);
                if (iEstado) iEstado.value = safeText(m.estado);
                if (iBairro) iBairro.value = safeText(m.bairro);
                if (iCep) iCep.value = safeText(m.cep);
                if (iRua) iRua.value = safeText(m.rua);
                if (iNumero) iNumero.value = safeText(m.numero);
                if (iCompl) iCompl.value = safeText(m.complemento);

                if (iLinkedin) iLinkedin.value = safeText(m.linkedin);
                if (iGithub) iGithub.value = safeText(m.github);
                if (iPortfolio) iPortfolio.value = safeText(m.portfolio);

                if (iResumo) iResumo.value = safeText(m.resumo);
                if (iObjetivo) iObjetivo.value = safeText(m.objetivo);
            }

            function readFormToModel() {
                if (!model) model = {};
                model.nomeCompleto = iNome ? iNome.value.trim() : model.nomeCompleto;
                model.email = iEmail ? iEmail.value.trim() : model.email;
                model.telefone = iTel ? iTel.value.trim() : model.telefone;
                model.genero = iGenero ? iGenero.value : model.genero;
                model.dataNascimento = iNasc ? iNasc.value : model.dataNascimento;

                model.cidade = iCidade ? iCidade.value.trim() : model.cidade;
                model.estado = iEstado ? iEstado.value.trim() : model.estado;
                model.bairro = iBairro ? iBairro.value.trim() : model.bairro;
                model.cep = iCep ? iCep.value.trim() : model.cep;
                model.rua = iRua ? iRua.value.trim() : model.rua;
                model.numero = iNumero ? iNumero.value.trim() : model.numero;
                model.complemento = iCompl ? iCompl.value.trim() : model.complemento;

                model.linkedin = iLinkedin ? iLinkedin.value.trim() : model.linkedin;
                model.github = iGithub ? iGithub.value.trim() : model.github;
                model.portfolio = iPortfolio ? iPortfolio.value.trim() : model.portfolio;

                model.resumo = iResumo ? iResumo.value.trim() : model.resumo;
                model.objetivo = iObjetivo ? iObjetivo.value.trim() : model.objetivo;
            }

            // máscara telefone ao digitar
            iTel?.addEventListener("input", () => {
                const pos = iTel.selectionStart || 0;
                iTel.value = maskPhoneBR(iTel.value);
                // não vou forçar cursor perfeito (pra não bugar), mas fica ok na prática
                try {
                    iTel.setSelectionRange(pos, pos);
                } catch {}
            });

            // =========================
            // LOAD ME
            // =========================
            async function loadMe() {
                setStatus("Carregando seus dados…");
                const meRaw = await apiJSON(`${API_BASE}/candidatos/me`, {
                    method: "GET",
                    tryAuth: true
                });
                const me = normalizeCandidatoApi(meRaw);

                if (!me.id) {
                    // Se tua API não devolve id no /me, tenta usar algo do raw
                    // Mas pra PUT você PRECISA do ID. Se não vier, o backend precisa ajustar.
                    console.warn("Candidato /me veio sem id:", meRaw);
                }

                model = me;
                localStorage.setItem("candidato_me", JSON.stringify(meRaw)); // cache bruto se quiser
                fillForm(me);
                setStatus("Dados carregados ✅", "ok");
            }

            // =========================
            // SAVE (PUT)
            // =========================
            async function save() {
                readFormToModel();

                // aqui você pode validar mínimo:
                if (!safeText(model.nomeCompleto)) throw new Error("Informe seu nome completo.");
                if (!safeText(model.email)) throw new Error("Informe seu e-mail.");

                const id = model.id;
                if (!id) throw new Error("Não foi possível salvar: seu ID não veio no /candidatos/me.");

                const payload = buildPutPayload(model);

                setStatus("Salvando…");
                if (btnSalvar) btnSalvar.disabled = true;

                const updated = await apiJSON(`${API_BASE}/candidatos/${id}`, {
                    method: "PUT",
                    body: payload,
                    tryAuth: true
                });

                // re-carrega e re-preenche (pra garantir dados antigos sempre vindo certo)
                const me2 = normalizeCandidatoApi(updated);
                model = {
                    ...model,
                    ...me2
                };
                fillForm(model);

                setStatus("Atualizado com sucesso ✅", "ok");
            }

            form?.addEventListener("submit", async (e) => {
                e.preventDefault();
                try {
                    await save();
                } catch (err) {
                    console.error(err);
                    setStatus(`Erro: ${String(err.message || err)}`, "err");
                } finally {
                    if (btnSalvar) btnSalvar.disabled = false;
                }
            });

            // =========================
            // BOOT
            // =========================
            document.addEventListener("DOMContentLoaded", () => {
                // Se nem tem form, não roda
                if (!form) return;
                loadMe().catch(err => {
                    console.error(err);
                    setStatus(`Falha ao carregar: ${String(err.message || err)}`, "err");
                });
            });
        })();
    </script>
    <script>
        (() => {
            "use strict";

            const API_BASE = window.JobHub_API_BASE || "";

            let vagaSelecionadaParaCandidatura = null;
            let tokenValidado = false;

            function esc(str) {
                return String(str ?? "")
                    .replaceAll("&", "&amp;")
                    .replaceAll("<", "&lt;")
                    .replaceAll(">", "&gt;")
                    .replaceAll('"', "&quot;")
                    .replaceAll("'", "&#039;");
            }

            function safeText(v, fb = "—") {
                const s = String(v ?? "").trim();
                return s ? s : fb;
            }

            function getVagaId(v) {
                return v?.id ?? v?.idVaga ?? v?.vagaId ?? null;
            }

            function showMsg(msg) {
                const el = document.getElementById("applyStatus");
                if (el) el.textContent = msg || "";
            }

            function openApplyModal(vaga) {
                const modal = document.getElementById("applyModal");
                const emailInput = document.getElementById("applyEmail");
                const tokenInput = document.getElementById("applyToken");
                const resumo = document.getElementById("applyVagaResumo");

                if (!modal) {
                    console.error("applyModal não encontrado");
                    return;
                }

                vagaSelecionadaParaCandidatura = vaga;
                tokenValidado = false;

                const candidatoMe = (() => {
                    try {
                        return JSON.parse(localStorage.getItem("candidato_me") || "null");
                    } catch {
                        return null;
                    }
                })();

                if (emailInput) emailInput.value = candidatoMe?.email || "";
                if (tokenInput) tokenInput.value = "";

                if (resumo) {
                    resumo.textContent = `#${getVagaId(vaga)} ${safeText(vaga?.titulo)}`;
                }

                showMsg("Informe seu e-mail e clique em Enviar token.");

                modal.hidden = false;
                modal.classList.add("is-open");
                document.documentElement.style.overflow = "hidden";
            }

            function closeApplyModal() {
                const modal = document.getElementById("applyModal");
                if (!modal) return;
                modal.classList.remove("is-open");
                modal.hidden = true;
                document.documentElement.style.overflow = "";
            }
            async function sendToken() {
                const email = (document.getElementById("applyEmail")?.value || "").trim();
                const vagaId = getVagaId(vagaSelecionadaParaCandidatura);
                const token = localStorage.getItem("token") || "";

                if (!vagaId) throw new Error("Vaga inválida.");
                if (!email) throw new Error("Informe o e-mail.");

                showMsg("Enviando token...");

                const resp = await fetch(
                    `${API_BASE}/pre-candidaturas/${vagaId}?email=${encodeURIComponent(email)}`, {
                        method: "POST",
                        headers: {
                            "Accept": "application/json",
                            "Authorization": `Bearer ${token}`
                        }
                    }
                );

                const raw = await resp.text().catch(() => "");
                let data = null;
                try {
                    data = raw ? JSON.parse(raw) : null;
                } catch (_) {}

                if (!resp.ok) {
                    console.error("ERRO PRE-CANDIDATURA:", data || raw);
                    throw new Error(
                        (data && (data.message || data.error || data.mensagem || data.detail)) ||
                        raw ||
                        `Erro ${resp.status}`
                    );
                }

                showMsg("Token enviado com sucesso para o e-mail.");
                console.log("sendToken ok", data);
                return data;
            }
            async function validateToken() {
                const token = (document.getElementById("applyToken")?.value || "").trim();
                const email = (document.getElementById("applyEmail")?.value || "").trim();

                if (!token) throw new Error("Digite o token.");
                if (!email) throw new Error("Informe o e-mail.");

                showMsg("Validando token...");

                const urls = [
                    `${API_BASE}/pre-candidaturas/validar?token=${encodeURIComponent(token)}&email=${encodeURIComponent(email)}`,
                    `${API_BASE}/pre-candidaturas/validar?token=${encodeURIComponent(token)}`
                ];

                let lastErr = null;

                for (const url of urls) {
                    try {
                        const resp = await fetch(url, {
                            method: "GET",
                            headers: {
                                "Accept": "application/json"
                            }
                        });

                        const raw = await resp.text().catch(() => "");
                        let data = null;
                        try {
                            data = raw ? JSON.parse(raw) : null;
                        } catch (_) {}

                        if (!resp.ok) {
                            lastErr = new Error((data && (data.message || data.error || data.mensagem)) || raw || `Erro ${resp.status}`);
                            continue;
                        }

                        tokenValidado = true;
                        showMsg("Token validado com sucesso.");
                        console.log("validateToken ok", data);
                        return data;
                    } catch (e) {
                        lastErr = e;
                    }
                }

                throw lastErr || new Error("Não foi possível validar o token.");
            }

            async function confirmApply() {
                const token = (document.getElementById("applyToken")?.value || "").trim();
                const email = (document.getElementById("applyEmail")?.value || "").trim();
                const vagaId = getVagaId(vagaSelecionadaParaCandidatura);

                if (!vagaId) throw new Error("Vaga inválida.");
                if (!email) throw new Error("Informe o e-mail.");
                if (!token) throw new Error("Digite o token.");
                if (!tokenValidado) throw new Error("Valide o token antes de confirmar.");

                showMsg("Confirmando candidatura...");

                const urls = [
                    `${API_BASE}/pre-candidaturas/confirmar?token=${encodeURIComponent(token)}&email=${encodeURIComponent(email)}`,
                    `${API_BASE}/pre-candidaturas/confirmar/${vagaId}?token=${encodeURIComponent(token)}&email=${encodeURIComponent(email)}`,
                    `${API_BASE}/pre-candidaturas/confirmar?token=${encodeURIComponent(token)}`
                ];

                let lastErr = null;

                for (const url of urls) {
                    try {
                        const resp = await fetch(url, {
                            method: "POST",
                            headers: {
                                "Accept": "application/json"
                            }
                        });

                        const raw = await resp.text().catch(() => "");
                        let data = null;
                        try {
                            data = raw ? JSON.parse(raw) : null;
                        } catch (_) {}

                        if (!resp.ok) {
                            lastErr = new Error((data && (data.message || data.error || data.mensagem)) || raw || `Erro ${resp.status}`);
                            continue;
                        }
                        const key = "empresaDemo.applied.v1";
                        let atual = [];

                        try {
                            atual = JSON.parse(localStorage.getItem(key) || "[]");
                            if (!Array.isArray(atual)) atual = [];
                        } catch {
                            atual = [];
                        }

                        const ids = new Set(atual.map(String));
                        ids.add(String(vagaId));

                        localStorage.setItem(key, JSON.stringify([...ids]));

                        // garante atualização imediata da tela sem depender só do reload
                        if (window.__vagaAtual && String(window.__vagaAtual.id ?? window.__vagaAtual.idVaga ?? "") === String(vagaId)) {
                            const btnFeed = document.getElementById("btnCandidatar");
                            const btnModal = document.getElementById("mCandidatar");

                            if (btnFeed) {
                                btnFeed.disabled = true;
                                btnFeed.innerHTML = '<i class="fa-solid fa-check"></i> Candidatado ✓';
                                btnFeed.style.opacity = "0.75";
                            }

                            if (btnModal) {
                                btnModal.disabled = true;
                                btnModal.innerHTML = '<i class="fa-solid fa-check"></i> Candidatado ✓';
                                btnModal.style.opacity = "0.75";
                            }
                        }
                        console.log("SALVOU LOCALSTORAGE:", localStorage.getItem("empresaDemo.applied.v1"));
                        showMsg("Candidatura confirmada com sucesso.");
                        console.log("confirmApply ok", data);

                        setTimeout(() => {
                            window.location.reload();
                        }, 700);

                        return data;
                    } catch (e) {
                        lastErr = e;
                    }
                }

                throw lastErr || new Error("Não foi possível confirmar a candidatura.");
            }

            document.addEventListener("DOMContentLoaded", () => {
                const btnOpenFeed = document.getElementById("btnCandidatar");
                const btnOpenModal = document.getElementById("mCandidatar");

                const btnSend = document.getElementById("btnSendToken");
                const btnValidate = document.getElementById("btnValidateToken");
                const btnConfirm = document.getElementById("btnConfirmApply");

                const applyModal = document.getElementById("applyModal");
                const applyClose = document.getElementById("applyClose");

                btnOpenFeed?.addEventListener("click", (e) => {
                    e.preventDefault();
                    if (!window.__vagaAtual) return;
                    openApplyModal(window.__vagaAtual);
                });

                btnOpenModal?.addEventListener("click", (e) => {
                    e.preventDefault();
                    if (!window.__vagaAtual) return;
                    openApplyModal(window.__vagaAtual);
                });

                btnSend?.addEventListener("click", async () => {
                    try {
                        await sendToken();
                    } catch (e) {
                        console.error("sendToken error", e);
                        showMsg(e.message || "Erro ao enviar token.");
                    }
                });

                btnValidate?.addEventListener("click", async () => {
                    try {
                        await validateToken();
                    } catch (e) {
                        console.error("validateToken error", e);
                        showMsg(e.message || "Erro ao validar token.");
                    }
                });

                btnConfirm?.addEventListener("click", async () => {
                    try {
                        await confirmApply();
                    } catch (e) {
                        console.error("confirmApply error", e);
                        showMsg(e.message || "Erro ao confirmar candidatura.");
                    }
                });

                applyClose?.addEventListener("click", closeApplyModal);

                applyModal?.addEventListener("click", (e) => {
                    if (e.target?.matches("[data-close-apply]")) {
                        closeApplyModal();
                    }
                });
            });
        })();
    </script>

</body>

</html>