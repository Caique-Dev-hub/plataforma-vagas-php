// ./js/perfil-api.js
(() => {
    "use strict";

    /* =========================
      CONFIG
    ========================= */
    const API_BASE = window.JobHub_API_BASE || "";

    const ME_PATHS = [
        "/candidatos/me/{id}",   // seu novo endpoint
        "/candidatos/me",        // normal
    ];

    const GET_BY_ID_PATHS = (id) => [
        `/candidatos/${id}`,
    ];
    async function fetchCandidatoByIdWithFallback(token, candidatoId) {
        let lastErr = null;

        for (const path of GET_BY_ID_PATHS(candidatoId)) {
            const url = new URL(path, API_BASE).toString();
            try {
                const resp = await fetch(url, {
                    method: "GET",
                    headers: { Authorization: `Bearer ${token}` },
                });

                if (resp.status === 404) continue;
                if (!resp.ok) {
                    const txt = await resp.text().catch(() => "");
                    throw new Error(`GET ${url} -> ${resp.status}\n${txt}`);
                }

                return await resp.json();

            } catch (e) {
                lastErr = e;
            }
        }

        throw lastErr || new Error("Não foi possível buscar candidato por ID.");
    }

    const PUT_BY_ID_PATHS = (id) => [
        `/candidato/${id}`,
        `/candidatos/${id}`,
    ];

    const $ = (s) => document.querySelector(s);

    /* =========================
      HELPERS
    ========================= */
    function normalizeOneFormacaoForPut(f = {}) {
        const nivel =
            String(
                f?.nivel ||
                f?.nivelFormacao ||
                ""
            ).trim() || "SUPERIOR";

        const status =
            String(
                f?.status ||
                f?.statusFormacao ||
                ""
            ).trim() || (f?.dataFim ? "CONCLUIDO" : "CURSANDO");

        return {
            ...(f?.id ? { id: f.id } : {}),
            instituicao: String(f?.instituicao || "").trim(),
            curso: String(f?.curso || "").trim(),

            // manda os 2 nomes
            nivel,
            nivelFormacao: nivel,

            status,
            statusFormacao: status,

            dataInicio: f?.dataInicio || null,
            dataFim: f?.dataFim || null,
        };
    }

    function normalizeFormacoesForPut(list) {
        if (!Array.isArray(list)) return [];
        return list
            .map(normalizeOneFormacaoForPut)
            .filter(f => f.instituicao || f.curso || f.dataInicio || f.dataFim);
    }
    function escapeHTML(str) {
        return String(str ?? "")
            .replaceAll("&", "&amp;")
            .replaceAll("<", "&lt;")
            .replaceAll(">", "&gt;")
            .replaceAll('"', "&quot;")
            .replaceAll("'", "&#39;");
    }

    function has(v) {
        return String(v ?? "").trim().length > 0;
    }

    function onlyDigits(s) {
        return String(s || "").replace(/\D+/g, "");
    }

    function unwrapMe(raw) {
        return raw?.me || raw?.candidato || raw?.data || raw || {};
    }

    function pickArray(...cands) {
        for (const v of cands) if (Array.isArray(v)) return v;
        return [];
    }

    function getToken() {
        return localStorage.getItem("token") || localStorage.getItem("accessToken") || "";
    }

    function logoutToLogin() {
        localStorage.removeItem("token");
        localStorage.removeItem("accessToken");
        localStorage.removeItem("role");
        localStorage.removeItem("candidato_me");
        localStorage.removeItem("candidato_id");
        window.location.href = (window.JobHub_ROUTES?.HOME || "/");
    }

    function decodeJwt(token) {
        try {
            const parts = token.split(".");
            if (parts.length < 2) return null;
            const b64 = parts[1].replace(/-/g, "+").replace(/_/g, "/");
            const padded = b64 + "===".slice((b64.length + 3) % 4);
            const json = decodeURIComponent(
                atob(padded)
                    .split("")
                    .map((c) => "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2))
                    .join("")
            );
            return JSON.parse(json);
        } catch {
            return null;
        }
    }

    function pickCandidatoId(rawMe, jwt) {
        const root = unwrapMe(rawMe);

        const candidates = [
            root.idCandidato,
            root.candidatoId,
            root.id,

            rawMe?.idCandidato,
            rawMe?.candidatoId,
            rawMe?.id,

            jwt?.idCandidato,
            jwt?.candidatoId,
            jwt?.id,

            typeof jwt?.sub === "string" && /^\d+$/.test(jwt.sub) ? jwt.sub : null,
        ].filter((v) => v !== null && v !== undefined && String(v).trim() !== "");

        return candidates.length ? String(candidates[0]) : "";
    }

    function deriveEmail(rawMe, jwt) {
        const root = unwrapMe(rawMe);
        const maybe = root?.email || rawMe?.email || jwt?.email || "";
        if (has(maybe)) return maybe;
        if (typeof jwt?.sub === "string" && jwt.sub.includes("@")) return jwt.sub;
        return localStorage.getItem("login_prefill_email") || "—";
    }

    // backend quer "YYYY-MM"
    function birthToApi(v) {
        if (!v) return "";
        const s = String(v).trim();
        if (/^\d{4}-\d{2}-\d{2}$/.test(s)) return s.slice(0, 7);
        if (/^\d{4}-\d{2}$/.test(s)) return s;
        return s;
    }

    // input type="date" precisa "YYYY-MM-DD"
    function birthToInput(v) {
        if (!v) return "";
        const s = String(v).trim();
        if (/^\d{4}-\d{2}$/.test(s)) return `${s}-01`;
        if (/^\d{4}-\d{2}-\d{2}$/.test(s)) return s;
        return "";
    }

    function monthFromApiDate(v) {
        const s = String(v || "").trim();
        if (!s) return "";
        if (/^\d{4}-\d{2}-\d{2}$/.test(s)) return s.slice(0, 7);
        if (/^\d{4}-\d{2}$/.test(s)) return s;
        return "";
    }

    function apiDateFromMonth(m) {
        const s = String(m || "").trim();
        if (!s) return null;
        if (/^\d{4}-\d{2}$/.test(s)) return s + "-01";
        if (/^\d{4}-\d{2}-\d{2}$/.test(s)) return s;
        return null;
    }

    function normalizeDate(dateStr) {
        if (!dateStr) return "";
        const s = String(dateStr).trim();
        if (/^\d{4}-\d{2}$/.test(s)) return `${s}-01`;
        return s;
    }

    function formatMesAno(dateStr) {
        if (!dateStr) return "";
        const d = new Date(normalizeDate(dateStr));
        if (Number.isNaN(d.getTime())) return "";
        return new Intl.DateTimeFormat("pt-BR", { month: "short", year: "numeric" })
            .format(d)
            .replace(".", "");
    }

    function formatPeriodo(inicio, fim, atualFlag) {
        const i = formatMesAno(inicio);
        const f = atualFlag || !fim ? "Atual" : formatMesAno(fim);
        if (!i && !f) return "—";
        if (!i) return f;
        return `${i} • ${f}`;
    }

    /* =========================
      ALERTS
    ========================= */
    function showAlert(type, msg) {
        const box = document.getElementById("pf_formAlert");
        if (!box) return;
        box.classList.remove("ok", "err");
        box.classList.add(type === "ok" ? "ok" : "err");
        box.textContent = msg;
        box.style.display = "block";
    }

    function hideAlert() {
        const box = document.getElementById("pf_formAlert");
        if (!box) return;
        box.style.display = "none";
        box.textContent = "";
        box.classList.remove("ok", "err");
    }

    function modalAlert(modalId, type, msg) {
        const box = document.querySelector(`#${modalId} [data-modal-alert]`);
        if (!box) return;
        box.classList.remove("ok", "err");
        box.classList.add(type === "ok" ? "ok" : "err");
        box.textContent = msg;
        box.style.display = "block";
    }

    function modalAlertHide(modalId) {
        const box = document.querySelector(`#${modalId} [data-modal-alert]`);
        if (!box) return;
        box.style.display = "none";
        box.textContent = "";
        box.classList.remove("ok", "err");
    }

    function openModal(id) {
        const modal = document.getElementById(id);
        if (!modal) return;
        modal.classList.add("is-open");
        modal.setAttribute("aria-hidden", "false");
        document.body.style.overflow = "hidden";
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        if (!modal) return;
        modal.classList.remove("is-open");
        modal.setAttribute("aria-hidden", "true");
        document.body.style.overflow = "";
    }

    /* =========================
      API CORE
    ========================= */
    async function fetchJson(url, token) {
        const resp = await fetch(url, {
            method: "GET",
            headers: { Authorization: `Bearer ${token}` },
        });

        if (resp.status === 401 || resp.status === 403) throw new Error(`Sem autorização (${resp.status})`);

        if (resp.status === 404) {
            const err = new Error("Not Found");
            err.code = 404;
            throw err;
        }

        if (!resp.ok) {
            const txt = await resp.text().catch(() => "");
            throw new Error(`Falha ${resp.status}: ${txt}`);
        }

        return resp.json();
    }

    function valuesEqual(a, b) {
        return String(a || "").trim().toLowerCase() === String(b || "").trim().toLowerCase();
    }

    function pickMeFromResponse(data, storedId, expectedEmail) {
        if (!Array.isArray(data)) return data || null;

        const byId = storedId
            ? data.find((x) => valuesEqual(x?.idCandidato ?? x?.candidatoId ?? x?.id, storedId))
            : null;
        if (byId) return byId;

        const byEmail = expectedEmail
            ? data.find((x) => valuesEqual(x?.email, expectedEmail))
            : null;
        if (byEmail) return byEmail;

        return data.length === 1 ? data[0] : null;
    }

    function isSameSessionCandidate(rawMe, jwt, storedId) {
        const root = unwrapMe(rawMe);
        const expectedId = String(storedId || jwt?.idCandidato || jwt?.candidatoId || jwt?.id || "").trim();
        const expectedEmail = String(jwt?.email || ((typeof jwt?.sub === "string" && jwt.sub.includes("@")) ? jwt.sub : "") || "").trim().toLowerCase();
        const actualId = String(root?.idCandidato || root?.candidatoId || root?.id || "").trim();
        const actualEmail = String(root?.email || rawMe?.email || "").trim().toLowerCase();

        if (expectedId && actualId && expectedId !== actualId) return false;
        if (expectedEmail && actualEmail && expectedEmail !== actualEmail) return false;
        return true;
    }

    async function fetchMeWithFallback(token) {
        let lastErr = null;
        const jwt = decodeJwt(token) || {};
        const storedId = localStorage.getItem("candidato_id") || "";
        const expectedEmail = String(jwt?.email || ((typeof jwt?.sub === "string" && jwt.sub.includes("@")) ? jwt.sub : "") || "").trim().toLowerCase();

        for (const pathRaw of ME_PATHS) {
            const path = pathRaw.includes("{id}") ? pathRaw.replace("{id}", storedId) : pathRaw;

            if (pathRaw.includes("{id}") && !storedId) continue;

            const url = new URL(path, API_BASE).toString();

            try {
                const data = await fetchJson(url, token);
                const normalized = pickMeFromResponse(data, storedId, expectedEmail);
                if (!normalized) {
                    lastErr = new Error(`Nenhum candidato da resposta ${url} combinou com a sessão atual.`);
                    continue;
                }

                if (!isSameSessionCandidate(normalized, jwt, storedId)) {
                    lastErr = new Error(`A resposta ${url} pertence a outro candidato.`);
                    continue;
                }

                localStorage.setItem("candidato_me", JSON.stringify(normalized));
                return normalized;
            } catch (e) {
                lastErr = e;
                if (e && e.code === 404) continue;
            }
        }

        const cached = localStorage.getItem("candidato_me");
        if (cached) {
            try {
                const parsed = JSON.parse(cached);
                if (isSameSessionCandidate(parsed, jwt, storedId)) return parsed;
            } catch {}
            localStorage.removeItem("candidato_me");
        }

        throw lastErr || new Error("Não foi possível localizar um endpoint /me válido");
    }



    async function putCandidatoPorId(token, candidatoId, payload) {
        let lastErr = null;

        for (const path of PUT_BY_ID_PATHS(candidatoId)) {
            const url = new URL(path, API_BASE).toString();

            try {
                const resp = await fetch(url, {
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json",
                        Authorization: `Bearer ${token}`,
                    },
                    body: JSON.stringify(payload),
                });

                if (resp.ok) {
                    try {
                        return await resp.json();
                    } catch {
                        return { ok: true };
                    }
                }

                const text = await resp.text().catch(() => "");
                throw new Error(`PUT ${url} -> ${resp.status}\n${text}`);
            } catch (err) {
                lastErr = err;
            }
        }

        throw lastErr || new Error("Não foi possível salvar em nenhuma rota PUT com ID.");
    }

    /* =========================
      PUT PAYLOAD COMPLETO
    ========================= */
    function buildFullPutPayload(beforeCandidate, candidatoId, overrides = {}) {
        const c = beforeCandidate || {};

        const exp = pickArray(c.experiencias, []);
        const form = pickArray(c.formacoes, []);

        const base = {
            idCandidato: Number(candidatoId),
            nomeCompleto: String(c.nomeCompleto || "").trim(),
            telefone: onlyDigits(c.telefone),
            genero: String(c.genero || "").trim(),
            dataNascimento: birthToApi(c.dataNascimento),
            cidade: String(c.cidade || "").trim(),
            estado: String(c.estado || "").trim(),
            resumoProfissional: c.resumoProfissional || null,
            videoApresentacao: c.videoApresentacao || null,
            experiencias: exp,
            formacoes: form,
        };



        const merged = { ...base, ...overrides };

        merged.cpf = onlyDigits(merged.cpf);
        merged.telefone = onlyDigits(merged.telefone);
        merged.dataNascimento = birthToApi(merged.dataNascimento);

        merged.experiencias = Array.isArray(merged.experiencias) ? merged.experiencias : [];
        merged.formacoes = normalizeFormacoesForPut(merged.formacoes);

        return merged;
    }

    /* =========================
      TIMELINE RENDER
    ========================= */
    function buildExperienciaItem(exp) {
        const div = document.createElement("div");
        div.className = "t-item t-item-animated";

        const cargo = escapeHTML(exp?.cargo || "Experiência");
        const empresa = escapeHTML(exp?.empresa || "—");
        const desc = escapeHTML(exp?.descricao || "");
        const periodo = escapeHTML(formatPeriodo(exp?.dataInicio, exp?.dataFim, !!exp?.atual));

        div.innerHTML = `
      <div class="t-top">
        <div style="min-width:0">
          <div class="t-title">${cargo}</div>
          <div class="t-sub">${empresa}</div>
        </div>
        <div class="t-badge">${periodo}</div>
      </div>
      ${desc ? `<div class="t-desc">${desc}</div>` : ""}
    `;
        return div;
    }

    function buildFormacaoItem(f) {
        const div = document.createElement("div");
        div.className = "t-item t-item-animated";

        const curso = escapeHTML(f?.curso || "Formação");
        const inst = escapeHTML(f?.instituicao || "—");
        const nivel = escapeHTML(f?.nivel || f?.nivelFormacao || "");
        const periodo = escapeHTML(formatPeriodo(f?.dataInicio, f?.dataFim, !f?.dataFim));

        div.innerHTML = `
      <div class="t-top">
        <div style="min-width:0">
          <div class="t-title">${curso}</div>
          <div class="t-sub">${inst}${nivel ? ` • ${nivel}` : ""}</div>
        </div>
        <div class="t-badge">${periodo}</div>
      </div>
    `;
        return div;
    }

    function renderTimeline(containerSel, emptySel, items, builder) {
        const container = $(containerSel);
        const empty = $(emptySel);
        if (!container) return;

        container.innerHTML = "";

        if (!Array.isArray(items) || items.length === 0) {
            if (empty) empty.style.display = "flex";
            return;
        }

        if (empty) empty.style.display = "none";
        items.forEach((item) => container.appendChild(builder(item)));
    }

    /* =========================
      SCORE / STATUS
    ========================= */
    const SCORE_RULES = [
        { key: "nomeCompleto", label: "Adicionar nome completo", points: 10, ok: (me) => has(me?.nomeCompleto) },
        { key: "email", label: "Adicionar e-mail", points: 10, ok: (me, email) => has(email) && email !== "—" },
        { key: "telefone", label: "Adicionar telefone", points: 10, ok: (me) => has(me?.telefone) },
        { key: "genero", label: "Selecionar gênero", points: 5, ok: (me) => has(me?.genero) },
        { key: "dataNascimento", label: "Adicionar nascimento", points: 10, ok: (me) => has(me?.dataNascimento) },
        { key: "cidade", label: "Adicionar cidade", points: 20, ok: (me) => has(me?.cidade) },
        { key: "estado", label: "Adicionar estado", points: 5, ok: (me) => has(me?.estado) },
        { key: "experiencias", label: "Adicionar experiência", points: 15, ok: (me) => Array.isArray(me?.experiencias) && me.experiencias.length > 0 },
        { key: "formacoes", label: "Adicionar formação", points: 15, ok: (me) => Array.isArray(me?.formacoes) && me.formacoes.length > 0 },
    ];

    function computeScore(me, email) {
        let score = 0;
        const missing = [];

        for (const r of SCORE_RULES) {
            const ok = !!r.ok(me, email);
            if (ok) score += r.points;
            else missing.push(r);
        }

        return { score: Math.min(100, score), missing };
    }

    function setText(sel, value, fallback = "—") {
        const el = $(sel);
        if (!el) return;
        const v = String(value ?? "").trim();
        el.textContent = v ? v : fallback;
    }

    function applyStatus(score) {
        const chip = $("#chipStatus");
        const chipHero = $("#chipStatusHero");

        const setChipHTML = (el, html, addClass) => {
            if (!el) return;
            el.classList.remove("status-ok", "status-review");
            if (addClass) el.classList.add(addClass);
            el.innerHTML = html;
        };

        if (score >= 80) {
            setChipHTML(chip, `<i class="fa-regular fa-circle-check"></i> Perfil completo`, "status-ok");
            if (chipHero) chipHero.innerHTML = `<i class="fa-regular fa-eye"></i> Visível para recrutadores`;
        } else if (score >= 50) {
            setChipHTML(chip, `<i class="fa-regular fa-circle-question"></i> Perfil em revisão`, "status-review");
            if (chipHero) chipHero.innerHTML = `<i class="fa-regular fa-eye"></i> Visível (melhore o perfil)`;
        } else {
            setChipHTML(chip, `<i class="fa-regular fa-circle-question"></i> Perfil incompleto`, "status-review");
            if (chipHero) chipHero.innerHTML = `<i class="fa-regular fa-eye-slash"></i> Visibilidade reduzida`;
        }
    }

    function setProgress(score) {
        setText("#scorePerfil", `${score}%`, "—");
        const bar = $("#scorePerfilBar");
        if (bar) bar.style.width = `${score}%`;
    }

    // ✅ AQUI: agora mostra a lista do que falta (quando não for 100%)
    function renderPendencias(missing) {
        const box = $(".pf-progress-box");
        if (!box) return;

        let wrap = box.querySelector(".pf-pendencias");
        if (!wrap) {
            wrap = document.createElement("div");
            wrap.className = "pf-pendencias";
            box.appendChild(wrap);
        }

        if (!missing.length) {
            wrap.innerHTML = `
        <div class="pf-pendencias-title">Tudo certo</div>
        <div class="pf-pendencias-sub">Seu perfil está completo.</div>
      `;
            return;
        }

        const top = missing.slice(0, 6);
        wrap.innerHTML = `
      <div class="pf-pendencias-title">Falta pouco</div>
      <div class="pf-pendencias-sub">Complete estes itens para melhorar seu score:</div>
      <ul class="pf-pendencias-list">
        ${top.map((m) => `<li><i class="fa-regular fa-circle"></i><span>${escapeHTML(m.label)}</span></li>`).join("")}
      </ul>
      ${missing.length > 6 ? `<div class="pf-pendencias-more">+${missing.length - 6} itens</div>` : ""}
    `;
    }

    /* =========================
      NORMALIZE + RENDER ALL
    ========================= */
    function normalizeForRender(rawMe, jwt) {
        const candidato = unwrapMe(rawMe);

        const exp = pickArray(
            candidato?.experiencias,
            rawMe?.experiencias,
            rawMe?.me?.experiencias,
            rawMe?.candidato?.experiencias,
            rawMe?.data?.experiencias
        );

        const form = pickArray(
            candidato?.formacoes,
            rawMe?.formacoes,
            rawMe?.me?.formacoes,
            rawMe?.candidato?.formacoes,
            rawMe?.data?.formacoes
        );

        const email = deriveEmail(rawMe, jwt);
        const candidatoId = pickCandidatoId(rawMe, jwt);

        candidato.experiencias = exp;
        candidato.formacoes = form;

        return { candidato, exp, form, email, candidatoId };
    }

    function renderAll(rawMe, jwt) {
        const { candidato, exp, form, email, candidatoId } = normalizeForRender(rawMe, jwt);

        if (candidatoId) localStorage.setItem("candidato_id", String(candidatoId));

        setText("#nomeUsuario", candidato?.nomeCompleto, "Candidato");
        setText("#nomeUsuarioHero", candidato?.nomeCompleto, "Candidato");
        setText("#emailUsuario", email, "—");
        setText("#emailUsuarioHero", email, "—");

        setText("#countExperiencias", exp.length, "0");
        setText("#countFormacoes", form.length, "0");

        renderTimeline("#listaExperiencias", "#emptyExperiencias", exp, buildExperienciaItem);
        renderTimeline("#listaFormacoes", "#emptyFormacoes", form, buildFormacaoItem);

        const { score, missing } = computeScore(candidato, email);
        setProgress(score);
        applyStatus(score);
        renderPendencias(missing);

        window.__PERFIL_ME__ = { rawMe, candidato, email, candidatoId, score, missing };
        window.dispatchEvent(new CustomEvent("perfil:loaded", { detail: window.__PERFIL_ME__ }));
    }

    /* =========================
      MODAL PERFIL (dados principais)
    ========================= */
    function fillFormFromMe(rawMe, emailFallback) {
        const candidato = unwrapMe(rawMe);

        const setVal = (id, val) => {
            const el = document.getElementById(id);
            if (!el) return;
            el.value = val ?? "";
        };

        setVal("pf_nomeCompleto", candidato?.nomeCompleto || "");
        setVal("pf_email", emailFallback || ""); // ✅ email vem do JWT/localStorage
        setVal("pf_telefone", candidato?.telefone || "");
        setVal("pf_cpf", candidato?.cpf || "");  // ✅ pode ficar vazio se API não manda
        setVal("pf_genero", candidato?.genero || "");
        setVal("pf_dataNascimento", birthToInput(candidato?.dataNascimento));
        setVal("pf_cidade", candidato?.cidade || "");
        setVal("pf_estado", candidato?.estado || "");

    }

    function wireEditPerfilFlow() {
        const btnOpen = document.getElementById("btnEditarPerfil") || document.getElementById("btnAtualizarPerfil");
        const form = document.getElementById("formAtualizarPerfil");
        const btnSave = document.getElementById("btnSalvarPerfil");

        btnOpen?.addEventListener("click", async (e) => {
            e.preventDefault();
            hideAlert();
            openModal("modalAtualizarPerfil");

            const token = getToken();
            if (!token) {
                showAlert("err", "Sessão inválida. Faça login novamente.");
                return;
            }

            try {
                const jwt = decodeJwt(token) || {};
                const rawMe = await fetchMeWithFallback(token);
                const email = deriveEmail(rawMe, jwt);
                fillFormFromMe(rawMe, email);
            } catch (err) {
                showAlert("err", err?.message || "Não foi possível carregar seus dados.");
            }
        });

        form?.addEventListener("submit", async (e) => {
            e.preventDefault();
            hideAlert();

            const token = getToken();
            if (!token) {
                showAlert("err", "Sessão inválida. Faça login novamente.");
                return;
            }

            try {
                const jwt = decodeJwt(token) || {};
                const rawMeBefore = await fetchMeWithFallback(token);
                const before = unwrapMe(rawMeBefore);

                let candidatoId = localStorage.getItem("candidato_id") || pickCandidatoId(rawMeBefore, jwt);
                if (!candidatoId) {
                    showAlert("err", "Não consegui identificar seu ID. Confirme se o /me retorna candidatoId (ou id).");
                    return;
                }
                localStorage.setItem("candidato_id", String(candidatoId));

                const fd = new FormData(form);

                const next = {
                    nomeCompleto: String(fd.get("nomeCompleto") || "").trim(),
                    email: String(fd.get("email") || "").trim(),
                    telefone: onlyDigits(String(fd.get("telefone") || "").trim()),
                    cpf: onlyDigits(String(fd.get("cpf") || "").trim()),
                    genero: String(fd.get("genero") || "").trim(),
                    dataNascimento: birthToApi(String(fd.get("dataNascimento") || "").trim()),
                    cidade: String(fd.get("cidade") || "").trim(),
                    estado: String(fd.get("estado") || "").trim(),
                };

                // ✅ TELEFONE OBRIGATÓRIO (evita 500)
                const telInput = document.getElementById("pf_telefone");
                const telDigits = onlyDigits(next.telefone);
                if (!telDigits) {
                    showAlert("err", "Telefone não pode ficar vazio. Informe um telefone válido (com DDD) para salvar.");
                    telInput?.focus();
                    return;
                }
                if (!(telDigits.length === 10 || telDigits.length === 11)) {
                    showAlert("err", "Telefone inválido. Use DDD + número (10 ou 11 dígitos). Ex: (11) 98765-4321");
                    telInput?.focus();
                    return;
                }

                const fullPayload = buildFullPutPayload(before, candidatoId, {
                    nomeCompleto: next.nomeCompleto,
                    email: next.email,
                    telefone: telDigits,
                    cpf: next.cpf,
                    genero: next.genero,
                    dataNascimento: next.dataNascimento,
                    cidade: next.cidade,
                    estado: next.estado,
                    experiencias: Array.isArray(before?.experiencias) ? before.experiencias : [],
                    formacoes: Array.isArray(before?.formacoes) ? before.formacoes : [],
                });

                if (btnSave) {
                    btnSave.disabled = true;
                    btnSave.innerHTML = `<i class="fa-solid fa-circle-notch fa-spin"></i> Salvando...`;
                }

                await putCandidatoPorId(token, candidatoId, fullPayload);

                const rawMeAfter = await fetchMeWithFallback(token);
                renderAll(rawMeAfter, jwt);

                showAlert("ok", "Dados atualizados com sucesso!");
                setTimeout(() => closeModal("modalAtualizarPerfil"), 650);
            } catch (err) {
                const msg = String(err?.message || "");
                if (msg.includes("-> 500")) showAlert("err", "Não foi possível salvar. Verifique campos obrigatórios e tente novamente.");
                else showAlert("err", err?.message || "Erro ao salvar.");
                console.error(err);
            } finally {
                if (btnSave) {
                    btnSave.disabled = false;
                    btnSave.innerHTML = `<i class="fa-solid fa-floppy-disk"></i> Salvar alterações`;
                }
            }
        });
    }

    /* =========================
      BOTÕES EDITAR (SEM DUPLICAR)
      - usa a classe .pf-tag pra ficar igual
      - move a tag pra um wrapper à direita e coloca o botão lá
    ========================= */
    function injectEditButtons() {
        const ensureRight = (head) => {
            if (!head) return null;
            let right = head.querySelector(".pf-head-right");
            if (!right) {
                right = document.createElement("div");
                right.className = "pf-head-right";
                head.appendChild(right);
            }
            return right;
        };

        const apply = (blockId, tagId, attr) => {
            const head = document.querySelector(`#${blockId} .pf-card-head`);
            const tag = document.getElementById(tagId);
            if (!head || !tag) return;

            // mata containers antigos (de versões anteriores)
            head.querySelectorAll(".pf-head-actions").forEach((el) => el.remove());

            const right = ensureRight(head);

            // move a tag pro right (assim alinha tag + botão)
            if (tag.parentElement !== right) right.appendChild(tag);

            // cria o botão só se não existir
            if (!right.querySelector(`[${attr}]`)) {
                const btn = document.createElement("button");
                btn.type = "button";
                btn.className = "pf-tag pf-tag-btn";
                btn.setAttribute(attr, "");
                btn.innerHTML = `<i class="fa-solid fa-pen"></i> Editar`;
                right.appendChild(btn);
            }

            // garante layout flex do header (sem quebrar título)
            head.style.display = "flex";
            head.style.alignItems = "center";
            head.style.justifyContent = "space-between";
            head.style.gap = "10px";
        };

        apply("blocoExperiencias", "tagExperiencias", "data-edit-exp");
        apply("blocoFormacoes", "tagFormacoes", "data-edit-form");
    }

    /* =========================
      CSS (fixes + pendências + botão pf-tag)
    ========================= */
    function injectSafeCSS() {
        const id = "perfil-api-safe-css";
        if (document.getElementById(id)) return;

        const style = document.createElement("style");
        style.id = id;
        style.textContent = `
      /* email quebra normal */
      .pf-sidebar-identity { min-width: 0; }
      .pf-sidebar-identity p { min-width: 0; }
      #emailUsuario, #emailUsuarioHero {
        overflow-wrap:anywhere;
        word-break:break-word;
        white-space:normal;
        min-width:0;
      }

      /* pendências no box do score */
      .pf-pendencias{ margin-top:10px; }
      .pf-pendencias-title{ font-weight:800; font-size:13px; margin-top:8px; color:#0f172a; }
      .pf-pendencias-sub{ font-size:12px; margin-top:2px; color:#64748b; }
      .pf-pendencias-list{ list-style:none; padding:0; margin:8px 0 0; display:grid; gap:6px; }
      .pf-pendencias-list li{ display:flex; gap:8px; align-items:flex-start; font-size:12px; color:#64748b; }
      .pf-pendencias-list li i{ margin-top:2px; color:#2563eb; font-size:11px; }
      .pf-pendencias-more{ margin-top:6px; font-size:11.5px; color:#64748b; }

      /* head right (tag + botão) */
      .pf-head-right{ display:flex; align-items:center; gap:8px; margin-left:auto; flex-wrap:wrap; }
      .pf-tag.pf-tag-btn{ cursor:pointer; user-select:none; }
      .pf-tag.pf-tag-btn i{ margin-right:6px; }
      .pf-tag.pf-tag-btn:hover{ filter: brightness(.98); }
    `;
        document.head.appendChild(style);
    }

    /* =========================
      EDITAR EXP/FORM (modais)
    ========================= */
    function injectCadastroFormCSS() {
        const id = "pf-cadastrolike-css";
        if (document.getElementById(id)) return;

        const style = document.createElement("style");
        style.id = id;
        style.textContent = `
      #modalEditarExperiencias .stack,
      #modalEditarFormacoes .stack { display:grid; gap:12px; margin-top:12px; }

      #modalEditarExperiencias .stack-item,
      #modalEditarFormacoes .stack-item {
        border: 1px solid rgba(212,216,229,.98);
        border-radius: 16px;
        background: rgba(255,255,255,.98);
        padding: 12px;
      }

      #modalEditarExperiencias .grid,
      #modalEditarFormacoes .grid {
        display:grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
      }

      @media (max-width: 720px) {
        #modalEditarExperiencias .grid,
        #modalEditarFormacoes .grid { grid-template-columns: 1fr; }
      }

      #modalEditarExperiencias .field label,
      #modalEditarFormacoes .field label { display:block; font-weight:700; font-size:12.5px; margin-bottom:6px; }

      #modalEditarExperiencias .field input,
      #modalEditarFormacoes .field input,
      #modalEditarExperiencias .field select,
      #modalEditarFormacoes .field select,
      #modalEditarExperiencias .field textarea,
      #modalEditarFormacoes .field textarea {
        width:100%;
        border-radius: 14px;
        border: 1px solid rgba(212,216,229,.98);
        background: rgba(248,250,252,.96);
        padding: 11px 12px;
        font-size: 13.5px;
        outline:none;
      }

      #modalEditarExperiencias .field textarea { min-height: 110px; resize: vertical; }
      #modalEditarExperiencias .field.full { grid-column: 1 / -1; }

      #modalEditarExperiencias .checkline,
      #modalEditarFormacoes .checkline {
        display:flex; align-items:center; gap:8px;
        margin-top:10px;
        font-size: 12.5px;
        color:#334155;
      }

      #modalEditarExperiencias .btn.add,
      #modalEditarFormacoes .btn.add {
        margin-top:12px;
        border-radius: 999px;
        padding: 10px 12px;
        border: 1px solid rgba(37,99,235,.26);
        background: rgba(37,99,235,.08);
        color:#1d4ed8;
        font-weight: 800;
        cursor:pointer;
      }

      .pf-item-head {
        display:flex; align-items:center; justify-content:space-between; gap:10px;
        margin-bottom:10px;
      }
      .pf-item-head strong { font-size: 13px; }
      .pf-mini-danger {
        border-radius:999px;
        border: 1px solid rgba(239,68,68,.35);
        background: rgba(239,68,68,.08);
        color:#991b1b;
        padding: 8px 10px;
        cursor:pointer;
        font-size:12px;
      }
    `;
        document.head.appendChild(style);
    }

    const CARGOS_DATALIST = `
    <datalist id="pf_cargos">
      <option>Assistente Administrativo</option>
      <option>Analista Financeiro</option>
      <option>Auxiliar de Produção</option>
      <option>Desenvolvedor Front-end</option>
      <option>Desenvolvedor Back-end</option>
      <option>Designer</option>
      <option>Estagiário</option>
    </datalist>
  `;

    function ensureModalExperiencias() {
        if (document.getElementById("modalEditarExperiencias")) return;

        const wrap = document.createElement("div");
        wrap.className = "pf-modal";
        wrap.id = "modalEditarExperiencias";
        wrap.setAttribute("aria-hidden", "true");

        wrap.innerHTML = `
      <div class="pf-modal-overlay" data-close-modal="modalEditarExperiencias"></div>
      <div class="pf-modal-dialog" role="dialog" aria-modal="true" aria-labelledby="titleEditarExperiencias">
        <header class="pf-modal-header">
          <div>
            <div class="pf-modal-title" id="titleEditarExperiencias">Editar experiências</div>
            <p class="pf-modal-sub">Use os mesmos campos do seu cadastro. Depois clique em Salvar.</p>
          </div>
          <button class="pf-modal-close" type="button" data-close-modal="modalEditarExperiencias">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </header>

        <div class="pf-modal-body">
          <div class="pf-form-alert" data-modal-alert style="display:none;"></div>

          ${CARGOS_DATALIST}

          <div id="pfExperienciasList" class="stack"></div>

          <button type="button" class="btn add" data-add-exp>+ Adicionar experiência</button>

          <div class="pf-line" style="margin:12px 0;"></div>

          <div class="pf-form-actions">
            <button class="pf-form-btn ghost" type="button" data-close-modal="modalEditarExperiencias">Cancelar</button>
            <button class="pf-form-btn primary" type="button" data-save-exp>
              <i class="fa-solid fa-floppy-disk"></i> Salvar experiências
            </button>
          </div>
        </div>
      </div>
    `;
        document.body.appendChild(wrap);
    }

    function ensureModalFormacoes() {
        if (document.getElementById("modalEditarFormacoes")) return;

        const wrap = document.createElement("div");
        wrap.className = "pf-modal";
        wrap.id = "modalEditarFormacoes";
        wrap.setAttribute("aria-hidden", "true");

        wrap.innerHTML = `
      <div class="pf-modal-overlay" data-close-modal="modalEditarFormacoes"></div>
      <div class="pf-modal-dialog" role="dialog" aria-modal="true" aria-labelledby="titleEditarFormacoes">
        <header class="pf-modal-header">
          <div>
            <div class="pf-modal-title" id="titleEditarFormacoes">Editar formações</div>
            <p class="pf-modal-sub">Use os mesmos campos do seu cadastro. Depois clique em Salvar.</p>
          </div>
          <button class="pf-modal-close" type="button" data-close-modal="modalEditarFormacoes">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </header>

        <div class="pf-modal-body">
          <div class="pf-form-alert" data-modal-alert style="display:none;"></div>

          <div id="pfFormacoesList" class="stack"></div>

          <button type="button" class="btn add" data-add-form>+ Adicionar formação</button>

          <div class="pf-line" style="margin:12px 0;"></div>

          <div class="pf-form-actions">
            <button class="pf-form-btn ghost" type="button" data-close-modal="modalEditarFormacoes">Cancelar</button>
            <button class="pf-form-btn primary" type="button" data-save-form>
              <i class="fa-solid fa-floppy-disk"></i> Salvar formações
            </button>
          </div>
        </div>
      </div>
    `;
        document.body.appendChild(wrap);
    }

    function expItemHTML(data = {}, idx = 0) {
        const cargo = escapeHTML(data?.cargo || "");
        const empresa = escapeHTML(data?.empresa || "");
        const desc = escapeHTML(data?.descricao || "");
        const inicio = escapeHTML(monthFromApiDate(data?.dataInicio));
        const fim = escapeHTML(monthFromApiDate(data?.dataFim));
        const atual = !!data?.atual || (!fim && has(inicio));

        return `
      <div class="stack-item exp-item" data-exp-item>
        <div class="pf-item-head">
          <strong>Experiência ${idx + 1}</strong>
          <button type="button" class="pf-mini-danger" data-remove-exp>
            <i class="fa-solid fa-trash"></i> Remover
          </button>
        </div>

        <div class="grid">
          <div class="field">
            <label>Cargo</label>
            <input class="exp-required" list="pf_cargos" placeholder="Selecione ou digite um cargo" required value="${cargo}" />
          </div>

          <div class="field">
            <label>Empresa</label>
            <input class="exp-required" type="text" placeholder="Nome da empresa" required value="${empresa}" />
          </div>

          <div class="field">
            <label>Início</label>
            <input class="monthMaxToday exp-required" type="month" required value="${inicio}" />
          </div>

          <div class="field">
            <label>Término</label>
            <input class="monthMaxToday endMonthExp" type="month" ${atual ? "" : "required"} value="${fim}" ${atual ? "disabled" : ""} />
            <label class="checkline">
              <input type="checkbox" class="chk-current" ${atual ? "checked" : ""}>
              <span>Trabalho atualmente aqui</span>
            </label>
          </div>

          <div class="field full">
            <label>Descrição das atividades</label>
            <textarea class="exp-required" required placeholder="Descreva suas responsabilidades">${desc}</textarea>
          </div>
        </div>
      </div>
    `;
    }

    function formacaoItemHTML(data = {}, idx = 0) {
        const cursoVal = escapeHTML(data?.curso || "");
        const inst = escapeHTML(data?.instituicao || "");
        const inicio = escapeHTML(monthFromApiDate(data?.dataInicio));
        const fim = escapeHTML(monthFromApiDate(data?.dataFim));
        const ongoing = !fim;

        const nivelAtual = String(data?.nivel || data?.nivelFormacao || "SUPERIOR");
        const statusAtual = String(data?.status || data?.statusFormacao || (ongoing ? "CURSANDO" : "CONCLUIDO"));

        const known = [
            "Administração", "Contabilidade", "Direito", "Tecnologia da Informação", "Engenharia",
            "Recursos Humanos", "Marketing", "Saúde", "Educação", "Logística"
        ];
        const isOutro = cursoVal && !known.includes(cursoVal);

        return `
      <div class="stack-item formacao-item" data-form-item>
        <div class="pf-item-head">
          <strong>Formação ${idx + 1}</strong>
          <button type="button" class="pf-mini-danger" data-remove-form>
            <i class="fa-solid fa-trash"></i> Remover
          </button>
        </div>

        <div class="grid">
          <div class="field">
            <label>Área / Curso</label>
            <select class="cursoSelect" required>
              <option value="" disabled ${cursoVal ? "" : "selected"}>Selecione a área</option>
              ${known.map(k => `<option ${cursoVal === k ? "selected" : ""}>${k}</option>`).join("")}
              <option value="outro" ${isOutro ? "selected" : ""}>Outro</option>
            </select>
          </div>

          <div class="field outroCursoCampo" style="display:${isOutro ? "block" : "none"};">
            <label>Informe o curso</label>
            <input type="text" placeholder="Digite o nome do curso" ${isOutro ? "required" : ""} value="${isOutro ? cursoVal : ""}" />
          </div>

          <div class="field">
            <label>Instituição</label>
            <input type="text" placeholder="Nome da instituição" required value="${inst}" />
          </div>

          <div class="field">
            <label>Nível</label>
            <select class="nivelFormacaoSelect" required>
              <option value="FUNDAMENTAL" ${nivelAtual === "FUNDAMENTAL" ? "selected" : ""}>Fundamental</option>
              <option value="MEDIO" ${nivelAtual === "MEDIO" ? "selected" : ""}>Médio</option>
              <option value="TECNICO" ${nivelAtual === "TECNICO" ? "selected" : ""}>Técnico</option>
              <option value="SUPERIOR" ${nivelAtual === "SUPERIOR" ? "selected" : ""}>Superior</option>
              <option value="POS_GRADUACAO" ${nivelAtual === "POS_GRADUACAO" ? "selected" : ""}>Pós-graduação</option>
              <option value="MBA" ${nivelAtual === "MBA" ? "selected" : ""}>MBA</option>
              <option value="MESTRADO" ${nivelAtual === "MESTRADO" ? "selected" : ""}>Mestrado</option>
              <option value="DOUTORADO" ${nivelAtual === "DOUTORADO" ? "selected" : ""}>Doutorado</option>
            </select>
          </div>

          <div class="field">
            <label>Início</label>
            <input type="month" class="monthMaxToday" required value="${inicio}" />
          </div>

          <div class="field">
            <label>Término</label>
            <input type="month" class="monthMaxToday endMonth" ${ongoing ? "" : "required"} value="${fim}" ${ongoing ? "disabled" : ""} />
            <label class="checkline">
              <input type="checkbox" class="chk-ongoing" ${ongoing ? "checked" : ""}>
              <span>Em andamento</span>
            </label>
          </div>
        </div>
      </div>
    `;
    }

    function setMonthMaxToday(scopeEl) {
        const max = new Date().toISOString().slice(0, 7);
        scopeEl.querySelectorAll('input[type="month"].monthMaxToday').forEach((inp) => {
            inp.max = max;
        });
    }

    function toggleOutroCurso(selectEl) {
        const item = selectEl.closest(".formacao-item");
        if (!item) return;
        const outro = item.querySelector(".outroCursoCampo");
        const outroInput = outro?.querySelector("input");
        if (!outro || !outroInput) return;

        if (selectEl.value === "outro") {
            outro.style.display = "block";
            outroInput.required = true;
            outroInput.focus();
        } else {
            outro.style.display = "none";
            outroInput.required = false;
            outroInput.value = "";
        }
    }

    function renderExperienciasModal(exps) {
        const list = document.getElementById("pfExperienciasList");
        if (!list) return;

        list.innerHTML = "";
        const arr = Array.isArray(exps) ? exps : [];

        if (!arr.length) list.innerHTML = expItemHTML({}, 0);
        else arr.forEach((e, i) => (list.innerHTML += expItemHTML(e, i)));

        setMonthMaxToday(list);
    }

    function renderFormacoesModal(forms) {
        const list = document.getElementById("pfFormacoesList");
        if (!list) return;

        list.innerHTML = "";
        const arr = Array.isArray(forms) ? forms : [];

        if (!arr.length) list.innerHTML = formacaoItemHTML({}, 0);
        else arr.forEach((f, i) => (list.innerHTML += formacaoItemHTML(f, i)));

        setMonthMaxToday(list);
    }

    function reindexModalItems(modalId, type) {
        const modal = document.getElementById(modalId);
        if (!modal) return;

        if (type === "exp") {
            modal.querySelectorAll("[data-exp-item] .pf-item-head strong").forEach((s, i) => {
                s.textContent = `Experiência ${i + 1}`;
            });
        } else {
            modal.querySelectorAll("[data-form-item] .pf-item-head strong").forEach((s, i) => {
                s.textContent = `Formação ${i + 1}`;
            });
        }
    }

    function gatherExperienciasFromModal(modalEl) {
        const items = Array.from(modalEl.querySelectorAll(".exp-item"));
        const out = [];

        for (let i = 0; i < items.length; i++) {
            const item = items[i];

            const meses = item.querySelectorAll('input[type="month"]');
            const inicioM = meses[0]?.value || "";
            const fimM = meses[1]?.value || "";

            const empresaEl = item.querySelector('input[placeholder="Nome da empresa"]');
            const cargoEl = item.querySelector('input[list], input[placeholder*="cargo" i]');
            const descEl = item.querySelector("textarea");
            const chk = item.querySelector(".chk-current");

            const empresa = String(empresaEl?.value || "").trim();
            const cargo = String(cargoEl?.value || "").trim();
            const descricao = String(descEl?.value || "").trim();
            const atual = !!chk?.checked;

            const total = (empresa + cargo + descricao + inicioM + fimM).trim();
            if (!total) continue;

            if (!cargo) return { ok: false, msg: `Preencha o Cargo na experiência ${i + 1}.` };
            if (!empresa) return { ok: false, msg: `Preencha a Empresa na experiência ${i + 1}.` };
            if (!inicioM) return { ok: false, msg: `Preencha o Início na experiência ${i + 1}.` };
            if (!descricao) return { ok: false, msg: `Preencha a Descrição na experiência ${i + 1}.` };

            if (!atual && !fimM) return { ok: false, msg: `Preencha o Término ou marque "Trabalho atualmente aqui" na experiência ${i + 1}.` };

            out.push({
                empresa,
                cargo,
                descricao,
                dataInicio: apiDateFromMonth(inicioM),
                dataFim: atual ? null : apiDateFromMonth(fimM),
                atual: atual || !fimM,
            });
        }

        return { ok: true, value: out };
    }

    function gatherFormacoesFromModal(modalEl) {
        const items = Array.from(modalEl.querySelectorAll(".formacao-item"));
        const out = [];

        for (let i = 0; i < items.length; i++) {
            const item = items[i];

            const cursoSelect = item.querySelector("select.cursoSelect");
            const outroInput = item.querySelector(".outroCursoCampo input");
            const nivelSelect = item.querySelector(".nivelFormacaoSelect");
            const meses = item.querySelectorAll('input[type="month"]');

            const inicioM = meses[0]?.value || "";
            const fimM = meses[1]?.value || "";

            const instEl = item.querySelector('input[placeholder="Nome da instituição"]');
            const chk = item.querySelector(".chk-ongoing");


            const total = (inst + curso + nivel + inicioM + fimM).trim();
            if (!total) continue;

            if (!curso) return { ok: false, msg: `Selecione/Informe o Curso na formação ${i + 1}.` };
            if (cursoRaw === "outro" && !String(outroInput?.value || "").trim()) {
                return { ok: false, msg: `Informe o curso (Outro) na formação ${i + 1}.` };
            }
            if (!inst) return { ok: false, msg: `Preencha a Instituição na formação ${i + 1}.` };
            if (!nivel) return { ok: false, msg: `Selecione o nível da formação ${i + 1}.` };
            if (!inicioM) return { ok: false, msg: `Preencha o Início na formação ${i + 1}.` };
            if (!ongoing && !fimM) {
                return { ok: false, msg: `Preencha o Término ou marque "Em andamento" na formação ${i + 1}.` };
            }

            out.push({
                instituicao: inst,
                curso,
                nivel,
                nivelFormacao: nivel,
                status: (ongoing || !fimM) ? "CURSANDO" : "CONCLUIDO",
                statusFormacao: (ongoing || !fimM) ? "CURSANDO" : "CONCLUIDO",
                dataInicio: apiDateFromMonth(inicioM),
                dataFim: (ongoing || !fimM) ? null : apiDateFromMonth(fimM),
            });
        }

        return { ok: true, value: out };
    }

    let _wiredModals = false;

    function wireModalsOnce() {
        if (_wiredModals) return;
        _wiredModals = true;

        document.addEventListener("click", (e) => {
            const t = e.target?.closest?.("[data-close-modal]");
            if (!t) return;
            e.preventDefault();
            closeModal(t.getAttribute("data-close-modal"));
        });

        const expModal = document.getElementById("modalEditarExperiencias");
        expModal?.addEventListener("click", (e) => {
            const add = e.target.closest("[data-add-exp]");
            if (add) {
                const list = document.getElementById("pfExperienciasList");
                const count = list ? list.querySelectorAll(".exp-item").length : 0;
                const wrapper = document.createElement("div");
                wrapper.innerHTML = expItemHTML({}, count);
                list.appendChild(wrapper.firstElementChild);
                setMonthMaxToday(list);
                reindexModalItems("modalEditarExperiencias", "exp");
                return;
            }

            const rm = e.target.closest("[data-remove-exp]");
            if (rm) {
                const item = rm.closest(".exp-item");
                item?.remove();

                const list = document.getElementById("pfExperienciasList");
                if (list && list.querySelectorAll(".exp-item").length === 0) {
                    list.innerHTML = expItemHTML({}, 0);
                    setMonthMaxToday(list);
                }
                reindexModalItems("modalEditarExperiencias", "exp");
                return;
            }

            const save = e.target.closest("[data-save-exp]");
            if (save) {
                (async () => {
                    modalAlertHide("modalEditarExperiencias");

                    const token = getToken();
                    if (!token) return logoutToLogin();

                    save.disabled = true;
                    save.innerHTML = `<i class="fa-solid fa-circle-notch fa-spin"></i> Salvando...`;

                    try {
                        const jwt = decodeJwt(token) || {};
                        const rawMe = await fetchMeWithFallback(token);
                        const before = unwrapMe(rawMe);

                        const candidatoId = localStorage.getItem("candidato_id") || pickCandidatoId(rawMe, jwt);
                        if (!candidatoId) {
                            modalAlert("modalEditarExperiencias", "err", "Não consegui identificar seu ID.");
                            return;
                        }

                        const gathered = gatherExperienciasFromModal(expModal);
                        if (!gathered.ok) {
                            modalAlert("modalEditarExperiencias", "err", gathered.msg);
                            return;
                        }

                        const payload = buildFullPutPayload(before, candidatoId, {
                            experiencias: gathered.value,
                            formacoes: Array.isArray(before?.formacoes) ? before.formacoes : [],
                        });

                        if (!payload.telefone) {
                            modalAlert("modalEditarExperiencias", "err", "Seu telefone está vazio no cadastro. Atualize seus dados antes de salvar.");
                            return;
                        }

                        await putCandidatoPorId(token, candidatoId, payload);

                        const rawAfter = await fetchMeWithFallback(token);
                        renderAll(rawAfter, jwt);

                        modalAlert("modalEditarExperiencias", "ok", "Experiências salvas com sucesso!");
                        setTimeout(() => closeModal("modalEditarExperiencias"), 500);
                    } catch (err) {
                        console.error(err);
                        modalAlert("modalEditarExperiencias", "err", "Erro ao salvar. Verifique os campos e tente novamente.");
                    } finally {
                        save.disabled = false;
                        save.innerHTML = `<i class="fa-solid fa-floppy-disk"></i> Salvar experiências`;
                    }
                })();
            }
        });

        expModal?.addEventListener("change", (e) => {
            const chk = e.target.closest(".chk-current");
            if (!chk) return;
            const item = chk.closest(".exp-item");
            const end = item?.querySelector(".endMonthExp");
            if (!end) return;

            if (chk.checked) {
                end.value = "";
                end.disabled = true;
                end.required = false;
            } else {
                end.disabled = false;
                end.required = true;
            }
        });

        const formModal = document.getElementById("modalEditarFormacoes");
        formModal?.addEventListener("click", (e) => {
            const add = e.target.closest("[data-add-form]");
            if (add) {
                const list = document.getElementById("pfFormacoesList");
                const count = list ? list.querySelectorAll(".formacao-item").length : 0;
                const wrapper = document.createElement("div");
                wrapper.innerHTML = formacaoItemHTML({}, count);
                list.appendChild(wrapper.firstElementChild);
                setMonthMaxToday(list);
                reindexModalItems("modalEditarFormacoes", "form");
                return;
            }

            const rm = e.target.closest("[data-remove-form]");
            if (rm) {
                const item = rm.closest(".formacao-item");
                item?.remove();

                const list = document.getElementById("pfFormacoesList");
                if (list && list.querySelectorAll(".formacao-item").length === 0) {
                    list.innerHTML = formacaoItemHTML({}, 0);
                    setMonthMaxToday(list);
                }
                reindexModalItems("modalEditarFormacoes", "form");
                return;
            }

            const save = e.target.closest("[data-save-form]");
            if (save) {
                (async () => {
                    modalAlertHide("modalEditarFormacoes");

                    const token = getToken();
                    if (!token) return logoutToLogin();

                    save.disabled = true;
                    save.innerHTML = `<i class="fa-solid fa-circle-notch fa-spin"></i> Salvando...`;

                    try {
                        const jwt = decodeJwt(token) || {};
                        const rawMe = await fetchMeWithFallback(token);
                        const before = unwrapMe(rawMe);

                        const candidatoId = localStorage.getItem("candidato_id") || pickCandidatoId(rawMe, jwt);
                        if (!candidatoId) {
                            modalAlert("modalEditarFormacoes", "err", "Não consegui identificar seu ID.");
                            return;
                        }

                        const gathered = gatherFormacoesFromModal(formModal);
                        if (!gathered.ok) {
                            modalAlert("modalEditarFormacoes", "err", gathered.msg);
                            return;
                        }

                        const payload = buildFullPutPayload(before, candidatoId, {
                            formacoes: gathered.value,
                            experiencias: Array.isArray(before?.experiencias) ? before.experiencias : [],
                        });

                        if (!payload.telefone) {
                            modalAlert("modalEditarFormacoes", "err", "Seu telefone está vazio no cadastro. Atualize seus dados antes de salvar.");
                            return;
                        }

                        await putCandidatoPorId(token, candidatoId, payload);

                        const rawAfter = await fetchMeWithFallback(token);
                        renderAll(rawAfter, jwt);

                        modalAlert("modalEditarFormacoes", "ok", "Formações salvas com sucesso!");
                        setTimeout(() => closeModal("modalEditarFormacoes"), 500);
                    } catch (err) {
                        console.error(err);
                        modalAlert("modalEditarFormacoes", "err", "Erro ao salvar. Verifique os campos e tente novamente.");
                    } finally {
                        save.disabled = false;
                        save.innerHTML = `<i class="fa-solid fa-floppy-disk"></i> Salvar formações`;
                    }
                })();
            }
        });

        formModal?.addEventListener("change", (e) => {
            const chk = e.target.closest(".chk-ongoing");
            if (chk) {
                const item = chk.closest(".formacao-item");
                const end = item?.querySelector(".endMonth");
                if (!end) return;

                if (chk.checked) {
                    end.value = "";
                    end.disabled = true;
                    end.required = false;
                } else {
                    end.disabled = false;
                    end.required = true;
                }
                return;
            }

            const sel = e.target.closest("select.cursoSelect");
            if (sel) toggleOutroCurso(sel);
        });
    }

    function wireOpenEditButtons() {
        document.addEventListener("click", async (e) => {
            const btnExp = e.target.closest("[data-edit-exp]");
            const btnForm = e.target.closest("[data-edit-form]");
            if (!btnExp && !btnForm) return;

            const token = getToken();
            if (!token) return logoutToLogin();

            const jwt = decodeJwt(token) || {};
            const rawMe = await fetchMeWithFallback(token);
            const { candidato, candidatoId } = normalizeForRender(rawMe, jwt);

            if (candidatoId) localStorage.setItem("candidato_id", String(candidatoId));

            if (btnExp) {
                modalAlertHide("modalEditarExperiencias");
                renderExperienciasModal(candidato.experiencias || []);
                openModal("modalEditarExperiencias");
            }

            if (btnForm) {
                modalAlertHide("modalEditarFormacoes");
                renderFormacoesModal(candidato.formacoes || []);
                openModal("modalEditarFormacoes");
            }
        });
    }

    /* =========================
      BOOT
    ========================= */
    document.addEventListener("DOMContentLoaded", async () => {
        try {
            injectSafeCSS();
            injectCadastroFormCSS();

            ensureModalExperiencias();
            ensureModalFormacoes();

            wireModalsOnce();

            // injeta botão 1x, sem duplicar
            injectEditButtons();
            wireOpenEditButtons();

            wireEditPerfilFlow();

            const token = getToken();
            if (!token) return logoutToLogin();

            const jwt = decodeJwt(token) || {};
            const rawMe = await fetchMeWithFallback(token);

            renderAll(rawMe, jwt);
        } catch (e) {
            console.error(e);
            alert("Não foi possível carregar seu perfil agora. Verifique API/IP/porta e tente novamente.");
        }
    });

})();
