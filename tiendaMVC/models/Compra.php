<?php

class Compra
{
    private $id;
    private $comprador;
    private $fecha;
    private $cod_producto;
    private $cantidad;
    private $total;
    private $activo;

    function __construct($id, $comprador, $fecha, $cod_producto, $cantidad, $total, $activo=true)
    {
        $this->id = $id;
        $this->comprador = $comprador;
        $this->fecha = $fecha;
        $this->cod_producto = $cod_producto;
        $this->cantidad = $cantidad;
        $this->total = $total;
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

?>