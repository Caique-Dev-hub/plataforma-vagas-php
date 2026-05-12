(() => {
    "use strict";

    const STORAGE_KEY = "empresaDemo.session.v1";
    const ROUTES = window.JobHub_ROUTES || {};
    const CONFIG = {
        candidato: {
            apiBase: window.JobHub_API_BASE || "",
            loginPath: "/auth/login",
            mePaths: ["/candidatos/me", "/candidato/me", "/me"],
            logoutRedirect: ROUTES.HOME || "/",
            homeRedirect: ROUTES.CANDIDATO_AREA || "/candidato",
        },
        empresa: {
            apiBase: window.JobHub_API_BASE || "",
            loginPath: "/auth/login/empresa",
            mePaths: ["/empresa/me", "/recrutador/me", "/empresa/recrutador/me", "/me"],
            logoutRedirect: ROUTES.HOME || "/",
            homeRedirect: ROUTES.EMPRESA_AREA || "/recrutador",
        },
    };

    const $json = (x) => { try { return JSON.parse(x); } catch { return null; } };
    function setSession({ role, token, user }) {
        const payload = { role, token, user: user ?? null, createdAt: Date.now() };
        sessionStorage.setItem(STORAGE_KEY, JSON.stringify(payload));
        return payload;
    }
    function getSession() { return $json(sessionStorage.getItem(STORAGE_KEY)) || null; }
    function clearSession() { sessionStorage.removeItem(STORAGE_KEY); }
    function getRole() { return getSession()?.role || null; }
    function getToken() { return getSession()?.token || localStorage.getItem('token') || ""; }
    function getUser() { return getSession()?.user || null; }
    function getApiBase() { const role = getRole(); return role && CONFIG[role] ? CONFIG[role].apiBase : ""; }
    function buildUrl(path) {
        const base = getApiBase() || (window.JobHub_API_BASE || "");
        if (!base) throw new Error("Sem API_BASE configurada.");
        return base.replace(/\/$/, "") + "/" + String(path || "").replace(/^\//, "");
    }

    async function apiFetch(path, { method = "GET", headers = {}, body, raw = false } = {}) {
        const token = getToken();
        const finalHeaders = { ...(raw ? {} : { "Content-Type": "application/json" }), ...(token ? { Authorization: `Bearer ${token}` } : {}), ...headers };
        const resp = await fetch(buildUrl(path), { method, headers: finalHeaders, body: body == null ? undefined : (raw ? body : JSON.stringify(body)) });
        const text = await resp.text();
        const data = text ? $json(text) : null;
        if (!resp.ok) {
            const msg = (data && (data.message || data.error)) || `Erro ${resp.status}`;
            const err = new Error(msg);
            err.status = resp.status;
            err.data = data;
            throw err;
        }
        return data;
    }

    async function login(role, { email, senha, password } = {}) {
        if (!CONFIG[role]) throw new Error("Role inválido no login.");
        const url = CONFIG[role].apiBase.replace(/\/$/, "") + CONFIG[role].loginPath;
        const resp = await fetch(url, { method: "POST", headers: { "Content-Type": "application/json" }, body: JSON.stringify({ email, senha: senha ?? password }) });
        const text = await resp.text();
        const data = text ? $json(text) : null;
        if (!resp.ok) {
            const msg = (data && (data.message || data.error)) || `Falha no login (${resp.status})`;
            throw new Error(msg);
        }
        const token = data?.token || data?.accessToken || data?.jwt || data?.data?.token || "";
        if (!token) throw new Error("Login ok, mas não encontrei token na resposta.");
        setSession({ role, token, user: data?.user || data?.me || data?.empresa || data?.candidato || null });
        return data;
    }

    async function fetchMe() {
        const role = getRole();
        if (!role) throw new Error("Sem role na sessão.");
        const paths = CONFIG[role]?.mePaths || [];
        let lastErr = null;
        for (const p of paths) {
            try {
                const me = await apiFetch(p, { method: "GET" });
                const s = getSession();
                setSession({ role, token: s?.token || getToken(), user: me });
                return me;
            } catch (e) {
                if (e?.status === 401 || e?.status === 403) throw e;
                lastErr = e;
            }
        }
        throw lastErr || new Error("Não consegui encontrar a rota /me.");
    }

    function requireRole(requiredRole, { redirectTo } = {}) {
        const sess = getSession();
        if (!sess?.role || !sess?.token) {
            window.location.href = redirectTo || CONFIG[requiredRole]?.logoutRedirect || (ROUTES.HOME || "/");
            return false;
        }
        if (sess.role !== requiredRole) {
            const home = CONFIG[sess.role]?.homeRedirect || (ROUTES.HOME || "/");
            window.location.href = home;
            return false;
        }
        return true;
    }

    function applyRoleVisibility() {
        const role = getRole();
        document.querySelectorAll("[data-only]").forEach((el) => {
            const only = el.getAttribute("data-only");
            el.style.display = (only === role) ? "" : "none";
        });
    }

    function logout() {
        const role = getRole();
        clearSession();
        ['token', 'role', 'candidato_me', 'empresa_me', 'recrutador_me', 'me', 'user', 'candidato_id', 'accessToken', 'access_token', 'jwt', 'AUTH_TOKEN'].forEach((k) => localStorage.removeItem(k));
        window.location.href = CONFIG[role || 'candidato']?.logoutRedirect || (ROUTES.HOME || "/");
    }

    document.addEventListener("DOMContentLoaded", () => {
        const needed = document.body?.dataset?.guard;
        if (needed) requireRole(needed, { redirectTo: CONFIG[needed]?.logoutRedirect || (ROUTES.HOME || "/") });
        applyRoleVisibility();
    });

    window.EmpresaDemoAuth = { CONFIG, setSession, getSession, clearSession, getRole, getToken, getUser, apiFetch, login, fetchMe, requireRole, applyRoleVisibility, logout };
})();
