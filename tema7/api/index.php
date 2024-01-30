<?php

require('./controlador/Base.php');
require('./controlador/InstitutoController.php');
// echo "Hola";
print_r(Base::condiciones());
echo "<pre>";
print_r($_SERVER);
if (isset($_SERVER['PATH_INFO'])) {
    // comprobar el recurso
    $recurso = Base::divideURI();
    // print_r($recurso);
    if ($recurso[1] === "institutos") {
        InstitutoController::institutos();
    } else {
        // Base::response("HTTP/1.0 404 Recurso no encontrado");

    }

    // BASE::response("HTTP/1.0 404 Not Found");
} else {
    Base::response("HTTP/1.0 400 Direccion incorrecta");


}


?>