<?php
require('./funciones/conexionBD.php');
require('./funciones/funciones.php');

session_start();
// COMPROBACIONES PREVIAS
if (!isset($_SESSION['usuario'])) {
    $_SESSION['error'] = "Antes de comprar debe iniciar sesion";
    header('Location: ./login.php');
    exit;
}

// SI SE COMPRA UN PRODUCTO Y HAY STOCK PARA REALIZAR LA COMPRA...
if (isset($_REQUEST['comprar'])) {
    if ($_REQUEST['cantidad'] <= findProduct($_REQUEST['codigo'])['stock']) {
        comprarProducto(
            $_SESSION['usuario']['user'],
            date('Y-m-d'),
            $_REQUEST['codigo'],
            $_REQUEST['cantidad'],
            findProduct($_REQUEST['codigo'])['precio'] * $_REQUEST['cantidad']
        );
        restarStock($_REQUEST['codigo'], $_REQUEST['cantidad']);
    }
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


    <main>
        <?php
        if (isset($_REQUEST["buscar"]) && isset($_REQUEST["categoria"])) { // COMPRUEBA QUE SE HA BUSCADO UNA CATEGORIA
            // CARGA LA CATEGORIA BUSCADA 
            if ($_REQUEST["categoria"] == "Todos") {
                $arrProductos = cargarProductos();

            } else {
                $arrProductos = cargarProductosCategoria($_REQUEST["categoria"]);
            }
            ?>
            <section class="seccion-productos">
                <h2>
                    <?php echo $_REQUEST["categoria"] ?>
                </h2>
                <div class="productos">
                    <?php
                    representarProductos($arrProductos);
                    ?>
                </div>
            </section>
            <?php
        } else { // CARGA "DESTACADOS"
            ?>
            <section class="seccion-productos">
                <h2>Productos destacados</h2>
                <div class="productos">
                    <?php
                    $arrProductos = cargarProductosInicio();
                    representarProductos($arrProductos);
                    ?>
                </div>
            </section>
            <?php
        }


        ?>
        <!-- FORMULARIO DE CATEGORIAS -->
        <form action="" class="formulario-categorias">
            <p>Selecciona una categoria de busqueda:</p>
            <label class="categoria" for="general">Todos
                <input class="categoria" type="radio" id="general" name="categoria" value="Todos" checked>
            </label>
            <?php

            $categorias = cargarCategorias();
            foreach ($categorias as $categoria) {
                echo '<label class="categoria" for="' . $categoria . '">' . $categoria;
                echo '<input class="categoria" type="radio" id="' . $categoria . '" name="categoria" value="' . $categoria . '">';
                echo '</label>';
            }
            ?>
            <input class="categoria" type="submit" name="buscar" value="Buscar">
        </form>


    </main>
</body>

</html>