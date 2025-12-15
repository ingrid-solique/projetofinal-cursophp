<?php
require_once 'verificaAutenticacao.php';

$id = $_SESSION['idUsuario'];

require_once 'conexao.php';

$stmt = $conexao->prepare("SELECT * FROM usuario WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Meu Perfil</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f3f4f6;
        }

        .profile-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
        }

        .profile-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            padding: 30px;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .profile-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .profile-header h2 {
            margin-bottom: 5px;
            color: #1f2937;
        }

        .profile-header .role {
            color: #6b7280;
            font-size: 14px;
        }

        .profile-info .info-group {
            margin-bottom: 15px;
        }

        .profile-info label {
            display: block;
            font-weight: bold;
            color: #374151;
            margin-bottom: 5px;
        }

        .profile-info p {
            color: #4b5563;
        }

        .profile-actions {
            text-align: center;
            margin-top: 20px;
        }

        .edit-btn{
            background: #2563eb;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
        }

        .edit-btn:hover {
            background: #1d4ed8;
        }
    </style>
</head>
<body>

<div class="profile-container">

    <!-- Card do perfil -->
    <div class="profile-card">

        <!-- Cabeçalho -->
        <div class="profile-header">
            <h2><?php echo $row['nome']; ?></h2>
        </div>

        <!-- Informações -->
        <div class="profile-info">
            <div class="info-group">
                <label>Nome Completo</label>
                <p><?php echo $row['nome']; ?></p>
            </div>
            <div class="info-group">
                <label>Email</label>
                <p><?php echo $row['email']; ?></p>
                </div>
            <div class="info-group">
                <label>Usuario</label>
                <p><?php echo $row['username']; ?></p>
            </div>
        </div>

        <!-- Ações -->
        <div class="profile-actions">
            <a class="edit-btn" href="meusPedidos.php">Meus Pedidos</a>
            <a class="edit-btn" href="../index.php">Home</a>
        </div>

    </div>

</div>

</body>
</html>
