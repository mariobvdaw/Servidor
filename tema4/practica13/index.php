<?php
require("./funcionesBD.php");

if (isset($_REQUEST["crear"])) {
    crearBase();
}

if (isset($_REQUEST["enviar"])) {
    if ($_REQUEST["enviar"] == "modificar") {
        echo "modificar";
    } elseif($_REQUEST["enviar"] == "eliminar") {
        echo "eliminar";
    }elseif($_REQUEST["enviar"] == "nuevo") {
        echo "añadir nuevo";
    }
    
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR13</title>
    <style>
        tr,
        td {
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>

<body>
        

    <?php
    cargarTabla();


    ?>
</body>

</html>