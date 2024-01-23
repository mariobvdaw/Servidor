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
?>
<h1>Login</h1>


<form action="" method="post">
    <label for="user">Nombre:
        <input type="text" name="user" id="user">
    </label>
    <label for="pass">Contraseña:
        <input type="password" name="pass" id="pass">
    </label>
    <?php
    echo '<span class="error">' . $errores["user"] . ' </span>';
    ?>
    <input type="submit" value="Iniciar" name="enviar" id="enviar">
    <a class="enlace-cuenta" href="./registro.php">¿No tienes cuenta?</a>
</form>