<?php

// USUARIO QUE HAYA HECHO LOGIN
// funcionara llamada a una funcion validado
if (!validado()) {
    $_SESSION['vista'] = VIEW . 'login.php';
    $_SESSION['controller'] = CON . 'LoginController.php';
} else {
    if (isset($_REQUEST['User_editar'])) {
        $_SESSION['vista'] = VIEW . 'editarUser.php';

    } else if (isset($_REQUEST['User_CambiaContraseña'])) {
        $_SESSION['vista'] = VIEW . 'editarPassUser.php';

    } else if (isset($_REQUEST['User_Guardar'])) {
        $usuario = $_SESSION['usuario'];

        if (!textoVacio($_REQUEST['nombre'])) {
            $usuario->descUsuario = $_REQUEST['nombre'];

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
            $usuario->password = sha1($_REQUEST['pass']);
        if (UserDAO::cambioContraseña($usuario)) {
            $sms = "Se ha cambiado la contraseña";
            $_SESSION['usuario'] = $usuario;
            $_SESSION['vista'] = VIEW . 'verUsuario.php';
        }
    }
}



?>