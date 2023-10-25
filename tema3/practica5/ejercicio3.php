<?php
    $tam = $_GET['tam'];

    $tabla = array(); 

    for ($i=0; $i < $tam; $i++) { 
        $tabla[$i]= array();

        for ($j=0; $j < $tam; $j++) { 
            if ($i==0 || $j==0) {
                $tabla[$i][$j]= 1 ;
            } else {
                $tabla[$i][$j]= $tabla[$i-1][$j] + $tabla[$i][$j-1];
            }            
        }
    }
    echo "<table border=1>";
    for ($i=0; $i < count($tabla); $i++) { 
        echo "<tr>";
        foreach ($tabla[$i] as $key => $value) {            
            echo "<td>";
            echo $value;
            echo "</td>";            
        }
        echo "</tr>";
    }
    echo "</table>";


?>

