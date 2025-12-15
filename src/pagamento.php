<?php

session_start();
if(empty($_SESSION['carrinho'])) {
    echo "<script>
            alert('Seu carrinho esta vazio!');
            window.location.href = '../index.php';
          </script>";
    exit();
}
require_once 'conexao.php';
foreach($_SESSION['carrinho'] as $produto_id) {
    $stmt = $conexao->prepare("SELECT * FROM produtos WHERE id = ?");
    $stmt->bind_param("i", $produto_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $produto = $result->fetch_assoc();
    $stmt->close();
    $produtos_no_carrinho[] = $produto;
}

require_once 'Pedido.php';
$total = 0;
$codPedido = uniqid();
$pedido = new Pedido($conexao);
foreach($produtos_no_carrinho as $produto) {
    $pedido->addPedido($produto['id'], $_SESSION['idUsuario'], $codPedido, 1);
}

// Limpar o carrinho após finalizar o pedido
$_SESSION['carrinho'] = []; 

header('Location: emailPedido.php?codPedido=' . $codPedido);
?>