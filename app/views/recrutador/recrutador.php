<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="color-scheme" content="light" />
    <meta name="theme-color" content="#1F75D8" />
    <title>JobHub Candidatos</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800;900&family=Inter:wght@500;600;700&display=swap');

        :root {
            --azul: #1F75D8;
            --azul2: #16447F;
            --txt: #0F172A;
            --muted: #6B7280;
            --bg: #F3F5FB;
            --card: #fff;
            --line: #E5E7EB;
            --radius: 18px;
            --shadow: 0 14px 38px rgba(15, 23, 42, .10);
            --shadow2: 0 10px 22px rgba(15, 23, 42, .08);
            --focus: 0 0 0 4px rgba(31, 117, 216, .18);
            --ok: #10b981;
            --warn: #f59e0b;
            --bad: #ef4444;
            --sb-w: 290px;
            --sb-mini: 88px;
            --sb-gap: 16px;
        }

        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            color: var(--txt);
            font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;

        }

        a {
            color: inherit;
            text-decoration: none
        }

        button,
        input,
        select,
        textarea {
            font-family: inherit
        }

        button {
            cursor: pointer;
            -webkit-tap-highlight-color: transparent
        }

        :focus-visible {
            outline: none;
            box-shadow: var(--focus);
            border-radius: 14px
        }

        [hidden] {
            display: none !important
        }

        body.jobhub-noscroll {
            overflow: hidden
        }

        /* header */
        .jobhubH-shell {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 9990;
            height: 92px;
            background: rgba(255, 255, 255, .92);
            border-bottom: 1px solid rgba(15, 23, 42, .08);
            box-shadow: 0 10px 30px rgba(15, 23, 42, .08);
            display: flex;
            align-items: center;
            font-family: Montserrat, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            transition: transform .18s ease, box-shadow .18s ease, background .18s ease, border-color .18s ease;
            backdrop-filter: blur(10px);
            will-change: transform;
        }

        .jobhubH-wrap {
            width: 100%;
            max-width: 1800px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            align-items: center;
            gap: 16px
        }

        .jobhubH-logo {
            display: flex;
            align-items: center
        }

        .jobhubH-logoImg {
            height: 115px;
            display: block;
            transition: transform .18s ease;
            transform-origin: left center
        }

        .jobhubH-shell.is-scrolled {
            background: rgba(255, 255, 255, .86);
            border-bottom-color: rgba(15, 23, 42, .12);
            box-shadow: 0 18px 60px rgba(15, 23, 42, .14)
        }

        .jobhubH-shell.is-scrolled .jobhubH-logoImg {
            transform: scale(.78)
        }

        .jobhubH-shell.is-hidden {
            transform: translate3d(0, -110%, 0);
            box-shadow: none !important;
            backdrop-filter: none !important
        }

        .jobhubH-nav {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 12px
        }

        .jobhubH-cta {
            height: 42px;
            padding: 0 18px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: 13px;
            letter-spacing: .2px;
            box-shadow: var(--shadow2);
            transition: transform .12s ease, filter .12s ease;
            white-space: nowrap;
            border: 1px solid rgba(15, 23, 42, .10);
            background: #fff;
        }

        .jobhubH-cta:hover {
            transform: translateY(-1px);
            filter: brightness(1.02)
        }

        .jobhubH-cta--empresa {
            background: #C4D9E5;
            border: 1px solid rgba(15, 23, 42, .06)
        }

        .jobhubH-cta--cv {
            background: linear-gradient(90deg, rgba(255, 255, 255, .9), rgba(255, 255, 255, 1))
        }

        .jobhubH-burger {
            display: none;
            margin-left: auto;
            height: 44px;
            width: 44px;
            border-radius: 12px;
            border: 1px solid rgba(15, 23, 42, .10);
            background: #fff;
            color: var(--txt);
            font-size: 22px;
            box-shadow: var(--shadow2)
        }

        @media(max-width:900px) {
            .jobhubH-nav {
                display: none !important
            }

            .jobhubH-burger {
                display: inline-flex;
                align-items: center;
                justify-content: center
            }
        }

        /* mobile menu */
        .jobhubMM-overlay {
            position: fixed;
            inset: 0;
            background: rgba(2, 6, 23, .55);
            opacity: 0;
            transition: opacity .25s ease;
            z-index: 9998
        }

        .jobhubMM-overlay.jobhub-show {
            opacity: 1
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
            box-shadow: 0 18px 60px rgba(15, 23, 42, .14);
            border-right: 1px solid rgba(15, 23, 42, .08);
            padding-top: calc(18px + env(safe-area-inset-top));
            padding-bottom: calc(18px + env(safe-area-inset-bottom));
            overflow-y: auto;
        }

        .jobhubMM-panel.jobhub-show {
            left: 0
        }

        .jobhubMM-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 8px
        }

        .jobhubMM-brand img {
            height: 64px;
            display: block
        }

        .jobhubMM-close {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: rgba(15, 23, 42, .06);
            border: 1px solid rgba(15, 23, 42, .08);
            font-size: 22px
        }

        .jobhubMM-ctaWrap {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 4px
        }

        .jobhubMM-cta {
            height: 44px;
            padding: 0 14px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: 13px;
            box-shadow: var(--shadow2);
            transition: transform .12s ease, filter .12s ease;
        }

        .jobhubMM-cta:hover {
            transform: translateY(-1px);
            filter: brightness(1.02)
        }

        .jobhubMM-cta--empresa {
            background: #C4D9E5;
            border: 1px solid rgba(15, 23, 42, .06)
        }

        .jobhubMM-cta--cv {
            background: #fff;
            border: 1px solid rgba(15, 23, 42, .10)
        }

        .jobhubMM-link {
            font-size: 16px;
            font-weight: 900;
            color: rgba(15, 23, 42, .88);
            padding: 12px 6px;
            border-bottom: 1px solid rgba(15, 23, 42, .06);
            display: block
        }

        .jobhubMM-actions {
            margin-top: auto;
            display: flex;
            flex-direction: column;
            gap: 10px
        }

        .jobhubMM-btn {
            margin-top: 6px;
            padding: 12px;
            border-radius: 999px;
            font-weight: 900;
            border: 0;
            text-align: center;
            display: inline-flex;
            justify-content: center;
            align-items: center
        }

        .jobhubMM-btn--outline {
            border: 2px solid #2b81a9;
            background: transparent;
            color: #2b81a9
        }

        /* app layout */
        .app {
            max-width: 1800px;
            margin: 0 auto;
            padding: 104px 16px 28px;
            display: grid;
            grid-template-columns: var(--sb-w) minmax(0, 1fr);
            gap: var(--sb-gap);
            min-height: calc(100dvh - 120px);
        }

        @media (max-width:1080px) {
            .app {
                grid-template-columns: var(--sb-mini) minmax(0, 1fr)
            }
        }

        @media (max-width:900px) {
            .app {
                grid-template-columns: 1fr
            }
        }

        .content {
            min-width: 0
        }

        /* sidebar */
        .sb {
            position: sticky;
            top: 108px;
            height: calc(100dvh - 130px);
            background: rgba(255, 255, 255, .92);
            border: 1px solid rgba(229, 231, 235, .92);
            border-radius: 20px;
            box-shadow: var(--shadow);
            padding: 14px;
            overflow: hidden;
            backdrop-filter: blur(10px);
            display: flex;
            flex-direction: column;
        }

        .sb-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 10px
        }

        .sb-title b {
            font-family: Montserrat, sans-serif;
            font-weight: 950;
            color: var(--azul2);
            font-size: 13px;
            letter-spacing: -.2px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis
        }

        .sb-close {
            display: none;
            height: 44px;
            width: 44px;
            border-radius: 14px;
            border: 1px solid rgba(15, 23, 42, .10);
            background: #fff;
            box-shadow: var(--shadow2);
            font-size: 18px
        }

        @media(max-width:1080px) {

            .sb .sb-label,
            .sb .sb-titleText {
                display: none
            }

            .sb {
                width: var(--sb-mini)
            }
        }

        .sbOverlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(2, 6, 23, .55);
            z-index: 9996;
            opacity: 0;
            transition: .18s ease
        }

        .sbOverlay.show {
            opacity: 1
        }

        .fabMenu {
            display: none;
            position: fixed;
            right: 16px;
            bottom: 16px;
            height: 54px;
            width: 54px;
            border-radius: 18px;
            border: none;
            background: var(--azul);
            color: #fff;
            box-shadow: 0 18px 50px rgba(31, 117, 216, .30);
            z-index: 9995;
            font-size: 20px
        }

        @media(max-width:900px) {
            .sb {
                position: fixed;
                top: 100px;
                left: 12px;
                right: 12px;
                width: auto;
                height: auto;
                max-height: calc(100dvh - 120px);
                transform: translateY(-12px);
                opacity: 0;
                pointer-events: none;
                transition: .18s ease;
                z-index: 9997
            }

            .sb.open {
                opacity: 1;
                transform: translateY(0);
                pointer-events: auto
            }

            .sbOverlay {
                display: block;
                pointer-events: none
            }

            .sbOverlay.show {
                pointer-events: auto
            }

            .sb-close {
                display: inline-flex;
                align-items: center;
                justify-content: center
            }

            .fabMenu {
                display: grid;
                place-items: center
            }
        }

        .sb-nav {
            display: flex;
            flex-direction: column;
            gap: 10px
        }

        .sb-btn {
            height: 44px;
            border-radius: 16px;
            border: 1px solid rgba(229, 231, 235, .92);
            background: #fff;
            box-shadow: 0 10px 24px rgba(15, 23, 42, .06);
            padding: 0 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 950;
            font-size: 13px;
            color: rgba(15, 23, 42, .90);
            transition: .14s ease;
            user-select: none;
            text-align: left;
            max-width: 300px;
            width: 100%;
        }

        .sb-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 14px 30px rgba(15, 23, 42, .10)
        }

        .sb-btn.primary {
            border: none;
            background: linear-gradient(90deg, var(--azul), #2b81a9);
            color: #fff;
            box-shadow: 0 14px 30px rgba(31, 117, 216, .18)
        }

        .sb-ico {
            width: 34px;
            height: 34px;
            border-radius: 14px;
            display: grid;
            place-items: center;
            background: rgba(31, 117, 216, .10);
            border: 1px solid rgba(31, 117, 216, .14);
            color: var(--azul2);
            flex: 0 0 auto
        }

        .sb-btn.primary .sb-ico {
            background: rgba(255, 255, 255, .14);
            border-color: rgba(255, 255, 255, .20);
            color: #fff
        }

        .sb-label {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0
        }

        .sb-label small {
            font-size: 11px;
            color: var(--muted);
            font-weight: 800;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis
        }

        .sb-group {
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px solid rgba(15, 23, 42, .06)
        }

        .pill {
            font-size: 11px;
            padding: 6px 10px;
            border-radius: 999px;
            background: rgba(31, 117, 216, .10);
            border: 1px solid rgba(31, 117, 216, .18);
            color: var(--azul2);
            font-weight: 950;
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            line-height: 1;
        }

        .pill.ok {
            background: rgba(16, 185, 129, .10);
            border-color: rgba(16, 185, 129, .20);
            color: #065f46
        }

        .pill.warn {
            background: rgba(245, 158, 11, .10);
            border-color: rgba(245, 158, 11, .22);
            color: #92400e
        }

        .pill.bad {
            background: rgba(239, 68, 68, .10);
            border-color: rgba(239, 68, 68, .20);
            color: #991b1b
        }

        .pill.neutral {
            background: rgba(17, 24, 39, .04);
            border-color: rgba(17, 24, 39, .08);
            color: rgba(15, 23, 42, .82);
            margin-bottom: 5px;
            margin-top: 5px;
        }

        /* top hero */
        .dash-top {
            display: grid;
            gap: 10px;
            padding: 18px;
            border-radius: var(--radius);
            border: 1px solid rgba(148, 163, 184, .55);
            background: linear-gradient(135deg, rgba(31, 117, 216, .16), rgba(22, 68, 127, .10));
            box-shadow: 0 14px 36px rgba(15, 23, 42, .10);
            position: relative;
            overflow: hidden;
        }

        .dash-top::after {
            content: "";
            position: absolute;
            inset: -50px -70px auto auto;
            width: 320px;
            height: 320px;
            border-radius: 999px;
            background: radial-gradient(circle at 30% 30%, rgba(31, 117, 216, .22), transparent 60%);
            pointer-events: none;
            filter: blur(2px);
        }

        .dash-title h1 {
            margin: 0;
            font-family: Montserrat, sans-serif;
            font-size: 18px;
            font-weight: 950;
            color: var(--azul2);
            letter-spacing: -.2px
        }

        .dash-title p {
            margin: 6px 0 0;
            font-size: 13px;
            color: var(--muted);
            max-width: 980px;
            line-height: 1.45
        }

        /* card wrapper */
        .card {
            margin-top: 14px;
            background: rgba(255, 255, 255, .92);
            border-radius: var(--radius);
            border: 1px solid rgba(229, 231, 235, .92);
            box-shadow: var(--shadow);
            padding: 14px;
            backdrop-filter: blur(10px);
        }

        .card-hd {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 10px
        }

        .card-title {
            margin: 0;
            font-family: Montserrat, sans-serif;
            font-size: 14px;
            font-weight: 950;
            color: var(--azul2)
        }

        .card-sub {
            margin: 4px 0 0;
            font-size: 12px;
            color: var(--muted)
        }

        /* toolbar */
        .toolbar {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            width: 100%;
            align-items: center;
            justify-content: space-between;
            margin-top: 8px
        }

        .chips {
            display: flex;
            flex-wrap: wrap;
            gap: 8px
        }

        .chip {
            border-radius: 999px;
            padding: 8px 12px;
            font-size: 12px;
            border: 1px solid rgba(148, 163, 184, .7);
            background: #fff;
            color: #374151;
            font-weight: 900;
            line-height: 1;
            transition: .14s ease;
        }

        .chip:hover {
            transform: translateY(-1px)
        }

        .chip.active {
            border-color: rgba(31, 117, 216, .75);
            background: rgba(31, 117, 216, .10);
            color: var(--azul2)
        }

        .tools {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
            justify-content: flex-end
        }

        .search {
            height: 40px;
            border-radius: 999px;
            border: 1px solid rgba(229, 231, 235, .95);
            background: #fff;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 0 12px;
            box-shadow: 0 10px 24px rgba(15, 23, 42, .06);
            min-width: min(360px, 86vw);
        }

        .search i {
            opacity: .7
        }

        .search input {
            border: 0;
            outline: none;
            width: 100%;
            font-size: 13px;
            font-weight: 800;
            color: rgba(15, 23, 42, .92);
            background: transparent
        }

        .search .clear {
            width: 34px;
            height: 34px;
            border-radius: 999px;
            border: 1px solid rgba(15, 23, 42, .10);
            background: rgba(15, 23, 42, .03);
            display: grid;
            place-items: center;
            font-size: 16px;
            color: rgba(15, 23, 42, .74)
        }

        .search .clear:hover {
            background: rgba(15, 23, 42, .08)
        }

        .select {
            height: 40px;
            border-radius: 999px;
            border: 1px solid rgba(229, 231, 235, .95);
            background: #fff;
            padding: 0 12px;
            font-size: 13px;
            font-weight: 900;
            color: rgba(15, 23, 42, .86);
            box-shadow: 0 10px 24px rgba(15, 23, 42, .06);
            outline: none;
        }

        .btn-sm {
            height: 36px;
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
            user-select: none;
        }

        .btn-sm:hover {
            transform: translateY(-1px)
        }

        .btn-sm.primary {
            border: none;
            background: linear-gradient(90deg, var(--azul), #2b81a9);
            color: #fff;
            box-shadow: 0 12px 24px rgba(31, 117, 216, .16)
        }

        .btn-sm.danger {
            border-color: rgba(239, 68, 68, .25);
            background: rgba(239, 68, 68, .06);
            color: #991b1b
        }

        .btn-sm.ghost {
            background: rgba(15, 23, 42, .03);
            border-color: rgba(15, 23, 42, .08)
        }

        .rowline {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
            justify-content: space-between;
            margin-top: 10px
        }

        .miniInfo {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center
        }

        .empty {
            border: 1px dashed rgba(148, 163, 184, .65);
            border-radius: var(--radius);
            padding: 16px;
            color: var(--muted);
            background: #fff;
            margin-top: 12px
        }

        .empty.error {
            border-style: solid;
            border-color: rgba(239, 68, 68, .28);
            background: rgba(239, 68, 68, .05);
            color: rgba(127, 29, 29, .95)
        }

        /* toast */
        .toast {
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
            max-width: 380px;
            z-index: 99999;
            display: flex;
            gap: 10px;
            align-items: flex-start;
        }

        .toast.show {
            opacity: 1;
            transform: translateY(0)
        }

        .toast .dot {
            width: 9px;
            height: 9px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .85);
            margin-top: 5px
        }

        /* kanban */
        .kanWrap {
            margin-top: 12px
        }

        .kanGrid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(290px, 1fr));
            gap: 14px;
            min-width: 0
        }

        .kanCol {
            background: rgba(255, 255, 255, .92);
            border: 1px solid rgba(229, 231, 235, .92);
            border-radius: 18px;
            box-shadow: var(--shadow2);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .kanHead {
            padding: 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            background: rgba(249, 250, 251, .92);
            border-bottom: 1px solid rgba(229, 231, 235, .92);
            position: sticky;
            top: 0;
            z-index: 2;
        }

        .kanHead b {
            font-family: Montserrat, sans-serif;
            font-weight: 950;
            color: var(--azul2);
            font-size: 13px;
            letter-spacing: -.2px;
            display: flex;
            align-items: center;
            gap: 8px
        }

        .kanCount {
            font-size: 12px;
            font-weight: 950;
            color: rgba(15, 23, 42, .70);
            background: rgba(15, 23, 42, .05);
            border: 1px solid rgba(15, 23, 42, .08);
            padding: 6px 10px;
            border-radius: 999px;
            white-space: nowrap
        }

        .kanBody {
            padding: 12px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            min-height: 380px
        }

        .kanBody.dropHint {
            border: 2px dashed rgba(31, 117, 216, .28);
            background: rgba(31, 117, 216, .05)
        }

        .candCard {
            background: #fff;
            border: 1px solid rgba(229, 231, 235, .92);
            border-radius: 16px;
            box-shadow: 0 10px 22px rgba(15, 23, 42, .06);
            padding: 12px;
            cursor: grab;
            user-select: none;
            transition: transform .12s ease, box-shadow .12s ease, border-color .12s ease;
            position: relative;
        }

        .candCard:hover {
            transform: translateY(-1px);
            box-shadow: 0 14px 30px rgba(15, 23, 42, .10)
        }

        .candCard:active {
            cursor: grabbing
        }

        .candCard[draggable="false"] {
            cursor: default;
            opacity: .92
        }

        .candCard .dragHandle {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 28px;
            height: 28px;
            border-radius: 10px;
            border: 1px solid rgba(15, 23, 42, .10);
            background: rgba(15, 23, 42, .03);
            display: grid;
            place-items: center;
            color: rgba(15, 23, 42, .65);
            display: none;
        }

        .candCard .dragHandle i {
            font-size: 13px
        }

        .candHeader {
            display: flex;
            align-items: flex-start;
            gap: 10px
        }

        .candAvatar {
            width: 44px;
            height: 44px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            flex: 0 0 auto;
            background: rgba(31, 117, 216, .12);
            border: 1px solid rgba(31, 117, 216, .22);
            color: var(--azul2);
            box-shadow: 0 10px 18px rgba(15, 23, 42, .06);
        }

        .candMain {
            min-width: 0;
            flex: 1
        }

        .candTop {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            align-items: flex-start
        }

        .candName {
            font-family: Montserrat, sans-serif;
            font-weight: 950;
            color: var(--azul2);
            font-size: 14px;
            line-height: 1.2
        }

        .candMeta {
            margin-top: 9px;
            font-size: 12px;
            color: var(--muted);
            font-weight: 800;
            line-height: 1.35;
            opacity: .92
        }

        .candBadges {
            margin-top: 10px;
            border-top: 1px solid rgba(15, 23, 42, .06);
            padding-top: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center
        }

        .dragGhost {
            opacity: .60;
            transform: scale(.99)
        }

        /* skeleton */
        .sk {
            background: linear-gradient(90deg, rgba(15, 23, 42, .06), rgba(15, 23, 42, .03), rgba(15, 23, 42, .06));
            background-size: 200% 100%;
            animation: shimmer 1.1s infinite linear;
            border-radius: 12px;
        }

        @keyframes shimmer {
            0% {
                background-position: 200% 0
            }

            100% {
                background-position: -200% 0
            }
        }

        @media(prefers-reduced-motion:reduce) {
            * {
                transition: none !important;
                animation: none !important;
                scroll-behavior: auto !important
            }
        }
    </style>

    <style>
        body {
            background:
                radial-gradient(1200px 500px at 15% 0%, rgba(31, 117, 216, .12), transparent 60%),
                radial-gradient(900px 480px at 90% 18%, rgba(22, 68, 127, .10), transparent 55%),
                var(--bg);
        }

        .card {
            background: rgba(255, 255, 255, .86);
            border: 1px solid rgba(148, 163, 184, .35);
        }

        .toolbar {
            padding: 10px;
            border-radius: 18px;
            background: rgba(255, 255, 255, .72);
            border: 1px solid rgba(229, 231, 235, .85);
            box-shadow: 0 10px 24px rgba(15, 23, 42, .06);
        }

        .chips {
            background: rgba(15, 23, 42, .03);
            padding: 6px;
            border-radius: 999px;
            border: 1px solid rgba(15, 23, 42, .06);
            gap: 6px;
        }

        .chip {
            border: 0;
            background: transparent;
            box-shadow: none;
            padding: 10px 14px;
            border-radius: 999px;
        }

        .chip.active {
            background: #fff;
            border: 1px solid rgba(31, 117, 216, .28);
            box-shadow: 0 10px 22px rgba(15, 23, 42, .06);
        }

        .btn-sm.primary {
            box-shadow: 0 14px 34px rgba(31, 117, 216, .22);
        }

        .btn-sm.ghost:hover,
        .btn-sm:hover {
            filter: brightness(1.01);
        }

        .kanCol {
            border: 1px solid rgba(148, 163, 184, .35);
            background: rgba(255, 255, 255, .84);
            box-shadow: 0 16px 40px rgba(15, 23, 42, .10);
        }

        .kanCol::before {
            content: "";
            height: 4px;
            background: linear-gradient(90deg, rgba(31, 117, 216, .95), rgba(43, 129, 169, .85));
            display: block;
        }

        .kanHead {
            background: rgba(255, 255, 255, .72);
            backdrop-filter: blur(8px);
        }

        .kanCol[data-col="NOVO"]::before {
            background: linear-gradient(90deg, rgba(15, 23, 42, .40), rgba(31, 117, 216, .55));
        }

        .kanCol[data-col="EM_ANALISE"]::before {
            background: linear-gradient(90deg, rgba(245, 158, 11, .85), rgba(31, 117, 216, .55));
        }

        .kanCol[data-col="APROVADO"]::before {
            background: linear-gradient(90deg, rgba(16, 185, 129, .90), rgba(31, 117, 216, .45));
        }

        .kanCol[data-col="REPROVADO"]::before {
            background: linear-gradient(90deg, rgba(239, 68, 68, .90), rgba(31, 117, 216, .35));
        }

        .candCard {
            border: 1px solid rgba(148, 163, 184, .30);
            background: rgba(255, 255, 255, .92);
            box-shadow: 0 12px 26px rgba(15, 23, 42, .08);
            padding: 0px 12px 10px;
        }

        .candCard:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 44px rgba(15, 23, 42, .14);
            border-color: rgba(31, 117, 216, .28);
        }

        .candAvatar {
            border-radius: 18px;
            width: 46px;
            height: 46px;
            background:
                radial-gradient(circle at 30% 30%, rgba(255, 255, 255, .9), transparent 55%),
                rgba(31, 117, 216, .14);
        }

        .candName {
            letter-spacing: -.2px;
        }

        .candActions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            border-top: 1px solid rgba(15, 23, 42, .06);
            opacity: .0;
            transform: translateY(4px);
            transition: .14s ease;
        }

        .candCard:hover .candActions,
        .sb-btn[aria-pressed="true"]~* .candActions {
            opacity: 1;
            transform: translateY(0);
        }

        .actionBtn {
            height: 34px;
            padding: 0 10px;
            border-radius: 999px;
            border: 1px solid rgba(15, 23, 42, .10);
            background: rgba(255, 255, 255, .90);
            font-weight: 950;
            font-size: 12px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 10px 22px rgba(15, 23, 42, .06);
        }

        .actionBtn:hover {
            transform: translateY(-1px);
        }

        .actionBtn.ok {
            border-color: rgba(16, 185, 129, .25);
            background: rgba(16, 185, 129, .06);
            color: #065f46;
        }

        .actionBtn.warn {
            border-color: rgba(245, 158, 11, .25);
            background: rgba(245, 158, 11, .06);
            color: #92400e;
        }

        .actionBtn.bad {
            border-color: rgba(239, 68, 68, .25);
            background: rgba(239, 68, 68, .06);
            color: #991b1b;
        }

        .candCard .dragHandle {
            background: rgba(255, 255, 255, .72);
            backdrop-filter: blur(6px);
            border-color: rgba(148, 163, 184, .35);
        }

        .kanBody.dropHint {
            border-color: rgba(31, 117, 216, .35);
        }

        #viewTabela table {
            box-shadow: 0 16px 40px rgba(15, 23, 42, .10);
            border: 1px solid rgba(148, 163, 184, .35) !important;
        }

        #viewTabela thead th {
            background: rgba(255, 255, 255, .75) !important;
            backdrop-filter: blur(8px);
        }

        .miniInfo .pill {
            box-shadow: 0 10px 20px rgba(15, 23, 42, .06);
        }

        @media (max-width: 900px) {
            .toolbar {
                padding: 12px;
            }

            .search {
                min-width: 100%;
            }
        }

        .candCard {
            position: relative;
        }

        .candCard[data-hasphone="1"]::after {
            content: "Clique aqui para entrar em contato";
            position: absolute;
            left: 12px;
            right: 12px;
            bottom: 10px;
            padding: 10px 12px;
            border-radius: 14px;
            background: rgba(11, 18, 32, .92);
            color: #fff;
            font-size: 12px;
            font-weight: 900;
            letter-spacing: .2px;
            opacity: 0;
            transform: translateY(6px);
            pointer-events: none;
            transition: .14s ease;
            box-shadow: 0 16px 40px rgba(0, 0, 0, .28);
        }

        .candCard[data-hasphone="1"]:hover::after {
            opacity: 1;
            transform: translateY(0);
        }

        .candCard[data-hasphone="1"] {
            cursor: pointer;
        }

        .candCard.dragGhost::after {
            opacity: 0 !important;
        }

        /* modal */
        .mOverlay {
            position: fixed;
            inset: 0;
            background: rgba(2, 6, 23, .55);
            opacity: 0;
            transition: opacity .18s ease;
            z-index: 99990;
        }

        .mOverlay.show {
            opacity: 1;
        }

        .mModal {
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -48%);
            width: min(720px, 92vw);
            max-height: min(78vh, 760px);
            background: rgba(255, 255, 255, .94);
            border: 1px solid rgba(148, 163, 184, .35);
            border-radius: 18px;
            box-shadow: 0 30px 90px rgba(15, 23, 42, .24);
            backdrop-filter: blur(10px);
            z-index: 99991;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            opacity: 0;
            transition: opacity .18s ease, transform .18s ease;
        }

        .mModal.show {
            opacity: 1;
            transform: translate(-50%, -50%);
        }

        .mHead {
            padding: 14px 14px 12px;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            border-bottom: 1px solid rgba(229, 231, 235, .92);
            background: rgba(249, 250, 251, .72);
        }

        .mTitle {
            font-family: Montserrat, sans-serif;
            font-weight: 950;
            color: var(--azul2);
            font-size: 14px;
            letter-spacing: -.2px;
        }

        .mSub {
            margin-top: 4px;
            color: var(--muted);
            font-size: 12px;
            font-weight: 800;
            line-height: 1.3;
            word-break: break-word;
        }

        .mClose {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            border: 1px solid rgba(15, 23, 42, .10);
            background: #fff;
            box-shadow: var(--shadow2);
            font-size: 16px;
            display: grid;
            place-items: center;
        }

        .mBody {
            padding: 14px;
            overflow: auto;
        }

        .mGrid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        @media(max-width:700px) {
            .mGrid {
                grid-template-columns: 1fr;
            }
        }

        /* modal */
        .mOverlay {
            position: fixed;
            inset: 0;
            background: rgba(2, 6, 23, .55);
            opacity: 0;
            transition: opacity .18s ease;
            z-index: 99990;
        }

        .mOverlay.show {
            opacity: 1;
        }

        .mModal {
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -48%);
            width: min(720px, 92vw);
            max-height: min(78vh, 760px);
            background: rgba(255, 255, 255, .94);
            border: 1px solid rgba(148, 163, 184, .35);
            border-radius: 18px;
            box-shadow: 0 30px 90px rgba(15, 23, 42, .24);
            backdrop-filter: blur(10px);
            z-index: 99991;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            opacity: 0;
            transition: opacity .18s ease, transform .18s ease;
        }

        .mModal.show {
            opacity: 1;
            transform: translate(-50%, -50%);
        }

        .mHead {
            padding: 14px 14px 12px;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            border-bottom: 1px solid rgba(229, 231, 235, .92);
            background: rgba(249, 250, 251, .72);
        }

        .mTitle {
            font-family: Montserrat, sans-serif;
            font-weight: 950;
            color: var(--azul2);
            font-size: 14px;
            letter-spacing: -.2px;
        }

        .mSub {
            margin-top: 4px;
            color: var(--muted);
            font-size: 12px;
            font-weight: 800;
            line-height: 1.3;
            word-break: break-word;
        }

        .mClose {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            border: 1px solid rgba(15, 23, 42, .10);
            background: #fff;
            box-shadow: var(--shadow2);
            font-size: 16px;
            display: grid;
            place-items: center;
        }

        .mBody {
            padding: 14px;
            overflow: auto;
        }

        .mGrid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        @media(max-width:700px) {
            .mGrid {
                grid-template-columns: 1fr;
            }
        }

        .mField {
            border: 1px solid rgba(229, 231, 235, .92);
            background: rgba(255, 255, 255, .90);
            border-radius: 16px;
            padding: 10px 12px;
            box-shadow: 0 10px 24px rgba(15, 23, 42, .06);
            min-width: 0;
        }

        .mField small {
            display: block;
            color: rgba(15, 23, 42, .62);
            font-size: 11px;
            font-weight: 950;
            letter-spacing: .2px;
            text-transform: uppercase;
        }

        .mField b {
            display: block;
            margin-top: 6px;
            font-size: 13px;
            font-weight: 900;
            color: rgba(15, 23, 42, .92);
            word-break: break-word;
        }

        .mFoot {
            padding: 12px 14px;
            border-top: 1px solid rgba(229, 231, 235, .92);
            background: rgba(249, 250, 251, .72);
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            flex-wrap: wrap;
        }
    </style>

</head>

<body>

    <script>
        window.URL_BASE = "<?= URL_BASE ?>";
        window.JobHub_API_BASE = window.JobHub_API_BASE || <?= api_base_json() ?>;
        window.JobHub_ROUTES = {
            HOME: "<?= URL_BASE ?>",
            EMPRESA_AREA: "<?= URL_BASE ?>recrutador",
            VAGAS: "<?= URL_BASE ?>recrutador/perfil/",
            LOGIN: "<?= URL_BASE ?>inicio"
        };
    </script>

    <header class="jobhubH-shell" id="jobhubHeader">
        <div class="jobhubH-wrap">
            <a href="<?= URL_BASE ?>" class="jobhubH-logo" aria-label="Ir para a Home">
                <img src="<?= URL_BASE ?>assets/img/logo_preta.svg" alt="EmpresaDemo" class="jobhubH-logoImg">
            </a>

            <nav class="jobhubH-nav" aria-label="Navegação principal">
                <a href="<?= URL_BASE ?>cadastrar/recrutador" class="jobhubH-cta jobhubH-cta--empresa" data-guard="logged-out">Anunciar vagas grátis</a>
                <a href="<?= URL_BASE ?>cadastrar/candidato" class="jobhubH-cta jobhubH-cta--cv" data-guard="logged-out">Cadastrar CV grátis</a>

                <button class="jobhubH-cta jobhubH-cta--cv" id="btnLogoutHeader" type="button" style="font-weight:950">
                    <i class="fa-solid fa-right-from-bracket"></i>&nbsp; Sair
                </button>
            </nav>

            <button class="jobhubH-burger" id="openMobileMenu" type="button" aria-label="Abrir menu" aria-controls="mobileMenu" aria-expanded="false">☰</button>
        </div>
    </header>

    <div class="jobhubMM-overlay" id="mobileOverlay" hidden></div>
    <aside class="jobhubMM-panel" id="mobileMenu" aria-hidden="true" role="dialog" aria-label="Menu" hidden>
        <div class="jobhubMM-top">
            <a class="jobhubMM-brand" href="<?= URL_BASE ?>" aria-label="Ir para a Home">
                <img src="<?= URL_BASE ?>assets/img/logo_preta.svg" alt="EmpresaDemo">
            </a>
            <button class="jobhubMM-close" id="closeMobileMenu" type="button" aria-label="Fechar menu">×</button>
        </div>

        <div class="jobhubMM-ctaWrap">
            <a class="jobhubMM-cta jobhubMM-cta--empresa" href="<?= URL_BASE ?>cadastrar/recrutador" data-guard="logged-out">Anunciar vagas grátis</a>
            <a class="jobhubMM-cta jobhubMM-cta--cv" href="<?= URL_BASE ?>cadastrar/candidato" data-guard="logged-out">Cadastrar CV grátis</a>
        </div>

        <nav aria-label="Atalhos">
            <a class="jobhubMM-link" href="<?= URL_BASE ?>empresa" data-guard="logged-out">Para empresas</a>
            <a class="jobhubMM-link" href="<?= URL_BASE ?>cadastrar" data-guard="logged-out">Enviar Currículo</a>
            <a class="jobhubMM-link" href="<?= URL_BASE ?>recrutador/perfil/">Ver vagas</a>
        </nav>

        <div class="jobhubMM-actions">
            <button class="jobhubMM-btn jobhubMM-btn--outline" id="btnLogoutMobile" type="button">Sair</button>
        </div>
    </aside>

    <div class="app">
        <div class="sbOverlay" id="sbOverlay" hidden></div>
        <button class="fabMenu" id="fabMenu" type="button" aria-label="Abrir menu do painel">
            <i class="fa-solid fa-bars"></i>
        </button>

        <aside class="sb" id="sidebar">
            <div class="sb-top">
                <div class="sb-title">
                    <b class="sb-titleText">Painel da Empresa</b>
                </div>
                <button class="sb-close" id="sbClose" type="button" aria-label="Fechar menu">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <nav class="sb-nav" aria-label="Menu do painel">
                <button class="sb-btn" id="sbVerVagas" type="button">
                    <span class="sb-ico"><i class="fa-solid fa-briefcase"></i></span>
                    <span class="sb-label"><span>Ver vagas</span><small>Lista e filtros</small></span>
                </button>


            </nav>

            <div class="sb-group">
                <button class="sb-btn" id="sbModoEditar" type="button" aria-pressed="false">
                    <span class="sb-ico"><i class="fa-solid fa-pen-to-square"></i></span>
                    <span class="sb-label"><span>Modo edição</span><small>Arrastar / ações</small></span>
                </button>
            </div>

            <div class="sb-group">
                <div style="display:flex;flex-wrap:wrap;gap:8px;">
                    <span class="pill neutral" id="companyMini"><i class="fa-solid fa-building"></i> Empresa: —</span>
                    <span class="pill neutral" id="lastUpdateMini"><i class="fa-regular fa-clock"></i> Atualizado: —</span>
                    <span class="pill neutral" id="editModeMini" style="display:none;"><i class="fa-solid fa-hand-pointer"></i> Arraste para mover</span>
                </div>
            </div>
        </aside>

        <main class="content">
            <section class="dash-top">
                <div class="dash-title">
                    <h1>Candidatos</h1>

                </div>
            </section>

            <section class="card" id="secCandidatos">
                <div class="card-hd">
                    <div>
                        <h2 class="card-title">Pipeline de candidatos</h2>
                    </div>
                </div>

                <div class="toolbar">
                    <div class="chips" id="chipsStatus" aria-label="Filtrar por status">
                        <button class="chip active" data-v="TODOS" type="button">Todos</button>
                        <button class="chip" data-v="NOVO" type="button">Novo</button>
                        <button class="chip" data-v="EM_ANALISE" type="button">Em análise</button>
                        <button class="chip" data-v="APROVADO" type="button">Aprovado</button>
                        <button class="chip" data-v="REPROVADO" type="button">Reprovado</button>
                    </div>

                    <div class="tools">
                        <div class="viewToggle" aria-label="Alternar visualização" style="display:flex;gap:8px;flex-wrap:wrap;align-items:center">
                            <button class="btn-sm primary" id="btnViewKanban" type="button"><i class="fa-solid fa-table-columns"></i> Kanban</button>
                            <button class="btn-sm" id="btnViewTabela" type="button"><i class="fa-solid fa-table"></i> Tabela</button>
                        </div>

                        <div class="search" role="search" aria-label="Buscar candidatos">
                            <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                            <input id="candSearch" type="search" placeholder="Buscar por nome, email, cidade..." autocomplete="off" />
                            <button class="clear" id="clearCandSearch" type="button" aria-label="Limpar busca">×</button>
                        </div>

                        <select class="select" id="candSort" aria-label="Ordenar candidatos">
                            <option value="recent" selected>Mais recentes</option>
                            <option value="name">Nome (A–Z)</option>
                            <option value="status">Status</option>
                        </select>

                        <button class="btn-sm primary" id="btnRefresh" type="button">
                            <i class="fa-solid fa-rotate-right"></i> Atualizar
                        </button>
                    </div>
                </div>

                <div class="rowline">
                    <div class="miniInfo">
                        <span class="pill neutral" id="pillTotal"><i class="fa-solid fa-users"></i> total: —</span>
                        <span class="pill neutral" id="pillVaga"><i class="fa-solid fa-filter"></i> vagaId: —</span>
                        <span class="pill neutral" id="pillHint"><i class="fa-solid fa-shield"></i> somente minhas vagas</span>
                    </div>

                    <div class="miniInfo">
                        <button class="btn-sm ghost" id="btnClearVaga" type="button" title="Remover filtro vagaId">
                            <i class="fa-solid fa-filter-circle-xmark"></i> Limpar vagaId
                        </button>
                    </div>
                </div>

                <div id="candError" class="empty error" style="display:none;">
                    <b>Não consegui carregar os candidatos.</b>
                    <div id="candErrorMsg" style="margin-top:6px;">—</div>
                    <div style="margin-top:10px; display:flex; gap:10px; flex-wrap:wrap;">
                        <button class="btn-sm primary" id="btnRetry" type="button"><i class="fa-solid fa-rotate-right"></i> Tentar novamente</button>
                    </div>
                </div>

                <div id="candLoading" style="display:none; margin-top:12px;">
                    <div class="kanGrid">
                        <section class="kanCol">
                            <div class="kanHead"><b>Carregando…</b><span class="kanCount">—</span></div>
                            <div class="kanBody">
                                <div class="candCard">
                                    <div class="sk" style="height:14px;width:65%"></div>
                                    <div class="sk" style="height:10px;width:90%;margin-top:10px"></div>
                                    <div class="sk" style="height:10px;width:75%;margin-top:6px"></div>
                                </div>
                                <div class="candCard">
                                    <div class="sk" style="height:14px;width:55%"></div>
                                    <div class="sk" style="height:10px;width:86%;margin-top:10px"></div>
                                    <div class="sk" style="height:10px;width:70%;margin-top:6px"></div>
                                </div>
                            </div>
                        </section>
                        <section class="kanCol">
                            <div class="kanHead"><b>Carregando…</b><span class="kanCount">—</span></div>
                            <div class="kanBody"></div>
                        </section>
                        <section class="kanCol">
                            <div class="kanHead"><b>Carregando…</b><span class="kanCount">—</span></div>
                            <div class="kanBody"></div>
                        </section>
                        <section class="kanCol">
                            <div class="kanHead"><b>Carregando…</b><span class="kanCount">—</span></div>
                            <div class="kanBody"></div>
                        </section>
                    </div>
                </div>

                <div id="viewKanban" class="kanWrap" style="display:block;">
                    <div class="kanGrid" id="kanGrid"></div>
                </div>

                <div id="viewTabela" style="display:none; margin-top:12px;"></div>

                <div id="candEmpty" class="empty" style="display:none;">
                    Nenhum candidato encontrado com os filtros atuais.
                </div>
            </section>
        </main>
    </div>

    <div class="toast" id="toast" role="status" aria-live="polite">
        <span class="dot" aria-hidden="true"></span>
        <span id="toastText">—</span>
    </div>
    <!-- MODAL DETALHES -->
    <div id="candModalOverlay" class="mOverlay" hidden></div>

    <section id="candModal" class="mModal" hidden role="dialog" aria-modal="true" aria-labelledby="candModalTitle">
        <header class="mHead">
            <div style="min-width:0">
                <div id="candModalTitle" class="mTitle">Detalhes do candidato</div>
                <div id="candModalSub" class="mSub">—</div>
            </div>

            <button id="candModalClose" class="mClose" type="button" aria-label="Fechar">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </header>

        <div class="mBody" id="candModalBody"></div>

        <footer class="mFoot">
            <button class="btn-sm ghost" id="candModalCopy" type="button">
                <i class="fa-regular fa-copy"></i> Copiar
            </button>

            <button class="btn-sm primary" id="candModalWhats" type="button">
                <i class="fa-brands fa-whatsapp"></i> WhatsApp
            </button>
        </footer>
    </section>

    <script>
        (() => {
            "use strict";

            const URL_BASE = window.URL_BASE || "/";
            const ROUTES = window.JobHub_ROUTES || {};
            const API_BASE = window.JobHub_API_BASE || "";
            const LOGIN_URL = (ROUTES.LOGIN ? `${ROUTES.LOGIN}?mode=recrutador` : `${URL_BASE}login?mode=recrutador`);

            const STATUS = ["NOVO", "EM_ANALISE", "APROVADO", "REPROVADO"];
            const $ = (s, el = document) => el.querySelector(s);

            const SHOW_PRE_CANDIDATURAS = true;

            function setText(sel, v) {
                const el = $(sel);
                if (el) el.textContent = String(v ?? "");
            }

            function setDisplay(sel, show, display = "block") {
                const el = $(sel);
                if (el) el.style.display = show ? display : "none";
            }

            const toastEl = $("#toast");
            const toastText = $("#toastText");

            function toast(msg) {
                if (!toastEl) return;
                toastText.textContent = String(msg || "");
                toastEl.classList.add("show");
                clearTimeout(toastEl._t);
                toastEl._t = setTimeout(() => toastEl.classList.remove("show"), 1700);
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

            function getToken() {
                return localStorage.getItem("token") || localStorage.getItem("access_token") || localStorage.getItem("jwt") || "";
            }

            function clearAuthStorage() {
                ["token", "role", "empresa_me", "recrutador_me", "me", "user", "candidato_me", "candidato_id", "accessToken", "access_token", "jwt", "AUTH_TOKEN"].forEach(k => localStorage.removeItem(k));
                sessionStorage.removeItem("empresaDemo.session.v1");
            }

            function ensureAuthOrRedirect() {
                const token = getToken();
                if (!token) {
                    toast("Faça login.");
                    setTimeout(() => location.replace(LOGIN_URL), 700);
                    return false;
                }
                if (isTokenExpired(token)) {
                    toast("Sessão expirou.");
                    clearAuthStorage();
                    setTimeout(() => location.replace(LOGIN_URL), 800);
                    return false;
                }
                return true;
            }

            async function bridgeToken() {
                const token = getToken();
                if (!token) return {
                    ok: false,
                    message: "Token não encontrado."
                };

                const resp = await fetch(`${URL_BASE}recrutador/bridge`, {
                    method: "POST",
                    credentials: "same-origin",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        token
                    })
                });

                const raw = await resp.text().catch(() => "");
                let data = null;
                try {
                    data = raw ? JSON.parse(raw) : null;
                } catch {}
                if (!resp.ok) throw new Error((data && (data.message || data.error)) || raw || `HTTP ${resp.status}`);
                return data || {
                    ok: true
                };
            }

            async function requestJSON(url, {
                method = "GET",
                body = null,
                signal = null
            } = {}) {
                const resp = await fetch(url, {
                    method,
                    credentials: "same-origin",
                    headers: body ? {
                        "Content-Type": "application/json"
                    } : {},
                    body: body ? JSON.stringify(body) : null,
                    signal
                });

                const ctype = (resp.headers.get("content-type") || "").toLowerCase();
                const raw = await resp.text().catch(() => "");

                if (!ctype.includes("application/json")) {
                    throw new Error(
                        `Endpoint não retornou JSON.\n` +
                        `URL: ${url}\n` +
                        `Content-Type: ${ctype || "(vazio)"}\n` +
                        `Início da resposta: ${raw.slice(0, 120)}`
                    );
                }

                let data = null;
                try {
                    data = raw ? JSON.parse(raw) : null;
                } catch {
                    throw new Error(`JSON inválido em ${url}: ${raw.slice(0, 120)}`);
                }

                if (resp.status === 401 || resp.status === 403) throw new Error("Não autorizado (sessão expirada).");
                if (!resp.ok) {
                    const msg = (data && (data.message || data.error || data.mensagem)) || `HTTP ${resp.status}`;
                    throw new Error(msg);
                }
                return data ?? {};
            }

            function escapeHTML(str) {
                return String(str ?? "")
                    .replaceAll("&", "&amp;").replaceAll("<", "&lt;").replaceAll(">", "&gt;")
                    .replaceAll('"', "&quot;").replaceAll("'", "&#039;");
            }

            function normalize(s) {
                return String(s || "").toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            }

            function fmtPhone(v) {
                const d = String(v || "").replace(/\D/g, "");
                if (d.length === 11) return `(${d.slice(0,2)}) ${d.slice(2,7)}-${d.slice(7)}`;
                if (d.length === 10) return `(${d.slice(0,2)}) ${d.slice(2,6)}-${d.slice(6)}`;
                return v || "";
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

            function pillStatus(s) {
                const up = String(s || "").toUpperCase();
                if (up === "NOVO") return `<span class="pill neutral"><i class="fa-regular fa-circle"></i> NOVO</span>`;
                if (up === "EM_ANALISE") return `<span class="pill warn"><i class="fa-solid fa-magnifying-glass"></i> EM ANÁLISE</span>`;
                if (up === "APROVADO") return `<span class="pill ok"><i class="fa-solid fa-circle-check"></i> APROVADO</span>`;
                if (up === "REPROVADO") return `<span class="pill bad"><i class="fa-solid fa-circle-xmark"></i> REPROVADO</span>`;
                return `<span class="pill neutral">${escapeHTML(up || "—")}</span>`;
            }

            function getQueryParams() {
                const u = new URL(location.href);
                return {
                    vagaId: u.searchParams.get("vagaId") || "",
                    status: u.searchParams.get("status") || "",
                    q: u.searchParams.get("q") || ""
                };
            }

            function setQueryParam(key, val) {
                const u = new URL(location.href);
                if (val === null || val === undefined || val === "") u.searchParams.delete(key);
                else u.searchParams.set(key, String(val));
                history.replaceState({}, "", u.toString());
            }

            const statusMapInCandidaturas = {
                ENVIADA: "NOVO",
                EM_ANALISE: "EM_ANALISE",
                ENTREVISTA: "EM_ANALISE", // se quiser um 5º status no kanban, eu ajusto
                APROVADO: "APROVADO",
                REPROVADO: "REPROVADO",
            };

            const statusMapOutCandidaturas = {
                NOVO: "ENVIADA",
                EM_ANALISE: "EM_ANALISE",
                APROVADO: "APROVADO",
                REPROVADO: "REPROVADO",
            };

            const statusMapInPre = {
                INICIADA: "NOVO",
                EMAIL_CONFIRMADO: "EM_ANALISE",
                CONVERTIDA: "APROVADO", // “virou candidatura”
                EXPIRADA: "REPROVADO",
            };

            function canPersistItem(item) {
                return String(item?.origem || "").toLowerCase() === "candidaturas";
            }

            function normalizeCandidateFromDbRow(x) {
                const origem = String(x?.origem || "candidaturas").toLowerCase();
                const id_ref = Number(x?.id_ref ?? 0);
                const cand = (x && typeof x?.candidato === "object" && x.candidato) ? x.candidato : {};

                const vagaId = Number(x?.vaga_id ?? x?.vaga?.id_vaga ?? x?.vaga?.id ?? 0);
                const vagaTitulo = x?.cargo || x?.vaga?.cargo || x?.vaga?.titulo || (vagaId ? `Vaga #${vagaId}` : "—");

                const rawStatus = String(x?.status || "").toUpperCase();

                let status = "NOVO";
                if (origem === "candidaturas") status = statusMapInCandidaturas[rawStatus] || "NOVO";
                else status = statusMapInPre[rawStatus] || "NOVO";

                const candidatoId = Number(
                    x?.candidato_id ??
                    x?.id_candidato ??
                    cand?.id_candidato ??
                    cand?.idCandidato ??
                    cand?.candidato_id ??
                    cand?.candidatoId ??
                    0
                ) || 0;

                const nome =
                    x?.nome_completo ||
                    x?.nome ||
                    cand?.nome_completo ||
                    cand?.nomeCompleto ||
                    cand?.nome ||
                    x?.email ||
                    cand?.email ||
                    "—";

                const email = x?.email || cand?.email || "";
                const telefone = x?.telefone || cand?.telefone || "";

                const cidade = x?.cidade || cand?.cidade || "";
                const estado = x?.estado || cand?.estado || "";
                const cidadeUF = (cidade && estado) ? `${cidade}/${estado}` : (cidade || estado || "—");

                return {
                    origem,
                    id_ref,
                    id: id_ref,
                    nome,
                    email,
                    telefone,
                    cidadeUF,
                    status: STATUS.includes(status) ? status : "NOVO",
                    vagaId,
                    vagaTitulo,
                    createdAt: x?.created_at || cand?.created_at || null,
                    rawStatus,
                    candidatoId
                };
            }

            const Api = {
                async listCandidates({
                    vagaId = "",
                    status = "",
                    q = ""
                } = {}, signal = null) {
                    const u = new URL(`${URL_BASE}recrutador/candidatos`, location.origin);
                    if (vagaId) u.searchParams.set("vagaId", vagaId);
                    if (status && status !== "TODOS") {
                        // aqui status é do KANBAN, mas o backend filtra pelo status do DB.
                        // então vamos mandar status DB equivalente só para candidaturas.
                        // (pra não “sumir” pre_candidaturas por filtro)
                        const st = String(status).toUpperCase();
                        const dbSt = statusMapOutCandidaturas[st] || "";
                        if (dbSt) u.searchParams.set("status", dbSt);
                    }
                    if (q) u.searchParams.set("q", q);

                    const data = await requestJSON(u.toString(), {
                        signal
                    });
                    const items = Array.isArray(data?.items) ? data.items : (Array.isArray(data) ? data : []);
                    let normalized = items.map(normalizeCandidateFromDbRow);

                    // ✅ por padrão, não mostra pre_candidaturas no kanban/tabela
                    if (!SHOW_PRE_CANDIDATURAS) {
                        normalized = normalized.filter(it => it.origem === "candidaturas");
                    }

                    return normalized;
                },

                async updateCandidateStatus(item, newKanbanStatus) {
                    // ✅ só persiste candidaturas (enum compatível)
                    if (!canPersistItem(item)) {
                        throw new Error("Esse card é pré-candidatura e não persiste no Kanban de candidatos.");
                    }

                    const url = `${URL_BASE}recrutador/atualizarStatusCandidatos`;

                    const kan = String(newKanbanStatus).toUpperCase();
                    const statusToSend = statusMapOutCandidaturas[kan] || "ENVIADA";

                    const res = await requestJSON(url, {
                        method: "POST",
                        body: {
                            origem: item.origem,
                            id_ref: Number(item.id_ref || item.id),
                            status: statusToSend
                        }
                    });

                    // backend pode não mandar ok:true. então aceita se não veio erro, mas se vier ok=false, trata.
                    if (res && res.ok === false) {
                        throw new Error(res?.message || "Backend recusou atualização.");
                    }

                    return {
                        ...res,
                        _sentStatus: statusToSend
                    };
                },
                async getCandidateDetail({
                    candidatoId,
                    vagaId
                } = {}, signal = null) {
                    const u = new URL(`${URL_BASE}recrutador/candidatoDetalhe`, location.origin);
                    u.searchParams.set("candidatoId", String(candidatoId || ""));
                    if (vagaId) u.searchParams.set("vagaId", String(vagaId));
                    return await requestJSON(u.toString(), {
                        signal
                    });
                },

                async getCandidateVideoUrl({
                    candidatoId
                } = {}, signal = null) {
                    const id = Number(candidatoId || 0);
                    if (!id || !API_BASE) return "";

                    const token = getToken();
                    if (!token) return "";

                    const url = `${API_BASE.replace(/\/+$/, "")}/candidatos/${id}/video/url`;
                    const resp = await fetch(url, {
                        method: "GET",
                        signal,
                        headers: {
                            "Accept": "application/json",
                            "Authorization": `Bearer ${token}`
                        }
                    });

                    if (resp.status === 404 || resp.status === 204) return "";

                    const ctype = (resp.headers.get("content-type") || "").toLowerCase();
                    const raw = await resp.text().catch(() => "");

                    if (!resp.ok) {
                        let data = null;
                        try {
                            data = raw ? JSON.parse(raw) : null;
                        } catch {}
                        const msg = (data && (data.message || data.error || data.mensagem)) || raw || `HTTP ${resp.status}`;
                        throw new Error(msg);
                    }

                    if (!ctype.includes("application/json")) {
                        return String(raw || "").trim();
                    }

                    let data = null;
                    try {
                        data = raw ? JSON.parse(raw) : null;
                    } catch {
                        return "";
                    }

                    return String(
                        data?.url ||
                        data?.videoUrl ||
                        data?.link ||
                        data?.path ||
                        data?.arquivoUrl ||
                        data?.data?.url ||
                        data?.data?.videoUrl ||
                        ""
                    ).trim();
                }

            };

            const state = {
                items: [],
                filtroStatus: "TODOS",
                query: "",
                sort: "recent",
                view: "KANBAN",
                vagaId: "",
                editMode: false
            };

            function setLastUpdate(dt) {
                const d = dt || new Date();
                const fmt = `${String(d.getDate()).padStart(2,"0")}/${String(d.getMonth()+1).padStart(2,"0")} ${String(d.getHours()).padStart(2,"0")}:${String(d.getMinutes()).padStart(2,"0")}`;
                setText("#lastUpdateMini", `Atualizado: ${fmt}`);
            }

            function setEditModeMini(on) {
                setDisplay("#editModeMini", !!on, "inline-flex");
            }

            function filteredSorted() {
                const q = normalize(state.query);

                let arr = state.items.filter(it => {
                    const okStatus = (state.filtroStatus === "TODOS") ? true : it.status === state.filtroStatus;
                    const okVaga = state.vagaId ? String(it.vagaId) === String(state.vagaId) : true;
                    const hay = normalize([it.nome, it.email, it.cidadeUF, it.status, it.vagaTitulo, it.vagaId, it.origem, it.id_ref].join(" | "));
                    const okQ = !q || hay.includes(q);
                    return okStatus && okVaga && okQ;
                });

                if (state.sort === "recent") {
                    arr.sort((a, b) => {
                        const ta = a.createdAt ? Date.parse(String(a.createdAt).replace(" ", "T")) : 0;
                        const tb = b.createdAt ? Date.parse(String(b.createdAt).replace(" ", "T")) : 0;
                        if (tb !== ta) return tb - ta;
                        return (Number(b.id_ref || 0) - Number(a.id_ref || 0));
                    });
                } else if (state.sort === "name") {
                    arr.sort((a, b) => String(a.nome || "").localeCompare(String(b.nome || ""), "pt-BR"));
                } else if (state.sort === "status") {
                    const order = {
                        NOVO: 0,
                        EM_ANALISE: 1,
                        APROVADO: 2,
                        REPROVADO: 3
                    };
                    arr.sort((a, b) => (order[a.status] ?? 9) - (order[b.status] ?? 9));
                }
                return arr;
            }

            function renderTabela(arr) {
                const host = $("#viewTabela");
                if (!host) return;
                if (!arr.length) {
                    host.innerHTML = "";
                    return;
                }

                const rows = arr.map(it => {
                    const locked = !canPersistItem(it);
                    const actions = state.editMode ? `
        <button class="btn-sm" data-act="NOVO" type="button" ${locked ? "disabled" : ""}><i class="fa-regular fa-circle"></i> Novo</button>
        <button class="btn-sm" data-act="EM_ANALISE" type="button" ${locked ? "disabled" : ""}><i class="fa-solid fa-magnifying-glass"></i> Análise</button>
        <button class="btn-sm primary" data-act="APROVADO" type="button" ${locked ? "disabled" : ""}><i class="fa-solid fa-circle-check"></i> Aprovar</button>
        <button class="btn-sm danger" data-act="REPROVADO" type="button" ${locked ? "disabled" : ""}><i class="fa-solid fa-circle-xmark"></i> Reprovar</button>
      ` : `<span class="pill neutral"><i class="fa-solid fa-lock"></i> Ative “Modo edição”</span>`;

                    const origemPill = locked ?
                        `<span class="pill warn"><i class="fa-solid fa-triangle-exclamation"></i> ${escapeHTML(it.origem)} (não persiste)</span>` :
                        `<span class="pill neutral"><i class="fa-solid fa-tag"></i> ${escapeHTML(it.origem)} #${escapeHTML(it.id_ref)}</span>`;

                    return `
        <tr data-origem="${escapeHTML(it.origem)}" data-idref="${escapeHTML(it.id_ref)}">
          <td style="padding:12px;border-bottom:1px solid rgba(229,231,235,.92)">
            <div style="font-family:Montserrat;font-weight:950;color:var(--azul2);display:flex;flex-wrap:wrap;gap:8px;align-items:center;line-height:1.2;">
              ${escapeHTML(it.nome)} ${pillStatus(it.status)}
            </div>
            <div style="margin-top:6px;font-size:12px;color:var(--muted);line-height:1.35">
              ${it.email ? escapeHTML(it.email) : ""} ${it.telefone ? " "+escapeHTML(fmtPhone(it.telefone)) : ""}
              <br>
              ${escapeHTML(it.cidadeUF)} <span class="pill neutral">${escapeHTML(it.vagaTitulo)} (#${escapeHTML(it.vagaId||"—")})</span>
              ${it.createdAt ? `<br><span class="pill neutral">Inscrito em: ${escapeHTML(fmtDateTimeBR(it.createdAt))}</span>` : ""}
              <br>${origemPill}
            </div>
          </td>
          <td style="padding:12px;border-bottom:1px solid rgba(229,231,235,.92);width:460px">
            <div style="display:flex;gap:8px;flex-wrap:wrap;justify-content:flex-end;">
              ${actions}
            </div>
          </td>
        </tr>
      `;
                }).join("");

                host.innerHTML = `
      <table style="width:100%;border-collapse:separate;border-spacing:0;overflow:hidden;border:1px solid rgba(229,231,235,.92);border-radius:16px;background:#fff;">
        <thead>
          <tr>
            <th style="text-align:left;font-size:11px;letter-spacing:.2px;text-transform:uppercase;color:rgba(15,23,42,.70);font-weight:950;padding:12px;background:rgba(249,250,251,.92);border-bottom:1px solid rgba(229,231,235,.92);white-space:nowrap;">Candidato</th>
            <th style="text-align:right;font-size:11px;letter-spacing:.2px;text-transform:uppercase;color:rgba(15,23,42,.70);font-weight:950;padding:12px;background:rgba(249,250,251,.92);border-bottom:1px solid rgba(229,231,235,.92);white-space:nowrap;">Ações</th>
          </tr>
        </thead>
        <tbody>${rows}</tbody>
      </table>
    `;

                host.querySelectorAll("button[data-act]").forEach(btn => {
                    btn.addEventListener("click", async (e) => {
                        if (!state.editMode) {
                            toast("Ative o modo edição.");
                            return;
                        }
                        const tr = e.currentTarget.closest("tr");
                        const origem = tr?.getAttribute("data-origem") || "";
                        const idref = tr?.getAttribute("data-idref") || "0";
                        const it = findItem(origem, idref);
                        if (!it) return;

                        if (!canPersistItem(it)) {
                            toast("Pré-candidatura não persiste nesse Kanban.");
                            return;
                        }

                        const to = e.currentTarget.getAttribute("data-act");
                        if (to) await setStatusAndPersist(it, to);
                    });
                });
            }

            function renderKanban(arr) {
                const grid = $("#kanGrid");
                if (!grid) return;

                const groups = {
                    NOVO: [],
                    EM_ANALISE: [],
                    APROVADO: [],
                    REPROVADO: []
                };
                for (const it of arr)(groups[it.status] || groups.NOVO).push(it);

                const colMeta = [{
                        key: "NOVO",
                        label: "Novo",
                        icon: "fa-regular fa-circle"
                    },
                    {
                        key: "EM_ANALISE",
                        label: "Em análise",
                        icon: "fa-solid fa-magnifying-glass"
                    },
                    {
                        key: "APROVADO",
                        label: "Aprovado",
                        icon: "fa-solid fa-circle-check"
                    },
                    {
                        key: "REPROVADO",
                        label: "Reprovado",
                        icon: "fa-solid fa-circle-xmark"
                    },
                ];

                grid.innerHTML = colMeta.map(c => {
                    const cards = groups[c.key].map(it => {
                        const locked = !canPersistItem(it);
                        const lockBadge = locked ?
                            `<span class="pill warn"><i class="fa-solid fa-triangle-exclamation"></i> ${escapeHTML(it.origem)} (não persiste)</span>` :
                            `<span class="pill neutral"><i class="fa-solid fa-tag"></i> ${escapeHTML(it.origem)} #${escapeHTML(it.id_ref)}</span>`;

                        return `
<div class="candCard"
  draggable="${(state.editMode && !locked) ? "true" : "false"}"
  data-origem="${escapeHTML(it.origem)}"
  data-idref="${escapeHTML(it.id_ref)}"
  data-status="${escapeHTML(it.status)}"
  data-phone="${escapeHTML(it.telefone || "")}"
  data-hasphone="${it.telefone ? "1" : "0"}">
<div class="candActions">
  <button class="actionBtn" type="button"
    data-open-modal="1"
    data-origem="${escapeHTML(it.origem)}"
    data-idref="${escapeHTML(it.id_ref)}">
    <i class="fa-regular fa-address-card"></i> Detalhes
  </button>
</div>

            <div class="dragHandle" title="${(state.editMode && !locked) ? "Arraste para mover" : (locked ? "Esse card não persiste" : "Ative modo edição")}">
              <i class="fa-solid fa-grip-vertical"></i>
            </div>

            <div class="candHeader">
              <div class="candAvatar"><i class="fa-solid fa-user"></i></div>
              <div class="candMain">
                <div class="candTop">
                  <div style="min-width:0;">
                    <div class="candName">${escapeHTML(it.nome)}</div>
                    <div class="candMeta">
                      ${
                        [it.email ? escapeHTML(it.email) : "", it.telefone ? escapeHTML(fmtPhone(it.telefone)) : ""]
                          .filter(Boolean).join("  ")
                        || "<span class='pill neutral'>Sem email/telefone</span>"
                      }
                      <br>
                      ${escapeHTML(it.cidadeUF)} <span class="pill neutral">${escapeHTML(it.vagaTitulo)} (#${escapeHTML(it.vagaId||"—")})</span>
                      ${it.createdAt ? `<br><span class="pill neutral">Inscrito em: ${escapeHTML(fmtDateTimeBR(it.createdAt))}</span>` : ""}
                    </div>
                  </div>
                  <div>${pillStatus(it.status)}</div>
                </div>
              </div>
            </div>

            <div class="candBadges">
              ${lockBadge}
            </div>
          </div>
        `;
                    }).join("");

                    return `
        <section class="kanCol">
          <div class="kanHead">
            <b><i class="${c.icon}"></i> ${escapeHTML(c.label)}</b>
            <span class="kanCount">${groups[c.key].length}</span>
          </div>
          <div class="kanBody" data-dropzone="${escapeHTML(c.key)}">
            ${cards || `<div class="empty" style="margin:0;">Sem candidatos aqui.</div>`}
          </div>
        </section>
      `;
                }).join("");

                setupDnD();
                // clique para abrir WhatsApp (só se tiver telefone)
                document.querySelectorAll(".candCard[data-hasphone='1']").forEach(card => {
                    card.addEventListener("click", (e) => {
                        // se clicou em botão/ícone interno, não intercepta
                        if (e.target.closest("button,a")) return;

                        // se está em modo edição e tentando arrastar, evita conflito
                        if (state.editMode) return;

                        const telefone = card.getAttribute("data-phone") || "";
                        const origem = card.getAttribute("data-origem") || "";
                        const idref = card.getAttribute("data-idref") || "0";
                        const it = findItem(origem, idref);

                        openWhatsApp(telefone, it?.nome || "");
                    });
                });

            }

            function render() {
                const arr = filteredSorted();
                setText("#pillTotal", `total: ${arr.length}`);
                setText("#pillVaga", `vagaId: ${state.vagaId || "—"}`);

                setDisplay("#candEmpty", !arr.length);
                setDisplay("#candError", false);

                if (state.view === "KANBAN") {
                    $("#viewKanban").style.display = "block";
                    $("#viewTabela").style.display = "none";
                    renderKanban(arr);
                } else {
                    $("#viewKanban").style.display = "none";
                    $("#viewTabela").style.display = "block";
                    renderTabela(arr);
                }
            }

            function fmtDateBR(v) {
                if (!v) return "";
                const iso = String(v).includes("T") ? String(v) : String(v).replace(" ", "T");
                const d = new Date(iso);
                if (isNaN(d.getTime())) return String(v);
                return `${String(d.getDate()).padStart(2,"0")}/${String(d.getMonth()+1).padStart(2,"0")}/${d.getFullYear()}`;
            }

            function withCacheBust(url) {
                const v = String(url || "").trim();
                if (!v || /^blob:/i.test(v) || /^data:/i.test(v)) return v;
                return v + (v.includes("?") ? "&" : "?") + `t=${Date.now()}`;
            }

            function renderVideo(url) {
                const v = String(url || "").trim();
                if (!v) return `<div class="empty" style="margin:0">Sem vídeo cadastrado.</div>`;

                // YouTube
                try {
                    const u = new URL(v, location.origin);
                    let id = "";
                    if (u.hostname.includes("youtube.com")) id = u.searchParams.get("v") || "";
                    if (u.hostname === "youtu.be") id = u.pathname.replace("/", "");
                    if (id) {
                        return `
        <div style="border-radius:16px;overflow:hidden;border:1px solid rgba(229,231,235,.92);box-shadow:0 10px 24px rgba(15,23,42,.06)">
          <iframe
            src="https://www.youtube.com/embed/${encodeURIComponent(id)}"
            title="Vídeo de apresentação"
            style="width:100%;aspect-ratio:16/9;border:0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
        </div>
      `;
                    }
                } catch {}

                const safeUrl = escapeHTML(withCacheBust(v));
                return `
      <div style="display:grid;gap:10px">
        <video controls playsinline preload="metadata" style="width:100%;border-radius:16px;border:1px solid rgba(229,231,235,.92);box-shadow:0 10px 24px rgba(15,23,42,.06);background:#0f172a">
          <source src="${safeUrl}">
          Seu navegador não suporta vídeo.
        </video>
        <div style="display:flex;justify-content:flex-end">
          <a class="btn-sm primary" href="${safeUrl}" target="_blank" rel="noopener noreferrer">
            <i class="fa-solid fa-up-right-from-square"></i> Abrir vídeo
          </a>
        </div>
      </div>
    `;
            }

            function renderExperiencias(list) {
                if (!Array.isArray(list) || !list.length) return `<div class="empty" style="margin:0">Sem experiências cadastradas.</div>`;

                return `
    <div style="display:grid;gap:10px">
      ${list.map(e => {
        const periodo = `${fmtDateBR(e.data_inicio) || "—"} → ${e.atual ? "Atual" : (fmtDateBR(e.data_fim) || "—")}`;
        return `
          <div class="mField">
            <small>${escapeHTML(e.empresa || "Empresa")} • ${escapeHTML(periodo)}</small>
            <b>${escapeHTML(e.cargo || "Cargo —")}</b>
            ${e.descricao ? `<div style="margin-top:8px;color:rgba(15,23,42,.75);font-size:12px;font-weight:800;line-height:1.4">${escapeHTML(e.descricao)}</div>` : ""}
          </div>
        `;
      }).join("")}
    </div>
  `;
            }

            function renderFormacoes(list) {
                if (!Array.isArray(list) || !list.length) return `<div class="empty" style="margin:0">Sem formações cadastradas.</div>`;

                return `
    <div style="display:grid;gap:10px">
      ${list.map(f => {
        const periodo = `${fmtDateBR(f.data_inicio) || "—"} → ${fmtDateBR(f.data_fim) || "—"}`;
        const linha2 = [f.nivel, f.status].filter(Boolean).join(" • ");
        return `
          <div class="mField">
            <small>${escapeHTML(f.instituicao || "Instituição")} • ${escapeHTML(periodo)}</small>
            <b>${escapeHTML(f.curso || "Curso —")}</b>
            ${linha2 ? `<div style="margin-top:8px;color:rgba(15,23,42,.75);font-size:12px;font-weight:800">${escapeHTML(linha2)}</div>` : ""}
          </div>
        `;
      }).join("")}
    </div>
  `;
            }

            async function refresh() {
                setDisplay("#candError", false);
                setDisplay("#candEmpty", false);
                setDisplay("#candLoading", true);
                setDisplay("#viewKanban", false);
                setDisplay("#viewTabela", false);

                const ac = new AbortController();
                try {
                    await bridgeToken();

                    const params = {
                        vagaId: state.vagaId,
                        status: (state.filtroStatus === "TODOS" ? "" : state.filtroStatus),
                        q: state.query
                    };

                    const arr = await Api.listCandidates(params, ac.signal);
                    state.items = arr || [];
                    setLastUpdate(new Date());
                    toast("Atualizado ✅");
                    setDisplay("#candLoading", false);

                    if (state.view === "KANBAN") setDisplay("#viewKanban", true);
                    else setDisplay("#viewTabela", true);

                    render();
                } catch (err) {
                    state.items = [];
                    setDisplay("#candLoading", false);
                    render();
                    setDisplay("#candError", true);
                    setText("#candErrorMsg", String(err?.message || err || "Erro."));
                    toast("Falha ao carregar.");

                    if (String(err?.message || "").includes("Não autorizado")) {
                        toast("Sessão expirada. Faça login.");
                        setTimeout(() => location.replace(LOGIN_URL), 900);
                    }
                }
            }

            const sidebar = $("#sidebar");
            const sbOverlay = $("#sbOverlay");
            const fabMenu = $("#fabMenu");
            const sbClose = $("#sbClose");

            function openSidebar() {
                if (!sidebar || !sbOverlay) return;
                sbOverlay.hidden = false;
                sidebar.classList.add("open");
                requestAnimationFrame(() => sbOverlay.classList.add("show"));
                document.body.classList.add("jobhub-noscroll");
            }

            function closeSidebar() {
                if (!sidebar || !sbOverlay) return;
                sidebar.classList.remove("open");
                sbOverlay.classList.remove("show");
                document.body.classList.remove("jobhub-noscroll");
                setTimeout(() => {
                    sbOverlay.hidden = true;
                }, 180);
            }

            fabMenu?.addEventListener("click", openSidebar);
            sbClose?.addEventListener("click", closeSidebar);
            sbOverlay?.addEventListener("click", closeSidebar);

            $("#sbVerVagas")?.addEventListener("click", () => location.href = (ROUTES.VAGAS || (URL_BASE + "recrutador/perfil/")));
            $("#sbCriarVaga")?.addEventListener("click", () => location.href = (ROUTES.EMPRESA_AREA || (URL_BASE + "recrutador")));
            $("#sbModoEditar")?.addEventListener("click", () => {
                state.editMode = !state.editMode;
                $("#sbModoEditar")?.setAttribute("aria-pressed", String(state.editMode));
                setEditModeMini(state.editMode);
                toast(state.editMode ? "Modo edição ativado" : "Modo edição desativado");
                render();
                closeSidebar();
            });

            const openMobileBtn = $("#openMobileMenu");
            const closeMobileBtn = $("#closeMobileMenu");
            const mobileMenu = $("#mobileMenu");
            const mobileOverlay = $("#mobileOverlay");

            function openMenu() {
                if (!mobileOverlay || !mobileMenu) return;
                mobileOverlay.hidden = false;
                mobileMenu.hidden = false;
                requestAnimationFrame(() => {
                    mobileMenu.classList.add("jobhub-show");
                    mobileOverlay.classList.add("jobhub-show");
                });
                mobileMenu.setAttribute("aria-hidden", "false");
                openMobileBtn?.setAttribute("aria-expanded", "true");
                document.body.classList.add("jobhub-noscroll");
            }

            function closeMenu() {
                if (!mobileOverlay || !mobileMenu) return;
                mobileMenu.classList.remove("jobhub-show");
                mobileOverlay.classList.remove("jobhub-show");
                mobileMenu.setAttribute("aria-hidden", "true");
                openMobileBtn?.setAttribute("aria-expanded", "false");
                document.body.classList.remove("jobhub-noscroll");
                setTimeout(() => {
                    mobileOverlay.hidden = true;
                    mobileMenu.hidden = true;
                }, 240);
            }

            openMobileBtn?.addEventListener("click", openMenu);
            closeMobileBtn?.addEventListener("click", closeMenu);
            mobileOverlay?.addEventListener("click", closeMenu);
            document.addEventListener("keydown", (e) => {
                if (e.key === "Escape") closeMenu();
            });

            (function headerScroll() {
                const header = document.getElementById("jobhubHeader");
                if (!header) return;
                let lastY = window.scrollY || 0;
                let ticking = false;
                const TOP = 8,
                    DELTA = 10;

                function update() {
                    const y = window.scrollY || 0;
                    const diff = y - lastY;
                    header.classList.toggle("is-scrolled", y > TOP);
                    if (y <= TOP) header.classList.remove("is-hidden");
                    else if (Math.abs(diff) > DELTA) {
                        if (diff > 0) header.classList.add("is-hidden");
                        else header.classList.remove("is-hidden");
                    }
                    lastY = y;
                    ticking = false;
                }

                window.addEventListener("scroll", () => {
                    if (ticking) return;
                    ticking = true;
                    requestAnimationFrame(update);
                }, {
                    passive: true
                });

                update();
            })();

            (function guardLoggedOutLinks() {
                function isLogged() {
                    const token = getToken();
                    if (!token) return false;
                    if (isTokenExpired(token)) return false;
                    return true;
                }
                document.addEventListener("click", (e) => {
                    const a = e.target.closest('a[data-guard="logged-out"]');
                    if (!a) return;
                    if (!isLogged()) return;
                    e.preventDefault();
                    e.stopPropagation();
                    alert("Já existe um usuário logado.\n\nSe quiser criar outra conta, faça logout primeiro.");
                }, true);
            })();

            $("#btnViewKanban")?.addEventListener("click", () => {
                state.view = "KANBAN";
                $("#btnViewKanban").classList.add("primary");
                $("#btnViewTabela").classList.remove("primary");
                render();
            });

            $("#btnViewTabela")?.addEventListener("click", () => {
                state.view = "TABELA";
                $("#btnViewTabela").classList.add("primary");
                $("#btnViewKanban").classList.remove("primary");
                render();
            });

            $("#chipsStatus")?.addEventListener("click", (e) => {
                const btn = e.target.closest(".chip");
                if (!btn) return;
                $("#chipsStatus")?.querySelectorAll(".chip").forEach(b => b.classList.remove("active"));
                btn.classList.add("active");
                state.filtroStatus = btn.getAttribute("data-v") || "TODOS";
                setQueryParam("status", state.filtroStatus === "TODOS" ? "" : state.filtroStatus);
                render();
            });

            const candSearch = $("#candSearch");
            const clearCandSearch = $("#clearCandSearch");
            const candSort = $("#candSort");

            let tSearch = null;
            candSearch?.addEventListener("input", () => {
                clearTimeout(tSearch);
                tSearch = setTimeout(() => {
                    state.query = String(candSearch.value || "");
                    setQueryParam("q", state.query);
                    render();
                }, 120);
            });

            clearCandSearch?.addEventListener("click", () => {
                if (candSearch) candSearch.value = "";
                state.query = "";
                setQueryParam("q", "");
                candSearch?.focus();
                render();
            });

            candSort?.addEventListener("change", () => {
                state.sort = candSort.value || "recent";
                render();
            });

            $("#btnRefresh")?.addEventListener("click", refresh);
            $("#btnRetry")?.addEventListener("click", refresh);
            $("#btnClearVaga")?.addEventListener("click", () => {
                state.vagaId = "";
                setQueryParam("vagaId", "");
                render();
            });

            function findItem(origem, id_ref) {
                const o = String(origem || "").toLowerCase();
                const id = Number(id_ref || 0);
                return state.items.find(x => String(x.origem).toLowerCase() === o && Number(x.id_ref) === id) || null;
            }

            async function setStatusAndPersist(item, newStatus) {
                if (!state.editMode) {
                    toast("Ative o modo edição.");
                    return false;
                }
                if (!item) return false;

                if (!canPersistItem(item)) {
                    toast("Pré-candidatura não persiste nesse Kanban.");
                    return false;
                }

                const old = item.status;
                item.status = newStatus;
                render();

                try {
                    await Api.updateCandidateStatus(item, newStatus);

                    // ✅ Confirma persistência: recarrega e verifica se voltou com o status esperado
                    await refresh();

                    const after = findItem(item.origem, item.id_ref);
                    if (!after) {
                        toast("Salvou, mas não achei o item após atualizar.");
                        return true;
                    }

                    if (after.status !== newStatus) {
                        // Se não persistiu, volta no front pro valor real
                        toast("Não persistiu no banco (voltou diferente).");
                        return false;
                    }

                    toast("Persistiu no banco ✅");
                    setLastUpdate(new Date());
                    return true;
                } catch (err) {
                    item.status = old;
                    render();
                    toast(err?.message || "Erro ao salvar.");
                    return false;
                }
            }

            function setupDnD() {
                if (state.view !== "KANBAN") return;

                const cards = Array.from(document.querySelectorAll(".candCard"));
                const zones = Array.from(document.querySelectorAll("[data-dropzone]"));

                cards.forEach(card => {
                    card.addEventListener("dragstart", (e) => {
                        if (!state.editMode) {
                            e.preventDefault();
                            toast("Ative o modo edição para arrastar.");
                            return;
                        }
                        const el = e.currentTarget;

                        // ✅ se não for persistível, bloqueia
                        const origem = String(el.getAttribute("data-origem") || "").toLowerCase();
                        if (origem !== "candidaturas") {
                            e.preventDefault();
                            toast("Esse card não persiste (pré-candidatura).");
                            return;
                        }

                        el.classList.add("dragGhost");

                        const payload = JSON.stringify({
                            origem: el.getAttribute("data-origem") || "candidaturas",
                            id_ref: Number(el.getAttribute("data-idref") || 0)
                        });

                        e.dataTransfer.effectAllowed = "move";
                        try {
                            e.dataTransfer.setData("application/json", payload);
                        } catch {}
                        try {
                            e.dataTransfer.setData("text/plain", payload);
                        } catch {}
                    });

                    card.addEventListener("dragend", (e) => {
                        e.currentTarget.classList.remove("dragGhost");
                        zones.forEach(z => z.classList.remove("dropHint"));
                    });
                });

                zones.forEach(zone => {
                    zone.addEventListener("dragover", (e) => {
                        if (!state.editMode) return;
                        e.preventDefault();
                        e.dataTransfer.dropEffect = "move";
                    });

                    zone.addEventListener("dragenter", () => {
                        if (!state.editMode) return;
                        zone.classList.add("dropHint");
                    });

                    zone.addEventListener("dragleave", (e) => {
                        if (!zone.contains(e.relatedTarget)) zone.classList.remove("dropHint");
                    });

                    zone.addEventListener("drop", async (e) => {
                        if (!state.editMode) return;
                        e.preventDefault();
                        zone.classList.remove("dropHint");

                        const targetStatus = zone.getAttribute("data-dropzone");
                        if (!targetStatus) return;

                        let payload = "";
                        try {
                            payload = e.dataTransfer.getData("application/json");
                        } catch {}
                        if (!payload) {
                            try {
                                payload = e.dataTransfer.getData("text/plain");
                            } catch {}
                        }
                        if (!payload) return;

                        let data = null;
                        try {
                            data = JSON.parse(payload);
                        } catch {
                            return;
                        }

                        const it = findItem(data?.origem, data?.id_ref);
                        if (!it) return;

                        if (!canPersistItem(it)) {
                            toast("Esse card não persiste (pré-candidatura).");
                            return;
                        }

                        if (it.status === targetStatus) {
                            toast("Já está nesse status.");
                            return;
                        }

                        await setStatusAndPersist(it, targetStatus);
                    });
                });
            }

            function doLogout() {
                clearAuthStorage();
                toast("Saindo...");
                setTimeout(() => location.href = (ROUTES.HOME || URL_BASE), 350);
            }

            $("#btnLogoutHeader")?.addEventListener("click", doLogout);
            $("#btnLogoutMobile")?.addEventListener("click", () => {
                closeMenu();
                doLogout();
            });

            (function boot() {
                setLastUpdate(new Date());
                setEditModeMini(false);

                const qp = getQueryParams();
                state.vagaId = qp.vagaId || "";
                state.query = qp.q || "";
                if (candSearch) candSearch.value = state.query;

                const st = String(qp.status || "").toUpperCase();
                state.filtroStatus = (st && (st === "TODOS" || STATUS.includes(st))) ? st : "TODOS";

                $("#chipsStatus")?.querySelectorAll(".chip").forEach(b => {
                    b.classList.toggle("active", (b.getAttribute("data-v") || "") === state.filtroStatus);
                });

                render();

                if (!ensureAuthOrRedirect()) return;
                refresh();
            })();

            function toWhatsAppPhoneBR(raw) {
                const digits = String(raw || "").replace(/\D/g, "");
                if (!digits) return "";

                // se veio com 55 + DDD + número já (13 dígitos)
                if (digits.startsWith("55") && (digits.length === 12 || digits.length === 13)) return digits;

                // se veio DDD + número (10 ou 11 dígitos)
                if (digits.length === 10 || digits.length === 11) return "55" + digits;

                // fallback
                return "55" + digits;
            }

            function openWhatsApp(telefone, nome) {
                const phone = toWhatsAppPhoneBR(telefone);
                if (!phone || phone.length < 12) {
                    toast("Sem telefone válido para contato.");
                    return;
                }

                const msg = `Olá ${nome ? String(nome).split(" ")[0] : ""}! Vi sua candidatura e gostaria de falar com você.`;
                const url = `https://wa.me/${phone}?text=${encodeURIComponent(msg)}`;

                window.open(url, "_blank", "noopener,noreferrer");
            }
            // ===============================
            // MODAL: DETALHES DO CANDIDATO
            // ===============================
            const candModal = $("#candModal");
            const candModalOverlay = $("#candModalOverlay");
            const candModalClose = $("#candModalClose");
            const candModalBody = $("#candModalBody");
            const candModalTitle = $("#candModalTitle");
            const candModalSub = $("#candModalSub");
            const candModalCopy = $("#candModalCopy");
            const candModalWhats = $("#candModalWhats");

            let _modalItem = null;
            let _lastFocus = null;

            function openCandidateModal(item) {
                if (!item || !candModal || !candModalOverlay) return;

                _modalItem = item;
                _lastFocus = document.activeElement;

                candModalTitle.textContent = item.nome ? `Candidato: ${item.nome}` : "Detalhes do candidato";
                candModalSub.textContent =
                    `${item.vagaTitulo || "—"} (#${item.vagaId || "—"}) • ${item.origem || "—"} #${item.id_ref || "—"}`;

                const fields = [
                    ["Nome", item.nome],
                    ["E-mail", item.email],
                    ["Telefone", item.telefone ? fmtPhone(item.telefone) : ""],
                    ["Cidade/UF", item.cidadeUF],
                    ["Status", item.status],
                    ["Inscrito em", item.createdAt ? fmtDateTimeBR(item.createdAt) : ""],
                    ["Vaga", item.vagaTitulo],
                    ["Status (DB)", item.rawStatus || ""],
                ];

                // PRIMEIRO monta o HTML
                candModalBody.innerHTML = `
      <div class="mGrid">
        ${fields.map(([k, v]) => `
          <div class="mField">
            <small>${escapeHTML(k)}</small>
            <b>${escapeHTML(v || "—")}</b>
          </div>
        `).join("")}
      </div>

      <div style="margin-top:12px;display:grid;gap:12px">
        <div>
          <div class="mTitle" style="font-size:13px;margin-bottom:8px">Vídeo de apresentação</div>
          <div id="candExtraVideo"><div class="empty" style="margin:0">Carregando…</div></div>
        </div>

        <div>
          <div class="mTitle" style="font-size:13px;margin-bottom:8px">Experiências</div>
          <div id="candExtraExp"><div class="empty" style="margin:0">Carregando…</div></div>
        </div>

        <div>
          <div class="mTitle" style="font-size:13px;margin-bottom:8px">Formações</div>
          <div id="candExtraEdu"><div class="empty" style="margin:0">Carregando…</div></div>
        </div>
      </div>
    `;

                candModalOverlay.hidden = false;
                candModal.hidden = false;

                requestAnimationFrame(() => {
                    candModalOverlay.classList.add("show");
                    candModal.classList.add("show");
                });

                document.body.classList.add("jobhub-noscroll");
                setTimeout(() => candModalClose?.focus(), 30);

                // DEPOIS carrega os dados
                (async () => {
                    const vHost = $("#candExtraVideo");
                    const eHost = $("#candExtraExp");
                    const fHost = $("#candExtraEdu");

                    try {
                        if (!item?.candidatoId) {
                            if (vHost) vHost.innerHTML = `<div class="empty" style="margin:0">Sem ID do candidato (provável pré-candidatura).</div>`;
                            if (eHost) eHost.innerHTML = `<div class="empty" style="margin:0">—</div>`;
                            if (fHost) fHost.innerHTML = `<div class="empty" style="margin:0">—</div>`;
                            return;
                        }

                        const [detailResult, videoResult] = await Promise.allSettled([
                            Api.getCandidateDetail({
                                candidatoId: item.candidatoId,
                                vagaId: item.vagaId
                            }),
                            Api.getCandidateVideoUrl({
                                candidatoId: item.candidatoId
                            })
                        ]);

                        if (detailResult.status !== "fulfilled") {
                            throw detailResult.reason || new Error("Falha ao carregar detalhe do candidato.");
                        }

                        const detail = detailResult.value || {};
                        console.log("DETALHE CANDIDATO:", detail);

                        const cand = detail?.candidato || {};
                        const exp = detail?.experiencias || [];
                        const edu = detail?.formacoes || [];

                        const videoUrl =
                            (videoResult.status === "fulfilled" ? videoResult.value : "") ||
                            cand.video_apresentacao ||
                            cand.videoApresentacao ||
                            detail?.video_apresentacao ||
                            detail?.videoApresentacao ||
                            "";

                        if (vHost) vHost.innerHTML = renderVideo(videoUrl);
                        if (eHost) eHost.innerHTML = renderExperiencias(exp);
                        if (fHost) fHost.innerHTML = renderFormacoes(edu);

                    } catch (err) {
                        if (vHost) vHost.innerHTML = `<div class="empty error" style="margin:0">Erro: ${escapeHTML(err?.message || "falha")}</div>`;
                        if (eHost) eHost.innerHTML = `<div class="empty" style="margin:0">—</div>`;
                        if (fHost) fHost.innerHTML = `<div class="empty" style="margin:0">—</div>`;
                    }
                })();
            }

            function closeCandidateModal() {
                if (!candModal || !candModalOverlay) return;

                candModal.classList.remove("show");
                candModalOverlay.classList.remove("show");
                document.body.classList.remove("jobhub-noscroll");

                setTimeout(() => {
                    candModal.hidden = true;
                    candModalOverlay.hidden = true;
                    _modalItem = null;
                    if (_lastFocus && _lastFocus.focus) _lastFocus.focus();
                }, 180);
            }

            candModalOverlay?.addEventListener("click", closeCandidateModal);
            candModalClose?.addEventListener("click", closeCandidateModal);

            document.addEventListener("keydown", (e) => {
                if (e.key === "Escape" && candModal && !candModal.hidden) closeCandidateModal();
            });

            // Delegação: qualquer clique em botão com data-open-modal="1"
            document.addEventListener("click", (e) => {
                const btn = e.target.closest("[data-open-modal='1']");
                if (!btn) return;

                e.preventDefault();
                e.stopPropagation();

                const origem = btn.getAttribute("data-origem") || "";
                const idref = btn.getAttribute("data-idref") || "0";
                const it = findItem(origem, idref);

                if (!it) {
                    toast("Não achei esse candidato no state.");
                    return;
                }
                openCandidateModal(it);
            }, true);

            // Botão copiar
            candModalCopy?.addEventListener("click", async () => {
                if (!_modalItem) return;

                const t = [
                    `Nome: ${_modalItem.nome || "-"}`,
                    `Email: ${_modalItem.email || "-"}`,
                    `Telefone: ${_modalItem.telefone ? fmtPhone(_modalItem.telefone) : "-"}`,
                    `Cidade/UF: ${_modalItem.cidadeUF || "-"}`,
                    `Status: ${_modalItem.status || "-"}`,
                    `Vaga: ${_modalItem.vagaTitulo || "-"} (#${_modalItem.vagaId || "-"})`,
                    `Origem: ${_modalItem.origem || "-"} #${_modalItem.id_ref || "-"}`,
                    _modalItem.createdAt ? `Inscrito em: ${fmtDateTimeBR(_modalItem.createdAt)}` : ""
                ].filter(Boolean).join("\n");

                try {
                    await navigator.clipboard.writeText(t);
                    toast("Copiado ✅");
                } catch {
                    toast("Falha ao copiar.");
                }
            });

            // Botão WhatsApp
            candModalWhats?.addEventListener("click", () => {
                if (!_modalItem) return;
                openWhatsApp(_modalItem.telefone || "", _modalItem.nome || "");
            });

        })();
    </script>


</body>

</html>