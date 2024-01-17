<?php
    include("./validaciones.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formularios</title>
</head>
<body>
    
    <?php
    $errores = array();
    if (enviado() && validaFormulario($errores)) {
        
        echo "<pre>";
        print_r($_REQUEST);
        echo "</pre>";


    }else {
    ?>
    <!-- ENVIAR DATOS DEL USUARIO / CLIENTE AL SERVIDOR
        action => donde se quieren enviar los datos
             si no se le da un fichero llama a la pagina actual
        method => como se envian los datos (GET: en la URL /POST: oculto en la cabecera)
        name => no es obligatorio para php (recomendable en JS)
        enctype => sirve para poder enviar ficheros
    -->
    <form action="" method="get" name="formulario1" enctype="multipart/form-data">

        <label for="nombre">Nombre:
            <input type="text" name="nombre" id="nombre" placeholder="nombre" value=<?php recuerda("nombre");?>>
            <p class="error">
                <?php errores($errores,"nombre");?>
            </p>
        </label>
        <br>
        <br>
        <label for="apellido">Apellido:
            <input type="text" name="apellido" id="apellido" placeholder="apellido" value=<?php recuerda("apellido"); ?>>
            <p class="error">
                <?php errores($errores,"apellido"); ?>
            </p>
        </label>
        <br>
        <br>
        <!-- radio: Si queremos que sea uno u otro tienen que tener el mismo nombre
                - se envia el value
        -->
        <label for="genero">Hombre:
            <input 
            <?php
                recuerdaRadio("genero", "hombre");
            ?>
            type="radio" name="genero" id="hombre" value="hombre">
        </label>
        <label for="genero">Mujer:
            <input 
            <?php
                recuerdaRadio("genero", "mujer");
            ?>
            type="radio" name="genero" id="mujer" value="mujer">
        </label>
        <p class="error">
            <?php
                errores($errores,"genero");
            ?>
        </p>
        <!-- checkbox: para enviar mas de una opcion hay que enviar un array (ejemplo: aficion[])
                - se envia el value (por defecto es on/off)
        -->

        <p>Aficciones (Al menos una):</p>
        <label for="ch1">Montar a caballo
            <input 
            <?php
                recuerdaCheck("aficion","jinete");
            ?>
            type="checkbox" name="aficion[]" id="ch1" value="jinete">
        </label>
        <label for="ch2">Jugar al futbol
            <input
            <?php recuerdaCheck("aficion","futbolista");?>
            type="checkbox" name="aficion[]" id="ch2" value="futbolista">
        </label>
        <label for="ch3">Nadar
            <input
            <?php recuerdaCheck("aficion","nadador");?>
            type="checkbox" name="aficion[]" id="ch3" value="nadador">
        </label>
        <br>
        <p class="error">
            <?php errores($errores,"aficion");?>
        </p>
        <br>
        <!-- fecha: 
                - formato: AAAA-mm-dd
        -->
        <label for="fecha_n">Fecha de nacimiento
            <input type="date" name="fecha_n" id="fecha_n" value=<?php recuerda("fecha_n");?>>
        </label>
        <p class="error">
            <?php errores($errores,"fecha_n");?>
        </p>
        <label for="fecha_a">Fecha actual
            <input type="datetime-local" name="fecha_a" id="fecha_a" value=<?php recuerda("fecha_a");?>>
        </label>
        <p class="error">
            <?php errores($errores,"fecha_a");?>
        </p>
        <!-- select: 
                - se envia el value
        -->
        <p>Equipos de Baloncesto:</p>
        <select name="equipo" id="">
            <option value="0">- seleccione una opcion -</option>
            <option <?php recuerdaSelect("equipo" , "lakers") ?> value="lakers">Lakers</option>
            <option <?php recuerdaSelect("equipo" , "celtics") ?> value="celtics">Celtics</option>
            <option <?php recuerdaSelect("equipo" , "bulls") ?> value="bulls">Bulls</option>
        </select>
        <br>
        <p class="error">
            <?php errores($errores,"equipo"); ?>
        </p>
        <br>
        <!-- ficheros: 
            - se almacenan temporalmente en $_FILES
        -->
        <input type="file" name="fichero" id="">
        <p class="error">
            <?php errores($errores,"fichero"); ?>
        </p>
        <!-- hidden:
            - el usuario no lo ve en el navegador
        -->
        <input type="hidden" name="usuarioVIP" value="123">
        <br>
        <br>
        <!-- submit:
                - name: se utiliza para verificar que se ha enviado usando el boton
        -->
        <input type="submit" value="Enviar" name="enviar">
        <input type="submit" value="Borrar" name="borrar">
    </form>
    <?php
        }
    ?>
</body>
</html>