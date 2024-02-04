<?php

class AlbaranDAO
{
    public static function findAll()
    {
        $sql = "SELECT * FROM albaranes";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);

        $arr_albaranes = array();

        while ($albaranStd = $result->fetchObject()) {
            $albaran = new Albaran(
                $albaranStd->id,
                $albaranStd->fecha,
                $albaranStd->cod_producto,
                $albaranStd->cantidad,
                $albaranStd->usuario,
                $albaranStd->activo
            );

            array_push($arr_albaranes, $albaran);
        }
        return $arr_albaranes;
    }



    public static function insert($albaran)
    {
        $sql = "INSERT INTO albaranes (fecha, cod_producto, cantidad, usuario, activo) VALUES (?,?,?,?,?)";
        $parametros = array(
            $albaran->fecha,
            $albaran->cod_producto,
            $albaran->cantidad,
            $albaran->usuario,
            $albaran->activo
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0) {
            return true;
        }
        return false;

    }


    public static function delete($id)
    {
        $sql = "UPDATE albaranes SET activo = 0 WHERE id = ?";

        $parametros = array($id);

        $result = FactoryBD::realizaConsulta($sql, $parametros);
        return true;
    }
}