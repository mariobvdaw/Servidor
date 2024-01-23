<?php

class User
{
    private $user;
    private $pass;
    private $email;
    // private $numAccesos;
    private $fechaNacimiento;
    private $perfil;
    private $activo;

    function __construct($user, $pass, $email, $fechaNacimiento, $perfil = "usuario", $activo=true)
    {
        $this->user = $user;
        $this->pass = $pass;
        $this->email = $email;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->perfil = $perfil;
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