<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "db_academia";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome']);
    $cpf = trim($_POST['cpf']);
    $telefone = trim($_POST['telefone']);

    if (empty($nome) || empty($cpf) || empty($telefone)) {
        $mensagem = "Todos os campos são obrigatórios.";
    } else {
        $sql = "INSERT INTO aluno (aluno_nome, aluno_cpf, aluno_telefone) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sss", $nome, $cpf, $telefone);
            if ($stmt->execute()) {
                $_SESSION['usuario'] = [
                    'id' => $stmt->insert_id,
                    'nome' => $nome,
                    'cpf' => $cpf
                ];
                $_SESSION['usuario_logado'] = true;

                header("Location: index.php");
                exit();
            } else {
                $mensagem = "Erro ao cadastrar: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $mensagem = "Erro na preparação da consulta: " . $conn->error;
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

        .alert {
            display: <?= !empty($mensagem) ? 'block' : 'none' ?>;
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

        .link {
            color:rgb(235, 235, 235);
            display: block;
            margin-top: 10px;
        }
        @media (max-width: 768px) {
    body {
        background-size: cover;
    }

    .container {
        width: 90%;
        padding: 15px;
    }

    h2 {
        font-size: 24px;
    }

    input {
        padding: 8px;
        font-size: 14px;
    }

    button {
        padding: 12px;
        font-size: 14px;
    }

    .botao {
        font-size: 14px;
        padding: 8px 15px;
        margin-top: 20px;
        margin-left: 30px;
    }

    .alert {
        width: 90%;
        font-size: 14px;
        padding: 15px;
    }
}

@media (max-width: 480px) {
    .container {
        width: 100%;
        padding: 10px;
    }

    h2 {
        font-size: 20px;
    }

    input {
        font-size: 14px;
        padding: 10px;
    }

    button {
        padding: 12px;
        font-size: 14px;
    }

    .botao {
        font-size: 12px;
        padding: 6px 12px;
        margin-top: 10px;
        margin-left: 20px;
    }

    .alert {
        font-size: 12px;
        padding: 12px;
    }
}

    </style>
</head>
<body>

    <?php if (!empty($mensagem)): ?>
        <div id="alert" class="alert"><?php echo $mensagem; ?></div>
    <?php endif; ?>

    <div class="container">
        <form method="POST" onsubmit="return showAlert()">
            <h2>Cadastro de Aluno</h2>
                <input type="text" name="nome" placeholder="Nome" required>
                <input type="text" name="cpf" id="cpf" placeholder="CPF" required inputmode="numeric" onkeypress="return somenteNumeros(event)">
                <input type="tel" name="telefone" id="telefone" placeholder="Telefone" required inputmode="numeric" onkeypress="return somenteNumeros(event)">
                <button type="submit" class="btn">Cadastrar</button>
                <a href="login.php" class="link">Já tem uma conta?</a>
        </form>
    </div>

    <a href="index.php" class="botao">&#9664;</a>

<script>
    function showAlert() {
        document.addEventListener("DOMContentLoaded", function () {
    let alertBox = document.getElementById("alert");
    if (alertBox) {
        setTimeout(() => {
            alertBox.style.display = "none";
        }, 3000);
    }
});

    }
    function somenteNumeros(e) {
        let charCode = e.which ? e.which : e.keyCode;
        if (charCode < 48 || charCode > 57) {
            return false;
        }
        return true;
    }

</script>


</body>
</html>
