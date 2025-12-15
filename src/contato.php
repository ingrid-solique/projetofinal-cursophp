<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Contato</title>
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

        .contact-container {
            width: 100%;
            padding: 20px;
        }

        .contact-card {
            max-width: 900px;
            margin: auto;
            background: #fff;
            border-radius: 12px;
            display: flex;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        /* Informações */
        .contact-info {
            flex: 1;
            background: #2563eb;
            color: #fff;
            padding: 40px 30px;
        }

        .contact-info h2 {
            margin-bottom: 15px;
        }

        .contact-info p {
            font-size: 15px;
            margin-bottom: 20px;
            opacity: 0.95;
        }

        .contact-info ul {
            list-style: none;
        }

        .contact-info li {
            margin-bottom: 10px;
            font-size: 14px;
        }

        /* Form */
        .contact-form {
            flex: 1;
            padding: 40px 30px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            color: #374151;
            margin-bottom: 6px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            font-size: 14px;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #2563eb;
        }

        /* Botão */
        .btn-submit {
            width: 100%;
            background: #2563eb;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background: #1e4fd6;
        }

        /* Responsivo */
        @media (max-width: 768px) {
            .contact-card {
                flex-direction: column;
            }

            .contact-info,
            .contact-form {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>

<div class="contact-container">

    <div class="contact-card">

        <!-- Informações -->
        <div class="contact-info">
            <h2>Fale Conosco</h2>
            <p>
                Tem alguma duvida, sugestao ou precisa de ajuda?
                Preencha o formulario ou entre em contato pelos canais abaixo.
            </p>

            <ul>
                <li><strong>Email:</strong> contato@site.com</li>
                <li><strong>Telefone:</strong> (67) 99999-9999</li>
                <li><strong>Horário:</strong> Seg a Sex - 08h às 18h</li>
            </ul>
        </div>

        <!-- Formulário -->
        <div class="contact-form">
            <form action="#" method="post">

                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" placeholder="Seu nome" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" placeholder="Seu email" required>
                </div>

                <div class="form-group">
                    <label>Assunto</label>
                    <input type="text" placeholder="Assunto">
                </div>

                <div class="form-group">
                    <label>Mensagem</label>
                    <textarea placeholder="Digite sua mensagem" required></textarea>
                </div>

                <button type="submit" class="btn-submit">Enviar Mensagem</button>
                <button type="button" class="btn-submit" onclick="window.location.href='../index.php'">Voltar</button>

            </form>
        </div>

    </div>

</div>

</body>
</html>
