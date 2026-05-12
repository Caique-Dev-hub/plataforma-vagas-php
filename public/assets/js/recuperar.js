// ./js/recuperar.js
document.addEventListener("DOMContentLoaded", () => {
    "use strict";

    // ✅ TROQUE AQUI se mudar IP/porta
    const API_BASE = window.JobHub_API_BASE || "";
    const ENDPOINT = `${API_BASE}/auth/reset-senha`;

    const $ = (s) => document.querySelector(s);

    const toastEl = $("#toast");
    const loaderEl = $("#loader");

    const formEmail = $("#formEmail");
    const emailInput = $("#email");
    const descricao = $("#descricao");

    const dotEmail = $("#dotEmail");
    const dotSenha = $("#dotSenha");

    function showToast(msg, type = "success") {
        if (!toastEl) return alert(msg);
        toastEl.textContent = msg;
        toastEl.classList.remove("show", "error");
        if (type === "error") toastEl.classList.add("error");
        toastEl.classList.add("show");
        clearTimeout(window.__toastTimer);
        window.__toastTimer = setTimeout(() => toastEl.classList.remove("show"), 3500);
    }

    function setLoading(on) {
        if (!loaderEl) return;
        loaderEl.style.display = on ? "grid" : "none";
        loaderEl.setAttribute("aria-hidden", on ? "false" : "true");
    }

    function isValidEmail(v) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(String(v || "").trim());
    }

    formEmail?.addEventListener("submit", async (e) => {
        e.preventDefault();

        const email = (emailInput?.value || "").trim();
        if (!isValidEmail(email)) {
            showToast("Informe um e-mail válido.", "error");
            emailInput?.focus();
            return;
        }

        const btn = formEmail.querySelector('button[type="submit"]');
        if (btn) btn.disabled = true;
        setLoading(true);

        try {
            const resp = await fetch(ENDPOINT, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ email }),
            });

            // tenta ler JSON (se vier vazio, cai no {})
            const data = await resp.json().catch(() => ({}));

            if (!resp.ok) {
                const msg = data?.message || "Não foi possível enviar o link. Tente novamente.";
                throw new Error(msg);
            }

            // ✅ UI: stepper + descrição
            dotEmail?.classList.add("active");
            dotSenha?.classList.add("active");

            if (descricao) {
                const msgApi = data?.message || "Encaminhamos um link de alteração de senha no seu e-mail";
                descricao.innerHTML =
                    `${msgApi}<br><span style="opacity:.85">Verifique a caixa de entrada e o spam.</span>`;
            }

            showToast(data?.message || "Link enviado! Verifique seu e-mail.", "success");
            formEmail.reset();
        } catch (err) {
            showToast(err?.message || "Erro ao enviar solicitação.", "error");
            console.error(err);
        } finally {
            setLoading(false);
            if (btn) btn.disabled = false;
        }
    });
});
