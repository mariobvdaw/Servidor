<?php
    include("./validaciones.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        .error{
            color: red;
        }
    </style>
    
    
</head>
<body>
    <?php
        $errores = array();
         if (enviado() && validaFormulario($errores)) {
            echo "bien";
        } else {
    ?>
    <h1>Formulario de registro</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="alfa1">Alfabetico
            <input type="text" name="alf1" id="alf1" placeholder="Nombre"
            value=<?php recuerda("alf1")?>>
            <?php errores($errores,"alf1");?>
        </label>
        <br><br>
        <label for="alfa2">Alfabetico opcional
            <input type="text" name="alf2" id="alf2" placeholder="Nombre"
            value=<?php recuerda("alf2")?>>
        </label>
        <br><br>
        <label for="alfnum1">Alfanumerico
            <input type="text" name="alfnum1" id="alfnum1" placeholder="Apellido"
            value=<?php recuerda("alfnum1")?>>
            <?php errores($errores,"alfnum1");?>
        </label>
        <br><br>
        <label for="alfnum2">Alfanumerico opcional
            <input type="text" name="alfnum2" id="alfnum2" placeholder="apellido"
            value=<?php recuerda("alfnum2")?>>
        </label>
        <br><br>
        <label for="num1">Numerico
            <input type="number" name="num1" id="num1" placeholder="12"
            value=<?php recuerda("num1")?>>
            <?php errores($errores,"num1");?>
        </label>
        <br><br>
        <label for="num2">Numerico opcional
            <input type="number" name="num2" id="num2" placeholder="32"
            value=<?php recuerda("num2")?>>
        </label>
        <br><br>
        <label for="fecha1">Fecha
            <input type="date" name="fecha1" id="fecha1"
            value=<?php recuerda("fecha1")?>>
            <?php errores($errores,"fecha1");?>
        </label>
        <br><br>
        <label for="fecha2">Fecha opcional
            <input type="date" name="fecha2" id="fecha2"
            value=<?php recuerda("fecha2")?>>
        </label>
        <br><br>
        <label for="opcion1">Opcion1
            <input type="radio" name="opcion" id="opcion1" value="opcion1">
        </label>
        <label for="opcion2">Opcion2
            <input type="radio" name="opcion" id="opcion2" value="opcion2">
        </label>
        <label for="opcion3">Opcion3
            <input type="radio" name="opcion" id="opcion3" value="opcion3">
        </label>
        <br><br>
        <label for="select">Select
            <select name="select" id="">
                <option value="0">- select1 -</option>
                <option value="opcion1">opcion1</option>
                <option value="opcion2">opcion2</option>
                <option value="opcion3">opcion3</option>
            </select>
        </label>
        <p>check</p>
        <?php
            for ($i=1; $i < 7; $i++) { 
                echo '<label for="ch' . $i . '">';
                echo '<input type="checkbox" name="checks[]" id="ch' . $i . '" value="ch' . $i .'">' . "check" . $i . '<br>';
                echo '</label>';
            }
        ?>
        <br><br>
        <label for="telefono">Telefono
            <input type="text" name="telefono" id="telefono" placeholder="123456789">
        </label>
        <br><br>
        <label for="correo">Email
            <input type="email" name="correo" id="correo" placeholder="prueba@prueba.com">
        </label>
        <br><br>
        <label for="pass">Contraseña
            <input type="password" name="pass" id="pass">
        </label>
        <br><br>
        <label for="archivo">Subir documento
            <input type="file" name="archivo" id="archivo">
        </label>
        <br><br>
        <input type="submit" name="enviar" value="Enviar">

    </form>
    <?php
        }
    ?>
</body>
</html>