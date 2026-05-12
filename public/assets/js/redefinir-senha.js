// ./js/redefinir-senha.js
document.addEventListener("DOMContentLoaded", () => {
    "use strict";

    // ✅ TROQUE AQUI se mudar IP/porta
    const API_BASE = window.JobHub_API_BASE || "";
    const ENDPOINT = `${API_BASE}/auth/reset-senha/confirmar`;

    const $ = (s) => document.querySelector(s);

    const params = new URLSearchParams(window.location.search);
    const token = params.get("token");

    const toastEl = $("#toast");
    const form = $("#formReset");
    const tokenWarning = $("#tokenWarning");
    const rpSubtitle = $("#rpSubtitle");

    const nova = $("#novaSenha");
    const conf = $("#confirmarSenha");

    const toggleNova = $("#toggleNova");
    const toggleConf = $("#toggleConf");

    const strengthLabel = $("#strengthLabel");
    const strengthFill = $("#strengthFill");
    const matchHint = $("#matchHint");

    const btnSalvar = $("#btnSalvar");

    // Opcional: se quiser tratar "from=perfil" no voltar (sem quebrar nada)
    const backLink = document.querySelector(".rp-back");
    const from = params.get("from");
    if (backLink && from === "perfil") {
        backLink.href = (window.JobHub_ROUTES?.CANDIDATO_AREA || "/candidato");
        const span = backLink.querySelector("span");
        if (span) span.textContent = "Voltar para o perfil";
    }

    function showToast(msg, type = "success") {
        if (!toastEl) return alert(msg);
        toastEl.textContent = msg;
        toastEl.classList.remove("show", "error");
        if (type === "error") toastEl.classList.add("error");
        toastEl.classList.add("show");
        clearTimeout(window.__toastTimer);
        window.__toastTimer = setTimeout(() => toastEl.classList.remove("show"), 3500);
    }

    function setDisabled(on) {
        if (btnSalvar) btnSalvar.disabled = on;
        [nova, conf].forEach((el) => {
            if (el) el.disabled = on;
        });
    }

    // -------- token obrigatório
    if (!token) {
        if (rpSubtitle) rpSubtitle.textContent = "Link inválido. Volte e solicite um novo link.";
        if (tokenWarning) tokenWarning.style.display = "flex";
        setDisabled(true);
        return;
    }

    // -------- toggle show/hide
    function bindToggle(btn, input) {
        if (!btn || !input) return;
        btn.addEventListener("click", () => {
            const isPass = input.type === "password";
            input.type = isPass ? "text" : "password";
            btn.setAttribute("aria-label", isPass ? "Ocultar senha" : "Mostrar senha");
            // troca ícone FA
            const icon = btn.querySelector("i");
            if (icon) {
                icon.classList.toggle("fa-eye", !isPass);
                icon.classList.toggle("fa-eye-slash", isPass);
            }
        });
    }
    bindToggle(toggleNova, nova);
    bindToggle(toggleConf, conf);

    // -------- força da senha (visual)
    function score(p) {
        let s = 0;
        if (!p) return 0;
        if (p.length >= 8) s += 25;
        if (p.length >= 12) s += 15;
        if (/[A-Z]/.test(p)) s += 20;
        if (/[a-z]/.test(p)) s += 15;
        if (/\d/.test(p)) s += 15;
        if (/[^A-Za-z0-9]/.test(p)) s += 10;
        return Math.min(100, s);
    }

    function paintStrength(v) {
        if (strengthFill) strengthFill.style.width = v + "%";
        if (!strengthLabel) return;

        if (v === 0) strengthLabel.textContent = "—";
        else if (v < 40) strengthLabel.textContent = "Fraca";
        else if (v < 70) strengthLabel.textContent = "Boa";
        else strengthLabel.textContent = "Forte";
    }

    function checkMatch() {
        if (!nova || !conf) return true;

        const a = nova.value;
        const b = conf.value;

        if (!a || !b) {
            if (matchHint) matchHint.textContent = "Use uma senha forte com letras, números e símbolo.";
            return false;
        }

        const ok = a === b;
        if (matchHint) {
            matchHint.textContent = ok
                ? "Senhas conferem."
                : "As senhas não conferem. Digite exatamente a mesma senha.";
        }
        return ok;
    }

    nova?.addEventListener("input", () => {
        paintStrength(score(nova.value));
        checkMatch();
    });

    conf?.addEventListener("input", () => {
        checkMatch();
    });

    paintStrength(0);

    // -------- submit
    form?.addEventListener("submit", async (e) => {
        e.preventDefault();

        const novaSenha = (nova?.value || "").trim();
        const confirmar = (conf?.value || "").trim();

        if (novaSenha.length < 8) {
            showToast("A senha precisa ter pelo menos 8 caracteres.", "error");
            nova?.focus();
            return;
        }

        if (novaSenha !== confirmar) {
            showToast("As senhas não conferem.", "error");
            conf?.focus();
            return;
        }

        setDisabled(true);

        try {
            const resp = await fetch(ENDPOINT, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ token, novaSenha }),
            });

            const data = await resp.json().catch(() => ({}));

            if (!resp.ok) {
                const msg = data?.message || "Não foi possível redefinir a senha.";
                throw new Error(msg);
            }

            showToast(data?.message || "Senha alterada com sucesso! Redirecionando...", "success");

            // ✅ manda pro login
            setTimeout(() => {
                window.location.href = (window.JobHub_ROUTES?.HOME || "/");
            }, 900);
        } catch (err) {
            console.error(err);
            showToast(err?.message || "Erro ao redefinir senha.", "error");
            setDisabled(false);
        }
    });
});
