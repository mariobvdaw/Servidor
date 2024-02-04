<?php

class Albaran
{
    private $id;
    private $fecha;
    private $cod_producto;
    private $cantidad;
    private $usuario;
    private $activo;

    function __construct($id, $fecha, $cod_producto, $cantidad, $usuario, $activo=true)
    {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->cod_producto = $cod_producto;
        $this->cantidad = $cantidad;
        $this->usuario = $usuario;
        $this->activo = $activo;
    }

    public function __get($att)
    {
        return $this->$att;
    }
    public function __set($att, $val)
    {
        if (property_exists(__CLASS__, $att)) {
            return $this->$att = $val;
        } else {
            echo 'No existe el atributo "' . $att . '"';
        }
    }
}
