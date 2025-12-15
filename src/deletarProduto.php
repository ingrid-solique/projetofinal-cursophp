<?php

if (!isset($_GET['id'])) {
    die("ID do produto não fornecido para exclusão.");
}

require_once 'conexao.php';
require_once 'Produto.php';

$produto = new Produto($conexao, '', 0, 0, '');
$produto->deletarProduto($_GET['id']);
