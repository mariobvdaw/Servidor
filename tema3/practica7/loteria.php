<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loteria</title>
    <style>
        table,td{
            border: 1px solid black;
            margin: 3px;
        }
        .fallo{
            background-color: red;
        }
        .acierto{
            background-color: green;
        }
        .premio{
            background-color: yellow;
        }
    </style>
</head>
<body>
    <?php
    include("./funcionLoteria.php");
    // http://192.168.7.206/tema3/practica7/loteria.php?e1=3&e2=12&e3=9&e4=30&e5=36
    echo "Debes elegir 5 numeros";
    generaLoteria();
    // http://192.168.7.206/tema3/practica7/loteria.php?e1=3&e2=12&e3=9&e4=30&e5=36&es1=3&es2=9
    echo "Debes elegir 2 numeros";
    generaLoteria2();
    echo "<small class='acierto'>Acierto <br></small>";
    echo "<small class='fallo'>Fallo <br></small>";
    echo "<small class='premio'>Premios sin acertar <br></small>";
    ?>
    
</body>
</html>