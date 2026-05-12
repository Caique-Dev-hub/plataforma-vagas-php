(() => {
    "use strict";

    const API_BASE = window.JobHub_API_BASE || "";
    const API_URL = `${API_BASE}/empresa/cadastro`;

    const $ = (s) => document.querySelector(s);
    const $$ = (s) => Array.from(document.querySelectorAll(s));

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
       Loading
    ========================= */
    function setLoading(on) {
        const loader = $("#loader");
        if (loader) loader.classList.toggle("show", !!on);

        // evita duplo clique (mas mantém o "olhinho" clicável)
        $$("button[type='submit']").forEach((b) => (b.disabled = !!on));
    }

    /* =========================
       Helpers
    ========================= */
    function limparNumero(v) {
        return String(v || "").replace(/\D/g, "");
    }

    function getValue(name) {
        const el = document.querySelector(`[name="${name}"]`);
        return el ? String(el.value || "").trim() : "";
    }

    function getNumber(name) {
        const n = Number(String(getValue(name)).replace(",", "."));
        return Number.isFinite(n) ? n : NaN;
    }

    async function postJSON(url, data) {
        const resp = await fetch(url, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(data),
        });

        if (!resp.ok) {
            // tenta capturar erro do backend de forma decente
            let msg = "";
            try {
                const j = await resp.json();
                msg = j?.message || j?.mensagem || JSON.stringify(j);
            } catch {
                msg = await resp.text().catch(() => "");
            }
            throw new Error(msg || `HTTP ${resp.status}`);
        }

        const ct = resp.headers.get("content-type") || "";
        if (ct.includes("application/json")) return resp.json();
        return { message: "Cadastro realizado com sucesso" };
    }

    /* =========================
       Máscaras
    ========================= */
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

    /* =========================
       Validações
    ========================= */
    function validarEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(String(email || "").trim());
    }

    function validarTelefone(telMascarado) {
        const n = limparNumero(telMascarado);
        return n.length === 10 || n.length === 11;
    }

    function senhaForca(s) {
        let f = 0;
        if (s.length >= 8) f++;
        if (/[A-Z]/.test(s)) f++;
        if (/[0-9]/.test(s)) f++;
        if (/[^A-Za-z0-9]/.test(s)) f++;
        if (s.length >= 12) f++;
        return f;
    }

    function checkStrength() {
        const s = $("#senha")?.value || "";
        const nivel = $("#senhaNivel");
        const label = $("#strengthLabel");
        if (!nivel || !label) return;

        const f = senhaForca(s);
        nivel.style.width = `${(f / 5) * 100}%`;

        const map = { 0: "—", 1: "Fraca", 2: "Ok", 3: "Boa", 4: "Forte", 5: "Muito forte" };
        label.textContent = map[f] || "—";
    }

    /* =========================
       Filiais (mostrar/ocultar)
    ========================= */
    function setChipCheckedUI() {
        $$("[data-chip]").forEach((lab) => {
            const input = lab.querySelector("input[type='radio']");
            lab.classList.toggle("is-checked", !!input?.checked);
        });
    }

    function toggleFilial() {
        const r = document.querySelector("input[name='possuiFiliais']:checked");
        const box = $("#filialBox");
        const filial = $("#funcionariosFilial");
        if (!box || !filial) return;

        const sim = r && r.value === "true";
        box.style.display = sim ? "flex" : "none";

        if (sim) filial.setAttribute("required", "required");
        else {
            filial.removeAttribute("required");
            filial.value = "";
        }
    }

    function validateAll() {
        const form = $("#empresaForm");
        if (!form) return false;

        if (form.telefone) form.telefone.value = applyPhoneMask(form.telefone.value);
        if (form.cnpj) form.cnpj.value = applyCNPJMask(form.cnpj.value);

        const nomeEmpresa = getValue("nomeEmpresa");
        const funcionariosMatriz = getNumber("funcionariosMatriz");
        const cnpjMasked = getValue("cnpj");
        const ramo = getValue("ramo");

        const nomeRecrutador = getValue("nomeRecrutador");
        const emailCorporativo = getValue("emailCorporativo");
        const telefone = getValue("telefone");

        const senha = $("#senha")?.value || "";
        const confirmar = $("#confirmarSenha")?.value || "";

        const possuiFiliais =
            (document.querySelector("input[name='possuiFiliais']:checked")?.value || "false") === "true";
        const funcionariosFilial = getNumber("funcionariosFilial");

        if (nomeEmpresa.length < 2) return erroCampo(form.nomeEmpresa, "Nome da empresa é obrigatório"), false;

        if (!Number.isFinite(funcionariosMatriz) || funcionariosMatriz < 1)
            return erroCampo(form.funcionariosMatriz, "Funcionários (matriz) inválido"), false;

        if (possuiFiliais) {
            if (!Number.isFinite(funcionariosFilial) || funcionariosFilial < 1)
                return erroCampo($("#funcionariosFilial"), "Funcionários (filial) inválido"), false;
        }

        const cnpjDigits = limparNumero(cnpjMasked);
        if (cnpjDigits.length !== 14) return erroCampo(form.cnpj, "CNPJ inválido"), false;

        if (ramo.length < 2) return erroCampo(form.ramo, "Ramo é obrigatório"), false;

        if (nomeRecrutador.length < 3) return erroCampo(form.nomeRecrutador, "Nome do recrutador é obrigatório"), false;

        if (!validarEmail(emailCorporativo))
            return erroCampo(form.emailCorporativo, "E-mail corporativo inválido"), false;

        if (!validarTelefone(telefone)) return erroCampo(form.telefone, "Telefone inválido"), false;

        if (senha.length < 8) return erroCampo($("#senha"), "Senha deve ter no mínimo 8 caracteres"), false;

        if (senha !== confirmar) return erroCampo($("#confirmarSenha"), "As senhas não conferem"), false;

        return true;
    }

    function buildPayload() {
        // Pegando o valor booleano corretamente
        const possuiFiliais = (document.querySelector("input[name='possuiFiliais']:checked")?.value || "false") === "true";

        // Usando a função getNumber que já existe no seu script
        const funcionariosMatriz = Number(getNumber("funcionariosMatriz")) || 0;
        const funcionariosFilial = Number(getNumber("funcionariosFilial")) || 0;

        const unidades = [{ tipoUnidade: "MATRIZ", numeroFuncionarios: funcionariosMatriz }];

        if (possuiFiliais) {
            unidades.push({ tipoUnidade: "FILIAL", numeroFuncionarios: funcionariosFilial });
        }

        const senha = $("#senha")?.value || "";

        return {
            nomeEmpresa: getValue("nomeEmpresa"),
            // CNPJ: Se o seu Java validar o formato, mantemos a máscara. 
            // Se der erro 500 de novo, mude para: limparNumero(getValue("cnpj"))
            cnpj: applyCNPJMask(getValue("cnpj")),
            ramo: getValue("ramo"),
            possuiFiliais,

            // AJUSTE AQUI: Mudado de unidadeEmpresaDTO para unidade
            unidade: unidades,

            recrutadorDTO: {
                nome: getValue("nomeRecrutador"),
                emailCorporativo: getValue("emailCorporativo").toLowerCase(),
                telefone: limparNumero(getValue("telefone")),
                senha: senha
            },
        };
    }



    /* =========================
       Eventos
    ========================= */
    document.addEventListener("input", (e) => {
        const el = e.target;
        if (!el) return;

        if (el.name === "telefone") el.value = applyPhoneMask(el.value);
        if (el.name === "cnpj") el.value = applyCNPJMask(el.value);
        if (el.id === "senha") checkStrength();
    });

    document.addEventListener("change", (e) => {
        if (e.target.matches("input[name='possuiFiliais']")) {
            setChipCheckedUI();
            toggleFilial();
        }
    });

    // Olhinho (mostrar/ocultar senha)
    document.addEventListener("click", (e) => {
        const btn = e.target.closest(".toggle-pass");
        if (!btn) return;

        const targetId = btn.getAttribute("data-target");
        const input = document.getElementById(targetId);
        if (!input) return;

        const isHidden = input.type === "password";
        input.type = isHidden ? "text" : "password";

        btn.innerHTML = isHidden
            ? '<i class="fa-regular fa-eye-slash"></i>'
            : '<i class="fa-regular fa-eye"></i>';

        btn.setAttribute("aria-label", isHidden ? "Ocultar senha" : "Mostrar senha");
        btn.setAttribute("title", isHidden ? "Ocultar senha" : "Mostrar senha");
    });

    document.addEventListener("DOMContentLoaded", () => {
        setChipCheckedUI();
        toggleFilial();
        checkStrength();

        const form = $("#empresaForm");
        if (!form) return;

        form.addEventListener("submit", async (ev) => {
            ev.preventDefault();
            if (!validateAll()) return;

            const payload = buildPayload();
            console.log("PAYLOAD EMPRESA:", payload);

            setLoading(true);
            showToast("Enviando cadastro...", "info");

            try {
                const resp = await postJSON(API_URL, payload);

                showToast(resp?.message || "Cadastro realizado com sucesso", "ok");

                sessionStorage.setItem("login_prefill_mode", "recrutador");
                sessionStorage.setItem("login_prefill_email", payload.recrutadorDTO.emailCorporativo);
                sessionStorage.setItem("login_prefill_senha", payload.recrutadorDTO.senha);

                setTimeout(() => {
                    window.location.href = (window.JobHub_ROUTES?.LOGIN || `${window.URL_BASE || "/"}inicio`);
                }, 500);

            } catch (err) {
                console.error(err);
                showToast(err?.message || "Não foi possível concluir o cadastro. Verifique os dados e tente novamente.", "warn");
            } finally {
                setLoading(false);
            }
        });
    });
})();
