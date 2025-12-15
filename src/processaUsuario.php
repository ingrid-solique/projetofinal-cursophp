<?php

if (!isset($_POST['username']) || !isset($_POST['senha']) || !isset($_POST['nome'])) {
    die("Dados incompletos.");
}

require_once 'conexao.php';
require_once 'Usuario.php';

$usuario = new Usuario(
    $conexao,
    $_POST['nome'],
    $_POST['email'],
    $_POST['username'],
    $_POST['senha']
);

$usuario->addUsuario();
header("Location: ../index.php");
