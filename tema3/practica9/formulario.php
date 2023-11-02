<?php
    include("./validaciones.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR09</title>
    <style>
        form{
            display: flex;
            flex-direction: column;
            border: 1px solid gray;
            padding: 10px;
            width: 50%;
        }
        form input{
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <?php
        if(enviado()){
            echo "enviado";
        }
        else{
    ?>
    <h1>Formulario - Expresiones regulares</h1>
    <form action="" method="get">
        <label for="nombre">Nombre
            <input type="text" name="nombre" id="nombre">
        </label>
        <label for="apellidos">Apellidos
            <input type="text" name="apellidos" id="apellidos">
        </label>
        <label for="contrasenia">Contraseña
            <input type="text" name="contrasenia" id="contrasenia">
        </label>
        <label for="contrasenia2">Repetir contraseña
            <input type="text" name="contrasenia2" id="contrasenia2">
        </label>
        <label for="fecha">Fecha
            <input type="text" name="fecha" id="fecha">
        </label>
        <label for="dni">DNI
            <input type="text" name="dni" id="dni">
        </label>
        <label for="correo">Correo
            <input type="text" name="correo" id="correo">
        </label>
        <input type="file" name="archivo" id="">
        <input type="submit" name ="enviar" value="enviar">
    </form>
    <?php
        }
    ?>
</body>
</html>