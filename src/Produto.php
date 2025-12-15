<?php

class Produto
{
    private $conexao;


    public function __construct($conexao, private $nome, private $preco, private $quantidade, private $descricao)
    {
        $this->conexao = $conexao;
    }

    public function addProduto()
    {
        $query = "INSERT INTO produtos (nome, preco, quantidade, descricao) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($query);
        $stmt->bind_param("sdis", $this->nome, $this->preco, $this->quantidade, $this->descricao);
        if ($stmt->execute()) {
            echo "<p>Produto adicionado com sucesso!</p>";
        } else {
            die("Erro ao adicionar produto: " . $this->conexao->error);
        }
        $stmt->close();
    }

    public function produtoById($id)
    {
        $stmt = $this->conexao->prepare("SELECT * FROM produtos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $produto = $result->fetch_assoc();
        $stmt->close();
        return $produto;
    }

    public function atualizarProduto($id)
    {
        $stmt = $this->conexao->prepare("UPDATE produtos SET nome = ?, preco = ?, quantidade = ?, descricao = ? WHERE id = ?");
        $stmt->bind_param("sdisi", $this->nome, $this->preco, $this->quantidade, $this->descricao, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function deletarProduto($id)
    {
        $stmt = $this->conexao->prepare("DELETE FROM produtos WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "<script>
                alert('Produto cadastrado com sucesso!');
                window.location.href = 'dashbord.php';
            </script>";
        } else {
            die("Erro ao deletar produto: " . $this->conexao->error);
        }
        $stmt->close();
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }
}
