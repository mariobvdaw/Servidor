<?php
require('./funciones/conexionBD.php');
session_start();
if (!isset($_SESSION['usuario'])) {
    $_SESSION['error'] = "No tiene permisos para entrar en PaginaUser";
    header('Location: ./login.php');
    exit;
}elseif(!usuarioPermitido(basename($_SERVER['PHP_SELF']))){
    $_SESSION['error'] = "<p>No tiene permisos para entrar en la pagina 1</p>";
    header('Location: ./homeUser.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Pagina 2</h1>


</body>

</html>