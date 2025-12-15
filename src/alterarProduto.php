<?php
// require_once 'verificaAutenticacao.php';

if (!isset($_GET['id'])) {
    die("ID do produto não fornecido.");
}
require_once 'conexao.php';

$stmt = $conexao->prepare("SELECT * FROM produtos WHERE id = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>

    <style>
        :root {
            --bg: #f3f4f6;
            --white: #ffffff;
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --text: #1f2937;
            --muted: #6b7280;
            --radius: 10px;
            --shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: var(--bg);
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding: 30px;
        }

        .container {
            width: 100%;
            max-width: 650px;
            background: var(--white);
            padding: 30px;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        h2 {
            margin-bottom: 5px;
            color: var(--text);
            font-size: 26px;
            text-align: center;
        }

        p {
            text-align: center;
            color: var(--muted);
            margin-bottom: 25px;
            font-size: 15px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: var(--text);
            font-weight: 600;
            font-size: 14px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: var(--radius);
            margin-bottom: 15px;
            font-size: 15px;
            background: #fff;
            transition: border-color .2s ease, box-shadow .2s ease;
        }

        textarea {
            min-height: 90px;
            resize: vertical;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        button {
            width: 100%;
            padding: 14px;
            background: var(--primary);
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: var(--radius);
            cursor: pointer;
            transition: background .2s ease;
        }

        button:hover {
            background: var(--primary-hover);
        }

        @media (max-width: 480px) {
            .grid {
                grid-template-columns: 1fr;
            }

            .container {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Alterar Produto</h2>
        <p>Preencha as informacoes abaixo para alterar o produto</p>

        <form action="processaProduto.php" method="POST">

            <label for="nome">Nome do Produto</label>
            <input type="text" id="nome" name="nome" value="<?php echo $row['nome']; ?>">

            <label for="descricao">Descricao</label>
            <textarea id="descricao" name="descricao"><?php echo $row['descricao']; ?></textarea>
            <div class="grid">
                <div>
                    <label for="preco">Preco (RS)</label>
                    <input type="number" step="0.01" id="preco" name="preco" value="<?php echo $row['preco']; ?>">
                </div>

                <div>
                    <label for="estoque">Quantidade em Estoque</label>
                    <input type="number" id="estoque" name="estoque" value="<?php echo $row['quantidade']; ?>">
                </div>
            </div>

            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="action" value="alterar">

            <button type="submit">Alterar Produto</button>
        </form>
    </div>

</body>

</html>