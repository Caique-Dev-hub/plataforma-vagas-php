/* ============================================================
   JobHub — Cadastro Empresa (API + UI)
   - POST /empresa/cadastro
   - Payload conforme contrato do backend
   - Toast + Loader + Redirect login + Prefill
============================================================ */

(() => {
    "use strict";

    /* =========================
       CONFIG
    ========================= */
    const API_BASE = window.JobHub_API_BASE || "";
    const EMPRESA_URL = `${API_BASE}/empresa/cadastro`;

    const $ = (s) => document.querySelector(s);
    const $$ = (s) => Array.from(document.querySelectorAll(s));

    /* =========================
       Loader
    ========================= */
    function setLoading(isLoading) {
        const loader = $("#loader");
        if (loader) loader.classList.toggle("show", !!isLoading);

        // evita duplo clique
        const submit = document.querySelector('button[type="submit"]');
        if (submit) submit.disabled = !!isLoading;
    }

    /* =========================
       Toast
    ========================= */
    function escapeHTML(str) {
        return String(str ?? "")
            .replaceAll("&", "&amp;")
            .replaceAll("<", "&lt;")
            .replaceAll(">", "&gt;")
            .replaceAll('"', "&quot;")
            .replaceAll("'", "&#39;");
    }

    function showToast(msg, type = "info") {
        const t = $("#toast");
        if (!t) return;

        const iconMap = {
            info: "fa-solid fa-circle-info",
            warn: "fa-solid fa-triangle-exclamation",
            ok: "fa-solid fa-circle-check",
        };

        t.innerHTML = `<i class="${iconMap[type] || iconMap.info}"></i><span>${escapeHTML(msg)}</span>`;
        t.classList.add("show");

        clearTimeout(showToast._timer);
        showToast._timer = setTimeout(() => t.classList.remove("show"), 1900);
    }

    function erroCampo(campo, mensagem) {
        showToast(mensagem, "warn");
        campo?.focus?.();
        if (campo?.classList) {
            campo.classList.add("campo-erro");
            setTimeout(() => campo.classList.remove("campo-erro"), 1200);
        }
    }

    /* =========================
       Fetch helper
    ========================= */
    async function postJSON(url, data) {
        const resp = await fetch(url, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(data),
        });

        if (!resp.ok) {
            // tenta ler json de erro, senão texto
            let msg = "";
            try {
                const j = await resp.json();
                msg = j?.message || j?.mensagem || JSON.stringify(j);
            } catch {
                msg = await resp.text().catch(() => "");
            }
            throw new Error(msg || `HTTP ${resp.status}`);
        }

        // sua resposta é { message: "Cadastro realizado com sucesso" }
        return resp.json().catch(() => ({}));
    }

    /* =========================
       Helpers / Masks
    ========================= */
    function limparNumero(v) {
        return String(v || "").replace(/\D/g, "");
    }

    function applyPhoneMask(d) {
        let v = String(d || "").replace(/\D/g, "").slice(0, 11);
        if (v.length <= 10) {
            return v.replace(/^(\d{0,2})(\d{0,4})(\d{0,4}).*/, (m, a, b, c) => {
                if (!a) return "";
                if (!b) return `(${a}`;
                if (!c) return `(${a}) ${b}`;
                return `(${a}) ${b}-${c}`;
            });
        }
        return v.replace(/^(\d{0,2})(\d{0,5})(\d{0,4}).*/, (m, a, b, c) => {
            if (!a) return "";
            if (!b) return `(${a}`;
            if (!c) return `(${a}) ${b}`;
            return `(${a}) ${b}-${c}`;
        });
    }

    function applyCNPJMask(d) {
        let v = String(d || "").replace(/\D/g, "").slice(0, 14);
        v = v
            .replace(/^(\d{2})(\d)/, "$1.$2")
            .replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3")
            .replace(/^(\d{2})\.(\d{3})\.(\d{3})(\d)/, "$1.$2.$3/$4")
            .replace(/^(\d{2})\.(\d{3})\.(\d{3})\/(\d{4})(\d)/, "$1.$2.$3/$4-$5");
        return v;
    }

    /* CNPJ válido */
    function validarCNPJ(cnpjMasked) {
        let cnpj = String(cnpjMasked || "").replace(/\D/g, "");
        if (cnpj.length !== 14) return false;
        if (/^(\d)\1+$/.test(cnpj)) return false;

        const calc = (base) => {
            let soma = 0;
            let pos = base.length - 7;
            for (let i = base.length; i >= 1; i--) {
                soma += Number(base.charAt(base.length - i)) * pos--;
                if (pos < 2) pos = 9;
            }
            const r = soma % 11;
            return r < 2 ? 0 : 11 - r;
        };

        const base12 = cnpj.slice(0, 12);
        const d1 = calc(base12);
        const d2 = calc(base12 + String(d1));

        return cnpj.endsWith(String(d1) + String(d2));
    }

    function validarEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(String(email || "").trim());
    }

    function validarTelefone(telefoneMascarado) {
        const n = limparNumero(telefoneMascarado);
        return n.length === 10 || n.length === 11;
    }

    /* =========================
       Chips + Filial
    ========================= */
    function setChipCheckedUI() {
        $$("[data-chip]").forEach((lab) => {
            const input = lab.querySelector("input[type='radio']");
            lab.classList.toggle("is-checked", !!input?.checked);
        });
    }

    function possuiFiliaisBool() {
        const r = document.querySelector("input[name='possuiFiliais']:checked");
        // HTML usa SIM/NAO, API quer boolean
        return (r && r.value === "SIM");
    }

    function toggleFilial() {
        const box = $("#filialBox");
        const filial = $("#funcionariosFilial");
        if (!box || !filial) return;

        const sim = possuiFiliaisBool();
        box.style.display = sim ? "flex" : "none";

        if (sim) filial.setAttribute("required", "required");
        else {
            filial.removeAttribute("required");
            filial.value = "";
        }
    }

    /* =========================
       JWT/storage -> usuarioId
    ========================= */
    function safeJsonParse(s) {
        try { return JSON.parse(s); } catch { return null; }
    }

    function decodeJwtPayload(token) {
        try {
            const parts = String(token).split(".");
            if (parts.length < 2) return null;
            const base64 = parts[1].replace(/-/g, "+").replace(/_/g, "/");
            const json = decodeURIComponent(
                atob(base64)
                    .split("")
                    .map(c => "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2))
                    .join("")
            );
            return safeJsonParse(json);
        } catch {
            return null;
        }
    }

    function tryGetUsuarioId() {
        // 1) storage direto
        const keys = ["usuarioId", "userId", "idUsuario", "id", "uid"];
        for (const k of keys) {
            const v = sessionStorage.getItem(k) || localStorage.getItem(k);
            const n = Number(v);
            if (Number.isFinite(n) && n > 0) return n;
        }

        // 2) token JWT
        const tokenKeys = ["token", "access_token", "jwt", "AUTH_TOKEN"];
        for (const tk of tokenKeys) {
            const token = sessionStorage.getItem(tk) || localStorage.getItem(tk);
            if (!token) continue;

            const payload = decodeJwtPayload(token);
            if (!payload) continue;

            const possible = [
                payload.usuarioId,
                payload.userId,
                payload.idUsuario,
                payload.id,
                (typeof payload.sub === "number" ? payload.sub : Number(payload.sub))
            ];

            for (const p of possible) {
                const n = Number(p);
                if (Number.isFinite(n) && n > 0) return n;
            }
        }

        return null;
    }

    /* =========================
       Payload (conforme backend)
    ========================= */
    function getPayloadEmpresa() {
        const form = $("#empresaForm");
        const sim = possuiFiliaisBool();

        const nomeEmpresa = String(form?.nomeEmpresa?.value || "").trim();
        const cnpjMas = String(form?.cnpj?.value || "").trim();
        const ramo = String(form?.ramo?.value || "").trim();

        const nomeRec = String(form?.nomeRecrutador?.value || "").trim();
        const email = String(form?.emailCorporativo?.value || "").trim().toLowerCase();
        const telMas = String(form?.telefone?.value || "").trim();

        const matriz = Number(form?.funcionariosMatriz?.value || 0);
        const filial = Number($("#funcionariosFilial")?.value || 0);

        const usuarioId = tryGetUsuarioId(); // 🔥 pega do storage/JWT

        const unidadeEmpresaDTO = [
            { tipoUnidade: "MATRIZ", numeroFuncionarios: matriz },
            ...(sim ? [{ tipoUnidade: "FILIAL", numeroFuncionarios: filial }] : []),
        ];

        return {
            nomeEmpresa,
            cnpj: applyCNPJMask(cnpjMas),               // manda no formato do exemplo
            ramo,
            possuiFiliais: sim,                         // boolean
            unidadeEmpresaDTO,
            recrutadorDTO: {
                nome: nomeRec,
                emailCorporativo: email,
                telefone: limparNumero(telMas),           // exemplo manda só números
            },
            usuarioId: usuarioId,                       // obrigatório no contrato
        };
    }

    /* =========================
       Validação antes do POST
    ========================= */
    function validateAll() {
        const form = $("#empresaForm");
        if (!form) return false;

        // aplica máscara nos inputs
        if (form.cnpj) form.cnpj.value = applyCNPJMask(form.cnpj.value);
        if (form.telefone) form.telefone.value = applyPhoneMask(form.telefone.value);

        const sim = possuiFiliaisBool();

        const nomeEmpresa = String(form.nomeEmpresa?.value || "").trim();
        const cnpj = String(form.cnpj?.value || "").trim();
        const ramo = String(form.ramo?.value || "").trim();

        const matriz = Number(form.funcionariosMatriz?.value || 0);
        const filial = Number($("#funcionariosFilial")?.value || 0);

        const nomeRec = String(form.nomeRecrutador?.value || "").trim();
        const email = String(form.emailCorporativo?.value || "").trim();
        const telefone = String(form.telefone?.value || "").trim();

        const senha = String($("#senha")?.value || "");
        const confirmar = String($("#confirmarSenha")?.value || "");

        if (nomeEmpresa.length < 2) return erroCampo(form.nomeEmpresa, "Nome da empresa é obrigatório"), false;

        if (!Number.isFinite(matriz) || matriz < 1)
            return erroCampo(form.funcionariosMatriz, "Número de funcionários (matriz) inválido"), false;

        if (sim && (!Number.isFinite(filial) || filial < 1))
            return erroCampo($("#funcionariosFilial"), "Número de funcionários (filial) inválido"), false;

        if (!validarCNPJ(cnpj)) return erroCampo(form.cnpj, "CNPJ inválido"), false;

        if (ramo.length < 2) return erroCampo(form.ramo, "Ramo é obrigatório"), false;

        if (nomeRec.length < 3) return erroCampo(form.nomeRecrutador, "Nome do recrutador é obrigatório"), false;

        if (!validarEmail(email)) return erroCampo(form.emailCorporativo, "E-mail corporativo inválido"), false;

        if (!validarTelefone(telefone)) return erroCampo(form.telefone, "Telefone inválido"), false;

        // senha (mesmo que API não use, você usa pro login do recrutador)
        if (senha.length < 8) return erroCampo($("#senha"), "Senha deve ter no mínimo 8 caracteres"), false;
        if (senha !== confirmar) return erroCampo($("#confirmarSenha"), "As senhas não conferem"), false;

        // usuarioId obrigatório no contrato
        const usuarioId = tryGetUsuarioId();
        if (!usuarioId) {
            showToast("Não achei o usuarioId. Salve o ID no storage antes de cadastrar a empresa.", "warn");
            // dica prática
            console.warn("Dica: sessionStorage.setItem('usuarioId', '5') para teste.");
            return false;
        }

        return true;
    }

    /* =========================
       Eventos
    ========================= */
    document.addEventListener("input", (e) => {
        const el = e.target;
        if (el?.name === "telefone") el.value = applyPhoneMask(el.value);
        if (el?.name === "cnpj") el.value = applyCNPJMask(el.value);
    });

    document.addEventListener("change", (e) => {
        if (e.target.matches("input[name='possuiFiliais']")) {
            setChipCheckedUI();
            toggleFilial();
        }
    });

    document.addEventListener("DOMContentLoaded", () => {
        setChipCheckedUI();
        toggleFilial();

        const form = $("#empresaForm");
        if (!form) return;

        form.addEventListener("submit", async (ev) => {
            ev.preventDefault();

            if (!validateAll()) return;

            const payload = getPayloadEmpresa();
            console.log("PAYLOAD EMPRESA:", payload);

            try {
                setLoading(true);
                showToast("Enviando cadastro...", "info");

                const resp = await postJSON(EMPRESA_URL, payload);

                showToast(resp.message || "Cadastro realizado com sucesso.", "ok");

                // Prefill do login (igual candidato)
                const senha = String($("#senha")?.value || "");
                sessionStorage.setItem("login_prefill_email", payload.recrutadorDTO.emailCorporativo);
                sessionStorage.setItem("login_prefill_senha", senha);

                setTimeout(() => {
                    window.location.href = (window.JobHub_ROUTES?.LOGIN || `${window.URL_BASE || "/"}inicio`);
                }, 600);

            } catch (err) {
                console.error(err);
                showToast(err?.message || "Erro ao cadastrar empresa. Tente novamente.", "warn");
                setLoading(false);
            }
        });
    });

})();
