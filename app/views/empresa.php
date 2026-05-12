<!DOCTYPE html>
<html lang="en">

<?php require_once("templates/head.php") ?>

<body>
    <?php require_once("templates/header.php") ?>

    <?php require_once("includes/template_empresa.php") ?>

</body><?php require_once("templates/footer.php") ?>

<style>
    /* ================= HEADER BASE ================= */
    .empresaDemo-header {
        height: 74px;
        background: #fff;
        display: flex;
        align-items: center;
        box-shadow: 0 10px 30px rgba(15, 23, 42, .08);
        border-bottom: 1px solid rgba(15, 23, 42, .06);
        position: relative;
        z-index: 9990;
    }

    .empresaDemo-header-container {
        max-width: 1400px;
        width: 100%;
        padding: 0 24px;
        margin: auto;
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .empresaDemo-logo {
        display: flex;
        align-items: center;
    }

    .empresaDemo-logo img {
        height: 74px;
        display: block;
    }

    /* nav */
    .empresaDemo-menu-desktop {
        margin-left: auto;
        display: flex;
        gap: 12px;
        align-items: center;
    }

    /* link/botão do header */
    .empresaDemo-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        height: 44px;
        padding: 0 12px;
        border-radius: 999px;
        text-decoration: none;
        color: var(--p1, #1F75D8);
        font-weight: 800;
        border: 0;
        background: transparent;
        cursor: pointer;
        transition: transform .12s ease, background .12s ease;
    }

    .empresaDemo-link:hover {
        background: rgba(31, 117, 216, .10);
        transform: translateY(-1px);
    }

    /* ================= SUBMENU DESKTOP ================= */
    .empresaDemo-submenu-wrapper {
        position: relative;
    }

    .empresaDemo-submenu-btn {
        height: 44px;
        padding: 0 12px;
        border-radius: 999px;
        border: 1px solid rgba(15, 23, 42, .10);
        background: #fff;
        font-weight: 800;
        cursor: pointer;
        transition: background .12s ease, transform .12s ease;
    }

    .empresaDemo-submenu-btn:hover {
        background: rgba(15, 23, 42, .04);
        transform: translateY(-1px);
    }

    .empresaDemo-submenu {
        position: absolute;
        right: 0;
        top: calc(100% + 10px);
        width: 220px;
        background: #fff;
        border: 1px solid rgba(15, 23, 42, .10);
        border-radius: 14px;
        box-shadow: 0 18px 60px rgba(15, 23, 42, .14);
        padding: 8px;
        z-index: 9999;
    }

    .empresaDemo-submenu a {
        display: block;
        padding: 10px;
        border-radius: 10px;
        text-decoration: none;
        color: rgba(15, 23, 42, .90);
        font-weight: 800;
    }

    .empresaDemo-submenu a:hover {
        background: rgba(15, 23, 42, .06);
    }

    /* ================= AUTH POPOVER ================= */
    .empresaDemo-auth {
        position: relative;
    }

    .empresaDemo-auth-popover {
        position: absolute;
        right: 0;
        top: calc(100% + 12px);
        width: min(360px, 92vw);
        background: rgba(255, 255, 255, .96);
        border: 1px solid rgba(15, 23, 42, .10);
        border-radius: 16px;
        box-shadow: 0 18px 60px rgba(15, 23, 42, .14);
        padding: 14px;
        z-index: 9999;
        backdrop-filter: blur(10px);
    }

    .empresaDemo-auth-popover::before {
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

    /* tabs */
    .empresaDemo-auth-tabs {
        display: flex;
        gap: 8px;
        padding: 6px;
        border-radius: 999px;
        background: rgba(15, 23, 42, .06);
        border: 1px solid rgba(15, 23, 42, .08);
        margin-bottom: 10px;
    }

    .empresaDemo-auth-tab {
        flex: 1;
        height: 38px;
        border-radius: 999px;
        border: 0;
        background: transparent;
        font-weight: 900;
        color: rgba(15, 23, 42, .72);
        cursor: pointer;
        transition: background .14s ease, color .14s ease, box-shadow .14s ease;
        position: relative;
    }

    .empresaDemo-auth-tab:hover {
        background: rgba(255, 255, 255, .70);
    }

    /* deixa bem evidente qual lado está selecionado */
    .empresaDemo-auth-tab.is-active {
        color: rgba(15, 23, 42, .92);
        box-shadow: inset 0 0 0 1px rgba(15, 23, 42, .10);
    }

    .empresaDemo-auth[data-mode="CANDIDATO"] .empresaDemo-auth-tab.is-active {
        background: linear-gradient(90deg, rgba(31, 117, 216, .18), rgba(31, 117, 216, .06));
    }

    .empresaDemo-auth[data-mode="RECRUTADOR"] .empresaDemo-auth-tab.is-active {
        background: linear-gradient(90deg, rgba(169, 43, 157, .18), rgba(169, 43, 157, .06));
    }

    /* hint do modo atual (pra ficar MUITO claro) */
    .empresaDemo-auth-modehint {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 10px 12px;
        border-radius: 12px;
        border: 1px solid rgba(15, 23, 42, .10);
        background: rgba(15, 23, 42, .04);
        margin-bottom: 10px;
        font-size: 12px;
        font-weight: 900;
        color: rgba(15, 23, 42, .82);
    }

    .empresaDemo-auth-modehint b {
        font-weight: 950;
    }

    .empresaDemo-auth[data-mode="CANDIDATO"] .empresaDemo-auth-modehint {
        border-color: rgba(31, 117, 216, .22);
        background: rgba(31, 117, 216, .08);
    }

    .empresaDemo-auth[data-mode="RECRUTADOR"] .empresaDemo-auth-modehint {
        border-color: rgba(169, 43, 157, .22);
        background: rgba(169, 43, 157, .08);
    }

    .empresaDemo-auth-modehint .pill {
        padding: 4px 10px;
        border-radius: 999px;
        border: 1px solid rgba(15, 23, 42, .10);
        background: rgba(255, 255, 255, .70);
        font-size: 11px;
        font-weight: 950;
        color: rgba(15, 23, 42, .78);
        white-space: nowrap;
    }

    /* alert geral */
    .empresaDemo-auth-alert {
        border-radius: 12px;
        padding: 10px 12px;
        font-weight: 800;
        font-size: 12px;
        margin-bottom: 10px;
        border: 1px solid rgba(15, 23, 42, .10);
    }

    .empresaDemo-auth-alert.is-error {
        background: rgba(239, 68, 68, .10);
        border-color: rgba(239, 68, 68, .25);
        color: #b91c1c;
    }

    .empresaDemo-auth-alert.is-success {
        background: rgba(34, 197, 94, .12);
        border-color: rgba(34, 197, 94, .25);
        color: #166534;
    }

    /* campos */
    .empresaDemo-auth-field {
        display: block;
        margin-bottom: 10px;
    }

    .empresaDemo-auth-field span {
        display: block;
        font-size: 12px;
        font-weight: 900;
        opacity: .75;
        margin-bottom: 6px;
    }

    .empresaDemo-auth-field input {
        width: 100%;
        height: 46px;
        border-radius: 14px;
        border: 1px solid rgba(15, 23, 42, .12);
        background: #fff;
        padding: 0 12px;
        outline: none;
        font-weight: 700;
        color: rgba(15, 23, 42, .92);
        transition: box-shadow .12s ease, border-color .12s ease;
    }

    .empresaDemo-auth-field input:focus {
        border-color: rgba(31, 117, 216, .40);
        box-shadow: 0 0 0 4px rgba(31, 117, 216, .12);
    }

    /* estados de validação */
    .empresaDemo-auth-field input.is-invalid {
        border-color: rgba(239, 68, 68, .45);
        box-shadow: 0 0 0 4px rgba(239, 68, 68, .10);
    }

    .empresaDemo-auth-field input.is-valid {
        border-color: rgba(34, 197, 94, .35);
    }

    /* erro por campo */
    .empresaDemo-field-error {
        min-height: 16px;
        margin-top: 6px;
        font-size: 12px;
        font-weight: 800;
        color: #ef4444;
    }

    /* botão submit */
    .empresaDemo-auth-submit {
        width: 100%;
        height: 46px;
        border-radius: 999px;
        font-weight: 900;
        letter-spacing: .2px;
        box-shadow: 0 12px 26px rgba(15, 23, 42, .10);
    }

    /* links */
    .empresaDemo-auth-links {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        margin-top: 12px;
        padding-top: 10px;
        border-top: 1px solid rgba(15, 23, 42, .08);
        font-size: 12px;
    }

    .empresaDemo-auth-links a {
        color: rgba(15, 23, 42, .72);
        text-decoration: none;
        font-weight: 900;
    }

    .empresaDemo-auth-links a:hover {
        color: var(--p1, #1F75D8);
    }

    /* ================= OLHO (toggle senha) ================= */
    .empresaDemo-pass {
        position: relative;
        display: block;
    }

    .empresaDemo-pass input {
        padding-right: 56px;
    }

    .empresaDemo-pass-toggle {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;

        display: grid;
        place-items: center;

        padding: 0;
        margin: 0;

        border-radius: 12px;
        border: 1px solid rgba(15, 23, 42, .12);
        background: rgba(15, 23, 42, .05);

        cursor: pointer;
        color: rgba(15, 23, 42, .75);

        appearance: none;
        -webkit-appearance: none;
        outline: none;

        transition: background .12s ease, transform .12s ease, box-shadow .12s ease;
    }

    .empresaDemo-pass-toggle i {
        font-size: 16px;
        line-height: 1;
    }

    .empresaDemo-pass-toggle:hover {
        background: rgba(15, 23, 42, .10);
        transform: translateY(-50%) scale(1.03);
    }

    .empresaDemo-pass-toggle:active {
        transform: translateY(-50%) scale(.98);
    }

    .empresaDemo-pass-toggle:focus-visible {
        box-shadow: 0 0 0 4px rgba(31, 117, 216, .14);
        border-color: rgba(31, 117, 216, .35);
    }

    /* ================= VIEW LOGADO ================= */
    .empresaDemo-user-mini {
        display: flex;
        gap: 12px;
        align-items: center;
        padding: 10px;
        border-radius: 14px;
        background: rgba(15, 23, 42, .04);
        border: 1px solid rgba(15, 23, 42, .08);
        margin-bottom: 10px;
    }

    .empresaDemo-user-avatar {
        width: 42px;
        height: 42px;
        border-radius: 14px;
        background: linear-gradient(90deg, var(--p1, #1F75D8), var(--p3, #a92b9d));
        box-shadow: 0 10px 20px rgba(15, 23, 42, .12);
    }

    .empresaDemo-user-top {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .empresaDemo-user-role {
        font-size: 11px;
        font-weight: 900;
        padding: 4px 8px;
        border-radius: 999px;
        background: rgba(31, 117, 216, .12);
        border: 1px solid rgba(15, 23, 42, .08);
        color: rgba(15, 23, 42, .78);
        text-transform: uppercase;
    }

    .empresaDemo-user-role.is-recrutador {
        background: rgba(169, 43, 157, .12);
    }

    .empresaDemo-user-email {
        font-size: 12px;
        font-weight: 800;
        opacity: .75;
        margin-top: 2px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 220px;
    }

    .empresaDemo-user-actions {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .empresaDemo-user-item {
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

    .empresaDemo-user-item:hover {
        background: rgba(15, 23, 42, .06);
        transform: translateY(-1px);
    }

    .empresaDemo-user-item.is-danger {
        color: #ef4444;
    }

    /* ================= MOBILE ================= */
    .empresaDemo-mobile-menu-btn {
        display: none;
        margin-left: auto;
        background: none;
        border: none;
        font-size: 26px;
        cursor: pointer;
        color: var(--p1, #1F75D8);
        height: 44px;
        width: 44px;
        border-radius: 12px;
    }

    .empresaDemo-mobile-menu-btn:hover {
        background: rgba(31, 117, 216, .10);
    }

    @media (max-width: 900px) {
        .empresaDemo-menu-desktop {
            display: none !important;
        }

        .empresaDemo-mobile-menu-btn {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    }

    .mobile-menu-overlay {
        position: fixed;
        inset: 0;
        background: rgba(2, 6, 23, .55);
        opacity: 0;
        transition: opacity .25s ease;
        z-index: 9998;
    }

    .mobile-menu-overlay.show {
        opacity: 1;
    }

    .mobile-menu {
        position: fixed;
        top: 0;
        left: -100%;
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
    }

    .mobile-menu.show {
        left: 0;
    }

    .close-mobile {
        align-self: flex-end;
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: rgba(15, 23, 42, .06);
        border: 1px solid rgba(15, 23, 42, .08);
        font-size: 22px;
        cursor: pointer;
    }

    .mobile-menu a {
        font-size: 16px;
        font-weight: 900;
        color: rgba(15, 23, 42, .88);
        text-decoration: none;
        padding: 12px 6px;
        border-bottom: 1px solid rgba(15, 23, 42, .06);
    }

    .btn-entrar {
        margin-top: 6px;
        padding: 12px;
        text-align: center;
        border: 2px solid var(--p3, #a92b9d);
        border-radius: 999px;
        color: var(--p3, #a92b9d);
        background: transparent;
        font-weight: 900;
        cursor: pointer;
    }

    .btn-candidato {
        padding: 12px;
        text-align: center;
        background: linear-gradient(90deg, var(--p1, #1F75D8), var(--p3, #a92b9d));
        color: #fff;
        border-radius: 999px;
        font-weight: 900;
        text-decoration: none;
    }
</style>

</html>