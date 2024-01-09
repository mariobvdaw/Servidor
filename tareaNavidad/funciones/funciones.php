<?php
function representarProductos($arrProductos)
{
    foreach ($arrProductos as $producto) {
        echo "<div class='card'>";
        echo '<div class="contenedor-img">';
        echo '<img src="' . $producto['url_imagen'] . '" alt="">';
        echo '</div>';
        echo "<h3>" . $producto['descripcion'] . "</h3>";
        echo "<p>" . $producto['precio'] . " €</p>";
        echo '<form action="">';
        if ($producto['stock'] == "0") {
            echo '<p style="color: red; text-decoration: line-through;">Stock: ' . $producto['stock'] . '</p>';
        } else {
            echo '<p style="color: #777;">Stock: ' . $producto['stock'] . '</p>';
        }
        echo '<input type="hidden" name="codigo" value="' . $producto['codigo'] . '">';
        echo '<label for="cantidad' . $producto['codigo'] . '">Seleccionar cantidad: </label>';
        echo '<input type="number" name="cantidad" value="1" id="cantidad' . $producto['codigo'] . '" min="1" max="' . $producto['stock'] . '">';
        if ($producto['stock'] == "0") {
            echo '<input class="input-comprar-desactivado" type="submit" name="comprar" value="Comprar" disabled>';
        } else {
            echo '<input class="input-comprar-activado" type="submit" name="comprar" value="Comprar">';
        }
        echo '</form>';
        echo "</div>";
    }
}
?>