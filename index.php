<?php
session_start();

$usuario_logado = isset($_SESSION['usuario']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zen Fitness</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/index.css">
    <script src="./javascript/index.js"></script>
</head>
<body>

    <header>
        <div class="bx bx-menu" id="menu-icon"></div>

        <a href="#home" class="logo">Zen <span>Fitness</span></a>

        <ul class="navbar">
            <li><a href="#home">Home</a></li>
            <li><a href="#sobre">Sobre nós</a></li>
            <li><a href="./agendar_aula.php">Agendar aula</a></li>
        </ul>

        <div class="top-btn">
            <?php if ($usuario_logado): ?>
                <!-- Botão "Sair" para logout -->
                <a href="logout.php" class="nav-btn">Sair</a>
            <?php else: ?>
                <!-- Botão "Matricule-se" se não estiver logado -->
                <a href="cadastro.php" class="nav-btn">Matricule-se</a>
            <?php endif; ?>
        </div>
    </header>


    <section class="home" id="home">
        <div class="home-content">
            <h3>Construa o seu</h3>
            <h1>Físico dos sonhos</h1>
            <h3><span class="multiple-text">Bodybuilding</span></h3>

            <p>Conheça mais sobre nossa rede de academias!</p>

            <a href="#sobre" class="btn">Saiba mais</a>
        </div>

        <div class="home-img">
            <img src="./img/home_background.png" alt="Background">
        </div>
    </section>

    <section class="sobre" id="sobre">
        <div class="sobre-img">
            <img src="./img/sobre-img.jpg" alt="Homem correndo na esteira">
        </div>

        <div class="sobre-content">
            <h2 class="heading">Por que nos escolher?</h2>

            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
                labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
            <p>But I must explain to you how all this mistaken idea of denouncing pleasure.</p>

            <a href="cadastro.php" class="btn">Matricule-se agora!</a>

            <button id="backToTop" class="back-to-top">
                &#8679;
            </button>
        </div>
    </section>

</body>
</html>
