function abrirAgendamento(aula) {
    document.getElementById("modal-title").textContent = `Agendar ${aula}`;
    document.getElementById("modal").style.display = "flex";

    // Busca os instrutores da especialidade selecionada
    fetch(`agendar_aula.php?aula=${encodeURIComponent(aula)}`)
        .then(response => response.json())
        .then(instrutores => {
            let professorSelect = document.getElementById("professor");
            professorSelect.innerHTML = ""; // Limpa as opções anteriores

            if (instrutores.length > 0) {
                instrutores.forEach(instrutor => {
                    let option = document.createElement("option");
                    option.textContent = instrutor;
                    professorSelect.appendChild(option);
                });
            } else {
                let option = document.createElement("option");
                option.textContent = "Nenhum instrutor disponível";
                option.disabled = true;
                professorSelect.appendChild(option);
            }
        })
        .catch(error => console.error("Erro ao buscar instrutores:", error));
}
function confirmarAgendamento() {
    Swal.fire({
        title: "Sucesso!",
        text: "Aula agendada com sucesso!",
        icon: "success",
        confirmButtonText: "OK",
        confirmButtonColor: "#28a745"
    }).then(() => {
        fecharModal();
    });
}

function cancelarAgendamento() {
    Swal.fire({
        title: "Cancelado!",
        text: "Aula não foi agendada.",
        icon: "error",
        confirmButtonText: "OK",
        confirmButtonColor: "#d33"
    }).then(() => {
        fecharModal();
    });
}

function fecharModal() {
    document.getElementById("modal").style.display = "none";
}
