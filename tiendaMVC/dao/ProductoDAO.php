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

    public static function insert($producto)
    {
        $sql = "INSERT INTO productos (codigo, descripcion, precio, stock, url_imagen,categoria ) VALUES (?,?,?,?,?,?)";
        $parametros = array(
            $producto->codigo,
            $producto->descripcion,
            $producto->precio,
            $producto->stock,
            $producto->url_imagen,
            $producto->categoria
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
    public static function añadirStock($codigo, $sumaStock)
    {
        $sql = "UPDATE productos SET stock = stock + ? WHERE codigo = ?";
        $parametros = array(
            $sumaStock,
            $codigo
        );

        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0)
            return true;
        return false;
    }
    public static function update($producto)
    {
        $sql = "UPDATE productos SET descripcion = ?, precio = ? WHERE codigo = ?";
        $parametros = array(
            $producto->descripcion,
            $producto->precio,
            $producto->codigo
        );

        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0)
            return true;
        return false;
    }

    
}
