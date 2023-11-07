<?php
    include("./validaciones.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>PR09</title>
    
</head>
<body>
    <?php
        $errores = array();
        if(enviado() && validaFormulario($errores)){
            $nombre = $_REQUEST['nombre'];
            $apellidos = $_REQUEST['apellidos'];
            $contrasenia = $_REQUEST['contrasenia'];
            $contrasenia2 = $_REQUEST['contrasenia2'];
            $fecha = $_REQUEST['fecha'];
            $dni = $_REQUEST['dni'];
            $correo = $_REQUEST['correo'];
    ?>
        <h1>Datos personales</h1>
    <div class="datos">
        <p><span>Nombre:</span> <?php echo $nombre?></p>
        <p><span>Apellidos:</span> <?php echo $apellidos?></p>
        <p><span>Contraseña:</span> <?php echo $contrasenia?></p>
        <p><span>Fecha:</span> <?php echo $fecha?></p>
        <p><span>DNI:</span> <?php echo $dni?></p>
        <p><span>Correo:</span> <?php echo $correo?></p>
    </div>
    <?php

        }
        else{
    ?>
    <h1>Formulario - Exp Reg</h1>
    <form action="" method="post">
        <label for="nombre">Nombre
            <input type="text" name="nombre" id="nombre" value="<?php recuerda("nombre")?>">
        </label>
        <?php errores($errores,"nombre");?>
        <label for="apellidos">Apellidos
            <input type="text" name="apellidos" id="apellidos" value="<?php recuerda("apellidos")?>">
        </label>
        <?php errores($errores,"apellidos");?>
        <label for="contrasenia">Contraseña
            <input type="password" name="contrasenia" id="contrasenia" value="<?php recuerda("contrasenia")?>">
        </label>
        <?php errores($errores,"contrasenia");?>
        <label for="contrasenia2">Repetir contraseña
            <input type="password" name="contrasenia2" id="contrasenia2" value="<?php recuerda("contrasenia2")?>">
        </label>
        <?php errores($errores,"contrasenia2");?>
        <label for="fecha">Fecha
            <input type="text" name="fecha" id="fecha" placeholder="20/01/2023"  value="<?php recuerda("fecha")?>">
        </label>
        <?php errores($errores,"fecha");?>
        <label for="dni">DNI
            <input type="text" name="dni" id="dni" placeholder="12345678A" value="<?php recuerda("dni")?>">
        </label>
        <?php errores($errores,"dni");?>
        <label for="correo">Correo
            <input type="text" name="correo" id="correo" placeholder="ejemplo@algo.algo" value="<?php recuerda("correo")?>">
        </label>
        <?php errores($errores,"correo");?>
        <input type="file" name="archivo" id="archivo">
        <input type="submit" name ="enviar" value="Enviar" id="enviar">
    </form>
    <?php
        }
    ?>
</body>
</html>