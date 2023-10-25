<?php
    include("./funciones.php");
    echo edad(2004,5,13);
    echo "<br>";
    echo iva(100,0.1);
    echo "<br>";
    echo iva(100);

    $contador = array();

    echo "<br>";
    echo añadirAlArray($contador,1);
    echo añadirAlArray($contador,7);
    echo añadirAlArray($contador,"catorce");
    print_r($contador);
?>