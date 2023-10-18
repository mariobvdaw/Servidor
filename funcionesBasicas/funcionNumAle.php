<?php
    function rellenarArray(&$array, $min, $max, $cantidad, $repetir=false){

        for ($i=0; $i < $cantidad; $i++) { 
            $numero = rand($max, $min);
            
            if ($repetir) {
                $array[$i]=$numero;
            } else {
                if (in_array($numero, $array)) {
                    $i--;
                } else{
                    $array[$i]=$numero;
                }
            }
            
            
        }
    }
?>