/* =========================================================
   IA CAROUSEL
========================================================= */

const iaData = [
    {
        img: `${window.URL_BASE || "/"}assets/img/icon-full-adm.svg`,
        title: "Performance e Desenvolvimento",
        color: "#e74d3d",
        text: "Avaliações inteligentes com resumos automáticos."
    },
    {
        img: `${window.URL_BASE || "/"}assets/img/icon-full-ce.svg`,
        title: "Recrutamento e Seleção",
        color: "#a92b9d",
        text: "Recomendação de talentos, inscrição via WhatsApp e Agentes de IA."
    },
    {
        img: `${window.URL_BASE || "/"}assets/img/icon-full-edc.svg`,
        title: "Admissão",
        color: "#5e7a27",
        text: "Validação automática de documentos em segundos com apoio de Agentes de IA."
    }
];

let iaIndex = 0;

const prevCard = document.getElementById("cardPrev");
const activeCard = document.getElementById("cardActive");
const nextCard = document.getElementById("cardNext");
const dots = document.getElementById("iaDots");

function iaCardHTML(item) {
    return `
        <div class="ia-card-header">
            <img src="${item.img}" alt="${item.title}" class="ia-card-icon">
            <h3 class="ia-card-title">${item.title}</h3>
        </div>
        <p class="ia-card-text">${item.text}</p>
    `;
}

function renderIA() {
    if (!prevCard || !activeCard || !nextCard || !dots) return;
    activeCard.classList.add("is-exiting");

    setTimeout(() => {
        const prev = (iaIndex - 1 + iaData.length) % iaData.length;
        const next = (iaIndex + 1) % iaData.length;

        prevCard.innerHTML = iaCardHTML(iaData[prev]);
        activeCard.innerHTML = iaCardHTML(iaData[iaIndex]);
        nextCard.innerHTML = iaCardHTML(iaData[next]);

        activeCard.classList.remove("is-exiting");
        activeCard.classList.add("is-entering");

        setTimeout(() => {
            activeCard.classList.remove("is-entering");
        }, 30);

        document.querySelectorAll(".ia-dot").forEach((dot, i) => {
            dot.classList.toggle("active", i === iaIndex);
        });

    }, 260);

    document
        .querySelector(".empresaDemo-ia-carousel")
        .style.setProperty("--glow-color", iaData[iaIndex].color);
}

/* Dots */
if (dots) iaData.forEach((_, i) => {
    const dot = document.createElement("div");
    dot.className = "ia-dot";
    dot.onclick = () => {
        iaIndex = i;
        if (prevCard && activeCard && nextCard && dots) renderIA();
    };
    dots.appendChild(dot);
});

const iaPrevBtn = document.querySelector(".ia-prev");
const iaNextBtn = document.querySelector(".ia-next");
if (iaPrevBtn) iaPrevBtn.onclick = () => {
    iaIndex = (iaIndex - 1 + iaData.length) % iaData.length;
    renderIA();
};

if (iaNextBtn) iaNextBtn.onclick = () => {
    iaIndex = (iaIndex + 1) % iaData.length;
    renderIA();
};

renderIA();

/* Cursor do carousel */
const layer = document.querySelector(".carousel-cursor-layer");
const cursor = document.getElementById("carouselCursor");

if (layer && cursor) layer.addEventListener("mousemove", (e) => {
    cursor.style.left = e.clientX + "px";
    cursor.style.top = e.clientY + "px";

    const rect = layer.getBoundingClientRect();
    const center = rect.width / 2;

    cursor.classList.add("show");
    cursor.classList.toggle("right", (e.clientX - rect.left) > center);
});

if (layer && cursor) layer.addEventListener("mouseleave", () => {
    cursor.classList.remove("show");
});

if (layer && cursor) layer.addEventListener("click", () => {
    iaIndex = cursor.classList.contains("right")
        ? (iaIndex + 1) % iaData.length
        : (iaIndex - 1 + iaData.length) % iaData.length;
    renderIA();
});




/* =========================================================
   DESKTOP DROPDOWN (MENU)
========================================================= */
(() => {
    const btn = document.getElementById("submenuDesktopBtn");
    const box = document.getElementById("submenuDesktop");

    if (!btn || !box) return;

    const open = () => {
        box.classList.add("show", "active", "open");
        if (getComputedStyle(box).display === "none") {
            box.style.display = "block";
        }
    };

    const close = () => {
        box.classList.remove("show", "active", "open");
        box.style.display = "";
    };

    const isOpen = () => {
        return (
            box.classList.contains("show") ||
            box.classList.contains("active") ||
            box.classList.contains("open") ||
            getComputedStyle(box).display !== "none"
        );
    };

    btn.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();
        isOpen() ? close() : open();
    });

    box.addEventListener("click", e => e.stopPropagation());
    document.addEventListener("click", close);
    document.addEventListener("keydown", e => e.key === "Escape" && close());
})();



const stepsData = [
    {
        label: "Passo 01",
        title: "Crie sua conta e inicie sua jornada profissional",
        text: "Cadastre-se gratuitamente na plataforma e tenha acesso a um ecossistema completo de oportunidades. Em poucos minutos, você cria seu perfil e já começa a receber vagas alinhadas ao seu objetivo profissional.",
        color: "#3b82f6",
        icon: `
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
            <circle cx="12" cy="7" r="4"/>
            <path d="M5.5 21a6.5 6.5 0 0113 0"/>
        </svg>`
    },
    {
        label: "Passo 02",
        title: "Cadastre seu currículo de forma estratégica",
        text: "Preencha suas experiências, competências e objetivos profissionais. Nosso sistema organiza suas informações para aumentar sua visibilidade e potencializar suas chances nos processos seletivos.",
        color: "#8b5cf6",
        icon: `
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
            <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
            <path d="M14 2v6h6"/>
        </svg>`
    },
    {
        label: "Passo 03",
        title: "Candidate-se às vagas e acompanhe seu progresso",
        text: "Encontre oportunidades compatíveis com seu perfil, acompanhe cada etapa do processo seletivo e receba atualizações em tempo real até a conquista da sua próxima oportunidade.",
        color: "#10b981",
        icon: `
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
            <path d="M9 11l3 3L22 4"/>
            <path d="M21 12.5v6a2.5 2.5 0 01-2.5 2.5H5A2.5 2.5 0 012.5 18.5v-13A2.5 2.5 0 015 3h11"/>
        </svg>`
    }
];


const tabs = document.querySelectorAll(".step-tab");
const box = document.querySelector(".steps-box");
const icon = document.querySelector(".step-icon");
const label = document.querySelector(".step-label");
const title = document.querySelector(".step-title");
const text = document.querySelector(".step-text");
const stepsRoot = document.querySelector(".empresaDemo-steps");

let current = -1;
let animating = false;

function renderStep(index) {
    if (!box || !icon || !label || !title || !text || !stepsRoot) return;
    if (animating || index === current || !stepsData[index]) return;
    animating = true;

    box.classList.add("is-exiting");

    setTimeout(() => {
        const step = stepsData[index];

        icon.innerHTML = step.icon;
        label.textContent = step.label;
        title.textContent = step.title;
        text.textContent = step.text;
        stepsRoot.style.setProperty("--step-color", step.color);

        box.classList.remove("is-exiting");
        box.classList.add("is-entering");

        requestAnimationFrame(() => {
            box.classList.add("is-entering-active");
        });

        setTimeout(() => {
            box.classList.remove("is-entering", "is-entering-active");
            current = index;
            animating = false;
        }, 320);
    }, 160);
}

if (tabs.length && box && icon && label && title && text && stepsRoot) {
    tabs.forEach((tab, i) => {
        tab.addEventListener("click", () => {
            tabs.forEach(t => t.classList.remove("active"));
            tab.classList.add("active");
            renderStep(i);
        });
    });

    renderStep(0);
}

(() => {
    const steps = [{
        n: "01",
        kicker: "Passo 01",
        title: "Crie sua conta em 1 minuto",
        text: "Comece com seus dados básicos e libere recomendações personalizadas. Você entra no fluxo certo e já começa a construir um perfil forte.",
        icon: "<i class='fa-solid fa-user-plus'></i>",
        badges: [{
            type: "primary",
            html: "<i class='fa-solid fa-shield-halved'></i> Seguro"
        },
        {
            type: "",
            html: "<i class='fa-regular fa-eye'></i> Mais visibilidade"
        },
        {
            type: "",
            html: "<i class='fa-solid fa-chart-line'></i> Melhor ranqueamento"
        },
        ],
        ctaHref: `${window.JobHub_ROUTES?.CADASTRO_CANDIDATO || ((window.URL_BASE || "/") + "cadastrar/candidato")}`,
        ctaHtml: "<i class='fa-solid fa-user-plus'></i> Criar conta",
        progressTitle: "Conta criada",
        progressSubtitle: "Quanto mais completo, maior sua visibilidade."
    },
    {
        n: "02",
        kicker: "Passo 02",
        title: "Cadastre seu currículo com clareza",
        text: "Formações e experiências organizadas aumentam sua força de perfil. Isso melhora o match e as vagas sugeridas — sem bagunça.",
        icon: "<i class='fa-regular fa-file-lines'></i>",
        badges: [{
            type: "primary",
            html: "<i class='fa-solid fa-circle-check'></i> Perfil forte"
        },
        {
            type: "",
            html: "<i class='fa-solid fa-wand-magic-sparkles'></i> Match melhor"
        },
        {
            type: "",
            html: "<i class='fa-regular fa-clock'></i> Mais rapidez"
        },
        ],
        ctaHref: `${window.JobHub_ROUTES?.CADASTRO_CANDIDATO || ((window.URL_BASE || "/") + "cadastrar/candidato")}`,
        ctaHtml: "<i class='fa-regular fa-file-lines'></i> Cadastrar CV",
        progressTitle: "Currículo preenchido",
        progressSubtitle: "Seu perfil começa a ranquear melhor nas buscas."
    },
    {
        n: "03",
        kicker: "Passo 03",
        title: "Candidate-se com foco nas melhores vagas",
        text: "Com o perfil pronto, você aparece com mais relevância para recrutadores e recebe vagas com maior aderência.",
        icon: "<i class='fa-solid fa-briefcase'></i>",
        badges: [{
            type: "primary",
            html: "<i class='fa-solid fa-star'></i> Alto match"
        },
        {
            type: "",
            html: "<i class='fa-regular fa-message'></i> Resposta mais rápida"
        },
        {
            type: "",
            html: "<i class='fa-solid fa-layer-group'></i> Mais oportunidades"
        },
        ],
        ctaHref: `${window.JobHub_ROUTES?.LOGIN || ((window.URL_BASE || "/") + "login")}`,
        ctaHtml: "<i class='fa-solid fa-right-to-bracket'></i> Entrar e candidatar",
        progressTitle: "Pronto para vagas",
        progressSubtitle: "Você está no ponto ideal para aplicar com confiança."
    }
    ];

    const root = document.getElementById("jobhubSteps");
    if (!root) return;

    const tabs = [...root.querySelectorAll(".jobhub-tab")];
    const minis = [...root.querySelectorAll(".jobhub-mini")];
    const dots = [...root.querySelectorAll(".jobhub-dot")];

    const pill = document.getElementById("jobhubStepsPill");
    const content = document.getElementById("jobhubContent");

    const label = document.getElementById("jobhubStepLabel");
    const title = document.getElementById("jobhubStepTitle");
    const text = document.getElementById("jobhubStepText");
    const icon = document.getElementById("jobhubStepIcon");
    const badgesWrap = content.querySelector(".jobhub-badges");

    const pFill = document.getElementById("jobhubProgressFill");
    const pTitle = document.getElementById("jobhubProgressTitle");
    const pSub = document.getElementById("jobhubProgressSubtitle");

    const ctaPrimary = document.getElementById("jobhubCtaPrimary");

    function rerenderBadges(badges) {
        badgesWrap.innerHTML = "";
        (badges || []).forEach(b => {
            const span = document.createElement("span");
            span.className = "jobhub-badge" + (b.type ? (" " + b.type) : "");
            span.innerHTML = b.html;
            badgesWrap.appendChild(span);
        });
    }

    function setStep(index) {
        const s = steps[index] || steps[0];

        tabs.forEach((b, i) => {
            const active = i === index;
            b.classList.toggle("is-active", active);
            b.setAttribute("aria-selected", active ? "true" : "false");
        });

        minis.forEach((m, i) => m.classList.toggle("is-active", i === index));
        dots.forEach((d, i) => d.classList.toggle("is-active", i === index));

        pill.textContent = `${s.n} de 03`;

        // animação leve
        content.classList.remove("jobhub-anim");
        void content.offsetWidth;
        content.classList.add("jobhub-anim");

        label.innerHTML = `<i class="fa-solid fa-bolt"></i> ${s.kicker}`;
        title.textContent = s.title;
        text.textContent = s.text;
        icon.innerHTML = s.icon;

        rerenderBadges(s.badges);

        ctaPrimary.href = s.ctaHref;
        ctaPrimary.innerHTML = s.ctaHtml;

        pTitle.textContent = s.progressTitle;
        pSub.textContent = s.progressSubtitle;

        const pct = Math.round(((index + 1) / steps.length) * 100);
        pFill.style.width = `${pct}%`;
    }

    function bind(el) {
        el.addEventListener("click", () => {
            const idx = parseInt(el.getAttribute("data-step") || "0", 10);
            setStep(Number.isFinite(idx) ? idx : 0);
        });
    }

    tabs.forEach(bind);
    minis.forEach(bind);

    // teclado: setas esquerda/direita
    root.addEventListener("keydown", (e) => {
        const current = tabs.findIndex(t => t.classList.contains("is-active"));
        if (e.key === "ArrowRight") setStep(Math.min(2, current + 1));
        if (e.key === "ArrowLeft") setStep(Math.max(0, current - 1));
    });

    setStep(0);
})();

(() => {
    "use strict";

    const BASE = window.URL_BASE || "/";
    const SEARCH_URL = BASE + "pesquisar";
    const KEY_CITY = "jobhub_last_city";

    const CARGOS = [
        "Vendas", "Auxiliar Administrativo", "Assistente Administrativo", "Recepcionista",
        "Atendente", "Operador de Caixa", "Jovem Aprendiz", "Estágio",
        "Logística", "Auxiliar de Produção", "Motorista", "Estoquista",
        "Telemarketing", "Suporte Técnico", "Desenvolvedor", "Analista de RH",
        "Financeiro", "Jurídico", "Enfermagem", "Cozinha"
    ];

    const CIDADES = [
        "São Paulo - SP", "Guarulhos - SP", "Osasco - SP", "Santo André - SP",
        "São Bernardo do Campo - SP", "São Caetano do Sul - SP", "Diadema - SP",
        "Barueri - SP", "Cotia - SP", "Campinas - SP", "Sorocaba - SP",
        "Rio de Janeiro - RJ", "Belo Horizonte - MG", "Curitiba - PR", "Salvador - BA", "Brasília - DF"
    ];

    const CAT_TO_FILTER = {
        "Administrativo": {
            setor: "administrativo"
        },
        "Vendas": {
            setor: "vendas"
        },
        "Jurídico": {
            setor: "juridico"
        },
        "Financeiro": {
            setor: "financeiro"
        },
        "Produção": {
            setor: "producao"
        },
        "RH": {
            setor: "rh"
        },
        "Saúde": {
            setor: "saude"
        },
        "Educação": {
            setor: "educacao"
        },
        "Tecnologia": {
            setor: "tecnologia"
        },
        "Cozinha": {
            setor: "cozinha"
        },
        "PCD": {
            setor: "pcd",
            pcd: "1"
        },
        "Primeiro Emprego": {
            setor: "primeiro_emprego"
        }
    };

    const $ = (s, el = document) => el.querySelector(s);
    const $$ = (s, el = document) => [...el.querySelectorAll(s)];

    function openList(box) {
        box.classList.add("is-open");
    }

    function closeList(box) {
        box.classList.remove("is-open");
    }

    function normalize(v) {
        return String(v || "").toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    }

    function renderSuggestions(input, box, items, hint) {
        const val = normalize(input.value);
        let list = items;

        if (val) list = items.filter(x => normalize(x).includes(val)).slice(0, 8);
        else list = items.slice(0, 8);

        box.innerHTML = "";
        list.forEach((txt, idx) => {
            const b = document.createElement("button");
            b.type = "button";
            b.setAttribute("role", "option");
            b.innerHTML = `${txt} <span>${hint}</span>`;
            b.addEventListener("click", () => {
                input.value = txt;
                input.dispatchEvent(new Event("input", {
                    bubbles: true
                }));
                closeList(box);
            });
            if (idx === 0) b.classList.add("is-active");
            box.appendChild(b);
        });

        if (list.length) openList(box);
        else closeList(box);
    }

    function attachSuggest(selector, items, hint, onChange) {
        const input = $(selector);
        if (!input) return;

        const box = input.parentElement.querySelector(".empresaDemo-suggest");
        if (!box) return;

        let active = 0;

        input.addEventListener("focus", () => renderSuggestions(input, box, items, hint));
        input.addEventListener("click", () => renderSuggestions(input, box, items, hint));
        input.addEventListener("input", () => {
            renderSuggestions(input, box, items, hint);
            if (onChange) onChange(input.value);
        });

        input.addEventListener("keydown", (e) => {
            const btns = $$("button", box);
            if (!btns.length) return;

            if (e.key === "ArrowDown") {
                e.preventDefault();
                active = Math.min(btns.length - 1, active + 1);
            }
            if (e.key === "ArrowUp") {
                e.preventDefault();
                active = Math.max(0, active - 1);
            }
            if (e.key === "Enter") {
                if (box.classList.contains("is-open")) {
                    e.preventDefault();
                    btns[active].click();
                    return;
                }
            }

            btns.forEach(b => b.classList.remove("is-active"));
            btns[active]?.classList.add("is-active");
        });

        document.addEventListener("click", (e) => {
            if (e.target === input) return;
            if (e.target.closest(".empresaDemo-suggest")) return;
            closeList(box);
        });
    }

    attachSuggest('#heroSearch input[name="q"]', CARGOS, "cargo/área");
    attachSuggest('#heroSearch input[name="city"]', CIDADES, "cidade", (v) => {
        const clean = String(v || "").trim();
        if (clean) sessionStorage.setItem(KEY_CITY, clean);
    });

    const cityInput = $('#heroSearch input[name="city"]');
    if (cityInput && !cityInput.value) {
        const last = sessionStorage.getItem(KEY_CITY);
        if (last) cityInput.value = last;
    }

    document.querySelectorAll(".empresaDemo-categorias .cat-card").forEach(card => {
        card.style.cursor = "pointer";
        card.addEventListener("click", () => {
            const label = card.querySelector("p")?.textContent?.trim() || "";
            if (!label) return;

            const cfg = CAT_TO_FILTER[label] || {
                q: label
            };
            const url = new URL(SEARCH_URL, window.location.origin);

            const c = (cityInput?.value || sessionStorage.getItem(KEY_CITY) || "").trim();
            if (c) url.searchParams.set("city", c);

            if (cfg.q) url.searchParams.set("q", cfg.q);
            if (cfg.setor) url.searchParams.set("setor", cfg.setor);
            if (cfg.pcd) url.searchParams.set("pcd", cfg.pcd);

            window.location.href = url.toString();
        });
    });
})();