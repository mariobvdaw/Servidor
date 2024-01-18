<?php

if (isset($_REQUEST['Login_IniciarSesion'])) {
    $errores = array();
    if (validarFormulario($errores)) {

        // comprobar si el usuario existe en la base
        $usuario = UserDAO::validarUsuario($_REQUEST['nombre'], $_REQUEST['pass']);
        if ($usuario != null) {
            // iniciar sesion
            $_SESSION['usuario'] = $usuario;
            // actualizar fecha de ultima conexion
            $usuario->fechaUltimaConexion = date("Y-m-d");
            UserDAO::update($usuario);
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
            $_REQUEST['cod'],
            sha1($_REQUEST['pass']),
            $_REQUEST['desc'],
            date('Y-m-d'),
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

?>