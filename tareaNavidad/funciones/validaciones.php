<?php
function enviado()
{
    if (isset($_REQUEST['enviar'])) {
        return true;
    }
    return false;
}

function textoVacio($name)
{
    if (empty($name)) {
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


function validaFormulario(&$errores)
{
    $nombre = $_REQUEST['nombre'];
    $contrasenia = $_REQUEST['contrasenia'];
    $contrasenia2 = $_REQUEST['contrasenia2'];
    $correo = $_REQUEST['correo'];
    $fecha = $_REQUEST['fecha'];
    $patron_correo = "/^[A-Za-z0-9]{1,}@[A-Za-z0-9]{1,}[.][A-Za-z0-9]{2,}$/";
    $patron_fecha = "/^[0-9]{4}\/[0-9]{2}\/[0-9]{2}$/";

    $vacio = "Campo vacio";
    $incorrecto = "Formato incorrecto";
    if (textoVacio($nombre)) {
        $errores['nombre'] = $vacio;
    }elseif(findUser($nombre)){
        $errores['nombre'] = "Ese nombre ya esta en uso";
    }
    if (textoVacio($contrasenia)) {
        $errores['contrasenia'] = $vacio;
    } elseif (
        strlen($contrasenia) < 8 ||
        !preg_match("/[A-Z]/", $contrasenia) ||
        !preg_match("/[a-z]/", $contrasenia) ||
        !preg_match("/\d/", $contrasenia)
    ) {
        $errores["contrasenia"] = $incorrecto;
    }
    if (textoVacio($contrasenia2)) {
        $errores['contrasenia2'] = $vacio;
    } elseif (!textoVacio($contrasenia) && $contrasenia2 != $contrasenia) {
        $errores["contrasenia2"] = "Las contraseñas no coinciden";
    }
    if (textoVacio($fecha)) {
        $errores['fecha'] = $vacio;
    } elseif (!preg_match($patron_fecha, $fecha)) {
        $errores['fecha'] = $incorrecto;
    } 
    if (textoVacio($correo)) {
        $errores['correo'] = $vacio;
    } elseif (!preg_match($patron_correo, $correo)) {
        $errores["correo"] = $incorrecto;
    }

    if (count($errores) == 0) {
        return true;
    }
    return false;
}


function validaFormularioDatos(&$errores)
{
    $contrasenia = $_REQUEST['pass'];
    $correo = $_REQUEST['email'];
    $fecha = $_REQUEST['fecha_nacimiento'];
    $patron_correo = "/^[A-Za-z0-9]{1,}@[A-Za-z0-9]{1,}[.][A-Za-z0-9]{2,}$/";
    $patron_fecha = "/^[0-9]{4}\/[0-9]{2}\/[0-9]{2}$/";

    $vacio = "Campo vacio";
    $incorrecto = "Formato incorrecto";
    
    if (textoVacio($contrasenia)) {
        $errores['contrasenia'] = $vacio;
    } elseif (
        strlen($contrasenia) < 8 ||
        !preg_match("/[A-Z]/", $contrasenia) ||
        !preg_match("/[a-z]/", $contrasenia) ||
        !preg_match("/\d/", $contrasenia)
    ) {
        $errores["contrasenia"] = $incorrecto;
    }
    if (textoVacio($fecha)) {
        $errores['fecha'] = $vacio;
    } elseif (!preg_match($patron_fecha, $fecha)) {
        $errores['fecha'] = $incorrecto;
    } 
    if (textoVacio($correo)) {
        $errores['correo'] = $vacio;
    } elseif (!preg_match($patron_correo, $correo)) {
        $errores["correo"] = $incorrecto;
    }

    if (count($errores) == 0) {
        return true;
    }
    return false;
}
function errores($errores, $name)
{
    if (isset($errores[$name])) {
        echo "<span class='error'>" . $errores[$name] . "</span>";
    }
}



?>