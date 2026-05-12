<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>JobHub Pesquisar Vagas</title>

    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/reset.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800;900&family=Inter:wght@400;600;700;800&display=swap');

        /* =========================================================
      JobHub  PESQUISAR (escopado)
      Escopo: body.jobhub-search-page
    ========================================================= */
        body.jobhub-search-page {
            --bg: #f3f6ff;
            --card: rgba(255, 255, 255, .94);
            --text: rgba(15, 23, 42, .92);
            --muted: rgba(15, 23, 42, .66);
            --line: rgba(15, 23, 42, .10);
            --shadow: 0 18px 55px rgba(15, 23, 42, .12);
            --shadow2: 0 10px 26px rgba(15, 23, 42, .10);

            --blue: #2b81a9;
            --blue2: #6e88a7;
            --accent: #1F75D8;
            --pink: #a92b9d;

            --r-xl: 24px;
            --r-lg: 18px;
            --r-md: 14px;
            --r-sm: 12px;

            background:
                radial-gradient(900px 420px at 12% 0%, rgba(31, 117, 216, .10), transparent 60%),
                radial-gradient(900px 420px at 90% 0%, rgba(43, 129, 169, .12), transparent 60%),
                var(--bg);
            color: var(--text);
            font-family: "Inter", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
        }

        body.jobhub-search-page .wrap {
            max-width: 1320px;
            margin: 0 auto;
            padding: 16px 16px 34px;
        }

        body.jobhub-search-page .hero {
            margin-top: 10px;
            border-radius: var(--r-xl);
            border: 1px solid rgba(15, 23, 42, .08);
            box-shadow: var(--shadow);
            background: linear-gradient(135deg, rgba(110, 136, 167, .16), rgba(43, 129, 169, .12));
            overflow: hidden;
            position: relative;
        }

        body.jobhub-search-page .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(520px 240px at 95% -10%, rgba(31, 117, 216, .16), transparent 60%);
            pointer-events: none;
        }

        body.jobhub-search-page .hero-inner {
            position: relative;
            padding: 16px;
            display: grid;
            grid-template-columns: 1.2fr .8fr;
            gap: 14px;
            align-items: center;
        }

        @media (max-width: 980px) {
            body.jobhub-search-page .hero-inner {
                grid-template-columns: 1fr;
            }
        }

        body.jobhub-search-page .hero-kicker {
            display: inline-flex;
            gap: 10px;
            align-items: center;
            font-weight: 900;
            color: rgba(15, 23, 42, .72);
            font-size: 12px;
        }

        body.jobhub-search-page .hero-kicker .dot {
            width: 8px;
            height: 8px;
            border-radius: 99px;
            background: linear-gradient(90deg, var(--blue2), var(--blue));
            box-shadow: 0 10px 22px rgba(15, 23, 42, .18);
        }

        body.jobhub-search-page .hero h1 {
            margin: 8px 0 0;
            font-family: "Montserrat", sans-serif;
            font-size: 22px;
            font-weight: 900;
            letter-spacing: .2px;
        }

        body.jobhub-search-page .hero p {
            margin: 8px 0 0;
            max-width: 70ch;
            color: var(--muted);
            font-weight: 800;
            line-height: 1.35;
            font-size: 13px;
        }

        body.jobhub-search-page .hero-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: flex-end;
            align-items: center;
        }

        @media (max-width: 980px) {
            body.jobhub-search-page .hero-actions {
                justify-content: flex-start;
            }
        }

        body.jobhub-search-page .btn {
            height: 42px;
            padding: 0 16px;
            border-radius: 999px;
            border: 1px solid rgba(15, 23, 42, .10);
            background: rgba(255, 255, 255, .92);
            color: rgba(15, 23, 42, .92);
            font-weight: 900;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: var(--shadow2);
            text-decoration: none;
            transition: transform .12s ease, filter .12s ease;
            white-space: nowrap;
        }

        body.jobhub-search-page .btn:hover {
            transform: translateY(-1px);
            filter: brightness(1.01);
        }

        body.jobhub-search-page .btn.primary {
            border: 0;
            color: #fff;
            background: linear-gradient(90deg, var(--blue2), var(--blue));
        }

        body.jobhub-search-page .btn.danger {
            border: 0;
            color: #fff;
            background: linear-gradient(90deg, rgba(239, 68, 68, .95), rgba(239, 68, 68, .70));
        }

        body.jobhub-search-page .select {
            height: 42px;
            padding: 0 14px;
            border-radius: 999px;
            border: 1px solid rgba(15, 23, 42, .12);
            background: rgba(255, 255, 255, .96);
            box-shadow: var(--shadow2);
            font-weight: 900;
            color: rgba(15, 23, 42, .88);
            cursor: pointer;
            outline: none;
        }

        body.jobhub-search-page .grid {
            margin-top: 14px;
            display: grid;
            grid-template-columns: 360px minmax(0, 1fr);
            gap: 14px;
            align-items: start;
        }

        @media (max-width: 1100px) {
            body.jobhub-search-page .grid {
                grid-template-columns: 1fr;
            }
        }

        body.jobhub-search-page .filters {
            position: sticky;
            top: 92px;
            align-self: start;
            background: var(--card);
            border: 1px solid rgba(15, 23, 42, .08);
            border-radius: var(--r-xl);
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        @media (max-width: 1100px) {
            body.jobhub-search-page .filters {
                position: fixed;
                top: 0;
                bottom: 0;
                left: -110%;
                z-index: 999999;
                border-radius: 0;
                width: min(520px, 94vw);
                height: 100dvh;
                /* melhor no mobile */
                max-height: 100dvh;
                transition: left .22s ease;
                /* anima pelo left */
                overflow: hidden;
                /* mantém o corpo “recortado” */
                display: flex;
                flex-direction: column;
            }

            body.jobhub-search-page .filters.is-open {
                left: 0;
            }

            body.jobhub-search-page .filters-head {
                flex: 0 0 auto;
            }

            body.jobhub-search-page .filters-body {
                flex: 1 1 auto;
                min-height: 0;
                /* ESSENCIAL pro scroll no flex */
                overflow-y: auto;
                -webkit-overflow-scrolling: touch;
                overscroll-behavior: contain;
                touch-action: pan-y;
                padding-bottom: calc(12px + env(safe-area-inset-bottom));
            }
        }


        body.jobhub-search-page .filters-head {
            padding: 14px 14px 12px;
            border-bottom: 1px solid rgba(15, 23, 42, .08);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            flex-wrap: wrap;
        }

        body.jobhub-search-page .filters-head h2 {
            margin: 0;
            font-size: 14px;
            font-weight: 900;
            font-family: "Montserrat", sans-serif;
            display: inline-flex;
            gap: 10px;
            align-items: center;
        }

        body.jobhub-search-page .filters-body {
            padding: 12px;
            display: grid;
            gap: 12px;
        }

        body.jobhub-search-page .fsec {
            border: 1px solid rgba(15, 23, 42, .08);
            background: rgba(255, 255, 255, .90);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 24px rgba(15, 23, 42, .06);
        }

        body.jobhub-search-page .fsec summary {
            list-style: none;
            cursor: pointer;
            padding: 12px 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            font-weight: 900;
            font-size: 13px;
            color: rgba(15, 23, 42, .92);
        }

        body.jobhub-search-page .fsec summary::-webkit-details-marker {
            display: none;
        }

        body.jobhub-search-page .fsec .body {
            padding: 0 12px 12px;
            display: grid;
            gap: 10px;
        }

        body.jobhub-search-page .label {
            font-size: 12px;
            font-weight: 900;
            color: rgba(15, 23, 42, .72);
        }

        body.jobhub-search-page .input {
            height: 44px;
            border-radius: 14px;
            border: 1px solid rgba(15, 23, 42, .12);
            background: #fff;
            padding: 0 12px;
            font-weight: 800;
            outline: none;
        }

        body.jobhub-search-page .input:focus {
            border-color: rgba(31, 117, 216, .40);
            box-shadow: 0 0 0 4px rgba(31, 117, 216, .12);
        }

        body.jobhub-search-page .chipset {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center;
        }

        body.jobhub-search-page .chip {
            border-radius: 999px;
            padding: 8px 10px;
            font-size: 12px;
            border: 1px solid rgba(148, 163, 184, .78);
            background: #fff;
            color: rgba(15, 23, 42, .86);
            cursor: pointer;
            font-weight: 900;
            display: inline-flex;
            gap: 8px;
            align-items: center;
            user-select: none;
            transition: transform .12s ease, background .12s ease, border-color .12s ease;
            white-space: nowrap;
        }

        body.jobhub-search-page .chip:hover {
            transform: translateY(-1px);
        }

        body.jobhub-search-page .chip.is-on {
            border-color: rgba(31, 117, 216, .30);
            background: rgba(31, 117, 216, .10);
            color: rgba(15, 23, 42, .92);
        }

        body.jobhub-search-page .check {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 10px;
            border-radius: 14px;
            border: 1px solid rgba(15, 23, 42, .08);
            background: rgba(255, 255, 255, .92);
            cursor: pointer;
            user-select: none;
        }

        body.jobhub-search-page .check input {
            accent-color: var(--accent);
        }

        body.jobhub-search-page .check span {
            font-weight: 900;
            font-size: 13px;
            color: rgba(15, 23, 42, .90);
        }

        body.jobhub-search-page .rangeBox {
            border: 1px solid rgba(15, 23, 42, .08);
            background: rgba(15, 23, 42, .03);
            border-radius: 16px;
            padding: 10px;
            display: grid;
            gap: 10px;
        }

        body.jobhub-search-page .pill {
            border-radius: 999px;
            padding: 7px 10px;
            font-size: 12px;
            border: 1px solid rgba(15, 23, 42, .10);
            background: rgba(15, 23, 42, .03);
            color: rgba(15, 23, 42, .86);
            font-weight: 900;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        body.jobhub-search-page .rangeTop {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
        }

        body.jobhub-search-page .rangeTop .pill {
            background: rgba(255, 255, 255, .92);
        }

        body.jobhub-search-page .rangeInputs {
            display: grid;
            gap: 10px;
        }

        body.jobhub-search-page .rangeInputs input {
            height: 44px;
            border-radius: 14px;
            border: 1px solid rgba(15, 23, 42, .12);
            background: #fff;
            padding: 0 12px;
            font-weight: 900;
            outline: none;
        }

        body.jobhub-search-page .dualRange {
            position: relative;
            height: 28px;
            display: grid;
            place-items: center;
        }

        body.jobhub-search-page .dualRange input[type="range"] {
            position: absolute;
            width: 100%;
            pointer-events: none;
            appearance: none;
            height: 6px;
            border-radius: 999px;
            background: rgba(15, 23, 42, .10);
            outline: none;
        }

        body.jobhub-search-page .dualRange input[type="range"]::-webkit-slider-thumb {
            appearance: none;
            pointer-events: auto;
            width: 18px;
            height: 18px;
            border-radius: 999px;
            background: linear-gradient(90deg, var(--blue2), var(--blue));
            border: 2px solid rgba(255, 255, 255, .9);
            box-shadow: 0 10px 20px rgba(15, 23, 42, .18);
            cursor: pointer;
        }

        body.jobhub-search-page .overlay {
            position: fixed;
            inset: 0;
            background: rgba(2, 6, 23, .55);
            opacity: 0;
            pointer-events: none;
            transition: opacity .22s ease;
            z-index: 999998;
        }

        body.jobhub-search-page .overlay.is-on {
            opacity: 1;
            pointer-events: auto;
        }

        body.jobhub-search-page .results {
            display: grid;
            gap: 14px;
            min-width: 0;
        }

        body.jobhub-search-page .kpis {
            background: var(--card);
            border: 1px solid rgba(15, 23, 42, .08);
            border-radius: var(--r-xl);
            box-shadow: var(--shadow);
            padding: 14px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
        }

        body.jobhub-search-page .kpiBox {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            align-items: center;
        }

        body.jobhub-search-page .kpi {
            display: grid;
            gap: 4px;
            padding: 10px 12px;
            border-radius: 16px;
            border: 1px solid rgba(15, 23, 42, .08);
            background: rgba(255, 255, 255, .92);
            box-shadow: 0 10px 24px rgba(15, 23, 42, .06);
            min-width: 160px;
        }

        body.jobhub-search-page .kpi small {
            font-weight: 900;
            color: rgba(15, 23, 42, .64);
            font-size: 12px;
        }

        body.jobhub-search-page .kpi strong {
            font-weight: 900;
            font-size: 14px;
            font-family: "Montserrat", sans-serif;
            color: rgba(15, 23, 42, .92);
        }

        body.jobhub-search-page .applied {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center;
            justify-content: flex-end;
            min-width: 240px;
        }

        body.jobhub-search-page .viewBar {
            display: flex;
            gap: 10px;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        body.jobhub-search-page .viewModes {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        body.jobhub-search-page .modeBtn {
            height: 40px;
            padding: 0 12px;
            border-radius: 999px;
            border: 1px solid rgba(15, 23, 42, .10);
            background: rgba(255, 255, 255, .92);
            font-weight: 900;
            cursor: pointer;
            box-shadow: var(--shadow2);
            display: inline-flex;
            gap: 8px;
            align-items: center;
        }

        body.jobhub-search-page .modeBtn.is-on {
            border-color: rgba(31, 117, 216, .28);
            background: rgba(31, 117, 216, .10);
        }

        body.jobhub-search-page .cards {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        @media (max-width: 980px) {
            body.jobhub-search-page .cards {
                grid-template-columns: 1fr;
            }
        }

        body.jobhub-search-page .cards.list {
            grid-template-columns: 1fr;
        }

        body.jobhub-search-page .card {
            background: rgba(255, 255, 255, .96);
            border: 1px solid rgba(15, 23, 42, .08);
            border-radius: var(--r-xl);
            box-shadow: 0 16px 44px rgba(15, 23, 42, .10);
            overflow: hidden;
            cursor: pointer;
            transition: transform .12s ease, box-shadow .12s ease, border-color .12s ease;
            position: relative;
        }

        body.jobhub-search-page .card:hover {
            transform: translateY(-1px);
            box-shadow: 0 22px 54px rgba(15, 23, 42, .14);
            border-color: rgba(31, 117, 216, .22);
        }

        body.jobhub-search-page .cardHead {
            padding: 14px 14px 10px;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 10px;
            border-bottom: 1px solid rgba(15, 23, 42, .08);
        }

        body.jobhub-search-page .cardTitle {
            margin: 0;
            font-size: 14px;
            font-weight: 900;
            line-height: 1.25;
            font-family: "Montserrat", sans-serif;
        }

        body.jobhub-search-page .cardSub {
            margin: 6px 0 0;
            color: rgba(15, 23, 42, .70);
            font-weight: 800;
            font-size: 12px;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center;
        }

        body.jobhub-search-page .dot2 {
            width: 6px;
            height: 6px;
            border-radius: 99px;
            background: rgba(15, 23, 42, .25);
            display: inline-block;
        }

        body.jobhub-search-page .cardBody {
            padding: 12px 14px 14px;
            display: grid;
            gap: 10px;
        }

        body.jobhub-search-page .tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center;
        }

        body.jobhub-search-page .tag {
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

        body.jobhub-search-page .tag.blue {
            background: rgba(31, 117, 216, .10);
            border-color: rgba(31, 117, 216, .22);
        }

        body.jobhub-search-page .tag.green {
            background: rgba(34, 197, 94, .10);
            border-color: rgba(34, 197, 94, .20);
        }

        body.jobhub-search-page .tag.red {
            background: rgba(239, 68, 68, .10);
            border-color: rgba(239, 68, 68, .20);
        }

        body.jobhub-search-page .excerpt {
            font-size: 12.8px;
            color: rgba(15, 23, 42, .76);
            font-weight: 800;
            line-height: 1.45;
            min-height: 40px;
        }

        body.jobhub-search-page .cardFoot {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid rgba(15, 23, 42, .08);
            padding: 12px 14px;
            background: rgba(15, 23, 42, .02);
        }

        body.jobhub-search-page .metaSmall {
            font-size: 12px;
            font-weight: 900;
            color: rgba(15, 23, 42, .62);
            display: inline-flex;
            gap: 8px;
            align-items: center;
            flex-wrap: wrap;
        }

        body.jobhub-search-page .more {
            height: 44px;
            border-radius: 999px;
            border: 0;
            cursor: pointer;
            font-weight: 900;
            color: #fff;
            background: linear-gradient(90deg, var(--blue2), var(--blue));
            box-shadow: var(--shadow2);
            display: none;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }

        body.jobhub-search-page .empty {
            background: rgba(255, 255, 255, .92);
            border: 1px dashed rgba(15, 23, 42, .18);
            border-radius: var(--r-xl);
            padding: 14px;
            font-weight: 900;
            color: rgba(15, 23, 42, .70);
            display: none;
        }

        /* Drawer */
        body.jobhub-search-page .drawerOverlay {
            position: fixed;
            inset: 0;
            background: rgba(2, 6, 23, .55);
            opacity: 0;
            pointer-events: none;
            transition: opacity .18s ease;
            z-index: 999997;
        }

        body.jobhub-search-page .drawerOverlay.is-on {
            opacity: 1;
            pointer-events: auto;
        }

        body.jobhub-search-page .drawer {
            position: fixed;
            top: 0;
            right: -110%;
            width: min(620px, 96vw);
            height: 100vh;
            background: rgba(255, 255, 255, .98);
            border-left: 1px solid rgba(15, 23, 42, .10);
            box-shadow: 0 26px 90px rgba(15, 23, 42, .30);
            z-index: 999998;
            transition: right .20s ease;
            display: grid;
            grid-template-rows: auto 1fr auto;
        }

        body.jobhub-search-page .drawer.is-on {
            right: 0;
        }

        body.jobhub-search-page .drawerHead {
            padding: 14px 14px 12px;
            border-bottom: 1px solid rgba(15, 23, 42, .08);
            display: flex;
            gap: 10px;
            align-items: flex-start;
            justify-content: space-between;
        }

        body.jobhub-search-page .drawerTitle {
            margin: 0;
            font-size: 16px;
            font-weight: 900;
            line-height: 1.2;
            font-family: "Montserrat", sans-serif;
        }

        body.jobhub-search-page .drawerClose {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            border: 1px solid rgba(15, 23, 42, .10);
            background: rgba(255, 255, 255, .92);
            cursor: pointer;
            display: grid;
            place-items: center;
            box-shadow: 0 10px 22px rgba(15, 23, 42, .08);
        }

        body.jobhub-search-page .drawerBody {
            padding: 12px 14px;
            overflow: auto;
            display: grid;
            gap: 12px;
        }

        body.jobhub-search-page .dsec {
            border: 1px solid rgba(15, 23, 42, .08);
            background: rgba(255, 255, 255, .92);
            border-radius: 18px;
            padding: 12px;
            box-shadow: 0 12px 30px rgba(15, 23, 42, .07);
            display: grid;
            gap: 8px;
        }

        body.jobhub-search-page .dsec h3 {
            margin: 0;
            font-size: 13px;
            font-weight: 900;
            display: inline-flex;
            gap: 8px;
            align-items: center;
        }

        body.jobhub-search-page .dsec p {
            margin: 0;
            font-size: 13px;
            font-weight: 800;
            color: rgba(15, 23, 42, .76);
            white-space: pre-wrap;
            line-height: 1.55;
        }

        body.jobhub-search-page .dlist {
            margin: 0;
            padding-left: 18px;
            display: grid;
            gap: 6px;
            color: rgba(15, 23, 42, .76);
            font-weight: 850;
            font-size: 13px;
            line-height: 1.45;
        }

        body.jobhub-search-page .dgrid {
            display: grid;
            gap: 10px;
            grid-template-columns: 1fr 1fr;
        }

        @media (max-width: 520px) {
            body.jobhub-search-page .dgrid {
                grid-template-columns: 1fr;
            }
        }

        body.jobhub-search-page .ditem {
            border: 1px solid rgba(15, 23, 42, .08);
            background: rgba(15, 23, 42, .02);
            border-radius: 14px;
            padding: 10px;
            display: grid;
            gap: 4px;
        }

        body.jobhub-search-page .ditem small {
            font-weight: 900;
            color: rgba(15, 23, 42, .60);
            font-size: 11px;
        }

        body.jobhub-search-page .ditem strong {
            font-weight: 900;
            color: rgba(15, 23, 42, .90);
            font-size: 12.5px;
        }

        body.jobhub-search-page .drawerFoot {
            padding: 12px 14px 14px;
            border-top: 1px solid rgba(15, 23, 42, .08);
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: flex-end;
            background: rgba(15, 23, 42, .02);
        }

        /* Skeleton */
        body.jobhub-search-page .sk {
            border-radius: 16px;
            background: linear-gradient(90deg, rgba(15, 23, 42, .06), rgba(15, 23, 42, .10), rgba(15, 23, 42, .06));
            background-size: 180% 100%;
            animation: sk 1.1s ease infinite;
        }

        @keyframes sk {
            0% {
                background-position: 0% 0;
            }

            100% {
                background-position: 180% 0;
            }
        }

        body.jobhub-search-page .skCard {
            height: 220px;
            border-radius: var(--r-xl);
            border: 1px solid rgba(15, 23, 42, .06);
        }

        body.jobhub-search-page .skLine {
            height: 12px;
            border-radius: 999px;
        }

        /* Mobile: botões de filtros aparecem */
        body.jobhub-search-page #btnOpenFilters {
            display: none;
        }

        body.jobhub-search-page #btnCloseFilters {
            display: none;
        }

        body.jobhub-search-page #btnApply {
            display: none;
        }

        @media (max-width: 1100px) {
            body.jobhub-search-page #btnOpenFilters {
                display: inline-flex;
            }

            body.jobhub-search-page #btnCloseFilters {
                display: inline-flex;
            }

            body.jobhub-search-page #btnApply {
                display: inline-flex;
            }
        }

        /* Toast */
        body.jobhub-search-page .toast {
            position: fixed;
            left: 16px;
            bottom: 16px;
            z-index: 1000001;
            max-width: min(520px, calc(100vw - 32px));
            background: rgba(255, 255, 255, .96);
            border: 1px solid rgba(15, 23, 42, .12);
            box-shadow: 0 20px 60px rgba(15, 23, 42, .20);
            border-radius: 18px;
            padding: 12px 12px;
            display: none;
            gap: 10px;
            align-items: flex-start;
        }

        body.jobhub-search-page .toast.is-on {
            display: flex;
        }

        body.jobhub-search-page .toast i {
            margin-top: 2px;
        }

        body.jobhub-search-page .toast strong {
            display: block;
            font-weight: 900;
            font-family: "Montserrat", sans-serif;
            font-size: 13px;
            margin-bottom: 2px;
        }

        body.jobhub-search-page .toast p {
            margin: 0;
            font-weight: 800;
            color: rgba(15, 23, 42, .74);
            font-size: 12.5px;
            line-height: 1.35;
        }

        body.jobhub-search-page .toast .x {
            margin-left: auto;
            border: 0;
            background: transparent;
            cursor: pointer;
            font-weight: 900;
            opacity: .7;
        }
    </style>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800;900&family=Inter:wght@500;600;700&display=swap');

        /* =========================
   JobHub HEADER — ISOLADO
========================= */

        /* escopo total */
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

            position: relative;
            z-index: 9990;
            height: 100px;
            background: var(--jobhub-bg);
            border-bottom: 1px solid rgba(15, 23, 42, .06);
            box-shadow: 0 10px 30px rgba(15, 23, 42, .08);
            display: flex;
            align-items: center;
            font-family: "Montserrat", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
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
        }

        .jobhubH-logoImg {
            height: 115px;
            display: block;
        }

        /* DESKTOP NAV */
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
            background: #C4D9E5
        }

        .jobhubH-cta--cv {
            color: rgba(15, 23, 42, .92);
            border: 1px solid rgba(15, 23, 42, .10);
            background: linear-gradient(90deg, rgba(255, 255, 255, .9), rgba(255, 255, 255, 1));
        }

        /* MOBILE BURGER */
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

        /* =========================
   SUBMENU
========================= */
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

        /* =========================
   AUTH (Dropdown)
========================= */
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

        /* olho */
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

        /* =========================
   VIEW LOGADO
========================= */
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

        /* =========================
   MOBILE MENU
========================= */
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

        /* garante hidden sem depender de reset */
        .jobhubH-shell [hidden],
        .jobhubMM-overlay[hidden] {
            display: none !important;
        }

        /* ===== Scroll Header (sticky + efeito) ===== */
        .jobhubH-shell {
            position: sticky;
            top: 0;
            transition: transform .18s ease, box-shadow .18s ease, background .18s ease, height .18s ease, border-color .18s ease;
            will-change: transform;
        }

        /* quando rolou a página */
        .jobhubH-shell.is-scrolled {
            background: rgba(255, 255, 255, .88);
            backdrop-filter: blur(12px);
            border-bottom-color: rgba(15, 23, 42, .10);
            box-shadow: 0 18px 60px rgba(15, 23, 42, .16);
        }

        /* opcional: “some descendo / aparece subindo” */
        .jobhubH-shell.is-hidden {
            transform: translateY(-110%);
        }

        /* opcional: dá uma “encolhida” */
        .jobhubH-shell .jobhubH-logoImg {
            transition: height .18s ease;
        }

        .jobhubH-shell.is-scrolled .jobhubH-logoImg {
            height: 90px;
            /* era 64px */
        }

        body.jobhub-search-page .btn.disabled,
        body.jobhub-search-page .btn:disabled {
            opacity: .6;
            cursor: not-allowed;
            pointer-events: none;
        }
    </style>

</head>

<body class="jobhub-search-page">
    <?php require_once("templates/header.php") ?>
    <!-- MOBILE SEARCH BAR (somente mobile) -->
    <div class="jobhub-mobile-search" id="mobileSearchBar" aria-label="Pesquisa de vagas">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input id="qMobile" type="search" placeholder="Pesquisar vaga (cargo, empresa, cidade...)" autocomplete="off" />
        <button id="qMobileClear" type="button" title="Limpar">✕</button>
    </div>


    <div class="toast" id="toast" role="status" aria-live="polite"></div>

    <main class="wrap">
        <section class="hero" aria-label="Pesquisar vagas">
            <div class="hero-inner">
                <div>
                    <div class="hero-kicker"><span class="dot"></span> JobHub Vagas e Currículos</div>
                    <h1>Encontre vagas com rapidez, sem complicar.</h1>
                    <p>Use filtros por salário, região, UF, cidade e contrato. Clique na vaga para ver os detalhes completos e candidatar.</p>
                </div>

                <div class="hero-actions">
                    <button class="btn" id="btnOpenFilters" type="button">
                        <i class="fa-solid fa-sliders"></i> Filtros
                    </button>

                    <select class="select" id="sortBy" aria-label="Ordenação">
                        <option value="recomendadas">Recomendadas</option>
                        <option value="recentes">Mais recentes</option>
                        <option value="salario_desc">Maior salário</option>
                        <option value="salario_asc">Menor salário</option>
                        <option value="cidade_az">Cidade (A-Z)</option>
                    </select>
                </div>
            </div>
        </section>

        <div class="overlay" id="filtersOverlay"></div>

        <section class="grid">
            <!-- FILTERS -->
            <aside class="filters" id="filtersPanel" aria-label="Filtros">
                <div class="filters-head">
                    <h2><i class="fa-solid fa-sliders"></i> Filtros avançados</h2>

                    <div style="display:flex; gap:10px; flex-wrap:wrap; justify-content:flex-end; margin-left:auto;">
                        <button class="btn" id="btnCloseFilters" type="button" style="height:40px;padding:0 12px;">
                            <i class="fa-solid fa-xmark"></i> Fechar
                        </button>

                        <button class="btn" id="btnClear" type="button">
                            <i class="fa-solid fa-eraser"></i> Limpar
                        </button>

                        <button class="btn primary" id="btnApply" type="button">
                            <i class="fa-solid fa-check"></i> Aplicar
                        </button>
                    </div>
                </div>

                <div class="filters-body">
                    <details class="fsec" open>
                        <summary>
                            <span><i class="fa-solid fa-magnifying-glass"></i> Busca</span>
                            <i class="fa-solid fa-chevron-down" style="opacity:.6;"></i>
                        </summary>
                        <div class="body">
                            <div style="display:grid; gap:8px;">
                                <span class="label">Cargo, empresa, cidade, palavras-chave</span>
                                <input class="input" id="q" placeholder="Ex: Supervisor  Logística  São Paulo" autocomplete="off" />
                            </div>
                        </div>
                    </details>

                    <details class="fsec" open>
                        <summary>
                            <span><i class="fa-solid fa-map-location-dot"></i> Região / UF / Cidade</span>
                            <i class="fa-solid fa-chevron-down" style="opacity:.6;"></i>
                        </summary>
                        <div class="body">
                            <div style="display:grid; gap:8px;">
                                <span class="label">Regiões do Brasil</span>
                                <div class="chipset" id="regionsChips"></div>
                            </div>

                            <div style="display:grid; gap:8px;">
                                <span class="label">UF</span>
                                <select class="input" id="uf">
                                    <option value="">Todas</option>
                                </select>
                            </div>

                            <div style="display:grid; gap:8px;">
                                <span class="label">Cidade</span>
                                <select class="input" id="city">
                                    <option value="">Todas</option>
                                </select>
                            </div>

                            <div style="display:grid; gap:8px;">
                                <span class="label">Atalho rápido</span>
                                <div class="chipset" id="topCities"></div>
                            </div>
                        </div>
                    </details>

                    <details class="fsec" open>
                        <summary>
                            <span><i class="fa-solid fa-layer-group"></i> Categoria</span>
                            <i class="fa-solid fa-chevron-down" style="opacity:.6;"></i>
                        </summary>
                        <div class="body">
                            <div style="display:grid; gap:8px;">
                                <span class="label">Categoria da vaga</span>
                                <select class="input" id="category">
                                    <option value="">Todas</option>
                                </select>
                            </div>
                        </div>
                    </details>

                    <details class="fsec" open>
                        <summary>
                            <span><i class="fa-solid fa-sack-dollar"></i> Salário</span>
                            <i class="fa-solid fa-chevron-down" style="opacity:.6;"></i>
                        </summary>
                        <div class="body">
                            <div class="rangeBox">
                                <div class="rangeTop">
                                    <span class="pill"><i class="fa-solid fa-money-bill-wave"></i> Faixa</span>
                                    <span class="pill" id="salaryPill">—</span>
                                </div>

                                <div class="rangeInputs">
                                    <input id="salaryMinInput" inputmode="numeric" placeholder="Mín (ex: 2000)" />
                                    <input id="salaryMaxInput" inputmode="numeric" placeholder="Máx (ex: 8000)" />
                                </div>

                                <div class="dualRange" aria-label="Slider de salário">
                                    <input type="range" id="salaryMin" min="0" max="20000" step="100" value="0" />
                                    <input type="range" id="salaryMax" min="0" max="20000" step="100" value="20000" />
                                </div>

                                <label class="check" style="margin:0;">
                                    <input type="checkbox" id="includeNoSalary" checked />
                                    <span>Incluir “salário a combinar”</span>
                                </label>
                            </div>
                        </div>
                    </details>

                    <details class="fsec" open>
                        <summary>
                            <span><i class="fa-regular fa-clipboard"></i> Contrato</span>
                            <i class="fa-solid fa-chevron-down" style="opacity:.6;"></i>
                        </summary>
                        <div class="body">
                            <div id="contractChecks" style="display:grid; gap:8px;"></div>
                        </div>
                    </details>

                </div>

                <div class="filters-foot"></div>
            </aside>

            <!-- RESULTS -->
            <section class="results">
                <section class="kpis" aria-label="Resumo">
                    <div class="kpiBox">
                        <div class="kpi">
                            <small>Vagas exibidas</small>
                            <strong id="kpiShown">—</strong>
                        </div>
                        <div class="kpi">
                            <small>Total no site</small>
                            <strong id="kpiTotal">—</strong>
                        </div>
                        <div class="kpi">
                            <small>Top região</small>
                            <strong id="kpiRegion">—</strong>
                        </div>
                    </div>

                    <div class="applied" id="appliedChips"></div>
                </section>

                <div class="viewBar">
                    <div class="metaSmall" id="statusLine">
                        <i class="fa-solid fa-signal"></i> Carregando vagas…
                    </div>

                    <div class="viewModes">
                        <button class="modeBtn is-on" id="modeGrid" type="button"><i class="fa-solid fa-grip"></i> Grid</button>
                        <button class="modeBtn" id="modeList" type="button"><i class="fa-solid fa-list"></i> Lista</button>
                    </div>
                </div>

                <section class="cards" id="cards">
                    <div class="sk skCard"></div>
                    <div class="sk skCard"></div>
                    <div class="sk skCard"></div>
                    <div class="sk skCard"></div>
                </section>

                <button class="more" id="btnMore" type="button"><i class="fa-solid fa-plus"></i> Carregar mais</button>

                <div class="empty" id="emptyBox">
                    Nenhuma vaga encontrada com esses filtros. Tente outra região/UF/cidade, ajuste o salário ou limpe a busca.
                </div>
            </section>
        </section>
    </main>

    <!-- DRAWER (DETALHE) -->
    <div class="drawerOverlay" id="drawerOverlay"></div>
    <aside class="drawer" id="drawer" aria-label="Detalhes da vaga">
        <div class="drawerHead">
            <div style="min-width:0;">
                <p style="margin:0;font-weight:900;color:rgba(15,23,42,.65);font-size:12px;" id="dKicker">Detalhes da vaga</p>
                <h2 class="drawerTitle" id="dTitle">—</h2>
                <div class="tags" id="dTags" style="margin-top:10px;"></div>
            </div>

            <button class="drawerClose" id="drawerClose" type="button" aria-label="Fechar">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="drawerBody" id="drawerBody">


            <!-- Descrição -->
            <div class="dsec">
                <h3><i class="fa-regular fa-file-lines"></i> Sobre a vaga</h3>
                <p id="dDesc">—</p>
            </div>

            <!-- Responsabilidades -->
            <div class="dsec" id="secResp" style="display:none;">
                <h3 id="hResp"><i class="fa-solid fa-list-check"></i> Responsabilidades</h3>
                <ul class="dlist" id="dResp"></ul>
            </div>

            <!-- Requisitos -->
            <div class="dsec" id="secReq" style="display:none;">
                <h3><i class="fa-solid fa-circle-check"></i> Requisitos</h3>
                <ul class="dlist" id="dReq"></ul>
            </div>

            <!-- Formação/Experiência -->
            <div class="dsec" id="secForm" style="display:none;">
                <h3><i class="fa-solid fa-graduation-cap"></i> Formação e experiência</h3>
                <div class="dgrid" id="dFormGrid"></div>
            </div>

            <!-- Idiomas -->
            <div class="dsec" id="secIdiomas" style="display:none;">
                <h3><i class="fa-solid fa-language"></i> Idiomas</h3>
                <ul class="dlist" id="dIdiomas"></ul>
            </div>

            <!-- Preferências -->
            <div class="dsec" id="secPrefs" style="display:none;">
                <h3><i class="fa-solid fa-sliders"></i> Preferências / Restrições</h3>
                <ul class="dlist" id="dPrefs"></ul>
            </div>

            <!-- Endereço -->
            <div class="dsec">
                <h3><i class="fa-solid fa-location-dot"></i> Endereço</h3>
                <p id="dAddr">—</p>
            </div>

            <!-- Benefícios -->
            <div class="dsec" id="secBenefits" style="display:none;">
                <h3><i class="fa-solid fa-gift"></i> Benefícios</h3>
                <ul class="dlist" id="dBenefits"></ul>
            </div>

            <!-- Publicação -->
            <div class="dsec">
                <h3><i class="fa-regular fa-clock"></i> Publicação</h3>
                <p id="dPub">—</p>
            </div>

            <!-- Loading do detalhe -->
            <div class="dsec" id="secLoading" style="display:none;">
                <h3><i class="fa-solid fa-wand-magic-sparkles"></i> Carregando detalhes</h3>
                <div style="display:grid; gap:10px;">
                    <div class="sk skLine" style="width:88%;"></div>
                    <div class="sk skLine" style="width:76%;"></div>
                    <div class="sk skLine" style="width:92%;"></div>
                </div>
            </div>
        </div>

        <div class="drawerFoot">
            <a style="display: none;" class="btn" id="dOpen" href="#" target="_self" rel="noopener">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> Abrir vaga
            </a>

            <!-- ✅ botão inteligente -->
            <button class="btn primary" id="dApply" type="button">
                <i class="fa-solid fa-paper-plane"></i> Candidatar agora
            </button>
        </div>
    </aside>

    <!-- MODAL CANDIDATURA (pre-candidaturas) -->
    <div class="drawerOverlay" id="applyOverlay" style="z-index:1000000;"></div>

    <aside class="drawer" id="applyModal" aria-label="Candidatura" style="z-index:1000001; width:min(620px, 96vw);">
        <div class="drawerHead">
            <div style="min-width:0;">
                <p style="margin:0;font-weight:900;color:rgba(15,23,42,.65);font-size:12px;">Candidatura</p>
                <h2 class="drawerTitle" id="applyTitle">Confirmar candidatura</h2>
                <div class="tags" style="margin-top:10px;">
                    <span class="tag blue"><i class="fa-solid fa-envelope"></i> Token por e-mail</span>
                    <span class="tag"><i class="fa-solid fa-shield-halved"></i> Verificação</span>
                </div>
            </div>

            <button class="drawerClose" id="applyClose" type="button" aria-label="Fechar">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="drawerBody" style="display:grid; gap:12px;">
            <div class="dsec">
                <h3><i class="fa-solid fa-briefcase"></i> Vaga</h3>
                <p id="applyVagaResumo">—</p>
            </div>

            <div class="dsec">
                <h3><i class="fa-regular fa-envelope"></i> E-mail do candidato</h3>
                <input class="input" id="applyEmail" type="email" placeholder="seuemail@dominio.com" autocomplete="email" />
                <p style="margin:8px 0 0; font-weight:800; color:rgba(15,23,42,.70); font-size:12px;">
                    Vamos enviar um token para este e-mail.
                </p>
            </div>

            <div class="dsec">
                <h3><i class="fa-solid fa-key"></i> Token</h3>
                <input class="input" id="applyToken" placeholder="Digite o token recebido" inputmode="numeric" />
                <p id="applyStatus" style="margin:8px 0 0; font-weight:900; color:rgba(15,23,42,.70); font-size:12px;">—</p>
            </div>
        </div>

        <div class="drawerFoot" style="display:flex; gap:10px; flex-wrap:wrap; justify-content:flex-end;">
            <button class="btn" id="btnSendToken" type="button">
                <i class="fa-solid fa-envelope-circle-check"></i> Enviar token
            </button>

            <button class="btn" id="btnValidateToken" type="button">
                <i class="fa-solid fa-shield-halved"></i> Validar token
            </button>

            <button class="btn primary" id="btnConfirmApply" type="button">
                <i class="fa-solid fa-check"></i> Confirmar candidatura
            </button>
        </div>
    </aside>

    <!-- ✅ 1) CONFIG (deixe só este) -->
    <script>
        window.JobHub_API_BASE = window.JobHub_API_BASE || <?= api_base_json() ?>;

        // Endpoints públicos (lista)
        window.JobHub_PUBLIC_ENDPOINTS = window.JobHub_PUBLIC_ENDPOINTS || ["/vagas/list"];

        // Tentativas de detalhe por ID (não quebra se não existir)
        window.JobHub_DETAIL_ENDPOINTS = window.JobHub_DETAIL_ENDPOINTS || [
            "/vagas/{id}"
        ];

        // Rotas do FRONT (PHP)
        window.JobHub_ROUTES = Object.assign({
            HOME: "<?= URL_BASE ?>",
            LOGIN: "<?= URL_BASE ?>inicio",
            CADASTRO_CANDIDATO: "<?= URL_BASE ?>cadastrar/candidato",
            PERFIL_CANDIDATO: "<?= URL_BASE ?>candidato/perfil",
            PERFIL_EMPRESA: "<?= URL_BASE ?>recrutador/perfil",
            CANDIDATO_AREA: "<?= URL_BASE ?>candidato",
            EMPRESA_AREA: "<?= URL_BASE ?>recrutador",
            // página de detalhe no seu site (se existir)
            VAGA_VIEW: "<?= URL_BASE ?>vaga/{id}"
        }, (window.JobHub_ROUTES || {}));
    </script>

    <script>
        (() => {
            "use strict";

            // ✅ evita dupla inicialização (principalmente quando header injeta scripts também)
            if (window.__JobHub_SEARCH_V2_INIT__ === true) return;
            window.__JobHub_SEARCH_V2_INIT__ = true;

            // =========================
            // CONFIG (usa os globals que você já tem)
            // =========================
            const API_BASE = window.JobHub_API_BASE || "";
            const LOCAL_BASE = String(window.URL_BASE || "/").replace(/\/?$/, "/");
            const LOCAL_APPLY_URL = `${LOCAL_BASE}api/candidaturas`;
            const ENDPOINTS = Array.isArray(window.JobHub_PUBLIC_ENDPOINTS) ? window.JobHub_PUBLIC_ENDPOINTS : ["/vagas/list"];
            const DETAIL_ENDPOINTS = Array.isArray(window.JobHub_DETAIL_ENDPOINTS) ? window.JobHub_DETAIL_ENDPOINTS : [];
            const ROUTES = window.JobHub_ROUTES || {};

            const $ = (s, el = document) => el.querySelector(s);

            // =========================
            // ✅ NUNCA TRAVA SCROLL (remove qualquer lock preso)
            // =========================
            function forceUnlockScroll() {
                try {
                    document.documentElement.style.overflow = "";
                    document.body.style.overflow = "";
                    document.body.style.position = "";
                    document.body.style.top = "";
                    document.body.style.left = "";
                    document.body.style.right = "";
                    document.body.style.width = "";
                } catch (_) {}
            }

            // roda já e também no load (failsafe)
            forceUnlockScroll();
            window.addEventListener("pageshow", forceUnlockScroll);
            window.addEventListener("load", forceUnlockScroll);

            // =========================
            // Helpers
            // =========================
            const clamp = (n, a, b) => Math.max(a, Math.min(b, n));
            const safeText = (v, fb = "—") => {
                const s = String(v ?? "").trim();
                return s ? s : fb;
            };

            function toBoolLike(value) {
                if (value === true || value === 1) return true;

                const s = String(value ?? "").trim().toLowerCase();
                return [
                    "true", "1", "sim", "yes", "y", "s",
                    "urgente", "alta", "alta prioridade"
                ].includes(s);
            }

            function isAppliedVaga(vaga) {
                return appliedIds.has(String(getVagaId(vaga) || ""));
            }

            function pickUrgenteRaw(v) {
                return (
                    v?.contratacaoUrgente ??
                    v?.urgente ??
                    v?.vagaUrgente ??
                    v?.contratacao_urgente ??
                    v?.flags?.contratacaoUrgente ??
                    v?.flags?.urgente ??
                    v?.vaga?.contratacaoUrgente ??
                    v?.vaga?.urgente ??
                    v?.detalhe?.contratacaoUrgente ??
                    v?.detalhe?.urgente ??
                    false
                );
            }

            function esc(str) {
                return String(str ?? "")
                    .replaceAll("&", "&amp;")
                    .replaceAll("<", "&lt;")
                    .replaceAll(">", "&gt;")
                    .replaceAll('"', "&quot;")
                    .replaceAll("'", "&#039;");
            }
            const toNumber = (v) => {
                const x = Number(String(v || "").replace(/[^\d]/g, ""));
                return Number.isFinite(x) ? x : 0;
            };
            const norm = (s) =>
                String(s ?? "")
                .normalize("NFD").replace(/[\u0300-\u036f]/g, "")
                .trim().toUpperCase();

            const SEARCH_SYNONYMS = {
                ADMINISTRATIVO: [
                    "ADMINISTRATIVO",
                    "ASSISTENTE ADMINISTRATIVO",
                    "AUXILIAR ADMINISTRATIVO",
                    "ANALISTA ADMINISTRATIVO",
                    "APRENDIZ ADMINISTRATIVO",
                    "SECRETARIA",
                    "SECRETARIADO",
                    "ESCRITORIO",
                    "ESCRITÓRIO",
                    "ROTINAS ADMINISTRATIVAS",
                    "AUXILIAR DE ESCRITORIO",
                    "AUXILIAR DE ESCRITÓRIO",
                    "RECEPCIONISTA",
                    "ATENDENTE ADMINISTRATIVO",
                    "OFFICE BOY",
                    "BACKOFFICE",
                    "BACK OFFICE"
                ],

                FINANCEIRO: [
                    "FINANCEIRO",
                    "ASSISTENTE FINANCEIRO",
                    "AUXILIAR FINANCEIRO",
                    "ANALISTA FINANCEIRO",
                    "CONTAS A PAGAR",
                    "CONTAS A RECEBER",
                    "TESOURARIA",
                    "FATURAMENTO",
                    "COBRANCA",
                    "COBRANÇA",
                    "CONTROLADORIA",
                    "CONTROLLER",
                    "FLUXO DE CAIXA",
                    "PLANEJAMENTO FINANCEIRO",
                    "CUSTOS"
                ],

                CONTABIL: [
                    "CONTABIL",
                    "CONTÁBIL",
                    "CONTABILIDADE",
                    "CONTADOR",
                    "CONTADORA",
                    "ASSISTENTE CONTABIL",
                    "ASSISTENTE CONTÁBIL",
                    "ANALISTA CONTABIL",
                    "ANALISTA CONTÁBIL",
                    "FISCAL CONTABIL",
                    "ESCRITA FISCAL",
                    "TRIBUTARIO",
                    "TRIBUTÁRIO",
                    "APURACAO DE IMPOSTOS",
                    "APURAÇÃO DE IMPOSTOS"
                ],

                RH: [
                    "RH",
                    "RECURSOS HUMANOS",
                    "DEPARTAMENTO PESSOAL",
                    "DP",
                    "RECRUTAMENTO",
                    "SELECAO",
                    "SELEÇÃO",
                    "TALENTOS",
                    "BUSINESS PARTNER",
                    "R&S",
                    "TREINAMENTO",
                    "DESENVOLVIMENTO HUMANO",
                    "BENEFICIOS",
                    "BENEFÍCIOS",
                    "FOLHA DE PAGAMENTO"
                ],

                COMERCIAL: [
                    "COMERCIAL",
                    "EXECUTIVO DE CONTAS",
                    "CONSULTOR COMERCIAL",
                    "CONSULTORA COMERCIAL",
                    "REPRESENTANTE COMERCIAL",
                    "GERENTE COMERCIAL",
                    "COORDENADOR COMERCIAL",
                    "PROSPECÇÃO",
                    "PROSPECCAO",
                    "NEGOCIACAO",
                    "NEGOCIAÇÃO",
                    "B2B",
                    "B2C"
                ],

                VENDAS: [
                    "VENDAS",
                    "VENDEDOR",
                    "VENDEDORA",
                    "PROMOTOR DE VENDAS",
                    "CONSULTOR DE VENDAS",
                    "CONSULTORA DE VENDAS",
                    "ATENDENTE DE LOJA",
                    "OPERADOR DE CAIXA",
                    "CAIXA",
                    "GERENTE DE LOJA",
                    "SUBGERENTE",
                    "BALCONISTA",
                    "TELEVENDAS",
                    "POS VENDAS",
                    "PÓS VENDAS"
                ],

                MARKETING: [
                    "MARKETING",
                    "ANALISTA DE MARKETING",
                    "ASSISTENTE DE MARKETING",
                    "MARKETING DIGITAL",
                    "SOCIAL MEDIA",
                    "MIDIAS SOCIAIS",
                    "MÍDIAS SOCIAIS",
                    "COPYWRITER",
                    "TRAFEGO PAGO",
                    "TRÁFEGO PAGO",
                    "SEO",
                    "CRM",
                    "ENDOMARKETING",
                    "DESIGN GRAFICO",
                    "DESIGN GRÁFICO",
                    "BRANDING",
                    "COMUNICACAO",
                    "COMUNICAÇÃO"
                ],

                TECNOLOGIA: [
                    "TECNOLOGIA",
                    "TI",
                    "T.I",
                    "INFORMATICA",
                    "INFORMÁTICA",
                    "DESENVOLVEDOR",
                    "DESENVOLVEDORA",
                    "PROGRAMADOR",
                    "PROGRAMADORA",
                    "ENGENHEIRO DE SOFTWARE",
                    "ENGENHEIRA DE SOFTWARE",
                    "ANALISTA DE SISTEMAS",
                    "ARQUITETO DE SOFTWARE",
                    "BACKEND",
                    "FRONTEND",
                    "FULL STACK",
                    "FULLSTACK",
                    "DEV",
                    "QA",
                    "TESTES",
                    "TESTER",
                    "SUPORTE TECNICO",
                    "SUPORTE TÉCNICO",
                    "SERVICE DESK",
                    "HELP DESK",
                    "INFRAESTRUTURA",
                    "REDES",
                    "BANCO DE DADOS",
                    "DBA",
                    "DEVOPS",
                    "SRE",
                    "CLOUD",
                    "SEGURANCA DA INFORMACAO",
                    "SEGURANÇA DA INFORMAÇÃO",
                    "CIBERSEGURANCA",
                    "CIBERSEGURANÇA",
                    "DADOS",
                    "DATA",
                    "CIENTISTA DE DADOS",
                    "ANALISTA DE DADOS",
                    "ENGENHEIRO DE DADOS",
                    "BI",
                    "POWER BI",
                    "JAVA",
                    "PHP",
                    "PYTHON",
                    "JAVASCRIPT",
                    "REACT",
                    "NODE",
                    "SPRING",
                    "MYSQL"
                ],

                LOGISTICA: [
                    "LOGISTICA",
                    "LOGÍSTICA",
                    "ESTOQUE",
                    "ALMOXARIFADO",
                    "ALMOXARIFE",
                    "EXPEDICAO",
                    "EXPEDIÇÃO",
                    "CONFERENTE",
                    "SEPARADOR",
                    "SEPARACAO",
                    "SEPARAÇÃO",
                    "INVENTARIO",
                    "INVENTÁRIO",
                    "OPERADOR LOGISTICO",
                    "OPERADOR LOGÍSTICO",
                    "AUXILIAR DE LOGISTICA",
                    "AUXILIAR DE LOGÍSTICA",
                    "CADEIA DE SUPRIMENTOS",
                    "SUPPLY CHAIN",
                    "DISTRIBUICAO",
                    "DISTRIBUIÇÃO"
                ],

                TRANSPORTE: [
                    "TRANSPORTE",
                    "MOTORISTA",
                    "MOTORISTA ENTREGADOR",
                    "MOTORISTA DE CAMINHAO",
                    "MOTORISTA DE CAMINHÃO",
                    "ENTREGADOR",
                    "AJUDANTE DE MOTORISTA",
                    "CARRETEIRO",
                    "LOGISTICA DE TRANSPORTE",
                    "FROTA"
                ],

                PRODUCAO: [
                    "PRODUCAO",
                    "PRODUÇÃO",
                    "AUXILIAR DE PRODUCAO",
                    "AUXILIAR DE PRODUÇÃO",
                    "OPERADOR DE MAQUINA",
                    "OPERADOR DE MÁQUINA",
                    "OPERADOR DE PRODUCAO",
                    "OPERADOR DE PRODUÇÃO",
                    "INDUSTRIA",
                    "INDÚSTRIA",
                    "CHAO DE FABRICA",
                    "CHÃO DE FÁBRICA",
                    "LINHA DE PRODUCAO",
                    "LINHA DE PRODUÇÃO",
                    "MONTADOR",
                    "MONTAGEM",
                    "PROCESSOS INDUSTRIAIS"
                ],

                QUALIDADE: [
                    "QUALIDADE",
                    "CONTROLE DE QUALIDADE",
                    "GARANTIA DA QUALIDADE",
                    "INSPETOR DE QUALIDADE",
                    "ANALISTA DE QUALIDADE",
                    "AUDITORIA",
                    "ISO",
                    "MELHORIA CONTINUA",
                    "MELHORIA CONTÍNUA"
                ],

                ENGENHARIA: [
                    "ENGENHARIA",
                    "ENGENHEIRO",
                    "ENGENHEIRA",
                    "ENGENHEIRO CIVIL",
                    "ENGENHEIRO MECANICO",
                    "ENGENHEIRO MECÂNICO",
                    "ENGENHEIRO ELETRICISTA",
                    "ENGENHEIRO ELETRICO",
                    "ENGENHEIRO ELÉTRICO",
                    "ENGENHEIRO DE PRODUCAO",
                    "ENGENHEIRO DE PRODUÇÃO",
                    "ENGENHEIRO DE PROCESSOS",
                    "PROJETISTA",
                    "AUTOCAD",
                    "SOLIDWORKS"
                ],

                CONSTRUCAO_CIVIL: [
                    "CONSTRUCAO CIVIL",
                    "CONSTRUÇÃO CIVIL",
                    "PEDREIRO",
                    "SERVENTE",
                    "MESTRE DE OBRAS",
                    "ENCARREGADO DE OBRAS",
                    "ARMADOR",
                    "CARPINTEIRO",
                    "ELETRICISTA DE OBRA",
                    "PINTOR",
                    "AZULEJISTA",
                    "GESSEIRO",
                    "OBRA",
                    "OBRAS"
                ],

                MANUTENCAO: [
                    "MANUTENCAO",
                    "MANUTENÇÃO",
                    "MECANICO",
                    "MECÂNICO",
                    "ELETROMECANICO",
                    "ELETROMECÂNICO",
                    "ELETRICISTA",
                    "TECNICO DE MANUTENCAO",
                    "TÉCNICO DE MANUTENÇÃO",
                    "MANUTENCAO PREDIAL",
                    "MANUTENÇÃO PREDIAL",
                    "REFRIGERACAO",
                    "REFRIGERAÇÃO",
                    "PCM"
                ],

                JURIDICO: [
                    "JURIDICO",
                    "JURÍDICO",
                    "ADVOGADO",
                    "ADVOGADA",
                    "ASSISTENTE JURIDICO",
                    "ASSISTENTE JURÍDICO",
                    "ANALISTA JURIDICO",
                    "ANALISTA JURÍDICO",
                    "PARALEGAL",
                    "CONTENCIOSO",
                    "CONTRATOS",
                    "TRABALHISTA",
                    "CIVIL",
                    "TRIBUTARIO",
                    "TRIBUTÁRIO",
                    "COMPLIANCE JURIDICO",
                    "COMPLIANCE JURÍDICO"
                ],

                COMPLIANCE: [
                    "COMPLIANCE",
                    "GOVERNANCA",
                    "GOVERNANÇA",
                    "CONTROLES INTERNOS",
                    "RISCO",
                    "RISCOS",
                    "AUDITORIA INTERNA",
                    "LGPD"
                ],

                SAUDE: [
                    "SAUDE",
                    "SAÚDE",
                    "ENFERMAGEM",
                    "ENFERMEIRO",
                    "ENFERMEIRA",
                    "TECNICO DE ENFERMAGEM",
                    "TÉCNICO DE ENFERMAGEM",
                    "CUIDADOR",
                    "CUIDADORA",
                    "FISIOTERAPIA",
                    "PSICOLOGIA",
                    "NUTRICAO",
                    "NUTRIÇÃO",
                    "TERAPEUTA",
                    "FONOAUDIOLOGO",
                    "FONOAUDIÓLOGO",
                    "BIOMEDICO",
                    "BIOMÉDICO",
                    "LABORATORIO",
                    "LABORATÓRIO",
                    "CLINICA",
                    "CLÍNICA",
                    "HOSPITAL"
                ],

                ODONTOLOGIA: [
                    "ODONTOLOGIA",
                    "DENTISTA",
                    "ODONTOLOGISTA",
                    "AUXILIAR DE SAUDE BUCAL",
                    "AUXILIAR DE SAÚDE BUCAL",
                    "ASB",
                    "TSB",
                    "CLINICA ODONTOLOGICA",
                    "CLÍNICA ODONTOLÓGICA"
                ],

                FARMACIA: [
                    "FARMACIA",
                    "FARMÁCIA",
                    "FARMACEUTICO",
                    "FARMACÊUTICO",
                    "BALCONISTA DE FARMACIA",
                    "BALCONISTA DE FARMÁCIA",
                    "DROGARIA"
                ],

                EDUCACAO: [
                    "EDUCACAO",
                    "EDUCAÇÃO",
                    "PROFESSOR",
                    "PROFESSORA",
                    "DOCENTE",
                    "PEDAGOGO",
                    "PEDAGOGA",
                    "PEDAGOGIA",
                    "COORDENADOR PEDAGOGICO",
                    "COORDENADOR PEDAGÓGICO",
                    "INSTRUTOR",
                    "INSTRUTORA",
                    "MONITOR",
                    "MONITORA",
                    "ESCOLA",
                    "CRECHE"
                ],

                SEGURANCA: [
                    "SEGURANCA",
                    "SEGURANÇA",
                    "VIGILANTE",
                    "PORTEIRO",
                    "CONTROLADOR DE ACESSO",
                    "FISCAL DE PATRIMONIO",
                    "FISCAL DE PATRIMÔNIO",
                    "MONITORAMENTO",
                    "CFTV"
                ],

                LIMPEZA: [
                    "LIMPEZA",
                    "AUXILIAR DE LIMPEZA",
                    "SERVICOS GERAIS",
                    "SERVIÇOS GERAIS",
                    "FAXINEIRO",
                    "FAXINEIRA",
                    "COPEIRA",
                    "ZELADOR",
                    "HIGIENIZACAO",
                    "HIGIENIZAÇÃO"
                ],

                HOTELARIA_TURISMO: [
                    "HOTELARIA",
                    "TURISMO",
                    "HOTEL",
                    "POUSADA",
                    "RECEPCIONISTA DE HOTEL",
                    "CAMAREIRA",
                    "CAMAREIRO",
                    "GARCOM",
                    "GARÇOM",
                    "GARCONETE",
                    "HOSTESS",
                    "RESERVAS"
                ],

                ALIMENTACAO: [
                    "ALIMENTACAO",
                    "ALIMENTAÇÃO",
                    "COZINHA",
                    "COZINHEIRO",
                    "COZINHEIRA",
                    "AUXILIAR DE COZINHA",
                    "CHAPEIRO",
                    "PIZZAIOLO",
                    "CONFEITEIRO",
                    "CONFEITEIRA",
                    "PADEIRO",
                    "PADEIRA",
                    "ATENDENTE DE LANCHONETE",
                    "RESTAURANTE",
                    "BAR",
                    "BUFFET"
                ],

                AGRONEGOCIO: [
                    "AGRONEGOCIO",
                    "AGRONEGÓCIO",
                    "AGRO",
                    "AGRICOLA",
                    "AGRÍCOLA",
                    "FAZENDA",
                    "PECUARIA",
                    "PECUÁRIA",
                    "TRATORISTA",
                    "OPERADOR AGRICOLA",
                    "OPERADOR AGRÍCOLA",
                    "TECNICO AGRICOLA",
                    "TÉCNICO AGRÍCOLA",
                    "VETERINARIO",
                    "VETERINÁRIA",
                    "ZOOTECNIA"
                ],

                ATENDIMENTO: [
                    "ATENDIMENTO",
                    "ATENDENTE",
                    "SAC",
                    "SUPORTE AO CLIENTE",
                    "RELACIONAMENTO COM CLIENTE",
                    "CUSTOMER SUCCESS",
                    "CUSTOMER SERVICE",
                    "CALL CENTER",
                    "TELEATENDIMENTO",
                    "OPERADOR DE TELEMARKETING"
                ],

                PRIMEIRO_EMPREGO: [
                    "PRIMEIRO EMPREGO",
                    "JOVEM APRENDIZ",
                    "APRENDIZ",
                    "SEM EXPERIENCIA",
                    "SEM EXPERIÊNCIA",
                    "ESTAGIO",
                    "ESTÁGIO",
                    "TRAINEE"
                ]
            };

            function resolveTemplate(template, params) {
                let out = String(template || "");
                for (const [k, val] of Object.entries(params || {})) out = out.replaceAll(`{${k}}`, String(val));
                return out;
            }

            function getVagaId(v) {
                return v?.id ?? v?.idVaga ?? v?.vagaId ?? v?.id_vaga ?? null;
            }

            // token helpers (mantém porque algumas rotas podem exigir Bearer)
            function decodeJwtPayload(token) {
                try {
                    const part = token.split(".")[1];
                    if (!part) return null;
                    const base64 = part.replace(/-/g, "+").replace(/_/g, "/");
                    const json = decodeURIComponent(
                        atob(base64).split("").map(c => "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2)).join("")
                    );
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

            function getToken() {
                return (
                    localStorage.getItem("token") ||
                    localStorage.getItem("access_token") ||
                    localStorage.getItem("jwt") ||
                    ""
                );
            }

            function getStoredRole() {
                const rawRole = String(localStorage.getItem("role") || "").toUpperCase();
                if (rawRole) return rawRole;
                try {
                    const sess = JSON.parse(sessionStorage.getItem("empresaDemo.session.v1") || "null");
                    return String(sess?.role || sess?.user?.role || "").toUpperCase();
                } catch (_) {
                    return "";
                }
            }

            function safeJsonParse(raw) {
                try {
                    return raw ? JSON.parse(raw) : null;
                } catch (_) {
                    return null;
                }
            }

            function pickCandidateId(me, jwt) {
                const vals = [
                    me?.idCandidato, me?.candidatoId, me?.id, me?.id_candidato,
                    jwt?.idCandidato, jwt?.candidatoId,
                    localStorage.getItem("candidato_id")
                ];
                for (const v of vals) {
                    const n = Number(v);
                    if (Number.isFinite(n) && n > 0) return n;
                }
                return null;
            }

            async function fetchCandidateContext() {
                const token = getToken();
                const jwt = decodeJwtPayload(token) || {};
                const cached = safeJsonParse(localStorage.getItem("candidato_me")) || safeJsonParse(localStorage.getItem("me")) || {};
                let me = cached;
                let candidatoId = pickCandidateId(me, jwt);
                let email = String(me?.email || jwt?.sub || "").trim();

                if ((!candidatoId || !email) && token && !isTokenExpired(token)) {
                    const paths = ["/candidato/me", "/candidatos/me", "/me"];
                    for (const p of paths) {
                        try {
                            const data = await apiJSON(`${API_BASE}${p}`, {
                                method: "GET",
                                tryAuth: true
                            });
                            if (data && typeof data === "object") {
                                me = data;
                                localStorage.setItem("candidato_me", JSON.stringify(data));
                                candidatoId = pickCandidateId(data, jwt) || candidatoId;
                                email = String(data?.email || jwt?.sub || email || "").trim();
                                break;
                            }
                        } catch (_) {}
                    }
                }

                if (candidatoId) localStorage.setItem("candidato_id", String(candidatoId));
                return {
                    candidatoId,
                    email,
                    me,
                    jwt
                };
            }

            const APPLIED_KEY = "empresaDemo.applied.v1";
            const appliedIds = new Set();
            let appliedStorageKey = "";

            function buildAppliedStorageKey(candidatoId) {
                const id = Number(candidatoId || 0);
                return Number.isFinite(id) && id > 0 ? `${APPLIED_KEY}:candidato:${id}` : "";
            }

            function canUseAppliedState(ctx = null) {
                const token = getToken();
                if (!token || isTokenExpired(token)) return false;

                const role = getStoredRole();
                if (role === "RECRUTADOR" || role === "EMPRESA") return false;

                const candidatoId = Number(ctx?.candidatoId || localStorage.getItem("candidato_id") || 0);
                return Number.isFinite(candidatoId) && candidatoId > 0;
            }

            function readLocalAppliedIds(key = appliedStorageKey) {
                if (!key) return [];
                try {
                    const arr = JSON.parse(localStorage.getItem(key) || "[]");
                    return Array.isArray(arr) ?
                        arr.map(id => String(id ?? "").trim()).filter(Boolean) : [];
                } catch (_) {
                    return [];
                }
            }

            function persistAppliedIds() {
                if (!appliedStorageKey) return;
                try {
                    localStorage.setItem(appliedStorageKey, JSON.stringify([...appliedIds]));
                } catch (_) {}
            }

            function extractAppliedVagaId(item) {
                const candidates = [
                    item?.idVaga,
                    item?.vagaId,
                    item?.id_vaga,
                    item?.vaga?.idVaga,
                    item?.vaga?.vagaId,
                    item?.vaga?.id_vaga,
                    item?.vaga?.id,
                    item?.preCandidatura?.idVaga,
                    item?.preCandidatura?.vagaId,
                    item?.preCandidatura?.vaga?.idVaga,
                    item?.preCandidatura?.vaga?.vagaId,
                    item?.preCandidatura?.vaga?.id
                ];
                for (const raw of candidates) {
                    const id = Number(raw);
                    if (Number.isFinite(id) && id > 0) return String(id);
                }
                return "";
            }

            function rememberAppliedVaga(id) {
                if (id == null || id === "") return;
                appliedIds.add(String(id));
                persistAppliedIds();
            }
            async function hydrateAppliedVagaIds() {
                appliedIds.clear();
                appliedStorageKey = "";

                const ctx = await fetchCandidateContext();
                if (!canUseAppliedState(ctx)) return;

                appliedStorageKey = buildAppliedStorageKey(ctx?.candidatoId);
                readLocalAppliedIds(appliedStorageKey).forEach(id => appliedIds.add(id));
            }
            async function tryDirectApply(vagaId) {
                const token = getToken();
                const ctx = await fetchCandidateContext();
                const idNum = Number(vagaId || 0);
                if (!ctx.candidatoId || !idNum) {
                    return {
                        ok: false,
                        message: "Não consegui identificar seu cadastro de candidato."
                    };
                }

                const attempts = [{
                        url: `${API_BASE}/candidaturas`,
                        body: {
                            candidatoId: Number(ctx.candidatoId),
                            vagaId: idNum
                        }
                    },
                    {
                        url: `${API_BASE}/candidaturas`,
                        body: {
                            idCandidato: Number(ctx.candidatoId),
                            idVaga: idNum
                        }
                    }
                ];

                let lastErr = null;
                for (const a of attempts) {
                    try {
                        const resp = await fetch(a.url, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json",
                                ...(token ? {
                                    Authorization: `Bearer ${token}`
                                } : {})
                            },
                            body: JSON.stringify(a.body)
                        });

                        if (resp.status === 404) continue;
                        const raw = await resp.text().catch(() => "");
                        let data = null;
                        try {
                            data = raw ? JSON.parse(raw) : null;
                        } catch (_) {
                            data = raw;
                        }

                        if (resp.ok) return {
                            ok: true,
                            already: false,
                            data,
                            context: ctx
                        };
                        if (resp.status === 409 || resp.status === 208 || /ja se candidatou|já se candidatou/i.test(String(raw || data?.message || data?.error || ""))) {
                            return {
                                ok: true,
                                already: true,
                                data,
                                context: ctx
                            };
                        }
                        if (resp.status === 400 || resp.status === 401 || resp.status === 403) {
                            const msg = (data && (data.message || data.mensagem || data.error || data.detail)) || raw || `HTTP ${resp.status}`;
                            return {
                                ok: false,
                                code: resp.status,
                                message: msg,
                                context: ctx
                            };
                        }
                        lastErr = new Error((data && (data.message || data.error)) || raw || `HTTP ${resp.status}`);
                    } catch (e) {
                        lastErr = e;
                    }
                }
                return {
                    ok: false,
                    message: String(lastErr?.message || "Não foi possível enviar sua candidatura agora."),
                    context: ctx
                };
            }

            async function syncLocalApplication(vagaId) {
                const token = getToken();
                const idNum = Number(vagaId || 0);
                if (!token || !idNum) return {
                    ok: false,
                    ignored: true
                };
                try {
                    const resp = await fetch(LOCAL_APPLY_URL, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            Authorization: `Bearer ${token}`
                        },
                        body: JSON.stringify({
                            vaga_id: idNum
                        })
                    });
                    const raw = await resp.text().catch(() => "");
                    let data = null;
                    try {
                        data = raw ? JSON.parse(raw) : null;
                    } catch (_) {
                        data = raw;
                    }
                    if (resp.ok) return {
                        ok: true,
                        data
                    };
                    if (resp.status === 409 || /ja se candidatou|já se candidatou/i.test(String(raw || data?.message || data?.error || ""))) {
                        return {
                            ok: true,
                            already: true,
                            data
                        };
                    }
                    return {
                        ok: false,
                        status: resp.status,
                        message: (data && (data.message || data.error || data.detail)) || raw || `HTTP ${resp.status}`
                    };
                } catch (e) {
                    return {
                        ok: false,
                        message: String(e?.message || e)
                    };
                }
            }

            function requireCandidateForApply() {
                const role = getStoredRole();
                const token = getToken();
                if (!token || isTokenExpired(token)) {
                    showToast({
                        title: "Cadastre-se para se candidatar",
                        message: "Para se candidatar, faça seu cadastro de candidato primeiro.",
                        type: "error"
                    });
                    window.location.href = ROUTES.CADASTRO_CANDIDATO || (window.URL_BASE || "/") + "cadastrar/candidato";
                    return false;
                }
                if (role === "RECRUTADOR" || role === "EMPRESA") {
                    showToast({
                        title: "Candidatura indisponível",
                        message: "Recrutadores não podem se candidatar às vagas. Entre com uma conta de candidato.",
                        type: "error"
                    });
                    return false;
                }
                return true;
            }

            // =========================
            // API JSON (com fallback Bearer)
            // =========================
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

                const token = getToken();
                if (tryAuth && (resp.status === 401 || resp.status === 403) && token && !isTokenExpired(token)) {
                    resp = await fetch(url, {
                        method,
                        headers: {
                            ...headers,
                            Authorization: `Bearer ${token}`
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
                        (Array.isArray(data?.errors) && data.errors[0]?.defaultMessage) ? data.errors[0].defaultMessage :
                        (typeof data === "string" && data.trim()) ? data :
                        `HTTP ${resp.status}`;
                    throw new Error(msg);
                }
                return data;
            }

            async function fetchFromEndpoint(endpoint) {
                return await apiJSON(`${API_BASE}${endpoint}`, {
                    method: "GET",
                    tryAuth: true
                });
            }

            function extractList(payload) {
                if (Array.isArray(payload)) return payload;
                const keys = ["vagas", "vagasPublicas", "vagas_publicas", "jobs", "listaVagas", "content", "data", "results", "items"];
                for (const k of keys)
                    if (Array.isArray(payload?.[k])) return payload[k];

                // fallback: procura array dentro do objeto (até 3 níveis)
                const seen = new Set();

                function walk(obj, depth) {
                    if (!obj || typeof obj !== "object" || depth > 3) return null;
                    if (seen.has(obj)) return null;
                    seen.add(obj);
                    for (const v of Object.values(obj)) {
                        if (Array.isArray(v)) return v;
                        if (v && typeof v === "object") {
                            const found = walk(v, depth + 1);
                            if (found) return found;
                        }
                    }
                    return null;
                }
                const found = walk(payload, 0);
                return Array.isArray(found) ? found : [];
            }

            async function fetchAllVagas() {
                let lastErr = null;
                for (const ep of ENDPOINTS) {
                    try {
                        const payload = await fetchFromEndpoint(ep);
                        const list = extractList(payload);
                        return Array.isArray(list) ? list : [];
                    } catch (e) {
                        lastErr = e;
                    }
                }
                throw lastErr || new Error("Não foi possível buscar vagas.");
            }

            async function fetchVagaDetalhe(id) {
                if (!id) return null;
                let lastErr = null;
                for (const tpl of DETAIL_ENDPOINTS) {
                    const endpoint = resolveTemplate(tpl, {
                        id
                    });
                    try {
                        const payload = await fetchFromEndpoint(endpoint);
                        if (payload && typeof payload === "object") return payload;
                    } catch (e) {
                        lastErr = e;
                    }
                }
                return null;
            }

            // =========================
            // UI: Toast (se existir #toast)
            // =========================
            const toast = $("#toast");
            let toastTimer = null;

            function hideToast() {
                if (!toast) return;
                toast.classList.remove("is-on");
            }

            function showToast({
                title = "Aviso",
                message = "",
                type = "info"
            } = {}) {
                if (!toast) return;
                const icon =
                    type === "success" ? "fa-circle-check" :
                    type === "error" ? "fa-triangle-exclamation" :
                    type === "warn" ? "fa-circle-exclamation" :
                    "fa-circle-info";

                toast.innerHTML = `
      <i class="fa-solid ${icon}" style="opacity:.85;"></i>
      <div style="min-width:0;">
        <strong>${esc(title)}</strong>
        <p>${esc(message)}</p>
      </div>
      <button class="x" type="button" aria-label="Fechar">✕</button>
    `;
                toast.classList.add("is-on");
                toast.querySelector(".x")?.addEventListener("click", hideToast, {
                    once: true
                });

                clearTimeout(toastTimer);
                toastTimer = setTimeout(hideToast, 3800);
            }

            // =========================
            // App principal (SEM nada de header)
            // =========================
            document.addEventListener("DOMContentLoaded", async () => {
                // se não for a página (segurança)
                const cards = $("#cards");
                if (!cards) return;

                // DOM
                const btnOpenFilters = $("#btnOpenFilters");
                const btnCloseFilters = $("#btnCloseFilters");
                const filtersOverlay = $("#filtersOverlay");
                const filtersPanel = $("#filtersPanel");

                const qDesktop = $("#q");
                const qMobile = $("#qMobile");
                const qMobileClear = $("#qMobileClear");

                // mantém compatível: "q" vira o que existir
                const q = qDesktop || qMobile;

                function setQuery(val) {
                    const v = String(val || "");
                    filters.q = v;
                    if (qDesktop && document.activeElement !== qDesktop) qDesktop.value = v;
                    if (qMobile && document.activeElement !== qMobile) qMobile.value = v;
                    requestApply();
                }

                qDesktop?.addEventListener("input", () => setQuery(qDesktop.value));
                qMobile?.addEventListener("input", () => setQuery(qMobile.value));

                qMobileClear?.addEventListener("click", () => {
                    setQuery("");
                    qMobile?.focus();
                });
                const sortBy = $("#sortBy");

                const regionsChips = $("#regionsChips");
                const uf = $("#uf");
                const city = $("#city");
                const category = $("#category");
                const topCities = $("#topCities");

                const salaryPill = $("#salaryPill");
                const salaryMin = $("#salaryMin");
                const salaryMax = $("#salaryMax");
                const salaryMinInput = $("#salaryMinInput");
                const salaryMaxInput = $("#salaryMaxInput");
                const includeNoSalary = $("#includeNoSalary");

                const contractChecks = $("#contractChecks");
                const onlyUrgent = $("#onlyUrgent");
                const hideConfidential = $("#hideConfidential");
                const hideApplied = $("#hideApplied");

                const btnClear = $("#btnClear");
                const btnApply = $("#btnApply");

                const kpiShown = $("#kpiShown");
                const kpiTotal = $("#kpiTotal");
                const kpiRegion = $("#kpiRegion");
                const appliedChips = $("#appliedChips");

                const btnMore = $("#btnMore");
                const emptyBox = $("#emptyBox");
                const statusLine = $("#statusLine");

                const modeGrid = $("#modeGrid");
                const modeList = $("#modeList");

                // drawer
                const drawer = $("#drawer");
                const drawerOverlay = $("#drawerOverlay");
                const drawerClose = $("#drawerClose");

                const dTitle = $("#dTitle");
                const dTags = $("#dTags");
                const dDesc = $("#dDesc");
                const dAddr = $("#dAddr");
                const dPub = $("#dPub");
                const dOpen = $("#dOpen");
                const dApply = $("#dApply");

                const secEmpresa = $("#secEmpresa");
                const dEmpresa = $("#dEmpresa");

                const dResumoEmpresa = $("#dResumoEmpresa");
                const dResumoLocal = $("#dResumoLocal");
                const dResumoContrato = $("#dResumoContrato");
                const dResumoSalario = $("#dResumoSalario");

                const secResp = $("#secResp");
                const hResp = $("#hResp");
                const dResp = $("#dResp");

                const secReq = $("#secReq");
                const dReq = $("#dReq");

                const secForm = $("#secForm");
                const dFormGrid = $("#dFormGrid");

                const secIdiomas = $("#secIdiomas");
                const dIdiomas = $("#dIdiomas");

                const secPrefs = $("#secPrefs");
                const dPrefs = $("#dPrefs");

                const secBenefits = $("#secBenefits");
                const dBenefits = $("#dBenefits");

                const secLoading = $("#secLoading");

                // apply modal
                const applyOverlay = $("#applyOverlay");
                const applyModal = $("#applyModal");
                const applyClose = $("#applyClose");
                const applyTitle = $("#applyTitle");
                const applyVagaResumo = $("#applyVagaResumo");
                const applyEmail = $("#applyEmail");
                const applyToken = $("#applyToken");
                const applyStatus = $("#applyStatus");
                const btnSendToken = $("#btnSendToken");
                const btnValidateToken = $("#btnValidateToken");
                const btnConfirmApply = $("#btnConfirmApply");

                // ✅ overlays: garantir que não ficam prendendo clique
                function closeAllOverlays() {
                    filtersPanel?.classList.remove("is-open");
                    filtersOverlay?.classList.remove("is-on");

                    drawer?.classList.remove("is-on");
                    drawerOverlay?.classList.remove("is-on");

                    applyModal?.classList.remove("is-on");
                    applyOverlay?.classList.remove("is-on");

                    forceUnlockScroll();
                }

                closeAllOverlays();

                // =========================
                // Estado
                // =========================
                const brl = new Intl.NumberFormat("pt-BR", {
                    style: "currency",
                    currency: "BRL"
                });

                const UF_REGION = {
                    "AC": "Norte",
                    "AL": "Nordeste",
                    "AP": "Norte",
                    "AM": "Norte",
                    "BA": "Nordeste",
                    "CE": "Nordeste",
                    "DF": "Centro-Oeste",
                    "ES": "Sudeste",
                    "GO": "Centro-Oeste",
                    "MA": "Nordeste",
                    "MT": "Centro-Oeste",
                    "MS": "Centro-Oeste",
                    "MG": "Sudeste",
                    "PA": "Norte",
                    "PB": "Nordeste",
                    "PR": "Sul",
                    "PE": "Nordeste",
                    "PI": "Nordeste",
                    "RJ": "Sudeste",
                    "RN": "Nordeste",
                    "RS": "Sul",
                    "RO": "Norte",
                    "RR": "Norte",
                    "SC": "Sul",
                    "SP": "Sudeste",
                    "SE": "Nordeste",
                    "TO": "Norte"
                };
                const REGIONS = ["Norte", "Nordeste", "Centro-Oeste", "Sudeste", "Sul"];

                let all = [];
                let view = [];
                let pageSize = 10;
                let page = 1;
                let current = null;
                let viewMode = "grid";
                let currentDetailUrl = "#";

                const filters = {
                    q: "",
                    regions: new Set(),
                    uf: "",
                    city: "",
                    category: "",
                    salaryMin: 0,
                    salaryMax: 20000,
                    includeNoSalary: true,
                    contracts: new Set(),
                    onlyUrgent: false,
                    hideConfidential: false,
                    hideApplied: false,
                    sortBy: "recomendadas",
                };

                // =========================
                // Normalização vaga
                // =========================
                function cityUf(v) {
                    const c = String(v?.localizacao?.cidade || v?.cidade || "").trim();
                    const u = String(v?.localizacao?.estado || v?.estado || "").trim();
                    if (c && u) return `${c}/${u}`;
                    return c || u || "—";
                }

                function cardLocation(v) {
                    const cu = cityUf(v);
                    if (v?.empresaConfidencial) return cu !== "—" ? cu : "Local confidencial";
                    const bairro = String(v?.localizacao?.bairro || "").trim();
                    return [bairro, cu].filter(Boolean).join("  ") || cu || "—";
                }

                function getMaxSal(v) {
                    const max = Number(v?.salarioMax);
                    const min = Number(v?.salarioMin);
                    if (Number.isFinite(max) && max > 0) return max;
                    if (Number.isFinite(min) && min > 0) return min;
                    const s = Number(v?.salario);
                    if (Number.isFinite(s) && s > 0) return s;
                    return null;
                }

                function getSalarioTexto(v) {
                    const min = Number(v?.salarioMin);
                    const max = Number(v?.salarioMax);
                    const s = Number(v?.salario);

                    const hasMin = Number.isFinite(min) && min > 0;
                    const hasMax = Number.isFinite(max) && max > 0;
                    const hasS = Number.isFinite(s) && s > 0;

                    if (hasMin && hasMax && min !== max) return `De ${brl.format(min)} a ${brl.format(max)}`;
                    if (hasMax) return `Até ${brl.format(max)}`;
                    if (hasMin) return brl.format(min);
                    if (hasS) return brl.format(s);
                    return "Salário a combinar";
                }

                function enderecoCompleto(v) {
                    const loc = v?.localizacao || {};
                    const cu = cityUf(v);

                    if (v?.empresaConfidencial) {
                        return cu !== "—" ? `Local confidencial\nCidade/UF: ${cu}` : "Local confidencial";
                    }

                    const rua = [loc?.rua, loc?.numero].filter(Boolean).join(", ");
                    const comp = loc?.complemento ? ` (${loc.complemento})` : "";
                    const out = [];

                    if (rua) out.push(`Endereço: ${rua}${comp}`);
                    if (loc?.bairro) out.push(`Bairro: ${loc.bairro}`);
                    if (cu && cu !== "—") out.push(`Cidade/UF: ${cu}`);
                    if (loc?.cep) out.push(`CEP: ${loc.cep}`);

                    return out.join("\n") || "—";
                }

                function normalizeForSearch(v) {
                    const loc = v?.localizacao || {};

                    return norm([
                        v.titulo,
                        v.cargo,
                        v.complemento,
                        String(v.categoria || "").replaceAll("_", " "),
                        v.empresa,
                        v.descricao,
                        v.cidade,
                        v.estado,
                        v.tipoContrato,
                        v.modalidadeVagaDTO,
                        loc.rua,
                        loc.bairro,
                        loc.cidade,
                        loc.estado,
                        loc.cep
                    ].filter(Boolean).join(" "));
                }

                function expandQueryTerms(query) {
                    const q = norm(query);
                    if (!q) return [];

                    const terms = new Set([q]);

                    for (const [category, words] of Object.entries(SEARCH_SYNONYMS)) {
                        const normalizedWords = words.map(norm);

                        if (normalizedWords.some(w => q.includes(w) || w.includes(q))) {
                            terms.add(norm(category));
                            normalizedWords.forEach(w => terms.add(w));
                        }
                    }

                    return [...terms];
                }

                function matchesSemanticQuery(vaga, query) {
                    const hay = vaga.__hay || (vaga.__hay = normalizeForSearch(vaga));
                    const terms = expandQueryTerms(query);

                    if (!terms.length) return true;

                    return terms.some(term => hay.includes(term));
                }

                function normalizeVagaApi(v) {
                    const empresaDTO = v?.empresaDTO || v?.empresa || null;

                    const empresaConfidencial = !!v?.empresaConfidencial || !!empresaDTO?.empresaConfidencial || false;

                    const empresaNome =
                        empresaDTO?.empresaNome ||
                        empresaDTO?.nome ||
                        empresaDTO?.razaoSocial ||
                        empresaDTO?.nomeFantasia ||
                        (typeof v?.empresa === "string" ? v.empresa : "") ||
                        v?.nomeEmpresa ||
                        v?.razaoSocial ||
                        v?.empresaNome ||
                        "";

                    const empresa = empresaConfidencial ? "Confidencial" : (empresaNome || "Empresa não informada");

                    const loc = v?.localizacao || v?.endereco || null;
                    const cidade = (v?.cidade || loc?.cidade || "") || "";
                    const estado = (v?.estado || loc?.estado || v?.uf || "") || "";

                    const salarioValor = Number(v?.salarioValor);
                    const salario = Number(v?.salario);

                    const salarioMin = Number.isFinite(Number(v?.salarioMin)) ? Number(v.salarioMin) :
                        (Number.isFinite(salarioValor) ? salarioValor : (Number.isFinite(salario) ? salario : null));

                    const salarioMax = Number.isFinite(Number(v?.salarioMax)) ? Number(v.salarioMax) :
                        (Number.isFinite(salarioValor) ? salarioValor : (Number.isFinite(salario) ? salario : null));

                    const cargo = v?.cargo || v?.titulo || "";
                    const complemento = v?.complemento || v?.complementoCargo || "";
                    const titulo = v?.titulo || [cargo, complemento].filter(Boolean).join(" - ") || "—";

                    const publicadaEm = v?.publicadaEm || v?.dataPublicacao || v?.criadaEm || v?.createdAt || null;

                    const ufUpper = norm(estado);
                    const region = UF_REGION[ufUpper] || "";
                    const categoria = String(v?.categoriaVagaDTO || v?.categoriaVaga || v?.categoria || "").trim();

                    const urgenteRaw = pickUrgenteRaw(v);

                    return {
                        ...v,
                        id: getVagaId(v),
                        titulo,
                        empresa,
                        empresaObj: (typeof empresaDTO === "object" ? empresaDTO : null),
                        cidade: String(cidade || "").trim(),
                        estado: ufUpper,
                        region,
                        tipoContrato: v?.tipoContrato || v?.contrato || v?.tipo || "",
                        categoria,
                        descricao: v?.descricao || v?.resumo || v?.detalhes || "",
                        salarioMin,
                        salarioMax,
                        publicadaEm,
                        contratacaoUrgente: toBoolLike(urgenteRaw),
                        empresaConfidencial,
                        localizacao: loc,
                        __hay: v.__hay || null,
                    };
                }

                // =========================
                // Filtros/sort
                // =========================
                function matchSalary(v) {
                    const minSel = Number(filters.salaryMin) || 0;
                    const maxSel = Number(filters.salaryMax) || 0;

                    const min = Number(v?.salarioMin);
                    const max = Number(v?.salarioMax);
                    const s = Number(v?.salario);

                    const hasMin = Number.isFinite(min) && min > 0;
                    const hasMax = Number.isFinite(max) && max > 0;
                    const hasS = Number.isFinite(s) && s > 0;

                    if (!hasMin && !hasMax && !hasS) return !!filters.includeNoSalary;

                    const a = hasMin ? min : (hasMax ? max : (hasS ? s : 0));
                    const b = hasMax ? max : (hasMin ? min : (hasS ? s : 0));

                    const left = Math.max(a, minSel);
                    const right = Math.min(b, maxSel);
                    return left <= right;
                }

                function sortList(list) {
                    const s = filters.sortBy;

                    if (s === "recentes") {
                        return [...list].sort((a, b) => (new Date(b.publicadaEm || 0)).getTime() - (new Date(a.publicadaEm || 0)).getTime());
                    }
                    if (s === "salario_desc") {
                        return [...list].sort((a, b) => (getMaxSal(b) || -1) - (getMaxSal(a) || -1));
                    }
                    if (s === "salario_asc") {
                        return [...list].sort((a, b) => (getMaxSal(a) || 999999999) - (getMaxSal(b) || 999999999));
                    }
                    if (s === "cidade_az") {
                        return [...list].sort((a, b) => String(a.cidade || "").localeCompare(String(b.cidade || ""), "pt-BR"));
                    }

                    // recomendadas: urgente + recente
                    return [...list].sort((a, b) => {
                        const ua = a.contratacaoUrgente ? 1 : 0;
                        const ub = b.contratacaoUrgente ? 1 : 0;
                        if (ub !== ua) return ub - ua;
                        const da = (new Date(a.publicadaEm || 0)).getTime() || 0;
                        const db = (new Date(b.publicadaEm || 0)).getTime() || 0;
                        if (db !== da) return db - da;
                        return (getVagaId(b) || 0) - (getVagaId(a) || 0);
                    });
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

                function setSalaryPill() {
                    if (!salaryPill) return;
                    salaryPill.textContent = `${brl.format(filters.salaryMin)} — ${brl.format(filters.salaryMax)}${filters.includeNoSalary ? " (+ a combinar)" : ""}`;
                }

                // =========================
                // Montagem de opções
                // =========================
                function buildRegions() {
                    if (!regionsChips) return;
                    regionsChips.innerHTML = "";
                    REGIONS.forEach(r => {
                        const btn = document.createElement("button");
                        btn.type = "button";
                        btn.className = "chip";
                        btn.innerHTML = `<i class="fa-solid fa-earth-americas"></i>${esc(r)}`;
                        btn.addEventListener("click", () => {
                            if (filters.regions.has(r)) filters.regions.delete(r);
                            else filters.regions.add(r);
                            btn.classList.toggle("is-on", filters.regions.has(r));
                            requestApply();
                        });
                        regionsChips.appendChild(btn);
                    });
                }

                function rebuildCityOptions() {
                    if (!city) return;
                    const ufSelected = norm(filters.uf || "");
                    const cities = [...new Set(all
                        .filter(v => !ufSelected || norm(v.estado) === ufSelected)
                        .map(v => String(v.cidade || "").trim())
                        .filter(Boolean)
                    )].sort((a, b) => a.localeCompare(b, "pt-BR"));

                    city.innerHTML = `<option value="">Todas</option>` + cities.map(c => `<option value="${esc(c)}">${esc(c)}</option>`).join("");
                }

                function buildUfAndCityOptions() {
                    if (!uf) return;
                    const ufs = [...new Set(all.map(v => norm(v.estado || "")).filter(Boolean))].sort();
                    uf.innerHTML = `<option value="">Todas</option>` + ufs.map(x => `<option value="${esc(x)}">${esc(x)}</option>`).join("");
                    rebuildCityOptions();
                }

                function buildCategoryOptions() {
                    if (!category) return;
                    const cats = [...new Set(all.map(v => String(v.categoria || "").trim()).filter(Boolean))]
                        .sort((a, b) => a.localeCompare(b, "pt-BR"));
                    category.innerHTML = `<option value="">Todas</option>` + cats
                        .map(x => `<option value="${esc(x)}">${esc(String(x).replaceAll("_", " "))}</option>`)
                        .join("");
                }

                function buildTopCities() {
                    if (!topCities) return;
                    topCities.innerHTML = "";
                    const freq = new Map();
                    all.forEach(v => {
                        const c = String(v.cidade || "").trim();
                        if (!c) return;
                        freq.set(c, (freq.get(c) || 0) + 1);
                    });
                    const top = [...freq.entries()].sort((a, b) => b[1] - a[1]).slice(0, 6);

                    top.forEach(([c, n]) => {
                        const btn = document.createElement("button");
                        btn.type = "button";
                        btn.className = "chip";
                        btn.innerHTML = `<i class="fa-solid fa-location-dot"></i>${esc(c)} <span style="opacity:.65;">(${n})</span>`;
                        btn.addEventListener("click", () => {
                            filters.city = c;
                            if (city) city.value = c;
                            requestApply();
                        });
                        topCities.appendChild(btn);
                    });
                }

                function buildContractChecks() {
                    if (!contractChecks) return;
                    const types = [...new Set(all.map(v => String(v.tipoContrato || "").trim()).filter(Boolean))]
                        .sort((a, b) => a.localeCompare(b, "pt-BR"));
                    const fallback = ["CLT", "PJ", "ESTÁGIO", "TEMPORÁRIO", "APRENDIZ", "HOME OFFICE"];
                    const list = types.length ? types : fallback;

                    contractChecks.innerHTML = "";
                    list.forEach(t => {
                        const label = document.createElement("label");
                        label.className = "check";
                        label.innerHTML = `<input type="checkbox" value="${esc(t)}"><span>${esc(t)}</span>`;
                        const inp = label.querySelector("input");
                        inp.addEventListener("change", () => {
                            if (inp.checked) filters.contracts.add(t);
                            else filters.contracts.delete(t);
                            requestApply();
                        });
                        contractChecks.appendChild(label);
                    });
                }

                function initSalaryRangeFromData() {
                    if (!salaryMin || !salaryMax || !salaryMinInput || !salaryMaxInput) return;

                    const vals = all
                        .map(v => getMaxSal(v))
                        .filter(x => Number.isFinite(x) && x >= 0);

                    const maxData = vals.length ? Math.max(...vals) : 20000;

                    let suggestedMax;
                    if (maxData <= 5000) {
                        suggestedMax = 10000;
                    } else if (maxData <= 20000) {
                        suggestedMax = 30000;
                    } else if (maxData <= 100000) {
                        suggestedMax = 120000;
                    } else if (maxData <= 500000) {
                        suggestedMax = 600000;
                    } else {
                        suggestedMax = Math.ceil(maxData / 100000) * 100000;
                    }

                    salaryMin.min = "0";
                    salaryMin.max = String(suggestedMax);
                    salaryMax.min = "0";
                    salaryMax.max = String(suggestedMax);

                    filters.salaryMin = 0;
                    filters.salaryMax = suggestedMax;

                    salaryMin.value = "0";
                    salaryMax.value = String(suggestedMax);
                    salaryMinInput.value = "0";
                    salaryMaxInput.value = String(suggestedMax);

                    setSalaryPill();
                }
                // =========================
                // ✅ Abrir/fechar filtros SEM travar scroll
                // =========================
                function openFilters() {
                    if (!filtersPanel || !filtersOverlay) return;
                    filtersPanel.classList.add("is-open");
                    filtersOverlay.classList.add("is-on");
                    // ❌ nada de lockScroll aqui
                }

                function closeFilters() {
                    if (!filtersPanel || !filtersOverlay) return;
                    filtersPanel.classList.remove("is-open");
                    filtersOverlay.classList.remove("is-on");
                    // ❌ nada de unlockScroll aqui
                    forceUnlockScroll(); // só por segurança
                }

                btnOpenFilters?.addEventListener("click", openFilters);
                btnCloseFilters?.addEventListener("click", closeFilters);
                filtersOverlay?.addEventListener("click", closeFilters);

                // View mode
                function setViewMode(mode) {
                    viewMode = mode;
                    cards.classList.toggle("list", mode === "list");
                    modeGrid?.classList.toggle("is-on", mode === "grid");
                    modeList?.classList.toggle("is-on", mode === "list");
                }
                modeGrid?.addEventListener("click", () => setViewMode("grid"));
                modeList?.addEventListener("click", () => setViewMode("list"));

                // salário sync
                function syncSalaryFromRanges() {
                    if (!salaryMin || !salaryMax || !salaryMinInput || !salaryMaxInput) return;
                    let min = Number(salaryMin.value);
                    let max = Number(salaryMax.value);
                    if (min > max)[min, max] = [max, min];

                    filters.salaryMin = clamp(min, 0, 99999999);
                    filters.salaryMax = clamp(max, 0, 99999999);

                    salaryMinInput.value = String(filters.salaryMin);
                    salaryMaxInput.value = String(filters.salaryMax);
                    setSalaryPill();
                }

                function syncSalaryFromInputs() {
                    if (!salaryMin || !salaryMax || !salaryMinInput || !salaryMaxInput) return;
                    let min = toNumber(salaryMinInput.value);
                    let max = toNumber(salaryMaxInput.value);
                    if (!max) max = filters.salaryMax;
                    if (min > max)[min, max] = [max, min];

                    filters.salaryMin = clamp(min, 0, 99999999);
                    filters.salaryMax = clamp(max, 0, 99999999);

                    salaryMin.value = String(filters.salaryMin);
                    salaryMax.value = String(filters.salaryMax);
                    setSalaryPill();
                }

                // =========================
                // Apply (debounce)
                // =========================
                let __t = null;

                function requestApply() {
                    clearTimeout(__t);
                    __t = setTimeout(applyFilters, 120);
                }

                q?.addEventListener("input", () => {
                    filters.q = q.value || "";
                    requestApply();
                });
                sortBy?.addEventListener("change", () => {
                    filters.sortBy = String(sortBy.value || "recomendadas");
                    requestApply();
                });

                uf?.addEventListener("change", () => {
                    filters.uf = String(uf.value || "").toUpperCase();
                    filters.city = "";
                    rebuildCityOptions();
                    if (city) city.value = "";
                    requestApply();
                });

                city?.addEventListener("change", () => {
                    filters.city = String(city.value || "");
                    requestApply();
                });
                category?.addEventListener("change", () => {
                    filters.category = String(category.value || "");
                    requestApply();
                });

                includeNoSalary?.addEventListener("change", () => {
                    filters.includeNoSalary = !!includeNoSalary.checked;
                    setSalaryPill();
                    requestApply();
                });

                salaryMin?.addEventListener("input", () => {
                    syncSalaryFromRanges();
                    requestApply();
                });
                salaryMax?.addEventListener("input", () => {
                    syncSalaryFromRanges();
                    requestApply();
                });
                salaryMinInput?.addEventListener("input", () => {
                    syncSalaryFromInputs();
                    requestApply();
                });
                salaryMaxInput?.addEventListener("input", () => {
                    syncSalaryFromInputs();
                    requestApply();
                });

                onlyUrgent?.addEventListener("change", () => {
                    filters.onlyUrgent = !!onlyUrgent.checked;
                    requestApply();
                });
                hideConfidential?.addEventListener("change", () => {
                    filters.hideConfidential = !!hideConfidential.checked;
                    requestApply();
                });
                hideApplied?.addEventListener("change", () => {
                    filters.hideApplied = !!hideApplied.checked;
                    requestApply();
                });

                btnClear?.addEventListener("click", () => {
                    filters.q = "";
                    if (q) q.value = "";
                    filters.regions.clear();
                    regionsChips?.querySelectorAll(".chip")?.forEach(c => c.classList.remove("is-on"));

                    filters.uf = "";
                    if (uf) uf.value = "";
                    filters.city = "";
                    if (city) city.value = "";
                    filters.category = "";
                    if (category) category.value = "";

                    filters.contracts.clear();
                    contractChecks?.querySelectorAll('input[type="checkbox"]')?.forEach(i => i.checked = false);

                    filters.onlyUrgent = false;
                    if (onlyUrgent) onlyUrgent.checked = false;
                    filters.hideConfidential = false;
                    if (hideConfidential) hideConfidential.checked = false;
                    filters.hideApplied = false;
                    if (hideApplied) hideApplied.checked = false;

                    filters.includeNoSalary = true;
                    if (includeNoSalary) includeNoSalary.checked = true;

                    filters.sortBy = "recomendadas";
                    if (sortBy) sortBy.value = "recomendadas";

                    filters.salaryMin = 0;
                    filters.salaryMax = Number(salaryMax?.max || 20000);

                    if (salaryMin) salaryMin.value = String(filters.salaryMin);
                    if (salaryMax) salaryMax.value = String(filters.salaryMax);
                    if (salaryMinInput) salaryMinInput.value = String(filters.salaryMin);
                    if (salaryMaxInput) salaryMaxInput.value = String(filters.salaryMax);

                    setSalaryPill();
                    applyFilters();
                });

                btnApply?.addEventListener("click", () => {
                    applyFilters();
                    closeFilters();
                });

                btnMore?.addEventListener("click", () => {
                    page += 1;
                    renderAll();
                });


                // =========================
                // Render
                // =========================
                function renderAppliedChips() {
                    if (!appliedChips) return;
                    appliedChips.innerHTML = "";
                    const chips = [];

                    if (filters.q) chips.push({
                        icon: "fa-magnifying-glass",
                        text: `Busca: ${filters.q}`
                    });
                    if (filters.regions.size) chips.push({
                        icon: "fa-earth-americas",
                        text: `Região: ${[...filters.regions].join(", ")}`
                    });
                    if (filters.uf) chips.push({
                        icon: "fa-flag",
                        text: `UF: ${filters.uf}`
                    });
                    if (filters.city) chips.push({
                        icon: "fa-location-dot",
                        text: `Cidade: ${filters.city}`
                    });
                    if (filters.category) chips.push({
                        icon: "fa-layer-group",
                        text: `Categoria: ${String(filters.category).replaceAll("_", " ")}`
                    });

                    chips.push({
                        icon: "fa-sack-dollar",
                        text: `${brl.format(filters.salaryMin)}—${brl.format(filters.salaryMax)}`
                    });

                    if (!filters.includeNoSalary) chips.push({
                        icon: "fa-ban",
                        text: "Sem “a combinar”"
                    });
                    if (filters.onlyUrgent) chips.push({
                        icon: "fa-bolt",
                        text: "Urgentes"
                    });
                    if (filters.hideConfidential) chips.push({
                        icon: "fa-user-secret",
                        text: "Sem confidencial"
                    });
                    if (filters.contracts.size) chips.push({
                        icon: "fa-clipboard",
                        text: `Contrato: ${[...filters.contracts].join(", ")}`
                    });

                    chips.slice(0, 6).forEach(c => {
                        const span = document.createElement("span");
                        span.className = "pill";
                        span.innerHTML = `<i class="fa-solid ${c.icon}"></i>${esc(c.text)}`;
                        appliedChips.appendChild(span);
                    });
                }

                function calcTopRegion(list) {
                    const m = new Map();
                    list.forEach(v => {
                        const r = v.region || "—";
                        m.set(r, (m.get(r) || 0) + 1);
                    });
                    const top = [...m.entries()].sort((a, b) => b[1] - a[1])[0];
                    if (!top) return "—";
                    return top[0] === "—" ? "Não informada" : `${top[0]} (${top[1]})`;
                }

                function renderKpis() {
                    if (kpiTotal) kpiTotal.textContent = `${all.length} vaga(s)`;
                    if (kpiShown) kpiShown.textContent = `${Math.min(view.length, page * pageSize)} / ${view.length}`;
                    if (kpiRegion) kpiRegion.textContent = calcTopRegion(view);
                }

                function renderCards() {
                    const end = page * pageSize;
                    const slice = view.slice(0, end);

                    if (!slice.length) {
                        cards.innerHTML = "";
                        if (emptyBox) emptyBox.style.display = "block";
                        if (btnMore) btnMore.style.display = "none";
                        return;
                    }

                    if (emptyBox) emptyBox.style.display = "none";
                    const frag = document.createDocumentFragment();

                    slice.forEach(v => {
                        const id = getVagaId(v);
                        const loc = cardLocation(v);
                        const pub = v.publicadaEm ? formatDateISOToBR(v.publicadaEm) : "—";

                        const descRaw = String(v.descricao || "").trim();
                        const preview = descRaw.length > 180 ? descRaw.slice(0, 180).trim() + "…" : descRaw;

                        const tags = [];
                        tags.push(`<span class="tag blue"><i class="fa-solid fa-location-dot"></i>${esc(loc)}</span>`);
                        tags.push(`<span class="tag"><i class="fa-regular fa-file-lines"></i>${esc(safeText(v.tipoContrato, "—"))}</span>`);
                        if (v.categoria) tags.push(`<span class="tag"><i class="fa-solid fa-layer-group"></i>${esc(String(v.categoria).replaceAll("_", " "))}</span>`);
                        tags.push(`<span class="tag green"><i class="fa-solid fa-sack-dollar"></i>${esc(getSalarioTexto(v))}</span>`);
                        if (v.contratacaoUrgente) tags.push(`<span class="tag red"><i class="fa-solid fa-bolt"></i>Urgente</span>`);
                        if (v.empresaConfidencial) tags.push(`<span class="tag"><i class="fa-solid fa-user-secret"></i>Confidencial</span>`);

                        const el = document.createElement("article");
                        el.className = "card";
                        el.dataset.vagaId = String(id ?? "");

                        el.innerHTML = `
          <div class="cardHead">
            <div style="min-width:0;">
              <h3 class="cardTitle">${esc(safeText(v.titulo))}</h3>
              <p class="cardSub">
                <span style="font-weight:900;">${esc(safeText(v.empresa))}</span>
                <span class="dot2"></span>
                <span>${esc(safeText(v.region || "", "—"))}${v.estado ? `  ${esc(v.estado)}` : ""}</span>
              </p>
            </div>
            <div class="metaSmall">
              <span><i class="fa-regular fa-calendar"></i> ${esc(pub)}</span>
            </div>
          </div>

          <div class="cardBody">
            <div class="tags">${tags.join("")}</div>
            <div class="excerpt">${esc(preview || "Clique para ver os detalhes desta vaga.")}</div>
          </div>

          <div class="cardFoot">
            <div class="metaSmall">
              <span><i class="fa-solid fa-id-card-clip"></i> #${esc(String(id ?? "—"))}</span>
            </div>
            <div class="metaSmall">
              <span><i class="fa-solid fa-arrow-right"></i> Ver detalhes</span>
            </div>
          </div>
        `;
                        el.addEventListener("click", () => openDrawer(v));
                        frag.appendChild(el);
                    });

                    cards.innerHTML = "";
                    cards.appendChild(frag);
                    if (btnMore) btnMore.style.display = view.length > end ? "inline-flex" : "none";
                }

                function renderAll() {
                    renderAppliedChips();
                    renderKpis();
                    renderCards();
                    if (statusLine) statusLine.innerHTML = `<i class="fa-solid fa-signal"></i> ${view.length} vaga(s) encontradas com os filtros.`;
                }

                function applyFilters() {
                    const query = norm(filters.q || "");
                    const ufSel = norm(filters.uf || "");
                    const citySel = norm(filters.city || "");
                    const categorySel = norm(filters.category || "");
                    const regionSet = filters.regions;
                    const contractSet = filters.contracts;

                    const debug = {
                        total: all.length,
                        onlyUrgent: 0,
                        hideConfidential: 0,
                        hideApplied: 0,
                        region: 0,
                        uf: 0,
                        city: 0,
                        category: 0,
                        contract: 0,
                        salary: 0,
                        query: 0,
                        passed: 0
                    };

                    let out = all.filter(v => {
                        if (filters.hideApplied && isAppliedVaga(v)) {
                            debug.hideApplied++;
                            return false;
                        }

                        if (filters.onlyUrgent && !v.contratacaoUrgente) {
                            debug.onlyUrgent++;
                            return false;
                        }

                        if (filters.hideConfidential && v.empresaConfidencial) {
                            debug.hideConfidential++;
                            return false;
                        }

                        if (regionSet.size && !regionSet.has(v.region)) {
                            debug.region++;
                            return false;
                        }

                        if (ufSel && norm(v.estado) !== ufSel) {
                            debug.uf++;
                            return false;
                        }

                        if (citySel && norm(v.cidade) !== citySel) {
                            debug.city++;
                            return false;
                        }

                        if (categorySel) {
                            const catNorm = norm(String(v.categoria || "").replaceAll("_", " "));
                            const detectedFromQuery = detectCategoryFromQuery(filters.q);

                            const sameCategory = catNorm === categorySel;
                            const queryMatchesDetected = detectedFromQuery && catNorm === detectedFromQuery;

                            if (!sameCategory && !queryMatchesDetected) {
                                debug.category++;
                                return false;
                            }
                        }

                        if (contractSet.size) {
                            const t = String(v.tipoContrato || "").trim();
                            if (!contractSet.has(t)) {
                                debug.contract++;
                                return false;
                            }
                        }

                        if (!matchSalary(v)) {
                            debug.salary++;
                            return false;
                        }

                        if (query) {
                            if (!matchesSemanticQuery(v, filters.q)) {
                                debug.query++;
                                return false;
                            }
                        }

                        debug.passed++;
                        return true;
                    });

                    out = sortList(out);
                    view = out;
                    page = 1;
                    syncUrlWithFilters();
                    renderAll();
                }

                function syncUrlWithFilters() {
                    const params = new URLSearchParams();

                    if (filters.q) params.set("q", filters.q);
                    if (filters.uf) params.set("uf", filters.uf);
                    if (filters.city) params.set("city", filters.city);
                    if (filters.category) params.set("categoria", filters.category);

                    const qs = params.toString();
                    const newUrl = qs ? `${window.location.pathname}?${qs}` : window.location.pathname;

                    window.history.replaceState({}, "", newUrl);
                }

                function detectCategoryFromQuery(query) {
                    const q = norm(query);
                    if (!q) return "";

                    for (const [category, words] of Object.entries(SEARCH_SYNONYMS)) {
                        const normalizedWords = words.map(norm);
                        if (normalizedWords.some(w => q.includes(w) || w.includes(q))) {
                            return category;
                        }
                    }

                    return "";
                }

                // Drawer (sem travar scroll)
                // =========================
                function resetDetailSections() {
                    if (secEmpresa) secEmpresa.style.display = "none";
                    if (dEmpresa) dEmpresa.textContent = "—";
                    if (dDesc) dDesc.textContent = "—";

                    if (secResp) secResp.style.display = "none";
                    if (dResp) dResp.innerHTML = "";
                    if (hResp) hResp.innerHTML = `<i class="fa-solid fa-list-check"></i> Responsabilidades`;

                    if (secReq) secReq.style.display = "none";
                    if (dReq) dReq.innerHTML = "";

                    if (secForm) secForm.style.display = "none";
                    if (dFormGrid) dFormGrid.innerHTML = "";

                    if (secIdiomas) secIdiomas.style.display = "none";
                    if (dIdiomas) dIdiomas.innerHTML = "";

                    if (secPrefs) secPrefs.style.display = "none";
                    if (dPrefs) dPrefs.innerHTML = "";

                    if (secBenefits) secBenefits.style.display = "none";
                    if (dBenefits) dBenefits.innerHTML = "";

                    if (secLoading) secLoading.style.display = "none";
                }

                function setTags(v) {
                    if (!dTags) return;
                    dTags.innerHTML = "";

                    const tags = [];
                    tags.push({
                        cls: "blue",
                        icon: "fa-location-dot",
                        text: cardLocation(v)
                    });
                    tags.push({
                        cls: "",
                        icon: "fa-regular fa-file-lines",
                        text: safeText(v.tipoContrato || "", "—")
                    });
                    tags.push({
                        cls: "green",
                        icon: "fa-sack-dollar",
                        text: getSalarioTexto(v)
                    });
                    if (v.contratacaoUrgente) tags.push({
                        cls: "red",
                        icon: "fa-bolt",
                        text: "Urgente"
                    });
                    if (v.empresaConfidencial) tags.push({
                        cls: "",
                        icon: "fa-user-secret",
                        text: "Confidencial"
                    });

                    tags.forEach(t => {
                        const span = document.createElement("span");
                        span.className = `tag ${t.cls}`.trim();
                        span.innerHTML = `<i class="fa-solid ${t.icon}"></i>${esc(t.text)}`;
                        dTags.appendChild(span);
                    });
                }

                function listFromText(text) {
                    const s = String(text || "").trim();
                    if (!s) return [];
                    let parts = s.replace(/\r/g, "")
                        .split(/\n+|;\s*|,\s*|\.\s+/g)
                        .map(x => x.trim())
                        .filter(Boolean)
                        .filter(x => x.length >= 4);
                    return parts.slice(0, 12);
                }

                function addLi(ul, text) {
                    const li = document.createElement("li");
                    li.textContent = text;
                    ul.appendChild(li);
                }

                function addFormItem(label, value) {
                    const div = document.createElement("div");
                    div.className = "ditem";
                    div.innerHTML = `<small>${esc(label)}</small><strong>${esc(value)}</strong>`;
                    dFormGrid.appendChild(div);
                }

                function buildEmpresaText(v) {
                    const e = v?.empresaObj || v?.empresaDTO;
                    const lines = [];
                    const nome = e?.empresaNome || e?.nome || e?.nomeFantasia || e?.razaoSocial;
                    const segmento = e?.empresaSegmento || e?.segmento || e?.area || e?.ramo;
                    const porte = e?.empresaTamanho || e?.porte || e?.tamanho;
                    const sobre = e?.empresaDescricao || e?.sobre || e?.descricao || e?.apresentacao;

                    if (nome) lines.push(`${nome}`);
                    if (segmento) lines.push(`Segmento: ${segmento}`);
                    if (porte) lines.push(`Porte: ${porte}`);
                    if (sobre) {
                        lines.push("");
                        lines.push(String(sobre).trim());
                    }
                    return lines.join("\n").trim();
                }

                function buildResponsabilidades(v) {
                    const arr = v?.responsabilidades || v?.atividades || v?.atribuicoes || null;
                    if (Array.isArray(arr)) return {
                        items: arr.map(x => String(x)).filter(Boolean),
                        inferred: false
                    };
                    if (typeof arr === "string") return {
                        items: listFromText(arr),
                        inferred: false
                    };
                    const fromDesc = listFromText(v?.descricao);
                    if (fromDesc.length >= 2) return {
                        items: fromDesc,
                        inferred: true
                    };
                    return {
                        items: [],
                        inferred: true
                    };
                }

                function buildRequisitos(v) {
                    const items = [];
                    if (Array.isArray(v?.requisitosObrigatorios)) v.requisitosObrigatorios.forEach(x => items.push(`Obrigatório: ${String(x)}`));
                    if (Array.isArray(v?.requisitosDesejaveis)) v.requisitosDesejaveis.forEach(x => items.push(`Desejável: ${String(x)}`));

                    const arr = v?.requisitosLista || v?.requisitosTexto || v?.requisitosArray;
                    if (Array.isArray(arr)) arr.forEach(x => items.push(String(x)));
                    if (typeof arr === "string") listFromText(arr).forEach(x => items.push(x));

                    return [...new Set(items.map(x => String(x).trim()).filter(Boolean))];
                }

                function buildFormacao(v) {
                    const out = [];
                    const fArr = Array.isArray(v?.formacao) ? v.formacao : null;
                    if (fArr && fArr.length) {
                        const f = fArr[0];
                        if (f?.escolaridade) out.push({
                            k: "Escolaridade",
                            v: safeText(f.escolaridade, "Não informado")
                        });
                        if (f?.experienciaDescricao) out.push({
                            k: "Experiência",
                            v: safeText(f.experienciaDescricao)
                        });
                        return out;
                    }
                    if (v?.escolaridade) out.push({
                        k: "Escolaridade",
                        v: safeText(v.escolaridade, "Não informado")
                    });
                    if (v?.experiencia) out.push({
                        k: "Experiência",
                        v: safeText(v.experiencia)
                    });
                    return out;
                }

                function buildIdiomas(v) {
                    const arr = Array.isArray(v?.idiomas) ? v.idiomas : [];
                    const items = [];
                    arr.forEach(it => {
                        const idioma = it?.idioma || it?.nome || "";
                        const nivel = it?.nivelIdioma || it?.nivel || "";
                        const obrig = (it?.obrigatorio === true) ? "Obrigatório" : "Diferencial";
                        if (idioma || nivel) items.push(`${safeText(idioma, "Idioma")}  ${safeText(nivel, "Nível")}  ${obrig}`);
                    });
                    return items;
                }

                function buildPrefs(v) {
                    const req = Array.isArray(v?.requisitos) ? v.requisitos[0] : (v?.requisitos || null);
                    const items = [];
                    if (req && typeof req === "object" && !Array.isArray(req)) {
                        if (typeof req.habilitacao === "boolean") items.push(`CNH: ${req.habilitacao ? "Sim" : "Não"}`);
                        if (typeof req.veiculoProprio === "boolean") items.push(`Veículo próprio: ${req.veiculoProprio ? "Sim" : "Não"}`);
                        if (typeof req.viajar === "boolean") items.push(`Viajar: ${req.viajar ? "Sim" : "Não"}`);
                        if (typeof req.mudarResidencia === "boolean") items.push(`Mudar de residência: ${req.mudarResidencia ? "Sim" : "Não"}`);
                    }
                    return [...new Set(items.map(x => String(x).trim()).filter(Boolean))];
                }

                function buildBeneficios(v) {
                    const arr = v?.beneficios || v?.beneficiosLista || v?.benefits || null;
                    if (Array.isArray(arr)) return arr.map(x => String(x)).filter(Boolean);
                    if (typeof arr === "string") return listFromText(arr);
                    return [];
                }

                function buildDescricaoMelhorada(v) {
                    const desc = String(v?.descricao || "").trim();
                    const lines = [];
                    if (desc) lines.push(desc);

                    const extras = [];
                    if (v?.tipoContrato) extras.push(`Contrato: ${v.tipoContrato}`);
                    const sal = getSalarioTexto(v);
                    if (sal) extras.push(`Salário: ${sal}`);
                    const loc = cardLocation(v);
                    if (loc && loc !== "—") extras.push(`Local: ${loc}`);

                    if (extras.length) {
                        lines.push("");
                        lines.push("Resumo rápido");
                        extras.forEach(x => lines.push(`• ${x}`));
                    }
                    return lines.join("\n").trim() || "Descrição não informada.";
                }

                function openDrawerShell() {
                    drawerOverlay?.classList.add("is-on");
                    drawer?.classList.add("is-on");
                    // ❌ sem overflow hidden
                }

                function closeDrawer() {
                    drawerOverlay?.classList.remove("is-on");
                    drawer?.classList.remove("is-on");
                    forceUnlockScroll();
                }
                drawerClose?.addEventListener("click", closeDrawer);
                drawerOverlay?.addEventListener("click", closeDrawer);

                document.addEventListener("keydown", (e) => {
                    if (e.key === "Escape") closeAllOverlays();
                });

                async function openDrawer(v, opts = {}) {
                    const allowAppliedOpen = !!opts?.allowAppliedOpen;

                    if (!allowAppliedOpen && isAppliedVaga(v)) {
                        showToast({
                            title: "Vaga já candidatada",
                            message: "Essa vaga já está em Minhas candidaturas.",
                            type: "warn"
                        });
                        return;
                    }

                    current = v ? normalizeVagaApi(v) : null;
                    if (!current) return;
                    current = v ? normalizeVagaApi(v) : null;
                    if (!current) return;
                    const alreadyApplied = isAppliedVaga(current);

                    if (dApply) {
                        dApply.disabled = alreadyApplied;
                        dApply.innerHTML = alreadyApplied ?
                            `<i class="fa-solid fa-circle-check"></i> Já candidatado` :
                            `<i class="fa-solid fa-paper-plane"></i> Candidatar agora`;

                        dApply.classList.toggle("disabled", alreadyApplied);
                    }
                    resetDetailSections();
                    if (secLoading) secLoading.style.display = "grid";

                    const id = getVagaId(current);
                    if (dTitle) dTitle.textContent = safeText(current.titulo);
                    setTags(current);

                    // detalhe opcional
                    try {
                        const detalhe = await fetchVagaDetalhe(id);
                        if (detalhe && typeof detalhe === "object") {
                            current = normalizeVagaApi({
                                ...current,
                                ...detalhe
                            });
                        }
                    } catch (_) {}

                    // link detalhe no seu front
                    const frontViewTpl = ROUTES.VAGA_VIEW || "#";
                    currentDetailUrl = id ? resolveTemplate(frontViewTpl, {
                        id
                    }) : "#";

                    if (dOpen) {
                        if (currentDetailUrl && currentDetailUrl !== "#") {
                            dOpen.style.display = "inline-flex";
                            dOpen.href = currentDetailUrl;
                        } else {
                            dOpen.style.display = "none";
                        }
                    }

                    if (dResumoEmpresa) dResumoEmpresa.textContent = safeText(current.empresa);
                    if (dResumoLocal) dResumoLocal.textContent = cardLocation(current);
                    if (dResumoContrato) dResumoContrato.textContent = safeText(current.tipoContrato, "—");
                    if (dResumoSalario) dResumoSalario.textContent = getSalarioTexto(current);

                    if (dAddr) dAddr.textContent = enderecoCompleto(current);
                    if (dPub) dPub.textContent = current.publicadaEm ? `Publicada em ${formatDateISOToBR(current.publicadaEm)}` : "—";

                    const empresaTxt = buildEmpresaText(current);
                    if (empresaTxt && secEmpresa && dEmpresa) {
                        secEmpresa.style.display = "grid";
                        dEmpresa.textContent = empresaTxt;
                    }

                    if (dDesc) dDesc.textContent = buildDescricaoMelhorada(current);

                    const resp = buildResponsabilidades(current);
                    if (resp.items.length && secResp && dResp && hResp) {
                        secResp.style.display = "grid";
                        hResp.innerHTML = resp.inferred ?
                            `<i class="fa-solid fa-list-check"></i> Responsabilidades (a partir da descrição)` :
                            `<i class="fa-solid fa-list-check"></i> Responsabilidades`;
                        dResp.innerHTML = "";
                        resp.items.forEach(x => addLi(dResp, x));
                    }

                    const reqItems = buildRequisitos(current);
                    if (reqItems.length && secReq && dReq) {
                        secReq.style.display = "grid";
                        dReq.innerHTML = "";
                        reqItems.forEach(x => addLi(dReq, x));
                    }

                    const formItems = buildFormacao(current);
                    if (formItems.length && secForm && dFormGrid) {
                        secForm.style.display = "grid";
                        dFormGrid.innerHTML = "";
                        formItems.forEach(it => addFormItem(it.k, it.v));
                    }

                    const idiomas = buildIdiomas(current);
                    if (idiomas.length && secIdiomas && dIdiomas) {
                        secIdiomas.style.display = "grid";
                        dIdiomas.innerHTML = "";
                        idiomas.forEach(x => addLi(dIdiomas, x));
                    }

                    const prefs = buildPrefs(current);
                    if (prefs.length && secPrefs && dPrefs) {
                        secPrefs.style.display = "grid";
                        dPrefs.innerHTML = "";
                        prefs.forEach(x => addLi(dPrefs, x));
                    }

                    const bens = buildBeneficios(current);
                    if (bens.length && secBenefits && dBenefits) {
                        secBenefits.style.display = "grid";
                        dBenefits.innerHTML = "";
                        bens.forEach(x => addLi(dBenefits, x));
                    }

                    if (secLoading) secLoading.style.display = "none";
                    openDrawerShell();
                }

                // =========================
                // Apply modal (token)
                // =========================
                function closeApply() {
                    applyOverlay?.classList.remove("is-on");
                    applyModal?.classList.remove("is-on");
                    forceUnlockScroll();
                }
                applyClose?.addEventListener("click", closeApply);
                applyOverlay?.addEventListener("click", closeApply);

                async function openApply() {
                    if (!requireCandidateForApply()) return;

                    if (isAppliedVaga(current)) {
                        showToast({
                            title: "Candidatura já realizada",
                            message: "Essa vaga já está no painel de Minhas candidaturas.",
                            type: "warn"
                        });
                        return;
                    }

                    if (!applyOverlay || !applyModal) return;
                    if (!requireCandidateForApply()) return;
                    if (!applyOverlay || !applyModal) return;
                    applyOverlay.classList.add("is-on");
                    applyModal.classList.add("is-on");

                    const id = getVagaId(current);
                    if (applyTitle) applyTitle.textContent = "Confirmar candidatura";
                    if (applyVagaResumo) {
                        applyVagaResumo.textContent = [
                            `#${id ?? "—"}  ${safeText(current?.titulo)}`,
                            `${safeText(current?.empresa)}  ${cardLocation(current)}`,
                            `Contrato: ${safeText(current?.tipoContrato, "—")}  Salário: ${getSalarioTexto(current)}`
                        ].join("\n");
                    }

                    const ctx = await fetchCandidateContext();
                    if (applyEmail) applyEmail.value = ctx.email || applyEmail.value || "";
                    if (applyStatus) applyStatus.textContent = ctx.candidatoId ?
                        "Pronto. Você pode confirmar a candidatura agora. Se a API direta falhar, use o token como fallback." :
                        "Informe o e-mail e clique em “Enviar token”.";
                    if (applyToken) applyToken.value = "";
                }

                function withQuery(base, params) {
                    const u = new URL(base, window.location.origin);
                    Object.entries(params || {}).forEach(([k, v]) => {
                        if (v === undefined || v === null || String(v).trim() === "") return;
                        u.searchParams.set(k, String(v));
                    });
                    return u.toString().replace(window.location.origin, "");
                }

                async function sendToken() {
                    if (!requireCandidateForApply()) return;
                    const idVaga = Number(getVagaId(current));
                    if (!idVaga) throw new Error("Vaga inválida.");

                    const ctx = await fetchCandidateContext();
                    const email = String(applyEmail?.value || ctx.email || "").trim();
                    if (!email) throw new Error("Informe o e-mail do candidato.");
                    if (applyEmail) applyEmail.value = email;

                    if (applyStatus) applyStatus.textContent = "Enviando token…";
                    const url = `${API_BASE}/pre-candidaturas/${idVaga}?email=${encodeURIComponent(email)}`;
                    const data = await apiJSON(url, {
                        method: "POST",
                        tryAuth: true
                    });

                    if (data?.token && applyToken && !applyToken.value) applyToken.value = String(data.token);
                    if (applyStatus) applyStatus.textContent = String(data?.message || "Token enviado! Verifique seu e-mail e digite o token para validar/confirmar.");
                    showToast({
                        title: "Token enviado",
                        message: String(data?.message || "Verifique seu e-mail para continuar."),
                        type: "success"
                    });
                }

                async function validateToken() {
                    if (!requireCandidateForApply()) return;
                    const tokenStr = String(applyToken?.value || "").trim();
                    if (!tokenStr) throw new Error("Digite o token.");

                    if (applyStatus) applyStatus.textContent = "Validando token…";
                    await apiJSON(withQuery(`${API_BASE}/pre-candidaturas/validar`, {
                        token: tokenStr
                    }), {
                        method: "GET",
                        tryAuth: true
                    });

                    if (applyStatus) applyStatus.textContent = "Token válido ✅ Agora você pode confirmar a candidatura.";
                    showToast({
                        title: "Token validado",
                        message: "Agora confirme a candidatura.",
                        type: "success"
                    });
                }

                async function confirmApply() {
                    if (!requireCandidateForApply()) return;
                    const idVaga = Number(getVagaId(current));
                    if (!idVaga) throw new Error("Vaga inválida.");

                    const ctx = await fetchCandidateContext();
                    const email = String(applyEmail?.value || ctx.email || "").trim();
                    if (!email) throw new Error("Informe o e-mail do candidato.");
                    if (applyEmail) applyEmail.value = email;

                    if (applyStatus) applyStatus.textContent = "Enviando candidatura…";

                    const direct = await tryDirectApply(idVaga);
                    if (direct.ok) {
                        const sync = await syncLocalApplication(idVaga);
                        if (!sync.ok) console.warn('[local-apply-sync]', sync.message || sync);
                        rememberAppliedVaga(idVaga);
                        if (applyStatus) applyStatus.textContent = direct.already ? "Você já estava candidatado ✅" : "Candidatura realizada ✅";
                        showToast({
                            title: direct.already ? "Já candidatado" : "Candidatura realizada",
                            message: direct.already ? "Você já tinha uma candidatura nesta vaga." : "Sua candidatura foi enviada com sucesso.",
                            type: "success"
                        });
                        applyFilters();
                        setTimeout(() => closeApply(), 700);
                        return;
                    }

                    const tokenStr = String(applyToken?.value || "").trim();
                    if (!tokenStr) {
                        throw new Error(direct.message || "Não foi possível candidatar direto. Envie e valide o token para continuar.");
                    }

                    if (applyStatus) applyStatus.textContent = "Confirmando candidatura por token…";
                    await apiJSON(`${API_BASE}/pre-candidaturas/confirmar?token=${encodeURIComponent(tokenStr)}`, {
                        method: "POST",
                        tryAuth: true
                    });
                    const sync = await syncLocalApplication(idVaga);
                    if (!sync.ok) console.warn('[local-apply-sync]', sync.message || sync);
                    rememberAppliedVaga(idVaga);

                    if (applyStatus) applyStatus.textContent = "Candidatura confirmada ✅ Você receberá a confirmação no e-mail.";
                    showToast({
                        title: "Candidatura realizada",
                        message: "Sucesso! Confirmação enviada por e-mail.",
                        type: "success"
                    });
                    applyFilters();
                    setTimeout(() => closeApply(), 900);
                }

                btnSendToken?.addEventListener("click", async () => {
                    try {
                        await sendToken();
                    } catch (e) {
                        if (applyStatus) applyStatus.textContent = `Erro: ${String(e.message || e)}`;
                        showToast({
                            title: "Erro ao enviar token",
                            message: String(e.message || e),
                            type: "error"
                        });
                    }
                });

                btnValidateToken?.addEventListener("click", async () => {
                    try {
                        await validateToken();
                    } catch (e) {
                        if (applyStatus) applyStatus.textContent = `Erro: ${String(e.message || e)}`;
                        showToast({
                            title: "Token inválido",
                            message: String(e.message || e),
                            type: "error"
                        });
                    }
                });

                btnConfirmApply?.addEventListener("click", async () => {
                    try {
                        await confirmApply();
                    } catch (e) {
                        if (applyStatus) applyStatus.textContent = `Erro: ${String(e.message || e)}`;
                        showToast({
                            title: "Falha ao confirmar",
                            message: String(e.message || e),
                            type: "error"
                        });
                    }
                });

                // botão no drawer
                dApply?.addEventListener("click", () => {
                    if (isAppliedVaga(current)) {
                        showToast({
                            title: "Candidatura já realizada",
                            message: "Essa vaga já está no painel de Minhas candidaturas.",
                            type: "warn"
                        });
                        return;
                    }

                    void openApply();
                });

                // =========================
                // URL filters (q/city/uf)
                // =========================
                function readUrlFilters() {
                    const p = new URLSearchParams(window.location.search);
                    const qParam = (p.get("q") || "").trim() || (p.get("cargo") || "").trim() || "";
                    const cityParam = (p.get("city") || "").trim() || (p.get("cidade") || "").trim() || "";
                    const ufParam = (p.get("uf") || "").trim() || (p.get("estado") || "").trim() || "";
                    return {
                        qParam,
                        cityParam,
                        ufParam
                    };
                }

                function readInitialOpenVagaId() {
                    const p = new URLSearchParams(window.location.search);
                    const raw = p.get("openVaga") || p.get("vagaId") || p.get("vaga") || p.get("id") || "";
                    const n = Number(raw || 0);
                    return Number.isFinite(n) && n > 0 ? n : 0;
                }

                function applyUrlFilters() {
                    const {
                        qParam,
                        cityParam,
                        ufParam
                    } = readUrlFilters();

                    filters.q = qParam || "";
                    if (qDesktop) qDesktop.value = filters.q;
                    if (qMobile) qMobile.value = filters.q;

                    filters.uf = ufParam ? ufParam.toUpperCase() : "";
                    if (uf) uf.value = filters.uf;
                    rebuildCityOptions();

                    filters.city = cityParam || "";
                    if (city) city.value = filters.city;

                    const categoryParam = String(new URLSearchParams(window.location.search).get("categoria") || "").trim();
                    const detectedCategory = categoryParam || detectCategoryFromQuery(filters.q);

                    filters.category = detectedCategory || "";
                    if (category) category.value = filters.category;
                }

                function readInitialAutoApply() {
                    const p = new URLSearchParams(window.location.search);
                    return ["1", "true", "yes"].includes(String(p.get("apply") || "").toLowerCase());
                }

                // =========================
                // Boot
                // =========================
                try {
                    if (statusLine) statusLine.innerHTML = `<i class="fa-solid fa-signal"></i> Carregando vagas…`;
                    const raw = await fetchAllVagas();
                    all = (raw || []).map(normalizeVagaApi);
                    await hydrateAppliedVagaIds();

                    buildRegions();
                    buildUfAndCityOptions();
                    buildCategoryOptions();
                    buildTopCities();
                    buildContractChecks();
                    initSalaryRangeFromData();

                    // inicial pills/inputs
                    setSalaryPill();
                    if (hideApplied) hideApplied.checked = false;
                    applyUrlFilters();

                    // inicial render sem aplicar filtros da URL automaticamente
                    view = sortList(all);
                    applyFilters();

                    const urlParams = new URLSearchParams(window.location.search);
                    const hasUrlPrefill = ["q", "cargo", "cidade", "city", "uf", "estado", "categoria"].some(k => String(urlParams.get(k) || "").trim());
                    if (hasUrlPrefill) {
                        showToast({
                            title: "Filtros do link carregados",
                            message: "Os campos vieram preenchidos pela URL, mas a listagem mostra todas as vagas até você aplicar os filtros.",
                            type: "info"
                        });
                    }

                    setViewMode("grid");

                    const initialOpenId = readInitialOpenVagaId();
                    if (initialOpenId) {
                        const openFromUrl = async (vagaBase) => {
                            await openDrawer(vagaBase, {
                                allowAppliedOpen: true
                            });

                            if (readInitialAutoApply()) {
                                setTimeout(() => {
                                    void openApply();
                                }, 180);
                            }
                        };

                        const selected = all.find(v => Number(getVagaId(v) || 0) === initialOpenId);
                        if (selected) {
                            setTimeout(() => {
                                void openFromUrl(selected);
                            }, 60);
                        } else {
                            setTimeout(async () => {
                                try {
                                    const detalhe = await fetchVagaDetalhe(initialOpenId);
                                    if (detalhe && typeof detalhe === "object") {
                                        await openFromUrl({
                                            id: initialOpenId,
                                            idVaga: initialOpenId,
                                            vagaId: initialOpenId,
                                            ...detalhe
                                        });
                                    }
                                } catch (err) {
                                    console.warn("[pesquisar] não consegui abrir a vaga da URL", err);
                                }
                            }, 60);
                        }
                    }
                } catch (e) {
                    console.error(e);
                    if (statusLine) statusLine.innerHTML = `<i class="fa-solid fa-triangle-exclamation"></i> Erro ao carregar vagas: ${esc(String(e.message || e))}`;
                    showToast({
                        title: "Erro",
                        message: String(e.message || e),
                        type: "error"
                    });
                    cards.innerHTML = "";
                    if (emptyBox) {
                        emptyBox.style.display = "block";
                        emptyBox.textContent = "Falha ao carregar vagas. Verifique a API/endpoint e tente novamente.";
                    }
                }
            });
        })();
    </script>

    <style>
        /* =========================
   MOBILE: sem filtros, só busca
========================= */
        .jobhub-mobile-search {
            display: none;
        }

        @media (max-width: 900px) {

            /* mostra barra de busca */
            .jobhub-mobile-search {
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 12px 14px;
                border-radius: 14px;
                background: rgba(255, 255, 255, .92);
                border: 1px solid rgba(15, 18, 25, .10);
                box-shadow: 0 10px 30px rgba(15, 18, 25, .08);
                position: sticky;
                top: 72px;
                /* ajuste se seu header for maior/menor */
                z-index: 60;
                margin: 10px 14px 12px;
                backdrop-filter: blur(10px);
            }

            .jobhub-mobile-search i {
                opacity: .75;
                flex: 0 0 auto;
            }

            .jobhub-mobile-search input {
                width: 100%;
                border: 0;
                outline: 0;
                background: transparent;
                font-size: 15px;
                padding: 6px 0;
            }

            .jobhub-mobile-search button {
                border: 0;
                background: rgba(15, 18, 25, .06);
                border-radius: 10px;
                padding: 8px 10px;
                cursor: pointer;
            }

            /* esconde TUDO que é filtro no mobile */
            #btnOpenFilters,
            #filtersOverlay,
            #filtersPanel,
            #regionsChips,
            #contractChecks,
            #salaryPill,
            #salaryMin,
            #salaryMax,
            #salaryMinInput,
            #salaryMaxInput,
            #includeNoSalary,
            #onlyUrgent,
            #hideConfidential,
            #btnClear,
            #btnApply {
                display: none !important;
            }
        }
    </style>

</body>

</html>