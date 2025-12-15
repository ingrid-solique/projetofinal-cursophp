<?php

class Usuario
{

    public function __construct($conexao, private string $nome, private string $email, private string $username, private string $senha)
    {
        $this->conexao = $conexao;
    }

    public function addUsuario()
    {
        $senhaBanco = password_hash($this->senha, PASSWORD_DEFAULT);

        $query = "INSERT INTO usuario (nome, email, username, senha) VALUES (?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($query);
        $stmt->bind_param('ssss', $this->nome, $this->email, $this->username, $senhaBanco);

        if ($stmt->execute()) {
            echo "<p>Usuário adicionado com sucesso!</p>";
        } else {
            die("Erro ao adicionar usuário: " . $this->conexao->error);
        }

        $stmt->close();
    }

    public function autentica(string $username, string $senha)
    {
        $query = "SELECT * FROM usuario WHERE username = ?";
        $stmt = $this->conexao->prepare($query);
        $stmt->bind_param('s', $username);

        $resultado = $stmt->execute();

        if ($resultado) {
            $usuario = $stmt->get_result()->fetch_assoc();
            if (!($usuario && password_verify($senha, $usuario['senha']))) {
                die("Senha incorreta.");
            }
        }

        $stmt->close();

        session_start();
        $_SESSION['usuario'] = $usuario['nome'];
        $_SESSION['logado'] = true;
        $_SESSION['idUsuario'] = $usuario['id'];
        $_SESSION['emailUsuario'] = $usuario['email'];
    }
}
