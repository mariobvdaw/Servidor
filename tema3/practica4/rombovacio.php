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
            if ($a==0||$a==$asteriscos-1) {
                echo "*";
            }else {
                echo "&nbsp";
                echo "&nbsp";
            }
           
        }
        echo "<br>";
        $espacios--;
        $asteriscos+=2;

    }
    $asteriscos = $filas*2 -3;
    $espacios = 1;
    
    for ($in=0; $in < $filas ; $in++) { 
        for ($ei=0; $ei < $espacios ; $ei++) { 
            echo "&nbsp";
            echo "&nbsp";
        }
        for ($ai=0; $ai < $asteriscos; $ai++) { 
            if ($ai==0||$ai==$asteriscos-1) {
                echo "*";
            }else {
                echo "&nbsp";
                echo "&nbsp";
            }
        }
        
        echo "<br>";
        $asteriscos-=2;
        $espacios++;
    }
    


?>