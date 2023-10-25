<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Ejercicio 3</title>
</head>
<body>

    <?php
            include("./fragmentos/header.html");
    ?>

    <main>
        <h1>Ejercicio 3</h1>

        <div class="enunciado">
            <h3>Enunciado:</h3>
            <p class="enunciado">
                Crea una página en la que se le pase como parámetros en la URL (ano, mes y día) y muestre el día de la semana de dicho día. (Por defecto, dale el valor de 03/10/2023).
            </p>
        </div>

        <div class="ejercicio">
            <?php
                $anio = $_GET['anio'];
                $mes = $_GET['mes'];
                $dia = $_GET['dia'];

                echo "Dia de la semana nº " . date("w", mktime(0, 0, 0, $mes, $dia, $anio)) . "<br>";
            ?>
        </div>

    </main>

    <?php
        echo "<a href='http://" . $_SERVER['SERVER_ADDR'] . "./verCodigo.php?fichero=".$_SERVER['SCRIPT_FILENAME']."'>Ver codigo</a>";
        include("./fragmentos/footer.html");
    ?>
    
</body>
</html>
