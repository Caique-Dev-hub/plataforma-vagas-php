document.addEventListener("DOMContentLoaded", () => {
    const body = document.body;
    const ROUTES = window.JobHub_ROUTES || {};

    const btnToggle = document.getElementById("toggleAcesso");
    const txtToggle = btnToggle?.querySelector(".txt");
    const iconToggle = btnToggle?.querySelector("i");
    const title = document.getElementById("title");
    const subtitle = document.getElementById("subtitle");
    const foot = document.getElementById("foot");
    const senhaEl = document.getElementById("senha");
    const toggleSenha = document.getElementById("toggleSenha");
    const eyeIcon = toggleSenha?.querySelector("i");

    if (toggleSenha && senhaEl) {
        toggleSenha.addEventListener("click", () => {
            const show = senhaEl.type === "password";
            senhaEl.type = show ? "text" : "password";
            if (eyeIcon) eyeIcon.className = show ? "fa-regular fa-eye-slash" : "fa-regular fa-eye";
        });
    }

    function applyMode(mode) {
        const isEmpresa = mode === "empresa";
        body.classList.toggle("modo-recrutador", isEmpresa);
        body.classList.toggle("modo-candidato", !isEmpresa);
        body.classList.toggle("modo-empresa", isEmpresa);

        if (title) title.textContent = isEmpresa ? "Login do Recrutador" : "Login do Candidato";
        if (subtitle) {
            subtitle.textContent = isEmpresa
                ? "Acesse seu painel para publicar vagas e gerenciar candidatos."
                : "Acesse sua conta para acompanhar suas candidaturas.";
        }
        if (txtToggle) txtToggle.textContent = isEmpresa ? "Sou Candidato" : "Sou Recrutador";
        if (iconToggle) iconToggle.className = isEmpresa ? "fa-solid fa-user" : "fa-solid fa-briefcase";
        if (foot) {
            foot.innerHTML = isEmpresa
                ? `Ainda não tem conta? <a class="link" href="${ROUTES.CADASTRO_RECRUTADOR || '#'}">Criar conta empresa</a>`
                : `Não tem cadastro? <a class="link" href="${ROUTES.CADASTRO_CANDIDATO || '#'}">Comece por aqui</a>`;
        }
    }

    btnToggle?.addEventListener("click", () => {
        const next = body.classList.contains("modo-recrutador") ? "candidato" : "empresa";
        applyMode(next);
        sessionStorage.setItem("login_last_mode", next);
    });

    const params = new URLSearchParams(window.location.search);
    const modeFromUrl = (params.get("mode") || "").toLowerCase();
    const modeFromStorage = (sessionStorage.getItem("login_last_mode") || "").toLowerCase();
    const initialMode = ["empresa", "candidato"].includes(modeFromUrl)
        ? modeFromUrl
        : (["empresa", "candidato"].includes(modeFromStorage) ? modeFromStorage : "candidato");

    applyMode(initialMode);
    if (modeFromUrl) history.replaceState(null, "", window.location.pathname);
});
