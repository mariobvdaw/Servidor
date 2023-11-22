<?php

final class HeaderFactura extends FPDF
{
    function Header()
    {
        $this->Image("./logo.png", 20, 20, 45, 45);

        $this->SetTextColor(0,10,150);
        
        // DATOS FACTURA

        $this->SetFont("Helvetica", "", 10);
        $this->SetXY(120,20);
        $this->Write(10, "Numero de la factura: ");
        $this->SetXY(160,20);
        $this->Write(10, "1233-2213");

        
        $this->setLineWidth(1);
        $this->SetDrawColor(0,200,160);
        $this->Line(120,30,180,30);

        $this->SetXY(120,30);
        $this->Write(10, "Fecha factura :");
        
        $this->SetXY(160,30);
        $this->Write(10, "20/12/2000");

        // DATOS EMPRESA
        $this->SetXY(20,65);
        $this->Write(10, "Fulanito de ");
        $this->SetXY(20,69);
        $this->Write(10, "CIF/NIF: 12332123A ");
        $this->SetXY(20,73);
        $this->Write(10, utf8_decode("Calle Paraíso, n2"));
        $this->SetXY(20,77);
        $this->Write(10, "CP: 12321 Zamora");
        $this->SetXY(20,81);
        $this->Write(10, utf8_decode("Zamora, España"));

        
    }

 
}

?>