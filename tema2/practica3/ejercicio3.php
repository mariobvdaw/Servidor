<?php
    $anio = $_GET['anio'];
    $mes = $_GET['mes'];
    $dia = $_GET['dia'];

    $nacimiento = date("Y-m-d", mktime(0, 0, 0, $mes, $dia, $anio));
    // $nacimiento = new DateTime($nacimiento);
    echo "<pre>";
    print_r($nacimiento);
    echo "</pre>";


    echo "<a href='http://" . $_SERVER['SERVER_ADDR'] . "./verCodigo.php?fichero=".$_SERVER['SCRIPT_FILENAME']."'>Ver codigo</a>";

?>