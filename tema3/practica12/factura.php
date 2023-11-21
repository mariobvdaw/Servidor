<?php

require("../../fpdf186/fpdf.php");
require("./HeaderFactura.php");

$cliente = array(
    "VicVal SI",
    "CIF/NIF: B30142516",
    "C/Mala, n1",
    "18190 Granada",
    "Granada, Espania"
);
function cliente($cliente, $factura)
{
    $factura->SetXY(120, 45);
    $factura->SetFont("","B",14);
    $factura->SetTextColor(0,0,120);
    $factura->Write(10, "Cliente:");
    $factura->setLineWidth(2);
    $factura->SetDrawColor(0,240,235);
    $factura->Line(115,45,115,75);
    $factura->Line(190,45,190,75);
    $alto = 50;
    foreach ($cliente as $datos) {

        $factura->SetXY(120, $alto);
        $factura->SetFont("","",10);
        $factura->Write(10, $datos);
        $alto+=4;

    }
}


function tablaFactura($factura)
{
    $factura->setLineWidth(1);
    $factura->SetXY(20,100);
    $factura->SetFont("","B",12);
    $factura->SetTextColor(0,0,0);
    $factura->SetFillColor(0,200,160);
    $factura->Cell(30, 10, "Concepto", 0, 0, "L", true);

}

$factura = new HeaderC();



$factura->AddPage();
cliente($cliente, $factura);

tablaFactura($factura);



$factura->Output();




?>