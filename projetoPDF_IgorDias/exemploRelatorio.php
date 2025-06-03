<?php

//Inicia o buffer de saída para capturar qualquer conteúdo
require_once 'fpdf186/fpdf.php';
// use Fpdf\Fpdf;

ob_start();

// Inclui o autoload do composer (caso use dependências já instaladas)


// cria uma nova instancia da classe FPDF
$pdf = new FPDF("P", "pt", "A4");

// Adiciona uma nova página ao documento pdf
$pdf->AddPage();

// Função auxiliar para converter texttos para ISO-8859-1 (evita problemas com acentos)
function textoPDF($txt){
    return iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $txt);
}

// Define a fonte: Arial, Negrito (B),tamanho 18
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(0,5, textoPDF("Relatório de Dados"), 0, 1, 'C');
$pdf->Cell(100,10, textoPDF("Feito Por Igor Dias"), 0, 1, '');
$pdf->Cell(0, 5, "", "B", 1, 'C'); // 1 -> Quebra de Linha | C->Alinhamento
$pdf->Ln(20);

$dados = [
    ['Item A', 'Descrição 1', 'Categoria X', 10.50],
    ['Item B', 'Descrição 2', 'Categoria Y', 25.75],
    ['Item C', 'Descrição 3', 'Categoria X', 5.99],
    ['Item D', 'Descrição 4', 'Categoria Z', 100.00],
    ['Item E', 'Descrição 5', 'Categoria Y', 12.30],
    ['Item F', 'Descrição 6', 'Categoria X', 8.20],
    ['Item G', 'Descrição 7', 'Categoria Z', 55.00]
];

$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(100, 20, textoPDF('Produto'), 1, 0, "L");
$pdf->Cell(180, 20, textoPDF('Detalhes'), 1, 0, "L");
$pdf->Cell(100, 20, textoPDF('Categoria'), 1, 0, "L");
$pdf->Cell(100, 20, textoPDF('Valor'), 1, 1, "R");

$pdf->SetFont('Arial', '', 10);
foreach($dados as $linha){
    $pdf->Cell(100, 20, textoPDF($linha[0]), 1, 0, "L");
    $pdf->Cell(180, 20, textoPDF($linha[1]), 1, 0, "L");
    $pdf->Cell(100, 20, textoPDF($linha[2]), 1, 0, "L");
    $pdf->Cell(100, 20, number_format($linha[3], 2, ',','.'), 1, 1, "R");
}

$pdf->Output("relatorio_produtos.pdf", "I");

?>