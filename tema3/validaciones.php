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

    function recuerda($name){
        if (enviado() && !empty($_REQUEST[$name])) {
            echo $_REQUEST[$name];
        }
    }
?>