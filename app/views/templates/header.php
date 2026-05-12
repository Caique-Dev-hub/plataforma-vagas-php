<!-- JobHub HEADER (novo / isolado) -->
<header class="jobhubH-shell">
    <div class="jobhubH-wrap">

        <a href="<?= URL_BASE ?>" class="jobhubH-logo" aria-label="Ir para a Home">
            <img src="<?= URL_BASE ?>assets/img/logo_preta.svg" alt="EmpresaDemo" class="jobhubH-logoImg">
        </a>

        <!-- DESKTOP NAV -->
        <nav class="jobhubH-nav" aria-label="Navegação principal">

            <!-- CTAs -->
            <a id="ctaEmpresa" href="<?= URL_BASE ?>cadastrar/recrutador"
                class="jobhubH-cta jobhubH-cta--empresa"
                data-guard="logged-out">
                Anunciar vagas grátis
            </a>

            <a id="ctaCv" href="<?= URL_BASE ?>cadastrar/candidato"
                class="jobhubH-cta jobhubH-cta--cv"
                data-guard="logged-out">
                Cadastrar CV grátis
            </a>

            <!-- AUTH -->
            <div class="jobhubA-root" id="authRoot" data-default-mode="CANDIDATO" data-mode="CANDIDATO">
                <button class="jobhubA-trigger" id="authBtn" type="button" aria-expanded="false" aria-controls="authPopover">
                    Entrar <span class="jobhubA-caret" aria-hidden="true">▾</span>
                </button>

                <div class="jobhubA-pop" id="authPopover" hidden role="dialog" aria-label="Entrar na conta">
                    <!-- VIEW: DESLOGADO -->
                    <div class="jobhubA-view" id="viewLoggedOut">

                        <div class="jobhubA-tabs" role="tablist" aria-label="Tipo de login">
                            <button type="button" class="jobhubA-tab jobhub-is-active" data-mode="CANDIDATO">Candidato</button>
                            <button type="button" class="jobhubA-tab" data-mode="RECRUTADOR">Recrutador</button>
                        </div>

                        <div class="jobhubA-alert" id="authAlert" aria-live="polite" hidden></div>

                        <form id="authLoginForm" autocomplete="on" novalidate>
                            <label class="jobhubA-field">
                                <span class="jobhubA-label" id="emailLabel">E-mail</span>
                                <input class="jobhubA-input" id="authEmail" type="email" required placeholder="seu@email.com" autocomplete="username">
                                <div class="jobhubA-fieldErr" id="authEmailErr" aria-live="polite"></div>
                            </label>

                            <label class="jobhubA-field">
                                <span class="jobhubA-label">Senha</span>
                                <div class="jobhubA-pass">
                                    <input class="jobhubA-input" id="authSenha" type="password" required placeholder="••••••••" autocomplete="current-password">
                                    <button class="jobhubA-eye" id="authToggleSenha" type="button" aria-label="Mostrar senha">
                                        <i class="fa-regular fa-eye"></i>
                                    </button>
                                </div>
                                <div class="jobhubA-fieldErr" id="authSenhaErr" aria-live="polite"></div>
                            </label>

                            <button class="jobhubA-submit" id="authSubmit" type="submit">
                                Entrar como Candidato
                            </button>

                            <div class="jobhubA-links">

                                <a href="<?= URL_BASE ?>redefinir">Esqueci a senha</a>
                            </div>
                        </form>
                    </div>

                    <!-- VIEW: LOGADO -->
                    <div class="jobhubA-view" id="viewLoggedIn" hidden>
                        <div class="jobhubU-mini">
                            <div class="jobhubU-avatar" aria-hidden="true"></div>
                            <div class="jobhubU-meta">
                                <div class="jobhubU-top">
                                    <strong id="userName">—</strong>
                                    <span class="jobhubU-role" id="userRoleTag">—</span>
                                </div>
                                <div class="jobhubU-email" id="userEmail">—</div>
                            </div>
                        </div>

                        <div class="jobhubU-actions">
                            
                            <a class="jobhubU-item" id="goArea" href="#">Ir para minha área</a>

                            <a class="jobhubU-item" id="goPerfil" href="<?= URL_BASE ?>perfil">Ver perfil</a>
                            <button class="jobhubU-item jobhub-is-danger" id="logoutBtn" type="button">Sair</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SUBMENU (agora faz sentido como "Mais") -->
            <div class="jobhubM-root">
                <button class="jobhubM-btn" id="submenuDesktopBtn" type="button" aria-expanded="false" aria-controls="submenuDesktop">
                    <span class="jobhubM-ico" aria-hidden="true"></span> Mais
                </button>

                <div style="display: none;" class="jobhubM-drop" id="submenuDesktop" hidden>
                    <a href="<?= URL_BASE ?>empresa" data-guard="logged-out">Para empresas</a>
                    <a href="<?= URL_BASE ?>cadastrar" data-guard="logged-out">Enviar Currículo</a>
                    <a href="<?= URL_BASE ?>recuperar">Recuperar senha</a>
                </div>
            </div>
        </nav>


        <!-- MOBILE BUTTON -->
        <button class="jobhubH-burger" id="openMobileMenu" type="button" aria-label="Abrir menu" aria-controls="mobileMenu" aria-expanded="false">☰</button>

    </div>
</header>

<!-- MOBILE MENU -->
<div class="jobhubMM-overlay" id="mobileOverlay" hidden></div>

<aside class="jobhubMM-panel" id="mobileMenu" aria-hidden="true" role="dialog" aria-label="Menu" hidden>
    <div class="jobhubMM-top">
        <a class="jobhubMM-brand" href="<?= URL_BASE ?>" aria-label="Ir para a Home">
            <img src="<?= URL_BASE ?>assets/img/logo_preta.svg" alt="EmpresaDemo" class="jobhubMM-brandImg">
        </a>
        <button class="jobhubMM-close" id="closeMobileMenu" type="button" aria-label="Fechar menu">×</button>
    </div>

    <div class="jobhubMM-ctaWrap">
        <a class="jobhubMM-cta jobhubMM-cta--empresa" id="mCtaEmpresa" href="<?= URL_BASE ?>cadastrar/recrutador" data-guard="logged-out">Anunciar vagas grátis</a>
        <a class="jobhubMM-cta jobhubMM-cta--cv" id="mCtaCv" href="<?= URL_BASE ?>cadastrar/candidato" data-guard="logged-out">Cadastrar CV grátis</a>
    </div>

    <nav class="jobhubMM-nav" aria-label="Atalhos">
        <a class="jobhubMM-link" href="<?= URL_BASE ?>empresa" data-guard="logged-out">Para empresas</a>
        <a class="jobhubMM-link" href="<?= URL_BASE ?>cadastrar" data-guard="logged-out">Enviar Currículo</a>
    </nav>
    <div class="jobhubMM-actions">
        <button class="jobhubMM-btn jobhubMM-btn--outline" id="mobileAuthTrigger" type="button">Entrar</button>

        <div class="jobhubMM-authBox" id="mobileAuthBox" hidden>
            <div class="jobhubMM-authTitle">Entrar na conta</div>

            <div class="jobhubMM-tabs" role="tablist" aria-label="Tipo de login">
                <button type="button" class="jobhubMM-tab jobhub-is-active" data-mode="CANDIDATO">Candidato</button>
                <button type="button" class="jobhubMM-tab" data-mode="RECRUTADOR">Recrutador</button>
            </div>

            <div class="jobhubMM-alert" id="mAuthAlert" aria-live="polite" hidden></div>

            <form id="mobileAuthForm" autocomplete="on" novalidate>
                <label class="jobhubMM-field">
                    <span class="jobhubMM-label" id="mEmailLabel">E-mail (Candidato)</span>
                    <input class="jobhubMM-input" id="mAuthEmail" type="email" required placeholder="seu@email.com" autocomplete="username">
                </label>

                <label class="jobhubMM-field">
                    <span class="jobhubMM-label">Senha</span>
                    <div class="jobhubMM-pass">
                        <input class="jobhubMM-input" id="mAuthSenha" type="password" required placeholder="••••••••" autocomplete="current-password">
                        <button class="jobhubMM-eye" id="mToggleSenha" type="button" aria-label="Mostrar senha">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                </label>

                <button class="jobhubMM-btn jobhubMM-btn--primary" id="mAuthSubmit" type="submit" style="width:100%;">
                    Entrar como Candidato
                </button>

                <div class="jobhubA-links" style="border-top:1px solid rgba(15,23,42,.08); padding-top:10px; margin-top:12px;">
                    <a id="mAuthSignupLink" href="<?= URL_BASE ?>cadastrar/candidato" data-guard="logged-out">Cadastrar</a>
                    <a href="<?= URL_BASE ?>reset">Esqueci a senha</a>
                </div>
            </form>
        </div>

        <a class="jobhubMM-btn jobhubMM-btn--primary" id="mobileGoArea" href="#" hidden>Ir para minha área</a>
        <button class="jobhubMM-btn jobhubMM-btn--outline" id="mobileLogoutBtn" type="button" hidden>Sair</button>
    </div>

</aside>

<!-- CONFIG (mantido) -->
<script>
    window.JobHub_API_BASE = window.JobHub_API_BASE || <?= api_base_json() ?>;
    window.JobHub_ROUTES = {
        HOME: "<?= URL_BASE ?>",
        PERFIL_EMPRESA: "<?= URL_BASE ?>recrutador/",
        CANDIDATO_AREA: "<?= URL_BASE ?>candidato",
        EMPRESA_AREA: "<?= URL_BASE ?>recrutador",
        LOGIN: "<?= URL_BASE ?>inicio",
        CADASTRO_CANDIDATO: "<?= URL_BASE ?>cadastrar/candidato",
        CADASTRO_RECRUTADOR: "<?= URL_BASE ?>cadastrar/recrutador"
    };
</script>
<script>
    (() => {
        "use strict";

        const API_BASE = window.JobHub_API_BASE || "";
        console.log("[JobHub] API_BASE =", API_BASE);
        console.log("[JobHub] login candidato =", `${API_BASE}/auth/login`);
        console.log("[JobHub] login empresa =", `${API_BASE}/auth/login/empresa`);

        const ROUTES = window.JobHub_ROUTES || {
            HOME: "/",
            PERFIL: "/perfil",
            CANDIDATO_AREA: "/candidato",
            EMPRESA_AREA: "<?= URL_BASE ?>recrutador",
            LOGIN: "<?= URL_BASE ?>inicio"
        };

        const SESSION_KEY = "empresaDemo.session.v1";
        const $ = (s) => document.querySelector(s);

        // ================== AUTH DOM ==================
        const authRoot = $("#authRoot");
        if (!authRoot) return;

        const authBtn = $("#authBtn");
        const authPopover = $("#authPopover");

        const viewLoggedOut = $("#viewLoggedOut");
        const viewLoggedIn = $("#viewLoggedIn");

        const authForm = $("#authLoginForm");
        const authEmail = $("#authEmail");
        const authSenha = $("#authSenha");
        const authSubmit = $("#authSubmit");

        const authAlert = $("#authAlert");
        const authEmailErr = $("#authEmailErr");
        const authSenhaErr = $("#authSenhaErr");
        const toggleSenhaBtn = $("#authToggleSenha");
        const emailLabel = $("#emailLabel");

        const userName = $("#userName");
        const userEmail = $("#userEmail");
        const userRoleTag = $("#userRoleTag");
        const goArea = $("#goArea");
        const goPerfil = $("#goPerfil");
        const logoutBtn = $("#logoutBtn");

        // tabs (NOVO seletor)
        const tabButtons = authRoot.querySelectorAll(".jobhubA-tab");
        let currentMode = (authRoot.getAttribute("data-default-mode") || "CANDIDATO").toUpperCase();

        // ================== MOBILE MENU DOM ==================
        const openMobileBtn = $("#openMobileMenu");
        const closeMobileBtn = $("#closeMobileMenu");
        const mobileMenu = $("#mobileMenu");
        const mobileOverlay = $("#mobileOverlay");
        const mobileAuthTrigger = $("#mobileAuthTrigger");
        const mobileGoArea = $("#mobileGoArea");
        const mobileLogoutBtn = $("#mobileLogoutBtn");

        // ================== HELPERS ==================
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        function safeJson(v) {
            try {
                return v ? JSON.parse(v) : null;
            } catch {
                return null;
            }
        }

        function decodeJwtPayload(token) {
            try {
                const part = token.split(".")[1];
                if (!part) return null;
                const base64 = part.replace(/-/g, "+").replace(/_/g, "/");
                const json = decodeURIComponent(
                    atob(base64).split("").map(c => "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2)).join("")
                );
                return JSON.parse(json);
            } catch {
                return null;
            }
        }

        function isTokenExpired(token) {
            const p = decodeJwtPayload(token);
            const exp = p?.exp;
            if (!exp) return false;
            return Date.now() >= exp * 1000;
        }

        function normalizeRole(roleFromApi, mode) {
            const r = String(roleFromApi || "").toUpperCase().trim();
            const m = String(mode || "").toUpperCase().trim();

            if (["RECRUTADOR", "EMPRESA", "COMPANY", "RECRUITER"].includes(r)) return "RECRUTADOR";
            if (["CANDIDATO", "CANDIDATE"].includes(r)) return "CANDIDATO";
            return m === "RECRUTADOR" ? "RECRUTADOR" : "CANDIDATO";
        }

        function clearAuthStorage() {
            ["token", "role", "candidato_me", "empresa_me", "recrutador_me", "me", "user", "candidato_id", "accessToken", "access_token", "jwt", "AUTH_TOKEN"].forEach((k) => localStorage.removeItem(k));
            sessionStorage.removeItem(SESSION_KEY);
            sessionStorage.removeItem("just_logged_in");
            sessionStorage.removeItem("flash_login_ok");
        }

        function bridgeSessionStorage(roleUpper, token, user = null) {
            const roleKey = roleUpper === "RECRUTADOR" ? "empresa" : "candidato";
            sessionStorage.setItem(SESSION_KEY, JSON.stringify({
                role: roleKey,
                token,
                user,
                createdAt: Date.now()
            }));
        }

        function endpointByMode(modeUpper) {
            return modeUpper === "RECRUTADOR" ? `${API_BASE}/auth/login/empresa` : `${API_BASE}/auth/login`;
        }

        async function fetchMeAndCache(roleUpper, token) {
            const paths =
                roleUpper === "CANDIDATO" ? ["/candidato/me", "/candidatos/me", "/me"] : ["/empresa/me", "/recrutador/me", "/empresa/recrutador/me", "/me"];

            for (const p of paths) {
                try {
                    const resp = await fetch(`${API_BASE}${p}`, {
                        method: "GET",
                        headers: {
                            Authorization: `Bearer ${token}`
                        }
                    });
                    if (resp.status === 404) continue;
                    if (!resp.ok) return null;

                    const me = await resp.json();
                    localStorage.setItem(roleUpper === "CANDIDATO" ? "candidato_me" : "empresa_me", JSON.stringify(me));
                    return me;
                } catch {}
            }
            return null;
        }

        function makeRecrutadorFallbackFromJwt(token) {
            const p = decodeJwtPayload(token) || {};
            const email = p.sub || "";
            const left = email.includes("@") ? email.split("@")[0] : email;
            return {
                idUsuario: p.idUsuario ?? null,
                email,
                nomeExibicao: left ? left.replaceAll(".", " ").replace(/\b\w/g, m => m.toUpperCase()) : "Recrutador",
                role: "RECRUTADOR",
                _from: "jwt"
            };
        }

        function displayNameFromMe(roleUpper, me, token) {
            if (roleUpper === "CANDIDATO") return me?.nomeCompleto || me?.nome || me?.email || "Candidato";
            return me?.nomeExibicao || me?.nome || me?.razaoSocial || me?.email || makeRecrutadorFallbackFromJwt(token).nomeExibicao || "Recrutador";
        }

        function emailFromMe(me, token) {
            return me?.email || decodeJwtPayload(token)?.sub || "";
        }

        function areaHref(roleUpper) {
            return roleUpper === "RECRUTADOR" ? ROUTES.EMPRESA_AREA : ROUTES.CANDIDATO_AREA;
        }

        function perfilHref(roleUpper) {
            const perfilCandidato = ROUTES.PERFIL_CANDIDATO || `${(ROUTES.CANDIDATO_AREA || "/candidato").replace(/\/$/, "")}/perfil`;
            const perfilEmpresa = ROUTES.PERFIL_EMPRESA || `${(ROUTES.EMPRESA_AREA || "/recrutador").replace(/\/$/, "")}/perfil`;
            return roleUpper === "RECRUTADOR" ? perfilEmpresa : perfilCandidato;
        }


        function getStoredSession() {
            const token = localStorage.getItem("token") || "";
            const roleUpper = normalizeRole(localStorage.getItem("role"), "CANDIDATO");
            if (!token) return null;

            if (isTokenExpired(token)) {
                clearAuthStorage();
                return null;
            }

            const meKey = roleUpper === "RECRUTADOR" ? "empresa_me" : "candidato_me";
            const me = safeJson(localStorage.getItem(meKey));
            return {
                token,
                roleUpper,
                me
            };
        }

        // ================== UI: ALERTS + FIELD ERRORS ==================
        function setAlert(type, msg) {
            if (!authAlert) return;
            authAlert.classList.remove("jobhub-alert--error", "jobhub-alert--success");

            if (!msg) {
                authAlert.hidden = true;
                authAlert.textContent = "";
                return;
            }

            authAlert.hidden = false;
            authAlert.classList.add(type === "success" ? "jobhub-alert--success" : "jobhub-alert--error");
            authAlert.textContent = msg;
        }

        function setFieldError(inputEl, errEl, msg) {
            if (!inputEl || !errEl) return;
            errEl.textContent = msg || "";
            inputEl.classList.toggle("jobhub-is-invalid", !!msg);
            if (!msg) inputEl.classList.remove("jobhub-is-valid");
        }

        function setFieldValid(inputEl) {
            if (!inputEl) return;
            inputEl.classList.remove("jobhub-is-invalid");
            inputEl.classList.add("jobhub-is-valid");
        }

        function clearAllFeedback() {
            setAlert("", "");
            setFieldError(authEmail, authEmailErr, "");
            setFieldError(authSenha, authSenhaErr, "");
            authEmail?.classList.remove("jobhub-is-valid");
            authSenha?.classList.remove("jobhub-is-valid");
        }

        // ================== UI: TABS / MODO ==================
        function applyModeUI(modeUpper) {
            authRoot.dataset.mode = modeUpper;
            const authSignupLink = $("#authSignupLink");
            tabButtons.forEach(b => b.classList.toggle("jobhub-is-active", b.dataset.mode === modeUpper));

            const label = modeUpper === "RECRUTADOR" ? "Recrutador" : "Candidato";
            if (authSubmit) authSubmit.textContent = `Entrar como ${label}`;
            if (emailLabel) emailLabel.textContent = modeUpper === "RECRUTADOR" ? "E-mail (Recrutador)" : "E-mail (Candidato)";
            // ✅ ajusta o "Cadastrar" conforme a aba escolhida
            if (authSignupLink) {
                authSignupLink.href =
                    modeUpper === "RECRUTADOR" ?
                    (ROUTES.CADASTRO_RECRUTADOR || "<?= URL_BASE ?>cadastrar/recrutador") :
                    (ROUTES.CADASTRO_CANDIDATO || "<?= URL_BASE ?>cadastrar/candidato");

                // opcional (se quiser mudar o texto)
                // authSignupLink.textContent = modeUpper === "RECRUTADOR" ? "Cadastrar empresa" : "Cadastrar candidato";
            }

            clearAllFeedback();
        }

        function setMode(modeUpper) {
            currentMode = modeUpper;
            applyModeUI(currentMode);
        }

        if (tabButtons.length) tabButtons.forEach(btn => btn.addEventListener("click", () => setMode(btn.dataset.mode)));
        setMode(currentMode);

        // ================== POPOVER ==================
        function openPopover() {
            if (!authPopover) return;
            authPopover.hidden = false;
            authBtn?.setAttribute("aria-expanded", "true");
            if (!viewLoggedOut?.hidden) authEmail?.focus();
        }

        function closePopover() {
            if (!authPopover) return;
            authPopover.hidden = true;
            authBtn?.setAttribute("aria-expanded", "false");

            if (authSenha && authSenha.type !== "password") authSenha.type = "password";
            if (toggleSenhaBtn) {
                toggleSenhaBtn.setAttribute("aria-label", "Mostrar senha");
                const icon = toggleSenhaBtn.querySelector("i");
                if (icon) {
                    icon.classList.add("fa-eye");
                    icon.classList.remove("fa-eye-slash");
                }
            }
        }

        authBtn?.addEventListener("click", () => {
            if (!authPopover) return;
            authPopover.hidden ? openPopover() : closePopover();
        });

        document.addEventListener("click", (e) => {
            if (!authRoot.contains(e.target)) closePopover();
        });

        document.addEventListener("keydown", (e) => {
            if (e.key === "Escape") closePopover();
        });

        // ================== OLHO SENHA ==================
        toggleSenhaBtn?.addEventListener("click", () => {
            if (!authSenha) return;
            const isPass = authSenha.type === "password";
            authSenha.type = isPass ? "text" : "password";
            toggleSenhaBtn.setAttribute("aria-label", isPass ? "Ocultar senha" : "Mostrar senha");

            const icon = toggleSenhaBtn.querySelector("i");
            if (icon) {
                icon.classList.toggle("fa-eye", !isPass);
                icon.classList.toggle("fa-eye-slash", isPass);
            }
        });

        // ================== RENDER ==================
        function setLoading(on) {
            if (!authSubmit) return;
            authSubmit.disabled = on;
            authSubmit.textContent = on ? "Entrando..." : (currentMode === "RECRUTADOR" ? "Entrar como Recrutador" : "Entrar como Candidato");
        }

        function renderLoggedOut() {
            authBtn.innerHTML = `Entrar <span class="jobhubA-caret" aria-hidden="true">▾</span>`;
            viewLoggedOut.hidden = false;
            viewLoggedIn.hidden = true;

            if (mobileAuthTrigger) mobileAuthTrigger.hidden = false;
            if (mobileGoArea) mobileGoArea.hidden = true;
            if (mobileLogoutBtn) mobileLogoutBtn.hidden = true;

            clearAllFeedback();
            applyModeUI(currentMode);
        }

        function renderLoggedIn(roleUpper, token, me) {
            const name = displayNameFromMe(roleUpper, me, token);
            const email = emailFromMe(me, token);

            authBtn.innerHTML = `Olá, <strong>${name}</strong> <span class="jobhubA-caret" aria-hidden="true">▾</span>`;
            viewLoggedOut.hidden = true;
            viewLoggedIn.hidden = false;

            if (userName) userName.textContent = name;
            if (userEmail) userEmail.textContent = email || "—";
            if (userRoleTag) userRoleTag.textContent = roleUpper === "RECRUTADOR" ? "RECRUTADOR" : "CANDIDATO";

            if (goArea) {
                goArea.href = areaHref(roleUpper);
                goArea.textContent = roleUpper === "RECRUTADOR" ? "Ir para o painel" : "Ir para minha área";
            }
            if (goPerfil) {
                goPerfil.href = perfilHref(roleUpper);
                goPerfil.textContent = "Ver perfil";
            }
            if (mobileAuthTrigger) mobileAuthTrigger.hidden = true;
            if (mobileGoArea) {
                mobileGoArea.hidden = false;
                mobileGoArea.href = areaHref(roleUpper);
                mobileGoArea.textContent = roleUpper === "RECRUTADOR" ? "Ir para o painel" : "Ir para minha área";
            }
            if (mobileLogoutBtn) mobileLogoutBtn.hidden = false;
        }

        // ================== LOGIN SUBMIT ==================
        function validateForm() {
            clearAllFeedback();

            const email = (authEmail?.value || "").trim();
            const senha = (authSenha?.value || "");
            let ok = true;

            if (!email) {
                setFieldError(authEmail, authEmailErr, "Digite seu e-mail.");
                ok = false;
            } else if (!emailRegex.test(email)) {
                setFieldError(authEmail, authEmailErr, "E-mail inválido. Ex: nome@dominio.com");
                ok = false;
            } else setFieldValid(authEmail);

            if (!senha) {
                setFieldError(authSenha, authSenhaErr, "Digite sua senha.");
                ok = false;
            } else setFieldValid(authSenha);

            if (!ok) setAlert("error", "Corrija os campos destacados para entrar.");
            return ok;
        }

        authForm?.addEventListener("submit", async (e) => {
            e.preventDefault();
            if (!validateForm()) return;

            const email = (authEmail?.value || "").trim();
            const senha = (authSenha?.value || "");
            const url = endpointByMode(currentMode);

            setLoading(true);
            clearAuthStorage();
            setAlert("", "");

            try {
                const resp = await fetch(url, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        email,
                        senha
                    }),
                });

                const raw = await resp.text();
                let data = null;
                try {
                    data = raw ? JSON.parse(raw) : null;
                } catch {}

                if (!resp.ok) {
                    const msgApi = (data && (data.message || data.error)) || raw || `Erro ${resp.status}`;
                    authEmail?.classList.add("jobhub-is-invalid");
                    authSenha?.classList.add("jobhub-is-invalid");
                    setAlert("error", msgApi || "E-mail ou senha incorretos. Verifique e tente novamente.");
                    return;
                }

                const token = data?.token;
                const roleUpper = normalizeRole(data?.role, currentMode);

                if (!token) {
                    setAlert("error", "Login realizado, mas a resposta veio sem token.");
                    return;
                }

                localStorage.setItem("token", token);
                localStorage.setItem("role", roleUpper);

                let me = await fetchMeAndCache(roleUpper, token);
                if (roleUpper === "RECRUTADOR" && !me) {
                    me = makeRecrutadorFallbackFromJwt(token);
                    localStorage.setItem("empresa_me", JSON.stringify(me));
                }

                bridgeSessionStorage(roleUpper, token, me);
                setAlert("success", "Login realizado com sucesso!");
                renderLoggedIn(roleUpper, token, me);
                closePopover();
            } catch (err) {
                console.error("[LOGIN ERROR]", err);
                setAlert("error", "Falha de conexão. Verifique sua internet ou o servidor e tente novamente.");
            } finally {
                setLoading(false);
            }
        });

        // ================== LOGOUT ==================
        function doLogout() {
            clearAuthStorage();
            renderLoggedOut();
            closePopover();
            window.location.href = ROUTES.HOME;
        }
        logoutBtn?.addEventListener("click", doLogout);
        mobileLogoutBtn?.addEventListener("click", doLogout);

        // ================== BOOT ==================
        (async function boot() {
            const sess = getStoredSession();
            if (!sess) return renderLoggedOut();

            let me = sess.me;
            if (!me) me = await fetchMeAndCache(sess.roleUpper, sess.token);
            if (sess.roleUpper === "RECRUTADOR" && !me) me = makeRecrutadorFallbackFromJwt(sess.token);

            bridgeSessionStorage(sess.roleUpper, sess.token, me);
            renderLoggedIn(sess.roleUpper, sess.token, me);
        })();

        // ================== MOBILE MENU ==================
        function trapTab(e) {
            if (!mobileMenu || mobileMenu.getAttribute("aria-hidden") === "true") return;
            if (e.key !== "Tab") return;

            const focusables = Array.from(mobileMenu.querySelectorAll('a[href], button:not([disabled]), input, select, textarea, [tabindex]:not([tabindex="-1"])'))
                .filter(el => el.offsetParent !== null);

            if (!focusables.length) return;

            const first = focusables[0];
            const last = focusables[focusables.length - 1];

            if (e.shiftKey && document.activeElement === first) {
                e.preventDefault();
                last.focus();
            } else if (!e.shiftKey && document.activeElement === last) {
                e.preventDefault();
                first.focus();
            }
        }

        let lastFocusEl = null;

        function openMenu() {
            if (!mobileOverlay || !mobileMenu) return;

            lastFocusEl = document.activeElement;

            mobileOverlay.hidden = false;
            mobileMenu.hidden = false;

            requestAnimationFrame(() => {
                mobileMenu.classList.add("jobhub-show");
                mobileOverlay.classList.add("jobhub-show");
            });

            mobileMenu.setAttribute("aria-hidden", "false");
            openMobileBtn?.setAttribute("aria-expanded", "true");
            document.body.classList.add("jobhub-noscroll");

            setTimeout(() => closeMobileBtn?.focus(), 60);
        }

        function closeMenu() {
            if (!mobileOverlay || !mobileMenu) return;

            mobileMenu.classList.remove("jobhub-show");
            mobileOverlay.classList.remove("jobhub-show");
            mobileMenu.setAttribute("aria-hidden", "true");
            openMobileBtn?.setAttribute("aria-expanded", "false");
            document.body.classList.remove("jobhub-noscroll");

            setTimeout(() => {
                mobileOverlay.hidden = true;
                mobileMenu.hidden = true;
            }, 240);

            // devolve o foco pra quem abriu
            setTimeout(() => {
                if (lastFocusEl && typeof lastFocusEl.focus === 'function') lastFocusEl.focus();
            }, 260);
        }

        openMobileBtn?.addEventListener("click", openMenu);
        closeMobileBtn?.addEventListener("click", closeMenu);
        mobileOverlay?.addEventListener("click", closeMenu);

        document.addEventListener("keydown", (e) => {
            trapTab(e);
            if (e.key === "Escape") closeMenu();
        });

        const mobileAuthBox = document.getElementById("mobileAuthBox");

        // ================== MOBILE AUTH (TABS + OLHO + LOGIN) ==================
        const mAuthForm = document.getElementById("mobileAuthForm");
        const mAuthEmail = document.getElementById("mAuthEmail");
        const mAuthSenha = document.getElementById("mAuthSenha");
        const mAuthSubmit = document.getElementById("mAuthSubmit");
        const mAuthAlert = document.getElementById("mAuthAlert");
        const mToggleSenha = document.getElementById("mToggleSenha");
        const mEmailLabel = document.getElementById("mEmailLabel");
        const mAuthSignupLink = document.getElementById("mAuthSignupLink");
        const mTabs = mobileAuthBox ? mobileAuthBox.querySelectorAll(".jobhubMM-tab") : [];

        function mSetAlert(type, msg) {
            if (!mAuthAlert) return;
            mAuthAlert.classList.remove("jobhub-alert--error", "jobhub-alert--success");
            if (!msg) {
                mAuthAlert.hidden = true;
                mAuthAlert.textContent = "";
                return;
            }
            mAuthAlert.hidden = false;
            mAuthAlert.classList.add(type === "success" ? "jobhub-alert--success" : "jobhub-alert--error");
            mAuthAlert.textContent = msg;
        }

        function mSetLoading(on) {
            if (!mAuthSubmit) return;
            mAuthSubmit.disabled = on;
            const label = currentMode === "RECRUTADOR" ? "Recrutador" : "Candidato";
            mAuthSubmit.textContent = on ? "Entrando..." : `Entrar como ${label}`;
        }

        function applyMobileModeUI(modeUpper) {
            // tabs visuais
            if (mTabs && mTabs.length) {
                mTabs.forEach((b) => b.classList.toggle("jobhub-is-active", b.dataset.mode === modeUpper));
            }

            // labels + botão
            if (mEmailLabel) mEmailLabel.textContent = modeUpper === "RECRUTADOR" ? "E-mail (Recrutador)" : "E-mail (Candidato)";
            if (mAuthSubmit) mAuthSubmit.textContent = `Entrar como ${modeUpper === "RECRUTADOR" ? "Recrutador" : "Candidato"}`;

            // link "Cadastrar"
            if (mAuthSignupLink) {
                mAuthSignupLink.href =
                    modeUpper === "RECRUTADOR" ?
                    (ROUTES.CADASTRO_RECRUTADOR || "<?= URL_BASE ?>cadastrar/recrutador") :
                    (ROUTES.CADASTRO_CANDIDATO || "<?= URL_BASE ?>cadastrar/candidato");
            }

            // limpa alert
            mSetAlert("", "");
        }

        // quando clicar nas abas do mobile, usa o MESMO currentMode do desktop
        if (mTabs && mTabs.length) {
            mTabs.forEach((btn) => {
                btn.addEventListener("click", (e) => {
                    e.preventDefault();
                    const mode = String(btn.dataset.mode || "CANDIDATO").toUpperCase();
                    currentMode = mode; // <- chave
                    applyModeUI(currentMode); // mantém desktop consistente
                    applyMobileModeUI(currentMode);
                });
            });
        }

        // botão "Entrar" do menu: abre/fecha o box
        mobileAuthTrigger?.addEventListener("click", (e) => {
            e.preventDefault();
            e.stopPropagation();
            if (!mobileAuthBox) return;

            const willOpen = mobileAuthBox.hidden === true;
            mobileAuthBox.hidden = !willOpen;

            if (willOpen) {
                applyMobileModeUI(currentMode);
                setTimeout(() => mAuthEmail?.focus(), 60);
            }
        });

        // olho da senha no mobile
        mToggleSenha?.addEventListener("click", () => {
            if (!mAuthSenha) return;
            const isPass = mAuthSenha.type === "password";
            mAuthSenha.type = isPass ? "text" : "password";
            mToggleSenha.setAttribute("aria-label", isPass ? "Ocultar senha" : "Mostrar senha");
            const icon = mToggleSenha.querySelector("i");
            if (icon) {
                icon.classList.toggle("fa-eye", !isPass);
                icon.classList.toggle("fa-eye-slash", isPass);
            }
        });

        // validação mobile (simples)
        function mValidate() {
            mSetAlert("", "");
            const email = (mAuthEmail?.value || "").trim();
            const senha = (mAuthSenha?.value || "");
            if (!email) return mSetAlert("error", "Digite seu e-mail."), false;
            if (!emailRegex.test(email)) return mSetAlert("error", "E-mail inválido. Ex: nome@dominio.com"), false;
            if (!senha) return mSetAlert("error", "Digite sua senha."), false;
            return true;
        }

        // submit mobile (faz login de verdade)
        mAuthForm?.addEventListener("submit", async (e) => {
            e.preventDefault();
            if (!mValidate()) return;

            const email = (mAuthEmail?.value || "").trim();
            const senha = (mAuthSenha?.value || "");
            const url = endpointByMode(currentMode);

            mSetLoading(true);
            clearAuthStorage();
            mSetAlert("", "");

            try {
                const resp = await fetch(url, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        email,
                        senha
                    }),
                });

                const raw = await resp.text();
                let data = null;
                try {
                    data = raw ? JSON.parse(raw) : null;
                } catch {}

                if (!resp.ok) {
                    const msgApi = (data && (data.message || data.error)) || raw || `Erro ${resp.status}`;
                    mSetAlert("error", msgApi || "E-mail ou senha incorretos.");
                    return;
                }

                const token = data?.token;
                const roleUpper = normalizeRole(data?.role, currentMode);

                if (!token) {
                    mSetAlert("error", "Login realizado, mas a resposta veio sem token.");
                    return;
                }

                localStorage.setItem("token", token);
                localStorage.setItem("role", roleUpper);

                let me = await fetchMeAndCache(roleUpper, token);
                if (roleUpper === "RECRUTADOR" && !me) {
                    me = makeRecrutadorFallbackFromJwt(token);
                    localStorage.setItem("empresa_me", JSON.stringify(me));
                }

                bridgeSessionStorage(roleUpper, token, me);

                // render padrão (desktop + mobile)
                renderLoggedIn(roleUpper, token, me);

                // fecha o box e opcionalmente fecha o menu
                mSetAlert("success", "Login realizado com sucesso!");
                mobileAuthBox.hidden = true;
                closeMenu(); // fecha o menu lateral
            } catch (err) {
                console.error("[MOBILE LOGIN ERROR]", err);
                mSetAlert("error", "Falha de conexão. Verifique o servidor e tente novamente.");
            } finally {
                mSetLoading(false);
            }
        });

        // garante estado inicial coerente
        applyMobileModeUI(currentMode);


        // ================== SUBMENU DESKTOP ==================
        const submenuBtn = $("#submenuDesktopBtn");
        const submenuBox = $("#submenuDesktop");

        function closeSubmenu() {
            if (!submenuBox) return;
            submenuBox.hidden = true;
            submenuBtn?.setAttribute("aria-expanded", "false");
        }

        submenuBtn?.addEventListener("click", (e) => {
            e.preventDefault();
            if (!submenuBox) return;
            const open = submenuBox.hidden === false;
            submenuBox.hidden = open;
            submenuBtn.setAttribute("aria-expanded", String(!open));
        });

        document.addEventListener("click", (e) => {
            if (submenuBox && submenuBtn && !submenuBox.hidden) {
                const wrap = submenuBtn.closest(".jobhubM-root");
                if (wrap && !wrap.contains(e.target)) closeSubmenu();
            }
        });
    })();

    /* =========================
       GUARD (independente)
       - bloqueia qualquer link com data-guard="logged-out"
       - checa token + exp direto do localStorage
    ========================= */
    (function() {
        "use strict";

        function decodeJwtPayload(token) {
            try {
                const part = token.split(".")[1];
                if (!part) return null;
                const base64 = part.replace(/-/g, "+").replace(/_/g, "/");
                const json = decodeURIComponent(
                    atob(base64).split("").map(c => "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2)).join("")
                );
                return JSON.parse(json);
            } catch {
                return null;
            }
        }

        function isTokenExpired(token) {
            const p = decodeJwtPayload(token);
            const exp = p?.exp;
            if (!exp) return false; // se não tiver exp, não dá pra afirmar
            return Date.now() >= exp * 1000;
        }

        function getToken() {
            return (
                localStorage.getItem("token") ||
                localStorage.getItem("access_token") ||
                localStorage.getItem("jwt") ||
                ""
            );
        }

        function getRoleUpper() {
            const r = String(localStorage.getItem("role") || "").toUpperCase().trim();
            return (r === "RECRUTADOR" || r === "EMPRESA") ? "RECRUTADOR" : (r ? "CANDIDATO" : "");
        }

        function isLogged() {
            const token = getToken();
            if (!token) return false;
            if (isTokenExpired(token)) return false;
            return true;
        }

        function warnAlreadyLogged() {
            const roleUpper = getRoleUpper();
            const label = roleUpper === "RECRUTADOR" ? "recrutador/empresa" : "candidato";
            alert(`Já existe um usuário (${label}) logado.\n\nSe quiser criar outra conta, faça logout primeiro.`);
            // opcional: abre o dropdown pra pessoa ver o "Sair"
            const authBtn = document.getElementById("authBtn");
            if (authBtn) authBtn.click();
        }

        // Delegação: funciona até se você criar links depois
        document.addEventListener("click", (e) => {
            const a = e.target.closest('a[data-guard="logged-out"]');
            if (!a) return;

            if (!isLogged()) return; // deslogado -> navega normal

            e.preventDefault();
            e.stopPropagation();
            warnAlreadyLogged();
        }, true);
    })();
</script>
<script>
    (() => {
        "use strict";

        const $ = (s, el = document) => el.querySelector(s);

        // ====== JWT helpers (pra saber se token expirou)
        function decodeJwtPayload(token) {
            try {
                const part = token.split(".")[1];
                if (!part) return null;
                const base64 = part.replace(/-/g, "+").replace(/_/g, "/");
                const json = decodeURIComponent(
                    atob(base64).split("").map(c => "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2)).join("")
                );
                return JSON.parse(json);
            } catch {
                return null;
            }
        }

        function isTokenExpired(token) {
            const p = decodeJwtPayload(token);
            const exp = p?.exp;
            if (!exp) return false; // se não tiver exp, não dá pra afirmar
            return Date.now() >= exp * 1000;
        }

        function clearAuthStorage() {
            const keys = ["token", "role", "candidato_me", "empresa_me", "recrutador_me", "me", "user", "candidato_id", "accessToken", "access_token", "jwt", "AUTH_TOKEN"];
            keys.forEach(k => localStorage.removeItem(k));
            sessionStorage.removeItem("empresaDemo.session.v1");
        }

        function getSession() {
            const token =
                localStorage.getItem("token") ||
                localStorage.getItem("access_token") ||
                localStorage.getItem("jwt") ||
                "";

            if (!token) return {
                logged: false
            };

            if (isTokenExpired(token)) {
                clearAuthStorage();
                return {
                    logged: false
                };
            }

            const role = String(localStorage.getItem("role") || "").toUpperCase();
            const roleUpper = (role === "RECRUTADOR" || role === "EMPRESA") ? "RECRUTADOR" : "CANDIDATO";

            return {
                logged: true,
                roleUpper
            };
        }

        // ====== aviso (usa alert por ser simples e garantido)
        function warnAlreadyLogged(roleUpper) {
            const label = roleUpper === "RECRUTADOR" ? "recrutador/empresa" : "candidato";
            // se você preferir toast bonito, eu faço, mas alert resolve 100% sem CSS
            alert(`Já existe um usuário (${label}) logado.\n\nSe quiser criar/cadastrar outra conta, primeiro saia da conta atual.`);
        }

        function protectSignupLink(anchor) {
            if (!anchor) return;
            anchor.addEventListener("click", (e) => {
                const sess = getSession();
                if (!sess.logged) return; // deixa navegar normal
                e.preventDefault();
                e.stopPropagation();

                warnAlreadyLogged(sess.roleUpper);

                // opcional: abrir popover de conta pra pessoa ver o "Sair"
                const authBtn = $("#authBtn");
                if (authBtn) authBtn.click();
            }, true);
        }

        // desktop
        protectSignupLink($("#ctaEmpresa"));
        protectSignupLink($("#ctaCv"));

        // mobile (opcional)
        protectSignupLink($("#mCtaEmpresa"));
        protectSignupLink($("#mCtaCv"));
    })();
</script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800;900&family=Inter:wght@500;600;700&display=swap');

    /* =========================
   JobHub HEADER — ISOLADO
========================= */

    /* escopo total */
    .jobhubH-shell,
    .jobhubH-shell * {
        box-sizing: border-box;
    }

    .jobhubH-shell {
        --jobhub-bg: #ffffff;
        --jobhub-text: rgba(15, 23, 42, .92);
        --jobhub-muted: rgba(15, 23, 42, .70);
        --jobhub-line: rgba(15, 23, 42, .10);
        --jobhub-shadow: 0 18px 60px rgba(15, 23, 42, .14);
        --jobhub-shadow2: 0 10px 26px rgba(15, 23, 42, .10);
        --jobhub-r: 16px;
        --jobhub-r2: 12px;

        --jobhub-blue: #6e88a7;
        --jobhub-blue2: #9cafc9;
        --jobhub-pink: #2b81a9;

        position: relative;
        z-index: 9990;
        height: 100px;
        background: var(--jobhub-bg);
        border-bottom: 1px solid rgba(15, 23, 42, .06);
        box-shadow: 0 10px 30px rgba(15, 23, 42, .08);
        display: flex;
        align-items: center;
        font-family: "Montserrat", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
    }

    .jobhubH-wrap {
        width: 100%;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 24px;
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .jobhubH-logo {
        display: flex;
        align-items: center;
        text-decoration: none;
    }

    .jobhubH-logoImg {
        height: 115px;
        display: block;
    }

    /* DESKTOP NAV */
    .jobhubH-nav {
        margin-left: auto;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .jobhubH-cta {
        height: 42px;
        padding: 0 18px;
        border-radius: 999px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 900;
        font-size: 13px;
        letter-spacing: .2px;
        box-shadow: var(--jobhub-shadow2);
        transition: transform .12s ease, filter .12s ease;
        white-space: nowrap;
    }

    .jobhubH-cta:hover {
        transform: translateY(-1px);
        filter: brightness(1.02);
    }

    .jobhubH-cta--empresa {
        color: #fff;
        background: #C4D9E5
    }

    .jobhubH-cta--cv {
        color: rgba(15, 23, 42, .92);
        border: 1px solid rgba(15, 23, 42, .10);
        background: linear-gradient(90deg, rgba(255, 255, 255, .9), rgba(255, 255, 255, 1));
    }

    /* MOBILE BURGER */
    .jobhubH-burger {
        display: none;
        margin-left: auto;
        height: 44px;
        width: 44px;
        border-radius: 12px;
        border: 1px solid rgba(15, 23, 42, .10);
        background: #fff;
        color: var(--jobhub-text);
        cursor: pointer;
        font-size: 22px;
        box-shadow: var(--jobhub-shadow2);
    }

    /* =========================
   SUBMENU
========================= */
    .jobhubM-root {
        position: relative;
    }

    .jobhubM-btn {
        height: 42px;
        padding: 0 14px;
        border-radius: 999px;
        border: 1px solid rgba(15, 23, 42, .10);
        background: #fff;
        cursor: pointer;
        font-weight: 900;
        font-size: 13px;
        color: var(--jobhub-text);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: var(--jobhub-shadow2);
        transition: transform .12s ease, background .12s ease;
    }

    .jobhubM-btn:hover {
        transform: translateY(-1px);
        background: rgba(15, 23, 42, .03);
    }

    .jobhubM-ico::before {
        content: "☰";
        font-size: 18px;
        line-height: 1;
        opacity: .9;
    }

    .jobhubM-drop {
        position: absolute;
        right: 0;
        top: calc(100% + 10px);
        width: 220px;
        background: rgba(255, 255, 255, .98);
        border: 1px solid rgba(15, 23, 42, .10);
        border-radius: 14px;
        box-shadow: var(--jobhub-shadow);
        padding: 8px;
        z-index: 9999;
    }

    .jobhubM-drop a {
        display: block;
        padding: 10px 10px;
        border-radius: 12px;
        text-decoration: none;
        color: var(--jobhub-text);
        font-weight: 900;
        font-size: 13px;
    }

    .jobhubM-drop a:hover {
        background: rgba(15, 23, 42, .06);
    }

    /* =========================
   AUTH (Dropdown)
========================= */
    .jobhubA-root {
        position: relative;
    }

    .jobhubA-trigger {
        height: 44px;
        padding: 0 14px;
        border-radius: 999px;
        border: 1px solid rgba(15, 23, 42, .10);
        background: #fff;
        cursor: pointer;
        font-weight: 800;
        color: var(--jobhub-text);
        box-shadow: var(--jobhub-shadow2);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: transform .12s ease, background .12s ease;
    }

    .jobhubA-trigger:hover {
        transform: translateY(-1px);
        background: rgba(15, 23, 42, .03);
    }

    .jobhubA-caret {
        opacity: .7;
    }

    .jobhubA-pop {
        position: absolute;
        right: 0;
        top: calc(100% + 12px);
        width: min(360px, 92vw);
        background: rgba(255, 255, 255, .96);
        border: 1px solid rgba(15, 23, 42, .10);
        border-radius: var(--jobhub-r);
        box-shadow: var(--jobhub-shadow);
        padding: 14px;
        z-index: 9999;
        backdrop-filter: blur(10px);
    }

    .jobhubA-pop::before {
        content: "";
        position: absolute;
        top: -7px;
        right: 18px;
        width: 14px;
        height: 14px;
        background: rgba(255, 255, 255, .96);
        border-left: 1px solid rgba(15, 23, 42, .10);
        border-top: 1px solid rgba(15, 23, 42, .10);
        transform: rotate(45deg);
        border-top-left-radius: 4px;
    }

    .jobhubA-tabs {
        display: flex;
        gap: 8px;
        padding: 6px;
        border-radius: 999px;
        background: rgba(15, 23, 42, .06);
        border: 1px solid rgba(15, 23, 42, .08);
        margin-bottom: 10px;
    }

    .jobhubA-tab {
        flex: 1;
        height: 38px;
        border-radius: 999px;
        border: 0;
        background: transparent;
        font-weight: 800;
        cursor: pointer;
        color: rgba(15, 23, 42, .70);
        transition: background .14s ease, color .14s ease, box-shadow .14s ease;
        font-size: 14px;
    }

    .jobhubA-tab:hover {
        background: rgba(255, 255, 255, .70);
    }

    .jobhub-is-active {
        background: linear-gradient(90deg, rgba(31, 117, 216, .18), rgba(169, 43, 157, .10));
        color: rgba(15, 23, 42, .92);
        box-shadow: inset 0 0 0 1px rgba(15, 23, 42, .10);
        font-size: 14px;
        font-weight: 800;
    }

    .jobhubA-alert {
        border-radius: 12px;
        padding: 10px 12px;
        font-weight: 900;
        font-size: 12px;
        margin: 10px 0;
        border: 1px solid rgba(15, 23, 42, .10);
    }

    .jobhubA-alert.jobhub-alert--error {
        background: rgba(239, 68, 68, .10);
        border-color: rgba(239, 68, 68, .25);
        color: #b91c1c;
    }

    .jobhubA-alert.jobhub-alert--success {
        background: rgba(34, 197, 94, .12);
        border-color: rgba(34, 197, 94, .25);
        color: #166534;
    }

    .jobhubA-field {
        display: block;
        margin-bottom: 10px;
    }

    .jobhubA-label {
        display: block;
        font-size: 12px;
        font-weight: 900;
        opacity: .75;
        margin-bottom: 6px;
        font-family: "Montserrat", sans-serif;
    }

    .jobhubA-input {
        width: 100%;
        height: 46px;
        border-radius: 14px;
        border: 1px solid rgba(15, 23, 42, .12);
        background: #fff;
        padding: 0 12px;
        outline: none;
        font-family: "Inter", sans-serif;
        font-weight: 700;
        color: rgba(15, 23, 42, .92);
        transition: box-shadow .12s ease, border-color .12s ease;
    }

    .jobhubA-input:focus {
        border-color: rgba(31, 117, 216, .40);
        box-shadow: 0 0 0 4px rgba(31, 117, 216, .12);
    }

    .jobhub-is-invalid {
        border-color: rgba(239, 68, 68, .45) !important;
        box-shadow: 0 0 0 4px rgba(239, 68, 68, .10) !important;
    }

    .jobhub-is-valid {
        border-color: rgba(34, 197, 94, .35) !important;
    }

    .jobhubA-fieldErr {
        min-height: 16px;
        margin-top: 6px;
        font-size: 12px;
        font-weight: 900;
        color: #ef4444;
    }

    /* olho */
    .jobhubA-pass {
        position: relative;
    }

    .jobhubA-pass .jobhubA-input {
        padding-right: 56px;
    }

    .jobhubA-eye {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        border-radius: 12px;
        border: 1px solid rgba(15, 23, 42, .12);
        background: rgba(15, 23, 42, .05);
        cursor: pointer;
        color: rgba(15, 23, 42, .75);
        display: grid;
        place-items: center;
    }

    .jobhubA-eye:hover {
        background: rgba(15, 23, 42, .10);
    }

    .jobhubA-submit {
        width: 100%;
        height: 46px;
        border-radius: 999px;
        border: 0;
        cursor: pointer;
        font-weight: 700;
        letter-spacing: .2px;
        color: #fff;
        background: linear-gradient(90deg, var(--jobhub-blue), var(--jobhub-pink));
        box-shadow: var(--jobhub-shadow2);
        font-size: 14px;
    }

    .jobhubA-submit:disabled {
        opacity: .72;
        cursor: not-allowed;
    }

    .jobhubA-links {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        margin-top: 12px;
        padding-top: 10px;
        border-top: 1px solid rgba(15, 23, 42, .08);
        font-size: 12px;
    }

    .jobhubA-links a {
        color: rgba(15, 23, 42, .72);
        text-decoration: none;
        font-weight: 900;
    }

    .jobhubA-links a:hover {
        color: var(--jobhub-blue);
    }

    /* =========================
   VIEW LOGADO
========================= */
    .jobhubU-mini {
        display: flex;
        gap: 12px;
        align-items: center;
        padding: 10px;
        border-radius: 14px;
        background: rgba(15, 23, 42, .04);
        border: 1px solid rgba(15, 23, 42, .08);
        margin-bottom: 10px;
    }

    .jobhubU-avatar {
        width: 42px;
        height: 42px;
        border-radius: 14px;
        background: linear-gradient(90deg, var(--jobhub-blue), var(--jobhub-pink));
        box-shadow: 0 10px 20px rgba(15, 23, 42, .12);
    }

    .jobhubU-top {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .jobhubU-role {
        font-size: 11px;
        font-weight: 900;
        padding: 4px 8px;
        border-radius: 999px;
        background: rgba(31, 117, 216, .12);
        border: 1px solid rgba(15, 23, 42, .08);
        color: rgba(15, 23, 42, .78);
        text-transform: uppercase;
    }

    .jobhubU-email {
        font-size: 12px;
        font-weight: 800;
        opacity: .75;
        margin-top: 2px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 220px;
    }

    .jobhubU-actions {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .jobhubU-item {
        display: flex;
        align-items: center;
        width: 100%;
        text-align: left;
        padding: 11px 10px;
        border-radius: 12px;
        border: 0;
        background: transparent;
        cursor: pointer;
        text-decoration: none;
        color: rgba(15, 23, 42, .92);
        font-weight: 900;
        transition: background .12s ease, transform .12s ease;
    }

    .jobhubU-item:hover {
        background: rgba(15, 23, 42, .06);
        transform: translateY(-1px);
    }

    .jobhub-is-danger {
        color: #ef4444 !important;
    }

    /* =========================
   MOBILE MENU
========================= */
    .jobhubMM-overlay {
        position: fixed;
        inset: 0;
        background: rgba(2, 6, 23, .55);
        opacity: 0;
        transition: opacity .25s ease;
        z-index: 9998;
    }

    .jobhubMM-overlay.jobhub-show {
        opacity: 1;
    }

    .jobhubMM-panel {
        position: fixed;
        top: 0;
        left: -110%;
        width: min(340px, 92vw);
        height: 100vh;
        background: #fff;
        padding: 22px 20px;
        display: flex;
        flex-direction: column;
        gap: 14px;
        transition: left .25s ease;
        z-index: 9999;
        box-shadow: var(--jobhub-shadow);
        border-right: 1px solid rgba(15, 23, 42, .08);
    }

    .jobhubMM-panel.jobhub-show {
        left: 0;
    }

    /* mobile menu interno */
    .jobhubMM-panel {
        padding-top: calc(18px + env(safe-area-inset-top));
        padding-bottom: calc(18px + env(safe-area-inset-bottom));
        overflow-y: auto;
    }

    .jobhubMM-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 8px;
    }

    .jobhubMM-brand {
        display: inline-flex;
        align-items: center;
        text-decoration: none;
    }

    .jobhubMM-brand img {
        height: 64px;
        width: auto;
        display: block;
    }

    .jobhubMM-ctaWrap {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-top: 4px;
    }


    .jobhubMM-cta {
        height: 44px;
        padding: 0 14px;
        border-radius: 999px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 900;
        font-size: 13px;
        box-shadow: var(--jobhub-shadow2);
        transition: transform .12s ease, filter .12s ease;
    }

    .jobhubMM-cta:hover {
        transform: translateY(-1px);
        filter: brightness(1.02);
    }

    .jobhubMM-cta--empresa {
        background: #C4D9E5;
        color: rgba(15, 23, 42, .92);
        border: 1px solid rgba(15, 23, 42, .06);
    }

    .jobhubMM-cta--cv {
        background: #fff;
        color: rgba(15, 23, 42, .92);
        border: 1px solid rgba(15, 23, 42, .10);
    }

    .jobhubMM-actions {
        margin-top: auto;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    body.jobhub-noscroll {
        overflow: hidden;
    }

    .jobhubMM-close {
        align-self: flex-end;
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: rgba(15, 23, 42, .06);
        border: 1px solid rgba(15, 23, 42, .08);
        font-size: 22px;
        cursor: pointer;
    }

    .jobhubMM-link {
        font-size: 16px;
        font-weight: 900;
        color: rgba(15, 23, 42, .88);
        text-decoration: none;
        padding: 12px 6px;
        border-bottom: 1px solid rgba(15, 23, 42, .06);
    }

    .jobhubMM-btn {
        margin-top: 6px;
        padding: 12px;
        border-radius: 999px;
        font-weight: 900;
        cursor: pointer;
        border: 0;
        text-decoration: none;
        text-align: center;
        display: inline-flex;
        justify-content: center;
        align-items: center;
    }

    .jobhubMM-btn--outline {
        border: 2px solid var(--jobhub-pink);
        background: transparent;
        color: var(--jobhub-pink);
    }

    .jobhubMM-btn--primary {
        background: linear-gradient(90deg, var(--jobhub-blue), var(--jobhub-pink));
        color: #fff;
    }

    @media (max-width: 900px) {
        .jobhubH-nav {
            display: none !important;
        }

        .jobhubH-burger {
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
    }

    /* garante hidden sem depender de reset */
    .jobhubH-shell [hidden],
    .jobhubMM-overlay[hidden],
    .jobhubMM-panel[hidden] {
        display: none !important;
    }

    /* ===== Scroll Header (sticky + efeito) ===== */
    .jobhubH-shell {
        position: sticky;
        top: 0;
        transition: transform .18s ease, box-shadow .18s ease, background .18s ease, height .18s ease, border-color .18s ease;
        will-change: transform;
    }

    /* quando rolou a página */
    .jobhubH-shell.is-scrolled {
        background: rgba(255, 255, 255, .88);
        backdrop-filter: blur(12px);
        border-bottom-color: rgba(15, 23, 42, .10);
        box-shadow: 0 18px 60px rgba(15, 23, 42, .16);
    }

    /* opcional: “some descendo / aparece subindo” */
    .jobhubH-shell.is-hidden {
        transform: translateY(-110%);
    }

    /* opcional: dá uma “encolhida” */
    .jobhubH-shell .jobhubH-logoImg {
        transition: height .18s ease;
    }

    .jobhubH-shell.is-scrolled .jobhubH-logoImg {
        height: 90px;
        /* era 64px */
    }
</style>
<script>
    (() => {
        "use strict";

        const header = document.querySelector(".jobhubH-shell");
        if (!header) return;

        let lastY = window.scrollY || 0;
        let ticking = false;

        const TOP = 8; // perto do topo não mexe
        const DELTA = 10; // ignora micro scroll

        function isOverlayOpen() {
            // se o menu mobile estiver aberto, não esconde o header
            const mobileMenu = document.getElementById("mobileMenu");
            const menuOpen = !!mobileMenu && mobileMenu.classList.contains("jobhub-show");

            // se o popover de auth estiver aberto, não esconde o header
            const pop = document.getElementById("authPopover");
            const popOpen = !!pop && pop.hidden === false;

            return menuOpen || popOpen;
        }

        function update() {
            const y = window.scrollY || 0;
            const diff = y - lastY;

            // efeito visual quando rola
            header.classList.toggle("is-scrolled", y > TOP);

            // --- MODO 1: apenas sticky + efeito (SEM esconder)
            // comente as linhas abaixo se você NÃO quiser esconder no scroll

            if (!isOverlayOpen()) {
                if (y <= TOP) {
                    header.classList.remove("is-hidden");
                } else if (Math.abs(diff) > DELTA) {
                    if (diff > 0) header.classList.add("is-hidden"); // descendo -> esconde
                    else header.classList.remove("is-hidden"); // subindo -> mostra
                }
            } else {
                header.classList.remove("is-hidden");
            }

            lastY = y;
            ticking = false;
        }

        window.addEventListener(
            "scroll",
            () => {
                if (!ticking) {
                    ticking = true;
                    requestAnimationFrame(update);
                }
            }, {
                passive: true
            }
        );

        update();
    })();
</script>
<style>
    /* Links principais do desktop */
    .jobhubH-links {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-right: 8px;
    }

    .jobhubH-link {
        display: inline-flex;
        align-items: center;
        height: 42px;
        padding: 0 12px;
        border-radius: 999px;
        text-decoration: none;
        font-weight: 900;
        font-size: 13px;
        color: rgba(15, 23, 42, .78);
        border: 1px solid transparent;
        transition: background .12s ease, transform .12s ease, border-color .12s ease;
        white-space: nowrap;
    }

    .jobhubH-link:hover {
        background: rgba(15, 23, 42, .05);
        border-color: rgba(15, 23, 42, .08);
        transform: translateY(-1px);
    }

    /* No mobile, some com os links (já some todo .jobhubH-nav, então é só segurança) */
    @media (max-width: 900px) {
        .jobhubH-links {
            display: none !important;
        }
    }

    /* ✅ garante que qualquer [hidden] dentro do menu mobile some de verdade */
    .jobhubMM-panel [hidden] {
        display: none !important;
    }

    /* ====== Mobile Auth (visual igual ao desktop, só que no menu) ====== */
    .jobhubMM-authBox {
        margin-top: 10px;
        padding: 12px;
        border: 1px solid rgba(15, 23, 42, .08);
        border-radius: 16px;
        background: rgba(15, 23, 42, .03);
    }

    .jobhubMM-authTitle {
        font-weight: 900;
        font-size: 14px;
        margin-bottom: 10px;
        color: rgba(15, 23, 42, .88);
    }

    .jobhubMM-tabs {
        display: flex;
        gap: 8px;
        padding: 6px;
        border-radius: 999px;
        background: rgba(15, 23, 42, .06);
        border: 1px solid rgba(15, 23, 42, .08);
        margin-bottom: 10px;
    }

    .jobhubMM-tab {
        flex: 1;
        height: 38px;
        border-radius: 999px;
        border: 0;
        background: transparent;
        font-weight: 900;
        cursor: pointer;
        color: rgba(15, 23, 42, .70);
    }

    .jobhubMM-tab.jobhub-is-active {
        background: linear-gradient(90deg, rgba(31, 117, 216, .18), rgba(169, 43, 157, .10));
        color: rgba(15, 23, 42, .92);
        box-shadow: inset 0 0 0 1px rgba(15, 23, 42, .10);
    }

    .jobhubMM-field {
        display: block;
        margin-bottom: 10px;
    }

    .jobhubMM-label {
        display: block;
        font-size: 12px;
        font-weight: 900;
        opacity: .75;
        margin-bottom: 6px;
        font-family: "Montserrat", sans-serif;
    }

    .jobhubMM-input {
        width: 100%;
        height: 46px;
        border-radius: 14px;
        border: 1px solid rgba(15, 23, 42, .12);
        background: #fff;
        padding: 0 12px;
        outline: none;
        font-family: "Inter", sans-serif;
        font-weight: 700;
        color: rgba(15, 23, 42, .92);
    }

    .jobhubMM-pass {
        position: relative;
    }

    .jobhubMM-pass .jobhubMM-input {
        padding-right: 56px;
    }

    .jobhubMM-eye {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        border-radius: 12px;
        border: 1px solid rgba(15, 23, 42, .12);
        background: rgba(15, 23, 42, .05);
        cursor: pointer;
        display: grid;
        place-items: center;
    }

    .jobhubMM-alert {
        border-radius: 12px;
        padding: 10px 12px;
        font-weight: 900;
        font-size: 12px;
        margin: 10px 0;
        border: 1px solid rgba(15, 23, 42, .10);
    }

    .jobhubMM-alert.jobhub-alert--error {
        background: rgba(239, 68, 68, .10);
        border-color: rgba(239, 68, 68, .25);
        color: #b91c1c;
    }

    .jobhubMM-alert.jobhub-alert--success {
        background: rgba(34, 197, 94, .12);
        border-color: rgba(34, 197, 94, .25);
        color: #166534;
    }

    html,
    body {
        overflow-x: hidden !important;
        width: 100%;
    }

    .jobhubH-shell,
    .jobhubH-wrap {
        max-width: 100%;
        overflow-x: clip;
        /* melhor que hidden em browsers novos */
    }
</style>
<style>
    .jobhubA-root {
        position: relative;
        z-index: 10020;
    }

    .jobhubA-pop {
        position: absolute;
        right: 0;
        top: calc(100% + 12px);
        z-index: 10030;
        pointer-events: auto;
    }

    .jobhubH-shell,
    .jobhubH-wrap,
    .jobhubH-nav {
        overflow: visible !important;
    }

    .jobhubH-shell {
        position: sticky;
        top: 0;
        z-index: 10000;
        isolation: isolate;
    }

    .jobhubH-shell {
        position: sticky;
        top: 0;
        z-index: 10000;
        isolation: isolate;
    }

    .jobhubA-root {
        position: relative;
        z-index: 10020;
    }

    .jobhubA-pop {
        z-index: 10030;
        pointer-events: auto;
    }

    .jobhubH-shell,
    .jobhubH-wrap,
    .jobhubH-nav {
        overflow: visible !important;
    }

    .jobhubH-shell {
        z-index: 10000;
        isolation: isolate;
    }

    .jobhubA-root {
        position: relative;
        z-index: 10020;
    }

    .jobhubA-pop {
        z-index: 10030;
        pointer-events: auto;
    }

    .jobhubH-shell,
    .jobhubH-wrap,
    .jobhubH-nav {
        overflow: visible !important;
    }
</style>
