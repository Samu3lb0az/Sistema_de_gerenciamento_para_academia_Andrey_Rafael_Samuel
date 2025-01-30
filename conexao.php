<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "db_academia_";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
echo "Conectado com sucesso!";
?>