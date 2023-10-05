<?php
    $filas = $_GET['filas'];
    $asteriscos = 1;
    $espacios = $filas - 1;
    for ($i=0; $i < $filas; $i++) { 
        for ($e=0; $e < $espacios; $e++) { 
            echo "&nbsp";
            echo "&nbsp";
        }
        for ($a=0; $a < $asteriscos; $a++) { 
            echo "*";
        }
        echo "<br>";
        $espacios--;
        $asteriscos+=2;
    }


?>
