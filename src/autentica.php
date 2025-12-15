<?php

session_start();
if (!isset($_POST['username']) || !isset($_POST['senha'])) {
    die("Parâmetros inválidos.");
}

require_once 'conexao.php';
require_once 'Usuario.php';

$username = $_POST['username'];
$senha = $_POST['senha'];
$usuario = new Usuario($conexao, '', '', $username, $senha);
$usuario->autentica($username, $senha);

header("Location: ../index.php");
?>
