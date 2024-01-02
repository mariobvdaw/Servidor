<?php

require('./funciones/confBD.php');

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

        $sql = "select * from productos order by precio desc limit 3";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $productos = array();

        while ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($productos, $producto);
        }
        return $productos;


    } catch (\Throwable $th) {

        switch ($th->getCode()) {

            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }

}



?>