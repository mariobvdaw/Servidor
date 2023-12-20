<?php

require('./funciones/confBD.php');

function validaUsuario($user, $pass)
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);

        $sql = "select * from usuarios where usuario = ? and clave = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($user, sha1($pass)));
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario) {
            unset($con);
            return $usuario;
        }
        return false;


    } catch (\Throwable $th) {

        switch ($th->getCode()) {

            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }

}

function paginasPermitidas($user)
{
    $paginas = [];
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);

        $sql = "select paginas.url from usuarios, perfil, paginas, accede 
        where usuarios.perfil = perfil.codigo and perfil.codigo = accede.codigoPerfil 
        and accede.codigoPagina = paginas.codigo
        and usuario = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($user));
        while ($pagina = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($paginas, $pagina["url"]);
        }
        return $paginas;


    } catch (\Throwable $th) {

        switch ($th->getCode()) {

            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }
}


?>