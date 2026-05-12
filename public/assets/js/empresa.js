(() => {
  "use strict";

  const ROUTES = window.JobHub_ROUTES || {};
  const LOGIN = ROUTES.HOME || "/";
  const CADASTRO_EMPRESA = ROUTES.CADASTRO_RECRUTADOR || "/cadastrar/recrutador";
  const HOME_CANDIDATO = ROUTES.HOME || "/";

  const hamburger = document.getElementById("menuHamburger");
  const header = document.getElementById("siteHeader");
  const btnMenu = document.querySelector(".link-menu");

  function openMobileMenu() {
    if (document.querySelector(".mobile-menu")) return;

    const overlay = document.createElement("div");
    overlay.className = "mobile-overlay";

    const menu = document.createElement("nav");
    menu.className = "mobile-menu";
    menu.setAttribute("aria-label", "Menu mobile");
    menu.innerHTML = `
      <button class="mobile-close" aria-label="Fechar menu">&times;</button>
      <a href="#">Buscar currículos</a>
      <a href="${CADASTRO_EMPRESA}">Anunciar vagas grátis</a>
      <a href="#">Blog</a>
      <hr>
      <a href="#">Ajuda</a>
      <a href="${LOGIN}" class="btn-entrar">Entrar</a>
      <a href="${HOME_CANDIDATO}" class="btn-candidato">Para Candidatos</a>
    `;

    document.body.appendChild(overlay);
    document.body.appendChild(menu);
    document.body.style.overflow = "hidden";
    hamburger?.setAttribute("aria-expanded", "true");

    const close = () => {
      overlay.remove();
      menu.remove();
      document.body.style.overflow = "";
      hamburger?.setAttribute("aria-expanded", "false");
    };

    overlay.addEventListener("click", close);
    menu.querySelector(".mobile-close")?.addEventListener("click", close);
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && document.querySelector(".mobile-menu")) close();
    }, { once: true });
  }

  hamburger?.addEventListener("click", openMobileMenu);

  let dropdown = null;
  function openDropdown() {
    if (!btnMenu || dropdown) return;
    dropdown = document.createElement("div");
    dropdown.className = "empresa-dropdown show";
    dropdown.innerHTML = `
      <a href="${CADASTRO_EMPRESA}">Anunciar vagas</a>
      <a href="${LOGIN}?mode=empresa">Painel da empresa</a>
    `;
    btnMenu.parentElement?.appendChild(dropdown);
    dropdown.addEventListener("click", (e) => e.stopPropagation());
  }
  function closeDropdown() {
    if (!dropdown) return;
    dropdown.remove();
    dropdown = null;
  }

  btnMenu?.addEventListener("click", (e) => {
    e.preventDefault();
    e.stopPropagation();
    dropdown ? closeDropdown() : openDropdown();
  });
  document.addEventListener("click", closeDropdown);
  window.addEventListener("resize", closeDropdown);

  if (header) {
    const headerHeight = header.offsetHeight;
    window.addEventListener("scroll", () => {
      const on = window.scrollY > headerHeight;
      header.classList.toggle("header-fixed", on);
      document.body.style.paddingTop = on ? `${headerHeight}px` : "0px";
    });
  }
})();
