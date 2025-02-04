<?php
session_start();
include 'conexao.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = isset($_POST['aluno_nome']) ? trim($_POST['aluno_nome']) : '';
    $cpf = isset($_POST['aluno_cpf']) ? trim($_POST['aluno_cpf']) : '';

    if (!empty($nome) && !empty($cpf)) {
        $sql = "SELECT * FROM aluno WHERE aluno_nome = ? AND aluno_cpf = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $nome, $cpf);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['usuario'] = $nome;
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Nome ou CPF incorretos!');</script>";
        }
    } else {
        echo "<script>alert('Preencha todos os campos!');</script>";
    }
}


if (!$conn) {
    die("Erro na conexão com o banco de dados!");
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('img/peso_academia_cadastro.png') no-repeat center center/cover;
        }
        .container {
            background-color: rgba(69, 69, 69, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
            z-index: 2;
        }

        h2 {
            margin-bottom: 10px;
            color: #ffffff;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background: orange;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: white;
            font-size: 16px;
        }
        .btn:hover {
            background: darkorange;
        }
        .link {
            color: rgb(235, 235, 235);
            display: block;
            margin-top: 10px;
        }
        .botao {
            position: fixed;
            top: 10px; 
            left: 10px; 
            background-color: rgb(231, 145, 15);
            color: white;
            padding: 10px 20px; 
            text-decoration: none; 
            border-radius: 5px; 
            font-size: 16px;
            z-index: 4;
            margin-top: 40px;
            margin-left: 50px; 
        }
        .botao:hover {
            background-color: rgb(175, 111, 15);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST">
            <input type="text" name="aluno_nome" placeholder="Nome" required>
            <input type="text" name="aluno_cpf" placeholder="CPF" required>
            <button type="submit" class="btn">Entrar</button>
        </form>
    </div>
    <a href="index.php" class="botao">&#9664;</a>
</body>
</html>
