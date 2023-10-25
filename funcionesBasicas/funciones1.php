<?php 
    function br(){
        echo "<br>";
    }
    function h1($cadena){
        echo "<h1>" . $cadena ."</h1>";
    }
    function p($cadena){
        echo "<p>" . $cadena ."</p>";
    }
    function self(){
        echo $_SERVER['PHP_SELF'];
    }
    function letraDni($DNI){
        $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
        $num = $DNI % 23;
        $letra = substr($letras, $num, 1);
        return $letra;
    }

?>