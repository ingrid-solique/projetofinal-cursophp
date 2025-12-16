<?php

class Pedido {

    

    function __construct($conexao, ) {
        $this->conexao = $conexao;
    }

    public function getTotal() {
        return $this->total;
    }

    public function addPedido($idProduto, $idUsuario, $codPedido, $quantidade) {
        $stmt = $this->conexao->prepare("INSERT INTO pedidos (idProduto, quantidade, codPedido, idUsuario) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iisi", $idProduto, $quantidade, $codPedido, $idUsuario);
        if (!$stmt->execute()) {
            die("Erro ao adicionar pedido: " . $this->conexao->error);
        }
        $stmt->close();
    }

    public function verificaEstoque($idProduto, $quantidadeSolicitada) {
        $stmt = $this->conexao->prepare("SELECT quantidade, nome FROM produtos WHERE id = ?");
        $stmt->bind_param("i", $idProduto);
        $stmt->execute();
        $result = $stmt->get_result();
        $produto = $result->fetch_assoc();
        $stmt->close();

        if ($produto['quantidade'] < $quantidadeSolicitada) {
            echo "<script>
                    alert('Estoque insuficiente esse produto. Estoque disponivel: $produto[quantidade]');
                    window.location.href = '../index.php';
                  </script>";
            exit();
        } 
    }

    public function baixarEstoque($idProduto, $quantidadeVendida) {
        $stmt = $this->conexao->prepare("SELECT quantidade, nome FROM produtos WHERE id = ?");
        $stmt->bind_param("i", $idProduto);
        $stmt->execute();
        $result = $stmt->get_result();
        $produto = $result->fetch_assoc();
        $stmt->close();
        if ($produto['quantidade'] < $quantidadeVendida) {
            return false;
        }
        $stmt = $this->conexao->prepare("UPDATE produtos SET quantidade = quantidade - ? WHERE id = ?");
        $stmt->bind_param("ii", $quantidadeVendida, $idProduto);
        if (!$stmt->execute()) {
            die("Erro ao baixar estoque: " . $this->conexao->error);
        }
        $stmt->close();
        return true;
    }
}