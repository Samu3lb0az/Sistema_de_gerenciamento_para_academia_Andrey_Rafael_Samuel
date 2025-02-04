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
            border: none;
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
        .link {
            color:rgb(235, 235, 235);
            display: block;
            margin-top: 10px;
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

    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <input type="text" placeholder="E-mail" required>
        <input type="text" placeholder="CPF" required>
        <button class="btn">Entrar</button>
        <a href="cadastro.php" class="link">Não tem uma conta? Cadastre-se</a>
    </div>
    <a href="index.php" class="botao">&#9664;</a>
</body>
</html>
