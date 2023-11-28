<?php

require("../../fpdf186/fpdf.php");
require("./HeaderFactura.php");

$cliente = array(
    "VicVal SI",
    "CIF/NIF: B30142516",
    "C/Mala, nº1",
    "18190 Granada",
    "Granada, España"
);

$datosFactura = array(
    array(
        "Servicio de soporte técnico",
        2,
        40,
        21
    ),
    array(
        "Reparación",
        1,
        35,
        21
    ),
    array(
        "Venta mouse CA-3245",
        1,
        10,
        21
    ),
    array(
        "Venta teclado supra CA-992",
        1,
        25,
        21
    ),
    array(
        "Venta pantalla i32",
        1,
        60,
        21
    ),
    array(
        "Venta teclado supra CA-992",
        1,
        20,
        21
    ),

);
function cliente($cliente, $factura)
{
    $factura->SetXY(120, 44);
    $factura->SetFont("", "B", 14);
    $factura->SetTextColor(0, 0, 120);
    $factura->Write(10, "Cliente:");
    $factura->setLineWidth(2);
    $factura->SetDrawColor(255,170,170);
    $factura->Line(115, 45, 115, 75);
    $factura->Line(190, 45, 190, 75);
    $alto = 50;
    foreach ($cliente as $datos) {

        $factura->SetXY(120, $alto);
        $factura->SetFont("", "", 10);
        $factura->Write(10, utf8_decode($datos));
        $alto += 4;

    }
}


function tablaFactura($datosFactura, $factura)
{
    // CABECERA
    $factura->setLineWidth(1);
    $factura->SetXY(20, 100);
    $factura->SetFont("", "B", 12);
    $factura->SetTextColor(0, 0, 0);
    $factura->SetFillColor(255,170,170);
    $factura->Cell(70, 8, "Concepto", 0, 0, "L", true);
    // $factura->Cell(70, 8, "Cantidad  Base  Imponible", 0, 0, "R", true);

    $factura->Cell(20, 8, "Cantidad", 0, 0, "R", true);
    $factura->Cell(20, 8, "Base", 0, 0, "C", true);
    $factura->Cell(30, 8, "Imponible", 0, 0, "C", true);
    $factura->Cell(30, 8, "I.V.A.", 0, 0, "R", true);
    $factura->Ln();

    $factura->SetFont("", "", 10);
    $factura->SetTextColor(0, 0, 120);
    $alto = 110;

    $sumaTotal = 0;
    $sumaIva = 0;

    $factura->setLineWidth(0);

    $euro = "€";
    // DATOS
    foreach ($datosFactura as $datos) {
        $factura->SetXY(20, $alto);

        $factura->Cell(70, 8, utf8_decode($datos[0]), 0, 0, "L", false); // CONCEPTO
        $factura->Cell(20, 8, utf8_decode($datos[1]), 0, 0, "C", false); // CANTIDAD
        $factura->Cell(20, 8, number_format($datos[2], 2). iconv('UTF-8', 'windows-1252', $euro), 0, 0, "C", false); // BASE
        $total = $datos[2] * $datos[1];
        $sumaTotal += $total;
        $factura->Cell(30, 8, number_format($total, 2) . iconv('UTF-8', 'windows-1252', $euro), 0, 0, "C", false); // TOTAL
        $iva = $total / 100 * $datos[3];
        $sumaIva += $iva;
        $factura->Cell(30, 8, utf8_decode($datos[3]) . "% (" . number_format($iva, 2) . iconv('UTF-8', 'windows-1252', $euro). ")", 0, 0, "R", false); // IVA

        $factura->Line(20, $alto + 8, 190, $alto + 8);

        $factura->Ln();
        $alto += 10;
    }

    // DATOS FINALES
    $factura->SetFont("", "", 12);
    $factura->Cell(150, 8, "Total Base Imponible:", 0, 0, "R", false);
    $factura->Cell(30, 8, number_format($sumaTotal-$sumaIva, 2) . iconv('UTF-8', 'windows-1252', $euro), 0, 0, "R", false);
    $factura->Ln();
    $factura->Cell(150, 8, "I.V.A. 21%:", 0, 0, "R", false);
    $factura->Cell(30, 8, number_format($sumaIva, 2) . iconv('UTF-8', 'windows-1252', $euro), 0, 0, "R", false);
    $factura->Ln();
    $factura->Ln();
    $factura->SetFont("", "B", 14);
    $factura->Cell(150, 8, "TOTAL:", 0, 0, "R", false);
    $factura->Cell(30, 8, number_format($sumaTotal, 2) . iconv('UTF-8', 'windows-1252', $euro), 0, 0, "R", false);

    $factura->setLineWidth(1);
    $factura->Line(20, $alto + 30, 190, $alto + 30);

    // $factura->SetXY(100, $alto);
    // $factura->Write(10, "Total Base Imponible:");
    // $factura->SetXY(170, $alto);
    // $factura->Write(10, number_format($sumaTotal,2));
    // $factura->SetXY(100, $alto+10);
    // $factura->Write(10, "I.V.A:");
    // $factura->SetXY(170, $alto+10);
    // $factura->Write(10, number_format($sumaIva,2));

    // $factura->SetFont("", "B", 14);
    // $factura->SetXY(100, $alto+25);
    // $factura->Write(10, "TOTAL:");
    // $factura->SetXY(170, $alto+25);
    // $factura->Write(10, $sumaTotal+$sumaIva);


}


$factura = new HeaderFactura();

$factura->AddPage();
cliente($cliente, $factura);

tablaFactura($datosFactura, $factura);



$factura->Output();




?>