<?php
require_once 'verificaAutenticacao.php';
require_once 'conexao.php';

$sql = "SELECT * FROM produtos";
$stms = $conexao->prepare($sql);
$result = $conexao->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>

    <style>
        :root {
            --bg: #f3f4f6;
            --white: #ffffff;
            --primary: #2563eb;
            --danger: #dc2626;
            --warning: #d97706;
            --text: #1f2937;
            --muted: #6b7280;
            --radius: 8px;
            --shadow: 0 8px 20px rgba(0, 0, 0, 0.07);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: var(--bg);
            padding: 30px;
            display: flex;
            justify-content: center;
        }

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


        .container {
            width: 100%;
            max-width: 900px;
            background: var(--white);
            padding: 25px;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        h2 {
            margin-bottom: 20px;
            color: var(--text);
            font-size: 26px;
            text-align: center;
        }

        /* Barra superior com busca */
        .top-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .btn-add {
            padding: 10px 15px;
            background: var(--primary);
            border: none;
            color: #fff;
            font-size: 14px;
            border-radius: var(--radius);
            cursor: pointer;
            text-decoration: none;
        }

        .btn-add:hover {
            background: #1e40af;
        }

        /* Tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        thead {
            background: #e5e7eb;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            font-size: 15px;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            font-weight: bold;
            color: var(--text);
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .btn-edit,
        .btn-delete {
            padding: 6px 10px;
            border-radius: var(--radius);
            font-size: 13px;
            cursor: pointer;
            text-decoration: none;
            color: white;
        }

        .btn-edit {
            background: var(--warning);
        }

        .btn-delete {
            background: var(--danger);
        }

        .btn-edit:hover {
            background: #b45309;
        }

        .btn-delete:hover {
            background: #b91c1c;
        }

        .bottom-bar {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            flex-wrap: wrap;
            gap: 10px;
        }

        /* Responsividade */
        @media (max-width: 700px) {

            th:nth-child(3),
            td:nth-child(3),
            th:nth-child(4),
            td:nth-child(4) {
                display: none;
                /* Oculta colunas para caber na tela */
            }
        }

        @media (max-width: 480px) {
            .search-box input {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <header>
            <div class="logo">Minha Loja</div>

            <nav class="menu">
                <a href="logout.php">Sair</a>
                <a href="perfil.php" class="cart">Perfil</a>
            </nav>
        </header>
        
        <div class="top-bar">
            <a href="cadastrarProduto.php" class="btn-add">+ Cadastrar Produto</a>
            <a href="cadastrarUsuario.php" class="btn-add">+ Cadastrar Usuario</a>
        </div>

        <h2>Lista de Produtos</h2> 

        <table>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Descricao</th>
                    <th>Preco</th>
                    <th>Estoque</th>
                    <th>Acoes</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['nome'] . "</td>";
                        echo "<td>" . $row['descricao'] . "</td>";
                        echo "<td>" . number_format($row['preco'], 2, ',', '.') . "</td>";
                        echo "<td>" . $row['quantidade'] . "</td>";
                        echo "<td>
                        <a href='alterarProduto.php?id=" . $row['id'] . "'>Alterar</a> | 
                        <a href='deletarProduto.php?id=" . $row['id'] . "'>Deletar</a>
                      </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Nenhum produto encontrado.</td></tr>";
                }
                ?>
                </tr>
            </tbody>
        </table>

        <div class="bottom-bar">
            <a href="gerarRelatorio.php" class="btn-add">Gerar Relatorios de Produtos</a>
        </div>
    </div>

</body>

</html>