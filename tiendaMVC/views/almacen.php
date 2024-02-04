<?php

if (isset($sms))
    echo $sms;

echo '<div class="container">';
echo '<table class="table table-bordered table-striped table-sm">';
echo '<thead class="thead-dark">';
echo '<tr>';
echo '<th>Código</th>';
echo '<th>Descripción</th>';
echo '<th>Precio</th>';
echo '<th>Categoría</th>';
echo '<th>Stock</th>';
echo '<th>Añadir Stock</th>';

if ($_SESSION['usuario']->perfil == "administrador") {
    echo '<th>Modificar</th>';
}

echo '</tr>';
echo '</thead>';
echo '<tbody>';

foreach ($arr_productos as $producto) {
    echo '<tr>';
    echo '<td>' . $producto->codigo . '</td>';
    echo '<td>' . $producto->descripcion . '</td>';
    echo '<td>' . $producto->precio . '</td>';
    echo '<td>' . $producto->categoria . '</td>';
    echo '<td>' . $producto->stock . '</td>';
    echo '<td>';
    echo '<form action="" method="post" class="d-flex justify-content-between">';
    echo '<input type="hidden" name="codigo" value="' . $producto->codigo . '">';
    echo '<input type="number" class="form-control" name="cantidad" min="1" style="width:70%">';
    echo '<button type="submit" name="Producto_AñadirStock" class="btn btn-primary btn-sm" style="min-width:130px%">Añadir stock</button>';
    echo '</form>';
    echo '</td>';

    if ($_SESSION['usuario']->perfil == "administrador") {
        echo '<td>';
        echo '<form action="" method="post" class="d-flex justify-content-center">';
        echo '<input type="hidden" name="codigo" value="' . $producto->codigo . '">';
        echo '<button type="submit" name="Producto_ModificarProducto" class="btn btn-warning btn-sm">Modificar</button>';
        echo '</form>';
        echo '</td>';
    }

    echo '</tr>';
}

echo '</tbody>';

echo '</table>';
echo '</div>';



if ($_SESSION['usuario']->perfil == "administrador") {
    ?>
    <div class="container">
        <form action="" class="nuevo-producto" method="post">
            <input type="submit" id="producto-nuevo" name="Producto_AñadirProducto" value="Nuevo" class="btn btn-info">
        </form>
    </div>
    <?php
}
?>
</div>