<?php

if (!isset($_POST['nome']) || !isset($_POST['descricao']) || !isset($_POST['preco']) || !isset($_POST['estoque'])) {
    die("Dados incompletos.");
}

require_once 'conexao.php';

if ($_POST['action'] == 'cadastrar') {
    require_once 'Produto.php';

    $produto = new Produto(
        $conexao,
        $_POST['nome'],
        $_POST['preco'],
        $_POST['estoque'],
        $_POST['descricao']
    );

    $produto->addProduto();
    header("Location: dashbord.php");
} elseif ($_POST['action'] == 'alterar') {
    require_once 'Produto.php';

    if (!isset($_POST['id'])) {
        die("ID do produto não fornecido.");
    }

    $produto = new Produto(
        $conexao,
        $_POST['nome'],
        $_POST['preco'],
        $_POST['estoque'],
        $_POST['descricao']
    );

    $produto->atualizarProduto($_POST['id']);
    header("Location: dashbord.php");
} else {
    die("Ação inválida.");
}
