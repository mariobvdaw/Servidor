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
        if (textoVacio($_REQUEST['nombre'])) {
            $errores['nombre'] = $vacio;
        }
        if (textoVacio($_REQUEST['apellidos'])) {
            $errores['apellidos'] = $vacio;
        }
        if (textoVacio($_REQUEST['contrasenia'])) {
            $errores['contrasenia'] = $vacio;
        }
        if (textoVacio($_REQUEST['contrasenia2'])) {
            $errores['contrasenia2'] = $vacio;
        }
        if (textoVacio($_REQUEST['fecha'])) {
            $errores['fecha'] = $vacio;
        }
        if (textoVacio($_REQUEST['dni'])) {
            $errores['dni'] = $vacio;
        }
        if (textoVacio($_REQUEST['correo'])) {
            $errores['correo'] = $vacio;
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