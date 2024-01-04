<?php
function representarProductos($arrProductos){
    foreach ($arrProductos as $producto) {
        echo "<div class='card'>";
        echo '<img src="' . $producto['url_imagen'] . '" alt="">';
        echo "<h3>" . $producto['descripcion'] . "</h3>";
        echo "<p>" . $producto['precio'] . " €</p>";
        echo '<form action="">';
        echo "<p>Disponibles: " . $producto['stock'] . "</p>";
        echo '<input type="hidden" name="codigo" value="' . $producto['codigo'] . '">';
        echo '<input type="hidden" name="maximo" value="' .$producto['stock'] . '">';
        echo '<label for="cantidad' . $producto['codigo'] . '">Seleccionar cantidad: </label>';
        echo '<input type="number" name="cantidad" value="1" id="cantidad' . $producto['codigo'] . '" min="1" max="' . $producto['stock'] . '">';
        echo '<input type="submit" name="comprar" value="Comprar">';
        echo '</form>';
        echo "</div>";
    }
}
?>