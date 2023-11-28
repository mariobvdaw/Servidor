<?php
include("./funcionesBusqueda.php");


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda de Películas</title>
</head>

<body>
    <h1>Búsqueda de Películas</h1>

    <form action="" method="get">
        <label for="busqueda">Buscar por título o actor:
            <input type="text" name="busqueda" id="busqueda">
        </label>
        <input type="submit" name="buscar" value="buscar">
    </form>


    <?php

    if (isset($_REQUEST["buscar"])) {
        echo "<h1>Resultados de Busqueda</h1>";
        $arrayTitulos = array();
        $arrayActores = array();
        $busqueda = $_REQUEST["busqueda"];
        $patron = "/$busqueda/";


        // FILTRA LOS TITULOS Y ACTORES VÁLIDOS
        leerTitulosActores($arrayTitulos, $arrayActores);

        // HASTA AQUÍ EL FINAL DEL EXAMEN
        
        // MOSTRAR BUSQUEDA CON LOS TITULOS
        foreach ($arrayTitulos as $titulo) {
            if (preg_match($patron, $titulo)) {
                leerDatosTitulo($titulo); 
                echo $titulo;
                echo "<br>";
            }
        }

        // MOSTRAR BUSQUEDA CON LOS ACTORES
        foreach ($arrayActores as $actores) {
            if (preg_match($patron, $actores)) {
                leerDatosActores($actores);
            }
        }
    }

    ?>


</body>

</html>