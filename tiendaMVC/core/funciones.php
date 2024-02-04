<?php
function crearBase()
{
    $DSN = "mysql:host=" . IP . ';dbname=mysql';
    try {
        $con = new PDO($DSN, USERINICIO, PASSINICIO);
        $script = file_get_contents("./script.sql");
        $con->exec($script);

    } catch (\Throwable $e) {
        switch ($e->getCode()) {
            default:
                echo $e->getMessage();
                echo $e->getCode();
        }
    } finally {
        unset($con);
    }
}
function enviado()
{
    if (
        isset($_REQUEST['enviar'])
        || isset($_REQUEST['añadir'])
        || isset($_REQUEST['Login_GuardaRegistro'])
        || isset($_REQUEST['Producto_GuardarProducto'])
    ) {
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
    } else if (!passIgual($_REQUEST['contrasenia'], $_REQUEST['contrasenia2'])) {
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
function validaFormProducto(&$errores)
{
    $codigo = $_REQUEST['codigoN'];
    $descripcion = $_REQUEST['descripcion'];
    $precio = $_REQUEST['precio'];
    $categoria = $_REQUEST['categoria'];
    $imagen = $_REQUEST['imagen'];
    $stock = $_REQUEST['stock'];
    $patron_numero = "/^[0-9]{1,}$/";
    $patron_numero_decimales = "/^[0-9]{1,}+(\.[0-9]{1,})?$/";
    $vacio = "Campo vacio";
    $incorrecto = "Formato incorrecto";

    if (textoVacio($codigo)) {
        $errores['codigo'] = $vacio;
    } elseif (!preg_match($patron_numero, $codigo)) {
        $errores['codigo'] = $incorrecto;
    } elseif (ProductoDAO::findById($codigo)) {
        $errores['codigo'] = "Ese codigo ya está en uso";
    }
    if (textoVacio($descripcion)) {
        $errores['descripcion'] = $vacio;
    }
    if (textoVacio($precio)) {
        $errores['precio'] = $vacio;
    } elseif (!preg_match($patron_numero_decimales, $precio)) {
        $errores['precio'] = $incorrecto;
    }
    if (textoVacio($categoria)) {
        $errores['categoria'] = $vacio;
    }
    if (textoVacio($imagen)) {
        $errores['imagen'] = $vacio;
    }
    if (textoVacio($stock)) {
        $errores['stock'] = $vacio;
    } elseif (!preg_match($patron_numero, $stock)) {
        $errores['stock'] = $incorrecto;
    }

    if (count($errores) == 0) {
        return true;
    }
    return false;
}
function validaFormProductoMod(&$errores)
{
    $descripcion = $_REQUEST['descripcion'];
    $precio = $_REQUEST['precio'];
    $patron_numero = "/^[0-9]{1,}+(\.[0-9]{1,})?$/";

    $vacio = "Campo vacio";
    $incorrecto = "Formato incorrecto";
    
   
    if (textoVacio($descripcion)) {
        $errores['descripcion'] = $vacio;
    }
    if (textoVacio($precio)) {
        $errores['precio'] = $vacio;
    }elseif(!preg_match($patron_numero, $precio)){
        $errores['precio'] = $incorrecto;
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

function isAdmin()
{
    if ($_SESSION['usuario']->perfil == "administrador" || $_SESSION['usuario']->perfil == "moderador")
        return true;
    return false;
}

function passIgual($p1, $p2)
{
    if ($p1 != $p2) {
        return false;
    }
    return true;
}


function recuerda($name)
{
    if (enviado() && !empty($_REQUEST[$name])) {
        echo $_REQUEST[$name];
    }
}
