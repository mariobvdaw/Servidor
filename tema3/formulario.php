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
    if (enviado()) {
        if (textoVacio($_REQUEST['nombre'])) {
            $errores['nombre']="Nombre vacio";
        }
        if (textoVacio($_REQUEST['apellido'])) {
            $errores['apellido']="Apellido vacio";

        }
    }

    ?>
    
    <form action="" method="post" name="formulario1" enctype="multipart/form-data">

        <label for="nombre">Nombre:
            <input type="text" name="nombre" id="nombre" placeholder="nombre" value=<?php
            recuerda("nombre");
            ?>
            >
            <p class="error">
                <?php
                    errores($errores,"nombre");
                ?>

            </p>
        </label>
        <br>
        <br>
        <label for="apellido">Apellido:
            <input type="text" name="apellido" id="apellido" placeholder="apellido" value=<?php
            recuerda("apellido");
            ?>
            >
            <p class="error">
                <?php
                    errores($errores,"apellido");
                ?>

            </p>
        </label>
        <br>
        <br>
        <label for="genero">Hombre:
            <input type="radio" name="genero" id="hombre" value="hombre">
        </label>
        <label for="genero">Mujer:
            <input type="radio" name="genero" id="mujer" value="mujer">
        </label>
        <p>Aficciones:</p>
        <label for="ch1">Montar a caballo
            <input type="checkbox" name="aficion[]" id="ch1" value="jinete">
        </label>
        <label for="ch2">Jugar al futbol
            <input type="checkbox" name="aficion[]" id="ch2" value="futbolista">
        </label>
        <label for="ch3">Nadar
            <input type="checkbox" name="aficion[]" id="ch3" value="nadador">
        </label>
        <br>
        <br>
        <label for="fecha_n">Fecha de nacimiento
            <input type="date" name="fecha_n" id="fecha_n">
        </label>
        <label for="fecha_a">Fecha actual
            <input type="datetime-local" name="fecha_a" id="fecha_a">
        </label>
        <p>Equipos de Baloncesto:</p>
        <select name="equipo" id="">
            <option value="0">- seleccione una opcion -</option>
            <option value="lakers">Lakers</option>
            <option value="celtics">Celtics</option>
            <option value="bulls">Bulls</option>
        </select>
        <br>
        <br>
        <input type="file" name="fichero" id="">
        <input type="hidden" name="usuarioVIP" value="123">
        <br>
        <br>
        
        <input type="submit" value="Enviar" name="enviar">
        <input type="reset" value="Borrar" name="borrar">
    </form>

    
</body>
</html>