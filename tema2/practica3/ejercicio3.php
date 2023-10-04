<?php
    $anio = $_GET['anio'];
    $mes = $_GET['mes'];
    $dia = $_GET['dia'];

    $nacimiento = new DateTime('2023-10-03');
    echo "<pre>";
    print_r($nacimiento);
    echo "</pre>";




?>