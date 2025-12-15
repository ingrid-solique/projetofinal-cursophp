<?php
require_once '../vendor/autoload.php';
require_once 'conexao.php';

$sql = "SELECT * FROM produtos";
$stms = $conexao->prepare($sql);
$result = $conexao->query($sql);

$html = "<h2>Lista de Produtos</h2> 

        <table border='1' width='100%' cellspacing='0' cellpadding='5'>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Descricao</th>
                    <th>Preco</th>
                    <th>Estoque</th>
                </tr>
            </thead>

            <tbody>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
            $html .= "<tr><td>" . $row['nome'] . "</td>";
            $html .= "<td>" . $row['descricao'] . "</td>";
            $html .= "<td>R$ " . number_format($row['preco'], 2, ',', '.') . "</td>";
            $html .= "<td>" . $row['quantidade'] . "</td>";
            $html .= "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>Nenhum produto encontrado.</td></tr>";
}
$html .= "</tr></tbody></table>";

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();