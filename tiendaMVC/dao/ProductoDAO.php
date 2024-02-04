<?php

class ProductoDAO
{
    public static function cargarProductosInicio()
    {
        $sql = "SELECT * FROM productos ORDER BY precio DESC LIMIT 5";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);

        $arr_producto = array();

        while ($productoStd = $result->fetchObject()) {
            $producto = new Producto(
                $productoStd->codigo,
                $productoStd->descripcion,
                $productoStd->precio,
                $productoStd->stock,
                $productoStd->url_imagen,
                $productoStd->categoria,
                $productoStd->activo
            );

            array_push($arr_producto, $producto);
        }
        return $arr_producto;
    }
    public static function findAll()
    {
        $sql = "SELECT * FROM productos";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);

        $arr_producto = array();

        while ($productoStd = $result->fetchObject()) {
            $producto = new Producto(
                $productoStd->codigo,
                $productoStd->descripcion,
                $productoStd->precio,
                $productoStd->stock,
                $productoStd->url_imagen,
                $productoStd->categoria,
                $productoStd->activo
            );

            array_push($arr_producto, $producto);
        }
        return $arr_producto;
    }

    public static function findByCategoria($categoria)
    {
        $sql = "SELECT * FROM productos WHERE categoria = ?";
        $parametros = array($categoria);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        $arr_producto = array();
        while ($productoStd = $result->fetchObject()) {
            $producto = new Producto(
                $productoStd->codigo,
                $productoStd->descripcion,
                $productoStd->precio,
                $productoStd->stock,
                $productoStd->url_imagen,
                $productoStd->categoria,
                $productoStd->activo
            );
            array_push($arr_producto, $producto);
        }
        return $arr_producto;
    }
    public static function findById($id)
    {
        $sql = "SELECT * FROM productos WHERE codigo = ?";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $productoStd = $result->fetchObject();
            $producto = new Producto(
                $productoStd->codigo,
                $productoStd->descripcion,
                $productoStd->precio,
                $productoStd->stock,
                $productoStd->url_imagen,
                $productoStd->categoria,
                $productoStd->activo
            );
            return $producto;
        }

    }

    public static function insert($cita)
    {
        $sql = "INSERT INTO Cita (especialista, motivo, fecha, paciente, activo) VALUES (?,?,?,?,?)";
        $parametros = array(
            $cita->especialista,
            $cita->motivo,
            $cita->fecha,
            $cita->paciente,
            $cita->activo
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0) {
            return true;
        }
        return false;

    }
    public static function comprarProducto($idUsuario, $codProducto, $cantidad, $precio)
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

    public static function restarStock($codigo, $restaStock)
    {
        $sql = "UPDATE productos SET stock = stock - ? WHERE codigo = ?";
        $parametros = array(
            $restaStock,
            $codigo
        );

        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0)
            return true;
        return false;
    }
    public static function update($cita)
    {
        $sql = "UPDATE Cita SET especialista = ?, motivo = ?, fecha = ?, paciente = ?, activo = ? WHERE id = ?";
        $parametros = array(
            $cita->especialista,
            $cita->motivo,
            $cita->fecha,
            $cita->activo,
            $cita->paciente,
            $cita->id
        );

        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0)
            return true;
        return false;
    }

    public static function delete($cita)
    {
        $sql = "UPDATE Cita SET activo = false WHERE id = ?";

        $parametros = array($cita->id);

        $result = FactoryBD::realizaConsulta($sql, $parametros);
        return true;
    }

    public static function activar($cita)
    {
        $sql = "UPDATE Cita SET activo = TRUE WHERE id = ?";

        $parametros = array($cita->id);

        $result = FactoryBD::realizaConsulta($sql, $parametros);
        return true;

    }
    public static function findByPaciente($paciente)
    {
        $sql = "SELECT * FROM Cita WHERE paciente = ? AND activo = 1 AND fecha > now() ORDER BY fecha";
        $parametros = array($paciente->codUsuario);
        $result = FactoryBD::realizaConsulta($sql, $parametros);

        $arr_citas = array();

        while ($citaStd = $result->fetchObject()) {
            $cita = new Cita(
                $citaStd->id,
                $citaStd->especialista,
                $citaStd->motivo,
                $citaStd->fecha,
                $citaStd->paciente,
                $citaStd->activo
            );

            array_push($arr_citas, $cita);
        }
        return $arr_citas;

    }
    public static function findByPacienteH($paciente)
    {
        $sql = "SELECT * FROM Cita WHERE paciente = ? AND activo = 1 AND fecha < now() ORDER BY fecha";
        $parametros = array($paciente->codUsuario);
        $result = FactoryBD::realizaConsulta($sql, $parametros);

        $arr_citas = array();

        while ($citaStd = $result->fetchObject()) {
            $cita = new Cita(
                $citaStd->id,
                $citaStd->especialista,
                $citaStd->motivo,
                $citaStd->fecha,
                $citaStd->paciente,
                $citaStd->activo
            );

            array_push($arr_citas, $cita);
        }
        return $arr_citas;

    }

    public static function findCategorias()
    {
        $sql = "SELECT DISTINCT categoria FROM productos";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);

        $arr_cat = array();

        while ($cat = $result->fetch()) {
            array_push($arr_cat, $cat[0]);
        }
        return $arr_cat;

    }
}
