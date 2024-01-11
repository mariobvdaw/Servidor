<?php

class UserDAO
{
    public static function findAll()
    {
        $sql = "select * from Usuario";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);

        $arr_usuarios = array();

        while ($usuarioStd = $result->fetchObject()) {
            $usuario = new User(
                $usuarioStd->codUsuario,
                $usuarioStd->descUsuario,
                $usuarioStd->password,
                $usuarioStd->perfil,
                $usuarioStd->fechaUltimaConexion
            );

            array_push($arr_usuarios, $usuario);
        }
        return $arr_usuarios;

    }
    public static function findById($id)
    {
        $sql = "select * from Usuario where codUsuario = ?";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {

            $usuarioStd = $result->fetchObject();
            $usuario = new User(
                $usuarioStd->codUsuario,
                $usuarioStd->descUsuario,
                $usuarioStd->password,
                $usuarioStd->perfil,
                $usuarioStd->fechaUltimaConexion
            );
            return $usuario;
        }

    }

    public static function insert($usuario)
    {
        $sql = "insert into Usuario (codUsuario, password, descUsuario, fechaUltimaConexion) values (?,?,?,?)";
        // PARA INSERTAR TODOS LOS ATRIBUTOS
        $parametros = (array) $usuario;

        array_pop($parametros); // QUITAR PERFIL
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        return true;

    }

}

?>