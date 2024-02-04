<?php

class CompraDAO
{
    public static function findAll()
    {
        $sql = "select * from compras";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);

        $arr_compras = array();

        while ($compraStd = $result->fetchObject()) {
            $compra = new Compra(
                $compraStd->id,
                $compraStd->comprador,
                $compraStd->fecha,
                $compraStd->cod_producto,
                $compraStd->cantidad,
                $compraStd->total,
                $compraStd->activo
            );

            array_push($arr_compras, $compra);
        }
        return $arr_compras;

    }

    public static function insert($idUsuario, $codProducto, $cantidad, $precio)
    {
        $sql = "INSERT INTO compras (comprador, fecha, cod_producto, cantidad, total, activo) VALUES (?,?,?,?,?,?)";
        $parametros = array(
            $idUsuario,
            date('Y-m-d'),
            $codProducto,
            $cantidad,
            $precio,
            "1"
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0) {
            return true;
        }
        return false;

    }


    public static function delete($id)
    {
        $sql = "update compras set activo = false where id = ?";
        $parametros = array($id);

        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0)
            return true;
        return false;

    }

}
