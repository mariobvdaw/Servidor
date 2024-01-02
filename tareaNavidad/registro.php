<?php
include("./funciones/validaciones.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <title>Registro</title>
</head>

<body>
    <?php
    if (enviado() && validaFormulario($errores)) {

    }
    ?>

    <h1>Formulario Registro</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre
            <input type="text" name="nombre" id="nombre" placeholder="nombre... (3+)"
                value="<?php recuerda("nombre") ?>">
        </label>
        <?php errores($errores, "nombre"); ?>
        <label for="contrasenia">Contraseña
            <input type="password" name="contrasenia" id="contrasenia" placeholder="contraseña"
                value="<?php recuerda("contrasenia") ?>">
        </label>
        <?php errores($errores, "contrasenia"); ?>
        <label for="contrasenia2">Repetir contraseña
            <input type="password" name="contrasenia2" id="contrasenia2" placeholder="repetir contraseña"
                value="<?php recuerda("contrasenia2") ?>">
        </label>
        <?php errores($errores, "contrasenia2"); ?>
        
        <label for="correo">Correo
            <input type="text" name="correo" id="correo" placeholder="ejemplo@algo.algo"
                value="<?php recuerda("correo") ?>">
        </label>
        <?php errores($errores, "correo"); ?>
        <label for="fecha">Fecha
            <input type="text" name="fecha" id="fecha" placeholder="20/01/2023" value="<?php recuerda("fecha") ?>">
        </label>
        <?php errores($errores, "fecha"); ?>
        <input type="submit" name="enviar" value="Enviar" id="enviar">
    </form>
</body>

</html>