<?php
$errores = array();
$arr_cat = ProductoDAO::findCategorias();
if (!isset($_REQUEST['Producto_BuscarCategoria'])) {
    $arr_prod = ProductoDAO::cargarProductosInicio();
} else if ($_REQUEST['categoria'] == "Todos") {
    $arr_prod = ProductoDAO::findAll();
} else if ($_REQUEST['categoria'] != "Todos") {
    $arr_prod = ProductoDAO::findByCategoria($_REQUEST['categoria']);
}
if (isset($_REQUEST['Producto_ComprarPorducto'])) {
    if ($_REQUEST['cantidad'] <= ProductoDAO::findById($_REQUEST['codigo'])->stock) {
        if (
            ProductoDAO::comprarProducto(
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
if ($_REQUEST['Producto_VerAlmacen']) {
    $arr_productos = ProductoDAO::findAll();
} else if ($_REQUEST['Producto_AñadirProducto']) {
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
} else if (isset($_REQUEST['Producto_ModificarProducto'])) {
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
} else if (isset($_REQUEST['Producto_AñadirStock'])) {
    if ($_REQUEST['cantidad'] != "") {
        ProductoDAO::añadirStock($_REQUEST['codigo'], $_REQUEST['cantidad']);
        $sms = "Stock añadido correctamente";
        $arr_productos = ProductoDAO::findAll();
    }

}


// if (isset($_REQUEST['Cita_Pedir'])) {
//     $_SESSION['vista'] = VIEW . 'pedirCita.php';
// } elseif (isset($_REQUEST['Cita_GuardaCita'])) {
//     $errores = array();
//     if (validaFormularioNuevaCita($errores)) {
//         $cita = new Cita(
//             1,
//             $_REQUEST['especialista'],
//             $_REQUEST['motivo'],
//             $_REQUEST['fecha'],
//             $_SESSION['usuario']->codUsuario,
//             true
//         );
//         if (!CitaDAO::insert($cita)) {
//             $errores['insertar'] = "No se ha podido generar su cita";
//         } else {
//             $sms = "Se ha registrado su cita";
//             $arrayCitas = CitaDAO::findByPaciente($_SESSION['usuario']);
//             $_SESSION['vista'] = VIEW . 'verCitas.php';
//         }
//     }
// } elseif (isset($_REQUEST['Cita_verAnterior'])) {
//     $arrayCitas = CitaDAO::findByPacienteH($_SESSION['usuario']);

// } elseif (isset($_REQUEST['Citas_verTodasCitas'])) {
//     $arrayCitas = CitaDAO::findAll();

// } elseif (isset($_REQUEST['Cita_verCita'])) {
//     $cita = CitaDAO::findById($_REQUEST['id']);
//     $_SESSION['vista'] = VIEW . 'verCita.php';


// } else {
//     $arrayCitas = CitaDAO::findByPaciente($_SESSION['usuario']);
//     $_SESSION['vista'] = VIEW . 'verCitas.php';
// }
