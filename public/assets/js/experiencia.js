// ===========================================================
//  CLONAGEM DE EXPERIÊNCIAS
// ===========================================================
const btnAddExp = document.getElementById("add-experiencia");
const areaExp = document.getElementById("area-experiencias");

// Primeiro modelo já existe no HTML:
let modeloExp = areaExp.querySelector(".experiencia");

btnAddExp.addEventListener("click", () => {
    let novaExp = modeloExp.cloneNode(true);

    // Limpar os campos
    novaExp.querySelectorAll("input, textarea").forEach(campo => campo.value = "");

    areaExp.appendChild(novaExp);
    ativarRemover(novaExp);
});


// ===========================================================
//  CLONAGEM DE FORMAÇÕES
// ===========================================================
const btnAddForm = document.getElementById("add-formacao");
const areaForm = document.getElementById("area-formacoes");

// Primeiro modelo já existe no HTML:
let modeloForm = areaForm.querySelector(".formacao");

btnAddForm.addEventListener("click", () => {
    let novaForm = modeloForm.cloneNode(true);

    // Limpar campos
    novaForm.querySelectorAll("input, textarea").forEach(campo => campo.value = "");

    areaForm.appendChild(novaForm);
    ativarRemover(novaForm);
});


// ===========================================================
//  REMOVER BLOCOS (experiência ou formação)
// ===========================================================
function ativarRemover(bloco) {
    const btn = bloco.querySelector(".btn-remover");

    btn.addEventListener("click", () => {
        // Impede remover o primeiro bloco obrigatório
        let parent = bloco.parentElement;
        if (parent.children.length > 1) {
            bloco.remove();
        } else {
            alert("O primeiro bloco não pode ser removido.");
        }
    });
}

// Ativar remover nos blocos que já vêm no HTML
document.querySelectorAll(".bloco").forEach(ativarRemover);


// ===========================================================
//  ENVIO FINAL DO FORMULÁRIO (pode adaptar para AJAX/PHP)
// ===========================================================
document.getElementById("formExperiencia").addEventListener("submit", (e) => {
    e.preventDefault();

    // Aqui você manda pro backend usando fetch/AJAX ou redireciona para a próxima etapa.
    console.log("Form enviado!");
    alert("Dados salvos! Próxima etapa...");
});
