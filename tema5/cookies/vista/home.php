<?php
require("../funciones/funcionesBD.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panaderia</title>
</head>

<body>
    <div class="productos">
        <h2>Productos</h2>
        <table>
            <thead>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Imagen</th>
                <th>Ver</th>
            </thead>
            <tbody>
                <?php
                $arrProductos = findAll();
                foreach ($arrProductos as $producto) {
                    echo "<tr>";
                    echo "<td>" . $producto['nombre'] . "</td>";
                    echo "<td>" . substr($producto['descripcion'], 0, 40) . "</td>";
                    echo "<td> <img src='../" . $producto['baja'] . "'></td>";
                    echo "<td><a href='verProducto.php?id=" . $producto['codigo'] . "'>Ver</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="visitados">
        <h2>Ultimos visitados</h2>
        <?php
        if (!empty($_COOKIE['id'])) {
            // echo "<pre>";
            // print_r($_COOKIE);
            ksort($_COOKIE['id']);
            foreach ($_COOKIE['id'] as $value) {
                $producto = findByID($value);
                echo "<td><a href='verProducto.php?id=" . $producto['codigo'] . "'>";
                echo "<img src='../" . $producto['baja'] . "'>";
                echo "</a>";
            }

        } else {
            echo "No has visitado ningun producto";
        }
        ?>
    </div>
</body>

</html>