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
        $stmt->bind_param("iiii", $idProduto, $quantidade, $codPedido, $idUsuario);
        if (!$stmt->execute()) {
            die("Erro ao adicionar pedido: " . $this->conexao->error);
        }
        $stmt->close();
    }
}