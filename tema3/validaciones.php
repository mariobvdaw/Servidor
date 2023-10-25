<?php 
    function enviado(){
        if (isset($_REQUEST['enviar'])) {
            return true;
        }
        return false;

    }
    function textoVacio($name){
        if (empty($name)) {
            return true;
        }
        return false;
    }

    function errores($errores, $name){
        if (isset($errores[$name])) {
            echo $errores[$name];
        }
    }
    function noExiste($name){
        if (isset($_REQUEST[$name])) {
            return false;
        }
        return true;
    }

    function recuerda($name){
        if (enviado() && !empty($_REQUEST[$name])) {
            echo $_REQUEST[$name];
        } else if (isset($_REQUEST['borrar'])){
            echo '';
        }
    }
    
    function recuerdaRadio($name, $value){
        if (enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name]==$value) {
            echo "checked";
        } else if (isset($_REQUEST['borrar'])){
            echo '';
        }
    }
    function recuerdaCheck($name, $value){
        if (enviado() && isset($_REQUEST[$name]) && in_array($value, $_REQUEST[$name])) {
            echo "checked";
        } else if (isset($_REQUEST['borrar'])){
            echo '';
        }
    }
    function selectVacio($name){
        if ($_REQUEST[$name]==0) {
            return true;
        }
        return false;
    }

    function recuerdaSelect($name, $value){
        if (enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name]==$value) {
            echo "selected";
        } else if (isset($_REQUEST['borrar'])){
            echo '';
        }
    }

    function validaFormulario(&$errores){
        if (textoVacio($_REQUEST['nombre'])) {
            $errores['nombre']="Nombre vacio";
        }
        if (textoVacio($_REQUEST['apellido'])) {
            $errores['apellido']="Apellido vacio";
        }
        if (noExiste("genero")) {
            $errores['genero']="Genero sin seleccionar";
        }
        if (noExiste("aficion")) {
            $errores['aficion']="Aficion(es) sin seleccionar";
        }
        if (textoVacio($_REQUEST['fecha_n'])) {
            $errores['fecha_n']="Fecha 1 sin rellenar";
        }
        if (textoVacio($_REQUEST['fecha_a'])) {
            $errores['fecha_a']="Fecha 2 sin rellenar";
        }
        if (selectVacio("equipo")){
            $errores['equipo']="Equipo sin seleccionar";
        }
        if (textoVacio($_REQUEST["fichero"])){
            $errores['fichero']="Archivo sin subir";
        }
        if (count($errores)==0) {
            return true;
        }
        return false;
    }
?>