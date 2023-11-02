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



?>