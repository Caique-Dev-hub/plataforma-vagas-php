/* ============================================================
   JobHub — Cadastro (UI)
   - Etapas + UI + Toast
   - Máscaras CPF/Telefone
   - Validações
   - NÃO sanitiza nome no INPUT (pra não travar espaço)
============================================================ */

let etapa = 1;
const totalEtapas = 5;

const meta = {
    1: { title: "Dados de contato", sub: "Informe seus dados para iniciarmos o cadastro.", stage: "Boas-vindas", hint: "Comece com suas informações de contato.", icon: "fa-solid fa-address-card" },
    2: { title: "Dados pessoais", sub: "Agora precisamos de algumas informações pessoais.", stage: "Perfil", hint: "Esses dados ajudam a organizar seu perfil.", icon: "fa-solid fa-user" },
    3: { title: "Formação", sub: "Adicione sua formação acadêmica.", stage: "Formação", hint: "Marque “Em andamento” se ainda estiver cursando.", icon: "fa-solid fa-graduation-cap" },
    4: { title: "Experiência", sub: "Conte sua experiência profissional, se houver.", stage: "Experiência", hint: "Sem experiência? Você pode seguir normalmente.", icon: "fa-solid fa-briefcase" },
    5: { title: "Senha", sub: "Defina sua senha para acessar o painel.", stage: "Segurança", hint: "Use uma senha forte e finalize o cadastro.", icon: "fa-solid fa-lock" }
};

const $ = (s) => document.querySelector(s);
const $$ = (s) => Array.from(document.querySelectorAll(s));

/* =========================
   Toast
========================= */
function escapeHTML(str) {
    return String(str)
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
        ok: "fa-solid fa-circle-check"
    };

    const ico = iconMap[type] || iconMap.info;
    t.innerHTML = `<i class="${ico}"></i><span>${escapeHTML(msg)}</span>`;
    t.classList.add("show");

    clearTimeout(showToast._timer);
    showToast._timer = setTimeout(() => t.classList.remove("show"), 1800);
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
   Sanitização leve (sem matar espaço)
========================= */
function cleanNomeFinal(value) {
    return String(value || "")
        .replace(/[^\p{L}\s'-]/gu, "") // letras+espaço+'+-
        .replace(/\s{2,}/g, " ")
        .trim();
}

function cleanEmailFinal(value) {
    return String(value || "").toLowerCase().replace(/\s/g, "").trim();
}

function hardStrip(value) {
    if (value == null) return "";
    let s = String(value);
    s = s.replace(/[\u0000-\u001F\u007F-\u009F\u200B-\u200F\u202A-\u202E\u2060\uFEFF]/g, "");
    s = s.replace(/<[^>]*>/g, "");
    s = s.replace(/javascript\s*:/gi, "");
    s = s.replace(/data\s*:/gi, "");
    s = s.replace(/\s+/g, " ").trim();
    return s;
}

/* =========================
   Máscaras
========================= */
function applyCPFMask(d) {
    let v = String(d || "").replace(/\D/g, "").slice(0, 11);
    v = v
        .replace(/^(\d{3})(\d)/, "$1.$2")
        .replace(/^(\d{3})\.(\d{3})(\d)/, "$1.$2.$3")
        .replace(/^(\d{3})\.(\d{3})\.(\d{3})(\d)/, "$1.$2.$3-$4");
    return v;
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

/* wrappers globais pro HTML (oninput="...") */
window.maskCPF = (input) => (input.value = applyCPFMask(input.value));
window.mascaraTelefone = (input) => (input.value = applyPhoneMask(input.value));

/* =========================
   Validações
========================= */
function validarEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function validarNome(nome) {
    return cleanNomeFinal(nome).length >= 3;
}

function validarTelefone(telefoneMascarado) {
    const n = String(telefoneMascarado).replace(/\D/g, "");
    return n.length === 10 || n.length === 11;
}

function validarData(data) {
    if (!data) return false;
    const d = new Date(data + "T00:00:00");
    const now = new Date(); now.setHours(0, 0, 0, 0);
    return d <= now;
}

function validarMes(valor) {
    if (!valor) return false;
    const [ano, mes] = valor.split("-");
    const d = new Date(Number(ano), Number(mes) - 1, 1);
    const now = new Date();
    const nowMonth = new Date(now.getFullYear(), now.getMonth(), 1);
    return d <= nowMonth;
}

/* CPF */
function validarCPF(cpf) {
    cpf = String(cpf).replace(/\D/g, "");
    if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) return false;

    let soma = 0, resto;
    for (let i = 1; i <= 9; i++) soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) resto = 0;
    if (resto !== parseInt(cpf.substring(9, 10))) return false;

    soma = 0;
    for (let i = 1; i <= 10; i++) soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) resto = 0;

    return resto === parseInt(cpf.substring(10, 11));
}

/* =========================
   Datas máximas
========================= */
function setMaxDates() {
    const hoje = new Date();
    const ano = hoje.getFullYear();
    const mes = String(hoje.getMonth() + 1).padStart(2, "0");
    const dia = String(hoje.getDate()).padStart(2, "0");
    const maxDate = `${ano}-${mes}-${dia}`;
    const maxMonth = `${ano}-${mes}`;

    document.querySelectorAll('input[type="date"]').forEach(i => i.max = maxDate);
    document.querySelectorAll('input[type="month"]').forEach(i => i.max = maxMonth);
}

/* =========================
   Outro curso / Experiência
========================= */
window.toggleOutroCurso = (selectEl) => {
    const item = selectEl.closest(".formacao-item");
    if (!item) return;
    const box = item.querySelector(".outroCursoCampo");
    if (!box) return;
    box.style.display = (selectEl.value === "outro") ? "block" : "none";
};

function isExperienciaNao() {
    const r = document.querySelector('input[name="temExperiencia"]:checked');
    return r && r.value === "NAO";
}

function syncCurrentWork(chk) {
    const field = chk.closest(".field");
    if (!field) return;
    const end = field.querySelector(".endMonthExp");
    if (!end) return;

    if (chk.checked) {
        end.value = "";
        end.disabled = true;
        end.removeAttribute("required");
    } else {
        end.disabled = false;
        end.setAttribute("required", "required");
    }
}

function syncOngoingStudy(chk) {
    const field = chk.closest(".field");
    if (!field) return;
    const end = field.querySelector(".endMonth");
    if (!end) return;

    if (chk.checked) {
        end.value = "";
        end.disabled = true;
        end.removeAttribute("required");
    } else {
        end.disabled = false;
        end.setAttribute("required", "required");
    }
}

function applyExperienciaMode() {
    const wrap = $("#experienciaWrap");
    const btn = $("#btnAddExp");
    if (!wrap) return;

    const nao = isExperienciaNao();
    wrap.style.display = nao ? "none" : "block";
    if (btn) btn.style.display = nao ? "none" : "inline-flex";

    $$(".exp-required").forEach(el => {
        if (nao) el.removeAttribute("required");
        else el.setAttribute("required", "required");
    });

    if (!nao) $$(".chk-current").forEach(syncCurrentWork);
}

/* =========================
   Força senha
========================= */
function checkStrength() {
    const senha = $("#senha")?.value || "";
    const nivel = $("#senhaNivel");
    const label = $("#strengthLabel");
    if (!nivel || !label) return;

    let forca = 0;
    if (senha.length >= 8) forca++;
    if (/[A-Z]/.test(senha)) forca++;
    if (/[0-9]/.test(senha)) forca++;
    if (/[^A-Za-z0-9]/.test(senha)) forca++;
    if (senha.length >= 12) forca++;

    nivel.style.width = ((forca / 5) * 100) + "%";
    const map = { 0: "—", 1: "Fraca", 2: "Ok", 3: "Boa", 4: "Forte", 5: "Muito forte" };
    label.textContent = map[forca] || "—";
}
window.checkStrength = checkStrength;

/* =========================
   UI etapas
========================= */
function updateUI(step) {
    document.body.dataset.step = String(step);

    $$(".step").forEach((el, idx) => el.classList.toggle("active", idx === step - 1));
    $$(".stepper .dot").forEach((dot, idx) => dot.classList.toggle("active", idx === step - 1));

    $("#progressTitle") && ($("#progressTitle").textContent = meta[step].title);
    $("#progressSubtitle") && ($("#progressSubtitle").textContent = meta[step].sub);

    $("#stageMessage") && ($("#stageMessage").innerHTML =
        `<span class="stage-ico"><i class="${meta[step].icon}"></i></span>${escapeHTML(meta[step].stage)}`
    );

    $("#stageHint") && ($("#stageHint").textContent = meta[step].hint);
    $("#progressEtapa") && ($("#progressEtapa").textContent = `${step} de ${totalEtapas}`);
    $("#progressFill") && ($("#progressFill").style.width = `${(step / totalEtapas) * 100}%`);
}

/* valida início/fim por item */
function validarInicioFimPorItem(item, inicioSel, fimSel) {
    const inicio = item.querySelector(inicioSel);
    const fim = item.querySelector(fimSel);
    if (!inicio || !fim) return true;
    if (fim.disabled) return true;
    if (!inicio.value || !fim.value) return true;

    const di = new Date(inicio.value + "-01T00:00:00");
    const df = new Date(fim.value + "-01T00:00:00");
    if (di > df) {
        erroCampo(fim, "Término não pode ser anterior ao início");
        return false;
    }
    return true;
}

function validarEtapa(etapaAtual) {
    const step = document.getElementById(`step${etapaAtual}`);
    if (!step) return true;

    if (etapaAtual === 4 && isExperienciaNao()) return true;

    const campos = step.querySelectorAll("input, select, textarea");

    for (const campo of campos) {
        if (campo.offsetParent === null) continue;
        if (campo.disabled) continue;

        // aplica máscaras apenas
        if (campo.name === "cpf") campo.value = applyCPFMask(campo.value);
        if (campo.name === "telefone") campo.value = applyPhoneMask(campo.value);

        // sanitização FINAL (sem travar digitação)
        if (campo.name === "nomeCompleto") campo.value = cleanNomeFinal(campo.value);
        if (campo.name === "email") campo.value = cleanEmailFinal(campo.value);

        const label = campo.closest(".field")?.querySelector("label")?.innerText || "Campo";

        if (campo.required && !String(campo.value || "").trim()) {
            erroCampo(campo, `${label} é obrigatório`);
            return false;
        }

        if (campo.type === "email" && campo.value && !validarEmail(campo.value)) {
            erroCampo(campo, "E-mail inválido");
            return false;
        }

        if (campo.name === "nomeCompleto" && campo.value && !validarNome(campo.value)) {
            erroCampo(campo, "Nome inválido");
            return false;
        }

        if (campo.name === "cpf" && campo.value) {
            const digits = campo.value.replace(/\D/g, "");
            if (!validarCPF(digits)) {
                erroCampo(campo, "CPF inválido");
                return false;
            }
        }

        if (campo.name === "telefone" && campo.value && !validarTelefone(campo.value)) {
            erroCampo(campo, "Telefone inválido");
            return false;
        }

        if (campo.type === "date" && campo.value && !validarData(campo.value)) {
            erroCampo(campo, "A data não pode ser futura");
            return false;
        }

        if (campo.type === "month" && campo.value && !validarMes(campo.value)) {
            erroCampo(campo, "Mês/Ano não pode ser futuro");
            return false;
        }
    }

    if (etapaAtual === 3) {
        const items = $$("#formacoesList .formacao-item");
        for (const it of items) {
            if (!validarInicioFimPorItem(it, 'input[type="month"]', ".endMonth")) return false;
        }
    }

    if (etapaAtual === 4 && !isExperienciaNao()) {
        const items = $$("#experienciasList .exp-item");
        for (const it of items) {
            if (!validarInicioFimPorItem(it, 'input[type="month"]', ".endMonthExp")) return false;
        }
    }

    return true;
}

function nextStep() {
    if (!validarEtapa(etapa)) return;
    if (etapa >= totalEtapas) return;
    etapa++;
    updateUI(etapa);
}

function prevStep() {
    if (etapa <= 1) return;
    etapa--;
    updateUI(etapa);
}

window.nextStep = nextStep;
window.prevStep = prevStep;

// Expor validação pro arquivo de API usar antes de enviar
window.__cadastroUI = {
    validarEtapa,
    cleanNomeFinal,
    cleanEmailFinal,
    hardStrip,
    applyCPFMask,
    applyPhoneMask,
    showToast,
    erroCampo,
    isExperienciaNao,
};

/* =========================
   Add formação/experiência (clones)
========================= */
function addFormacao() {
    const list = $("#formacoesList");
    const first = list?.querySelector(".formacao-item");
    if (!list || !first) return;

    const clone = first.cloneNode(true);
    clone.querySelectorAll("input, select, textarea").forEach(el => {
        if (el.type === "checkbox") el.checked = false;
        else if (el.tagName === "SELECT") el.selectedIndex = 0;
        else el.value = "";
        el.disabled = false;
    });

    const outroBox = clone.querySelector(".outroCursoCampo");
    if (outroBox) outroBox.style.display = "none";

    list.appendChild(clone);
    setMaxDates();
    showToast("Formação adicionada.", "ok");
}

function addExperiencia() {
    const list = $("#experienciasList");
    const first = list?.querySelector(".exp-item");
    if (!list || !first) return;

    const clone = first.cloneNode(true);
    clone.querySelectorAll("input, textarea").forEach(el => {
        if (el.type === "checkbox") el.checked = false;
        else el.value = "";
        el.disabled = false;
    });

    list.appendChild(clone);
    setMaxDates();
    showToast("Experiência adicionada.", "ok");
}

window.addFormacao = addFormacao;
window.addExperiencia = addExperiencia;

/* =========================
   Eventos
========================= */
document.addEventListener("change", (e) => {
    if (e.target.matches('input[name="temExperiencia"]')) applyExperienciaMode();
    if (e.target.matches(".chk-current")) syncCurrentWork(e.target);
    if (e.target.matches(".chk-ongoing")) syncOngoingStudy(e.target);
});

document.addEventListener("input", (e) => {
    const el = e.target;

    // Só máscaras no input (nome NÃO)
    if (el?.name === "cpf") el.value = applyCPFMask(el.value);
    if (el?.name === "telefone") el.value = applyPhoneMask(el.value);

    if (el?.id === "senha") checkStrength();
});

// Nome e email só limpam ao SAIR do campo
document.addEventListener("blur", (e) => {
    const el = e.target;
    if (!(el instanceof HTMLInputElement)) return;

    if (el.name === "nomeCompleto") el.value = cleanNomeFinal(el.value);
    if (el.name === "email" || el.type === "email") el.value = cleanEmailFinal(el.value);
}, true);

document.addEventListener("DOMContentLoaded", () => {
    setMaxDates();
    updateUI(etapa);
    applyExperienciaMode();
    $$(".chk-current").forEach(syncCurrentWork);
    $$(".chk-ongoing").forEach(syncOngoingStudy);
});
