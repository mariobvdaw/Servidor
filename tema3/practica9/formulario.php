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
        body{
            margin: 0;
            display: flex;
            min-height: 100vh;
            width: 100%;
            flex-direction: column;
            align-items: center;
            background-image: linear-gradient(to bottom ,rgb(207, 207, 254), rgb(234, 234, 254));
            background-size: cover;
            background-repeat: no-repeat;

        }
        .error{
            color: red;
            text-align: right;
            padding-bottom: 20px;
        }
        h1{
            color: rgb(177, 177, 255);
            text-shadow: -3px 0 1px black, -6px 0 20px white;
            text-transform: uppercase;
            padding: 30px 0;
        }
        form{
            display: flex;
            flex-direction: column;
            background: transparent;
            backdrop-filter: blur(20px);
            filter: brightness(1.1);
            border: 1px solid white;
            border-radius: 4px;
            padding: 20px;
            width: 500px;
            max-width: 30%;
            min-width: 400px
        }
        form input{
            margin: 10px 0;
            outline: none;
        }
        label{
            display: flex;
            justify-content:space-between;
            align-items: center;
            padding: 5px 0px;
        }
    </style>
</head>
<body>
    <?php
        $errores = array();
        if(enviado() && validaFormulario($errores)){
            echo "enviado correctamente";
        }
        else{
    ?>
    <h1>Formulario - Expresiones regulares</h1>
    <form action="" method="get">
        <label for="nombre">Nombre
            <input type="text" name="nombre" id="nombre" value=<?php recuerda("nombre")?>>
        </label>
        <?php errores($errores,"nombre");?>
        <label for="apellidos">Apellidos
            <input type="text" name="apellidos" id="apellidos" value=<?php recuerda("apellidos")?>>
        </label>
        <?php errores($errores,"apellidos");?>
        <label for="contrasenia">Contraseña
            <input type="password" name="contrasenia" id="contrasenia" value=<?php recuerda("contrasenia")?>>
        </label>
        <?php errores($errores,"contrasenia");?>
        <label for="contrasenia2">Repetir contraseña
            <input type="password" name="contrasenia2" id="contrasenia2" value=<?php recuerda("contrasenia2")?>>
        </label>
        <?php errores($errores,"contrasenia2");?>
        <label for="fecha">Fecha
            <input type="text" name="fecha" id="fecha" value=<?php recuerda("fecha")?>>
        </label>
        <?php errores($errores,"fecha");?>
        <label for="dni">DNI
            <input type="text" name="dni" id="dni" value=<?php recuerda("dni")?>>
        </label>
        <?php errores($errores,"dni");?>
        <label for="correo">Correo
            <input type="text" name="correo" id="correo" value=<?php recuerda("correo")?>>
        </label>
        <?php errores($errores,"correo");?>
        <input type="file" name="archivo" id="">
        <input type="submit" name ="enviar" value="enviar">
    </form>
    <?php
        }
    ?>
</body>
</html>