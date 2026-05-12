document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("loginForm");
    if (!form) return;

    const API_BASE = window.JobHub_API_BASE || "";
    const ROUTES = window.JobHub_ROUTES || {};
    const SESSION_KEY = "empresaDemo.session.v1";

    const REDIRECT = {
        CANDIDATO: ROUTES.CANDIDATO_AREA || "/candidato",
        RECRUTADOR: ROUTES.EMPRESA_AREA || "/recrutador",
        EMPRESA: ROUTES.EMPRESA_AREA || "/recrutador",
    };

    function getMode() {
        const isEmpresa = document.body.classList.contains("modo-recrutador") || document.body.classList.contains("modo-empresa");
        return isEmpresa ? "RECRUTADOR" : "CANDIDATO";
    }

    function endpointByMode(mode) {
        return mode === "RECRUTADOR" || mode === "EMPRESA"
            ? `${API_BASE}/auth/login/empresa`
            : `${API_BASE}/auth/login`;
    }

    function setLoading(isLoading) {
        const btn = form.querySelector('button[type="submit"]');
        if (!btn) return;
        btn.disabled = isLoading;
        btn.textContent = isLoading ? "Entrando..." : "Entrar";
    }

    function clearAuthStorage() {
        ["token", "role", "candidato_me", "empresa_me", "recrutador_me", "me", "user", "candidato_id", "accessToken", "access_token", "jwt", "AUTH_TOKEN"].forEach((k) => localStorage.removeItem(k));
        sessionStorage.removeItem(SESSION_KEY);
        sessionStorage.removeItem("just_logged_in");
    }

    function safeJsonParse(text) {
        try { return JSON.parse(text); } catch { return null; }
    }

    function decodeJwtPayload(token) {
        try {
            const part = token.split(".")[1];
            if (!part) return null;
            const base64 = part.replace(/-/g, "+").replace(/_/g, "/");
            const json = decodeURIComponent(atob(base64).split("").map(c => "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2)).join(""));
            return JSON.parse(json);
        } catch {
            return null;
        }
    }

    function bridgeSessionStorage(roleUpper, token, user = null) {
        const roleKey = roleUpper === "RECRUTADOR" || roleUpper === "EMPRESA" ? "empresa" : "candidato";
        sessionStorage.setItem(SESSION_KEY, JSON.stringify({ role: roleKey, token, user, createdAt: Date.now() }));
    }

    async function fetchMeAndCache(roleUpper, token) {
        const paths = roleUpper === "CANDIDATO"
            ? ["/candidatos/me", "/candidato/me", "/me"]
            : ["/empresa/me", "/recrutador/me", "/empresa/recrutador/me", "/me"];

        for (const p of paths) {
            try {
                const resp = await fetch(`${API_BASE}${p}`, { method: "GET", headers: { Authorization: `Bearer ${token}` } });
                if (resp.status === 404) continue;
                if (!resp.ok) continue;
                const me = await resp.json();
                const key = roleUpper === "CANDIDATO" ? "candidato_me" : "empresa_me";
                localStorage.setItem(key, JSON.stringify(me));
                localStorage.setItem("me", JSON.stringify(me));
                return me;
            } catch {}
        }
        return null;
    }

    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        const email = String(document.getElementById("email")?.value || "").trim();
        const senha = String(document.getElementById("senha")?.value || "");
        if (!email || !senha) {
            alert("Preencha e-mail e senha.");
            return;
        }

        const mode = getMode();
        const url = endpointByMode(mode);

        setLoading(true);
        clearAuthStorage();

        try {
            const resp = await fetch(url, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ email, senha }),
            });

            const raw = await resp.text();
            const data = raw ? safeJsonParse(raw) : null;
            if (!resp.ok) {
                const msg = (data && (data.message || data.error)) || raw || `Erro ${resp.status}`;
                throw new Error(msg);
            }

            const token = data?.token;
            const roleUpper = String(data?.role || mode).toUpperCase();
            if (!token) throw new Error("Login OK, mas resposta veio sem token.");

            localStorage.setItem("token", token);
            localStorage.setItem("role", roleUpper);

            const payload = decodeJwtPayload(token) || {};
            const fallbackUser = {
                idUsuario: payload.idUsuario ?? null,
                idCandidato: payload.idCandidato ?? null,
                email: payload.sub || email,
                nomeExibicao: String((payload.sub || email).split("@")[0] || "Usuário").replaceAll(".", " "),
                role: roleUpper,
            };

            const me = (await fetchMeAndCache(roleUpper, token)) || fallbackUser;
            bridgeSessionStorage(roleUpper, token, me);
            sessionStorage.setItem("just_logged_in", "1");
            window.location.replace(REDIRECT[roleUpper] || ROUTES.HOME || "/");
        } catch (err) {
            console.error("[LOGIN ERROR]", err);
            alert(err?.message || "Falha no login");
            clearAuthStorage();
        } finally {
            setLoading(false);
        }
    });
});
