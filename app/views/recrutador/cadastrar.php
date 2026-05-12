<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>JobHub – Cadastro da Empresa</title>

    <!-- Font Awesome (ícones) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" href="./img/favicon.ico">

    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/reset.css" />
    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/cadastrar-empresa.css" />

</head>

<body data-step="1">

    <div class="toast" id="toast" role="status" aria-live="polite"></div>

    <main class="wrap">
        <section class="shell">

            <header class="top">
                <!-- VOLTAR -->
                <a href="<?= URL_BASE ?>inicio?mode=empresa" class="backlink" id="btnVoltar">
                    <span class="arr">←</span> Voltar
                </a>

                <div class="top-left">
                    <div class="logo-mark" aria-hidden="true"></div>
                    <div class="top-title">
                        <strong>JobHub</strong>
                        <small>Cadastro da empresa</small>
                    </div>
                </div>

                <div class="top-right">
                    <span class="pill"><i class="fa-solid fa-building"></i> Empresa</span>
                </div>
            </header>

            <section class="card">
                <div class="card-head">
                    <div>
                        <h1>
                            <span class="stage-ico" aria-hidden="true"><i class="fa-solid fa-building-user"></i></span>
                            Cadastro empresa
                        </h1>
                        <p class="muted">Preencha os dados abaixo para criar seu acesso de recrutador.</p>
                    </div>
                </div>

                <form id="empresaForm" class="form" novalidate>
                    <div class="grid">

                        <!-- MATRIZ / FILIAIS -->
                        <div class="field full">
                            <label>Empresa possui matriz ou filiais?</label>

                            <div class="choice-row" role="radiogroup" aria-label="Empresa possui matriz ou filiais?">
                                <label class="chipradio" data-chip>
                                    <input type="radio" name="possuiFiliais" value="true" required>
                                    <span>Sim</span>
                                </label>

                                <label class="chipradio" data-chip>
                                    <input type="radio" name="possuiFiliais" value="false" required checked>
                                    <span>Não</span>
                                </label>
                            </div>

                            <p class="help">
                                Se for <strong>Sim</strong>, aparecerá o campo de funcionários da filial. Se for
                                <strong>Não</strong>,
                                ele não aparece.
                            </p>
                        </div>

                        <!-- NOME EMPRESA -->
                        <div class="field full">
                            <label>Nome da Empresa</label>
                            <input type="text" name="nomeEmpresa" placeholder="Ex.: EmpresaDemo Tecnologia LTDA"
                                autocomplete="organization" required />
                        </div>

                        <!-- NÚMERO FUNCIONÁRIOS (MATRIZ) -->
                        <div class="field">
                            <label>Número de Funcionários</label>
                            <input type="number" name="funcionariosMatriz" placeholder="Ex.: 25" min="1"
                                inputmode="numeric" required />
                        </div>

                        <!-- NÚMERO FUNCIONÁRIOS (FILIAL) - CONDICIONAL -->
                        <div class="field" id="filialBox" style="display:none;">
                            <label>Filial — número de funcionários</label>
                            <input type="number" id="funcionariosFilial" name="funcionariosFilial" placeholder="Ex.: 10"
                                min="1" inputmode="numeric" />
                        </div>

                        <!-- CNPJ -->
                        <div class="field">
                            <label>CNPJ</label>
                            <input type="text" name="cnpj" placeholder="00.000.000/0000-00" inputmode="numeric"
                                autocomplete="off" required />
                        </div>

                        <!-- RAMO -->
                        <div class="field">
                            <label>Ramo</label>
                            <input type="text" name="ramo" placeholder="Ex.: Recursos Humanos"
                                autocomplete="organization-title" required />
                        </div>

                        <!-- NOME RECRUTADOR -->
                        <div class="field">
                            <label>Nome Recrutador</label>
                            <input type="text" name="nomeRecrutador" placeholder="Seu nome" autocomplete="name"
                                required />
                        </div>

                        <!-- EMAIL CORPORATIVO -->
                        <div class="field">
                            <label>E-mail corporativo</label>
                            <input type="email" name="emailCorporativo" placeholder="rh@empresa.com"
                                autocomplete="email" required />
                        </div>

                        <!-- TELEFONE -->
                        <div class="field">
                            <label>Telefone</label>
                            <input type="text" name="telefone" placeholder="(00) 00000-0000" inputmode="numeric"
                                autocomplete="tel" required />
                        </div>

                        <!-- SENHA -->
                        <div class="field">
                            <label>Senha</label>

                            <div class="input-icon">
                                <input type="password" id="senha" name="senha" placeholder="Crie uma senha segura"
                                    autocomplete="new-password" required />

                                <button type="button" class="toggle-pass" data-target="senha" aria-label="Mostrar senha"
                                    title="Mostrar senha">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- REPETIR SENHA -->
                        <div class="field">
                            <label>Repetir senha</label>

                            <div class="input-icon">
                                <input type="password" id="confirmarSenha" name="confirmarSenha"
                                    placeholder="Repita sua senha" autocomplete="new-password" required />

                                <button type="button" class="toggle-pass" data-target="confirmarSenha"
                                    aria-label="Mostrar senha" title="Mostrar senha">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                        </div>


                        <!-- FORÇA SENHA -->
                        <div class="field full">
                            <div class="strength">
                                <div class="strength-row">
                                    <span class="muted">Força</span>
                                    <strong id="strengthLabel">—</strong>
                                </div>
                                <div class="strength-bar">
                                    <i id="senhaNivel"></i>
                                </div>
                                <p class="help" style="margin-top:10px;">
                                    Dica: use pelo menos 8 caracteres, com números e letras maiúsculas.
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="actions duo">
                        <button type="submit" class="btn primary">
                            <i class="fa-solid fa-user-plus"></i>
                            Cadastrar
                        </button>

                        <a href="<?= URL_BASE ?>inicio?mode=empresa" class="btn ghost">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            Já tenho login
                        </a>
                    </div>

                </form>
            </section>

        </section>
    </main>

    <div class="loader" id="loader" aria-hidden="true">
        <div class="loader-card">
            <i class="fa-solid fa-circle-notch fa-spin"></i>
            <div>
                <strong>Processando cadastro</strong>
                <small>Isso pode levar alguns segundos…</small>
            </div>
        </div>
    </div>
    <script>
        window.URL_BASE = <?= json_encode(URL_BASE) ?>;
        window.JobHub_ROUTES = window.JobHub_ROUTES || {
            HOME: <?= json_encode(URL_BASE) ?>,
            LOGIN: <?= json_encode(URL_BASE . 'inicio') ?>
        };
    </script>
    <script>
        window.JobHub_API_BASE = window.JobHub_API_BASE || <?= api_base_json() ?>;
    </script>

    <script src="<?= URL_BASE ?>assets/js/cadastrar-api.js"></script>

</body>

</html>