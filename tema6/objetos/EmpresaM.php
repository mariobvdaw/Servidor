<?php

class EmpresaM
{
    public static $cont = 0;
    private $cif;
    private $nombre;
    private $localidad;

    static function saluda()
    {
        self::saluda1(); // llamar a metodo estatico desde la clase con self
        return "Hola, soy la clase Empresa";
    }
    static function saluda1()
    {
        echo "<p>Hola, soy la clase Empresa (saluda1)</p>";
    }
    function __construct($cif, $nombre, $localidad)
    {
        self::$cont++;
        $this->cif = $cif;
        $this->nombre = $nombre;
        $this->localidad = $localidad;
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

    public function __toString()
    {
        return $this->cif . " - " . $this->nombre . " - " . $this->localidad;
    }
}
?>