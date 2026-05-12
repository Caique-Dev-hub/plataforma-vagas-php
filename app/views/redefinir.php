<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JobHub Recuperar senha</title>

    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/reset.css" />
    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/redefinir.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="rp-body candidato">
    <div class="toast" id="toast" role="status" aria-live="polite"></div>

    <main class="rp-wrap">
        <section class="rp-shell" aria-label="Recuperar senha">

            <header class="rp-topbar">
                <a class="rp-brand" href="<?= URL_BASE ?>inicio" aria-label="Voltar para o login">
                    <img src="<?= URL_BASE ?>assets/img/logo_preta.svg" alt="JobHub">
                </a>

                <a class="rp-back" href="<?= URL_BASE ?>inicio">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Voltar</span>
                </a>
            </header>

            <div class="rp-grid">
                <!-- FORM -->
                <section class="rp-card">
                    <div class="rp-head">
                        <h1>Recuperar senha</h1>
                        <p class="rp-sub" id="descricao">
                            Informe o e-mail da sua conta para receber o link de redefinição.
                        </p>
                    </div>

                    <!-- Stepper simples -->
                    <div class="rp-steps" style="display:flex; gap:10px; align-items:center; margin-bottom:18px;">
                        <span id="dotEmail"
                            style="width:12px; height:12px; border-radius:999px; display:inline-block; background:#111827;"></span>
                        <span style="font-size:13px; opacity:.8;">Solicitação</span>

                        <span style="opacity:.35;">→</span>

                        <span id="dotSenha"
                            style="width:12px; height:12px; border-radius:999px; display:inline-block; background:#d1d5db;"></span>
                        <span style="font-size:13px; opacity:.8;">Nova senha</span>
                    </div>

                    <form id="formEmail" class="rp-form">
                        <div class="rp-field">
                            <label for="email">E-mail</label>
                            <div class="rp-input-wrap">
                                <span class="rp-icon"><i class="fa-solid fa-envelope"></i></span>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    placeholder="Digite seu e-mail"
                                    autocomplete="email"
                                    required />
                            </div>
                            <p class="rp-hint">
                                Enviaremos um link seguro para redefinir sua senha.
                            </p>
                        </div>

                        <button class="rp-btn" type="submit">
                            Enviar link de redefinição
                            <span class="rp-arrow">→</span>
                        </button>

                        <p class="rp-legal">
                            Se o e-mail estiver cadastrado, você receberá as instruções em instantes.
                        </p>
                    </form>
                </section>

                <!-- SIDE -->
                <aside class="rp-side">
                    <div class="rp-side-badge">
                        <span class="pulse"></span>
                        Segurança JobHub
                    </div>

                    <h3>Recupere o acesso com segurança</h3>
                    <p>
                        Informe seu e-mail e enviaremos um link temporário para você cadastrar uma nova senha com segurança.
                    </p>

                    <div class="rp-side-list">
                        <div class="rp-side-item">
                            <span class="bullet"><i class="fa-solid fa-check"></i></span>
                            <div>
                                <strong>Link temporário</strong>
                                <small>O acesso é feito com token único enviado por e-mail.</small>
                            </div>
                        </div>

                        <div class="rp-side-item">
                            <span class="bullet"><i class="fa-solid fa-check"></i></span>
                            <div>
                                <strong>Fluxo em 2 etapas</strong>
                                <small>Primeiro solicita, depois redefine a senha no link recebido.</small>
                            </div>
                        </div>

                        <div class="rp-side-item">
                            <span class="bullet"><i class="fa-solid fa-check"></i></span>
                            <div>
                                <strong>Proteção da conta</strong>
                                <small>Ajuda a impedir trocas indevidas de senha.</small>
                            </div>
                        </div>
                    </div>

                    <div class="rp-foot">
                        <span class="mini">Candidato</span>
                        <span class="mini">Recrutador</span>
                        <span class="mini">Login</span>
                        <span class="mini">Segurança</span>
                    </div>
                </aside>
            </div>
        </section>
    </main>

    <!-- Loader -->
    <div
        id="loader"
        aria-hidden="true"
        style="display:none; position:fixed; inset:0; background:rgba(15,23,42,.45); z-index:9999; place-items:center;">
        <div
            style="background:#fff; padding:18px 22px; border-radius:16px; display:flex; align-items:center; gap:12px; box-shadow:0 10px 30px rgba(0,0,0,.15);">
            <i class="fa-solid fa-circle-notch fa-spin" style="font-size:20px;"></i>
            <div>
                <strong style="display:block;">Enviando link</strong>
                <small style="opacity:.75;">Aguarde um instante...</small>
            </div>
        </div>
    </div>

    <script>window.JobHub_API_BASE = window.JobHub_API_BASE || <?= api_base_json() ?>;</script>

<script src="<?= URL_BASE ?>assets/js/recuperar.js"></script>
</body>

</html>