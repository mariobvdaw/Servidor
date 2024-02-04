<?php

class Producto
{
    private $codigo;
    private $descripcion;
    private $precio;
    private $stock;
    private $url_imagen;
    private $categoria;
    private $activo;

    function __construct($codigo, $descripcion, $precio, $stock, $url_imagen, $categoria, $activo=true)
    {
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->url_imagen = $url_imagen;
        $this->categoria = $categoria;
        // $this->activo = $activo;
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