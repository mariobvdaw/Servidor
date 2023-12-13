<?php
require("./funcionesBD.php");

if (isset($_REQUEST["guardar"])) {
    insert();
    echo "añadiendo";
    header("Location: ./index.php");
} elseif (isset($_REQUEST["modificar"])) {
    update();
    header("Location: ./index.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR13</title>

</head>

<body>

    <?php
    $id = "";
    $nombre = "";
    $fecha = "";
    $dinero = "";
    $accion = "guardar";
    if (isset($_REQUEST["id"])) {

        $row = findByID($_REQUEST["id"]);

        $id = $row["id"];
        $nombre = $row["nombre"];
        $fecha = $row["fecha_registro"];
        $dinero = $row["dinero_gastado"];

        $accion = "modificar";
    }

    echo '<form action="">';
    echo '<td><input type="text" readonly placeholder="id auto" name="id" id="id" value="' . $id . '"></td>';
    echo '<td><input type="text" name="nombre" id="nombre" value="' . $nombre . '"></td>';
    echo '<td><input type="text" name="fecha" id="fecha" value="' . $fecha . '"></td>';
    echo '<td><input type="text" name="dinero" id="dinero" value="' . $dinero . '"></td>';

    echo '<input type="submit" name="' . $accion . '" value="' . $accion . '">';
    echo '</form>';

    ?>
</body>

</html>