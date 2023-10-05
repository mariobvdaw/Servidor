<?php
    $anio1 = $_GET['anio1'];
    $mes1 = $_GET['mes1'];
    $dia1 = $_GET['dia1'];
    $anio2 = $_GET['anio2'];
    $mes2 = $_GET['mes2'];
    $dia2 = $_GET['dia2'];

    $nacimiento1 = date("Y-m-d", mktime(0, 0, 0, $mes1, $dia1, $anio1));
    $nacimiento2 = date("Y-m-d", mktime(0, 0, 0, $mes2, $dia2, $anio2));

    echo "Fecha primero: " . $nacimiento1;
    echo "<br>Fecha segundo: " . $nacimiento2;

    $fecha1 = new DateTime($nacimiento1);    
    $fecha2 = new DateTime($nacimiento2);


    $diferencia=$fecha2->diff($fecha1);

    
    echo "<pre>";
    print_r($diferencia);
    echo "</pre>";

    echo "<a href='http://" . $_SERVER['SERVER_ADDR'] . "./verCodigo.php?fichero=".$_SERVER['SCRIPT_FILENAME']."'>Ver codigo</a>";
   
  

?>