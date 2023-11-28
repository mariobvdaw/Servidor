<?php

final class HeaderC extends FPDF
{
    function Header()
    {
        $this->SetFont("Times", "B", 20);
        $this->SetX(65); // Posicion 
        $this->SetTextColor(100,100,100);
        $this->Write(10, "DWES, Claudio Moyano");
        $this->Ln();
    }

    function Footer()
    {
        $this->SetFont("Times", "B", 15);
        // Lado derecho
        $this->SetY(-20);
        $this->SetX(-20);
        $this->SetTextColor(100,100,100);
        $this->Write(5, $this->PageNo());
        $this->Ln();
    }
}

?>