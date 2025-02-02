<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_academia";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$mensagem = "";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];

    if (empty($nome) || empty($cpf) || empty($telefone)) {
        $mensagem = "Todos os campos são obrigatórios.";
    } else {

        $sql = "INSERT INTO aluno (aluno_nome, aluno_cpf, aluno_telefone) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            $mensagem = "Erro na preparação da consulta: " . $conn->error;
        } else {
            $stmt->bind_param("sss", $nome, $cpf, $telefone);

            if ($stmt->execute()) {

                $_SESSION['aluno_id'] = $conn->insert_id; 
                $mensagem = "Cadastro realizado com sucesso!";
                header("Location: index.php");
                exit();
            } else {
                $mensagem = "Erro ao cadastrar: " . $stmt->error;
            }

            $stmt->close();
        }
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-image: url('img/peso_academia_cadastro.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .container {
            background-color: rgb(69 69 69 / 90%);
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

        .fitness {
            color: rgb(231, 145, 15); 
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color:rgb(231, 145, 15);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }

        button:hover {
            background-color:rgb(175, 111, 15);
        }

        .botao {
            position: fixed;
            top: 10px; 
            left: 10px; 
            background-color:rgb(231, 145, 15);
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
            background-color:rgb(175, 111, 15);
        }

        @media (max-width: 600px) {
            .container {
                width: 90%;
            }
        }

        .alert {
            display: none;
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 20px;
            background-color: rgb(248, 166, 3);
            color: white;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 3;
        }

        .alert.show {
            display: block;
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateX(-50%) translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(-50%) translateY(0);
            }
        }
    </style>
</head>
<body>

    <?php if ($mensagem): ?>
        <div class="alert show"><?php echo $mensagem; ?></div>
    <?php endif; ?>

    <div class="container">
        <form id="formCadastro" method="POST">
            <h2>Cadastro de Aluno</h2>
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="text" name="cpf" placeholder="CPF" required>
            <input type="tel" name="telefone" placeholder="Telefone" required>
            <button type="submit">Cadastrar</button>
        </form>
    </div>

    <a href="index.php" class="botao">&#9664;</a>

    <script>
        const form = document.getElementById('formCadastro');
        const alert = document.querySelector('.alert');

        form.addEventListener('submit', function(event) {

            alert.classList.add('show'); 

            setTimeout(() => {
                window.location.href = 'index.php'; 
            }, 3000);
        });
    </script>
</body>
</html>
