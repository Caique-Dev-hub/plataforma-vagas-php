<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="color-scheme" content="light" />
    <meta name="theme-color" content="#1F75D8" />
    <title>JobHub Dashboard Empresa</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

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

        /* mobile menu interno */
        .jobhubMM-panel {
            padding-top: calc(18px + env(safe-area-inset-top));
            padding-bottom: calc(18px + env(safe-area-inset-bottom));
            overflow-y: auto;
        }

        .jobhubMM-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 8px;
        }

        .jobhubMM-brand {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
        }

        .jobhubMM-brand img {
            height: 64px;
            width: auto;
            display: block;
        }

        .jobhubMM-ctas {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 4px;
        }

        .jobhubMM-cta {
            height: 44px;
            padding: 0 14px;
            border-radius: 999px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: 13px;
            box-shadow: var(--jobhub-shadow2);
            transition: transform .12s ease, filter .12s ease;
        }

        .jobhubMM-cta:hover {
            transform: translateY(-1px);
            filter: brightness(1.02);
        }

        .jobhubMM-cta--empresa {
            background: #C4D9E5;
            color: rgba(15, 23, 42, .92);
            border: 1px solid rgba(15, 23, 42, .06);
        }

        .jobhubMM-cta--cv {
            background: #fff;
            color: rgba(15, 23, 42, .92);
            border: 1px solid rgba(15, 23, 42, .10);
        }

        .jobhubMM-actions {
            margin-top: auto;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        body.jobhub-noscroll {
            overflow: hidden;
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
        .jobhubMM-overlay[hidden],
        .jobhubMM-panel[hidden] {
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
    </style>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800;900&family=Inter:wght@500;600;700&display=swap');

        :root {
            --azul: #1F75D8;
            --azul2: #16447F;
            --txt: #0F172A;
            --muted: #6B7280;

            --bg: #F3F5FB;
            --card: #ffffff;
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

        /* ===== reset ===== */
        * {
            box-sizing: border-box
        }

        html,
        body {
            height: 100%
        }

        body {
            margin: 0;
            color: var(--txt);
            font-family: "Inter", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            background: var(--bg);
            padding-top: 100px;
            /* header fixed */
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

        body.modal-open {
            overflow: hidden !important;
            touch-action: none
        }

        [hidden] {
            display: none !important
        }

        /* ===== Header JobHub (isolado) ===== */
        .jobhubH-shell,
        .jobhubH-shell * {
            box-sizing: border-box
        }

        .jobhubH-shell {
            --jobhub-bg: #ffffff;
            --jobhub-text: rgba(15, 23, 42, .92);
            --jobhub-muted: rgba(15, 23, 42, .70);
            --jobhub-line: rgba(15, 23, 42, .10);
            --jobhub-shadow: 0 18px 60px rgba(15, 23, 42, .14);
            --jobhub-shadow2: 0 10px 26px rgba(15, 23, 42, .10);
            --jobhub-r: 16px;
            --jobhub-blue: #6e88a7;
            --jobhub-blue2: #9cafc9;
            --jobhub-pink: #2b81a9;

            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 9990;
            height: 92px;
            background: var(--jobhub-bg);
            border-bottom: 1px solid rgba(15, 23, 42, .06);
            box-shadow: 0 10px 30px rgba(15, 23, 42, .08);
            display: flex;
            align-items: center;
            font-family: "Montserrat", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            transition: transform .18s ease, box-shadow .18s ease, background .18s ease, height .18s ease, border-color .18s ease;
            will-change: transform;
            transform: translate3d(0, 0, 0);
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
            text-decoration: none
        }

        .jobhubH-logoImg {
            height: 115px;
            transform-origin: left center;
            transition: transform .18s ease;
            will-change: transform;
            display: block;
        }

        .jobhubH-shell.is-scrolled {
            background: rgba(255, 255, 255, .88);
            backdrop-filter: blur(12px);
            border-bottom-color: rgba(15, 23, 42, .10);
            box-shadow: 0 18px 60px rgba(15, 23, 42, .16);
        }

        .jobhubH-shell.is-scrolled .jobhubH-logoImg {
            transform: scale(.78);
        }

        .jobhubH-shell.is-hidden {
            transform: translate3d(0, -110%, 0);
            box-shadow: none !important;
            backdrop-filter: none !important;
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
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: 13px;
            letter-spacing: .2px;
            box-shadow: var(--jobhub-shadow2);
            transition: transform .12s ease, filter .12s ease;
            white-space: nowrap;
            text-decoration: none;
        }

        .jobhubH-cta:hover {
            transform: translateY(-1px);
            filter: brightness(1.02)
        }

        .jobhubH-cta--empresa {
            color: rgba(15, 23, 42, .92);
            background: #C4D9E5
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

        @media (max-width:900px) {
            .jobhubH-nav {
                display: none !important
            }

            .jobhubH-burger {
                display: inline-flex;
                align-items: center;
                justify-content: center
            }
        }

        /* menu mobile (header) */
        .jobhubMM-overlay {
            position: fixed;
            inset: 0;
            background: rgba(2, 6, 23, .55);
            opacity: 0;
            transition: opacity .25s ease;
            z-index: 9998;
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
            box-shadow: var(--jobhub-shadow);
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

        .jobhubMM-brand {
            display: inline-flex;
            align-items: center;
            text-decoration: none
        }

        .jobhubMM-brand img {
            height: 64px;
            width: auto;
            display: block
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
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: 13px;
            box-shadow: var(--jobhub-shadow2);
            transition: transform .12s ease, filter .12s ease;
        }

        .jobhubMM-cta:hover {
            transform: translateY(-1px);
            filter: brightness(1.02)
        }

        .jobhubMM-cta--empresa {
            background: #C4D9E5;
            color: rgba(15, 23, 42, .92);
            border: 1px solid rgba(15, 23, 42, .06)
        }

        .jobhubMM-cta--cv {
            background: #fff;
            color: rgba(15, 23, 42, .92);
            border: 1px solid rgba(15, 23, 42, .10)
        }

        .jobhubMM-link {
            font-size: 16px;
            font-weight: 900;
            color: rgba(15, 23, 42, .88);
            text-decoration: none;
            padding: 12px 6px;
            border-bottom: 1px solid rgba(15, 23, 42, .06);
            display: block;
        }

        body.jobhub-noscroll {
            overflow: hidden
        }

        /* ===== App layout com sidebar ===== */
        .app {
            max-width: 1400px;
            margin: 0 auto;
            padding: 12px 16px 28px;
            display: grid;
            grid-template-columns: var(--sb-w) minmax(0, 1fr);
            gap: var(--sb-gap);
        }

        @media (max-width: 1080px) {
            .app {
                grid-template-columns: var(--sb-mini) minmax(0, 1fr);
            }
        }

        @media (max-width: 900px) {
            .app {
                grid-template-columns: 1fr;
            }
        }

        .content {
            min-width: 0;
        }

        /* ===== Sidebar ===== */
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
        }

        .sb-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 10px;
        }

        .sb-title {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
        }

        .sb-title b {
            font-family: "Montserrat", sans-serif;
            font-weight: 950;
            color: var(--azul2);
            font-size: 13px;
            letter-spacing: -.2px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sb-title small {
            color: var(--muted);
            font-weight: 800;
            font-size: 11px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sb-close {
            display: none;
            height: 44px;
            width: 44px;
            border-radius: 14px;
            border: 1px solid rgba(15, 23, 42, .10);
            background: #fff;
            box-shadow: var(--shadow2);
            font-size: 18px;
        }

        @media (max-width:1080px) {

            .sb .sb-label,
            .sb .sb-titleText {
                display: none;
            }

            .sb {
                width: var(--sb-mini);
            }
        }

        /* Drawer sidebar no mobile */
        .sbOverlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(2, 6, 23, .55);
            z-index: 9996;
            opacity: 0;
            transition: .18s ease;
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
            font-size: 20px;
        }

        @media (max-width:900px) {
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
                z-index: 9997;
            }

            .sb.open {
                opacity: 1;
                transform: translateY(0);
                pointer-events: auto;
            }

            .sbOverlay {
                display: block;
                pointer-events: none;
            }

            .sbOverlay.show {
                pointer-events: auto;
            }

            .sb-close {
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }

            .fabMenu {
                display: grid;
                place-items: center;
            }
        }

        .sb-group {
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px solid rgba(15, 23, 42, .06);
        }

        .sb-nav {
            display: flex;
            flex-direction: column;
            gap: 10px;
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
            box-shadow: 0 14px 30px rgba(15, 23, 42, .10);
        }

        .sb-btn.primary {
            border: none;
            background: #9cafc9;
            color: #fff;
            box-shadow: 0 14px 30px rgba(31, 117, 216, .18);
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
            flex: 0 0 auto;
        }

        .sb-btn.primary .sb-ico {
            background: rgba(255, 255, 255, .14);
            border-color: rgba(255, 255, 255, .20);
            color: #fff;
        }

        .sb-label {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
        }

        .sb-label span {
            font-weight: 950;
        }

        .sb-label small {
            font-size: 11px;
            color: var(--muted);
            font-weight: 800;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* ===== Dashboard header/hero ===== */
        .dash-top {
            display: grid;
            grid-template-columns: minmax(0, 1fr);
            gap: 14px;
            align-items: center;
            padding: 16px;
            border-radius: var(--radius);
            border: 1px solid rgba(148, 163, 184, .55);
            background: linear-gradient(135deg, rgba(31, 117, 216, .14), rgba(22, 68, 127, .10));
            box-shadow: 0 14px 36px rgba(15, 23, 42, .10);
            position: relative;
            overflow: hidden;
        }

        .dash-top::after {
            content: "";
            position: absolute;
            inset: -40px -60px auto auto;
            width: 280px;
            height: 280px;
            border-radius: 999px;
            background: radial-gradient(circle at 30% 30%, rgba(31, 117, 216, .24), transparent 60%);
            pointer-events: none;
            filter: blur(2px);
        }

        .dash-title h1 {
            margin: 0;
            font-family: "Montserrat", sans-serif;
            font-size: 18px;
            font-weight: 950;
            color: var(--azul2);
            letter-spacing: -.2px;
        }

        .dash-title p {
            margin: 6px 0 0;
            font-size: 13px;
            color: var(--muted);
            max-width: 760px;
            line-height: 1.45;
        }

        /* ===== KPI bar ===== */
        .kpi-bar {
            margin-top: 14px;
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 12px;
        }

        @media (max-width:900px) {
            .kpi-bar {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (max-width:520px) {
            .kpi-bar {
                grid-template-columns: 1fr
            }
        }

        .kpi-card {
            background: rgba(255, 255, 255, .92);
            border: 1px solid rgba(229, 231, 235, .92);
            border-radius: 16px;
            padding: 12px;
            box-shadow: var(--shadow2);
            display: flex;
            align-items: center;
            gap: 12px;
            min-height: 72px;
        }

        .kpi-ico {
            width: 44px;
            height: 44px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            background: rgba(31, 117, 216, .10);
            border: 1px solid rgba(31, 117, 216, .14);
            color: var(--azul2);
            box-shadow: 0 10px 20px rgba(15, 23, 42, .08);
            flex: 0 0 auto;
        }

        .kpi-card strong {
            display: block;
            font-family: "Montserrat", sans-serif;
            font-size: 18px;
            color: var(--azul2);
            letter-spacing: -.2px;
            line-height: 1.05;
        }

        .kpi-card span {
            display: block;
            margin-top: 4px;
            font-size: 12px;
            color: var(--muted);
            font-weight: 700;
        }

        /* ===== Card ===== */
        .card {
            margin-top: 14px;
            background: var(--card);
            border-radius: var(--radius);
            border: 1px solid rgba(229, 231, 235, .92);
            box-shadow: var(--shadow);
            padding: 14px;
        }

        .card-hd {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 10px;
        }

        .card-title {
            margin: 0;
            font-family: "Montserrat", sans-serif;
            font-size: 14px;
            font-weight: 950;
            color: var(--azul2);
        }

        .card-sub {
            margin: 4px 0 0;
            font-size: 12px;
            color: var(--muted);
        }

        /* ===== toolbar (chips + search + sort) ===== */
        .toolbar {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            width: 100%;
            align-items: center;
            justify-content: space-between;
            margin-top: 8px;
        }

        .chips {
            display: flex;
            flex-wrap: wrap;
            gap: 8px
        }

        .chip {
            border-radius: 999px;
            padding: 7px 12px;
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
            color: var(--azul2);
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
            background: transparent;
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
            color: rgba(15, 23, 42, .74);
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

        /* ===== Pills ===== */
        .pill {
            font-size: 11px;
            padding: 5px 9px;
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
            color: rgba(15, 23, 42, .82)
        }

        /* ===== Table/Listão ===== */
        .vagaTable {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            overflow: hidden;
            border: 1px solid rgba(229, 231, 235, .92);
            border-radius: 16px;
            background: #fff;
        }

        .vagaTable thead th {
            text-align: left;
            font-size: 11px;
            letter-spacing: .2px;
            text-transform: uppercase;
            color: rgba(15, 23, 42, .70);
            font-weight: 950;
            padding: 12px;
            background: rgba(249, 250, 251, .92);
            border-bottom: 1px solid rgba(229, 231, 235, .92);
            white-space: nowrap;
        }

        .vagaTable tbody td {
            padding: 12px;
            border-bottom: 1px solid rgba(229, 231, 235, .92);
            vertical-align: top;
            font-size: 13px;
        }

        .vagaTable tbody tr:hover {
            background: rgba(31, 117, 216, .06);
        }

        .vagaTitle {
            font-family: "Montserrat", sans-serif;
            font-weight: 950;
            color: var(--azul2);
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center;
            line-height: 1.2;
        }

        .vagaSub {
            margin-top: 6px;
            font-size: 12px;
            color: var(--muted);
            line-height: 1.35;
        }

        .vagaActionsRow {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            justify-content: flex-end;
            align-items: flex-start;
        }

        .mutedSmall {
            font-size: 12px;
            color: var(--muted);
            font-weight: 800;
            white-space: nowrap;
        }

        @media (max-width: 880px) {
            .hide-sm {
                display: none
            }

            .vagaActionsRow {
                justify-content: flex-start
            }
        }

        /* ===== Buttons small ===== */
        .btn-sm {
            height: 34px;
            border-radius: 999px;
            padding: 0 12px;
            font-size: 12px;
            font-weight: 950;
            border: 1px solid rgba(229, 231, 235, .92);
            background: #9cafc9;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            line-height: 1;
            transition: .14s ease;
            user-select: none;
            box-shadow: 0 14px 30px rgba(214, 217, 221, 0.18);
        }

        .btn-sm:hover {
            transform: translateY(-1px)
        }

        .btn-sm.primary {
            border: none;
            background: var(--azul);
            color: #fff;
            box-shadow: 0 12px 24px rgba(31, 117, 216, .16);
        }

        .btn-sm.danger {
            border-color: rgba(239, 68, 68, .25);
            background: rgba(239, 68, 68, .06);
            color: #991b1b;
        }

        /* ===== Empty / Error ===== */
        .empty {
            border: 1px dashed rgba(148, 163, 184, .65);
            border-radius: var(--radius);
            padding: 16px;
            color: var(--muted);
            background: #fff;
        }

        .empty b {
            color: var(--azul2)
        }

        .empty.error {
            border-style: solid;
            border-color: rgba(239, 68, 68, .28);
            background: rgba(239, 68, 68, .05);
            color: rgba(127, 29, 29, .95);
        }

        .empty .row {
            margin-top: 10px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center
        }

        /* ===== Skeleton ===== */
        .skeleton {
            position: relative;
            overflow: hidden;
            background: rgba(15, 23, 42, .04);
            border-radius: 12px
        }

        .skeleton::after {
            content: "";
            position: absolute;
            inset: 0;
            transform: translateX(-120%);
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .55), transparent);
            animation: shimmer 1.05s infinite;
        }

        @keyframes shimmer {
            100% {
                transform: translateX(120%)
            }
        }

        .sk-row {
            height: 14px;
            margin: 10px 0
        }

        .sk-row.sm {
            width: 45%
        }

        .sk-row.md {
            width: 70%
        }

        .sk-row.lg {
            width: 92%
        }

        /* ===== Toast ===== */
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
            max-width: 360px;
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

        /* ===== Modal ===== */
        .modal {
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

        .modal.open {
            display: flex
        }

        .modal-card {
            width: 100%;
            max-width: 840px;
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

        .modal-top {
            padding: 14px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            border-bottom: 1px solid rgba(229, 231, 235, .92);
            background: rgba(249, 250, 251, .92);
            flex: 0 0 auto;
        }

        .modal-top b {
            color: var(--azul2);
            font-family: "Montserrat", sans-serif;
            font-weight: 950;
        }

        .modal-body {
            padding: 14px;
            flex: 1 1 auto;
            min-height: 0;
            overflow: auto;
            -webkit-overflow-scrolling: touch;
            overscroll-behavior: contain;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px
        }

        @media (max-width:720px) {
            .form-grid {
                grid-template-columns: 1fr
            }
        }

        fieldset {
            grid-column: 1 / -1;
            border: 1px solid rgba(31, 117, 216, .12);
            background: rgba(31, 117, 216, .04);
            border-radius: 16px;
            padding: 12px;
            margin: 0 0 10px;
        }

        legend {
            padding: 0 8px;
            font-size: 12px;
            font-family: "Montserrat", sans-serif;
            font-weight: 950;
            color: rgba(15, 23, 42, .88);
            text-transform: uppercase;
            letter-spacing: .2px;
        }

        .field label {
            display: block;
            font-size: 12px;
            color: #334155;
            font-weight: 900;
            margin-bottom: 6px;
            font-family: "Montserrat", sans-serif;
        }

        .field input,
        .field select,
        .field textarea {
            width: 100%;
            border-radius: 14px;
            border: 1px solid rgba(148, 163, 184, .75);
            background: #fff;
            padding: 12px;
            font-size: 14px;
            outline: none;
            transition: .14s ease;
        }

        .field textarea {
            min-height: 120px;
            resize: vertical
        }

        .field input:focus,
        .field select:focus,
        .field textarea:focus {
            box-shadow: var(--focus);
            border-color: rgba(31, 117, 216, .65);
        }

        .hint {
            margin-top: 6px;
            font-size: 12px;
            color: rgba(15, 23, 42, .64);
            font-weight: 800
        }

        .err {
            min-height: 16px;
            margin-top: 6px;
            font-size: 12px;
            font-weight: 950;
            color: #ef4444
        }

        .is-invalid {
            border-color: rgba(239, 68, 68, .55) !important;
            box-shadow: 0 0 0 4px rgba(239, 68, 68, .10) !important
        }

        .modal-actions {
            padding: 14px;
            border-top: 1px solid rgba(229, 231, 235, .92);
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            flex-wrap: wrap;
            background: rgba(249, 250, 251, .92);
            flex: 0 0 auto;
        }

        .btn {
            height: 40px;
            border-radius: 999px;
            border: 1px solid var(--line);
            background: #fff;
            padding: 0 12px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            font-weight: 900;
            box-shadow: 0 10px 24px rgba(15, 23, 42, .06);
            transition: .14s ease;
            line-height: 1;
            user-select: none;
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 14px 30px rgba(15, 23, 42, .10);
            border-color: rgba(148, 163, 184, .9);
        }

        .btn:active {
            transform: translateY(0)
        }

        .btn-solid {
            border: none;
            background: var(--azul);
            color: #fff;
            box-shadow: 0 12px 24px rgba(31, 117, 216, .18);
        }

        .btn-ghost {
            background: rgba(17, 24, 39, .02)
        }

        @media (prefers-reduced-motion: reduce) {
            * {
                transition: none !important;
                animation: none !important;
                scroll-behavior: auto !important
            }
        }
    </style>
</head>

<body>
    <!-- JobHub HEADER (novo / isolado) -->
    <header class="jobhubH-shell">
        <div class="jobhubH-wrap">

            <a href="<?= URL_BASE ?>" class="jobhubH-logo" aria-label="Ir para a Home">
                <img src="<?= URL_BASE ?>assets/img/logo_preta.svg" alt="EmpresaDemo" class="jobhubH-logoImg">
            </a>

            <!-- DESKTOP NAV -->
            <nav class="jobhubH-nav" aria-label="Navegação principal">
                <a id="ctaEmpresa" href="<?= URL_BASE ?>cadastrar/recrutador"
                    class="jobhubH-cta jobhubH-cta--empresa"
                    data-guard="logged-out">
                    Anunciar vagas grátis
                </a>

                <a id="ctaCv" href="<?= URL_BASE ?>cadastrar/candidato"
                    class="jobhubH-cta jobhubH-cta--cv"
                    data-guard="logged-out">
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

                            <!-- ALERTAS (erro/sucesso geral) -->
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
                                    <a id="authSignupLink" href="<?= URL_BASE ?>cadastrar/candidato" data-guard="logged-out">Cadastrar</a>
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
                                <a class="jobhubU-item" id="goPerfil" href="<?= URL_BASE ?>perfil">Ver perfil</a>
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

            <!-- MOBILE BUTTON -->
            <button class="jobhubH-burger" id="openMobileMenu" type="button" aria-label="Abrir menu" aria-controls="mobileMenu" aria-expanded="false">☰</button>

        </div>
    </header>

    <!-- MOBILE MENU -->
    <div class="jobhubMM-overlay" id="mobileOverlay" hidden></div>

    <aside class="jobhubMM-panel" id="mobileMenu" aria-hidden="true" role="dialog" aria-label="Menu" hidden>
        <div class="jobhubMM-top">
            <a class="jobhubMM-brand" href="<?= URL_BASE ?>" aria-label="Ir para a Home">
                <img src="<?= URL_BASE ?>assets/img/logo_preta.svg" alt="EmpresaDemo" class="jobhubMM-brandImg">
            </a>
            <button class="jobhubMM-close" id="closeMobileMenu" type="button" aria-label="Fechar menu">×</button>
        </div>

        <div class="jobhubMM-ctaWrap">
            <a class="jobhubMM-cta jobhubMM-cta--empresa" id="mCtaEmpresa" href="<?= URL_BASE ?>cadastrar/recrutador" data-guard="logged-out">Anunciar vagas grátis</a>
            <a class="jobhubMM-cta jobhubMM-cta--cv" id="mCtaCv" href="<?= URL_BASE ?>cadastrar/candidato" data-guard="logged-out">Cadastrar CV grátis</a>
        </div>

        <nav class="jobhubMM-nav" aria-label="Atalhos">
            <a class="jobhubMM-link" href="<?= URL_BASE ?>empresa" data-guard="logged-out">Para empresas</a>
            <a class="jobhubMM-link" href="<?= URL_BASE ?>cadastrar" data-guard="logged-out">Enviar Currículo</a>
        </nav>

        <div class="jobhubMM-actions">
            <button class="jobhubMM-btn jobhubMM-btn--outline" id="mobileAuthTrigger" type="button">Entrar</button>
            <a class="jobhubMM-btn jobhubMM-btn--primary" id="mobileGoArea" href="#" hidden>Ir para minha área</a>
            <button class="jobhubMM-btn jobhubMM-btn--outline" id="mobileLogoutBtn" type="button" hidden>Sair</button>
        </div>
    </aside>


    <script>
        window.JobHub_API_BASE = window.JobHub_API_BASE || <?= api_base_json() ?>;
        window.JobHub_ROUTES = {
            HOME: "<?= URL_BASE ?>",
            PERFIL_EMPRESA: "<?= URL_BASE ?>recrutador/",
            CANDIDATO_AREA: "<?= URL_BASE ?>candidato",
            EMPRESA_AREA: "<?= URL_BASE ?>recrutador",
            LOGIN: "<?= URL_BASE ?>inicio",
            CADASTRO_CANDIDATO: "<?= URL_BASE ?>cadastrar/candidato",
            CADASTRO_RECRUTADOR: "<?= URL_BASE ?>cadastrar/recrutador"
        };
    </script>
    <script>
        (() => {
            "use strict";

            const API_BASE = window.JobHub_API_BASE || "";
            console.log("[JobHub] API_BASE =", API_BASE);
            console.log("[JobHub] login candidato =", `${API_BASE}/auth/login`);
            console.log("[JobHub] login empresa =", `${API_BASE}/auth/login/empresa`);

            const ROUTES = window.JobHub_ROUTES || {
                HOME: "/",
                PERFIL: "/perfil",
                CANDIDATO_AREA: "/candidato",
                EMPRESA_AREA: "<?= URL_BASE ?>recrutador",
                LOGIN: "<?= URL_BASE ?>inicio"
            };

            const SESSION_KEY = "empresaDemo.session.v1";
            const $ = (s) => document.querySelector(s);

            // ================== AUTH DOM ==================
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

            // tabs (NOVO seletor)
            const tabButtons = authRoot.querySelectorAll(".jobhubA-tab");
            let currentMode = (authRoot.getAttribute("data-default-mode") || "CANDIDATO").toUpperCase();

            // ================== MOBILE MENU DOM ==================
            const openMobileBtn = $("#openMobileMenu");
            const closeMobileBtn = $("#closeMobileMenu");
            const mobileMenu = $("#mobileMenu");
            const mobileOverlay = $("#mobileOverlay");
            const mobileAuthTrigger = $("#mobileAuthTrigger");
            const mobileGoArea = $("#mobileGoArea");
            const mobileLogoutBtn = $("#mobileLogoutBtn");

            // ================== HELPERS ==================
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
                const paths =
                    roleUpper === "CANDIDATO" ? ["/candidato/me", "/candidatos/me", "/me"] : ["/empresa/me", "/recrutador/me", "/empresa/recrutador/me", "/me"];

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
                const perfilCandidato = ROUTES.PERFIL_CANDIDATO || `${(ROUTES.CANDIDATO_AREA || "/candidato").replace(/\/$/, "")}/perfil`;
                const perfilEmpresa = ROUTES.PERFIL_EMPRESA || `${(ROUTES.EMPRESA_AREA || "/recrutador").replace(/\/$/, "")}/perfil`;
                return roleUpper === "RECRUTADOR" ? perfilEmpresa : perfilCandidato;
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

            // ================== UI: ALERTS + FIELD ERRORS ==================
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

            // ================== UI: TABS / MODO ==================
            function applyModeUI(modeUpper) {
                authRoot.dataset.mode = modeUpper;
                const authSignupLink = $("#authSignupLink");
                tabButtons.forEach(b => b.classList.toggle("jobhub-is-active", b.dataset.mode === modeUpper));

                const label = modeUpper === "RECRUTADOR" ? "Recrutador" : "Candidato";
                if (authSubmit) authSubmit.textContent = `Entrar como ${label}`;
                if (emailLabel) emailLabel.textContent = modeUpper === "RECRUTADOR" ? "E-mail (Recrutador)" : "E-mail (Candidato)";
                // ✅ ajusta o "Cadastrar" conforme a aba escolhida
                if (authSignupLink) {
                    authSignupLink.href =
                        modeUpper === "RECRUTADOR" ?
                        (ROUTES.CADASTRO_RECRUTADOR || "<?= URL_BASE ?>cadastrar/recrutador") :
                        (ROUTES.CADASTRO_CANDIDATO || "<?= URL_BASE ?>cadastrar/candidato");

                    // opcional (se quiser mudar o texto)
                    // authSignupLink.textContent = modeUpper === "RECRUTADOR" ? "Cadastrar empresa" : "Cadastrar candidato";
                }

                clearAllFeedback();
            }

            function setMode(modeUpper) {
                currentMode = modeUpper;
                applyModeUI(currentMode);
            }

            if (tabButtons.length) tabButtons.forEach(btn => btn.addEventListener("click", () => setMode(btn.dataset.mode)));
            setMode(currentMode);

            // ================== POPOVER ==================
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

            // ================== OLHO SENHA ==================
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

            // ================== RENDER ==================
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

            // ================== LOGIN SUBMIT ==================
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

            // ================== LOGOUT ==================
            function doLogout() {
                clearAuthStorage();
                renderLoggedOut();
                closePopover();
                window.location.href = ROUTES.HOME;
            }
            logoutBtn?.addEventListener("click", doLogout);
            mobileLogoutBtn?.addEventListener("click", doLogout);

            // ================== BOOT ==================
            (async function boot() {
                const sess = getStoredSession();
                if (!sess) return renderLoggedOut();

                let me = sess.me;
                if (!me) me = await fetchMeAndCache(sess.roleUpper, sess.token);
                if (sess.roleUpper === "RECRUTADOR" && !me) me = makeRecrutadorFallbackFromJwt(sess.token);

                bridgeSessionStorage(sess.roleUpper, sess.token, me);
                renderLoggedIn(sess.roleUpper, sess.token, me);
            })();

            // ================== MOBILE MENU ==================
            function trapTab(e) {
                if (!mobileMenu || mobileMenu.getAttribute("aria-hidden") === "true") return;
                if (e.key !== "Tab") return;

                const focusables = Array.from(mobileMenu.querySelectorAll('a[href], button:not([disabled]), input, select, textarea, [tabindex]:not([tabindex="-1"])'))
                    .filter(el => el.offsetParent !== null);

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

            let lastFocusEl = null;

            function openMenu() {
                if (!mobileOverlay || !mobileMenu) return;

                lastFocusEl = document.activeElement;

                mobileOverlay.hidden = false;
                mobileMenu.hidden = false;

                requestAnimationFrame(() => {
                    mobileMenu.classList.add("jobhub-show");
                    mobileOverlay.classList.add("jobhub-show");
                });

                mobileMenu.setAttribute("aria-hidden", "false");
                openMobileBtn?.setAttribute("aria-expanded", "true");
                document.body.classList.add("jobhub-noscroll");

                setTimeout(() => closeMobileBtn?.focus(), 60);
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

                // devolve o foco pra quem abriu
                setTimeout(() => {
                    if (lastFocusEl && typeof lastFocusEl.focus === 'function') lastFocusEl.focus();
                }, 260);
            }

            openMobileBtn?.addEventListener("click", openMenu);
            closeMobileBtn?.addEventListener("click", closeMenu);
            mobileOverlay?.addEventListener("click", closeMenu);

            document.addEventListener("keydown", (e) => {
                trapTab(e);
                if (e.key === "Escape") closeMenu();
            });

            mobileAuthTrigger?.addEventListener("click", () => {
                closeMenu();
                const visible = authBtn && authBtn.offsetParent !== null;
                if (visible) setTimeout(openPopover, 50);
                else window.location.href = ROUTES.LOGIN || ROUTES.HOME;
            });

            // ================== SUBMENU DESKTOP ==================
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
        })();

        /* =========================
           GUARD (independente)
           - bloqueia qualquer link com data-guard="logged-out"
           - checa token + exp direto do localStorage
        ========================= */
        (function() {
            "use strict";

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
                if (!exp) return false; // se não tiver exp, não dá pra afirmar
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

            function getRoleUpper() {
                const r = String(localStorage.getItem("role") || "").toUpperCase().trim();
                return (r === "RECRUTADOR" || r === "EMPRESA") ? "RECRUTADOR" : (r ? "CANDIDATO" : "");
            }

            function isLogged() {
                const token = getToken();
                if (!token) return false;
                if (isTokenExpired(token)) return false;
                return true;
            }

            function warnAlreadyLogged() {
                const roleUpper = getRoleUpper();
                const label = roleUpper === "RECRUTADOR" ? "recrutador/empresa" : "candidato";
                alert(`Já existe um usuário (${label}) logado.\n\nSe quiser criar outra conta, faça logout primeiro.`);
                // opcional: abre o dropdown pra pessoa ver o "Sair"
                const authBtn = document.getElementById("authBtn");
                if (authBtn) authBtn.click();
            }

            // Delegação: funciona até se você criar links depois
            document.addEventListener("click", (e) => {
                const a = e.target.closest('a[data-guard="logged-out"]');
                if (!a) return;

                if (!isLogged()) return; // deslogado -> navega normal

                e.preventDefault();
                e.stopPropagation();
                warnAlreadyLogged();
            }, true);
        })();
    </script>
    <script>
        (() => {
            "use strict";

            const $ = (s, el = document) => el.querySelector(s);

            // ====== JWT helpers (pra saber se token expirou)
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
                if (!exp) return false; // se não tiver exp, não dá pra afirmar
                return Date.now() >= exp * 1000;
            }

            function clearAuthStorage() {
                const keys = ["token", "role", "candidato_me", "empresa_me", "recrutador_me", "me", "user", "candidato_id", "accessToken", "access_token", "jwt", "AUTH_TOKEN"];
                keys.forEach(k => localStorage.removeItem(k));
                sessionStorage.removeItem("empresaDemo.session.v1");
            }

            function getSession() {
                const token =
                    localStorage.getItem("token") ||
                    localStorage.getItem("access_token") ||
                    localStorage.getItem("jwt") ||
                    "";

                if (!token) return {
                    logged: false
                };

                if (isTokenExpired(token)) {
                    clearAuthStorage();
                    return {
                        logged: false
                    };
                }

                const role = String(localStorage.getItem("role") || "").toUpperCase();
                const roleUpper = (role === "RECRUTADOR" || role === "EMPRESA") ? "RECRUTADOR" : "CANDIDATO";

                return {
                    logged: true,
                    roleUpper
                };
            }

            // ====== aviso (usa alert por ser simples e garantido)
            function warnAlreadyLogged(roleUpper) {
                const label = roleUpper === "RECRUTADOR" ? "recrutador/empresa" : "candidato";
                // se você preferir toast bonito, eu faço, mas alert resolve 100% sem CSS
                alert(`Já existe um usuário (${label}) logado.\n\nSe quiser criar/cadastrar outra conta, primeiro saia da conta atual.`);
            }

            function protectSignupLink(anchor) {
                if (!anchor) return;
                anchor.addEventListener("click", (e) => {
                    const sess = getSession();
                    if (!sess.logged) return; // deixa navegar normal
                    e.preventDefault();
                    e.stopPropagation();

                    warnAlreadyLogged(sess.roleUpper);

                    // opcional: abrir popover de conta pra pessoa ver o "Sair"
                    const authBtn = $("#authBtn");
                    if (authBtn) authBtn.click();
                }, true);
            }

            // desktop
            protectSignupLink($("#ctaEmpresa"));
            protectSignupLink($("#ctaCv"));

            // mobile (opcional)
            protectSignupLink($("#mCtaEmpresa"));
            protectSignupLink($("#mCtaCv"));
        })();
    </script>


    <script>
        (() => {
            "use strict";

            const header = document.querySelector(".jobhubH-shell");
            if (!header) return;

            let lastY = window.scrollY || 0;
            let ticking = false;

            const TOP = 8; // perto do topo não mexe
            const DELTA = 10; // ignora micro scroll

            function isOverlayOpen() {
                // se o menu mobile estiver aberto, não esconde o header
                const mobileMenu = document.getElementById("mobileMenu");
                const menuOpen = !!mobileMenu && mobileMenu.classList.contains("jobhub-show");

                // se o popover de auth estiver aberto, não esconde o header
                const pop = document.getElementById("authPopover");
                const popOpen = !!pop && pop.hidden === false;

                return menuOpen || popOpen;
            }

            function update() {
                const y = window.scrollY || 0;
                const diff = y - lastY;

                // efeito visual quando rola
                header.classList.toggle("is-scrolled", y > TOP);

                // --- MODO 1: apenas sticky + efeito (SEM esconder)
                // comente as linhas abaixo se você NÃO quiser esconder no scroll

                if (!isOverlayOpen()) {
                    if (y <= TOP) {
                        header.classList.remove("is-hidden");
                    } else if (Math.abs(diff) > DELTA) {
                        if (diff > 0) header.classList.add("is-hidden"); // descendo -> esconde
                        else header.classList.remove("is-hidden"); // subindo -> mostra
                    }
                } else {
                    header.classList.remove("is-hidden");
                }

                lastY = y;
                ticking = false;
            }

            window.addEventListener(
                "scroll",
                () => {
                    if (!ticking) {
                        ticking = true;
                        requestAnimationFrame(update);
                    }
                }, {
                    passive: true
                }
            );

            update();
        })();
    </script>

    <!-- Overlay do Sidebar (mobile) -->
    <div class="sbOverlay" id="sbOverlay" hidden></div>

    <!-- Botão flutuante Sidebar (mobile) -->
    <button class="fabMenu" id="fabMenu" type="button" aria-label="Abrir menu do painel">
        <i class="fa-solid fa-bars"></i>
    </button>

    <!-- APP -->
    <div class="app">
        <!-- SIDEBAR -->
        <aside class="sb" id="sidebar">
            <div class="sb-top">
                <div class="sb-title">
                    <b class="sb-titleText">Painel da Empresa</b>
                    <small id="sbCompanyMini">—</small>
                </div>

                <button class="sb-close" id="sbClose" type="button" aria-label="Fechar menu">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <nav class="sb-nav" aria-label="Menu do painel">
                <button class="sb-btn" id="sbVerVagas" type="button">
                    <span class="sb-ico"><i class="fa-solid fa-briefcase"></i></span>
                    <span class="sb-label">
                        <span>Ver vagas</span>
                        <small>Lista e filtros</small>
                    </span>
                </button>

                <button class="sb-btn primary" id="sbCriarVaga" type="button">
                    <span class="sb-ico"><i class="fa-solid fa-plus"></i></span>
                    <span class="sb-label">
                        <span>Criar vaga</span>
                        <small>Abrir formulário</small>
                    </span>
                </button>

                <button class="sb-btn" id="sbVerCandidatos" type="button">
                    <span class="sb-ico"><i class="fa-solid fa-users"></i></span>
                    <span class="sb-label">
                        <span>Ver candidatos</span>
                        <small>Todos os candidatos</small>
                    </span>
                </button>
            </nav>

            <div class="sb-group">
                <button class="sb-btn" id="sbModoEditar" type="button" aria-pressed="false">
                    <span class="sb-ico"><i class="fa-solid fa-pen-to-square"></i></span>
                    <span class="sb-label">
                        <span>Modo edição</span>
                        <small>Editar / excluir vagas</small>
                    </span>
                </button>
            </div>

            <div class="sb-group">
                <div style="display:flex;flex-wrap:wrap;gap:8px;">
                    <span class="pill neutral" id="companyMini"><i class="fa-solid fa-building"></i> Empresa: —</span>
                    <span class="pill neutral" id="lastUpdateMini"><i class="fa-regular fa-clock"></i> Atualizado: —</span>
                    <span class="pill neutral" id="editModeMini" style="display:none;"><i class="fa-solid fa-pen-to-square"></i>
                        Modo edição</span>
                </div>
            </div>
        </aside>

        <!-- CONTEÚDO -->
        <main class="content">

            <section class="dash-top">
                <div class="dash-title">
                    <h1>Painel da Empresa</h1>
                    <p>Visão geral das suas vagas. Use o menu lateral para ver vagas, criar vaga e ver candidatos.</p>
                </div>
            </section>

            <section class="kpi-bar" aria-label="Indicadores">
                <div class="kpi-card">
                    <div class="kpi-ico"><i class="fa-solid fa-briefcase"></i></div>
                    <div><strong id="kpiVagas">0</strong><span>Vagas cadastradas</span></div>
                </div>
                <div class="kpi-card" style="color: #10b981;">
                    <div class="kpi-ico" style="color: #10b981;"><i class="fa-solid fa-circle-check"></i></div>
                    <div><strong id="kpiAbertas" style="color: #10b981;">0</strong><span style="color: #10b981;">Vagas abertas</span></div>
                </div>
                <div class="kpi-card">
                    <div class="kpi-ico" style="color: #fd721c;"><i class="fa-solid fa-circle-pause"></i></div>
                    <div><strong id="kpiPausadas" style="color: #fd721c;">0</strong><span style="color: #fd721c;">Vagas pausadas</span></div>
                </div>
                <div class="kpi-card">
                    <div class="kpi-ico"><i class="fa-solid fa-users"></i></div>
                    <div><strong id="kpiInteressados">0</strong><span>Interessados (soma)</span></div>
                </div>
            </section>

            <!-- LISTÃO -->
            <section class="card" id="secVagas">
                <div class="card-hd">
                    <div>
                        <h2 class="card-title">Vagas da empresa</h2>
                        <p class="card-sub">Busque/filtre e use o modo edição para editar/excluir.</p>
                    </div>
                </div>

                <div class="toolbar">
                    <div class="chips" id="chipsVagas" aria-label="Filtrar por status">
                        <button class="chip active" data-v="todas" type="button">Todas</button>
                        <button class="chip" data-v="ABERTA" type="button">Abertas</button>
                        <button class="chip" data-v="PAUSADA" type="button">Pausadas</button>
                        <button class="chip" data-v="ENCERRADA" type="button">Encerradas</button>
                    </div>

                    <div class="tools">
                        <div class="search" role="search" aria-label="Buscar vagas">
                            <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                            <input id="vagaSearch" type="search" placeholder="Buscar por cargo, cidade, status..."
                                autocomplete="off" />
                            <button class="clear" id="clearSearch" type="button" aria-label="Limpar busca">×</button>
                        </div>

                        <select class="select" id="vagaSort" aria-label="Ordenar vagas">
                            <option value="recent" selected>Mais recentes</option>
                            <option value="title">Cargo (A–Z)</option>
                            <option value="status">Status</option>
                            <option value="interessados">Mais interessados</option>
                        </select>
                    </div>
                </div>

                <div id="vagasError" class="empty error" style="display:none; margin-top:12px;">
                    <b>Não consegui carregar suas vagas.</b>
                    <div id="vagasErrorMsg" style="margin-top:6px;">—</div>
                    <div class="row">
                        <button class="btn btn-solid" id="btnRetryVagas" type="button">
                            <i class="fa-solid fa-rotate-right"></i> Tentar novamente
                        </button>
                    </div>
                </div>

                <div id="vagasList" aria-live="polite" style="margin-top:12px;"></div>

                <div id="vagasEmpty" class="empty" style="display:none; margin-top:12px;">
                    Você ainda não possui vagas. <b>Clique em “Criar vaga”</b> para começar.
                </div>
            </section>
        </main>
    </div>

    <!-- TOAST -->
    <div class="toast" id="toast" role="status" aria-live="polite">
        <span class="dot" aria-hidden="true"></span>
        <span id="toastText">—</span>
    </div>

    <!-- MODAL -->
    <div class="modal" id="modalVaga" aria-hidden="true">
        <div class="modal-card" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
            <div class="modal-top">
                <b id="modalTitle">Nova vaga</b>
                <button class="btn" id="btnCloseModal" type="button">
                    <i class="fa-solid fa-xmark"></i> Fechar
                </button>
            </div>

            <div class="modal-body" id="modalBody">
                <form id="vagaForm" novalidate>
                    <div class="form-grid">

                        <fieldset>
                            <legend>Identificação</legend>
                            <div class="form-grid">
                                <div class="field">
                                    <label>ID Unidade (unidadeEmpresa)</label>
                                    <input id="fUnidadeId" type="number" min="1" placeholder="Ex.: 1" inputmode="numeric">
                                    <div class="err" id="errUnidade"></div>
                                </div>

                                <div class="field">
                                    <label>ID Recrutador</label>
                                    <input id="fRecrutadorId" type="number" min="1" placeholder="Ex.: 1" inputmode="numeric">
                                    <div class="err" id="errRecrutador"></div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>Dados da vaga</legend>
                            <div class="form-grid">
                                <div class="field">
                                    <label>Cargo *</label>
                                    <input id="fCargo" type="text" placeholder="Ex.: Supervisor de Operações" required>
                                    <div class="err" id="errCargo"></div>
                                </div>

                                <div class="field">
                                    <label>Complemento</label>
                                    <input id="fComplemento" type="text" placeholder="Ex.: Logística e Suprimentos">
                                    <div class="hint">Opcional: ajuda a detalhar a área/atuação.</div>
                                </div>

                                <div class="field">
                                    <label>Nível hierárquico</label>
                                    <select id="fNivel">
                                        <option value="JUNIOR">JUNIOR</option>
                                        <option value="PLENO" selected>PLENO</option>
                                        <option value="SENIOR">SENIOR</option>
                                    </select>
                                </div>

                                <div class="field">
                                    <label>Tipo contrato</label>
                                    <select id="fTipoContrato">
                                        <option value="CLT" selected>CLT</option>
                                        <option value="PJ">PJ</option>
                                        <option value="ESTAGIO">ESTÁGIO</option>
                                        <option value="TRAINEE">TRAINEE</option>
                                    </select>
                                </div>

                                <div class="field">
                                    <label>Modalidade</label>
                                    <select id="fModalidadeVaga">
                                        <option value="PRESENCIAL" selected>PRESENCIAL</option>
                                        <option value="HIBRIDO">HÍBRIDO</option>
                                        <option value="REMOTO">REMOTO</option>
                                    </select>
                                </div>

                                <div class="field">
                                    <label>Categoria</label>
                                    <select id="fCategoriaVaga">
                                        <option value="ADMINISTRATIVO" selected>ADMINISTRATIVO</option>
                                        <option value="TECNOLOGIA">TECNOLOGIA</option>
                                        <option value="RH">RH</option>
                                        <option value="FINANCEIRO">FINANCEIRO</option>
                                        <option value="JURIDICO">JURÍDICO</option>
                                        <option value="VENDAS">VENDAS</option>
                                        <option value="SAUDE">SAÚDE</option>
                                        <option value="EDUCACAO">EDUCAÇÃO</option>
                                        <option value="PRODUCAO">PRODUÇÃO</option>
                                        <option value="COZINHA">COZINHA</option>
                                        <option value="PRIMEIRO_EMPREGO">PRIMEIRO EMPREGO</option>
                                        <option value="PCD">PCD</option>
                                    </select>
                                </div>

                                <div class="field">
                                    <label>Tipo salário</label>
                                    <select id="fSalarioTipo">
                                        <option value="FIXO" selected>FIXO</option>
                                        <option value="COMBINAR">A COMBINAR</option>
                                    </select>
                                </div>

                                <div class="field">
                                    <label>Salário (R$)</label>
                                    <input id="fSalario" type="text" placeholder="Ex.: 6500,00" inputmode="decimal" autocomplete="off">
                                    <div class="hint">Aceita vírgula ou ponto.</div>
                                </div>

                                <div class="field">
                                    <label>Status da vaga</label>
                                    <select id="fStatusVaga">
                                        <option value="ABERTA" selected>ABERTA</option>
                                        <option value="PAUSADA">PAUSADA</option>
                                        <option value="ENCERRADA">ENCERRADA</option>
                                    </select>
                                </div>

                                <div class="field" style="grid-column: 1 / -1;">
                                    <label>Descrição *</label>
                                    <textarea id="fDesc" placeholder="Responsabilidades, requisitos e benefícios." required
                                        minlength="10"></textarea>
                                    <div class="hint" id="descCount">0 caracteres</div>
                                    <div class="err" id="errDesc"></div>
                                </div>

                                <div class="field" style="grid-column: 1 / -1;">
                                    <label>Jornada</label>
                                    <input id="fJornada" type="text" placeholder="Ex.: Segunda a sexta, 08h às 18h">
                                </div>

                                <div class="field" style="grid-column: 1 / -1;">
                                    <label>Configurações</label>
                                    <div style="display:flex;gap:14px;flex-wrap:wrap;align-items:center;padding:10px 0;">
                                        <label style="display:flex;gap:10px;align-items:center;font-weight:900;color:#334155;">
                                            <input id="fUrgente" type="checkbox"> Contratação urgente
                                        </label>
                                        <label style="display:flex;gap:10px;align-items:center;font-weight:900;color:#334155;">
                                            <input id="fConfidencial" type="checkbox"> Empresa confidencial
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>Localização</legend>
                            <div class="form-grid">
                                <div class="field">
                                    <label>Cidade *</label>
                                    <input id="fCidade" type="text" placeholder="Ex.: São Paulo" required>
                                    <div class="err" id="errCidade"></div>
                                </div>

                                <div class="field">
                                    <label>Estado (UF) *</label>
                                    <input id="fEstado" type="text" maxlength="2" placeholder="Ex.: SP" required autocomplete="off">
                                    <div class="err" id="errEstado"></div>
                                </div>

                                <div class="field">
                                    <label>Tipo endereço</label>
                                    <select id="fTipoEndereco">
                                        <option value="EMPRESA">EMPRESA</option>
                                        <option value="OUTRO" selected>OUTRO</option>
                                        <option value="REMOTO">REMOTO</option>
                                        <option value="HIBRIDO">HÍBRIDO</option>
                                    </select>
                                </div>

                                <div class="field">
                                    <label>CEP</label>
                                    <input id="fCep" type="text" placeholder="Ex.: 04101-000" inputmode="numeric"
                                        autocomplete="postal-code">
                                </div>

                                <div class="field">
                                    <label>Rua</label>
                                    <input id="fRua" type="text" placeholder="Ex.: Rua do Porto">
                                </div>

                                <div class="field">
                                    <label>Número</label>
                                    <input id="fNumero" type="text" placeholder="Ex.: 420">
                                </div>

                                <div class="field">
                                    <label>Complemento (endereço)</label>
                                    <input id="fEndComp" type="text" placeholder="Ex.: Galpão 3">
                                </div>

                                <div class="field">
                                    <label>Bairro</label>
                                    <input id="fBairro" type="text" placeholder="Ex.: Vila Leopoldina">
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>Detalhes completos da vaga</legend>
                            <div class="form-grid">
                                <div class="field" style="grid-column:1 / -1;">
                                    <label>Responsabilidades (1 por linha)</label>
                                    <textarea id="fResponsabilidades" placeholder="Ex.: Liderar equipe&#10;Acompanhar indicadores"></textarea>
                                </div>
                                <div class="field" style="grid-column:1 / -1;">
                                    <label>Requisitos obrigatórios (1 por linha)</label>
                                    <textarea id="fReqObrigatorios" placeholder="Ex.: Excel avançado&#10;Experiência com gestão"></textarea>
                                </div>
                                <div class="field" style="grid-column:1 / -1;">
                                    <label>Requisitos desejáveis (1 por linha)</label>
                                    <textarea id="fReqDesejaveis" placeholder="Ex.: Power BI&#10;Inglês"></textarea>
                                </div>
                                <div class="field" style="grid-column:1 / -1;">
                                    <label>Benefícios (1 por linha)</label>
                                    <textarea id="fBeneficios" placeholder="Ex.: Vale refeição&#10;Convênio médico"></textarea>
                                </div>
                                <div class="field">
                                    <label>Escolaridade</label>
                                    <input id="fEscolaridade" type="text" placeholder="Ex.: Ensino superior completo">
                                </div>
                                <div class="field">
                                    <label>Experiência/Formação</label>
                                    <input id="fExperiencia" type="text" placeholder="Ex.: 2 anos na área">
                                </div>
                                <div class="field" style="grid-column:1 / -1;">
                                    <label>Requisitos extras / observações</label>
                                    <textarea id="fReqObs" placeholder="Ex.: Disponibilidade para viagens e veículo próprio."></textarea>
                                </div>
                                <div class="field">
                                    <label>Idiomas</label>
                                    <input id="fIdiomas" type="text" placeholder="Ex.: Inglês:FLUENTE*, Espanhol:INTERMEDIARIO">
                                    <small style="color:#64748b">Use vírgulas. * marca idioma obrigatório.</small>
                                </div>
                                <div class="field">
                                    <label>CNHs</label>
                                    <input id="fCnhs" type="text" placeholder="Ex.: B, D">
                                </div>
                            </div>
                        </fieldset>

                    </div>
                </form>
            </div>

            <div class="modal-actions">
                <button class="btn btn-ghost" id="btnDeleteVaga" type="button" style="display:none;">
                    <i class="fa-solid fa-trash"></i> Excluir
                </button>
                <button class="btn" id="btnCancelarModal" type="button">Cancelar</button>
                <button class="btn btn-solid" id="btnSalvarVaga" type="submit" form="vagaForm">
                    <i class="fa-solid fa-check"></i> Salvar
                </button>
            </div>
        </div>
    </div>

    <script>
        window.JobHub_API_BASE = window.JobHub_API_BASE || <?= api_base_json() ?>;
        window.JobHub_ROUTES = {
            ...(window.JobHub_ROUTES || {}),
            HOME: "<?= URL_BASE ?>",
            LOGIN: "<?= URL_BASE ?>inicio",
            EMPRESA_AREA: "<?= URL_BASE ?>recrutador",
            PERFIL_EMPRESA: "<?= URL_BASE ?>recrutador/perfil",
            CANDIDATOS_TODOS: "<?= URL_BASE ?>empresa",

            // GARANTE candidato
            CANDIDATO_AREA: "<?= URL_BASE ?>candidato",
            PERFIL_CANDIDATO: "<?= URL_BASE ?>candidato/perfil"
        };
    </script>

    <script>
        (() => {
            "use strict";

            /* =========================
               CONFIG
            ========================= */
            const API_BASE = window.JobHub_API_BASE || "";

            // usa um nome diferente pra não conflitar
            const BASE_URL = window.URL_BASE || "<?= URL_BASE ?>";

            const ROUTES = window.JobHub_ROUTES || {};
            const LOGIN_URL = ROUTES.LOGIN ?
                `${ROUTES.LOGIN}?mode=recrutador` :
                `${BASE_URL}login?mode=recrutador`;

            // ajuste a rota real da página de candidatos do seu MVC
            const CANDIDATOS_URL = `${BASE_URL}recrutador/recrutador`;
            const BUSCA_URL = CANDIDATOS_URL;

            async function bridgeIfNeeded() {
                const token = localStorage.getItem("token");
                const role = (localStorage.getItem("role") || "").toUpperCase();
                if (!token) return false;
                if (role !== "RECRUTADOR" && role !== "EMPRESA") return false;

                try {
                    const resp = await fetch(`${BASE_URL}recrutador/bridge`, {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({ token }),
                        credentials: "include"
                    });
                    return resp.ok;
                } catch (e) {
                    console.warn("bridge falhou", e);
                    return false;
                }
            }

            async function goToCandidates(vagaId = "") {
                await bridgeIfNeeded();
                const url = new URL(CANDIDATOS_URL, location.origin);
                if (vagaId) url.searchParams.set("vagaId", String(vagaId));
                window.location.href = url.toString();
            }

            const ENDPOINTS = {
                listVagas: [
                    `${API_BASE}/vagas/me`,
                    `${API_BASE}/vagas/list`,
                ],
                createVaga: `${API_BASE}/vagas`,
                updateVaga: (id) => `${API_BASE}/vagas/${id}`,
                deleteVaga: (id) => ([
                    `${API_BASE}/vagas/${id}`
                ]),
            };

            /* =========================
               Helpers DOM
            ========================= */
            const $ = (s, el = document) => el.querySelector(s);

            function setText(sel, value) {
                const el = $(sel);
                if (el) el.textContent = String(value ?? "");
            }

            function setDisplay(sel, show, display = "block") {
                const el = $(sel);
                if (el) el.style.display = show ? display : "none";
            }

            /* =========================
               Toast
            ========================= */
            const toastEl = $("#toast");
            const toastText = $("#toastText");
            const TOAST_MS = 1900;

            function toast(msg) {
                if (!toastEl) return;
                if (toastText) toastText.textContent = String(msg || "");
                toastEl.classList.add("show");
                clearTimeout(toastEl._t);
                toastEl._t = setTimeout(() => toastEl.classList.remove("show"), TOAST_MS);
            }

            /* =========================
               Auth helpers (token)
            ========================= */
            function getToken() {
                return (
                    localStorage.getItem("token") ||
                    localStorage.getItem("access_token") ||
                    localStorage.getItem("jwt") ||
                    ""
                );
            }

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

            function ensureAuthOrRedirect() {
                const token = getToken();
                if (!token) {
                    toast("Faça login para acessar o painel.");
                    setTimeout(() => window.location.replace(LOGIN_URL), 800);
                    return false;
                }
                if (isTokenExpired(token)) {
                    toast("Sua sessão expirou. Faça login novamente.");
                    localStorage.removeItem("token");
                    setTimeout(() => window.location.replace(LOGIN_URL), 900);
                    return false;
                }
                return true;
            }

            /* =========================
               HTTP
            ========================= */
            async function requestJSON(url, {
                method = "GET",
                body = null,
                signal = null
            } = {}) {
                const token = getToken();
                const headers = {
                    ...(token ? {
                        Authorization: `Bearer ${token}`
                    } : {})
                };
                if (body) headers["Content-Type"] = "application/json";

                const resp = await fetch(url, {
                    method,
                    headers,
                    body: body ? JSON.stringify(body) : null,
                    signal
                });

                const raw = await resp.text().catch(() => "");
                let data = null;
                try {
                    data = raw ? JSON.parse(raw) : null;
                } catch {}

                if (resp.status === 401 || resp.status === 403) throw new Error("Não autorizado (sessão expirada).");
                if (!resp.ok) {
                    const msg = (data && (data.mensagem || data.message || data.error)) || raw || `HTTP ${resp.status}`;
                    throw new Error(msg);
                }
                return data ?? {};
            }

            /* =========================
               Utils
            ========================= */
            function escapeHTML(str) {
                return String(str ?? "")
                    .replaceAll("&", "&amp;").replaceAll("<", "&lt;").replaceAll(">", "&gt;")
                    .replaceAll('"', "&quot;").replaceAll("'", "&#039;");
            }

            function normalize(s) {
                return String(s || "").toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            }

            function statusPill(status) {
                const s = String(status || "").toUpperCase();
                if (s === "ABERTA") return `<span class="pill ok"><i class="fa-solid fa-circle-check"></i> ABERTA</span>`;
                if (s === "PAUSADA") return `<span class="pill warn"><i class="fa-solid fa-circle-pause"></i> PAUSADA</span>`;
                if (s === "ENCERRADA") return `<span class="pill bad"><i class="fa-solid fa-circle-xmark"></i> ENCERRADA</span>`;
                return `<span class="pill neutral">${escapeHTML(s || "—")}</span>`;
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

            function safeJSONParse(v) {
                try {
                    return v ? JSON.parse(v) : null;
                } catch {
                    return null;
                }
            }

            function pickIdFrom(obj, keys) {
                if (!obj || typeof obj !== "object") return null;
                for (const k of keys) {
                    const n = Number(obj?.[k]);
                    if (Number.isFinite(n) && n > 0) return n;
                }
                return null;
            }

            function getDefaultIdsFromStorage() {
                const sess = safeJSONParse(sessionStorage.getItem("empresaDemo.session.v1"));
                const empresaMe =
                    safeJSONParse(localStorage.getItem("empresa_me")) ||
                    safeJSONParse(localStorage.getItem("recrutador_me")) ||
                    safeJSONParse(localStorage.getItem("me")) ||
                    sess?.user || null;

                const unidadeId =
                    pickIdFrom(empresaMe?.unidadeEmpresa, ["idUnidadeEmpresa"]) ||
                    pickIdFrom(empresaMe, ["idUnidadeEmpresa", "unidadeEmpresaId", "unidadeId", "idUnidade"]) || 1;

                const recrutadorId =
                    pickIdFrom(empresaMe?.recrutador, ["idRecrutador"]) ||
                    pickIdFrom(empresaMe, ["idRecrutador", "recrutadorId", "idUsuario", "userId"]) || 1;

                return {
                    unidadeId,
                    recrutadorId,
                    empresaMe
                };
            }

            function setCompanyMini() {
                const { empresaMe } = getDefaultIdsFromStorage();
                const sess = safeJSONParse(sessionStorage.getItem("empresaDemo.session.v1")) || {};
                const token = localStorage.getItem("token") || "";
                const jwt = decodeJwtPayload(token) || {};
                const email = empresaMe?.email || sess?.user?.email || jwt?.sub || "";
                const recrutadorNome = empresaMe?.nomeExibicao || empresaMe?.nome || (email ? email.split("@")[0].replaceAll(".", " ").replace(/\b\w/g, m => m.toUpperCase()) : "Recrutador");
                const empresaNome = empresaMe?.razaoSocial || empresaMe?.nomeFantasia || empresaMe?.empresaNome || empresaMe?.empresa?.razaoSocial || recrutadorNome || "—";
                setText("#companyMini", `Recrutador: ${recrutadorNome}`);
                setText("#sbCompanyMini", empresaNome);
            }

            function setLastUpdate(dt) {
                const d = dt || new Date();
                const fmt = `${String(d.getDate()).padStart(2, "0")}/${String(d.getMonth() + 1).padStart(2, "0")} ${String(d.getHours()).padStart(2, "0")}:${String(d.getMinutes()).padStart(2, "0")}`;
                setText("#lastUpdateMini", `Atualizado: ${fmt}`);
            }

            function setEditModeMini(on) {
                setDisplay("#editModeMini", !!on, "inline-flex");
            }

            /* =========================
               Normalização API
            ========================= */
            function normalizeVagaFromApi(v) {
                const id = Number(v?.idVaga) || Number(v?.id) || Number(v?.vagaId) || 0;
                const status = String(v?.statusVaga || v?.status || "ABERTA").toUpperCase();
                const loc = v?.localizacao || v?.endereco || v?.local || {};
                const cidade = loc?.cidade || v?.cidade || "";
                const estado = loc?.estado || loc?.uf || v?.estado || "";
                const complemento = v?.complementoCargo ?? v?.complemento ?? v?.cargoComplemento ?? "";

                return {
                    id,
                    titulo: v?.cargo || v?.titulo || v?.nome || `Vaga #${id || "—"}`,
                    complemento,
                    status,
                    modelo: loc?.tipoEndereco || v?.tipoEndereco || "OUTRO",
                    cidade: (cidade && estado) ? `${cidade}/${estado}` : (cidade || estado || "—"),
                    nivel: v?.nivelHierarquico || v?.nivel || "—",
                    tipoContrato: v?.tipoContrato || v?.contrato || "—",
                    salario: v?.salario ?? v?.remuneracao ?? null,
                    urgente: !!(v?.contratacaoUrgente ?? v?.urgente),
                    confidencial: !!(v?.empresaConfidencial ?? v?.confidencial),
                    interessados: Number(v?.interessados || v?.totalInteressados || 0),
                    descricao: v?.descricao || "",
                    companyName: v?.empresaDTO?.empresaNome || v?.empresaNome || v?.empresa?.nome || "",
                    _raw: v
                };
            }

            /* =========================
               API (fallback)
            ========================= */
            const Api = {
                async listVagas(signal = null) {
                    let lastErr = null;
                    for (const url of ENDPOINTS.listVagas) {
                        try {
                            const data = await requestJSON(url, {
                                signal
                            });
                            const arr = Array.isArray(data) ?
                                data :
                                (Array.isArray(data?.content) ? data.content : (Array.isArray(data?.data) ? data.data : []));
                            const mapped = arr.map(normalizeVagaFromApi);
                            const ownCompany = normalize(getCompanySnapshot().empresaNome || "");
                            if (ownCompany) {
                                const filtered = mapped.filter(v => {
                                    const nm = normalize(v.companyName || "");
                                    return nm && (nm.includes(ownCompany) || ownCompany.includes(nm));
                                });
                                if (filtered.length) return filtered;
                            }
                            return mapped;
                        } catch (e) {
                            lastErr = e;
                        }
                    }
                    throw lastErr || new Error("Não consegui carregar vagas.");
                },
                async createVaga(payload) {
                    return requestJSON(ENDPOINTS.createVaga, {
                        method: "POST",
                        body: payload
                    });
                },
                async updateVaga(id, payload) {
                    try {
                        return await requestJSON(ENDPOINTS.updateVaga(id), {
                            method: "PUT",
                            body: payload
                        });
                    } catch (e) {
                        if (Number(e?.status) === 404) {
                            throw new Error("A API respondeu 404 ao atualizar a vaga. Isso indica falha no endpoint publicado do backend, não mais uma rota alternativa do front.");
                        }
                        throw e;
                    }
                },
                async deleteVaga(id) {
                    const urls = ENDPOINTS.deleteVaga(id);
                    let lastErr = null;
                    for (const url of urls) {
                        try {
                            return await requestJSON(url, {
                                method: "DELETE"
                            });
                        } catch (e) {
                            lastErr = e;
                        }
                    }
                    throw lastErr || new Error("Não consegui excluir a vaga.");
                },
            };

            /* =========================
               Estado
            ========================= */
            const state = {
                vagas: [],
                filtroStatus: "todas",
                query: "",
                sort: "recent",
                editMode: false,
            };

            /* =========================
               Skeleton
            ========================= */
            function renderVagasSkeleton() {
                const list = $("#vagasList");
                if (!list) return;
                list.innerHTML = `
          <div class="empty" style="border-style:solid;">
            <div class="skeleton sk-row lg"></div>
            <div class="skeleton sk-row md"></div>
            <div class="skeleton sk-row sm"></div>
          </div>
        `;
            }

            /* =========================
               KPIs
            ========================= */
            function updateKpis() {
                const total = state.vagas.length;
                const abertas = state.vagas.filter(v => String(v.status).toUpperCase() === "ABERTA").length;
                const pausadas = state.vagas.filter(v => String(v.status).toUpperCase() === "PAUSADA").length;
                const interessados = state.vagas.reduce((acc, v) => acc + Number(v.interessados || 0), 0);

                setText("#kpiVagas", total);
                setText("#kpiAbertas", abertas);
                setText("#kpiPausadas", pausadas);
                setText("#kpiInteressados", interessados);
            }

            /* =========================
               Vagas: filtro + sort
            ========================= */
            function vagasFiltradasOrdenadas() {
                const q = normalize(state.query);

                let arr = state.vagas.filter(v => {
                    const okStatus = (state.filtroStatus === "todas") ?
                        true :
                        String(v.status).toUpperCase() === String(state.filtroStatus).toUpperCase();

                    const hay = normalize([v.titulo, v.complemento, v.cidade, v.modelo, v.nivel, v.status, v.tipoContrato].join(" | "));
                    const okQ = !q || hay.includes(q);
                    return okStatus && okQ;
                });

                const sort = state.sort;
                if (sort === "recent") arr.sort((a, b) => (Number(b.id || 0) - Number(a.id || 0)));
                if (sort === "title") arr.sort((a, b) => String(a.titulo || "").localeCompare(String(b.titulo || ""), "pt-BR"));
                if (sort === "interessados") arr.sort((a, b) => (Number(b.interessados || 0) - Number(a.interessados || 0)));
                if (sort === "status") {
                    const order = {
                        "ABERTA": 0,
                        "PAUSADA": 1,
                        "ENCERRADA": 2
                    };
                    arr.sort((a, b) => (order[a.status] ?? 9) - (order[b.status] ?? 9));
                }
                return arr;
            }

            function renderVagas() {
                const list = $("#vagasList");
                if (!list) return;

                updateKpis();

                if (!state.vagas.length) {
                    list.innerHTML = "";
                    setDisplay("#vagasEmpty", true);
                    return;
                }

                const arr = vagasFiltradasOrdenadas();
                setDisplay("#vagasEmpty", false);

                if (!arr.length) {
                    list.innerHTML = `
            <div class="empty">
              Nenhuma vaga encontrada com os filtros atuais. <b>Ajuste a busca</b> ou troque o status.
            </div>`;
                    return;
                }

                const rows = arr.map(v => {
                    const salarioTxt = formatMoney(v.salario);
                    const urgent = v.urgente ? `<span class="pill warn"><i class="fa-solid fa-bolt"></i> urgente</span>` : "";
                    const conf = v.confidencial ? `<span class="pill neutral"><i class="fa-solid fa-user-secret"></i> confidencial</span>` : "";
                    const editActions = state.editMode ? `
            <button class="btn-sm primary" data-act="editar" type="button"><i class="fa-solid fa-pen"></i> Editar</button>
            <button class="btn-sm danger" data-act="excluir" type="button"><i class="fa-solid fa-trash"></i> Excluir</button>
          ` : ``;

                    return `
            <tr data-id="${v.id}">
              <td>
                <div class="vagaTitle">
                  ${escapeHTML(v.titulo)}
                  ${v.complemento ? `<span class="pill neutral">${escapeHTML(v.complemento)}</span>` : ""}
                </div>
                <div class="vagaSub">
                  ${escapeHTML(v.cidade)} • ${escapeHTML(String(v.modelo || "OUTRO").toUpperCase())} • ${escapeHTML(String(v.nivel || "—").toUpperCase())}
                </div>
                <div style="margin-top:8px; display:flex; flex-wrap:wrap; gap:8px;">
                  ${statusPill(v.status)}
                  <span class="pill">${escapeHTML(String(v.tipoContrato || "—").toUpperCase())}</span>
                  ${salarioTxt ? `<span class="pill"><i class="fa-solid fa-money-bill-wave"></i> ${escapeHTML(salarioTxt)}</span>` : ""}
                  <span class="pill"><i class="fa-solid fa-users"></i> ${Number(v.interessados || 0)} interessados</span>
                  ${urgent}
                  ${conf}
                </div>
              </td>

              <td class="hide-sm">
                <span class="mutedSmall">#${escapeHTML(v.id)}</span>
              </td>

              <td class="hide-sm">
                <span class="mutedSmall">${escapeHTML(String(v.status || "—"))}</span>
              </td>

              <td class="hide-sm">
                <span class="mutedSmall">${Number(v.interessados || 0)}</span>
              </td>

              <td style="width:260px;">
                <div class="vagaActionsRow">
                  <button class="btn-sm" data-act="candidatos" type="button">
                    <i class="fa-solid fa-user-group"></i> Ver candidatos
                  </button>
                  ${editActions}
                </div>
              </td>
            </tr>
          `;
                }).join("");

                list.innerHTML = `
          <table class="vagaTable" role="table" aria-label="Lista de vagas da empresa">
            <thead>
              <tr>
                <th>Vaga</th>
                <th class="hide-sm">ID</th>
                <th class="hide-sm">Status</th>
                <th class="hide-sm">Interessados</th>
                <th style="text-align:right;">Ações</th>
              </tr>
            </thead>
            <tbody>
              ${rows}
            </tbody>
          </table>
        `;
            }

            /* =========================
               Modal (criar/editar)
            ========================= */
            const modal = $("#modalVaga");
            const modalTitle = $("#modalTitle");
            const btnCloseModal = $("#btnCloseModal");
            const btnCancelarModal = $("#btnCancelarModal");
            const btnSalvarVaga = $("#btnSalvarVaga");
            const btnDeleteVaga = $("#btnDeleteVaga");
            const vagaForm = $("#vagaForm");
            const modalBody = $("#modalBody");

            const fUnidadeId = $("#fUnidadeId");
            const fRecrutadorId = $("#fRecrutadorId");
            const fCargo = $("#fCargo");
            const fComplemento = $("#fComplemento");
            const fNivel = $("#fNivel");
            const fTipoContrato = $("#fTipoContrato");
            const fModalidadeVaga = $("#fModalidadeVaga");
            const fCategoriaVaga = $("#fCategoriaVaga");
            const fSalarioTipo = $("#fSalarioTipo");
            const fSalario = $("#fSalario");
            const fStatusVaga = $("#fStatusVaga");
            const fDesc = $("#fDesc");
            const fJornada = $("#fJornada");
            const fResponsabilidades = $("#fResponsabilidades");
            const fReqObrigatorios = $("#fReqObrigatorios");
            const fReqDesejaveis = $("#fReqDesejaveis");
            const fBeneficios = $("#fBeneficios");
            const fEscolaridade = $("#fEscolaridade");
            const fExperiencia = $("#fExperiencia");
            const fReqObs = $("#fReqObs");
            const fIdiomas = $("#fIdiomas");
            const fCnhs = $("#fCnhs");
            const descCount = $("#descCount");
            const fUrgente = $("#fUrgente");
            const fConfidencial = $("#fConfidencial");

            const fCidade = $("#fCidade");
            const fEstado = $("#fEstado");
            const fTipoEndereco = $("#fTipoEndereco");
            const fCep = $("#fCep");
            const fRua = $("#fRua");
            const fNumero = $("#fNumero");
            const fEndComp = $("#fEndComp");
            const fBairro = $("#fBairro");

            const errUnidade = $("#errUnidade");
            const errRecrutador = $("#errRecrutador");
            const errCargo = $("#errCargo");
            const errDesc = $("#errDesc");
            const errCidade = $("#errCidade");
            const errEstado = $("#errEstado");

            let editingId = null;
            let editingRaw = null;
            let lastFocusEl = null;

            function resetModalScroll() {
                try {
                    if (modal) modal.scrollTop = 0;
                    if (modalBody) modalBody.scrollTop = 0;
                } catch {}
            }

            function getFocusable(container) {
                return Array.from(container.querySelectorAll(
                    'a[href],button:not([disabled]),textarea,input,select,[tabindex]:not([tabindex="-1"])'
                )).filter(el => el.offsetParent !== null);
            }

            function trapFocusOn(container) {
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

            function releaseFocusTrap(container) {
                if (container?._trapKey) document.removeEventListener("keydown", container._trapKey, true);
                container._trapKey = null;
            }

            function openModal() {
                if (!modal) return;
                lastFocusEl = document.activeElement;
                modal.classList.add("open");
                modal.setAttribute("aria-hidden", "false");
                document.body.classList.add("modal-open");
                resetModalScroll();
                setTimeout(resetModalScroll, 0);
                trapFocusOn(modal);
            }

            function closeModal() {
                if (!modal) return;
                modal.classList.remove("open");
                modal.setAttribute("aria-hidden", "true");
                document.body.classList.remove("modal-open");
                releaseFocusTrap(modal);

                if (lastFocusEl && typeof lastFocusEl.focus === "function") {
                    setTimeout(() => lastFocusEl.focus(), 0);
                }
            }

            function setVal(el, v) {
                if (el) el.value = (v === undefined || v === null) ? "" : String(v);
            }

            function setSel(el, v, fallback) {
                if (!el) return;
                const val = (v === undefined || v === null) ? "" : String(v);
                const has = Array.from(el.options).some(o => o.value === val);
                el.value = has ? val : (fallback ?? el.value ?? "");
            }

            function setCheck(el, v) {
                if (el) el.checked = !!v;
            }

            function clearErrs() {
                [errUnidade, errRecrutador, errCargo, errDesc, errCidade, errEstado].forEach(el => el && (el.textContent = ""));
                [fUnidadeId, fRecrutadorId, fCargo, fDesc, fCidade, fEstado].forEach(el => el?.classList.remove("is-invalid"));
            }

            function setErr(field, errEl, msg) {
                if (errEl) errEl.textContent = msg || "";
                if (field) field.classList.toggle("is-invalid", !!msg);
            }

            function parseMoneyInput(txt) {
                const s = String(txt || "").trim();
                if (!s) return null;
                const cleaned = s.replace(/\./g, "").replace(",", ".").replace(/[^\d.]/g, "");
                const n = Number(cleaned);
                if (!Number.isFinite(n)) return null;
                return n;
            }

            function textareaLines(v) {
                return String(v || "")
                    .split(/\r?\n/)
                    .map(s => s.trim())
                    .filter(Boolean);
            }

            function arrayFromAny(v) {
                if (Array.isArray(v)) return v.map(x => String(x || "").trim()).filter(Boolean);
                if (typeof v === "string") return v.split(/[;\n,]+/).map(x => x.trim()).filter(Boolean);
                return [];
            }

            function stringifyIdiomas(list) {
                if (!Array.isArray(list)) return "";
                return list.map(item => {
                    const idioma = String(item?.idioma || item?.nome || "").trim();
                    const nivel = String(item?.nivelIdioma || item?.nivel || "").trim();
                    const obrig = !!(item?.obrigatorio || item?.required);
                    if (!idioma) return "";
                    return `${idioma}${nivel ? ':' + nivel : ''}${obrig ? '*' : ''}`;
                }).filter(Boolean).join(', ');
            }

            function parseIdiomasInput(v) {
                return String(v || "")
                    .split(",")
                    .map(s => s.trim())
                    .filter(Boolean)
                    .map(item => {
                        const obrigatorio = item.endsWith("*");
                        const clean = obrigatorio ? item.slice(0, -1).trim() : item;
                        const [idiomaRaw, nivelRaw] = clean.split(":");
                        const idioma = String(idiomaRaw || "").trim();
                        const nivel = String(nivelRaw || "INTERMEDIARIO").trim().toUpperCase();
                        return idioma ? { idioma, nivelIdioma: nivel, obrigatorio } : null;
                    })
                    .filter(Boolean);
            }

            function parseCnhsInput(v) {
                return String(v || "")
                    .split(",")
                    .map(s => s.trim().toUpperCase())
                    .filter(Boolean)
                    .map(tipo => ({ tipoCnh: tipo }));
            }

            function openModalNew() {
                editingId = null;
                editingRaw = null;
                clearErrs();
                if (modalTitle) modalTitle.textContent = "Nova vaga";
                if (btnDeleteVaga) btnDeleteVaga.style.display = "none";

                const ids = getDefaultIdsFromStorage();
                setVal(fUnidadeId, ids.unidadeId || 1);
                setVal(fRecrutadorId, ids.recrutadorId || 1);

                setVal(fCargo, "");
                setVal(fComplemento, "");
                setSel(fNivel, "PLENO", "PLENO");
                setSel(fTipoContrato, "CLT", "CLT");
                setSel(fModalidadeVaga, "PRESENCIAL", "PRESENCIAL");
                setSel(fCategoriaVaga, "ADMINISTRATIVO", "ADMINISTRATIVO");
                setSel(fSalarioTipo, "FIXO", "FIXO");
                setVal(fSalario, "");
                setSel(fStatusVaga, "ABERTA", "ABERTA");

                setVal(fDesc, "");
                setVal(fJornada, "");
                setVal(fResponsabilidades, "");
                setVal(fReqObrigatorios, "");
                setVal(fReqDesejaveis, "");
                setVal(fBeneficios, "");
                setVal(fEscolaridade, "");
                setVal(fExperiencia, "");
                setVal(fReqObs, "");
                setVal(fIdiomas, "");
                setVal(fCnhs, "");
                if (descCount) descCount.textContent = "0 caracteres";
                setCheck(fUrgente, false);
                setCheck(fConfidencial, false);

                setVal(fCidade, "");
                setVal(fEstado, "");
                setSel(fTipoEndereco, "OUTRO", "OUTRO");
                setVal(fCep, "");
                setVal(fRua, "");
                setVal(fNumero, "");
                setVal(fEndComp, "");
                setVal(fBairro, "");

                openModal();
                setTimeout(() => fCargo?.focus(), 80);
            }

            function openModalEdit(v) {
                editingId = v.id;
                editingRaw = v._raw || v;
                clearErrs();
                if (modalTitle) modalTitle.textContent = `Editar vaga #${v.id}`;
                if (btnDeleteVaga) btnDeleteVaga.style.display = "inline-flex";

                const raw = v._raw || v;
                const loc = raw.localizacao || raw.endereco || raw.local || {};

                setVal(fUnidadeId, raw?.unidadeEmpresa?.idUnidadeEmpresa || raw?.idUnidadeEmpresa || 1);
                setVal(fRecrutadorId, raw?.recrutador?.idRecrutador || raw?.idRecrutador || raw?.idUsuario || 1);

                setVal(fCargo, raw.cargo || v.titulo || "");
                setVal(fComplemento, raw.complementoCargo ?? raw.complemento ?? v.complemento ?? "");
                setSel(fNivel, raw.nivelHierarquico || v.nivel || "PLENO", "PLENO");
                setSel(fTipoContrato, raw.tipoContrato || v.tipoContrato || "CLT", "CLT");
                setSel(fModalidadeVaga, raw.modalidadeVaga || raw.modalidadeVagaDTO || "PRESENCIAL", "PRESENCIAL");
                setSel(fCategoriaVaga, raw.categoriaVaga || raw.categoriaVagaDTO || "ADMINISTRATIVO", "ADMINISTRATIVO");
                setSel(fSalarioTipo, raw.salarioTipo || raw.salarioTipoDTO || ((raw.salarioValor ?? raw.salario ?? v.salario) ? "FIXO" : "COMBINAR"), "FIXO");

                const sal = (raw.salarioValor ?? raw.salario ?? v.salario);
                setVal(fSalario, (sal === null || sal === undefined) ? "" : String(sal).replace(".", ","));

                setSel(fStatusVaga, raw.statusVaga || v.status || "ABERTA", "ABERTA");
                setVal(fDesc, raw.descricao || v.descricao || "");
                setVal(fJornada, raw.jornada || "");
                setVal(fResponsabilidades, arrayFromAny(raw.responsabilidades).join("\n"));
                setVal(fReqObrigatorios, arrayFromAny(raw.requisitosObrigatorios).join("\n"));
                setVal(fReqDesejaveis, arrayFromAny(raw.requisitosDesejaveis).join("\n"));
                setVal(fBeneficios, arrayFromAny(raw.beneficios).join("\n"));
                const formacaoRaw = Array.isArray(raw.formacao) ? (raw.formacao[0] || {}) : (raw.formacao || {});
                const requisitosRaw = Array.isArray(raw.requisitos) ? (raw.requisitos[0] || {}) : (raw.requisitos || {});
                setVal(fEscolaridade, formacaoRaw.escolaridade || "");
                setVal(fExperiencia, formacaoRaw.experienciaDescricao || "");
                setVal(fReqObs, requisitosRaw.observacao || requisitosRaw.observacoes || raw.observacoes || "");
                setVal(fIdiomas, stringifyIdiomas(raw.idiomas));
                setVal(fCnhs, Array.isArray(raw.cnhs) ? raw.cnhs.map(x => x?.tipoCnh || x?.categoriaCnh || "").filter(Boolean).join(", ") : "");
                if (descCount) descCount.textContent = `${String(fDesc?.value || "").length} caracteres`;

                setCheck(fUrgente, raw.contratacaoUrgente ?? v.urgente ?? false);
                setCheck(fConfidencial, raw.empresaConfidencial ?? v.confidencial ?? false);

                setVal(fCidade, loc.cidade || raw.cidade || "");
                setVal(fEstado, (loc.estado || loc.uf || raw.estado || "").toUpperCase());
                setSel(fTipoEndereco, loc.tipoEndereco || raw.tipoEndereco || v.modelo || "OUTRO", "OUTRO");
                setVal(fCep, loc.cep || "");
                setVal(fRua, loc.rua || loc.logradouro || "");
                setVal(fNumero, loc.numero || "");
                setVal(fEndComp, loc.complemento || "");
                setVal(fBairro, loc.bairro || "");

                openModal();
                resetModalScroll();
                setTimeout(() => fCargo?.focus(), 80);
            }

            function inferModalidadeFromEndereco(v) {
                const val = String(v || "").toUpperCase();
                if (val === "REMOTO") return "REMOTO";
                if (val === "HIBRIDO") return "HIBRIDO";
                return "PRESENCIAL";
            }

            function mapTipoContrato(v) {
                const val = String(v || "CLT").toUpperCase();
                if (["CLT", "PJ", "ESTAGIO", "TRAINEE"].includes(val)) return val;
                if (val === "TEMPORARIO") return "CLT";
                return "CLT";
            }

            function getCompanySnapshot() {
                const { empresaMe } = getDefaultIdsFromStorage();
                return {
                    empresaNome:
                        empresaMe?.razaoSocial ||
                        empresaMe?.nomeFantasia ||
                        empresaMe?.nomeExibicao ||
                        empresaMe?.nome ||
                        "Empresa confidencial",
                    empresaDescricao:
                        empresaMe?.descricao ||
                        empresaMe?.sobre ||
                        empresaMe?.bio ||
                        "",
                    empresaSegmento:
                        empresaMe?.segmento ||
                        empresaMe?.areaAtuacao ||
                        "",
                    empresaTamanho:
                        empresaMe?.porte ||
                        empresaMe?.tamanho ||
                        "",
                    empresaSite:
                        empresaMe?.site ||
                        empresaMe?.website ||
                        ""
                };
            }

            function buildApiPayloadFromForm() {
                const salario = parseMoneyInput(fSalario?.value);
                const cidade = (fCidade?.value || "").trim();
                const estado = (fEstado?.value || "").trim().toUpperCase();
                const company = getCompanySnapshot();
                const salarioTipo = (fSalarioTipo?.value || (salario ? "FIXO" : "COMBINAR") || "FIXO");

                return {
                    cargo: (fCargo?.value || "").trim(),
                    complemento: (fComplemento?.value || "").trim(),

                    empresaNome: company.empresaNome,
                    empresaDescricao: company.empresaDescricao,
                    empresaSegmento: company.empresaSegmento,
                    empresaTamanho: company.empresaTamanho,
                    empresaSite: company.empresaSite,
                    empresaConfidencial: !!fConfidencial?.checked,

                    modalidadeVaga: (fModalidadeVaga?.value || inferModalidadeFromEndereco(fTipoEndereco?.value) || "PRESENCIAL"),
                    tipoContrato: mapTipoContrato(fTipoContrato?.value),
                    categoriaVaga: (fCategoriaVaga?.value || "ADMINISTRATIVO"),
                    salarioTipo,
                    salarioValor: salarioTipo === "COMBINAR" ? null : (salario === null ? 0 : salario),

                    descricao: (fDesc?.value || "").trim(),
                    jornada: (fJornada?.value || "").trim(),

                    responsabilidades: textareaLines(fResponsabilidades?.value),
                    requisitosObrigatorios: textareaLines(fReqObrigatorios?.value),
                    requisitosDesejaveis: textareaLines(fReqDesejaveis?.value),
                    beneficios: textareaLines(fBeneficios?.value),

                    observacoes: (fReqObs?.value || "").trim(),
                    contratacaoUrgente: !!fUrgente?.checked,
                    dataPublicacao: (editingRaw?.dataPublicacao || editingRaw?._raw?.dataPublicacao || new Date().toISOString().slice(0, 10)),
                    statusVaga: (fStatusVaga?.value || "ABERTA"),

                    formacao: (fEscolaridade?.value || fExperiencia?.value) ? {
                        escolaridade: (fEscolaridade?.value || "").trim(),
                        experienciaDescricao: (fExperiencia?.value || "").trim()
                    } : null,
                    requisitos: (fReqObs?.value || "").trim() ? {
                        habilitacao: false,
                        veiculoProprio: false,
                        viajar: false,
                        mudarResidencia: false,
                        observacao: (fReqObs?.value || "").trim()
                    } : null,
                    idiomas: parseIdiomasInput(fIdiomas?.value),
                    cnhs: parseCnhsInput(fCnhs?.value),
                    localizacao: {
                        rua: (fRua?.value || "").trim(),
                        numero: (fNumero?.value || "").trim(),
                        complemento: (fEndComp?.value || "").trim(),
                        bairro: (fBairro?.value || "").trim(),
                        cidade,
                        estado,
                        cep: (fCep?.value || "").trim()
                    }
                };
            }

            function validatePayload(p) {
                clearErrs();
                let ok = true;

                if (!p?.cargo) {
                    setErr(fCargo, errCargo, "Informe o cargo.");
                    ok = false;
                }
                if (!p?.modalidadeVaga || !p?.categoriaVaga || !p?.tipoContrato || !p?.salarioTipo) {
                    toast("Preencha modalidade, categoria, contrato e tipo de salário.");
                    ok = false;
                }
                if (!p?.descricao || p.descricao.length < 10) {
                    setErr(fDesc, errDesc, "Descreva melhor a vaga (mín. 10 caracteres).");
                    ok = false;
                }
                if (!p?.localizacao?.cidade) {
                    setErr(fCidade, errCidade, "Informe a cidade.");
                    ok = false;
                }
                if (!p?.localizacao?.estado || String(p.localizacao.estado).length !== 2) {
                    setErr(fEstado, errEstado, "Informe o UF (2 letras).");
                    ok = false;
                }

                if (!ok) {
                    toast("Revise os campos destacados.");
                    const first = [fCargo, fDesc, fCidade, fEstado].find(el => el?.classList.contains("is-invalid"));
                    first?.focus?.();
                }
                return ok;
            }

            /* =========================
               Events: modal
            ========================= */
            btnCloseModal?.addEventListener("click", closeModal);
            btnCancelarModal?.addEventListener("click", closeModal);
            modal?.addEventListener("mousedown", (e) => {
                if (e.target === modal) closeModal();
            });
            document.addEventListener("keydown", (e) => {
                if (e.key === "Escape" && modal?.classList.contains("open")) closeModal();
            });

            fEstado?.addEventListener("input", () => {
                fEstado.value = String(fEstado.value || "").toUpperCase().replace(/[^A-Z]/g, "").slice(0, 2);
            });

            fCep?.addEventListener("input", () => {
                const digits = String(fCep.value || "").replace(/\D/g, "").slice(0, 8);
                fCep.value = digits.length > 5 ? `${digits.slice(0, 5)}-${digits.slice(5)}` : digits;
            });

            fDesc?.addEventListener("input", () => {
                if (descCount) descCount.textContent = `${String(fDesc.value || "").length} caracteres`;
            });

            /* =========================
               Sidebar actions
            ========================= */
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

            $("#sbVerVagas")?.addEventListener("click", () => {
                $("#secVagas")?.scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });
                closeSidebar();
            });

            $("#sbCriarVaga")?.addEventListener("click", () => {
                openModalNew();
                closeSidebar();
            });

            $("#sbVerCandidatos")?.addEventListener("click", async () => {
                await goToCandidates();
            });

            $("#sbModoEditar")?.addEventListener("click", () => {
                state.editMode = !state.editMode;
                $("#sbModoEditar")?.setAttribute("aria-pressed", String(state.editMode));
                setEditModeMini(state.editMode);
                toast(state.editMode ? "Modo edição ativado" : "Modo edição desativado");
                renderVagas();
                closeSidebar();
            });

            /* =========================
               Form submit / delete
            ========================= */
            vagaForm?.addEventListener("submit", async (e) => {
                e.preventDefault();
                if (!ensureAuthOrRedirect()) return;

                const payload = buildApiPayloadFromForm();
                if (!validatePayload(payload)) return;

                try {
                    btnSalvarVaga.disabled = true;
                    btnSalvarVaga.textContent = "Salvando...";

                    if (editingId) {
                        await Api.updateVaga(editingId, payload);
                        toast("Vaga atualizada ✅");
                    } else {
                        await Api.createVaga(payload);
                        toast("Vaga criada ✅");
                    }

                    closeModal();
                    await refreshVagas();
                    setLastUpdate(new Date());
                } catch (err) {
                    console.error(err);
                    if (String(err?.message || "").includes("Não autorizado")) {
                        toast("Sessão expirada. Faça login novamente.");
                        setTimeout(() => window.location.replace(LOGIN_URL), 900);
                        return;
                    }
                    toast(err?.message || "Erro ao salvar vaga.");
                } finally {
                    btnSalvarVaga.disabled = false;
                    btnSalvarVaga.innerHTML = `<i class="fa-solid fa-check"></i> Salvar`;
                }
            });

            btnDeleteVaga?.addEventListener("click", async () => {
                if (!editingId) return;
                const v = state.vagas.find(x => x.id === editingId);
                const title = v?.titulo ? `“${v.titulo}”` : `#${editingId}`;
                if (!confirm(`Excluir a vaga ${title}?\n\nEssa ação não pode ser desfeita.`)) return;

                try {
                    if (!ensureAuthOrRedirect()) return;
                    btnDeleteVaga.disabled = true;
                    btnDeleteVaga.textContent = "Excluindo...";
                    await Api.deleteVaga(editingId);
                    state.vagas = state.vagas.filter(x => x.id !== editingId);
                    toast("Vaga excluída.");
                    closeModal();
                    renderVagas();
                    setLastUpdate(new Date());
                } catch (err) {
                    console.error(err);
                    toast(err?.message || "Erro ao excluir vaga.");
                } finally {
                    btnDeleteVaga.disabled = false;
                    btnDeleteVaga.innerHTML = `<i class="fa-solid fa-trash"></i> Excluir`;
                }
            });

            /* =========================
               Events: lista (tabela)
            ========================= */
            $("#vagasList")?.addEventListener("click", async (e) => {
                const actBtn = e.target.closest("[data-act]");
                if (!actBtn) return;

                const tr = e.target.closest("tr[data-id]");
                const id = Number(tr?.getAttribute("data-id") || 0);
                const v = state.vagas.find(x => x.id === id);
                if (!v) return;

                const act = actBtn.getAttribute("data-act");
                if (act === "candidatos") return await goToCandidates(v.id);
                if (act === "editar") return openModalEdit(v);

                if (act === "excluir") {
                    if (!state.editMode) return toast("Ative o modo edição para excluir.");
                    const title = v?.titulo ? `“${v.titulo}”` : `#${v.id}`;
                    if (!confirm(`Excluir a vaga ${title}?\n\nEssa ação não pode ser desfeita.`)) return;
                    try {
                        if (!ensureAuthOrRedirect()) return;
                        await Api.deleteVaga(v.id);
                        state.vagas = state.vagas.filter(x => x.id !== v.id);
                        toast("Vaga excluída.");
                        renderVagas();
                        setLastUpdate(new Date());
                    } catch (err) {
                        console.error(err);
                        toast(err?.message || "Erro ao excluir vaga.");
                    }
                }
            });

            /* =========================
               Chips / Busca / Sort
            ========================= */
            $("#chipsVagas")?.addEventListener("click", (e) => {
                const btn = e.target.closest(".chip");
                if (!btn) return;
                $("#chipsVagas")?.querySelectorAll(".chip").forEach(b => b.classList.remove("active"));
                btn.classList.add("active");
                state.filtroStatus = btn.getAttribute("data-v") || "todas";
                renderVagas();
            });

            const vagaSearch = $("#vagaSearch");
            const clearSearch = $("#clearSearch");
            const vagaSort = $("#vagaSort");

            let searchT = null;
            vagaSearch?.addEventListener("input", () => {
                clearTimeout(searchT);
                searchT = setTimeout(() => {
                    state.query = String(vagaSearch.value || "");
                    renderVagas();
                }, 120);
            });

            clearSearch?.addEventListener("click", () => {
                if (vagaSearch) vagaSearch.value = "";
                state.query = "";
                vagaSearch?.focus();
                renderVagas();
            });

            vagaSort?.addEventListener("change", () => {
                state.sort = vagaSort.value || "recent";
                renderVagas();
            });

            /* =========================
               Load vagas
            ========================= */
            async function refreshVagas() {
                setDisplay("#vagasError", false);
                renderVagasSkeleton();

                const ac = new AbortController();
                try {
                    const arr = await Api.listVagas(ac.signal);
                    state.vagas = arr || [];
                    renderVagas();
                } catch (err) {
                    state.vagas = [];
                    renderVagas();
                    setDisplay("#vagasError", true);
                    setText("#vagasErrorMsg", String(err?.message || err || "Erro."));
                    if (String(err?.message || "").includes("Não autorizado")) {
                        toast("Sessão expirada. Faça login novamente.");
                        setTimeout(() => window.location.replace(LOGIN_URL), 900);
                    }
                }
            }

            $("#btnRetryVagas")?.addEventListener("click", refreshVagas);

            /* =========================
               Mobile menu (header)
            ========================= */
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

            /* =========================
               Header scroll hide/show (FIXADO)
            ========================= */
            (function headerScrollHideShow() {
                const header = document.querySelector(".jobhubH-shell");
                if (!header) return;

                let lastY = window.scrollY || 0;
                let ticking = false;
                const TOP = 8;
                const DELTA = 10;

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

            /* =========================
               Guard (bloqueia signup quando já está logado)
            ========================= */
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

            /* =========================
               Boot
            ========================= */
            (async function boot() {
                setCompanyMini();
                if (!ensureAuthOrRedirect()) return;
                setLastUpdate(new Date());
                setEditModeMini(false);
                await refreshVagas();
            })();

            window.addEventListener("storage", (e) => {
                if (e.key === "token" || e.key === "role") {
                    if (!ensureAuthOrRedirect()) return;
                    refreshVagas();
                }
            });

        })();
    </script>
</body>

</html>
