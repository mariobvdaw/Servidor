<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilo.css">
    <title>PR03</title>
</head>
<body>

    <?php
            include("./fragmentos/header.html");
    ?>

    <main>

        <ul>
            <li><a href="./ejercicio1.php">Ejercicio 1</a></li>
            <li><a href="./ejercicio2.php?variable=prueba">Ejercicio 2</a></li>
            <li><a href="./ejercicio3.php?anio=2023&mes=10&dia=3">Ejercicio 3</a></li>
            <li><a href="./ejercicio4.php?anio1=2000&mes1=3&dia1=16&anio2=2010&mes2=6&dia2=18">Ejercicio 4</a></li>
        </ul>

        <div class="resumen">
            <h3>Resumen</h3>
            <ol>
                <li>Primer ejercicio
                    <ol type="a">
                        <li>Nombre de fichero</li>
                        <li>IP cliente</li>
                        <li>Path del fichero</li>
                        <li>Fecha y hora actual</li>
                        <li>Fecha y hora Oporto</li>
                        <li>Fecha cumpleaños</li>
                        <li>Fecha y dia de la semana dentro de 60 días</li>
                    </ol>
                </li>
                <li>Segundo ejercicio: datos sobre una variable pasaada por url.</li>
                <li>Tercer ejercicio: día de la semana de un día pasado por url.</li>
                <li>Cuarto ejercicio: fechas de nacimiento y diferencia de edad entre dos personas.</li>
            </ol>
        </div>

    </main>
    
    <?php
            echo "<p><a href='http://" . $_SERVER['SERVER_ADDR'] . "./verCodigo.php?fichero=".$_SERVER['SCRIPT_FILENAME']."'>Ver codigo</a></p>";
            include("./fragmentos/footer.html");
    ?>

</body>
</html>