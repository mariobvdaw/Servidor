<?php

if (isset($_REQUEST['Login_IniciarSesion'])) {
    $errores = array();
    if (validarFormulario($errores)) {

        // comprobar si el usuario existe en la base
        $usuario = UserDAO::validarUsuario($_REQUEST['user'], $_REQUEST['pass']);
        if ($usuario != null) {
            // iniciar sesion
            $_SESSION['usuario'] = $usuario;
            // llevar al home pero con modificaciones
            $_SESSION['vista'] = VIEW . 'home.php';
            // quitar el controller del login
            unset($_SESSION['controller']);
        } else {
            $errores['validado'] = "No existe el usuario y contraseña";
        }


    }
} else if (isset($_REQUEST['Login_Registro'])) {
    $_SESSION['vista'] = VIEW . 'registro.php';

} else if (isset($_REQUEST['Login_GuardaRegistro'])) {
    $errores = array();
    if (validarFormularioReg($errores)) {
        $usuario = new User(
            $_REQUEST['nombre'],
            $_REQUEST['contrasenia'],
            $_REQUEST['correo'],
            $_REQUEST['fecha'],
        );
        if (UserDAO::insert($usuario)) {
            // mandarlo a la vista
            $_SESSION['vista'] = VIEW . 'login.php';
            $sms = "Se ha registrado";

        } else {
            $errores['registro'] = "No se ha registrado";
        }

    }
}

