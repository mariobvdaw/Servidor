<?php
function enviado()
{
    if (isset($_REQUEST['enviar']) || isset($_REQUEST['añadir']) || isset($_REQUEST['guardar'])) {
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

function errores($errores, $name)
{
    if (isset($errores[$name])) {
        echo $errores[$name];
    }
}

function validarFormulario(&$errores)
{
    if (textoVacio($_REQUEST['user'])) {
        $errores['user'] = "Nombre vacio";
    }
    if (textoVacio($_REQUEST['pass'])) {
        $errores['pass'] = "Password vacio";
    }

    if (count($errores) == 0) {
        return true;
    }
    return false;
}
function validarFormularioReg(&$errores)
{
    if (textoVacio($_REQUEST['user'])) {
        $errores['user'] = "Usuario vacio";
    }
    if (textoVacio($_REQUEST['pass'])) {
        $errores['pass'] = "Contraseña vacio";
    }
    if (textoVacio($_REQUEST['pass2'])) {
        $errores['pass2'] = "Password vacio";
    }
    // else if(passIgual($_REQUEST['pass'],$_REQUEST['pass2'])){
    //     $errores['pass2'] = "Las contraseñas no coinciden";
    // }
    if (textoVacio($_REQUEST['email'])) {
        $errores['email'] = "Email vacio";
    }
    if (textoVacio($_REQUEST['fecha'])) {
        $errores['fecha'] = "Fecha vacia";
    }

    if (count($errores) == 0) {
        return true;
    }
    return false;
}
function validaFormularioNuevaCita(&$errores)
{
    if (textoVacio($_REQUEST['especialista'])) {
        $errores['especialista'] = "Especialista vacio";
    }
    if (textoVacio($_REQUEST['fecha'])) {
        $errores['fecha'] = "Fecha vacio";
    }
    if (textoVacio($_REQUEST['motivo'])) {
        $errores['motivo'] = "Motivo vacio";
    }

    if (count($errores) == 0) {
        return true;
    }
    return false;
}
function validado()
{
    if (isset($_SESSION['usuario'])) {
        return true;
    }
    return false;
}


function passIgual($p1, $p2)
{
    if ($p1 !== $p2) {
        // $errores['igual'] = "Las contraseñas deben ser iguales";
        return false;
    }
    return true;
}

function isAdmin()
{
    if ($_SESSION['usuario']->perfil == "administrador")
        return true;
    return false;
}

function recuerda($name)
{
    if (enviado() && !empty($_REQUEST[$name])) {
        echo $_REQUEST[$name];
    }
}

?>