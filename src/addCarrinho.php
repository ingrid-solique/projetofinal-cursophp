<?php

if(!isset($_GET['produto_id'])) {
    header("Location: ../index.php");
    exit();
}

require_once 'conexao.php';

session_start();

$_SESSION['carrinho'][] = intval($_GET['produto_id']);

echo "<script>
        alert('Produto adicionado ao carrinho com sucesso!');
        window.location.href = '../index.php';
    </script>";
