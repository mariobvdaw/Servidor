<?php

require('./config/config.php');
session_start();

if (isset($_REQUEST['login'])) {
    $_SESSION['vista'] = VIEW . 'login.php';
    $_SESSION['controller'] = CON . 'LoginController.php';

} elseif (isset($_REQUEST['home'])) {
    $_SESSION['vista'] = VIEW . 'home.php';

} elseif (isset($_REQUEST['logout'])) {
    session_destroy();
    header('Location: ./index.php');
    exit;
} elseif (isset($_REQUEST['User_verPerfil'])) {
    $_SESSION['vista'] = VIEW . 'verUsuario.php';
    $_SESSION['controller'] = CON . 'UserController.php';
} elseif (isset($_REQUEST['Producto_ComprarProductos'])) {
    $_SESSION['vista'] = VIEW . 'comprar.php';
    $_SESSION['controller'] = CON . 'ProductoController.php';
} elseif (isset($_REQUEST['Producto_VerAlmacen'])) {
    $_SESSION['vista'] = VIEW . 'almacen.php';
    $_SESSION['controller'] = CON . 'ProductoController.php';
}elseif (isset($_REQUEST['Ventas_VerVentas'])) {
    $_SESSION['vista'] = VIEW . 'ventas.php';
    $_SESSION['controller'] = CON . 'VentasController.php';
}elseif (isset($_REQUEST['Albaranes_VerAlbaranes'])) {
    $_SESSION['vista'] = VIEW . 'albaranes.php';
    $_SESSION['controller'] = CON . 'AlbaranController.php';
}



// SI EXISTE UN CONTROLADOR LO REQUIERE
if (isset($_SESSION['controller'])) {
    require($_SESSION['controller']);
}
require('./views/layout.php');

