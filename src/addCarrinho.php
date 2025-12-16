<?php

if(!isset($_GET['produto_id'])) {
    header("Location: ../index.php");
    exit();
}

require_once 'conexao.php';
require_once 'Pedido.php';

session_start();

if(!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}
if(!isset($_SESSION['quantidades'])) {
    $_SESSION['quantidades'] = [];
}

$pedido = new Pedido($conexao);

$pedido->verificaEstoque($_GET['produto_id'], $_GET['quantidade']);

if(in_array(intval($_GET['produto_id']), $_SESSION['carrinho'])) {
    $_SESSION['quantidades'][array_search($_GET['produto_id'], $_SESSION['carrinho'])] += intval($_GET['quantidade']);
} else {
    $_SESSION['carrinho'][] = intval($_GET['produto_id']);
    $_SESSION['quantidades'][] = intval($_GET['quantidade']);
}

echo "<script>
        alert('Produto adicionado ao carrinho com sucesso!');
        window.location.href = '../index.php';
    </script>";
