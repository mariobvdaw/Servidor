<?php
    $datos = [2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3];
    foreach ($datos as $key => $value) {
        echo "<br>" . $key . ": " . $value;
    }
    echo "<br>";
    while (array_search("3", $datos)) {
        $posicion=array_search("3", $datos);
        $datos[$posicion]=$posicion;
        echo "<br> " . $posicion . " cambiado";
    }
    echo "<br>";
    foreach ($datos as $key => $value) {
        echo "<br>" . $key . " " . $value;
    }
?>