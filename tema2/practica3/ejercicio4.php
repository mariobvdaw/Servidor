<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Ejercicio 4</title>
</head>
<body>
    
    <?php
            include("./fragmentos/header.html");
    ?>
    
    <main>
        <h1>Ejercicio 4</h1>
        
        <div class="enunciado">
            <h2>Enunciado:</h2>
            <p>
                Crea una página en la que se le pase como parámetros en la URL (ano, mes y día) de dos personas y muestre las fechas de nacimiento de ambos y la diferencia de edad en años.
            </p>
        </div>

        <div class="ejercicio">
            <?php
                $anio1 = $_GET['anio1'];
                $mes1 = $_GET['mes1'];
                $dia1 = $_GET['dia1'];
                $anio2 = $_GET['anio2'];
                $mes2 = $_GET['mes2'];
                $dia2 = $_GET['dia2'];

                $nacimiento1 = date("Y-m-d", mktime(0, 0, 0, $mes1, $dia1, $anio1));
                $nacimiento2 = date("Y-m-d", mktime(0, 0, 0, $mes2, $dia2, $anio2));

                echo "Fecha primero: " . $nacimiento1;
                echo "<br>Fecha segundo: " . $nacimiento2;

                $fecha1 = new DateTime($nacimiento1);    
                $fecha2 = new DateTime($nacimiento2);

                $diferencia=$fecha2->diff($fecha1);
                echo "<pre>";
                print_r($diferencia);
                echo "</pre>";
            ?>   
        </div> 
        
    </main>

    <?php
        echo "<a href='http://" . $_SERVER['SERVER_ADDR'] . "./verCodigo.php?fichero=".$_SERVER['SCRIPT_FILENAME']."'>Ver codigo</a>";
        include("./fragmentos/footer.html");
    ?>
</body>
</html>
