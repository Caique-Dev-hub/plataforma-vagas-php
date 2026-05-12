(() => {
    "use strict";

    const API_BASE = window.JobHub_API_BASE || "";
    const base = API_BASE.replace(/\/+$/, "");

    const $ = (id) => document.getElementById(id);

    const drawer = $("vagaDrawer");
    const overlay = $("vagaDrawerOverlay");
    const btnClose = $("vagaDrawerClose");

    const elTitulo = $("vagaDrawerTitulo");
    const elSub = $("vagaDrawerSub");
    const elBody = $("vagaDrawerBody");

    const btnCandidatar = $("vagaDrawerCandidatar");
    const btnSalvar = $("vagaDrawerSalvar");

    if (!drawer || !overlay || !btnClose || !elTitulo || !elSub || !elBody) return;

    function getToken() {
        return localStorage.getItem("token") || localStorage.getItem("accessToken") || "";
    }

    function openDrawer() {
        drawer.classList.add("is-open");
        drawer.setAttribute("aria-hidden", "false");
        document.documentElement.style.overflow = "hidden";
    }

    function closeDrawer() {
        drawer.classList.remove("is-open");
        drawer.setAttribute("aria-hidden", "true");
        document.documentElement.style.overflow = "";
    }

    overlay.addEventListener("click", closeDrawer);
    btnClose.addEventListener("click", closeDrawer);
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") closeDrawer();
    });

    function getRecoVagaFallback(idVaga) {
        try {
            if (typeof window.__JobHub_RECO_GET_VAGA__ === "function") {
                return window.__JobHub_RECO_GET_VAGA__(Number(idVaga));
            }
        } catch (_) {}
        return null;
    }

    async function fetchVagaDetalhe(idVaga) {
        const token = getToken();
        const endpoints = [
            `${base}/vagas/${idVaga}`,
            `${base}/vagas/me/${idVaga}`,
            `${base}/vagas/detalhe/${idVaga}`,
        ];

        let lastErr = null;

        for (const url of endpoints) {
            try {
                const resp = await fetch(url, {
                    method: "GET",
                    headers: {
                        ...(token ? { Authorization: `Bearer ${token}` } : {}),
                        Accept: "application/json",
                    },
                });

                const txt = await resp.text().catch(() => "");

                if (resp.status === 404) continue;
                if (!resp.ok) {
                    lastErr = new Error(txt || `Falha ao buscar vaga (${resp.status})`);
                    continue;
                }

                try { return txt ? JSON.parse(txt) : {}; } catch { return txt; }
            } catch (e) {
                lastErr = e;
            }
        }

        const fallback = getRecoVagaFallback(idVaga);
        if (fallback) return fallback;

        throw lastErr || new Error("Não consegui carregar os detalhes desta vaga.");
    }

    window.__JobHub_FETCH_VAGA_DETALHE__ = fetchVagaDetalhe;

    function renderVaga(v) {
        // Se vier string, só mostra
        if (typeof v === "string") {
            elTitulo.textContent = "Detalhe da vaga";
            elSub.textContent = "";
            elBody.innerHTML = `<div class="vaga-drawer-text">${escapeHtml(v)}</div>`;
            return;
        }

        // 🔥 Ajuste os campos conforme seu DTO real
        const titulo = v.titulo || v.cargo || v.nome || `Vaga #${v.idVaga || ""}`;
        const empresa = v.empresa?.nome || v.empresa || v.nomeEmpresa || "—";
        const cidade = v.cidade || v.localidade || v.endereco?.cidade || "";
        const modalidade = v.modalidade || v.tipoTrabalho || v.regime || "";

        const descricao = v.descricao || v.resumo || v.atividades || "";
        const requisitos = v.requisitos || v.skills || v.exigencias || "";
        const beneficios = v.beneficios || v.beneficio || "";

        elTitulo.textContent = titulo;
        elSub.textContent = [empresa, cidade, modalidade].filter(Boolean).join(" • ") || "—";

        const tags = []
            .concat(v.nivel ? [`Nível: ${v.nivel}`] : [])
            .concat(v.tipoContrato ? [v.tipoContrato] : [])
            .concat(v.salario ? [`Salário: ${v.salario}`] : [])
            .concat(Array.isArray(v.tags) ? v.tags : []);

        elBody.innerHTML = `
      ${tags.length ? `<div class="vaga-drawer-tags">${tags.map(t => `<span class="vaga-drawer-tag">${escapeHtml(String(t))}</span>`).join("")}</div>` : ""}

      <div class="vaga-drawer-section">
        <h3>Descrição</h3>
        <div class="vaga-drawer-text">${escapeHtml(descricao || "—")}</div>
      </div>

      <div class="vaga-drawer-section">
        <h3>Requisitos</h3>
        <div class="vaga-drawer-text">${escapeHtml(requisitos || "—")}</div>
      </div>

      <div class="vaga-drawer-section">
        <h3>Benefícios</h3>
        <div class="vaga-drawer-text">${escapeHtml(beneficios || "—")}</div>
      </div>
    `;

        // exemplo: botões do footer usando o id
        const id = v.idVaga || v.id || "";
        btnCandidatar.onclick = () => console.log("Candidatar na vaga", id);
        btnSalvar.onclick = () => console.log("Salvar vaga", id);
    }

    function escapeHtml(str) {
        return String(str || "")
            .replaceAll("&", "&amp;")
            .replaceAll("<", "&lt;")
            .replaceAll(">", "&gt;")
            .replaceAll('"', "&quot;")
            .replaceAll("'", "&#039;");
    }

    // ✅ ESTE É O CARA DO SEU BOTÃO "Ver vaga"
    window.JobHub_openVagaDrawer = async function (obj) {
        const idVaga = (obj && typeof obj === "object") ? (obj.idVaga || obj.id) : obj;
        if (!idVaga) return;

        openDrawer();
        elTitulo.textContent = "Carregando…";
        elSub.textContent = "—";
        elBody.innerHTML = `<div class="vaga-drawer-skeleton">Carregando detalhes da vaga…</div>`;

        try {
            const detalhe = await fetchVagaDetalhe(idVaga);
            renderVaga(detalhe);
        } catch (e) {
            elTitulo.textContent = "Falha ao carregar";
            elSub.textContent = "";
            elBody.innerHTML = `<div class="vaga-drawer-skeleton">${escapeHtml(e?.message || "Erro desconhecido")}</div>`;
            console.error("[VAGA DRAWER]", e);
        }
    };

})();

(() => {
    "use strict";

    const API_BASE = window.JobHub_API_BASE || "";

    const $ = (id) => document.getElementById(id);
    const $$ = (s) => Array.from(document.querySelectorAll(s));

    const lista = $("listaVagasRelacionadas");
    const empty = $("jobsEmpty");
    const pills = $$(".jobs-filter-pill");
    const sub = $("jobsSub");

    if (!lista || !empty) return;

    // =========================
    // Utils
    // =========================
    const norm = (s) =>
        String(s || "")
            .toLowerCase()
            .normalize("NFD")
            .replace(/[\u0300-\u036f]/g, "")
            .trim();

    const tokenize = (s) =>
        norm(s)
            .replace(/[^\p{L}\p{N}\s-]/gu, " ")
            .split(/\s+/)
            .map((t) => t.trim())
            .filter((t) => t.length >= 3);

    const unique = (arr) => Array.from(new Set(arr));

    function getToken() {
        return localStorage.getItem("token") || localStorage.getItem("accessToken") || "";
    }

    // =========================
    // Mapping vaga (aceita payload direto ou wrapper { vaga, vagaDTO, job... })
    // =========================
    function isObj(v) {
        return !!v && typeof v === "object" && !Array.isArray(v);
    }

    function unwrapVaga(raw) {
        const candidates = [
            raw,
            raw?.vaga,
            raw?.vagaDTO,
            raw?.job,
            raw?.jobDTO,
            raw?.item,
            raw?.item?.vaga,
            raw?.item?.vagaDTO,
            raw?.data,
            raw?.data?.vaga,
            raw?.content,
            raw?.content?.vaga,
            raw?.resultado,
            raw?.resultado?.vaga,
            raw?.resultado?.vagaDTO,
            raw?.result,
            raw?.result?.vaga,
            raw?.result?.vagaDTO,
            raw?.detalhe,
            raw?.detalhe?.vaga,
            raw?.vagaResponse,
            raw?.vagaResumo,
            raw?.vagaDetalhe,
        ];

        for (const cand of candidates) {
            if (!isObj(cand)) continue;
            if (
                cand?.idVaga != null ||
                cand?.id != null ||
                cand?.vagaId != null ||
                cand?.cargo ||
                cand?.titulo ||
                cand?.nomeVaga ||
                cand?.empresaDTO ||
                cand?.empresaNome ||
                cand?.localizacao ||
                cand?.localizacaoDTO
            ) {
                return cand;
            }
        }

        return isObj(raw) ? raw : {};
    }

    function getApiMatchValue(raw) {
        const values = [
            raw?.score,
            raw?.match,
            raw?.matchPercent,
            raw?.match_percent,
            raw?.compatibilidade,
            raw?.compatibility,
            raw?.percentual,
            raw?.percent,
            raw?.fitScore,
            raw?.fit_score,
            raw?.vaga?.score,
            raw?.vagaDTO?.score,
        ];

        for (const value of values) {
            const n = Number(String(value ?? "").replace(",", "."));
            if (Number.isFinite(n) && n > 0) return Math.max(0, Math.min(100, Math.round(n)));
        }
        return null;
    }

    function getEmpresaObj(v) {
        const vaga = unwrapVaga(v);
        return vaga?.empresaDTO || vaga?.empresa || {};
    }

    function getLocalObj(v) {
        const vaga = unwrapVaga(v);
        return vaga?.localizacao || vaga?.localizacaoDTO || vaga?.endereco || {};
    }

    function getVagaId(v) {
        const vaga = unwrapVaga(v);
        return vaga?.idVaga ?? vaga?.id ?? vaga?.vagaId ?? vaga?.id_vaga ?? "";
    }

    function getVagaTitulo(v) {
        const vaga = unwrapVaga(v);
        return (
            vaga?.cargo ||
            vaga?.titulo ||
            vaga?.nomeVaga ||
            vaga?.nome ||
            vaga?.nomeCargo ||
            vaga?.cargoNome ||
            vaga?.cargoDescricao ||
            vaga?.descricaoCargo ||
            "Vaga"
        );
    }

    function getVagaEmpresa(v) {
        const vaga = unwrapVaga(v);
        const empresa = getEmpresaObj(vaga);
        if (typeof empresa === "string") return empresa || vaga?.nomeEmpresa || vaga?.empresaNome || vaga?.razaoSocial || "—";
        return (
            empresa?.empresaNome ||
            empresa?.nome ||
            empresa?.razaoSocial ||
            empresa?.nomeFantasia ||
            vaga?.nomeEmpresa ||
            vaga?.empresaNome ||
            vaga?.razaoSocial ||
            vaga?.nomeFantasia ||
            "—"
        );
    }

    function getVagaCidade(v) {
        const vaga = unwrapVaga(v);
        const loc = getLocalObj(vaga);
        return loc?.cidade || loc?.municipio || vaga?.cidade || vaga?.municipio || vaga?.cidadeNome || "—";
    }

    function getVagaUF(v) {
        const vaga = unwrapVaga(v);
        const loc = getLocalObj(vaga);
        return loc?.estado || loc?.uf || loc?.estadoSigla || vaga?.estado || vaga?.uf || vaga?.estadoSigla || "";
    }

    function getVagaModalidadeRaw(v) {
        const vaga = unwrapVaga(v);
        return vaga?.modalidadeVagaDTO || vaga?.modalidade || vaga?.tipoTrabalho || vaga?.modelo || vaga?.regime || "";
    }

    function getVagaContrato(v) {
        const vaga = unwrapVaga(v);
        return vaga?.tipoContrato || vaga?.tipoContratoDTO || vaga?.contrato || vaga?.regimeContrato || "";
    }

    function getVagaDescricao(v) {
        const vaga = unwrapVaga(v);
        return vaga?.descricao || vaga?.descricaoVaga || vaga?.resumo || vaga?.sobre || vaga?.observacoes || "";
    }

    function isPlaceholderValue(v) {
        const s = String(v ?? "").trim();
        return !s || s === "—" || s === "Vaga";
    }

    function vagaNeedsHydration(v) {
        if (!getVagaId(v)) return false;
        return (
            isPlaceholderValue(getVagaTitulo(v)) ||
            isPlaceholderValue(getVagaEmpresa(v)) ||
            isPlaceholderValue(getVagaCidade(v))
        );
    }

    async function hydrateVagaIfNeeded(v) {
        const id = getVagaId(v);
        if (!id || !vagaNeedsHydration(v)) return v;

        try {
            const fetchDetalhe = window.__JobHub_FETCH_VAGA_DETALHE__;
            if (typeof fetchDetalhe !== "function") return v;

            const rawDetalhe = await fetchDetalhe(id);
            const detalhe = unwrapVaga(rawDetalhe);
            if (!isObj(detalhe) || !Object.keys(detalhe).length) return v;

            return {
                ...v,
                ...detalhe,
                idVaga: detalhe?.idVaga ?? detalhe?.id ?? detalhe?.vagaId ?? v?.idVaga ?? v?.id ?? v?.vagaId ?? "",
            };
        } catch (err) {
            console.warn("[PERFIL VAGAS] hidratação da vaga falhou", id, err);
            return v;
        }
    }

    function getModalidadeNorm(v) {
        return norm(getVagaModalidadeRaw(v));
    }

    function getVagaResumo(v) {
        const vaga = unwrapVaga(v);
        const parts = [
            getVagaTitulo(vaga),
            vaga?.descricao,
            vaga?.complemento,
            vaga?.observacoes,
            vaga?.jornada,
            vaga?.tipoContrato,
            vaga?.categoriaVagaDTO,
            Array.isArray(vaga?.requisitosObrigatorios) ? vaga.requisitosObrigatorios.join(" ") : "",
            Array.isArray(vaga?.requisitosDesejaveis) ? vaga.requisitosDesejaveis.join(" ") : "",
            Array.isArray(vaga?.responsabilidades) ? vaga.responsabilidades.join(" ") : "",
            Array.isArray(vaga?.beneficios) ? vaga.beneficios.join(" ") : "",
            Array.isArray(vaga?.idiomas)
                ? vaga.idiomas
                    .map((x) => `${x?.idioma || ""} ${x?.nivelIdioma || ""} ${x?.obrigatorio ? "obrigatorio" : ""}`)
                    .join(" ")
                : "",
            Array.isArray(vaga?.cnhs) ? vaga.cnhs.map((x) => `cnh ${x?.tipoCnh || ""}`).join(" ") : "",
            Array.isArray(vaga?.formacao)
                ? vaga.formacao.map((f) => `${f?.escolaridade || ""} ${f?.experienciaDescricao || ""}`).join(" ")
                : "",
            Array.isArray(vaga?.requisitos)
                ? vaga.requisitos
                    .map((r) => {
                        const bits = [];
                        if (r?.habilitacao) bits.push("habilitacao cnh");
                        if (r?.veiculoProprio) bits.push("veiculo proprio");
                        if (r?.viajar) bits.push("viajar");
                        if (r?.mudarResidencia) bits.push("mudar residencia");
                        if (r?.observacao) bits.push(r.observacao);
                        return bits.join(" ");
                    })
                    .join(" ")
                : "",
        ];
        return parts.filter(Boolean).join(" ");
    }

    // =========================
    // Fetch vagas (fallback)
    // =========================
    async function fetchVagas() {
        const token = getToken();
        if (!token) throw new Error("Sem token no localStorage (token).");

        const perfil = window.__PERFIL_ME__?.candidato || window.__PERFIL_ME__ || {};
        const candidatoId = perfil?.idCandidato || perfil?.candidatoId || localStorage.getItem("candidato_id") || "";
        const endpoints = [
            ...(candidatoId ? [`${API_BASE}/vagas/candidatos/${candidatoId}/match`] : []),
            `${API_BASE}/vagas/list`
        ];

        let lastErr = null;

        for (const url of endpoints) {
            try {
                const resp = await fetch(url, {
                    method: "GET",
                    headers: { Authorization: `Bearer ${token}` },
                });

                if (resp.status === 404) continue;

                if (!resp.ok) {
                    const t = await resp.text().catch(() => "");
                    throw new Error(`Erro ${resp.status}: ${t || "sem detalhes"}`);
                }

                const data = await resp.json().catch(() => []);
                if (Array.isArray(data)) return data;
                if (Array.isArray(data?.content)) return data.content;
                if (Array.isArray(data?.items)) return data.items;
                if (Array.isArray(data?.vagas)) return data.vagas;
                return [];
            } catch (e) {
                lastErr = e;
            }
        }

        throw lastErr || new Error("Nenhum endpoint de vagas funcionou.");
    }

    // =========================
    // Perfil loaded
    // =========================
    function waitPerfilLoaded(timeoutMs = 6500) {
        if (window.__PERFIL_ME__?.candidato) return Promise.resolve(window.__PERFIL_ME__);

        return new Promise((resolve) => {
            let done = false;

            const t = setTimeout(() => {
                if (done) return;
                done = true;
                window.removeEventListener("perfil:loaded", on);
                resolve(window.__PERFIL_ME__ || null);
            }, timeoutMs);

            function on(ev) {
                if (done) return;
                done = true;
                clearTimeout(t);
                window.removeEventListener("perfil:loaded", on);
                resolve(ev?.detail || window.__PERFIL_ME__ || null);
            }

            window.addEventListener("perfil:loaded", on, { once: true });
        });
    }

    // =========================
    // Match: experiência + formação
    // =========================
    const SYN = {
        desenvolvedor: ["developer", "engineer", "programador"],
        front: ["frontend", "front-end", "front end", "ui", "web"],
        frontend: ["front-end", "front end", "ui", "web", "javascript", "js", "html", "css", "react"],
        interfaces: ["ui", "ux", "layout", "design"],
        web: ["frontend", "site", "landing", "html", "css", "javascript", "js"],
        design: ["ui", "ux", "figma", "layout"],
        javascript: ["js", "ecmascript"],
        backend: ["back-end", "back end", "api", "apis", "microservicos", "microservices"],
        api: ["apis", "rest", "microservicos", "microservices"],
        microservicos: ["microservices", "api", "apis"],
    };

    function expandTokens(tokens) {
        const out = new Set(tokens);
        tokens.forEach((t) => (SYN[t] || []).forEach((s) => out.add(norm(s))));
        return Array.from(out);
    }

    function extrairPerfilTokens(perfil) {
        const c = perfil?.candidato || perfil || {};
        const exp = Array.isArray(c?.experiencias) ? c.experiencias : [];
        const form = Array.isArray(c?.formacoes) ? c.formacoes : [];

        const cargos = unique(exp.flatMap((e) => tokenize(e?.cargo)));
        const descExp = unique(exp.flatMap((e) => tokenize(e?.descricao)));
        const cursos = unique(form.flatMap((f) => tokenize(f?.curso)));

        const cidade = norm(c?.cidade || "");
        const uf = norm(c?.estado || "");

        const core = expandTokens(unique([...cargos, ...cursos])); // ✅ só experiência + formação
        const ctx = expandTokens(unique([...descExp]));            // ✅ descrição da experiência ajuda

        return { core, ctx, cidade, uf, expCount: exp.length, formCount: form.length };
    }

    function scoreByTokens(vagaTokens, tokens, weightPerHit, cap) {
        if (!tokens.length) return 0;
        const set = new Set(vagaTokens);
        let hits = 0;
        for (const t of tokens) if (set.has(t)) hits++;
        return Math.min(cap, hits * weightPerHit);
    }

    function calcMatch(v, perfilTokens) {
        let score = 0;

        const texto = getVagaResumo(v);
        const vagaTokens = tokenize(texto);

        // Core forte
        score += scoreByTokens(vagaTokens, perfilTokens.core, 10, 60);

        // Contexto médio
        score += scoreByTokens(vagaTokens, perfilTokens.ctx, 4, 20);

        // Local (leve)
        const cidadeV = norm(getVagaCidade(v));
        const ufV = norm(getVagaUF(v));
        if (perfilTokens.cidade && cidadeV && cidadeV === perfilTokens.cidade) score += 8;
        if (perfilTokens.uf && ufV && ufV === perfilTokens.uf) score += 4;

        // Boost título front/web/ui
        const t = norm(getVagaTitulo(v));
        if (t.includes("front") || t.includes("frontend") || t.includes("web") || t.includes("ui")) score += 8;

        // Penaliza senioridade
        if (t.includes("senior") || t.includes("sênior") || t.includes("especialista")) score -= 20;
        if (t.includes("pleno")) score -= 10;
        if (t.includes("junior") || t.includes("júnior") || t.includes("estagio") || t.includes("estágio")) score += 8;

        score = Math.max(0, Math.min(100, Math.round(score)));
        return score;
    }

    // =========================
    // Estado: 6 + Veja mais
    // =========================
    const STATE = {
        all: [], // [{ v, match, modalidadeNorm }]
        filter: "todas",
        page: 1,
        pageSize: 6,
    };

    window.__JobHub_RECO_GET_VAGA__ = function (idVaga) {
        const id = String(idVaga ?? "").trim();
        if (!id) return null;
        const hit = STATE.all.find(({ v }) => String(getVagaId(v) || "") === id);
        return hit?.v || null;
    };

    function ensureVejaMais() {
        let wrap = document.getElementById("jobsMoreWrap");
        if (wrap) return wrap;

        wrap = document.createElement("div");
        wrap.id = "jobsMoreWrap";
        wrap.style.marginTop = "10px";
        wrap.style.display = "flex";
        wrap.style.justifyContent = "center";

        const btn = document.createElement("button");
        btn.id = "btnVejaMaisVagas";
        btn.type = "button";
        btn.className = "pf-btn pf-btn-ghost";
        btn.innerHTML = `<i class="fa-solid fa-plus"></i> Veja mais`;
        btn.style.display = "none";

        btn.addEventListener("click", () => {
            STATE.page += 1;
            renderPage(true);
        });

        wrap.appendChild(btn);
        lista.parentElement?.appendChild(wrap);
        return wrap;
    }

    function filteredItems() {
        const f = STATE.filter;

        return STATE.all.filter(({ match, modalidadeNorm }) => {
            if (f === "todas") return true;
            if (f === "alto-match") return match >= 80;
            if (f === "remoto") return modalidadeNorm.includes("remot");
            if (f === "presencial") return modalidadeNorm.includes("presenc");
            return true;
        });
    }

    function cardHTML(v, match) {
        const id = getVagaId(v);
        const titulo = getVagaTitulo(v);
        const empresa = getVagaEmpresa(v);
        const cidade = getVagaCidade(v);
        const uf = getVagaUF(v);
        const modalidadeRaw = getVagaModalidadeRaw(v);
        const contrato = getVagaContrato(v);

        const desc = String(getVagaDescricao(v) || v?.complemento || "Vaga recomendada pela plataforma.");

        return `
      <div>
        <div class="job-main-title">${titulo}</div>

        <div class="job-company-line">
          <span><i class="fa-solid fa-building"></i> ${empresa}</span>
          <span><i class="fa-solid fa-location-dot"></i> ${cidade}${uf ? "/" + uf : ""}</span>
        </div>

        <div class="job-tags">
          ${modalidadeRaw ? `<span class="job-tag">${modalidadeRaw}</span>` : ""}
          ${contrato ? `<span class="job-tag">${contrato}</span>` : ""}
          <span class="job-tag">Match por perfil</span>
        </div>

        <div class="job-summary">
          ${desc ? (desc.slice(0, 120) + (desc.length > 120 ? "…" : "")) : "Vaga recomendada."}
        </div>
      </div>

      <div class="job-right">
        <div class="job-match-box">
          <div class="job-match-label">Compatibilidade</div>
          <div class="job-match-value">${match}%</div>
          <div class="job-match-bar">
            <div class="job-match-fill" style="width:0%"></div>
          </div>
        </div>

  <div class="job-actions">
<button class="job-btn job-btn-primary" type="button"
  data-ver-vaga="1" data-idvaga="${String(id ?? "")}">
  <i class="fa-solid fa-eye"></i> Ver vaga
</button>


  </div>
      </div>
    `;
    }

    function animateBars(scopeEl = lista) {
        requestAnimationFrame(() => {
            scopeEl.querySelectorAll(".job-card").forEach((card) => {
                const fill = card.querySelector(".job-match-fill");
                const match = parseInt(card.dataset.match || "0", 10);
                if (fill) fill.style.width = Math.max(0, Math.min(match, 100)) + "%";
            });
        });
    }

    function renderEmptyNoPerfil() {
        // ✅ ZERA tudo e mostra card
        lista.innerHTML = "";
        empty.style.display = "flex";
        lista.appendChild(empty);

        // troca mensagem do card
        const title = empty.querySelector("strong");
        const p = empty.querySelector("p");
        if (title) title.textContent = "Adicione experiência e/ou formação";
        if (p) p.textContent = "Assim que você preencher seu currículo, vamos recomendar vagas alinhadas ao seu perfil.";

        if (sub) sub.textContent = "Complete seu perfil para receber vagas recomendadas.";

        const btnMore = document.getElementById("btnVejaMaisVagas");
        if (btnMore) btnMore.style.display = "none";
    }

    function renderPage(append = false) {
        const wrap = ensureVejaMais();
        const btnMore = document.getElementById("btnVejaMaisVagas");

        const items = filteredItems();

        if (!append) lista.innerHTML = "";

        if (!items.length) {
            empty.style.display = "flex";
            lista.appendChild(empty);
            if (btnMore) btnMore.style.display = "none";
            return;
        }

        empty.style.display = "none";

        const end = STATE.page * STATE.pageSize;
        const slice = items.slice(0, end);

        if (!append) lista.innerHTML = "";

        slice.forEach(({ v, match, modalidadeNorm }) => {
            if (append) {
                const id = String(getVagaId(v) || "");
                if (id && lista.querySelector(`.job-card[data-id="${CSS.escape(id)}"]`)) return;
            }

            const card = document.createElement("article");
            card.className = "job-card";
            card.dataset.match = String(match);
            card.dataset.modalidade = modalidadeNorm;
            card.dataset.id = String(getVagaId(v) || "");
            card.innerHTML = cardHTML(v, match);
            lista.appendChild(card);
        });

        animateBars(lista);

        const hasMore = items.length > slice.length;
        if (btnMore) btnMore.style.display = hasMore ? "inline-flex" : "none";
    }

    // =========================
    // Filtros (pills)
    // =========================
    function initPills() {
        pills.forEach((b) => {
            b.addEventListener("click", () => {
                pills.forEach((x) => x.classList.remove("active"));
                b.classList.add("active");

                STATE.filter = b.dataset.filter || "todas";
                STATE.page = 1;

                renderPage(false);
            });
        });
    }

    // =========================
    // Boot
    // =========================
    let _booting = false;

    async function boot() {
        if (_booting) return;
        _booting = true;

        try {
            const [perfil, vagas] = await Promise.all([waitPerfilLoaded(), fetchVagas()]);
            const perfilTokens = extrairPerfilTokens(perfil);

            // ✅ REGRA (A): se não tem experiência E não tem formação => ZERO vagas
            if ((perfilTokens.expCount || 0) === 0 && (perfilTokens.formCount || 0) === 0) {
                renderEmptyNoPerfil();
                return;
            }

            if (sub) sub.textContent = "Listando vagas com base na sua experiência e formação.";

            STATE.all = (await Promise.all((Array.isArray(vagas) ? vagas : []).map(async (raw) => {
                let v = unwrapVaga(raw);
                if (!getVagaId(v)) return null;
                v = await hydrateVagaIfNeeded(v);
                const apiMatch = getApiMatchValue(raw);
                const match = apiMatch != null ? apiMatch : calcMatch(v, perfilTokens);
                return { raw, v, match, modalidadeNorm: getModalidadeNorm(v) };
            }))).filter(Boolean);

            STATE.all.sort((a, b) => b.match - a.match);

            STATE.filter = document.querySelector(".jobs-filter-pill.active")?.dataset.filter || "todas";
            STATE.page = 1;

            ensureVejaMais();
            renderPage(false);
        } catch (e) {
            console.error("[PERFIL VAGAS]", e);
            empty.style.display = "flex";
            if (sub) sub.textContent = "Erro ao carregar vagas recomendadas (ver console).";
            const btnMore = document.getElementById("btnVejaMaisVagas");
            if (btnMore) btnMore.style.display = "none";
        } finally {
            _booting = false;
        }
    }

    // ✅ Recalcula sempre que o perfil atualizar
    window.addEventListener("perfil:loaded", () => {
        STATE.page = 1;
        boot();
    });

    document.addEventListener("DOMContentLoaded", () => {
        initPills();
        boot();
    });
    // Handler único do botão "Ver vaga"
    (() => {
        "use strict";
        if (window.__JobHub_VER_VAGA_WIRED__) return;
        window.__JobHub_VER_VAGA_WIRED__ = true;

        document.addEventListener("click", (e) => {
            const btn = e.target.closest("[data-ver-vaga]");
            if (!btn) return;

            // aceita os dois padrões
            const id = btn.getAttribute("data-idvaga") || btn.getAttribute("data-id");
            if (!id) return;

            // Prioriza drawer se existir
            if (typeof window.JobHub_openVagaDrawer === "function") {
                window.JobHub_openVagaDrawer(Number(id));
                return;
            }

            // fallback: navegação
            const base = String(window.URL_BASE || "/").replace(/\/+$/, "/");
            window.location.href = `${base}vaga/${Number(id)}`;
        });
    })();

    (() => {
        "use strict";

        // evita duplicar
        if (window.__CV_MODAL_PATCHED_V2__ === true) return;
        window.__CV_MODAL_PATCHED_V2__ = true;

        const $ = (s) => document.querySelector(s);

        function onlyDigits(s) { return String(s || "").replace(/\D+/g, ""); }

        function maskPhoneBR(v) {
            const d = onlyDigits(v);
            if (!d) return "—";
            if (d.length === 11) return `(${d.slice(0, 2)}) ${d.slice(2, 7)}-${d.slice(7)}`;
            if (d.length === 10) return `(${d.slice(0, 2)}) ${d.slice(2, 6)}-${d.slice(6)}`;
            return d;
        }

        function fmtNascimento(v) {
            const s = String(v || "").trim();
            if (!s) return "—";
            if (/^\d{4}-\d{2}$/.test(s)) {
                const [y, m] = s.split("-");
                return `${m}/${y}`;
            }
            if (/^\d{4}-\d{2}-\d{2}$/.test(s)) {
                const [y, m, d] = s.split("-");
                return `${d}/${m}/${y}`;
            }
            return s;
        }

        function ensureCurriculoStyles() {
            if (document.getElementById("cv-style")) return;
            const st = document.createElement("style");
            st.id = "cv-style";
            st.textContent = `
      .cv-section{ margin-top:14px; }
      .cv-section h3{ margin:0 0 10px; font-size:14px; font-weight:900; color:#0f172a; }
      .cv-grid{ display:grid; gap:10px; grid-template-columns: repeat(2, minmax(0, 1fr)); }
      @media (max-width: 720px){ .cv-grid{ grid-template-columns:1fr; } }
      .cv-field{ border:1px solid rgba(212,216,229,.98); border-radius:14px; padding:10px 12px; background:rgba(248,250,252,.96); }
      .cv-field strong{ display:block; font-size:11.5px; color:#64748b; font-weight:800; }
      .cv-field span{ display:block; margin-top:4px; font-size:13.5px; color:#0f172a; overflow-wrap:anywhere; }
      .cv-field.full{ grid-column: 1 / -1; }
      .cv-empty{ display:block; padding:12px; border:1px dashed rgba(212,216,229,.98); border-radius:14px; color:#64748b; }
    `;
            document.head.appendChild(st);
        }

        function ensureDadosPessoaisBlock(modalEl) {
            const body =
                modalEl.querySelector(".pf-modal-body") ||
                modalEl.querySelector(".modal-body") ||
                modalEl;

            if (modalEl.querySelector("#cvDadosPessoais")) return;

            ensureCurriculoStyles();

            const sec = document.createElement("section");
            sec.className = "cv-section";
            sec.id = "cvDadosPessoais";
            sec.innerHTML = `
      <h3>Dados pessoais</h3>
      <div class="cv-grid">
        <div class="cv-field"><strong>Nome</strong><span id="cvNome">—</span></div>
        <div class="cv-field"><strong>E-mail</strong><span id="cvEmail">—</span></div>
        <div class="cv-field"><strong>Telefone</strong><span id="cvTelefone">—</span></div>
        <div class="cv-field"><strong>Cidade/UF</strong><span id="cvCidadeUf">—</span></div>
        <div class="cv-field"><strong>Nascimento</strong><span id="cvNascimento">—</span></div>
        <div class="cv-field"><strong>Gênero</strong><span id="cvGenero">—</span></div>
        <div class="cv-field full"><strong>Resumo profissional</strong><span id="cvResumo">—</span></div>
      </div>
    `;

            body.prepend(sec);
        }

        function ensureCvContainers(modalEl) {
            const body =
                modalEl.querySelector(".pf-modal-body") ||
                modalEl.querySelector(".modal-body") ||
                modalEl;

            if (!modalEl.querySelector("#cvExperiencias")) {
                const sec = document.createElement("section");
                sec.className = "cv-section";
                sec.innerHTML = `
        <h3>Experiências</h3>
        <div id="cvExperienciasEmpty" class="cv-empty" style="display:none;">Nenhuma experiência cadastrada.</div>
        <div id="cvExperiencias"></div>
      `;
                body.appendChild(sec);
            }

            if (!modalEl.querySelector("#cvFormacoes")) {
                const sec = document.createElement("section");
                sec.className = "cv-section";
                sec.innerHTML = `
        <h3>Formação</h3>
        <div id="cvFormacoesEmpty" class="cv-empty" style="display:none;">Nenhuma formação cadastrada.</div>
        <div id="cvFormacoes"></div>
      `;
                body.appendChild(sec);
            }
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

            items.forEach((item) => destino.appendChild(item.cloneNode(true)));
        }

        function setText(id, val, fb = "—") {
            const el = document.getElementById(id);
            if (!el) return;
            const s = String(val ?? "").trim();
            el.textContent = s ? s : fb;
        }

        (() => {
            "use strict";

            if (window.__CV_MODAL_PATCHED_V3__ === true) return;
            window.__CV_MODAL_PATCHED_V3__ = true;

            const qs = (s, root = document) => root.querySelector(s);

            function escapeHtml(str) {
                return String(str ?? "")
                    .replaceAll("&", "&amp;")
                    .replaceAll("<", "&lt;")
                    .replaceAll(">", "&gt;")
                    .replaceAll('"', "&quot;")
                    .replaceAll("'", "&#039;");
            }

            function onlyDigits(s) { return String(s || "").replace(/\D+/g, ""); }
            function maskPhoneBR(v) {
                const d = onlyDigits(v);
                if (!d) return "—";
                if (d.length === 11) return `(${d.slice(0, 2)}) ${d.slice(2, 7)}-${d.slice(7)}`;
                if (d.length === 10) return `(${d.slice(0, 2)}) ${d.slice(2, 6)}-${d.slice(6)}`;
                return d;
            }
            function fmtNascimento(v) {
                const s = String(v || "").trim();
                if (!s) return "—";
                if (/^\d{4}-\d{2}-\d{2}$/.test(s)) {
                    const [y, m, d] = s.split("-");
                    return `${d}/${m}/${y}`;
                }
                return s;
            }

            function ensureStyle() {
                if (document.getElementById("cv-style")) return;
                const st = document.createElement("style");
                st.id = "cv-style";
                st.textContent = `
      .cv-section{ margin-top:14px; }
      .cv-section h3{ margin:0 0 10px; font-size:14px; font-weight:900; color:#0f172a; }
      .cv-grid{ display:grid; gap:10px; grid-template-columns: repeat(2, minmax(0, 1fr)); }
      @media (max-width: 720px){ .cv-grid{ grid-template-columns:1fr; } }
      .cv-field{ border:1px solid rgba(212,216,229,.98); border-radius:14px; padding:10px 12px; background:rgba(248,250,252,.96); }
      .cv-field strong{ display:block; font-size:11.5px; color:#64748b; font-weight:800; }
      .cv-field span{ display:block; margin-top:4px; font-size:13.5px; color:#0f172a; overflow-wrap:anywhere; }
      .cv-field.full{ grid-column: 1 / -1; }
      .cv-empty{ display:block; padding:12px; border:1px dashed rgba(212,216,229,.98); border-radius:14px; color:#64748b; }
      .cv-card{ border:1px solid rgba(212,216,229,.98); border-radius:14px; padding:10px 12px; background:#fff; margin-bottom:10px; }
      .cv-card .t{ font-weight:900; color:#0f172a; margin-bottom:4px; }
      .cv-card .m{ color:#64748b; font-size:12.5px; }
      .cv-card .d{ color:#0f172a; font-size:13px; margin-top:6px; white-space:pre-wrap; }
    `;
                document.head.appendChild(st);
            }

            function openModalForce(id) {
                const m = document.getElementById(id);
                if (!m) return false;

                m.classList.add("is-open", "open", "show");
                m.style.display = "flex";
                m.style.visibility = "visible";
                m.style.opacity = "1";
                m.setAttribute("aria-hidden", "false");
                document.body.style.overflow = "hidden";
                return true;
            }

            function getModalBody(modal) {
                return (
                    modal.querySelector(".pf-modal-body") ||
                    modal.querySelector(".modal-body") ||
                    modal
                );
            }

            function ensureStructure(modal) {
                ensureStyle();
                const body = getModalBody(modal);

                if (!qs("#cvDadosPessoais", modal)) {
                    const sec = document.createElement("section");
                    sec.className = "cv-section";
                    sec.id = "cvDadosPessoais";
                    sec.innerHTML = `
        <h3>Dados pessoais</h3>
        <div class="cv-grid">
          <div class="cv-field"><strong>Nome</strong><span id="cvNome">—</span></div>
          <div class="cv-field"><strong>E-mail</strong><span id="cvEmail">—</span></div>
          <div class="cv-field"><strong>Telefone</strong><span id="cvTelefone">—</span></div>
          <div class="cv-field"><strong>Cidade/UF</strong><span id="cvCidadeUf">—</span></div>
          <div class="cv-field"><strong>Nascimento</strong><span id="cvNascimento">—</span></div>
          <div class="cv-field"><strong>Gênero</strong><span id="cvGenero">—</span></div>
          <div class="cv-field full"><strong>Resumo profissional</strong><span id="cvResumo">—</span></div>
        </div>
      `;
                    body.prepend(sec);
                }

                if (!qs("#cvExperiencias", modal)) {
                    const sec = document.createElement("section");
                    sec.className = "cv-section";
                    sec.innerHTML = `
        <h3>Experiências</h3>
        <div id="cvExperienciasEmpty" class="cv-empty" style="display:none;">Nenhuma experiência cadastrada.</div>
        <div id="cvExperiencias"></div>
      `;
                    body.appendChild(sec);
                }

                if (!qs("#cvFormacoes", modal)) {
                    const sec = document.createElement("section");
                    sec.className = "cv-section";
                    sec.innerHTML = `
        <h3>Formação</h3>
        <div id="cvFormacoesEmpty" class="cv-empty" style="display:none;">Nenhuma formação cadastrada.</div>
        <div id="cvFormacoes"></div>
      `;
                    body.appendChild(sec);
                }
            }

            function setText(id, val, fb = "—") {
                const el = document.getElementById(id);
                if (!el) return;
                const s = String(val ?? "").trim();
                el.textContent = s ? s : fb;
            }


            function cloneTimeline(origSel, destSel, emptySel) {
                const origem = qs(origSel);
                const destino = qs(destSel);
                const empty = qs(emptySel);
                if (!destino) return false;

                destino.innerHTML = "";
                const items = origem ? Array.from(origem.children).filter((n) => n.classList?.contains("t-item")) : [];

                if (!items.length) {
                    if (empty) empty.style.display = "block";
                    return false;
                }
                if (empty) empty.style.display = "none";

                items.forEach((item) => destino.appendChild(item.cloneNode(true)));
                return true;
            }

            function renderCards(list, kind, emptyEl) {
                const dest = qs(list);
                const empty = qs(emptyEl);
                if (!dest) return;

                dest.innerHTML = "";

                if (!Array.isArray(kind) || !kind.length) {
                    if (empty) empty.style.display = "block";
                    return;
                }
                if (empty) empty.style.display = "none";

                dest.innerHTML = kind.map((x) => {
                    const t = escapeHtml(x?.cargo || x?.curso || x?.instituicao || x?.empresa || "—");
                    const m = escapeHtml(
                        [x?.empresa, x?.instituicao, x?.inicio, x?.fim].filter(Boolean).join(" • ") || ""
                    );
                    const d = escapeHtml(x?.descricao || x?.detalhes || "");
                    return `
        <div class="cv-card">
          <div class="t">${t}</div>
          ${m ? `<div class="m">${m}</div>` : ""}
          ${d ? `<div class="d">${d}</div>` : ""}
        </div>
      `;
                }).join("");
            }

            function fillModal() {
                const modal = document.getElementById("modalPerfil");
                if (!modal) {
                    console.warn("[CV] modalCurriculo não encontrado.");
                    return false;
                }

                ensureStructure(modal);

                const me = window.__PERFIL_ME__?.candidato || {};
                const email = window.__PERFIL_ME__?.email || (qs("#emailUsuario")?.textContent || "—").trim();

                const cidade = String(me?.cidade || "").trim();
                const uf = String(me?.estado || "").trim();
                const cidadeUf = [cidade, uf].filter(Boolean).join("/") || "—";

                setText("cvNome", me?.nomeCompleto || (qs("#nomeUsuario")?.textContent || "Candidato").trim(), "Candidato");
                setText("cvEmail", email, "—");
                setText("cvTelefone", maskPhoneBR(me?.telefone), "—");
                setText("cvCidadeUf", cidadeUf, "—");
                setText("cvNascimento", fmtNascimento(me?.dataNascimento), "—");
                setText("cvGenero", me?.genero || "—", "—");
                setText("cvResumo", me?.resumoProfissional || "—", "—");

                // tenta clonar da UI (se existir)
                const clonedExp = cloneTimeline("#listaExperiencias", "#cvExperiencias", "#cvExperienciasEmpty");
                const clonedForm = cloneTimeline("#listaFormacoes", "#cvFormacoes", "#cvFormacoesEmpty");

                // fallback: renderiza do objeto
                if (!clonedExp) renderCards("#cvExperiencias", me?.experiencias || me?.experiencia || [], "#cvExperienciasEmpty");
                if (!clonedForm) renderCards("#cvFormacoes", me?.formacoes || me?.formacao || [], "#cvFormacoesEmpty");

                return true;
            }

            // pega clique SEM depender do texto
            document.addEventListener("click", (e) => {
                const btn = e.target.closest("[data-open-cv], #btnVerCurriculo");
                if (!btn) return;

                e.preventDefault();

                console.log("[CV] abrir currículo");
                const ok = fillModal();
                if (ok) openModalForce("modalCurriculo");
            }, true);

            
        })();

    })();

})();
