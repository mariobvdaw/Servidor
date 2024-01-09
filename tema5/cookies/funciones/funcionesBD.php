<?php

require("confBD.php");
function findAll()
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);

        $sql = "select * from producto";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $arrProductos = array();
        while ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($arrProductos, $producto);
        }
        return $arrProductos;

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

function findById($id)
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);

        $sql = "select * from producto where codigo = ?";
        $stmt = $con->prepare($sql);
        $producto = $stmt->execute([$id]);

        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($producto) {
            unset($con);
            return $producto;
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
function usuarioPermitido($url)
{
    if (in_array($url, $_SESSION['usuario']['paginas'])) {
        return true;
    }
    return false;
}
?>