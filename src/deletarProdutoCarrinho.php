<?php

if (!isset($_GET['id'])) {
    header("Location: carrinho.php");
    exit();
}

session_start();
$produto_id = intval($_GET['id']);
if (($key = array_search($produto_id, $_SESSION['carrinho'])) !== false) {
    unset($_SESSION['carrinho'][$key]);
    // Reindexa o array para evitar buracos
    $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
}

header("Location: carrinho.php");
exit();