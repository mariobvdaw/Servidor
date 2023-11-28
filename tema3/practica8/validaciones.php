<?php
    $nombre = "/^[A-Za-z]{3,}$/";
    $apellidos = "/^[A-Za-z]{3,}\s[A-Za-z]{3,}$/";


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
    function alfalbetico($name){
        if(ctype_alpha($name)){
            return false;
        }
        return true;
    }
    function alfanumerico($name){
        if(ctype_alnum($name)){
            return false;
        }
        return true;
    }
    function numerico($name){
        if(is_numeric($name)){
            return false;
        }
        return true;
    }
    function recuerda($name){
        if (enviado() && !empty($_REQUEST[$name])) {
            echo $_REQUEST[$name];
        }
    }
    function numeroMinMax($numero){
        if($numero>0 && $numero<101){
            return false;
        }
        return true;
    }

    function menorEdad($fecha){
        $hoy = new DateTime();
        $intervalo = $fecha->diff($hoy);
        if ($intervalo['y']>=18) {
            return false;
        }
        return true;
    }
    function recuerdaRadio($name, $value){
        if (enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name]==$value) {
            echo "checked";
        } 
    }

    function selectValido($select){
        if ($select == 0){
            return true;
        }
        return false;
    }
    function recuerdaSelect($name, $value){
        if (enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name]==$value) {
            echo "selected";
        } 
    }
    function recuerdaCheck($name, $value){
        if (enviado() && isset($_REQUEST[$name]) && in_array($value, $_REQUEST[$name])) {
            return "checked";
        } 
    }
    function checkMinMax($check){
        if(enviado() && isset($check) && count($check)>=1 && count($check)<4){
            return true;
        }
        return false;
    }
    // function emailValido($email){
    //     return filter_var($email, FILTER_VALIDATE_EMAIL);
    // }

    function validaFormulario(&$errores){
        $vacio="Campo vacio";
        if (textoVacio($_REQUEST['alf1'])) {
            $errores['alf1'] = $vacio;
        } else{
            if (alfalbetico($_REQUEST['alf1'])){
                $errores['alf1'] = "Debe ser alfabetico";
            }
        }
        if (!textoVacio($_REQUEST['alf2']) && alfalbetico($_REQUEST['alf2'])){
            $errores['alf2'] = "Debe ser alfabetico";
        }
        if (textoVacio($_REQUEST['alfnum1'])) {
            $errores['alfnum1'] = $vacio;
        }else{
            if (alfanumerico($_REQUEST['alfnum1'])){
                $errores['alfnum1'] = "Debe ser alfanumerico";
            }
        }
        if (!textoVacio($_REQUEST['alfnum2']) && alfanumerico($_REQUEST['alfnum2'])){
            $errores['alfnum2'] = "Debe ser alfanumerico";
        }
        if (textoVacio($_REQUEST['num1'])) {
            $errores['num1'] = $vacio;
        } else{
            if (numerico($_REQUEST['num1'])) {
                $errores['num1'] = "Debe ser numerico";
            } else {
                if (numeroMinMax($_REQUEST['num1'])){
                    $errores['num1'] = "El numero debe estar entre 1 y 100";
                }
            }
        if (!textoVacio($_REQUEST['num2']) && numerico($_REQUEST['num2'])) {
            $errores['num2'] = "Debe ser numerico";
        }  
        }
        if (textoVacio($_REQUEST['fecha1'])) {
            $errores['fecha1']=$vacio;
        } else{
            // if (menorEdad($_REQUEST['fecha1'])){
            //     $errores['fecha1']="Es menor de edad";
            // }
        }
        if (selectValido($_REQUEST['combo'])) {
            $errores['combo'] = "Seleccina una opción";
        }
        if (!checkMinMax($_REQUEST['checks'])){
            $errores['checks'] = "Debes seleccionar entre 1 y 3 checks";
        }
        if (textoVacio($_REQUEST['correo'])) {
            $errores['correo']=$vacio;
        }
        if (textoVacio($_REQUEST['pass'])) {
            $errores['pass']=$vacio;
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