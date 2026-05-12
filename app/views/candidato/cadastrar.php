<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>JobHub Cadastro do Candidato</title>
    <!-- Font Awesome (ícones) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" href="./img/favicon.ico">

    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/reset.css" />
    <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/cadastrar.css" />

</head>

<body data-step="1">

    <div class="toast" id="toast" role="status" aria-live="polite"></div>

    <main class="wrap">
        <section class="shell">
            <header class="top">
                <!-- VOLTAR PARA LOGIN -->
                <a href="<?= URL_BASE ?>inicio" class="backlink" id="btnVoltar">
                    <span class="arr">←</span> Voltar
                </a>

                <div class="top-left">
                    <div class="logo-mark" aria-hidden="true"></div>
                    <div class="top-title">
                        <strong>JobHub</strong>
                        <small>Cadastro do candidato</small>
                    </div>
                </div>

                <div class="top-right">
                    <span class="pill" id="progressEtapa">1 de 5</span>
                </div>

                <div class="progress">
                    <div class="progress-bar">
                        <i id="progressFill"></i>
                    </div>
                    <div class="progress-meta">
                        <span id="progressTitle">Dados de contato</span>
                        <span id="progressSubtitle">Vamos começar do jeito certo </span>
                    </div>
                </div>
            </header>

            <section class="card">
                <div class="card-head">
                    <div>
                        <h1 id="stageMessage">Bem-vindo </h1>
                        <p class="muted" id="stageHint">Vamos começar pelos seus dados de contato.</p>
                    </div>

                    <!-- STEP INDICATOR (SEM CLICK) -->
                    <div class="stepper" aria-label="Progresso das etapas">
                        <span class="dot active" aria-hidden="true"></span>
                        <span class="dot" aria-hidden="true"></span>
                        <span class="dot" aria-hidden="true"></span>
                        <span class="dot" aria-hidden="true"></span>
                        <span class="dot" aria-hidden="true"></span>
                    </div>
                </div>

                <form id="cadastroForm" class="form">
                    <!-- ETAPA 1 -->
                    <div class="step active" id="step1">
                        <div class="grid">
                            <div class="field">
                                <label>Nome completo</label>
                                <input type="text" name="nomeCompleto" placeholder="Seu nome completo" required />
                            </div>

                            <div class="field">
                                <label>E-mail</label>
                                <input type="email" name="email" placeholder="email@exemplo.com" required />
                            </div>

                            <div class="field">
                                <label>Telefone</label>
                                <input type="text" name="telefone" placeholder="(00) 00000-0000"
                                    oninput="mascaraTelefone(this)" required />
                            </div>

                            <div class="field">
                                <label>CPF</label>
                                <input type="text" name="cpf" inputmode="numeric" autocomplete="off"
                                    placeholder="000.000.000-00" oninput="maskCPF(this)" required />
                            </div>
                        </div>

                        <div class="actions single">
                            <button type="button" class="btn primary" onclick="nextStep()">Continuar</button>
                        </div>
                    </div>

                    <!-- ETAPA 2 -->
                    <div class="step" id="step2">
                        <div class="grid">
                            <div class="field">
                                <label>Gênero</label>
                                <select id="generoSelect" name="genero" required>
                                    <option value="" disabled selected>Selecione o gênero</option>
                                    <option value="MASCULINO">Masculino</option>
                                    <option value="FEMININO">Feminino</option>
                                    <option value="OUTRO">Outro..</option>
                                </select>
                            </div>

                            <div class="field">
                                <label>Data de nascimento</label>
                                <input type="date" id="dataNascimento" name="dataNascimento" required />
                            </div>

                            <div class="field">
                                <label>Cidade</label>
                                <input type="text" name="cidade" placeholder="Ex.: São Paulo" required />
                            </div>

                            <div class="field">
                                <label>Estado</label>
                                <select id="estadoSelect" name="estado" required>
                                    <option value="" disabled selected>Selecione o estado</option>
                                    <option>AC</option>
                                    <option>AL</option>
                                    <option>AP</option>
                                    <option>AM</option>
                                    <option>BA</option>
                                    <option>CE</option>
                                    <option>DF</option>
                                    <option>ES</option>
                                    <option>GO</option>
                                    <option>MA</option>
                                    <option>MT</option>
                                    <option>MS</option>
                                    <option>MG</option>
                                    <option>PA</option>
                                    <option>PB</option>
                                    <option>PR</option>
                                    <option>PE</option>
                                    <option>PI</option>
                                    <option>RJ</option>
                                    <option>RN</option>
                                    <option>RS</option>
                                    <option>RO</option>
                                    <option>RR</option>
                                    <option>SC</option>
                                    <option>SP</option>
                                    <option>SE</option>
                                    <option>TO</option>
                                </select>
                            </div>
                        </div>

                        <div class="actions">
                            <button type="button" class="btn ghost" onclick="prevStep()">Voltar</button>
                            <button type="button" class="btn primary" onclick="nextStep()">Continuar</button>
                        </div>
                    </div>

                    <!-- ETAPA 3 -->
                    <div class="step" id="step3">
                        <div id="formacoesList" class="stack">
                            <div class="stack-item formacao-item">
                                <div class="grid">
                                    <div class="field">
                                        <label>Área / Curso</label>
                                        <select class="cursoSelect" name="curso" onchange="toggleOutroCurso(this)" required>
                                            <option value="" disabled selected>Selecione a área</option>
                                            <option>Administração</option>
                                            <option>Contabilidade</option>
                                            <option>Direito</option>
                                            <option>Tecnologia da Informação</option>
                                            <option>Engenharia</option>
                                            <option>Recursos Humanos</option>
                                            <option>Marketing</option>
                                            <option>Saúde</option>
                                            <option>Educação</option>
                                            <option>Logística</option>
                                            <option value="outro">Outro</option>
                                        </select>
                                    </div>

                                    <div class="field outroCursoCampo" style="display:none;">
                                        <label>Informe o curso</label>
                                        <input type="text" name="outroCurso" placeholder="Digite o nome do curso" />
                                    </div>

                                    <div class="field">
                                        <label>Instituição</label>
                                        <input type="text" name="instituicao" placeholder="Nome da instituição" required />
                                    </div>

                                    <div class="field">
                                        <label>Início</label>
                                        <input type="month" name="inicioCurso" class="monthMaxToday" required />
                                    </div>

                                    <div class="field">
                                        <label>Término</label>
                                        <input type="month" name="terminoCurso" class="monthMaxToday endMonth" required />
                                        <label class="checkline">
                                            <input type="checkbox" name="cursoEmAndamento" class="chk-ongoing">
                                            <span>Em andamento</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn add" onclick="addFormacao()">+ Adicionar formação</button>

                        <div class="actions">
                            <button type="button" class="btn ghost" onclick="prevStep()">Voltar</button>
                            <button type="button" class="btn primary" onclick="nextStep()">Continuar</button>
                        </div>
                    </div>

                    <!-- ETAPA 4 -->
                    <div class="step" id="step4">
                        <div class="choice">
                            <p class="choice-title">Você possui experiência profissional?</p>
                            <div class="choice-row">
                                <label class="chipradio">
                                    <input type="radio" name="temExperiencia" value="SIM" checked>
                                    <span>Tenho experiência</span>
                                </label>
                                <label class="chipradio">
                                    <input type="radio" name="temExperiencia" value="NAO">
                                    <span>Não tenho experiência</span>
                                </label>
                            </div>
                            <p class="choice-sub">Se você ainda não trabalhou, tudo bem — seguimos para a próxima etapa.
                            </p>
                        </div>

                        <div id="experienciaWrap">
                            <div id="experienciasList" class="stack">
                                <div class="stack-item exp-item">
                                    <div class="grid">
                                        <div class="field">
                                            <label>Cargo</label>
                                            <input class="exp-required" name="cargo" list="cargos"
                                                placeholder="Selecione ou digite um cargo" required />
                                            <datalist id="cargos">
                                                <option>Assistente Administrativo</option>
                                                <option>Analista Financeiro</option>
                                                <option>Auxiliar de Produção</option>
                                                <option>Desenvolvedor Front-end</option>
                                                <option>Desenvolvedor Back-end</option>
                                                <option>Designer</option>
                                                <option>Estagiário</option>
                                            </datalist>
                                        </div>

                                        <div class="field">
                                            <label>Empresa</label>
                                            <input class="exp-required" name="empresa" type="text" placeholder="Nome da empresa"
                                                required />
                                        </div>

                                        <div class="field">
                                            <label>Início</label>
                                            <input class="monthMaxToday exp-required" name="inicioExperiencia" type="month" required />
                                        </div>

                                        <div class="field">
                                            <label>Término</label>
                                            <input class="monthMaxToday endMonthExp" name="terminoExperiencia" type="month" required />
                                            <label class="checkline">
                                                <input type="checkbox" name="experienciaAtual" class="chk-current">
                                                <span>Trabalho atualmente aqui</span>
                                            </label>
                                        </div>

                                        <div class="field full">
                                            <label>Descrição das atividades</label>
                                            <textarea class="exp-required" name="descricaoAtividades" required
                                                placeholder="Descreva suas responsabilidades"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="btn add" id="btnAddExp" onclick="addExperiencia()">+ Adicionar experiência</button>
                        </div>

                        <div class="actions">
                            <button type="button" class="btn ghost" onclick="prevStep()">Voltar</button>
                            <button type="button" class="btn primary" onclick="nextStep()">Continuar</button>
                        </div>
                    </div>

                    <!-- ETAPA 5 -->
                    <div class="step" id="step5">
                        <div class="grid">
                            <div class="field">
                                <label>Criar senha</label>
                                <input type="password" name="senha" id="senha" oninput="checkStrength()"
                                    placeholder="Crie uma senha segura" required />
                            </div>

                            <div class="field">
                                <label>Confirmar senha</label>
                                <input type="password" name="confirmarSenha" id="confirmarSenha" placeholder="Repita sua senha" required />
                            </div>

                            <div class="field full">
                                <div class="strength">
                                    <div class="strength-row">
                                        <span class="muted">Força</span>
                                        <strong id="strengthLabel">—</strong>
                                    </div>
                                    <div class="strength-bar">
                                        <i id="senhaNivel"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="actions">
                            <button type="button" class="btn ghost" onclick="prevStep()">Voltar</button>
                            <button type="button" class="btn primary" onclick="finalizarCadastro()">Finalizar cadastro</button>
                        </div>
                    </div>
                </form>
            </section>
        </section>

    </main>

    <div class="loader" id="loader" aria-hidden="true">
        <div class="loader-card">
            <i class="fa-solid fa-circle-notch fa-spin"></i>
            <div>
                <strong>Processando seu cadastro</strong>
                <small>Isso pode levar alguns segundos…</small>
            </div>
        </div>
    </div>

    <script>
        window.JobHub_API_BASE = window.JobHub_API_BASE || <?= api_base_json() ?>;
    </script>
    <script>
        (() => {
            const API_URL = `${window.JobHub_API_BASE}/candidatos`;
            const form = document.getElementById('cadastroForm');
            const toast = document.getElementById('toast');
            const loader = document.getElementById('loader');
            const btnFinal = document.querySelector('#step5 .btn.primary');

            let enviando = false;

            function showToast(msg) {
                if (toast) toast.innerText = msg;
            }

            function onlyDigits(value) {
                return String(value || '').replace(/\D/g, '');
            }

            function normalizarMesOuData(valor) {
                const v = String(valor || '').trim();

                if (!v) return null;
                if (/^\d{4}-\d{2}-\d{2}$/.test(v)) return v;
                if (/^\d{4}-\d{2}$/.test(v)) return `${v}-01`;

                return v;
            }

            window.finalizarCadastro = async function() {
                if (enviando) return;

                const formData = new FormData(form);

                const senha = String(formData.get('senha') || '');
                const confirmarSenha = String(formData.get('confirmarSenha') || '');

                if (senha !== confirmarSenha) {
                    showToast('As senhas não conferem.');
                    return;
                }

                const cursoSelecionado = formData.get('curso');
                const cursoFinal =
                    cursoSelecionado === 'outro' ?
                    String(formData.get('outroCurso') || '').trim() :
                    cursoSelecionado;

                const inicioCurso = normalizarMesOuData(formData.get('inicioCurso'));
                const terminoCurso = normalizarMesOuData(formData.get('terminoCurso'));
                const inicioExperiencia = normalizarMesOuData(formData.get('inicioExperiencia'));
                const terminoExperiencia = normalizarMesOuData(formData.get('terminoExperiencia'));
                const nascimento = normalizarMesOuData(formData.get('dataNascimento'));

                const cursoEmAndamento = formData.has('cursoEmAndamento');
                const experienciaAtual = formData.has('experienciaAtual');

                const formacoes = (cursoFinal || formData.get('instituicao')) ? [{
                    instituicao: String(formData.get('instituicao') || '').trim(),
                    curso: String(cursoFinal || '').trim(),
                    nivelFormacao: 'SUPERIOR',
                    statusFormacao: cursoEmAndamento ? 'CURSANDO' : 'CONCLUIDO',
                    dataInicio: inicioCurso,
                    dataFim: cursoEmAndamento ? null : terminoCurso
                }] : [];

                const experiencias = String(formData.get('temExperiencia') || '').toUpperCase() === 'SIM' ? [{
                    empresa: String(formData.get('empresa') || '').trim(),
                    cargo: String(formData.get('cargo') || '').trim(),
                    descricao: String(formData.get('descricaoAtividades') || '').trim(),
                    dataInicio: inicioExperiencia,
                    dataFim: experienciaAtual ? null : terminoExperiencia,
                    atual: experienciaAtual
                }] : [];

                const data = {
                    nomeCompleto: String(formData.get('nomeCompleto') || '').trim(),
                    email: String(formData.get('email') || '').trim().toLowerCase(),
                    telefone: onlyDigits(formData.get('telefone')),
                    cpf: onlyDigits(formData.get('cpf')),
                    genero: formData.get('genero'),
                    dataNascimento: nascimento,
                    cidade: String(formData.get('cidade') || '').trim(),
                    estado: formData.get('estado'),
                    experiencias,
                    formacoes,
                    senha: senha
                };

                try {
                    enviando = true;
                    if (btnFinal) btnFinal.disabled = true;
                    if (loader) loader.classList.add('show');

                    const response = await fetch(API_URL, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(data),
                    });

                    let result = {};
                    const contentType = response.headers.get('content-type') || '';

                    if (contentType.includes('application/json')) {
                        result = await response.json();
                    } else {
                        const text = await response.text();
                        result = {
                            message: text
                        };
                    }

                    if (!response.ok) {
                        throw new Error(
                            result.message ||
                            result.mensagem ||
                            result.error ||
                            `Erro HTTP ${response.status}`
                        );
                    }

                    showToast(result.message || result.mensagem || 'Cadastro realizado com sucesso!');

                    setTimeout(() => {
                        window.location.href = '<?= URL_BASE ?>inicio';
                    }, 1200);

                } catch (error) {
                    console.error('Erro ao cadastrar:', error);
                    showToast(error.message || 'Erro ao realizar o cadastro!');
                } finally {
                    enviando = false;
                    if (btnFinal) btnFinal.disabled = false;
                    if (loader) loader.classList.remove('show');
                }
            };
        })();
    </script>

    <script src="<?= URL_BASE ?>assets/js/cadastro-icones.js"></script>

</body>

</html>