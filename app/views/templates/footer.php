<footer class="jobhub-jf" id="jobhubJobsFooter">
    <div class="jobhub-jf__wrap">

        <!-- TOP BAR -->
        <div class="jobhub-jf__top">
            <div class="jobhub-jf__brand">
                <img class="jobhub-jf__logo" src="<?= URL_BASE ?>assets/img/logo_preta.svg" alt="EmpresaDemo">
                <p class="jobhub-jf__desc">
                    Conectando talentos e empresas com tecnologia e experiência humana.
                </p>
            </div>



        </div>

        <!-- GRID -->
        <div class="jobhub-jf__grid">

            <div class="jobhub-jf__col">
                <h4 class="jobhub-jf__title">Candidatos</h4>
                <a class="jobhub-jf__link" href="pesquisar">Buscar vagas</a>
            </div>

            <div class="jobhub-jf__col">
                <h4 class="jobhub-jf__title">Empresas</h4>
                <a class="jobhub-jf__link" href="cadastrar/recrutador">Anunciar vaga</a>
                <a class="jobhub-jf__link js-jobhub-wa"
                    href="#"
                    data-wa-message="Olá! Vim pelo site e gostaria de falar com um consultor.">
                    Fale com um consultor
                </a>
            </div>

            <div class="jobhub-jf__col">
                <h4 class="jobhub-jf__title">Populares</h4>
                <div class="jobhub-jf__tags">
                    <a class="jobhub-jf__tag" href="pesquisar">Administrativo</a>
                    <a class="jobhub-jf__tag" href="pesquisar">Vendas</a>
                    <a class="jobhub-jf__tag" href="pesquisar">Tecnologia</a>
                    <a class="jobhub-jf__tag" href="pesquisar">Jurídico</a>
                    <a class="jobhub-jf__tag" href="pesquisar">Saúde</a>
                    <a class="jobhub-jf__tag" href="pesquisar">PCD</a>
                </div>
            </div>


        </div>

        <!-- BOTTOM -->
        <div class="jobhub-jf__bottom">
            <span class="jobhub-jf__copy">© 2026 EmpresaDemo • Todos os direitos reservados.</span>
            <div class="jobhub-jf__bottomLinks">
                <a class="jobhub-jf__bLink" href="#" data-jobhub-modal="privacy">Privacidade</a>
                <a class="jobhub-jf__bLink" href="#" data-jobhub-modal="terms">Termos</a>

                <a class="jobhub-jf__bLink js-jobhub-wa"
                    href="#"
                    data-wa-message="Olá! Vim pelo site e gostaria de falar com vocês (Contato).">
                    Contato
                </a>
            </div>

        </div>
        <!-- MODAL (Privacidade / Termos) -->
        <div class="jobhub-mdl" id="jobhubModal" aria-hidden="true">
            <div class="jobhub-mdl__overlay" data-jobhub-close></div>

            <div class="jobhub-mdl__dialog" role="dialog" aria-modal="true" aria-labelledby="jobhubModalTitle" tabindex="-1">
                <button class="jobhub-mdl__close" type="button" aria-label="Fechar" data-jobhub-close>×</button>
                <h3 class="jobhub-mdl__title" id="jobhubModalTitle"></h3>
                <div class="jobhub-mdl__body" id="jobhubModalBody"></div>
            </div>
        </div>

        <!-- Conteúdos (edite como quiser) -->
        <template id="jobhubTplPrivacy">
            <p><strong>Política de Privacidade</strong></p>
            <p>Este conteúdo é um modelo. Substitua pelo texto jurídico da EmpresaDemo.</p>
            <p>Coletamos dados fornecidos por você (ex.: cadastro, currículo, contato) para viabilizar serviços da plataforma.</p>
            <ul>
                <li>Finalidade: recrutamento, comunicação e melhoria da experiência.</li>
                <li>Compartilhamento: apenas quando necessário para prestação do serviço.</li>
                <li>Segurança: medidas técnicas e organizacionais para proteção dos dados.</li>
                <li>Seus direitos: acesso, correção, exclusão e revogação de consentimento.</li>
            </ul>
            <p>Para solicitações: entre em contato pelo WhatsApp/Contato.</p>
        </template>

        <template id="jobhubTplTerms">
            <p><strong>Termos de Uso</strong></p>
            <p>Este conteúdo é um modelo. Substitua pelo texto jurídico da EmpresaDemo.</p>
            <ul>
                <li>Ao usar a plataforma, você concorda com estes termos e com a Política de Privacidade.</li>
                <li>É responsabilidade do usuário fornecer informações verdadeiras e atualizadas.</li>
                <li>A plataforma pode atualizar regras e recursos para melhorar o serviço.</li>
                <li>Conteúdos e marca são protegidos por direitos autorais.</li>
            </ul>
            <p>Em caso de dúvidas, fale com um consultor.</p>
        </template>

    </div>
</footer>
<style>
    /* ===============================
   JobHub JOBS FOOTER (isolado)
   =============================== */

    #jobhubJobsFooter,
    #jobhubJobsFooter * {
        box-sizing: border-box;
    }

    #jobhubJobsFooter {
        background: #344B57;
        /* p1 */
        color: rgba(255, 255, 255, .92);
        padding: 64px 0 26px;
        position: relative;
        overflow: hidden;
    }

    /* glow leve */
    #jobhubJobsFooter::before {
        content: "";
        position: absolute;
        inset: -40%;
        background:
            radial-gradient(700px 320px at 20% 30%, rgba(141, 168, 183, .28), transparent 60%),
            radial-gradient(700px 320px at 85% 65%, rgba(196, 217, 229, .22), transparent 60%);
        filter: blur(90px);
        opacity: .55;
        pointer-events: none;
    }

    #jobhubJobsFooter .jobhub-jf__wrap {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 40px;
        position: relative;
        z-index: 1;
    }

    /* TOP */
    #jobhubJobsFooter .jobhub-jf__top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 22px;
        padding-bottom: 26px;
        border-bottom: 1px solid rgba(255, 255, 255, .10);
    }

    #jobhubJobsFooter .jobhub-jf__brand {
        max-width: 520px;
    }

    #jobhubJobsFooter .jobhub-jf__logo {
        width: 160px;
        height: auto;
        display: block;
        margin-bottom: 12px;
        filter: brightness(0) invert(1);
        opacity: .98;
    }

    #jobhubJobsFooter .jobhub-jf__desc {
        margin: 0;
        font-size: 14.5px;
        line-height: 1.6;
        color: rgba(255, 255, 255, .78);
    }

    #jobhubJobsFooter .jobhub-jf__cta {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        justify-content: flex-end;
    }

    #jobhubJobsFooter .jobhub-jf__btn {
        height: 44px;
        padding: 0 16px;
        border-radius: 999px;
        text-decoration: none;
        font-weight: 900;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: transform .12s ease, filter .12s ease, background .12s ease;
        white-space: nowrap;
    }

    #jobhubJobsFooter .jobhub-jf__btn--primary {
        color: #0A2A31;
        background: linear-gradient(135deg, #8DA8B7, #6D8796);
        border: 0;
    }

    #jobhubJobsFooter .jobhub-jf__btn--outline {
        color: rgba(255, 255, 255, .92);
        background: rgba(255, 255, 255, .08);
        border: 1px solid rgba(255, 255, 255, .22);
    }

    #jobhubJobsFooter .jobhub-jf__btn:hover {
        transform: translateY(-1px);
        filter: brightness(1.03);
    }

    /* GRID */
    #jobhubJobsFooter .jobhub-jf__grid {
        display: grid;
        grid-template-columns: 1fr 1fr 1.15fr 1.2fr;
        gap: 44px;
        padding: 34px 0 28px;
        align-items: start;
    }

    #jobhubJobsFooter .jobhub-jf__title {
        margin: 0 0 14px;
        font-size: 15px;
        letter-spacing: .2px;
        font-weight: 950;
        color: rgba(255, 255, 255, .92);
    }

    #jobhubJobsFooter .jobhub-jf__link {
        display: block;
        padding: 8px 0;
        text-decoration: none;
        color: rgba(255, 255, 255, .78);
        font-weight: 750;
        transition: transform .12s ease, color .12s ease;
    }

    #jobhubJobsFooter .jobhub-jf__link:hover {
        color: rgba(255, 255, 255, .95);
        transform: translateX(4px);
    }

    /* TAGS */
    #jobhubJobsFooter .jobhub-jf__tags {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    #jobhubJobsFooter .jobhub-jf__tag {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 12px;
        border-radius: 999px;
        text-decoration: none;
        font-weight: 900;
        font-size: 12.5px;
        background: rgba(255, 255, 255, .08);
        border: 1px solid rgba(255, 255, 255, .14);
        color: rgba(255, 255, 255, .88);
    }

    #jobhubJobsFooter .jobhub-jf__tag:hover {
        background: rgba(255, 255, 255, .12);
    }

    /* NEWSLETTER */
    #jobhubJobsFooter .jobhub-jf__mini {
        margin: 0 0 12px;
        font-size: 13px;
        line-height: 1.45;
        color: rgba(255, 255, 255, .74);
    }

    #jobhubJobsFooter .jobhub-jf__form {
        display: flex;
        gap: 10px;
        align-items: center;
        margin-top: 10px;
    }

    #jobhubJobsFooter .jobhub-jf__input {
        flex: 1;
        height: 44px;
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, .18);
        background: rgba(255, 255, 255, .08);
        color: rgba(255, 255, 255, .92);
        padding: 0 12px;
        outline: none;
    }

    #jobhubJobsFooter .jobhub-jf__input::placeholder {
        color: rgba(255, 255, 255, .55);
        font-weight: 700;
    }

    #jobhubJobsFooter .jobhub-jf__send {
        height: 44px;
        padding: 0 14px;
        border-radius: 12px;
        border: 0;
        cursor: pointer;
        font-weight: 950;
        color: #0A2A31;
        background: #C4D9E5;
        transition: transform .12s ease, filter .12s ease;
        white-space: nowrap;
    }

    #jobhubJobsFooter .jobhub-jf__send:hover {
        transform: translateY(-1px);
        filter: brightness(1.02);
    }

    #jobhubJobsFooter .jobhub-jf__social {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 14px;
    }

    #jobhubJobsFooter .jobhub-jf__socialLink {
        color: rgba(255, 255, 255, .78);
        text-decoration: none;
        font-weight: 850;
        border-bottom: 1px dashed rgba(255, 255, 255, .25);
        padding-bottom: 2px;
    }

    #jobhubJobsFooter .jobhub-jf__socialLink:hover {
        color: rgba(255, 255, 255, .95);
    }

    /* BOTTOM */
    #jobhubJobsFooter .jobhub-jf__bottom {
        padding-top: 18px;
        border-top: 1px solid rgba(255, 255, 255, .10);
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    #jobhubJobsFooter .jobhub-jf__copy {
        font-size: 13px;
        color: rgba(255, 255, 255, .70);
        font-weight: 750;
    }

    #jobhubJobsFooter .jobhub-jf__bottomLinks {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
    }

    #jobhubJobsFooter .jobhub-jf__bLink {
        font-size: 13px;
        color: rgba(255, 255, 255, .78);
        text-decoration: none;
        font-weight: 850;
    }

    #jobhubJobsFooter .jobhub-jf__bLink:hover {
        color: rgba(255, 255, 255, .95);
    }

    /* RESPONSIVO */
    @media (max-width: 1100px) {
        #jobhubJobsFooter .jobhub-jf__grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 768px) {
        #jobhubJobsFooter .jobhub-jf__wrap {
            padding: 0 22px;
        }

        #jobhubJobsFooter .jobhub-jf__top {
            flex-direction: column;
            align-items: flex-start;
        }

        #jobhubJobsFooter .jobhub-jf__cta {
            width: 100%;
            justify-content: flex-start;
        }

        #jobhubJobsFooter .jobhub-jf__btn {
            width: 100%;
        }

        #jobhubJobsFooter .jobhub-jf__grid {
            grid-template-columns: 1fr;
            gap: 22px;
        }

        #jobhubJobsFooter .jobhub-jf__form {
            flex-direction: column;
            align-items: stretch;
        }

        #jobhubJobsFooter .jobhub-jf__send {
            width: 100%;
        }
    }

    /* ===============================
   MODAL (Privacidade / Termos)
   =============================== */

    .jobhub-mdl {
        position: fixed;
        inset: 0;
        display: none;
        z-index: 9999;
    }

    .jobhub-mdl.is-open {
        display: block;
    }

    .jobhub-mdl__overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, .55);
        backdrop-filter: blur(4px);
    }

    .jobhub-mdl__dialog {
        position: relative;
        width: min(720px, calc(100% - 28px));
        margin: 6vh auto;
        background: #ffffff;
        color: #0A2A31;
        border-radius: 18px;
        box-shadow: 0 18px 60px rgba(0, 0, 0, .35);
        padding: 18px 18px 16px;
        outline: none;
    }

    .jobhub-mdl__close {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 38px;
        height: 38px;
        border: 0;
        border-radius: 12px;
        cursor: pointer;
        background: rgba(10, 42, 49, .08);
        font-size: 22px;
        line-height: 1;
        font-weight: 900;
        color: #0A2A31;
    }

    .jobhub-mdl__title {
        margin: 6px 44px 10px 6px;
        font-size: 18px;
        font-weight: 950;
    }

    .jobhub-mdl__body {
        padding: 8px 6px 6px;
        max-height: 70vh;
        overflow: auto;
        font-size: 14px;
        line-height: 1.6;
    }

    .jobhub-mdl__body p {
        margin: 0 0 10px;
    }

    .jobhub-mdl__body ul {
        margin: 8px 0 12px 18px;
    }

    .jobhub-mdl__body li {
        margin: 6px 0;
    }
</style>
<script>
    (function() {
        // ✅ Troque aqui:
        const JobHub_WA_PHONE = "5511999999999"; // EX: 5511999999999

        function buildWhatsAppLink(phone, message) {
            const msg = encodeURIComponent(message || "");
            return "https://wa.me/" + phone + (msg ? ("?text=" + msg) : "");
        }

        // --- WhatsApp links (WhatsApp / Contato / Fale com consultor) ---
        function setupWhatsAppLinks() {
            const els = document.querySelectorAll(".js-jobhub-wa");
            els.forEach(el => {
                const msg = el.getAttribute("data-wa-message") || "Olá! Vim pelo site e gostaria de atendimento.";
                el.setAttribute("href", buildWhatsAppLink(JobHub_WA_PHONE, msg));
                el.setAttribute("target", "_blank");
                el.setAttribute("rel", "noopener");
            });
        }

        // --- Modal (Privacidade / Termos) ---
        const modal = document.getElementById("jobhubModal");
        const modalTitle = document.getElementById("jobhubModalTitle");
        const modalBody = document.getElementById("jobhubModalBody");
        const dialog = modal ? modal.querySelector(".jobhub-mdl__dialog") : null;

        function openModal(kind) {
            if (!modal) return;

            const map = {
                privacy: {
                    title: "Política de Privacidade",
                    tpl: "jobhubTplPrivacy"
                },
                terms: {
                    title: "Termos de Uso",
                    tpl: "jobhubTplTerms"
                }
            };

            const conf = map[kind];
            if (!conf) return;

            const tpl = document.getElementById(conf.tpl);
            modalTitle.textContent = conf.title;
            modalBody.innerHTML = tpl ? tpl.innerHTML : "<p>Conteúdo não encontrado.</p>";

            modal.classList.add("is-open");
            modal.setAttribute("aria-hidden", "false");
            document.documentElement.style.overflow = "hidden";

            // foco no modal
            setTimeout(() => dialog && dialog.focus(), 0);
        }

        function closeModal() {
            if (!modal) return;
            modal.classList.remove("is-open");
            modal.setAttribute("aria-hidden", "true");
            document.documentElement.style.overflow = "";
        }

        function setupModalTriggers() {
            document.addEventListener("click", function(e) {
                const trigger = e.target.closest("[data-jobhub-modal]");
                if (trigger) {
                    e.preventDefault();
                    openModal(trigger.getAttribute("data-jobhub-modal"));
                    return;
                }

                if (e.target.closest("[data-jobhub-close]")) {
                    e.preventDefault();
                    closeModal();
                    return;
                }
            });

            document.addEventListener("keydown", function(e) {
                if (e.key === "Escape" && modal && modal.classList.contains("is-open")) {
                    closeModal();
                }
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            setupWhatsAppLinks();
            setupModalTriggers();
        });
    })();
</script>