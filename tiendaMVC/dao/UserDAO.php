<?php

class UserDAO
{
    public static function findAll()
    {
        $sql = "select * from usuarios";
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
        $sql = "select * from usuarios where codUsuario = ?";
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
        // $sql = "insert into usuarios (user, pass, email, fecha_nacimiento, perfil, activo) values (?,?,?,?,?,?)";
        $sql = "insert into usuarios (user, pass, email, fecha_nacimiento, perfil) values (?,?,?,?,?))";
        // PARA INSERTAR TODOS LOS ATRIBUTOS
        $parametros = array(
            $usuario->user,
            $usuario->pass,
            $usuario->fechaNacimiento,
            $usuario->perfil
            // $usuario->activo
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        return true;

    }

    public static function update($usuario)
    {
        // $sql = "update usuarios set descUsuario = ?, password = ?, fechaUltimaConexion = ?, activo = ? where user = ?";
        $sql = "update usuarios set pass = ?, email = ?, fecha_nacimiento = ? where user = ?";
        // PARA INSERTAR TODOS LOS ATRIBUTOS<
        $parametros = array(
            $usuario->pass,
            $usuario->email,
            $usuario->fechaNacimiento,
            // $usuario->activo,
            $usuario->user
        );

        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0)
            return true;
        return false;

    }
    public static function delete($usuario)
    {
        // $sql = "delete from Usuario where codUsuario = ?";
        $sql = "update usuarios set activo = false where codUsuario = ?";

        // PARA INSERTAR TODOS LOS ATRIBUTOS
        $parametros = array($usuario->codUsuario);

        $result = FactoryBD::realizaConsulta($sql, $parametros);
        return true;

    }
    public static function activar($usuario)
    {
        // $sql = "delete from Usuario where codUsuario = ?";
        $sql = "update usuarios set activo = true where codUsuario = ?";

        // PARA INSERTAR TODOS LOS ATRIBUTOS
        $parametros = array($usuario->codUsuario);

        $result = FactoryBD::realizaConsulta($sql, $parametros);
        return true;

    }

    public static function buscarPorNombre($nombre)
    {
        $sql = "select * from usuarios where descUsuario like ?";
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
        // $sql = "select * from usuarios where user = ? and pass = ? and activo = true";
        $sql = "select * from usuarios where user = ? and pass = ?";
        $parametros = array($usuario, $pass);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $usuarioStd = $result->fetchObject();
            $usuario = new User(
                $usuarioStd->user,
                $usuarioStd->pass,
                $usuarioStd->email,
                $usuarioStd->fecha_nacimiento,
                $usuarioStd->perfil
                // $usuarioStd->activo
            );
            return $usuario;
        }
        return null;

    }



    public static function cambioContraseña($usuario)
    {
        $sql = "update usuarios set pass = ? where user = ?";
        // PARA INSERTAR TODOS LOS ATRIBUTOS
        $parametros = array(
            $usuario->pass,
            $usuario->user
        );

        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0)
            return true;
        return false;

    }


}

?>