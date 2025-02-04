<?php
// Inicia a sessão
session_start();

// Remove todas as variáveis de sessão
session_unset();

// Destrói a sessão
session_destroy();

// Redireciona para a página inicial ou de login
header("Location: index.php");
exit;
?>
