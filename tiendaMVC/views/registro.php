
<?php
// $errores = array();
// // VALIDAR FORMULARIO Y AÑADIR USUARIO
// if (enviado() && validaFormularioRegistro($errores)) {
//     registrarUsuario($_REQUEST['nombre'], $_REQUEST['contrasenia'], $_REQUEST['correo'], $_REQUEST['fecha'], );
//     echo "Usuario creado, redirigiendo al login...";
//     header("refresh:3;url=./login.php");
//     exit;
// }

?>

<h1>Formulario Registro</h1>
<form action="" method="post" enctype="multipart/form-data">
    <label for="nombre">Nombre
        <input type="text" name="nombre" id="nombre" placeholder="unico" value="<?php recuerda("nombre") ?>">
    </label>
    <?php
    if (isset($errores)) {
        errores($errores, "nombre");
    } 
    ?>
    <label for="contrasenia">Contraseña
        <input type="password" name="contrasenia" id="contrasenia" placeholder="contraseña"
            value="<?php recuerda("contrasenia") ?>">
    </label>
    <?php
    if (isset($errores)) {
        errores($errores, "contrasenia");
    } 
    ?>
    <label for="contrasenia2">Repetir contraseña
        <input type="password" name="contrasenia2" id="contrasenia2" placeholder="repetir contraseña"
            value="<?php recuerda("contrasenia2") ?>">
    </label>
    <?php
    if (isset($errores)) {
        errores($errores, "contrasenia2");
    } 
    ?>

    <label for="correo">Correo
        <input type="text" name="correo" id="correo" placeholder="ejemplo@algo.algo"
            value="<?php recuerda("correo") ?>">
    </label>
    <?php
    if (isset($errores)) {
        errores($errores, "correo");
    } 
    ?>
    <label for="fecha">Fecha
        <input type="text" name="fecha" id="fecha" placeholder="2024/01/15" value="<?php recuerda("fecha") ?>">
    </label>
    <?php
    if (isset($errores)) {
        errores($errores, "fecha");
    } 
    ?>
    <input type="submit" name="enviar" value="Enviar" id="enviar">
    <a class="enlace-cuenta" href="./index.php?login">¿Ya tienes cuenta?</a>

</form>