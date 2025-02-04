<?php
session_start();
include "conexao.php";

// Verifica se o usuário está logado
$usuario_logado = isset($_SESSION['usuario_id']);

// Buscar os agendamentos corretamente na tabela aula_agendada
$sql = "SELECT a.aula_id, al.aluno_nome, i.instrutor_nome, e.especialidade_tipo, a.data_hora, a.status
        FROM aula_agendada a
        JOIN aluno al ON a.aluno_cod = al.aluno_cod
        JOIN instrutor i ON a.instrutor_cod = i.instrutor_cod
        JOIN especialidade e ON a.especialidade_id = e.especialidade_id";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamentos</title>
    <link rel="stylesheet" href="./css/agendamento.css">
</head>
<body>

<header>
    <a href="index.php" class="logo">Zen <span>Fitness</span></a>

    <ul class="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="#sobre">Sobre nós</a></li>
        <li><a href="./agendar_aula.php">Agendar aula</a></li>
    </ul>

    <div class="top-btn">
        <?php if ($usuario_logado): ?>
            <a href="logout.php" class="nav-btn">Sair</a>
        <?php else: ?>
            <a href="cadastro.php" class="nav-btn">Matricule-se</a>
        <?php endif; ?>
    </div>
</header>

<div class="container">
    <h1>Agendamentos de Aulas</h1>

    <?php if ($usuario_logado): ?>
        <a href="agendar_aula.php" class="btn-agendamento">Ir para Agendamentos</a>
    <?php endif; ?>

    <table>
        <tr>
            <th>Aluno</th>
            <th>Instrutor</th>
            <th>Especialidade</th>
            <th>Data e Hora</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['aluno_nome']) ?></td>
                <td><?= htmlspecialchars($row['instrutor_nome']) ?></td>
                <td><?= htmlspecialchars($row['especialidade_tipo']) ?></td>
                <td><?= htmlspecialchars($row['data_hora']) ?></td>
                <td><?= htmlspecialchars($row['status']) ?></td>
                <td>
                    <a href="editar_agendamento.php?id=<?= $row['aula_id'] ?>">Editar</a> |
                    <a href="excluir_agendamento.php?id=<?= $row['aula_id'] ?>" onclick="return confirm('Tem certeza?');">Excluir</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
