document.addEventListener("DOMContentLoaded", async () => {
    // =========================
    // CONFIG
    // =========================
    const API_BASE = window.JobHub_API_BASE || "";

    // =========================
    // HELPERS
    // =========================
    function logout() {
        localStorage.removeItem("token");
        localStorage.removeItem("role");
        localStorage.removeItem("candidato_me");
        window.location.href = (window.JobHub_ROUTES?.HOME || "/");
    }

    function getToken() {
        return localStorage.getItem("token");
    }

    function safeParse(str) {
        try {
            return JSON.parse(str);
        } catch {
            return null;
        }
    }

    async function getCandidatoMe() {
        // 1) tenta cache (opcional)
        const cached = safeParse(localStorage.getItem("candidato_me"));
        if (cached) return cached;

        // 2) token obrigatório
        const token = getToken();
        if (!token) return null;

        // 3) chama API REAL (URL COMPLETA)
        const resp = await fetch(`${API_BASE}/candidato/me`, {
            method: "GET",
            headers: {
                Authorization: `Bearer ${token}`,
                "Content-Type": "application/json",
            },
        });

        // token inválido/expirado
        if (resp.status === 401 || resp.status === 403) return null;

        if (!resp.ok) {
            const txt = await resp.text().catch(() => "");
            throw new Error(`Erro /me: ${resp.status} ${txt}`);
        }

        const data = await resp.json();
        localStorage.setItem("candidato_me", JSON.stringify(data));
        return data;
    }

    // =========================
    // 1) VALIDA LOGIN + CARREGA DADOS
    // =========================
    let candidato = null;

    try {
        candidato = await getCandidatoMe();

        if (!candidato) {
            // sem token ou token inválido
            logout();
            return;
        }

        console.log(" Dados do candidato (/me):", candidato);
    } catch (err) {
        console.error(" Falha ao carregar /me:", err);
        alert("Erro ao carregar seus dados. Faça login novamente.");
        logout();
        return;
    }

    // =========================
    // 2) BOAS-VINDAS COM NOME REAL
    // =========================
    const ola = document.querySelector(".bv-ola");
    if (ola) {
        const nome =
            (candidato.nomeCompleto || "").trim() ||
            ((candidato.email || "").split("@")[0] || "candidato");

        ola.textContent = `Olá, ${nome}! Você está no painel do candidato.`;
    }

    // =========================
    // 3) PAINEL LATERAL (MENU / PERFIL / MSG)
    // =========================
    let overlay = null;
    let panel = null;

    const nomePainel =
        (candidato.nomeCompleto || "").trim() ||
        ((candidato.email || "").split("@")[0] || "Candidato");

    const content = {
        menu: `
      <h3>Menu</h3>
      <a href="#">Busca de vagas</a>
      <a href="#">Meu currículo</a>
      <a href="#">Buscas salvas</a>
      <a href="#">CVs enviados</a>
      <a href="#">Guia de profissões</a>
    `,
        perfil: `
      <h3>Perfil</h3>
      <p style="margin:6px 0 14px;color:#6B7280;font-size:13px;">${nomePainel}</p>
      <a href="${window.JobHub_ROUTES?.PERFIL_CANDIDATO || "/candidato/perfil"}">Dados pessoais</a>
      <a href="${(window.JobHub_ROUTES?.REDEFINIR || "/redefinir")}?from=perfil">Alterar senha</a>
      <a href="#" class="danger" id="btnLogout">Sair</a>
    `,
        mensagens: `
      <h3>Mensagens</h3>
      <p class="empty">Nenhuma mensagem no momento.</p>
    `,
    };

    function closePanel() {
        if (!panel || !overlay) return;

        overlay.classList.remove("show");
        panel.classList.remove("show");

        setTimeout(() => {
            overlay?.remove();
            panel?.remove();
            overlay = null;
            panel = null;
            document.body.style.overflow = "";
        }, 300);
    }

    function openPanel(type) {
        if (!content[type]) return;

        closePanel();

        overlay = document.createElement("div");
        overlay.className = "panel-overlay";

        panel = document.createElement("aside");
        panel.className = "side-panel";
        panel.innerHTML = `
      <button class="close-panel" type="button" aria-label="Fechar">✕</button>
      ${content[type]}
    `;

        document.body.append(overlay, panel);
        document.body.style.overflow = "hidden";

        requestAnimationFrame(() => {
            overlay.classList.add("show");
            panel.classList.add("show");
        });

        overlay.addEventListener("click", closePanel);
        panel.querySelector(".close-panel")?.addEventListener("click", closePanel);

        const btnLogout = panel.querySelector("#btnLogout");
        if (btnLogout) {
            btnLogout.addEventListener("click", (e) => {
                e.preventDefault();
                logout();
            });
        }
    }

    // abre o painel por data-panel
    document.querySelectorAll("[data-panel]").forEach((btn) => {
        btn.addEventListener("click", (e) => {
            e.preventDefault();
            openPanel(btn.dataset.panel);
        });
    });

    // fecha com ESC
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") closePanel();
    });

    // =========================
    // 4) AÇÕES DO CANDIDATO
    // =========================
    const candidatoId = candidato.idCandidato ?? candidato.candidatoId ?? null;

    document.querySelectorAll(".btn-candidatar").forEach((btn) => {
        btn.addEventListener("click", () => {
            alert("Candidatura enviada com sucesso!");
            console.log("Candidato ID:", candidatoId ?? "(sem id)");
        });
    });

    document.querySelectorAll(".btn-candidato").forEach((btn) => {
        btn.addEventListener("click", () => {
            alert("Candidatura rápida enviada!");
        });
    });

    // =========================
    // 5) BUSCA (ENTER)
    // =========================
    document.querySelectorAll('input[placeholder*="Buscar"]').forEach((input) => {
        input.addEventListener("keydown", (e) => {
            if (e.key === "Enter") {
                const termo = (input.value || "").trim();
                if (!termo) return;
                alert(`🔍 Buscando por: "${termo}"`);
            }
        });
    });
});
