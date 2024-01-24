<?php
// session_start();

// require('./funciones/validaciones.php');
// require('./funciones/conexionBD.php');
// $errores = array();
// // VALIDAR FORMULARIO Y USUSARIO
// if (enviado() && !textoVacio($_REQUEST['user']) && !textoVacio($_REQUEST['pass'])) {
//     $usuario = validaUsuario($_REQUEST['user'], $_REQUEST['pass']);
//     if ($usuario) {
//         $_SESSION['usuario'] = $usuario;
//         header('Location: ./home.php');
//         exit;
//     } else {
//         $errores['user'] = "No existe el usuario o contraseña";
//     }
// } elseif (enviado()) {
//     $errores["user"] = "Completa los campos";
// }

?>


<?php
if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
}
if (isset($sms)) {
    echo $sms;
}
?>
<h1>Login</h1>


<form action="" method="post">
    <label for="user">Nombre:
        <input type="text" name="user" id="user">
    </label>
    <?php
    if (isset($errores) && isset($errores['user'])) {
        echo '<span class="error">' . $errores["user"] . ' </span>';
    }
    ?>
    <label for="pass">Contraseña:
        <input type="password" name="pass" id="pass">
    </label>
    <?php
    if (isset($errores) && isset($errores['pass'])) {
        echo '<span class="error">' . $errores["pass"] . ' </span>';
    }
    if (isset($errores) && isset($errores['validado'])) {
        errores($errores, "validado");
    }
    ?>
    <input type="submit" value="Iniciar" name="Login_IniciarSesion" id="enviar">
    <a class="enlace-cuenta" href="./index.php?Login_Registro">¿No tienes cuenta?</a>
</form>