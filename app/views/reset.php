<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>JobHub Redefinir Senha</title>

    <link rel="stylesheet" href="<?=  URL_BASE?>assets/css/reset.css" />
    <link rel="stylesheet" href="<?=  URL_BASE?>assets/css/redefinir.css" />

    <!-- Font Awesome (ícones) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="rp-body candidato">
    <div class="toast" id="toast" role="status" aria-live="polite"></div>

    <main class="rp-wrap">
        <section class="rp-shell" aria-label="Redefinir senha">

            <header class="rp-topbar">
                <a class="rp-brand" href="<?= URL_BASE ?>inicio" aria-label="Voltar para o login">
                    <img src="<?=  URL_BASE ?>assets/img/logo_preta.svg" alt="JobHub">
                </a>


                <a class="rp-back" href="<?=  URL_BASE?>inicio">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Voltar</span>
                </a>
            </header>

            <div class="rp-grid">
                <!-- FORM -->
                <section class="rp-card">
                    <div class="rp-head">
                        <h1>Redefinir senha</h1>
                        <p class="rp-sub" id="rpSubtitle">
                            Crie uma nova senha para acessar sua conta.
                        </p>
                    </div>

                    <div class="rp-token-warning" id="tokenWarning" style="display:none;">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <div>
                            <strong>Link inválido ou expirado</strong>
                            <small>Peça um novo link na tela “Esqueceu sua senha”.</small>
                        </div>
                    </div>

                    <form id="formReset" class="rp-form">
                        <div class="rp-field">
                            <label for="novaSenha">Nova senha</label>
                            <div class="rp-input-wrap">
                                <span class="rp-icon"><i class="fa-solid fa-lock"></i></span>
                                <input type="password" id="novaSenha" placeholder="Digite a nova senha" required />
                                <button class="rp-eye" type="button" id="toggleNova" aria-label="Mostrar senha">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>

                            <div class="rp-strength">
                                <div class="rp-strength-row">
                                    <span>Força</span>
                                    <strong id="strengthLabel">—</strong>
                                </div>
                                <div class="rp-strength-bar">
                                    <i id="strengthFill"></i>
                                </div>
                            </div>
                        </div>

                        <div class="rp-field">
                            <label for="confirmarSenha">Confirmar senha</label>
                            <div class="rp-input-wrap">
                                <span class="rp-icon"><i class="fa-solid fa-shield-halved"></i></span>
                                <input type="password" id="confirmarSenha" placeholder="Repita a nova senha" required />
                                <button class="rp-eye" type="button" id="toggleConf" aria-label="Mostrar senha">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>

                            <p class="rp-hint" id="matchHint">Use uma senha forte com letras, números e símbolo.</p>
                        </div>

                        <button class="rp-btn" type="submit" id="btnSalvar">
                            Salvar nova senha
                            <span class="rp-arrow">→</span>
                        </button>

                        <p class="rp-legal">
                            Dica: evite reutilizar senhas antigas. Sua segurança vem primeiro.
                        </p>
                    </form>
                </section>

                <!-- SIDE -->
                <aside class="rp-side">
                    <div class="rp-side-badge">
                        <span class="pulse"></span>
                        Segurança JobHub
                    </div>

                    <h3 id="sideTitle">Você está no Painel do Candidato</h3>
                    <p id="sideText">
                        Após redefinir, você poderá acessar seu painel, acompanhar candidaturas e ver vagas
                        recomendadas.
                    </p>

                    <div class="rp-side-list">
                        <div class="rp-side-item">
                            <span class="bullet"><i class="fa-solid fa-check"></i></span>
                            <div>
                                <strong>Link único</strong>
                                <small>Usado apenas para esta redefinição.</small>
                            </div>
                        </div>

                        <div class="rp-side-item">
                            <span class="bullet"><i class="fa-solid fa-check"></i></span>
                            <div>
                                <strong>Validação forte</strong>
                                <small>Ajuda a evitar senhas fracas.</small>
                            </div>
                        </div>

                        <div class="rp-side-item">
                            <span class="bullet"><i class="fa-solid fa-check"></i></span>
                            <div>
                                <strong>Troca rápida</strong>
                                <small>Em poucos segundos você volta ao sistema.</small>
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

    <script>window.JobHub_API_BASE = window.JobHub_API_BASE || <?= api_base_json() ?>;</script>

<script src="<?= URL_BASE?>assets/js/redefinir-senha.js"></script>
</body>

</html>