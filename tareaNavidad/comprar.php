<?php
require('./funciones/conexionBD.php');

session_start();

if (!isset($_SESSION['usuario'])) {
    $_SESSION['error'] = "Antes de comprar debe iniciar sesion";
    header('Location: ./login.php');
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
    <link rel="stylesheet" href="css/compras.css">

    <title>Compras</title>
</head>

<body>
    <?php
    include("./fragmentos/header.php");
    ?>
    <!-- <h1>Compras</h1> -->
    <section class="destacados">
        <h3>Productos destacados</h3>
        <div class="productos-destacados">
            <?php
            $arrProductos = cargarProductosInicio();
            foreach ($arrProductos as $producto) {
                echo "<div class='card'>";
                echo '<img src="' . $producto['url_imagen'] . '" alt="">';
                echo "<h3>" . $producto['descripcion'] . "</h3>";
                echo "<p>" . $producto['precio'] . " €</p>";
                echo '<form action="">';
                echo "<p>Disponibles: " . $producto['stock'] . "</p>";
                echo '<input type="hidden" name="codigo" value"' . $producto['codigo'] . '">';
                echo '<label for="cantidad' . $producto['codigo'] . '">Seleccionar cantidad: </label>';
                echo '<input type="number" name="cantidad" id="cantidad' . $producto['codigo'] . '" min="1" max="' . $producto['stock'] . '">';
                echo '<input type="submit" name="comprar" value="Comprar">';
                echo '</form>';
                echo "</div>";
            }
            // echo "<pre>";
            // print_r($arrProductos)
            ?>
        </div>
    </section>
</body>

</html>