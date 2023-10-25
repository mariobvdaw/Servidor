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
    function recuerda($name){
        if (enviado() && !empty($_REQUEST[$name])) {
            echo $_REQUEST[$name];
        }
    }
    function validaFormulario(&$errores){
        $vacio="Campo vacio";
        if (textoVacio($_REQUEST['alf1'])) {
            $errores['alf1']=$vacio;
        }
        if (textoVacio($_REQUEST['alfnum1'])) {
            $errores['alfnum1']=$vacio;
        }
        if (textoVacio($_REQUEST['num1'])) {
            $errores['num1']=$vacio;
        }
        if (textoVacio($_REQUEST['fecha1'])) {
            $errores['fecha1']=$vacio;
        }
        if (count($errores)==0) {
            return true;
        }
        return false;
    }
    function errores($errores, $name){
        if (isset($errores[$name])) {
            echo "<span class='error'>" . $errores[$name] . "</span>";
        }
    }

?>