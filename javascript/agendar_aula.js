function abrirAgendamento(aula) {
    document.getElementById("modal-title").textContent = `Agendar ${aula}`;
    document.getElementById("modal").style.display = "flex";

    fetch(`agendar_aula.php?aula=${encodeURIComponent(aula)}`)
        .then(response => response.json())
        .then(instrutores => {
            let professorSelect = document.getElementById("professor");
            professorSelect.innerHTML = ""; 

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