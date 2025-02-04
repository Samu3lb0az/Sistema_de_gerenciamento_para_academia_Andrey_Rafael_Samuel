<?php
include "conexao.php";

$instrutores_por_especialidade = [];

if (isset($_GET['aula'])) {
    $aula = $_GET['aula'];

    $sql = "SELECT i.instrutor_nome 
            FROM especialidade e 
            INNER JOIN instrutor i ON e.fk_instrutor_id = i.instrutor_cod
            WHERE e.especialidade_tipo = ?";
    
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $aula);
    $stmt->execute();
    $result = $stmt->get_result();

    $instrutores = [];
    while ($row = $result->fetch_assoc()) {
        $instrutores[] = $row['instrutor_nome'];
    }

    echo json_encode($instrutores);
    exit; 
}
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar aula</title>
    <link rel="stylesheet" href="./css/agendar_aula.css">
    <script>
        let instrutoresPorEspecialidade = <?php echo json_encode($instrutores_por_especialidade); ?>;
    </script>
    <script src="./javascript/agendar_aula.js" defer></script>
</head>
<body>
    <header>
        <div class="bx bx-menu" id="menu-icon"></div>
        <a href="./index.php" class="logo">Zen <span>Fitness</span></a>
        <ul class="navbar">
            <li><a href="./index.php">Home</a></li>
            <li><a href="#sobre">Sobre nós</a></li>
            <li><a href="./agendar_aula.php">Agendar aula</a></li>
        </ul>
        <div class="top-btn">
            <a href="cadastro.php" class="nav-btn">Matricule-se</a>
        </div>
    </header>

    <h1>Agende sua Aula</h1>

    <main class="grid-container">
        <div class="box" onclick="abrirAgendamento('Musculação')">Musculação</div>
        <div class="box" onclick="abrirAgendamento('Pilates')">Pilates</div>
        <div class="box" onclick="abrirAgendamento('Yoga')">Yoga</div>
        <div class="box" onclick="abrirAgendamento('Crossfit')">Crossfit</div>
        <div class="box" onclick="abrirAgendamento('Natação')">Natação</div>
        <div class="box" onclick="abrirAgendamento('Alongamento')">Alongamento</div>
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
            <select id="professor"></select>

            <div class="modal-buttons">
                <button onclick="confirmarAgendamento()">Confirmar</button>
                <button onclick="fecharModal()">Cancelar</button>
            </div>
        </div>
    </div>

    <a href="agendamento.php" class="btn-agendamento">Ir para Agendamentos</a>

</body>
</html>