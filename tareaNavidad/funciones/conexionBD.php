<?php

require('./funciones/confBD.php');
function crearBase()
{
    $DSN = "mysql:host=" . IP . ';dbname=mysql';
    try {
        $con = new PDO($DSN, USERINICIO, PASSINICIO);
        $script = file_get_contents("./script.sql");
        $con->exec($script);

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            // ERRORES CONEXION
            default:
                echo "Error: " . $th->getMessage() . PHP_EOL;
                echo "Código: " . $th->getCode() . PHP_EOL;
                echo "Traza: " . $th->getTraceAsString() . PHP_EOL;
            // echo $th->getMessage();
            // echo $th->getCode();
        }
    } finally {
        unset($con);
    }
}


function validaUsuario($user, $pass)
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "select * from usuarios where user = ? and pass = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($user, $pass));
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario) {
            unset($con);
            return $usuario;
        }
        return false;


    } catch (\Throwable $th) {

        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;
            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }

}
function findUser($user)
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "select * from usuarios where user = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$user]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario) {
            unset($con);
            return $usuario;
        }
        return false;


    } catch (\Throwable $th) {

        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;

            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }

}


function registrarUsuario($nombre, $contrasenia, $correo, $fecha)
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "insert into usuarios (user, pass, email, fecha_nacimiento, perfil) values (?,?,?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->execute([$nombre, $contrasenia, $correo, $fecha, 'cliente']);

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;

            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }

}

function modificarUsuario($nombre, $contrasenia, $correo, $fecha)
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "update usuarios set pass = ?, email = ?, fecha_nacimiento = ? where user = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$contrasenia, $correo, $fecha, $nombre]);

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;

            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }

}

function cargarProductos()
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "select * from productos";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $productos = array();
        while ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($productos, $producto);
        }
        return $productos;

    } catch (\Throwable $th) {

        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;

            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }

}

function cargarProductosInicio()
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "select * from productos order by precio desc limit 4";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $productos = array();
        while ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($productos, $producto);
        }
        return $productos;

    } catch (\Throwable $th) {

        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;

            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }

}

function cargarProductosCategoria($categoria)
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "select * from productos where categoria=?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$categoria]);

        $productos = array();
        while ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($productos, $producto);
        }
        return $productos;

    } catch (\Throwable $th) {

        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;
            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }

}
function cargarCategorias()
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "select distinct categoria from productos";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $categorias = array();
        while ($cat = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($categorias, $cat['categoria']);
        }
        return $categorias;

    } catch (\Throwable $th) {

        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;

            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }

}



?>