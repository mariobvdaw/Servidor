<?php
if (!isset($_REQUEST['id'])) {
    header('location: home.php');
    exit;
}
require("../funciones/funcionesBD.php");
require("../funciones/funciones.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="./home.php">Volver al inicio</a>
    <?php
    $producto = findByID($_REQUEST['id']);
    if ($producto) {
        insertarCookie($_REQUEST['id']);
        echo "<p>" . $producto['nombre'] . "</p>";
        echo "<p>" . $producto['descripcion'] . "</p>";
        echo "<img src='../" . $producto['alta'] . "'>";
    
    }
    ?>
</body>

</html>