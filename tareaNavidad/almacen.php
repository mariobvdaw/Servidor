<?php

require('./funciones/conexionBD.php');
require('./funciones/validaciones.php');

session_start();

if (!isset($_SESSION['usuario'])) {
    $_SESSION['error'] = "Inicie sesión para acceder al almacen";
    header('Location: ./login.php');
    exit;
} elseif ($_SESSION['usuario']["perfil"] == "cliente") {
    $_SESSION['error'] = "Los clientes no pueden acceder al almacen";
    header('Location: ./home.php');
    exit;
}

$errores = array();
if (isset($_REQUEST['añadir'])) {
    if ($_REQUEST['añadir'] == "Añadir stock" && $_REQUEST['aumento'] > 0) {
        aumentarStock($_REQUEST['codigo'], $_REQUEST['aumento']);
        // generar linea albaran *****
    } elseif (
        $_REQUEST['añadir'] == "Nuevo" &&
        $_SESSION['usuario']['perfil'] == "administrador" &&
        validaFormProducto($errores)
    ) {
        altaProducto($_REQUEST['codigoN'], $_REQUEST['descripcion'], $_REQUEST['precio'], $_REQUEST['stock'], $_REQUEST['imagen'], $_REQUEST['categoria']);
    }
} elseif (isset($_REQUEST['modificar']) && $_SESSION['usuario']['perfil'] == "administrador"){
    header('Location: ./modificarProducto.php?codigo='.$_REQUEST['codigo']);
    exit;
} {

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
                <th>Categoría</th>
                <th>Stock</th>
                <th>Añadir Productos</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $arrProductos = cargarProductos();
            foreach ($arrProductos as $producto) {
                echo "<tr>";
                echo "<td>" . $producto['codigo'] . "</td>";
                echo "<td>" . $producto['descripcion'] . "</td>";
                echo "<td>" . $producto['precio'] . "</td>";
                echo "<td>" . $producto['categoria'] . "</td>";
                echo "<td>" . $producto['stock'] . "</td>";
                echo "<td>";
                echo '<form action="">';
                echo '<input type="hidden" name="codigo" value="' . $producto['codigo'] . '">';
                echo '<input type="number" class="input-añadir-stock" name="aumento" min="1">';
                echo '<input type="submit" class="boton-añadir-stock" name="añadir" value="Añadir stock">';
                echo '</form>';
                echo "</td>";
                if ($_SESSION['usuario']['perfil'] == "administrador") {
                    echo "<td>";
                    echo '<form action="">';
                    echo '<input type="hidden" name="codigo" value="' . $producto['codigo'] . '">';
                    echo '<input type="submit" class="boton-añadir-stock" name="modificar" value="Modificar">';
                    echo '</form>';
                    echo "</td>";
                }
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>
    <?php

    if ($_SESSION['usuario']['perfil'] == "administrador") {
        ?>

        <form action="" class="nuevo-producto">
            <h3>Nuevo producto</h3>
            <label for="codigo">Código:
                <input type="number" id="codigo" name="codigoN" value="<?php recuerda("codigoN") ?>">
                <?php errores($errores, "codigo"); ?>
            </label>
            <label for="descripcion">Descripción:
                <input type="text" id="descripcion" name="descripcion" value="<?php recuerda("descripcion") ?>">
                <?php errores($errores, "descripcion"); ?>
            </label>
            <label for="precio">Precio:
                <input type="text" id="precio" name="precio" value="<?php recuerda("precio") ?>">
                <?php errores($errores, "precio"); ?>
            </label>
            <label for="categoria">Categoría:
                <input type="text" id="categoria" name="categoria" value="<?php recuerda("categoria") ?>">
                <?php errores($errores, "categoria"); ?>
            </label>
            <label for="imagen">Imagen URL:
                <input type="text" id="imagen" name="imagen" value="<?php recuerda("imagen") ?>">
                <?php errores($errores, "imagen"); ?>
            </label>
            <label for="stock">Stock:
                <input type="number" id="stock" name="stock" value="<?php recuerda("stock") ?>">
                <?php errores($errores, "stock"); ?>
            </label>
            <input type="submit" id="producto-nuevo" name="añadir" value="Nuevo">
        </form>
        <?php

    }
    ?>

</body>

</html>