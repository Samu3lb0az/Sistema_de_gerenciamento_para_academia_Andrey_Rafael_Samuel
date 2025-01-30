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
            background-color:rgb(248, 166, 3);
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
    <div class="container">
        <h2>Seja bem-vindo ao</h2>
        <h2 id="zenfitness">Zen <span class="fitness">Fitness</span></h2>
        <form id="formCadastro" action="#">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="text" name="cpf" placeholder="CPF" required pattern="\d{11}" title="Digite um CPF com 11 dígitos (apenas números)">
            <input type="tel" name="telefone" placeholder="Telefone" required pattern="\d{10,11}" title="Digite um telefone com 10 ou 11 dígitos (apenas números)">
            <button type="submit" href="./index.php">Cadastrar</button>
        </form>
    </div>
    <div id="alert" class="alert">
        Cadastro realizado com sucesso!
    </div>

    <script>
       const form = document.getElementById('formCadastro');
    const alert = document.getElementById('alert');

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        alert.classList.add('show');
        setTimeout(() => {
            window.location.href = 'index.php'; 
        }, 3000);
    });
    </script>
</body>
</html>
