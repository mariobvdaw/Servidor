<?php
// session_start();

// require('./funciones/validaciones.php');
// require('./funciones/conexionBD.php');
// // COMPROBACIONES PREVIAS
// if (!isset($_SESSION['usuario'])) {
//     $_SESSION['error'] = "Inicie sesión para acceder a su perfil";
//     header('Location: ./login.php');
//     exit;
// }
// $errores = array();
// if (enviado() && validaFormularioPerfil($errores)) { // MODIFICAR DATOS DEL USUARIO
//     modificarUsuario($_SESSION['usuario']['user'], $_REQUEST['pass'], $_REQUEST['email'], $_REQUEST['fecha_nacimiento']);
//     $_SESSION['usuario'] = findUser($_SESSION['usuario']['user']);
//     echo "<p>Usuario modificado, volviendo al home...</p>";
//     header("refresh:3;url=./home.php");
//     exit;
// }

?>

<?php
include("./fragmentos/header.php");
?>
<?php
// FORMULARIO CON DATOS USER
echo '<h2>Datos de ' . $_SESSION['usuario']['user'] . '</h2>';
echo '<form action="">';
foreach (findUser($_SESSION['usuario']['user']) as $clave => $dato) {
    $lectura = "";
    if ($clave == "user" || $clave == "perfil") {
        $lectura = "disabled";
    } elseif ($clave == "fecha_nacimiento") {
        $dato = str_replace('-', '/', $dato);
    }
    echo '<label for="' . $clave . '">' . $clave;
    echo '<input type="text" id="' . $clave . '" name="' . $clave . '" value="' . $dato . '" ' . $lectura . '>';
    errores($errores, $clave);
    echo '</label>';
}
echo '<input type="submit" name="enviar" value="Modificar">';
echo '</form>';
?>