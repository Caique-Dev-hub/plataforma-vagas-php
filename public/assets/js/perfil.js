// ./js/perfil-ui.js
(() => {
    "use strict";

    const VIEW = {
        GERAL: "geral",
        EXPERIENCIAS: "experiencias",
        FORMACOES: "formacoes",
        VAGAS: "vagas",
    };

    const $ = (s) => document.querySelector(s);
    const $$ = (s) => Array.from(document.querySelectorAll(s));

    function ensureHiddenClass() {
        if ($("#pf-hidden-style")) return;
        const style = document.createElement("style");
        style.id = "pf-hidden-style";
        style.textContent = `.is-hidden{display:none !important;}`;
        document.head.appendChild(style);
    }

    function show(el) { el && el.classList.remove("is-hidden"); }
    function hide(el) { el && el.classList.add("is-hidden"); }

    function openModal(id) {
        const m = document.getElementById(id);
        if (!m) return;
        m.classList.add("is-open");
        m.setAttribute("aria-hidden", "false");
        document.body.style.overflow = "hidden";
    }

    function closeModal(id) {
        const m = document.getElementById(id);
        if (!m) return;
        m.classList.remove("is-open");
        m.setAttribute("aria-hidden", "true");
        document.body.style.overflow = "";
    }

    function initModalGlobalListeners() {
        document.addEventListener("click", (ev) => {
            const t = ev.target;
            if (!(t instanceof HTMLElement)) return;
            const trigger = t.closest("[data-close-modal]");
            if (!trigger) return;
            ev.preventDefault();
            closeModal(trigger.getAttribute("data-close-modal"));
        });

        document.addEventListener("keydown", (ev) => {
            if (ev.key !== "Escape") return;
            $$(".pf-modal.is-open").forEach((m) => {
                m.classList.remove("is-open");
                m.setAttribute("aria-hidden", "true");
            });
            document.body.style.overflow = "";
        });
    }

    function applyView(mode) {
        const hero = $(".pf-hero");
        const exp = $("#blocoExperiencias");
        const form = $("#blocoFormacoes");
        const vagas = $("#vagasRelacionadas");

        show(hero);

        if (mode === VIEW.EXPERIENCIAS) {
            show(exp); hide(form); hide(vagas);
        } else if (mode === VIEW.FORMACOES) {
            hide(exp); show(form); hide(vagas);
        } else if (mode === VIEW.VAGAS) {
            hide(exp); hide(form); show(vagas);
        } else {
            show(exp); show(form); show(vagas);
        }
    }

    function modeFromTab(tab) {
        const text = (tab.textContent || "").toLowerCase();
        if (text.includes("experi")) return VIEW.EXPERIENCIAS;
        if (text.includes("forma")) return VIEW.FORMACOES;
        if (text.includes("vaga") || text.includes("recomend")) return VIEW.VAGAS;
        return VIEW.GERAL;
    }

    function modeFromSidebar(link) {
        const text = (link.textContent || "").toLowerCase();
        if (text.includes("minhas experiências")) return VIEW.EXPERIENCIAS;
        if (text.includes("minha formação")) return VIEW.FORMACOES;
        if (text.includes("alertas de vagas") || text.includes("vagas")) return VIEW.VAGAS;
        return VIEW.GERAL;
    }

    function setActive(mode) {
        $$(".pf-tab").forEach((t) => {
            t.classList.remove("active");
            t.style.cursor = "pointer";
            if (modeFromTab(t) === mode) t.classList.add("active");
        });

        $$(".pf-sidebar-link").forEach((l) => {
            l.classList.remove("active");
            l.style.cursor = "pointer";
            if (modeFromSidebar(l) === mode) l.classList.add("active");
        });
    }

    function initViews() {
        $$(".pf-tab").forEach((tab) => {
            tab.style.cursor = "pointer";
            tab.addEventListener("click", (e) => {
                e.preventDefault();
                const mode = modeFromTab(tab);
                applyView(mode);
                setActive(mode);
            });
        });

        $$(".pf-sidebar-link").forEach((link) => {
            link.style.cursor = "pointer";
            link.addEventListener("click", (e) => {
                e.preventDefault();
                const mode = modeFromSidebar(link);
                applyView(mode);
                setActive(mode);

                const hero = $(".pf-hero");
                if (hero) {
                    const offset = window.scrollY + hero.getBoundingClientRect().top - 80;
                    window.scrollTo({ top: offset, behavior: "smooth" });
                }
            });
        });

        applyView(VIEW.GERAL);
        setActive(VIEW.GERAL);
    }

    function setupTimelineAnimations(containerId) {
        const container = document.getElementById(containerId);
        if (!container) return;

        const io = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("t-item-animated");
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });

        const observeAll = () => {
            container.querySelectorAll(".t-item").forEach((el) => io.observe(el));
        };

        const mo = new MutationObserver(observeAll);
        mo.observe(container, { childList: true, subtree: true });

        observeAll();
    }

    function cloneTimeline(origSel, destSel, emptySel) {
        const origem = $(origSel);
        const destino = $(destSel);
        const empty = $(emptySel);
        if (!destino) return;

        destino.innerHTML = "";

        const items = origem ? Array.from(origem.children).filter((n) => n.classList?.contains("t-item")) : [];
        if (!items.length) {
            if (empty) empty.style.display = "block";
            return;
        }
        if (empty) empty.style.display = "none";

        items.forEach((item) => {
            const clone = item.cloneNode(true);
            clone.classList.add("t-item-animated");
            destino.appendChild(clone);
        });
    }

    function fillModalCurriculo() {
        const nome = ($("#nomeUsuario")?.textContent || "Candidato").trim();
        const email = ($("#emailUsuario")?.textContent || "—").trim();

        $("#cvNome") && ($("#cvNome").textContent = nome);
        $("#cvEmail") && ($("#cvEmail").textContent = email);

        cloneTimeline("#listaExperiencias", "#cvExperiencias", "#cvExperienciasEmpty");
        cloneTimeline("#listaFormacoes", "#cvFormacoes", "#cvFormacoesEmpty");
    }

    function initCurriculoModal() {
        const btnCurriculo = document.querySelector(".pf-sidebar-actions .pf-btn-ghost");
        btnCurriculo?.addEventListener("click", (e) => {
            e.preventDefault();
            fillModalCurriculo();
            openModal("modalCurriculo");
        });
    }

    document.addEventListener("DOMContentLoaded", () => {
        ensureHiddenClass();
        initModalGlobalListeners();
        initViews();
        initCurriculoModal();

        setupTimelineAnimations("listaExperiencias");
        setupTimelineAnimations("listaFormacoes");
    });
})();
// ==============================
// VAGAS RECOMENDADAS (perfil)
// - mostra 6
// - botão "Ver mais"
// - "Ver vaga" igual pesquisar
// ==============================
(function VAGAS_RECO() {
    const API_BASE = window.JobHub_API_BASE || "";
    const ROUTES = window.JobHub_ROUTES || {};
    const PAGE_SIZE = 6;

    // ✅ troque se seus ids forem outros
    const cardsEl = document.querySelector("#recoCards");
    const btnMoreEl = document.querySelector("#recoMore");

    if (!cardsEl) return;

    const esc = (s) => String(s ?? "")
        .replaceAll("&", "&amp;")
        .replaceAll("<", "&lt;")
        .replaceAll(">", "&gt;")
        .replaceAll('"', "&quot;")
        .replaceAll("'", "&#039;");

    const safeText = (v, fb = "—") => {
        const s = String(v ?? "").trim();
        return s ? s : fb;
    };

    function getVagaId(v) {
        return v?.idVaga ?? v?.id ?? v?.vagaId ?? v?.id_vaga ?? null;
    }

    // 🔥 mesma ideia do pesquisar
    function resolveTemplate(template, params) {
        let out = String(template || "");
        for (const [k, val] of Object.entries(params || {})) {
            out = out.replaceAll(`{${k}}`, String(val));
        }
        return out;
    }

    function cityUf(v) {
        const c = String(v?.localizacao?.cidade || v?.cidade || "").trim();
        const u = String(v?.localizacao?.estado || v?.estado || "").trim();
        if (c && u) return `${c}/${u}`;
        return c || u || "—";
    }

    function getSalarioTexto(v) {
        const brl = new Intl.NumberFormat("pt-BR", { style: "currency", currency: "BRL" });
        const salarioRaw = v?.salarioValor ?? v?.salario ?? v?.remuneracao ?? v?.valorSalario ?? null;
        const salarioValor = Number(salarioRaw);
        const salarioMin = Number(v?.salarioMin ?? v?.faixaSalarialMin ?? v?.valorMin ?? null);
        const salarioMax = Number(v?.salarioMax ?? v?.faixaSalarialMax ?? v?.valorMax ?? null);
        const salarioTipo = String(v?.salarioTipoDTO || v?.salarioTipo || "").trim().toUpperCase();

        const hasMin = Number.isFinite(salarioMin) && salarioMin > 0;
        const hasMax = Number.isFinite(salarioMax) && salarioMax > 0;
        const hasVal = Number.isFinite(salarioValor) && salarioValor > 0;

        if (hasMin && hasMax && salarioMin !== salarioMax) return `De ${brl.format(salarioMin)} a ${brl.format(salarioMax)}`;
        if (hasMax) return `Até ${brl.format(salarioMax)}`;
        if (hasMin) return brl.format(salarioMin);
        if (hasVal) return brl.format(salarioValor);
        if (salarioTipo.includes("COMBIN")) return "Salário a combinar";
        return "Salário a combinar";
    }

    // ✅ abre igual pesquisar:
    // 1) se existir openDrawer (perfil usa drawer), chama
    // 2) senão navega pra VAGA_VIEW (rota)
    function abrirVaga(vagaObjOuId) {
        const id = typeof vagaObjOuId === "object" ? getVagaId(vagaObjOuId) : vagaObjOuId;
        if (!id) return;

        // (A) se teu perfil já tem drawer e função openDrawer disponível:
        if (typeof window.openDrawer === "function" && typeof vagaObjOuId === "object") {
            window.openDrawer(vagaObjOuId);
            return;
        }

        // (B) fallback: rota do front
        const tpl = ROUTES.VAGA_VIEW || ((window.URL_BASE || "/") + "vaga/{id}");
        const url = resolveTemplate(tpl, { id });
        window.location.href = url;
    }

    // ✅ delegação de clique (não usa onclick)
    document.addEventListener("click", (e) => {
        const btn = e.target.closest("[data-ver-vaga]");
        if (!btn) return;
        const id = btn.getAttribute("data-id");
        if (!id) return;
        abrirVaga(id);
    });

    // ==============================
    // Render
    // ==============================
    function renderCards(list, page) {
        const slice = list.slice(0, page * PAGE_SIZE);

        cardsEl.innerHTML = slice.map(v => {
            const id = getVagaId(v);
            const titulo = safeText(v?.cargo || v?.titulo || "Vaga");
            const empresa = safeText(v?.empresaDTO?.empresaNome || v?.empresaNome || v?.empresa || "Empresa");
            const loc = cityUf(v);
            const salario = getSalarioTexto(v);

            return `
        <article class="card" data-vaga-card data-id="${esc(id)}" style="cursor:pointer;">
          <div class="cardHead">
            <div style="min-width:0;">
              <h3 class="cardTitle">${esc(titulo)}</h3>
              <p class="cardSub">
                <span style="font-weight:900;">${esc(empresa)}</span>
                <span class="dot2"></span>
                <span>${esc(loc)}</span>
              </p>
            </div>
          </div>

          <div class="cardBody">
            <div class="tags">
              <span class="tag blue"><i class="fa-solid fa-location-dot"></i>${esc(loc)}</span>
              <span class="tag green"><i class="fa-solid fa-sack-dollar"></i>${esc(salario)}</span>
              ${v?.contratacaoUrgente ? `<span class="tag red"><i class="fa-solid fa-bolt"></i>Urgente</span>` : ""}
            </div>
            <div class="excerpt">${esc(String(v?.descricao || v?.complemento || "").slice(0, 140) || "Clique para ver os detalhes desta vaga.")}</div>
          </div>

          <div class="cardFoot">
            <div class="metaSmall"><span><i class="fa-solid fa-id-card-clip"></i> #${esc(id)}</span></div>

            <button class="btn primary" type="button" data-ver-vaga data-id="${esc(id)}"
              style="height:40px;padding:0 12px;border-radius:999px;border:0;cursor:pointer;">
              <i class="fa-solid fa-eye"></i> Ver vaga
            </button>
          </div>
        </article>
      `;
        }).join("");

        // clique no card todo
        cardsEl.querySelectorAll("[data-vaga-card]").forEach(card => {
            card.addEventListener("click", (e) => {
                // se clicou no botão já vai pelo listener global
                if (e.target.closest("[data-ver-vaga]")) return;
                const id = card.getAttribute("data-id");
                if (!id) return;
                abrirVaga(id);
            });
        });

        // botão ver mais
        if (btnMoreEl) {
            const hasMore = list.length > slice.length;
            btnMoreEl.style.display = hasMore ? "inline-flex" : "none";
            btnMoreEl.textContent = hasMore ? "Ver mais" : "";
        }
    }

    async function fetchVagasRecomendadas() {
        // ✅ aqui você coloca o endpoint real do perfil (recomendadas)
        // Exemplo (ajuste):
        // return fetch(`${API_BASE}/candidatos/${id}/vagas/recomendadas`).then(r=>r.json());

        // fallback: usa o mesmo do pesquisar (vagas/me) só pra não quebrar
        const resp = await fetch(`${API_BASE}/vagas/list`);
        const data = await resp.json().catch(() => []);
        return Array.isArray(data) ? data : (data?.vagas || data?.content || []);
    }

    let page = 1;
    let list = [];

    async function boot() {
        try {
            list = await fetchVagasRecomendadas();
            // normaliza id
            list = (Array.isArray(list) ? list : []).filter(v => !!getVagaId(v));
            renderCards(list, page);

            if (btnMoreEl) {
                btnMoreEl.className = "more";
                btnMoreEl.innerHTML = `<i class="fa-solid fa-plus"></i> Ver mais`;
                btnMoreEl.addEventListener("click", () => {
                    page += 1;
                    renderCards(list, page);
                });
            }
        } catch (e) {
            console.error("[RECO VAGAS]", e);
            cardsEl.innerHTML = `<div class="empty" style="display:block;">Falha ao carregar vagas recomendadas.</div>`;
            if (btnMoreEl) btnMoreEl.style.display = "none";
        }
    }

    boot();
})();
