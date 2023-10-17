<?php
    include("./funciones.php");
    echo edad(2004,5,13);
    echo "<br>";
    echo iva(100,0.1);
    echo "<br>";
    echo iva(100);

    $contador = array();

    echo añadirAlArray($contador,1);
    print_r($contador);
?>