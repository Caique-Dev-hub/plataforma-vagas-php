(() => {
    "use strict";

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
        // 00.000.000/0000-00
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

    function validarTelefone(telefoneMascarado) {
        const n = String(telefoneMascarado || "").replace(/\D/g, "");
        return n.length === 10 || n.length === 11;
    }

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

    function senhaForca(senha) {
        let forca = 0;
        if (senha.length >= 8) forca++;
        if (/[A-Z]/.test(senha)) forca++;
        if (/[0-9]/.test(senha)) forca++;
        if (/[^A-Za-z0-9]/.test(senha)) forca++;
        if (senha.length >= 12) forca++;
        return forca; // 0..5
    }

    function checkStrength() {
        const senha = $("#senha")?.value || "";
        const nivel = $("#senhaNivel");
        const label = $("#strengthLabel");
        if (!nivel || !label) return;

        const f = senhaForca(senha);
        nivel.style.width = ((f / 5) * 100) + "%";
        const map = { 0: "—", 1: "Fraca", 2: "Ok", 3: "Boa", 4: "Forte", 5: "Muito forte" };
        label.textContent = map[f] || "—";
    }

    /* =========================
       Filial: mostrar/ocultar
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

        const sim = r && r.value === "SIM";
        if (!box || !filial) return;

        box.style.display = sim ? "flex" : "none";

        if (sim) {
            filial.setAttribute("required", "required");
        } else {
            filial.removeAttribute("required");
            filial.value = "";
        }
    }

    /* =========================
       Submit
    ========================= */
    function setLoading(on) {
        const loader = $("#loader");
        if (!loader) return;
        loader.classList.toggle("show", !!on);
    }

    function getFormValue(name) {
        const el = document.querySelector(`[name="${name}"]`);
        return el ? String(el.value || "").trim() : "";
    }

    function getFormNumber(name) {
        const v = getFormValue(name).replace(",", ".");
        const n = Number(v);
        return Number.isFinite(n) ? n : NaN;
    }

    function validateAll() {
        const form = $("#empresaForm");
        if (!form) return false;

        const nomeEmpresa = getFormValue("nomeEmpresa");
        const funcionariosMatriz = getFormNumber("funcionariosMatriz");
        const cnpj = getFormValue("cnpj");
        const ramo = getFormValue("ramo");
        const nomeRecrutador = getFormValue("nomeRecrutador");
        const email = getFormValue("emailCorporativo");
        const telefone = getFormValue("telefone");
        const senha = $("#senha")?.value || "";
        const confirmar = $("#confirmarSenha")?.value || "";

        const possuiFiliais = document.querySelector("input[name='possuiFiliais']:checked")?.value || "NAO";
        const filialVisivel = (possuiFiliais === "SIM");
        const funcionariosFilial = getFormNumber("funcionariosFilial");

        // Nome empresa
        if (nomeEmpresa.length < 2) return erroCampo(form.nomeEmpresa, "Nome da empresa é obrigatório"), false;

        // funcionários matriz
        if (!Number.isFinite(funcionariosMatriz) || funcionariosMatriz < 1) {
            return erroCampo(form.funcionariosMatriz, "Número de funcionários (matriz) inválido"), false;
        }

        // filial
        if (filialVisivel) {
            if (!Number.isFinite(funcionariosFilial) || funcionariosFilial < 1) {
                return erroCampo($("#funcionariosFilial"), "Número de funcionários (filial) inválido"), false;
            }
        }

        // CNPJ
        form.cnpj.value = applyCNPJMask(form.cnpj.value);
        if (!validarCNPJ(form.cnpj.value)) return erroCampo(form.cnpj, "CNPJ inválido"), false;

        // ramo
        if (ramo.length < 2) return erroCampo(form.ramo, "Ramo é obrigatório"), false;

        // recrutador
        if (nomeRecrutador.length < 3) return erroCampo(form.nomeRecrutador, "Nome do recrutador é obrigatório"), false;

        // email
        if (!validarEmail(email)) return erroCampo(form.emailCorporativo, "E-mail corporativo inválido"), false;

        // telefone
        form.telefone.value = applyPhoneMask(form.telefone.value);
        if (!validarTelefone(form.telefone.value)) return erroCampo(form.telefone, "Telefone inválido"), false;

        // senha
        if (senha.length < 8) return erroCampo($("#senha"), "Senha deve ter no mínimo 8 caracteres"), false;
        if (senha !== confirmar) return erroCampo($("#confirmarSenha"), "As senhas não conferem"), false;

        return true;
    }

    /* Substituir a função buildPayload por esta: */
    function buildPayload() {
        // 1. Pegando os valores usando os nomes corretos das funções do seu script
        const possuiFiliais = (document.querySelector("input[name='possuiFiliais']:checked")?.value === "true");

        // Mudado de getNumber para getFormNumber (ajuste para o seu script)
        const funcionariosMatriz = Number(getFormNumber("funcionariosMatriz")) || 0;
        const funcionariosFilial = Number(getFormNumber("funcionariosFilial")) || 0;

        const unidades = [{ tipoUnidade: "MATRIZ", numeroFuncionarios: funcionariosMatriz }];
        if (possuiFiliais) {
            unidades.push({ tipoUnidade: "FILIAL", numeroFuncionarios: funcionariosFilial });
        }

        return {
            nomeEmpresa: getFormValue("nomeEmpresa"),
            // LIMPEZA: Enviando CNPJ apenas números para evitar erro 500 de validação no Java
            cnpj: getFormValue("cnpj").replace(/\D/g, ""),
            ramo: getFormValue("ramo"),
            possuiFiliais: possuiFiliais,

            // Nomes que batem com seu Postman e DTO
            unidade: unidades,
            recrutadorDTO: {
                nome: getFormValue("nomeRecrutador"),
                emailCorporativo: getFormValue("emailCorporativo").toLowerCase(),
                telefone: getFormValue("telefone").replace(/\D/g, ""), // Apenas números
                senha: $("#senha")?.value || ""
            }
        };
    }

    /* =========================
       Eventos
    ========================= */
    document.addEventListener("input", (e) => {
        const el = e.target;

        if (el?.name === "telefone") el.value = applyPhoneMask(el.value);
        if (el?.name === "cnpj") el.value = applyCNPJMask(el.value);
        if (el?.id === "senha") checkStrength();
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
        checkStrength();

        const form = $("#empresaForm");
        if (!form) return;

        form.addEventListener("submit", async (ev) => {
            ev.preventDefault();

            if (!validateAll()) return;

            const payload = buildPayload();
            console.log("CADASTRO EMPRESA payload:", payload);

            setLoading(true);

            try {
                // 🔥 Aqui você integra com seu backend (quando quiser)
                // Exemplo:
                // const resp = await fetch(`${window.JobHub_API_BASE}/auth/cadastro-empresa`, {
                //   method: "POST",
                //   headers: { "Content-Type": "application/json" },
                //   body: JSON.stringify(payload)
                // });
                // if (!resp.ok) throw new Error("Falha ao cadastrar");

                await new Promise(r => setTimeout(r, 900)); // simula

                showToast("Empresa cadastrada com sucesso!", "ok");
                form.reset();
                setChipCheckedUI();
                toggleFilial();
                checkStrength();

                // opcional: redirecionar pro login
                // setTimeout(() => window.location.href = "./login.html", 900);

            } catch (err) {
                console.error(err);
                showToast("Não foi possível concluir o cadastro. Tente novamente.", "warn");
            } finally {
                setLoading(false);
            }
        });
    });

})();
// ===== OLHINHO (mostrar/ocultar senha) =====
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
