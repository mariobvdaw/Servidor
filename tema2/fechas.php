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

    echo "<p></p>";
?>