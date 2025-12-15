<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Obrigado pela sua compra</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f3f4f6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .thankyou-container {
            width: 100%;
            padding: 20px;
        }

        .thankyou-card {
            max-width: 500px;
            margin: auto;
            background: #fff;
            border-radius: 12px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 12px 30px rgba(0,0,0,0.08);
        }

        /* Ícone */
        .icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            background: #22c55e;
            color: #fff;
            border-radius: 50%;
            font-size: 40px;
            line-height: 70px;
        }

        /* Texto */
        .thankyou-card h1 {
            color: #111827;
            margin-bottom: 15px;
        }

        .message {
            color: #6b7280;
            font-size: 15px;
            margin-bottom: 25px;
        }

        /* Info do pedido */
        .order-info {
            background: #f9fafb;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 25px;
            text-align: left;
        }

        .order-info p {
            font-size: 14px;
            color: #374151;
            margin-bottom: 6px;
        }

        /* Botões */
        .actions {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 22px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .btn.primary {
            background: #2563eb;
            color: #fff;
        }

        .btn.primary:hover {
            background: #1e4fd6;
        }

        .btn.secondary {
            background: #e5e7eb;
            color: #111827;
        }

        .btn.secondary:hover {
            background: #d1d5db;
        }

        /* Responsivo */
        @media (max-width: 480px) {
            .thankyou-card {
                padding: 30px 20px;
            }

            .actions {
                flex-direction: column;
            }
        }

    </style>
</head>
<body>

<div class="thankyou-container">

    <div class="thankyou-card">

        <div class="icon">
            ?
        </div>

        <h1>Obrigado pela sua compra!</h1>

        <p class="message">
            Seu pedido foi realizado com sucesso.  
            Enviamos os detalhes para o seu e-mail.
        </p>

        <div class="order-info">
            <p><strong>Numero do pedido:</strong> <?php echo $_GET['codPedido']; ?></p>
        </div>

        <div class="actions">
            <a href="../index.php" class="btn secondary">Voltar para a loja</a>
        </div>

    </div>

</div>

</body>
</html>
