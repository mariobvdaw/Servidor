<?php
    echo time();
    echo "<p>Zona del servidor: </p>";
    echo date_default_timezone_get();

    echo "<p>Zona del servidor cambiada: </p>";
    date_default_timezone_set("Europe/Madrid");    
    echo date_default_timezone_get();

    echo "<br>" . date("r");
    // date_default_timezone_set("UTC"); 
    // echo "<br>" . date("r");
    echo "<br>" . date("d/m/y H:i:s");

    echo "<p>String to fecha</p>";
    $cumple = strtotime("08/21/1998");
    echo $cumple;
    echo "<p>" . date("d/m/Y", $cumple) . "</p>";

    $hoy = strtotime("now");
    echo $hoy;
    // $hoy = strtotime("now + 60 day");
    echo "<p>" . date("d/m/Y", $hoy) . "</p>";

    $cumple = new DateTime('1998-08-21');
    $hoy = new DateTime();
    $intervalo = $cumple->diff($hoy);
    echo "<pre>";
    print_r($intervalo);
    echo "</pre>";

    echo "<pre>";
    print_r(getdate());
    echo "</pre>";

    echo date("M-d-Y", mktime(0, 0, 0, 12, 32, 1997));

?>