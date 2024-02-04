<?php

if (!validado()) {
    $_SESSION['vista'] = VIEW . 'login.php';
    $_SESSION['controller'] = CON . 'LoginController.php';
} else {
    if (isset($_REQUEST['User_editar'])) { // modificar usuario
        $_SESSION['vista'] = VIEW . 'editarUser.php';

    } else if (isset($_REQUEST['User_CambiaContraseña'])) { // cambiar contraseña
        $_SESSION['vista'] = VIEW . 'editarPassUser.php';

    } else if (isset($_REQUEST['User_Guardar'])) {
        $usuario = $_SESSION['usuario'];

        if (!textoVacio($_REQUEST['email']) && !textoVacio($_REQUEST['fecha'])) {
            $usuario->email = $_REQUEST['email'];
            $usuario->fechaNacimiento = $_REQUEST['fecha'];

            if (UserDAO::update($usuario)) {
                $sms = "Se ha cambiado el nombre correctamente";
                $_SESSION['usuario'] = $usuario;
                $_SESSION['vista'] = VIEW . 'verUsuario.php';

            } else {
                $errores['update'] = "No se ha podio modificar el usuario";
            }
        } else {
            $errores['nombre'] = "El campo no puede estar vacio";
        }
    } else if (isset($_REQUEST['User_GuardaContraseña'])) {
        $usuario = $_SESSION['usuario'];
        if (
            !textoVacio($_REQUEST['pass']) &&
            !textoVacio($_REQUEST['pass2']) &&
            passIgual($_REQUEST['pass'], $_REQUEST['pass2'])
        )
            $usuario->pass = $_REQUEST['pass'];
        if (UserDAO::cambioContraseña($usuario)) {
            $sms = "Se ha cambiado la contraseña";
            $_SESSION['usuario'] = $usuario;
            $_SESSION['vista'] = VIEW . 'verUsuario.php';
        }
    }
}

