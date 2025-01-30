// Abre o modal e define a aula escolhida
function abrirAgendamento(aula) {
    document.getElementById("modal-title").textContent = `Agendar ${aula}`;
    document.getElementById("modal").style.display = "flex";
}

// Confirma o agendamento e exibe alerta personalizado
function confirmarAgendamento() {
    let horario = document.getElementById("horario").value;
    let professor = document.getElementById("professor").value;

    // Fecha o modal antes de exibir o alerta
    fecharModal();

    // Exibe alerta personalizado
    exibirAlerta("Agendamento feito!");
}

// Fecha o modal sem agendar
function fecharModal() {
    document.getElementById("modal").style.display = "none";
}

// Exibe um alerta centralizado personalizado
function exibirAlerta(mensagem) {
    let alerta = document.createElement("div");
    alerta.classList.add("custom-alert");
    alerta.innerHTML = `
        <div class="alert-box">
            <p>${mensagem}</p>
            <button onclick="fecharAlerta(this)">OK</button>
        </div>
    `;
    document.body.appendChild(alerta);
}

// Remove o alerta da tela
function fecharAlerta(botao) {
    let alerta = botao.parentElement.parentElement;
    alerta.remove();
}
