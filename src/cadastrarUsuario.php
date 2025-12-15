<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>

    <style>
        :root {
            --bg: #f3f4f6;
            --white: #ffffff;
            --primary: #4f46e5;
            --primary-hover: #4338ca;
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
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .card {
            width: 100%;
            max-width: 450px;
            background: var(--white);
            padding: 30px;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        h2 {
            margin-bottom: 10px;
            color: var(--text);
            font-size: 24px;
            text-align: center;
        }

        p {
            text-align: center;
            color: var(--muted);
            margin-bottom: 25px;
            font-size: 14px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: var(--text);
            font-weight: bold;
            font-size: 14px;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: var(--radius);
            margin-bottom: 15px;
            font-size: 15px;
            background: #fff;
            transition: border-color .2s ease, box-shadow .2s ease;
        }

        input:focus,
        select:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
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

        .alt {
            margin-top: 15px;
            text-align: center;
            font-size: 14px;
        }

        .alt a {
            text-decoration: none;
            color: var(--primary);
            font-weight: bold;
        }

        @media (max-width: 480px) {
            .card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="card">
        <h2>Cadastro de Usuário</h2>
        <p>Preencha os dados abaixo para criar sua conta</p>

        <form action="processaUsuario.php" method="POST">
            <label for="nome">Nome completo</label>
            <input type="text" id="nome" name="nome" placeholder="Seu nome" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Seu email" required>

            <label for="username">Usuário</label>
            <input type="text" id="username" name="username" placeholder="Digite seu usuário" required>

            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" placeholder="Digite uma senha" required>

            <button type="submit">Cadastrar</button>
        </form>

        <div class="alt">
            Já tem uma conta? <a href="login.php">Faça login</a>
        </div>
    </div>

</body>

</html>