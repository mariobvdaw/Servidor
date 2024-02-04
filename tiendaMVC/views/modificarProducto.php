<?php

if (isset($sms))
    echo $sms;
?>

<form action="" class="container" method="post">
    <h2>Modificar Producto</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            echo '<tr>';
            echo '<td>' . $producto->codigo . '</td>';
            echo '<td>';
            echo '<input type="text" class="form-control" value="' . $producto->descripcion. '" id="descripcion" name="descripcion">' ;
            if (isset($errores) && isset($errores['descripcion'])) {
                echo '<span class="text-danger">' . $errores["descripcion"] . ' </span>';
            }
            echo '</td>';
            echo '<td>';
            echo '<input type="text" class="form-control" value="' . str_replace(",", ".", $producto->precio) . '" id="precio" name="precio">';
            if (isset($errores) && isset($errores['precio'])) {
                echo '<span class="text-danger">' . $errores["precio"] . ' </span>';
            }
            echo '</td>';
            echo '</tr>';
            echo '<input type="hidden" name="codigo" value="' . $producto->codigo . '">';
            ?>
        </tbody>
    </table>
    <input type="submit" class="btn btn-primary" name="Producto_GuardarModificado" value="Guardar">
</form>