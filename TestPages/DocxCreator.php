<?php
require('../Libraries/fpdf181/fpdf.php');

session_start();

echo $_SESSION["nome"];

generateBody($formando, $entidade, $duracao, $orientador);

function generateBody($pdf, $formando = "---", $entidade = "---", $duracao = "250", $orientador = "---")
{

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    //TITLE
    $pdf->SetLeftMargin($pdf->GetPageWidth() / 2 - 40);
    $pdf->Text(($pdf->GetPageWidth() / 2) - 40, ($pdf->GetPageHeight() / 2) - 37, "Plano Individual de Estágio");

    //DIVIDER
    $pdf->Line(40, ($pdf->GetPageHeight() / 2) - 30, $pdf->GetPageWidth() - 40, $pdf->GetPageHeight() / 2  - 30);

    //VALUES-FORMANDO
    $pdf->SetFont('Arial', '', 16);
    // $pdf->SetLeftMargin($pdf->GetPageWidth() / 2);
    $pdf->Text(($pdf->GetPageWidth() / 2) - 37, ($pdf->GetPageHeight() / 2) - 20, "FORMANDO: $formando");
    $pdf->Text(($pdf->GetPageWidth() / 2) - 50, ($pdf->GetPageHeight() / 2) - 10, "ENTIDADE ENQUADRADORA: $entidade");
    $pdf->Text(($pdf->GetPageWidth() / 2) - 47, ($pdf->GetPageHeight() / 2), "Duração do Estágio: $duracao horas");
    $pdf->Text(($pdf->GetPageWidth() / 2) - 60, ($pdf->GetPageHeight() / 2) + 10, "Período de Estágio: Mês de Junho e Julho");
    $pdf->Line(50, ($pdf->GetPageHeight() / 2) + 15, $pdf->GetPageWidth() - 50, $pdf->GetPageHeight() / 2  + 15);
    $pdf->Text(($pdf->GetPageWidth() / 2) - 50, ($pdf->GetPageHeight() / 2) + 25, "PROFESSOR ACOMPANHANTE: $orientador");

    $pdf->Output();
}
?>