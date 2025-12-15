<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #4A90E2, #9013FE);
        }

        .login-container {
            background: #fff;
            width: 350px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
            animation: fadeIn .8s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            font-weight: bold;
            color: #444;
        }

        .input-field {
            margin-top: 8px;
            margin-bottom: 15px;
        }

        input {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            transition: .3s;
        }

        input:focus {
            border-color: #4A90E2;
            outline: none;
            box-shadow: 0 0 5px rgba(74, 144, 226, 0.4);
        }

        button {
            width: 100%;
            padding: 12px;
            background: #4A90E2;
            border: none;
            color: #fff;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: .3s;
        }

        button:hover {
            background: #367AC3;
        }

        .error-msg {
            text-align: center;
            color: #e63946;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .footer {
            margin-top: 10px;
            text-align: center;
            font-size: 14px;
            color: #555;
        }

        .footer a {
            color: #4A90E2;
            text-decoration: none;
            transition: .3s;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Entrar</h2>

        <!-- Mensagem de erro -->
        <?php if (isset($_SESSION['erro'])): ?>
            <p class="error-msg"><?= $_SESSION['erro']; ?></p>
        <?php unset($_SESSION['erro']);
        endif; ?>

        <form action="autentica.php" method="POST">

            <div class="input-field">
                <label>Username</label>
                <input type="text" name="username" required placeholder="Digite seu usuario">
            </div>

            <div class="input-field">
                <label>Senha</label>
                <input type="password" name="senha" required placeholder="Digite sua senha">
            </div>

            <button type="submit" name="entrar">Entrar</button>
        </form>

        <div class="footer">
            <p>Ainda nao tem conta? <a href="cadastrarUsuario.php">Cadastrar</a></p>
        </div>
    </div>

</body>

</html>