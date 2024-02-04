<?php
if (isset($sms))
    echo $sms;
?>
<form action="" method="post" class="container">
    <h3>Nuevo producto</h3>

    <div class="form-group">
        <label for="codigo">Código:</label>
        <input type="number" class="form-control" id="codigo" name="codigoN" value="<?php recuerda("codigoN") ?>">
        <?php
        if (isset($errores) && isset($errores['codigo'])) {
            echo '<span class="text-danger">' . $errores["codigo"] . ' </span>';
        }
        ?>
    </div>

    <div class="form-group">
        <label for="descripcion">Descripción:</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion"
            value="<?php recuerda("descripcion") ?>">
        <?php
        if (isset($errores) && isset($errores['descripcion'])) {
            echo '<span class="text-danger">' . $errores["descripcion"] . ' </span>';
        }
        ?>
    </div>

    <div class="form-group">
        <label for="precio">Precio:</label>
        <input type="text" class="form-control" id="precio" name="precio" value="<?php recuerda("precio") ?>">
        <?php
        if (isset($errores) && isset($errores['precio'])) {
            echo '<span class="text-danger">' . $errores["precio"] . ' </span>';
        }
        ?>
    </div>

    <div class="form-group">
        <label for="categoria">Categoría:</label>
        <input type="text" class="form-control" id="categoria" name="categoria" value="<?php recuerda("categoria") ?>">
        <?php
        if (isset($errores) && isset($errores['categoria'])) {
            echo '<span class="text-danger">' . $errores["categoria"] . ' </span>';
        }
        ?>
    </div>

    <div class="form-group">
        <label for="imagen">Imagen URL:</label>
        <input type="text" class="form-control" id="imagen" name="imagen" value="<?php recuerda("imagen") ?>">
        <?php
        if (isset($errores) && isset($errores['imagen'])) {
            echo '<span class="text-danger">' . $errores["imagen"] . ' </span>';
        }
        ?>
    </div>

    <div class="form-group">
        <label for="stock">Stock:</label>
        <input type="number" class="form-control" id="stock" name="stock" value="<?php recuerda("stock") ?>">
        <?php
        if (isset($errores) && isset($errores['stock'])) {
            echo '<span class="text-danger">' . $errores["stock"] . ' </span>';
        }
        ?>
    </div>

    <input type="submit" name="Producto_GuardarProducto" value="Guardar Producto" class="btn btn-primary mt-3">
</form>