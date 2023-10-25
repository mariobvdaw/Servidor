<?php
    include("./funciones1.php");
    include("./funcionNumAle.php");
    echo "prueba";
    br();
    echo "prueba";
    h1("Titulo");
    p("Parrafo");
    self();
    br();
    echo letraDni("71052293");
    br();
    $numeros = array();
    rellenarArray($numeros, 1, 4, 4, true);
    echo "<pre>";
    print_r($numeros);
    echo "</pre>";
?>