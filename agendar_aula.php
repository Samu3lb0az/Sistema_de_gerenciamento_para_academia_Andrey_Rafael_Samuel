<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar aula</title>
    <link rel="stylesheet" href="./css/agendar_aula.css">
    <script src="./javascript/agendar_aula.js"></script>
</head>
<body>

    <header>
        <h1>Agende sua Aula</h1>
    </header>

    <main class="grid-container">
        <div class="box" onclick="abrirAgendamento('Musculação')">Musculação</div>
        <div class="box" onclick="abrirAgendamento('Pilates')">Pilates</div>
        <div class="box" onclick="abrirAgendamento('Yoga')">Yoga</div>
        <div class="box" onclick="abrirAgendamento('Crossfit')">Crossfit</div>
        <div class="box" onclick="abrirAgendamento('Spinning')">Spinning</div>
        <div class="box" onclick="abrirAgendamento('Funcional')">Treinamento Funcional</div>
    </main>

    <div id="modal" class="modal">
        <div class="modal-content">
            <h2 id="modal-title"></h2>
            <label for="horario">Escolha um horário:</label>
            <select id="horario">
                <option>08:00</option>
                <option>10:00</option>
                <option>14:00</option>
                <option>18:00</option>
                <option>20:00</option>
            </select>

            <label for="professor">Escolha um professor:</label>
            <select id="professor">
                <option>Marcos</option>
                <option>Juliana</option>
                <option>Fernando</option>
                <option>Ana</option>
            </select>

            <div class="modal-buttons">
                <button onclick="confirmarAgendamento()">Confirmar</button>
                <button onclick="fecharModal()">Cancelar</button>
            </div>
        </div>
    </div>

</body>
</html>