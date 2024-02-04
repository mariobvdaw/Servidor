<?php
$errores = array();
$arr_cat = ProductoDAO::findCategorias();
if (!isset($_REQUEST['Producto_BuscarCategoria'])) { // buscar por categoria
    $arr_prod = ProductoDAO::cargarProductosInicio();
} else if ($_REQUEST['categoria'] == "Todos") {
    $arr_prod = ProductoDAO::findAll();
} else if ($_REQUEST['categoria'] != "Todos") {
    $arr_prod = ProductoDAO::findByCategoria($_REQUEST['categoria']);
}
if (isset($_REQUEST['Producto_ComprarPorducto'])) { // comprar producto
    if ($_REQUEST['cantidad'] <= ProductoDAO::findById($_REQUEST['codigo'])->stock) {
        if (
            CompraDAO::insert(
                $_SESSION['usuario']->user,
                $_REQUEST['codigo'],
                $_REQUEST['cantidad'],
                ProductoDAO::findById($_REQUEST['codigo'])->precio * $_REQUEST['cantidad']
            )
        ) {
            ProductoDAO::restarStock($_REQUEST['codigo'], $_REQUEST['cantidad']);
            $sms = "Producto comprado correctamente";
        }
    } else {
        $sms = "No se pudo comprar el producto";
    }
}
if ($_REQUEST['Producto_VerAlmacen']) { // almacen
    $arr_productos = ProductoDAO::findAll();
} else if ($_REQUEST['Producto_AñadirProducto']) { // añadir nuevo producto
    $_SESSION['vista'] = VIEW . 'nuevoProducto.php';
} else if ($_REQUEST['Producto_GuardarProducto']) {
    if (validaFormProducto($errores)) {

        $producto = new Producto(
            $_REQUEST['codigoN'],
            $_REQUEST['descripcion'],
            $_REQUEST['precio'],
            $_REQUEST['stock'],
            $_REQUEST['imagen'],
            $_REQUEST['categoria']
        );
        if (ProductoDAO::insert($producto)) {
            $albaran = new Albaran(
                null,
                date('Y-m-d'),
                $_REQUEST['codigoN'],
                $_REQUEST['stock'],
                $_SESSION['usuario']->user,
            );
            AlbaranDAO::insert($albaran);
            $sms = "Producto registrado correctamente";
        }
    }
    $arr_productos = ProductoDAO::findAll();

} else if (isset($_REQUEST['Producto_ModificarProducto'])) { // modificar producto existente
    $producto = ProductoDAO::findById($_REQUEST['codigo']);
    $_SESSION['vista'] = VIEW . 'modificarProducto.php';
} else if (isset($_REQUEST['Producto_GuardarModificado'])) {
    if (validaFormProductoMod($errores)) {
        $producto = new Producto(
            $_REQUEST['codigo'],
            $_REQUEST['descripcion'],
            $_REQUEST['precio'],
            null,
            null,
            null
        );
        if (ProductoDAO::update($producto)) {
            $sms = "Producto modificado correctamente";
        }
    }
} else if (isset($_REQUEST['Producto_AñadirStock'])) { // añadir stock a un producto
    if ($_REQUEST['cantidad'] != "") {
        if (ProductoDAO::añadirStock($_REQUEST['codigo'], $_REQUEST['cantidad'])) {
            $albaran = new Albaran(
                null,
                date('Y-m-d'),
                $_REQUEST['codigo'],
                $_REQUEST['cantidad'],
                $_SESSION['usuario']->user
            );
            AlbaranDAO::insert($albaran);
            $sms = "Stock añadido correctamente";
        }
    }
    $arr_productos = ProductoDAO::findAll();

}

