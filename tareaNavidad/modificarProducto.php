<?php

require('./funciones/conexionBD.php');
require('./funciones/validaciones.php');

session_start();

if (!isset($_SESSION['usuario'])) {
    $_SESSION['error'] = "Inicie sesión para acceder al almacen";
    header('Location: ./login.php');
    exit;
} elseif ($_SESSION['usuario']["perfil"] != "administrador") {
    $_SESSION['error'] = "No tienes acceso";
    header('Location: ./home.php');
    exit;
}

$errores = array();
if (enviado() && validaFormProductoMod($errores)) {
    modificarProducto($_REQUEST['codigo'], $_REQUEST['descripcion'], $_REQUEST['precio']);
    header('Location: ./almacen.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/almacen.css">
    <title>Almacen</title>
</head>

<body>
    <?php
    include("./fragmentos/header.php");
    ?>


    <h2>Almacen</h2>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $producto = findProduct($_REQUEST['codigo']);

            echo '<form action="">';
            echo '<input type="submit" class="boton-añadir-stock" name="guardar" value="Guardar">';
            echo "<tr>";
            echo "<td>" . $producto['codigo'] . "</td>";
            echo '<td><input type="text" value="' . $producto['descripcion'] . '" id="descipcion" name="descripcion"></td>';
            errores($errores, "descripcion");
            echo '<td><input type="text" value="' . str_replace(",", ".", $producto['precio']) . '" id="precio" name="precio"></td>';
            errores($errores, "precio");
            echo "</tr>";
            echo '<input type="hidden" name="codigo" value="' . $producto['codigo'] . '">';
            echo '</form>';
            ?>
        </tbody>
    </table>


</body>

</html>