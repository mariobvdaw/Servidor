<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Ejercicio 1</title>
</head>
<body>

    <?php
        include("./fragmentos/header.html");
    ?>
    
    <main>
        <h1>Ejercicio 1</h1>

        <div class="enunciado">
            <h2>Enunciado:</h2>
            <p>Crea una página que:</p>
                <ol type="a">
                    <li>Muestra el nombre del fichero que se está ejecutando.</li>
                    <li>Muestra la dirección IP del equipo desde el que estás accediendo.</li>
                    <li>Muestra el path donde se encuentra el fichero que se está ejecutando.</li>
                    <li>Muestra la fecha y hora actual formateada en 2022-09-4 19:17:18.</li>
                    <li>Muestra la fecha y hora actual en Oporto formateada en (día de la semana, día de mes de año, hh:mm:ss , Zona horaria).</li>
                    <li>Inicializa y muestra una variable en timestamp y en fecha con formato dd/mm/yyyy de tu cumpleaños</li>
                    <li>Calcular la fecha y el día de la semana de dentro de 60 días.</li>
                </ol>
        </div>
        <div class="ejercicio">
            <?php
                date_default_timezone_set("Europe/Madrid");

                echo "a. " . basename($_SERVER['PHP_SELF']) . "<br>";

                echo "b. " . $_SERVER['REMOTE_ADDR'] . "<br>";

                echo "c. " . $_SERVER['PHP_SELF'] . "<br>";

                echo "d. " . date("Y-m-j H:i:s") . "<br>";

                date_default_timezone_set("Europe/Lisbon");  
                echo "e. " . date("w, j, z H:i:s, e") . "<br>";

                $cumple = strtotime("05/13/2004");
                echo "f. timestamp: " . $cumple . ", fecha: " .  date("d/m/Y", $cumple) . "<br>";

                echo "g. fecha: " . date('d-m-Y', strtotime('+60 days')) . ", dia de la semana: " . date('w', strtotime('+60 days'));
            ?>
        </div>

    </main>

    <?php
        echo "<p><a href='http://" . $_SERVER['SERVER_ADDR'] . "./verCodigo.php?fichero=".$_SERVER['SCRIPT_FILENAME']."'>Ver codigo</a></p>";
        include("./fragmentos/footer.html");
    ?>
</body>
</html>