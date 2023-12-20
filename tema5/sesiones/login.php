<?php
session_start();

require('./funciones/validaciones.php');
require('./funciones/conexionBD.php');
if (enviado() && !textoVacio($_REQUEST['user']) && !textoVacio($_REQUEST['pass'])) {
    $usuario = validaUsuario($_REQUEST['user'], $_REQUEST['pass']);
    if ($usuario) {
        echo "Login correcto";
        $_SESSION['usuario'] = $usuario;
        header('Location: ./homeUser.php');
    } else {
        echo "No existe el usuario";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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
        <br><br>
        <label for="pass">Contraseña:
            <input type="password" name="pass" id="pass">
        </label>
        <br><br>
        <input type="submit" value="enviar" name="enviar">
    </form>

</body>

</html>