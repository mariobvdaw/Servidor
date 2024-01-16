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
                $usuarioStd->password,
                $usuarioStd->descUsuario,
                $usuarioStd->fechaUltimaConexion,
                $usuarioStd->perfil,
                $usuarioStd->activo
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
                $usuarioStd->password,
                $usuarioStd->descUsuario,
                $usuarioStd->fechaUltimaConexion,
                $usuarioStd->perfil,
                $usuarioStd->activo
            );
            return $usuario;
        }

    }

    public static function insert($usuario)
    {
        $sql = "insert into Usuario (codUsuario, password, descUsuario, fechaUltimaConexion, activo) values (?,?,?,?,?)";
        // PARA INSERTAR TODOS LOS ATRIBUTOS
        $parametros = array(
            $usuario->codUsuario,
            $usuario->password,
            $usuario->descUsuario,
            $usuario->fechaUltimaConexion,
            $usuario->activo
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        return true;

    }

    public static function update($usuario)
    {
        $sql = "update Usuario set descUsuario = ?, password = ?, fechaUltimaConexion = ?, activo = ? where codUsuario = ?";
        // PARA INSERTAR TODOS LOS ATRIBUTOS<
        $parametros = array(
            $usuario->descUsuario,
            $usuario->password,
            $usuario->fechaUltimaConexion,
            $usuario->activo,
            $usuario->codUsuario
        );

        $result = FactoryBD::realizaConsulta($sql, $parametros);
        return true;

    }
    public static function delete($usuario)
    {
        // $sql = "delete from Usuario where codUsuario = ?";
        $sql = "update Usuario set activo = false where codUsuario = ?";

        // PARA INSERTAR TODOS LOS ATRIBUTOS
        $parametros = array($usuario->codUsuario);

        $result = FactoryBD::realizaConsulta($sql, $parametros);
        return true;

    }
    public static function activar($usuario)
    {
        // $sql = "delete from Usuario where codUsuario = ?";
        $sql = "update Usuario set activo = true where codUsuario = ?";

        // PARA INSERTAR TODOS LOS ATRIBUTOS
        $parametros = array($usuario->codUsuario);

        $result = FactoryBD::realizaConsulta($sql, $parametros);
        return true;

    }

    public static function buscarPorNombre($nombre)
    {
        $sql = "select * from Usuario where descUsuario like ?";
        $nombre = '%' . $nombre . '%';
        $parametros = array($nombre);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 1) {

            $usuarioStd = $result->fetchObject();
            $usuario = new User(
                $usuarioStd->codUsuario,
                $usuarioStd->password,
                $usuarioStd->descUsuario,
                $usuarioStd->fechaUltimaConexion,
                $usuarioStd->perfil,
                $usuarioStd->activo
            );
            return $usuario;
        }

    }

    public static function validarUsuario($usuario, $pass)
    {
        $sql = "select * from Usuario where codUsuario = ? and password = ? and activo = true";
        $parametros = array($usuario, sha1($pass));
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $usuarioStd = $result->fetchObject();
            $usuario = new User(
                $usuarioStd->codUsuario,
                $usuarioStd->password,
                $usuarioStd->descUsuario,
                $usuarioStd->fechaUltimaConexion,
                $usuarioStd->perfil,
                $usuarioStd->activo
            );
            return $usuario;
        }
        return false;

    }



}

?>