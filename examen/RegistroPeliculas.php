<?php
include("./validaciones.php");
include("./funciones.php");

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Películas</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>

    <?php
    $errores = array();
    if (enviado() && validarFormulario($errores)) {
        // DATOS ENVIADOS
        $id = $_REQUEST["id"];
        $titulo = $_REQUEST["titulo"];
        $director = $_REQUEST["director"];
        $lanzamiento = $_REQUEST["lanzamiento"];
        $genero = $_REQUEST["genero"];
        $actores = $_REQUEST["actores"];
        $duracion = $_REQUEST["duracion"];
        $sinopsis = $_REQUEST["sinopsis"];

        if (file_exists("./peliculas.xml")) {
            // AÑADE LOS DATOS AL FICHERO EXISTENTE
            insertarDatos($id, $titulo, $director, $lanzamiento, $genero, explode(",", $actores), $duracion, $sinopsis);
        } else {
            // CREAR FICHERO CON LOS DATOS INSERTADOS    
            crearFichero($id, $titulo, $director, $lanzamiento, $genero, explode(",", $actores), $duracion, $sinopsis);

        }

    }
    ?>
    <h1>Registro de Películas</h1>

    <form action="" method="get">

        <label for="id">ID (Formato: 0000MM-000)
            <input type="text" name="id" id="id" value="<?php recuerda("id") ?>">
        </label>
        <?php
        errores($errores, "id");
        ?>
        <br><br>

        <label for="titulo">Título:
            <input type="text" name="titulo" id="titulo" value="<?php recuerda("titulo") ?>">
        </label>
        <?php
        errores($errores, "titulo");
        ?>
        <br><br>

        <label for="director">Director:
            <input type="text" name="director" id="director" value="<?php recuerda("director") ?>">
        </label>
        <?php
        errores($errores, "director");
        ?>
        <br><br>

        <label for="lanzamiento">Año de Lanzamiento: (AAAA):
            <input type="text" name="lanzamiento" id="lanzamiento" value="<?php recuerda("lanzamiento") ?>">
        </label>
        <?php
        errores($errores, "lanzamiento");
        ?>
        <br><br>

        <p>Género:</p>
        <?php
        generarRadios();
        errores($errores, "genero");
        ?>
        <br><br>

        <label for="actores">Actores Principales (separados por comas):
            <input type="text" name="actores" id="actores" value="<?php recuerda("actores") ?>">
        </label>
        <?php
        errores($errores, "actores");
        ?>
        <br><br>

        <label for="duracion">Duración: (hh:mm:ss):
            <input type="text" name="duracion" id="duracion" value="<?php recuerda("duracion") ?>">
        </label>
        <?php
        errores($errores, "duracion");
        ?>
        <br><br>
        <label for="sinopsis">Sinopsis (mínimo 50 caracteres):
            <br>
            <textarea name="sinopsis" id="sinopsis" cols="60" rows="10"
                value="<?php recuerda("sinopsis") ?>"></textarea>
        </label>
        <?php
        errores($errores, "sinopsis");
        ?>





        <br><br>
        <input type="submit" name="enviar" value="Registar Pelicula">
    </form>


</body>

</html>