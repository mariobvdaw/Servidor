<?php

require('./funciones/conexionBD.php');
require('./funciones/validaciones.php');

session_start();

if (!isset($_SESSION['usuario'])) {
    $_SESSION['error'] = "Inicie sesión para acceder al almacen";
    header('Location: ./login.php');
    exit;
} elseif ($_SESSION['usuario']["perfil"] == "cliente") {
    $_SESSION['error'] = "Los clientes no pueden acceder a las ventas";
    header('Location: ./home.php');
    exit;
}

$errores = array();
if (isset($_REQUEST['eliminar'])) {
    borrarAlbaran($_REQUEST['id']);
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/tablas.css">
    <title>Albaranes</title>
</head>

<body>
    <?php
    include("./fragmentos/header.php");
    ?>


    <h2>Albaranes</h2>
    <?php
    $arrProductos = cargarAlbaranes();
    if ($arrProductos) {
        ?>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Fecha</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Usuario</th>
                    <?php
                    if ($_SESSION['usuario']['perfil'] == "administrador") {
                        echo '<th></th>';
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($arrProductos as $producto) {
                    if ($producto['activo'] == "1") {

                        echo "<tr>";
                        echo "<td>" . $producto['id'] . "</td>";
                        echo "<td>" . $producto['fecha'] . "</td>";
                        echo "<td>" . findProduct($producto['cod_producto'])['descripcion'] . "</td>";
                        echo "<td>" . $producto['cantidad'] . "</td>";
                        echo "<td>" . $producto['usuario'] . "</td>";
                        if ($_SESSION['usuario']['perfil'] == "administrador") {
                            echo "<td>";
                            echo '<form action="">';
                            echo '<input type="hidden" name="id" value="' . $producto['id'] . '">';
                            echo '<input type="submit" class="boton-tabla" name="eliminar" value="Eliminar">';
                            echo '</form>';
                            echo "</td>";
                        }
                        echo "</tr>";
                    }
                }


                ?>
            </tbody>
        </table>
    <?php
    } else {

        echo "Sin albaranes por el momento...";
    }
    ?>
</body>

</html>