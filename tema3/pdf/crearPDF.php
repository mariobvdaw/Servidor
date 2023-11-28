<?php

require("../../fpdf186/fpdf.php");
require("./HeaderC.php");



$pdf = new HeaderC();

$pdf->AddPage();
// $pdf->Header();
$pdf->SetFont("Times", "B", 18);
$pdf->Write(5, "Hola mundo");
// $pdf->Write(5, $pdf->GetPageWidth()); // Ancho de la pagina


$pdf->AddPage();
$pdf->Image("./imagen.jpg", 55, 30, 100, 60);


$pdf->AddPage();
$pdf->Cell(30, 10, "Celda 1", 1, 0, "C", false);
$pdf->Cell(30, 10, "Celda 2", 1, 2, "C", false);
$pdf->Cell(30, 10, "Celda 3", 1, 1, "C", false);
$pdf->Cell(30, 10, "Celda 4", 1, 0, "C", false);

$array = array(
    array("pc1", "lenovo", "1TB", "8GBRAM"),
    array("pc2", "dell", "2TB", "16GBRAM"),
    array("pc3", "hp", "1TB", "4GBRAM"),
    array("pc4", "lenovo", "4TB", "4GBRAM"),
);

$pdf->AddPage();
creaTabla($array,$pdf);

$pdf->Output();

function creaTabla($array, $pdf)
{
    $pdf->SetFillColor(0,0,255);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFont("Times", "B", 16);

    $pdf->Cell(40, 10, "PC", 1, 0, "C", true);
    $pdf->Cell(40, 10, "Marca", 1, 0, "C", true);
    $pdf->Cell(40, 10, "Disco Duro", 1, 0, "C", true);
    $pdf->Cell(40, 10, "RAM", 1, 0, "C", true);
    $pdf->Ln();

    $pdf->SetFillColor(100,230,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont("Times", "", 16);


    foreach ($array as $pc) {
        foreach ($pc as $dato) {
            $pdf->Cell(40, 10, $dato , 1, 0, "C", true);
            
        }
        $pdf->Ln();
    }
}

?>