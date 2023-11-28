<?php

function enviado()
{
    if (isset($_REQUEST['enviar'])) {
        return true;
    }
    return false;
}

function inputVacio($input)
{
    if (empty($input)) {
        return true;
    }
    return false;
}

function recuerda($name)
{
    if (enviado() && !empty($_REQUEST[$name])) {
        echo $_REQUEST[$name];
    }
}

function recuerdaRadio($name, $value){
    if (enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name]==$value) {
        echo "checked";
    } else if (isset($_REQUEST['borrar'])){
        echo '';
    }
}

// LECTURA DE ERRORES
function errores($errores, $name)
{
    if (isset($errores[$name])) {
        echo "<span class='error'>" . $errores[$name] . "</span>";
    }
}

function validarFormulario(&$errores)
{
    // ALMACENA TODO LO PASADO
    $id = $_REQUEST["id"];
    $titulo = $_REQUEST["titulo"];
    $director = $_REQUEST["director"];
    $lanzamiento = $_REQUEST["lanzamiento"];
    // if (isset($_REQUEST["genero"]))
    //     $genero = $_REQUEST["genero"];
    $actores = $_REQUEST["actores"];
    $duracion = $_REQUEST["duracion"];
    $sinopsis = $_REQUEST["sinopsis"];

    // PATRONES
    $pId = "/^\d{4}[A-Z]{2}-\d{3}$/";
    $pLanzamiento = "/\d{4}/";
    $pDuracion = "/\d{2}:\d{2}:\d{2}/";
    // $pActores = "/[A-Za-z][,]?/";

    // MENSAJES ERRORES GENERALES 
    $vacio = "No puede estar vacio";
    $patron = "No coincide el patron";

    // COMPROBACIONES
    if (inputVacio($id)) {
        $errores["id"] = $vacio;
    } elseif (!preg_match($pId, $id)) {
        $errores["id"] = $patron . " del id";
    }
    if (inputVacio($titulo)) {
        $errores["titulo"] = $vacio;
    }

    if (inputVacio($director)) {
        $errores["director"] = $vacio;
    }

    if (inputVacio($lanzamiento)) {
        $errores["lanzamiento"] = $vacio;
    } elseif (!preg_match($pLanzamiento, $lanzamiento)) {
        $errores["lanzamiento"] = $patron . " del Lanzamiento";
    }

    if (!isset($_REQUEST["genero"]))
    $errores["genero"] = "Debe seleccionar un genero";

    if (inputVacio($actores)) {
        $errores["actores"] = $vacio;
    }

    if (inputVacio($duracion)) {
        $errores["duracion"] = $vacio;
    } elseif (!preg_match($pDuracion, $duracion)) {
        $errores["duracion"] = $patron . " de la duracion";
    }

    if (inputVacio($sinopsis)) {
        $errores["sinopsis"] = $vacio;
    } elseif (strlen($sinopsis) < 49) {
        $errores["sinopsis"] = "No supera la longitud minima";
    }

    // COMPRUEBA QUE NO HAY ERRORES
    if (count($errores) == 0) {
        return true;
    }
    return false;
}
?>