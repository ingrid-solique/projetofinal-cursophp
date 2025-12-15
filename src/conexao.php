<?php

$user = 'root';
$pass = '';
$host = 'localhost';
$dbname = 'loja';


$conexao = new mysqli($host, $user, $pass, $dbname);


if ($conexao->connect_error) {
    die('Erro na conexão: ' . $conexao->connect_error);
}
