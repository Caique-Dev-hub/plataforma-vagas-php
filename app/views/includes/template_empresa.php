<!DOCTYPE html>
<html lang="pt-BR">


<link rel="stylesheet" href="<?= URL_BASE ?>assets/css/empresa.css" />


<body class="empresa-page" data-guard="empresa">

    <!-- =============================== HERO =============================== -->
    <section class="empresaDemo-hero">
        <div class="empresaDemo-hero-overlay"></div>

        <div class="empresaDemo-hero-container">
            <h1>
                Anuncie vagas de emprego grátis ilimitadas e
                comece a receber candidatos qualificados já
                no primeiro dia.
            </h1>

            <div class="empresaDemo-hero-actions">
                <a href="<?= URL_BASE ?>cadastrar/recrutador" class="btn-primary">
                    ANUNCIAR VAGAS GRÁTIS
                </a>
            </div>

            <!-- micro info -->
            <div class="hero-badges" aria-hidden="true">
                <span>✔ Vagas ilimitadas</span>
                <span>✔ Currículos qualificados</span>
                <span>✔ Alcance nacional</span>
            </div>
        </div>
    </section>

    <!-- =============================== METRICS (CARDS) =============================== -->
    <section class="empresaDemo-metrics">

        <div class="metric-item dark">
            <svg class="metric-icon" width="70" height="70" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 11c1.66 0 3-1.34 3-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3Z" />
                <path d="M8 11c1.66 0 3-1.34 3-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3Z" />
                <path d="M2 20c0-2.21 3.58-4 8-4" />
                <path d="M14 16c4.42 0 8 1.79 8 4" />
            </svg>

            <div>
                <strong>+ 15 milhões</strong>
                <p>
                    <span>de currículos atualizados</span><br>
                    em nossa plataforma
                </p>
            </div>
        </div>

        <div class="metric-item mid">
            <svg class="metric-icon" width="70" height="70" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="2" y="3" width="20" height="14" rx="2" />
                <path d="M8 21h8" />
                <path d="M12 17v4" />
                <circle cx="15.5" cy="10.5" r="2.5" />
                <line x1="17.5" y1="12.5" x2="20" y2="15" />
            </svg>

            <div>
                <strong>Todas as áreas</strong>
                <p>
                    <span>Candidatos de todos os segmentos</span><br>
                    e perfis profissionais
                </p>
            </div>
        </div>

        <div class="metric-item dark">
            <svg class="metric-icon" width="70" height="70" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 10l2-4 4-2 4 1 3-2 3 2 1 4-2 3 1 4-3 3-4 1-4-2-3-4z" />
            </svg>

            <div>
                <strong>Em todo Brasil</strong>
                <p>
                    <span>Presente em todas as regiões do país</span><br>
                    para conectar empresas e candidatos
                </p>
            </div>
        </div>

    </section>

    <!-- =============================== FEATURES =============================== -->
    <section class="empresaDemo-features">

        <div class="feature-item">
            <svg viewBox="0 0 24 24" class="feature-icon" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 2l7 4v6c0 5-3.5 9-7 10-3.5-1-7-5-7-10V6l7-4z" />
            </svg>
            <h4>Publicação de vagas gratuita</h4>
            <p>Divulgue suas oportunidades de forma simples e sem custos para alcançar mais candidatos.</p>
        </div>

        <div class="feature-item">
            <svg viewBox="0 0 24 24" class="feature-icon" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10" />
                <path d="M12 6v6l4 2" />
            </svg>
            <h4>Agilidade no recrutamento</h4>
            <p>Receba candidaturas rapidamente e acelere seus processos de seleção.</p>
        </div>

        <div class="feature-item">
            <svg viewBox="0 0 24 24" class="feature-icon" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <rect x="2" y="3" width="20" height="14" rx="2" />
                <path d="M8 21h8" />
            </svg>
            <h4>Gestão de vagas em um só lugar</h4>
            <p>Centralize a criação, edição e acompanhamento das suas vagas em um único painel.</p>
        </div>

        <div class="feature-item">
            <svg viewBox="0 0 24 24" class="feature-icon" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 3v18h18" />
                <path d="M12 9l-5 5-4-4-3 3" />
            </svg>
            <h4>Maior visibilidade</h4>
            <p>Aumente o alcance das suas vagas e atraia mais profissionais qualificados.</p>
        </div>

        <div class="feature-item">
            <svg viewBox="0 0 24 24" class="feature-icon" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="7" r="4" />
                <path d="M5.5 21c1.5-4 11.5-4 13 0" />
            </svg>
            <h4>Perfis variados</h4>
            <p>Conecte-se com candidatos de diferentes áreas, níveis e experiências.</p>
        </div>

        <div class="feature-item">
            <svg viewBox="0 0 24 24" class="feature-icon" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 10c0 6-9 13-9 13S3 16 3 10a9 9 0 1 1 18 0z" />
            </svg>
            <h4>Alcance nacional</h4>
            <p>Divulgue suas vagas nacionalmente e alcance candidatos em todas as regiões.</p>
        </div>

        <div class="feature-item">
            <svg viewBox="0 0 24 24" class="feature-icon" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 3v18h18" />
                <path d="M18 9l-5 5-4-4-3 3" />
            </svg>
            <h4>Acompanhamento</h4>
            <p>Visualize e organize os candidatos inscritos de forma prática e eficiente.</p>
        </div>

        <div class="feature-item">
            <svg viewBox="0 0 24 24" class="feature-icon" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="3" />
                <path
                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33" />
            </svg>
            <h4>Plataforma simples</h4>
            <p>Uma plataforma intuitiva para apoiar o seu processo de contratação.</p>
        </div>

    </section>

    <section class="empresaDemo-how" id="como-funciona">
        <div class="emp-container">
            <header class="empresaDemo-sec-head">
                <h2>Como funciona</h2>
                <p>Publique sua vaga em minutos, receba candidatos e acompanhe tudo pelo painel.</p>
            </header>

            <div class="empresaDemo-how-grid">
                <article class="empresaDemo-how-card">
                    <div class="empresaDemo-how-ico" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 5v14" />
                            <path d="M5 12h14" />
                            <path
                                d="M7 3h10a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2Z" />
                        </svg>
                    </div>
                    <h3>1) Crie sua vaga</h3>
                    <p>Informe cargo, cidade, requisitos e publique gratuitamente.</p>
                    <ul>
                        <li>Publicação simples</li>
                        <li>Vagas ilimitadas</li>
                        <li>Sem mensalidade</li>
                    </ul>
                </article>

                <article class="empresaDemo-how-card">
                    <div class="empresaDemo-how-ico" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                    </div>
                    <h3>2) Receba candidatos</h3>
                    <p>Os candidatos se inscrevem e você acessa os perfis no painel.</p>
                    <ul>
                        <li>Currículos atualizados</li>
                        <li>Organização por etapas</li>
                        <li>Mais agilidade no funil</li>
                    </ul>
                </article>

                <article class="empresaDemo-how-card">
                    <div class="empresaDemo-how-ico" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 3v18h18" />
                            <path d="M7 14l3 3 7-7" />
                        </svg>
                    </div>
                    <h3>3) Gerencie e contrate</h3>
                    <p>Acompanhe inscrições, filtre candidatos e tome decisão com segurança.</p>
                    <ul>
                        <li>Painel centralizado</li>
                        <li>Histórico de candidatos</li>
                        <li>Controle do processo</li>
                    </ul>
                </article>
            </div>

            <div class="empresaDemo-how-actions">
                <span class="empresaDemo-how-mini">✔ Gratuito • ✔ Ilimitado • ✔ Alcance nacional</span>
            </div>
        </div>
    </section>
    <!-- =============================== PROFILES =============================== -->
    <section class="empresaDemo-profiles-v2">
        <div class="empresaDemo-profiles-bg"></div>

        <div class="empresaDemo-profiles-wrap">
            <header class="empresaDemo-profiles-header">
                <h2>
                    Soluções para empresas de
                    <strong>todos os tamanhos</strong>
                </h2>
                <p>Uma plataforma flexível para apoiar sua empresa em cada etapa da contratação.</p>
            </header>

            <div class="empresaDemo-profiles-grid">
                <div class="profile-box">
                    <div class="icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2l7 4v6c0 5-3.5 9-7 10-3.5-1-7-5-7-10V6l7-4z" />
                            <path d="M9 12l2 2 4-4" />
                        </svg>
                    </div>
                    <h4>Todos os setores</h4>
                    <p>Profissionais de diferentes áreas e perfis em um só lugar.</p>
                </div>

                <div class="profile-box">
                    <div class="icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="8" r="4" />
                            <path d="M5.5 21c1.5-4 11.5-4 13 0" />
                        </svg>
                    </div>
                    <h4>Contratações flexíveis</h4>
                    <p>Contrate conforme a demanda, sem complicações.</p>
                </div>

                <div class="profile-box">
                    <div class="icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="18" height="14" rx="2" />
                            <path d="M8 21h8" />
                        </svg>
                    </div>
                    <h4>Diversos cargos</h4>
                    <p>Do operacional ao estratégico, encontre o perfil certo.</p>
                </div>

                <div class="profile-box">
                    <div class="icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M12 6v6l4 2" />
                        </svg>
                    </div>
                    <h4>Agilidade</h4>
                    <p>Ganhe tempo e reduza esforços no recrutamento.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- =============================== HOW IT WORKS (PADRÃO EmpresaDemo) =============================== -->


    <!-- =============================== PLANO JobHub =============================== -->
    <section class="jobhub-planos jobhub-plano-unico" id="planos-jobhub">
        <div class="emp-container">
            <div class="jobhub-plano-hero">
                <div class="jobhub-plano-glow jobhub-plano-glow-a" aria-hidden="true"></div>
                <div class="jobhub-plano-glow jobhub-plano-glow-b" aria-hidden="true"></div>

                <div class="jobhub-plano-copy">
                    <span class="jobhub-planos-kicker">Plano único JobHub</span>

                    <h2>Uma assinatura para sua empresa contratar melhor</h2>

                    <p class="jobhub-plano-subtitle">
                        Divulgue vagas, receba candidatos e acompanhe todo o processo seletivo em uma área
                        profissional, organizada e preparada para pagamento pelo Mercado Pago.
                    </p>

                    <div class="jobhub-plano-highlights" aria-label="Principais vantagens do Plano JobHub Empresas">
                        <span>Vagas na plataforma</span>
                        <span>Painel da empresa</span>
                    </div>

                    <div class="jobhub-plano-beneficios">
                        <article class="jobhub-plano-beneficio">
                            <span class="jobhub-plano-icon">✓</span>
                            <strong>Publique suas vagas</strong>
                            <p>Apresente sua empresa para candidatos qualificados dentro da plataforma.</p>
                        </article>

                        <article class="jobhub-plano-beneficio">
                            <span class="jobhub-plano-icon">✓</span>
                            <strong>Acompanhe interessados</strong>
                            <p>Visualize candidatos inscritos e acompanhe cada oportunidade com clareza.</p>
                        </article>

                        <article class="jobhub-plano-beneficio">
                            <span class="jobhub-plano-icon">✓</span>
                            <strong>Organize no Kanban</strong>
                            <p>Controle listados, abordados, inscritos, aprovados, reprovados e desistentes.</p>
                        </article>

                        <article class="jobhub-plano-beneficio">
                            <span class="jobhub-plano-icon">✓</span>
                            <strong>Área exclusiva</strong>
                            <p>Gerencie vagas, candidatos e informações da empresa em um painel próprio.</p>
                        </article>


                    </div>
                </div>

                <aside class="jobhub-plano-preco-box" aria-label="Resumo do Plano JobHub Empresas">
                    <div class="jobhub-plano-topo-card">
                        <div class="jobhub-plano-selo">Mais indicado para empresas</div>
                        <h3>Plano JobHub Empresas</h3>
                    </div>

                    <div class="jobhub-plano-price-wrap">
                        <p class="jobhub-plano-preco">
                            R$ 29,90 ''
                            <small>/mês</small>
                        </p>

                        <p class="jobhub-plano-preco-desc">
                            Assinatura mensal para empresas que querem recrutar com mais organização,
                            visibilidade e controle.
                        </p>
                    </div>

                    <div class="jobhub-plano-incluso">
                        <span>O plano inclui:</span>
                        <ul>
                            <li>Publicação e gestão de vagas</li>
                            <li>Painel empresarial completo</li>
                            <li>Fluxo de candidatos por etapas</li>
                        </ul>
                    </div>

                    <button
                        class="jobhub-plano-btn"
                        type="button"
                        data-plano-codigo="jobhub_empresas"
                        data-plano-nome="Plano JobHub Empresas"
                        data-plano-valor="99.90"
                    >
                        Assinar com Mercado Pago
                    </button>


                </aside>
            </div>
        </div>
    </section>

    <!-- =============================== FAQ (PADRÃO EmpresaDemo) =============================== -->
    <section class="empresaDemo-faqv2" id="faq">
        <div class="emp-container">
            <header class="empresaDemo-sec-head">
                <h2>Dúvidas frequentes</h2>
                <p>Respostas rápidas para você publicar sua vaga com confiança.</p>
            </header>

            <div class="empresaDemo-faq-list" data-faq>
                <article class="empresaDemo-faq-item">
                    <button class="empresaDemo-faq-q" type="button" aria-expanded="false" aria-controls="faq_a1">
                        É realmente grátis anunciar vagas?
                        <span class="empresaDemo-faq-ico" aria-hidden="true">+</span>
                    </button>
                    <div class="empresaDemo-faq-a" id="faq_a1" hidden>
                        Sim. Você pode publicar vagas gratuitamente e sem limite para divulgar oportunidades e receber candidatos.
                    </div>
                </article>

                <article class="empresaDemo-faq-item">
                    <button class="empresaDemo-faq-q" type="button" aria-expanded="false" aria-controls="faq_a2">
                        Como eu recebo os currículos?
                        <span class="empresaDemo-faq-ico" aria-hidden="true">+</span>
                    </button>
                    <div class="empresaDemo-faq-a" id="faq_a2" hidden>
                        Assim que os candidatos se inscrevem, os perfis ficam disponíveis no seu painel para visualizar e organizar.
                    </div>
                </article>

                <article class="empresaDemo-faq-item">
                    <button class="empresaDemo-faq-q" type="button" aria-expanded="false" aria-controls="faq_a3">
                        Posso pausar ou editar uma vaga?
                        <span class="empresaDemo-faq-ico" aria-hidden="true">+</span>
                    </button>
                    <div class="empresaDemo-faq-a" id="faq_a3" hidden>
                        Sim. Você pode ajustar informações, encerrar ou pausar vagas para manter o processo sempre atualizado.
                    </div>
                </article>

                <article class="empresaDemo-faq-item">
                    <button class="empresaDemo-faq-q" type="button" aria-expanded="false" aria-controls="faq_a4">
                        A plataforma serve para pequenas empresas?
                        <span class="empresaDemo-faq-ico" aria-hidden="true">+</span>
                    </button>
                    <div class="empresaDemo-faq-a" id="faq_a4" hidden>
                        Sim. Atende desde pequenas empresas até operações maiores, com vagas ilimitadas e gestão centralizada.
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- =============================== CTA =============================== -->
    <!-- <section class="empresaDemo-cta">
        <h2>
            Comece agora a anunciar vagas<br>
            e encontrar talentos para sua empresa
        </h2>

        <div class="empresaDemo-cta-actions">
            <a href="<?= URL_BASE ?>cadastrar/recrutador" class="btn-primary">Publicar Vagas Grátis</a>
        </div>
    </section> -->
    <style>
        /* =========================================================
   JobHub • EMPRESA PAGE — PATCH RESPONSIVO (cola no final)
   Escopo: body.empresa-page
========================================================= */

        .empresa-page,
        .empresa-page * {
            box-sizing: border-box;
        }


        /* container padrão (você já usa emp-container em seções) */
        .empresa-page .emp-container,
        .empresa-page .empresaDemo-hero-container,
        .empresa-page .empresaDemo-profiles-wrap {
            width: min(1120px, calc(100% - 32px));
            margin-inline: auto;
        }

        /* =========================
   HERO
========================= */


        .empresa-page .hero-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 18px;
        }

        .empresa-page .hero-badges span {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            border-radius: 999px;
            line-height: 1;
            white-space: nowrap;
        }

        /* botão full no mobile (sem quebrar desktop) */
        .empresa-page .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            max-width: 100%;
        }

        /* =========================
   METRICS (cards)
========================= */
        .empresa-page .empresaDemo-metrics {
            width: min(1120px, calc(100% - 32px));
            margin: -46px auto 0;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            position: relative;
            z-index: 3;
        }

        .empresa-page .metric-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 18px 18px;
            border-radius: 18px;
            min-width: 0;
        }

        .empresa-page .metric-item>div {
            min-width: 0;
        }

        .empresa-page .metric-item strong {
            display: block;
            font-size: clamp(16px, 1.3vw, 20px);
            line-height: 1.2;
        }

        .empresa-page .metric-item p {
            margin: 8px 0 0;
            line-height: 1.35;
            word-break: break-word;
        }

        .empresa-page .metric-icon {
            width: 58px;
            height: 58px;
            flex: 0 0 auto;
        }

        /* =========================
   FEATURES (grid)
========================= */
        .empresa-page .empresaDemo-features {
            width: min(1120px, calc(100% - 32px));
            margin: 34px auto 0;
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
        }

        .empresa-page .feature-item {
            border-radius: 18px;
            padding: 18px 16px;
            min-width: 0;
        }

        .empresa-page .feature-item h4 {
            margin: 12px 0 8px;
            line-height: 1.2;
        }

        .empresa-page .feature-item p {
            margin: 0;
            line-height: 1.4;
        }

        .empresa-page .feature-icon {
            width: 34px;
            height: 34px;
        }

        /* =========================
   COMO FUNCIONA
========================= */
        .empresa-page .empresaDemo-how {
            padding: 54px 0;
        }

        .empresa-page .empresaDemo-sec-head {
            text-align: left;
            margin-bottom: 18px;
        }

        .empresa-page .empresaDemo-sec-head h2 {
            font-size: clamp(22px, 3vw, 32px);
            margin: 0 0 8px;
        }

        .empresa-page .empresaDemo-sec-head p {
            margin: 0;
            line-height: 1.45;
        }

        .empresa-page .empresaDemo-how-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
        }

        .empresa-page .empresaDemo-how-card {
            border-radius: 18px;
            padding: 18px 16px;
            min-width: 0;
        }

        .empresa-page .empresaDemo-how-card ul {
            margin: 12px 0 0;
            padding-left: 18px;
        }

        .empresa-page .empresaDemo-how-actions {
            margin-top: 14px;
        }

        .empresa-page .empresaDemo-how-mini {
            display: inline-flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        /* =========================
   PROFILES v2
========================= */
        .empresa-page .empresaDemo-profiles-v2 {
            position: relative;
            padding: 54px 0;
            overflow: hidden;
        }

        .empresa-page .empresaDemo-profiles-header {
            text-align: left;
            margin-bottom: 18px;
        }

        .empresa-page .empresaDemo-profiles-header h2 {
            font-size: clamp(22px, 3vw, 34px);
            line-height: 1.12;
            margin: 0 0 8px;
        }

        .empresa-page .empresaDemo-profiles-header p {
            margin: 0;
            line-height: 1.45;
        }

        .empresa-page .empresaDemo-profiles-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
        }

        .empresa-page .profile-box {
            border-radius: 18px;
            padding: 18px 16px;
            min-width: 0;
        }

        /* =========================
   FAQ
========================= */
        .empresa-page .empresaDemo-faqv2 {
            padding: 54px 0;
        }

        .empresa-page .empresaDemo-faq-list {
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .empresa-page .empresaDemo-faq-q {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            text-align: left;
        }

        .empresa-page .empresaDemo-faq-a {
            line-height: 1.5;
        }

        /* =========================================================
   BREAKPOINTS
========================================================= */

        /* tablet */
        @media (max-width: 1024px) {
            .empresa-page .empresaDemo-features {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .empresa-page .empresaDemo-profiles-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        /* mobile */
        @media (max-width: 720px) {

            .empresa-page .empresaDemo-hero {
                padding: 72px 0 50px;
            }

            .empresa-page .empresaDemo-hero-container {
                text-align: left;
            }

            .empresa-page .empresaDemo-hero h1 {
                max-width: 100%;
            }

            .empresa-page .empresaDemo-hero-actions .btn-primary {
                width: 100%;
            }

            .empresa-page .empresaDemo-metrics {
                margin: 18px auto 0;
                /* remove o overlap no mobile */
                grid-template-columns: 1fr;
            }

            .empresa-page .metric-item {
                padding: 16px 16px;
                gap: 12px;
            }

            .empresa-page .metric-icon {
                width: 48px;
                height: 48px;
            }

            .empresa-page .empresaDemo-features {
                grid-template-columns: 1fr;
            }

            .empresa-page .empresaDemo-how-grid {
                grid-template-columns: 1fr;
            }

            .empresa-page .empresaDemo-profiles-grid {
                grid-template-columns: 1fr;
            }
        }

        /* mobile pequeno */
        @media (max-width: 420px) {
            .empresa-page .hero-badges span {
                width: 100%;
                justify-content: center;
            }

            .empresa-page .empresaDemo-hero {
                position: relative;
                overflow: hidden;
                padding: 96px 0 72px;
            }

            .empresa-page .empresaDemo-hero-container {
                position: relative;
                z-index: 2;
                text-align: left;
            }

            .empresa-page .empresaDemo-hero h1 {
                max-width: 22ch;
                font-size: clamp(28px, 4.2vw, 54px);
                line-height: 1.06;
                margin: 0 0 18px;
            }

            .empresa-page .empresaDemo-hero-actions {
                display: flex;
                gap: 12px;
                flex-wrap: wrap;
                margin-top: 14px;
            }
        }


        /* =========================
   PLANO JobHub - PLANO UNICO AJUSTADO
========================= */
        .empresa-page .jobhub-planos.jobhub-plano-unico {
            padding: 92px 0;
            background:
                radial-gradient(circle at top left, rgba(196, 217, 229, .95), transparent 34%),
                linear-gradient(135deg, #f8fbfd 0%, #ffffff 48%, #eef6fa 100%);
            position: relative;
            overflow: hidden;
        }

        .empresa-page .jobhub-planos.jobhub-plano-unico::before,
        .empresa-page .jobhub-planos.jobhub-plano-unico::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            pointer-events: none;
            filter: blur(2px);
        }

        .empresa-page .jobhub-planos.jobhub-plano-unico::before {
            width: 260px;
            height: 260px;
            right: -90px;
            top: 40px;
            background: rgba(36, 73, 92, .12);
        }

        .empresa-page .jobhub-planos.jobhub-plano-unico::after {
            width: 180px;
            height: 180px;
            left: -70px;
            bottom: 42px;
            background: rgba(196, 217, 229, .65);
        }

        .empresa-page .jobhub-plano-hero {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(330px, 390px);
            gap: clamp(24px, 3.2vw, 42px);
            align-items: stretch;
            padding: clamp(28px, 4.5vw, 54px);
            border-radius: 34px;
            background:
                linear-gradient(135deg, rgba(255, 255, 255, .96), rgba(255, 255, 255, .84)),
                linear-gradient(135deg, #24495c, #c4d9e5);
            border: 1px solid rgba(36, 73, 92, .14);
            box-shadow: 0 34px 90px rgba(15, 23, 42, .16);
            overflow: hidden;
        }

        .empresa-page .jobhub-plano-glow {
            position: absolute;
            border-radius: 999px;
            pointer-events: none;
        }

        .empresa-page .jobhub-plano-glow-a {
            width: 520px;
            height: 520px;
            right: -230px;
            top: -235px;
            background: radial-gradient(circle, rgba(36, 73, 92, .18), transparent 62%);
        }

        .empresa-page .jobhub-plano-glow-b {
            width: 260px;
            height: 260px;
            left: -120px;
            bottom: -135px;
            background: radial-gradient(circle, rgba(196, 217, 229, .42), transparent 62%);
        }

        .empresa-page .jobhub-plano-copy {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .empresa-page .jobhub-planos-kicker {
            display: inline-flex;
            align-items: center;
            width: fit-content;
            padding: 9px 14px;
            border-radius: 999px;
            background: #24495c;
            color: #fff;
            font-size: 12px;
            font-weight: 900;
            letter-spacing: .08em;
            text-transform: uppercase;
            margin-bottom: 18px;
            box-shadow: 0 12px 24px rgba(36, 73, 92, .22);
        }

        .empresa-page .jobhub-plano-copy h2 {
            margin: 0;
            max-width: 760px;
            font-size: clamp(34px, 4.7vw, 56px);
            line-height: .98;
            letter-spacing: -0.05em;
            color: #0f172a;
        }

        .empresa-page .jobhub-plano-subtitle {
            max-width: 720px;
            margin: 20px 0 0;
            font-size: clamp(16px, 1.5vw, 19px);
            line-height: 1.55;
            color: #475569;
        }

        .empresa-page .jobhub-plano-highlights {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 26px 0 22px;
        }

        .empresa-page .jobhub-plano-highlights span {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 14px;
            border-radius: 999px;
            background: rgba(196, 217, 229, .56);
            color: #24495c;
            font-weight: 900;
            font-size: 13px;
            white-space: nowrap;
        }

        .empresa-page .jobhub-plano-highlights span::before {
            content: "✓";
            display: inline-grid;
            place-items: center;
            width: 18px;
            height: 18px;
            border-radius: 999px;
            background: #24495c;
            color: #fff;
            font-size: 11px;
            line-height: 1;
        }

        .empresa-page .jobhub-plano-beneficios {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            margin-top: auto;
        }

        .empresa-page .jobhub-plano-beneficio {
            position: relative;
            min-height: 118px;
            padding: 18px 18px 18px 54px;
            border-radius: 20px;
            background: rgba(255, 255, 255, .82);
            border: 1px solid rgba(15, 23, 42, .08);
            box-shadow: 0 12px 28px rgba(15, 23, 42, .06);
        }

        .empresa-page .jobhub-plano-beneficio strong {
            display: block;
            margin-bottom: 6px;
            color: #0f172a;
            font-size: 15px;
            line-height: 1.2;
        }

        .empresa-page .jobhub-plano-beneficio p {
            margin: 0;
            color: #475569;
            font-size: 14px;
            line-height: 1.35;
        }

        .empresa-page .jobhub-plano-icon {
            position: absolute;
            left: 18px;
            top: 18px;
            width: 24px;
            height: 24px;
            display: grid;
            place-items: center;
            border-radius: 999px;
            background: #24495c;
            color: #fff;
            font-size: 13px;
            font-weight: 900;
            box-shadow: 0 10px 18px rgba(36, 73, 92, .20);
        }

        .empresa-page .jobhub-plano-beneficio-pagamento {
            background: linear-gradient(135deg, rgba(196, 217, 229, .74), rgba(255, 255, 255, .88));
            border-color: rgba(36, 73, 92, .18);
        }

        .empresa-page .jobhub-plano-preco-box {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 100%;
            padding: clamp(24px, 3vw, 36px);
            border-radius: 30px;
            background: linear-gradient(180deg, #24495c 0%, #183545 100%);
            color: #fff;
            box-shadow: 0 24px 60px rgba(36, 73, 92, .34);
            overflow: hidden;
        }

        .empresa-page .jobhub-plano-preco-box::before {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            right: -135px;
            top: -120px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .12);
        }

        .empresa-page .jobhub-plano-topo-card,
        .empresa-page .jobhub-plano-price-wrap,
        .empresa-page .jobhub-plano-incluso,
        .empresa-page .jobhub-plano-btn,
        .empresa-page .jobhub-planos-note {
            position: relative;
            z-index: 1;
        }

        .empresa-page .jobhub-plano-selo {
            width: fit-content;
            padding: 8px 12px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .14);
            color: #eaf6fb;
            font-size: 12px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: .06em;
            margin-bottom: 20px;
        }

        .empresa-page .jobhub-plano-preco-box h3 {
            margin: 0;
            font-size: clamp(26px, 2.4vw, 34px);
            line-height: 1.08;
            color: #fff;
        }

        .empresa-page .jobhub-plano-price-wrap {
            padding: 24px 0 18px;
        }

        .empresa-page .jobhub-plano-preco {
            margin: 0;
            font-size: clamp(44px, 4.8vw, 62px);
            line-height: .95;
            font-weight: 950;
            letter-spacing: -0.06em;
            color: #fff;
        }

        .empresa-page .jobhub-plano-preco small {
            display: block;
            margin-top: 9px;
            font-size: 16px;
            font-weight: 800;
            letter-spacing: 0;
            color: #c4d9e5;
        }

        .empresa-page .jobhub-plano-preco-desc {
            margin: 18px 0 0;
            color: rgba(255, 255, 255, .84);
            line-height: 1.5;
        }

        .empresa-page .jobhub-plano-incluso {
            padding: 18px;
            border-radius: 20px;
            background: rgba(255, 255, 255, .09);
            border: 1px solid rgba(255, 255, 255, .12);
            margin-bottom: 22px;
        }

        .empresa-page .jobhub-plano-incluso span {
            display: block;
            margin-bottom: 10px;
            color: #fff;
            font-weight: 900;
        }

        .empresa-page .jobhub-plano-incluso ul {
            margin: 0;
            padding: 0;
            list-style: none;
            display: grid;
            gap: 8px;
        }

        .empresa-page .jobhub-plano-incluso li {
            position: relative;
            padding-left: 20px;
            color: rgba(255, 255, 255, .82);
            font-size: 14px;
            line-height: 1.35;
        }

        .empresa-page .jobhub-plano-incluso li::before {
            content: "•";
            position: absolute;
            left: 3px;
            top: 0;
            color: #c4d9e5;
            font-weight: 900;
        }

        .empresa-page .jobhub-plano-btn {
            width: 100%;
            min-height: 58px;
            border: 0;
            border-radius: 999px;
            background: #fff;
            color: #183545;
            font-size: 16px;
            font-weight: 950;
            cursor: pointer;
            box-shadow: 0 18px 34px rgba(0, 0, 0, .24);
            transition: transform .2s ease, filter .2s ease, box-shadow .2s ease;
        }

        .empresa-page .jobhub-plano-btn:hover {
            transform: translateY(-2px) scale(1.01);
            filter: brightness(1.03);
            box-shadow: 0 24px 46px rgba(0, 0, 0, .28);
        }

        .empresa-page .jobhub-planos-note {
            margin: 14px 0 0;
            color: rgba(255, 255, 255, .70);
            font-size: 12px;
            line-height: 1.45;
            text-align: center;
        }

        @media (max-width: 1100px) {
            .empresa-page .jobhub-plano-hero {
                grid-template-columns: 1fr;
            }

            .empresa-page .jobhub-plano-preco-box {
                max-width: 560px;
                width: 100%;
                margin: 0 auto;
            }
        }

        @media (max-width: 760px) {
            .empresa-page .jobhub-planos.jobhub-plano-unico {
                padding: 64px 0;
            }

            .empresa-page .jobhub-plano-hero {
                border-radius: 26px;
            }

            .empresa-page .jobhub-plano-beneficios {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 520px) {
            .empresa-page .jobhub-plano-hero {
                padding: 24px;
            }

            .empresa-page .jobhub-plano-copy h2 {
                font-size: 34px;
            }

            .empresa-page .jobhub-plano-highlights span {
                width: 100%;
            }
        }


    </style>
    <script src="<?= URL_BASE ?>assets/js/empresa.js"></script>
    <script src="<?= URL_BASE ?>assets/js/api-empresa.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const root = document.querySelector("[data-faq]");
            if (!root) return;

            const buttons = root.querySelectorAll(".empresaDemo-faq-q");

            buttons.forEach((btn) => {
                btn.addEventListener("click", () => {
                    const id = btn.getAttribute("aria-controls");
                    const ans = document.getElementById(id);
                    if (!ans) return;

                    const isOpen = btn.getAttribute("aria-expanded") === "true";

                    // fecha todos
                    buttons.forEach((b) => {
                        b.setAttribute("aria-expanded", "false");
                        const ico = b.querySelector(".empresaDemo-faq-ico");
                        if (ico) ico.textContent = "+";
                    });

                    root.querySelectorAll(".empresaDemo-faq-a").forEach((a) => (a.hidden = true));

                    // abre o clicado se estava fechado
                    if (!isOpen) {
                        btn.setAttribute("aria-expanded", "true");
                        ans.hidden = false;
                        const ico = btn.querySelector(".empresaDemo-faq-ico");
                        if (ico) ico.textContent = "–";
                    }
                });
            });
        });
    </script>
</body>