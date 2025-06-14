<?php

require_once 'config.php';

require 'fpdf186/fpdf.php';

if(!isset($_SESSION['usuario_id'])){
    header('Location: login.php');
    exit;
}
class PDF extends FPDF {
    function Header()
    {
        $this->SetFont('Arial','B', 15);
        $this->Cell(0, 10, iconv('UTF-8','ISO-8859-1','Relatório de Produtos'), 0, 1, 'C');
        $this->Ln(10);

    }
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I', 8);
        $this->Cell(0, 10, 'Página'. $this->PageNo(), 0, 0, 'C');
    }
}

$pdo = conectarBanco();
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','', 12);

// Cabeçalho
$pdf->SetFillColor(200, 220, 255);
$pdf->Cell(10, 10, 'ID', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Nome', 1, 0, 'C', true);
$pdf->Cell(80, 10, iconv('UTF-8','ISO-8859-1','Descrição'), 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Estoque', 1, 0, 'C', true);
$pdf->Cell(30, 10, iconv('UTF-8','ISO-8859-1','Valor Unitário'), 1, 1, 'C', true);

$stmt = $pdo->query("SELECT * FROM produto");
$fill = false;
while($produto = $stmt->fetch(PDO::FETCH_ASSOC)){
    $descricao = mb_strimwidth($produto['descricao'],0 ,40, '...');
    $pdf->SetFillColor(200, 220, 255);
    $pdf->Cell(10, 10, $produto['id_produto'], 1, 0, 'C', $fill);
    $pdf->Cell(50, 10, $produto['nome_prod'], 1, 0, 'L', $fill);
    $pdf->Cell(80, 10,$descricao, 1, 0, 'C', $fill);
    $pdf->Cell(20, 10, $produto['qtde'], 1, 0, 'C', $fill);
    $pdf->Cell(30, 10, 'R$'.number_format($produto['valor_unit'], 2, ',', '.'), 1, 1, 'C', $fill);
    $fill = !$fill; //Alterna a cor
}

$pdf->Output('realtorio_produtos.pdf', 'I');
?>