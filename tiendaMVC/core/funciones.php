<?php
function enviado()
{
    if (isset($_REQUEST['enviar']) || isset($_REQUEST['añadir']) || isset($_REQUEST['Login_GuardaRegistro'])) {
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
    if (textoVacio($_REQUEST['nombre'])) {
        $errores['nombre'] = "Usuario vacio";
    }
    if (textoVacio($_REQUEST['contrasenia'])) {
        $errores['contrasenia'] = "Contraseña vacio";
    }
    if (textoVacio($_REQUEST['contrasenia2'])) {
        $errores['contrasenia2'] = "Password vacio";
    }else if(!passIgual($_REQUEST['contrasenia'],$_REQUEST['contrasenia2'])){
        $errores['contrasenia2'] = "Las contraseñas no coinciden";
    }
    if (textoVacio($_REQUEST['correo'])) {
        $errores['correo'] = "Email vacio";
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
    if ($p1 != $p2) {
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
