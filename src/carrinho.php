<?php

session_start();

if(!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

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

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Carrinho de Compras</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f5f6fa;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 20px;
        }

        h1 {
            margin-bottom: 30px;
            color: #333;
        }

        .cart {
            display: flex;
            gap: 30px;
        }

        /* Lista de produtos */
        .cart-items {
            flex: 2;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
            padding: 15px 0;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .item-info h3 {
            margin-bottom: 5px;
            color: #222;
        }

        .price {
            color: #777;
        }

        .item-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .item-actions input {
            width: 60px;
            padding: 6px;
            text-align: center;
        }

        .subtotal {
            font-weight: bold;
        }

        /* Resumo */
        .cart-summary {
            flex: 1;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            height: fit-content;
        }

        .cart-summary h2 {
            margin-bottom: 20px;
            color: #222;
        }

        .summary-line,
        .summary-total {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .summary-total {
            font-size: 18px;
            font-weight: bold;
            border-top: 1px solid #eee;
            padding-top: 12px;
        }

        .checkout-btn {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }
        .checkout-btn a{
            color: #fff;
            text-decoration: none;
        }

        .checkout-btn:hover {
            background: #1e4fd6;
        }

        .remove-btn {
            background: #fee2e2;
            border: none;
            color: #b91c1c;
            padding: 6px 10px;
            border-radius: 4px;
            font-size: 13px;
            cursor: pointer;
            text-decoration: none;
        }

        .remove-btn:hover {
            background: #fecaca;
        }

        /* Responsivo */
        @media (max-width: 768px) {
            .cart {
                flex-direction: column;
            }
        }

    </style>
</head>
<body>

<div class="container">
    <h1>Meu Carrinho</h1>

    <div class="cart">
        <!-- Lista de produtos -->
        <div class="cart-items">
            <?php 
            $total = 0;
            foreach($produtos_no_carrinho as $produto): ?>
            <div class="cart-item">
                <div class="item-info">
                    <h3><?php echo $produto['nome']; ?></h3>
                    <p class="price">RS <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
                    
                </div>

                <div class="item-actions">
                    <input type="number" name="quantidade" value="1" min="1">
                    <span class="subtotal">RS <?php echo number_format($produto['preco'], 2, ',', '.'); ?></span>
                    <a class="remove-btn" href='deletarProdutoCarrinho.php?id=<?php echo $produto['id']; ?>'>Remover</a>
                    <?php 
                        $total += $produto['preco'];?>
                </div>
            </div>
            <?php 
                endforeach; ?>
        </div>

        <!-- Resumo do pedido -->
        <div class="cart-summary">
            <h2>Resumo</h2>

            <div class="summary-line">
                <span>Subtotal</span>
                <span>RS <?php echo number_format($total, 2, ',', '.'); ?></span>
            </div>

            <div class="summary-line">
                <span>Frete</span>
                <span>Gratis</span>
            </div>

            <div class="summary-total">
                <span>Total</span>
                <span>RS <?php echo number_format($total, 2, ',', '.'); ?></span>
            </div>

            <button class="checkout-btn"><a href="../index.php">Continuar Comprando</a></button>
            <button class="checkout-btn"><a href="../src/pagamento.php">Finalizar Compra</a></button>
        </div>
    </div>
</div>

</body>
</html>
