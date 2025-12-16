<?php

session_start();
require_once __DIR__ . '/src/conexao.php';

$sql = "SELECT * FROM produtos";
$stms = $conexao->prepare($sql);
$result = $conexao->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolher Produtos</title>

    <style>
        :root {
            /* Cores principais */
            --bg: #f3f4f6;
            --white: #ffffff;
            --text: #1f2937;
            --muted: #6b7280;
            --primary: #2563eb;
            --primary-hover: #1d4ed8;

            /* Estilos gerais */
            --radius: 12px;
            --shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            --header-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* ---------------- HEADER ---------------- */
        header {
            width: 100%;
            background: var(--bg);
            box-shadow: var(--header-shadow);
            padding: 12px 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
            margin-bottom: 30px;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            color: var(--primary);
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .menu a {
            text-decoration: none;
            padding: 8px 12px;
            font-size: 15px;
            font-weight: bold;
            border-radius: 6px;
            color: var(--text);
            transition: background .2s ease;
        }

        .menu a:hover {
            background: #e5e7eb;
        }

        .btn-primary {
            background: var(--primary);
            color: #fff !important;
        }

        .btn-primary:hover {
            background: var(--primary-hover);
        }

        .cart {
            background: var(--primary);
            color: #fff;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 15px;
            font-weight: bold;
        }

        .cart:hover {
            background: var(--primary-hover);
        }

        /* ---------------- CORPO / GRID DE PRODUTOS ---------------- */
        body {
            background: var(--bg);
            padding: 30px;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            font-size: 28px;
            color: var(--text);
            margin-bottom: 25px;
        }

        /* GRID */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
        }

        /* CARD DO PRODUTO */
        .card {
            background: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 15px;
            display: flex;
            flex-direction: column;
            transition: transform .2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: var(--radius);
            margin-bottom: 15px;
        }

        .card h3 {
            font-size: 18px;
            color: var(--text);
            margin-bottom: 5px;
        }

        .card p {
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 10px;
        }

        .price {
            font-size: 18px;
            font-weight: bold;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .btn-cart {
            padding: 12px;
            width: 100%;
            background: var(--primary);
            color: #fff;
            font-size: 15px;
            font-weight: bold;
            border: none;
            border-radius: var(--radius);
            cursor: pointer;
            transition: background .2s ease;
        }

        .btn-cart:hover {
            background: var(--primary-hover);
        }

        .quantidade {
            width: 60px;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }
    </style>

</head>

<body>
    <header>
        <div class="logo">Minha Loja</div>

        <nav class="menu">
            <?php if (isset($_SESSION['logado']) && $_SESSION['logado']) : ?>
                <a href="src/logout.php">Sair</a>
                <a href="src/perfil.php">Perfil</a>
            <?php else: ?>
                <a href="src/login.php">Login</a>
                <a href="src/cadastrarUsuario.php">Cadastre-se</a>
            <?php endif; ?>
            <a href="src/contato.php">Contato</a>
            <a href="src/carrinho.php" class="cart">Carrinho</a>
        </nav>
    </header>
    <div class="container">

        <h2>Escolha seus produtos</h2>

        <div class="grid">
            <?php
            if ($result->num_rows > 0) :
                while ($row = $result->fetch_assoc()): ?>
                    <div class="card">
                        <h3><?php echo $row['nome']; ?></h3>
                        <p><?php echo $row['descricao']; ?></p>
                        <div class="price">RS <?php echo number_format($row['preco'], 2, ',', '.'); ?></div>

                        <form action="src/addCarrinho.php" method="GET">
                            <input type="number" class="quantidade" name="quantidade" value="1" min="1">
                            <input type="hidden" name="produto_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="btn-cart">Adicionar ao carrinho</button>
                        </form>
                    </div>
            <?php endwhile;
            endif; ?>
        </div>
    </div>

</body>

</html>