<?php

if (isset($_REQUEST['Login_IniciarSesion'])) { // iniciar sesión
    $errores = array();
    if (validarFormulario($errores)) {
        $usuario = UserDAO::validarUsuario($_REQUEST['user'], $_REQUEST['pass']);
        if ($usuario != null) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['vista'] = VIEW . 'home.php';
            unset($_SESSION['controller']);
        } else {
            $errores['validado'] = "No existe el usuario y contraseña";
        }
    }
} else if (isset($_REQUEST['Login_Registro'])) { // registrar usuario
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
            $_SESSION['vista'] = VIEW . 'login.php';
            $sms = "Se ha registrado";

        } else {
            $errores['registro'] = "No se ha registrado";
        }

    }
}

