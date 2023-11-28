<?php

function leerTitulosActores(&$arrayTitulos, &$arrayActores)
{
    if (file_exists('peliculas.xml')) {
        $xml = simplexml_load_file('peliculas.xml');

        foreach ($xml as $elemento) {
            array_push($arrayTitulos, $elemento->titulo);
            array_push($arrayActores, $elemento->actores->actor);
        }
    } else {
        exit('Error abriendo el fichero');
    }
}

function leerDatosTitulo($titulo)
{
    if (file_exists('peliculas.xml')) {
        $xml = simplexml_load_file('peliculas.xml');

        foreach ($xml as $elemento) {
            if ($titulo == $elemento->titulo) {
                echo "<p><strong>Titulo</strong>: " . $elemento->titulo . "<p>";
                echo "<p><strong>Director</strong>: " . $elemento->director . "<p>";
                echo "<p><strong>Lanzamiento</strong>: " . $elemento->lanzamiento . "<p>";
                echo "<p><strong>Actores</strong>: ";
                foreach ($elemento->actores as $actores) {
                    foreach ($actores as $actor) {
                        echo $actor;
                    }
                }
                "</p>";
                echo "<br>";
            }
        }
    } else {
        exit('Error abriendo el fichero');
    }
}

function leerDatosActores($actores)
{
    if (file_exists('peliculas.xml')) {
        $xml = simplexml_load_file('peliculas.xml');

        foreach ($xml as $elemento) {
            if ($actores == $elemento->actores) {
                echo "<p><strong>Titulo</strong>: " . $elemento->titulo . "<p>";
                echo "<p><strong>Director</strong>: " . $elemento->director . "<p>";
                echo "<p><strong>Lanzamiento</strong>: " . $elemento->lanzamiento . "<p>";
                echo "<p><strong>Actores</strong>: ";
                foreach ($elemento->actores as $actores) {
                    foreach ($actores as $actor) {
                        echo $actor;
                    }
                }
                "</p>";
                echo "<br>";
            }
        }
    } else {
        exit('Error abriendo el fichero');
    }
}
?>