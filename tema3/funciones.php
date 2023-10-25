<?php

    function edad($anio,$mes,$dia){
        $fecha1 = new DateTime($anio."-".$mes."-".$dia);
        $fecha2 = new DateTime();  
        $edad = ($fecha1->diff($fecha2))->y;
        return $edad;
    }

    function iva($precio,$iva=0.21){
        return $precio*$iva;
    }
    function añadirAlArray(&$array,$valor){
        $ultimo = count($array);
        $array[$ultimo]=$valor;
    }

    

?>