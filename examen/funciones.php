<?php

function generarRadios()
{
    // GENERACIÓN RADIOS DINÁMICA
    $generos = ['accion', 'comedia', 'drama', 'terror', 'ciencia_ficcion', 'romance', 'animacion', 'documental', 'aventura'];

    for ($i = 0; $i < count($generos); $i++) {
        echo '<label for="genero">' . $generos[$i];
        echo '<input ';
        recuerdaRadio("genero", $generos[$i]);
        echo ' type="radio" name="genero" id="' . $generos[$i] . '" value="' . $generos[$i] . '" >';
        echo '</label>';

    }
}

function crearFichero($id, $titulo, $director, $lanzamiento, $genero, $actores, $duracion, $sinopsis)
{
    $xml = new SimpleXMLElement("<peliculas></peliculas>");
    $peliculas = $xml->addChild("pelicula");
    $peliculas->addAttribute("id", $id);
    $peliculas->addChild("titulo", $titulo);
    $peliculas->addChild("director", $director);
    $peliculas->addChild("lanzamiento", $lanzamiento);
    $peliculas->addChild("genero", $genero);
    $conjuntoActores = $peliculas->addChild("actores");
    foreach ($actores as $actor) {
        $conjuntoActores->addChild("actor", $actor);
    }
    $peliculas->addChild("duracion", $duracion);
    $peliculas->addChild("sinopsis", $sinopsis);


    $xml->asXML("peliculas.xml");
    chmod("peliculas.xml", 0777);
}

function insertarDatos($id, $titulo, $director, $lanzamiento, $genero, $actores, $duracion, $sinopsis)
{
    if (file_exists('peliculas.xml')) {
        $xml = simplexml_load_file('peliculas.xml');

        $peliculas = $xml->addChild("pelicula");
        $peliculas->addAttribute("id", $id);
        $peliculas->addChild("titulo", $titulo);
        $peliculas->addChild("director", $director);
        $peliculas->addChild("lanzamiento", $lanzamiento);
        $peliculas->addChild("genero", $genero);
        $conjuntoActores = $peliculas->addChild("actores");
        foreach ($actores as $actor) {
            $conjuntoActores->addChild("actor", $actor);
        }
        $peliculas->addChild("duracion", $duracion);
        $peliculas->addChild("sinopsis", $sinopsis);


        $xml->asXML("peliculas.xml");
        chmod("peliculas.xml", 0777);
    }
}


?>