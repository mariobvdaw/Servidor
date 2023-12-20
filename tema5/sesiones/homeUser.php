<?php
require('./funciones/conexionBD.php');
session_start();

if (!isset($_SESSION['usuario'])) {
    $_SESSION['error'] = "No tiene permisos para entrar en PaginaUser";
    header('Location: ./login.php');
    exit;
} else {

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
    <h1>Pagina user</h1>
    <?php

    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
    }

    echo "Bienvenido " . $_SESSION['usuario']['nombre'];
    echo "<p>Puede acceder a: </p>";
    $paginas = paginasPermitidas();
    foreach ($paginas as $pagina) {
        echo '<a href="' . $pagina . '">' . $pagina . '</a>';
        echo "<br>";
    }
    ?>
    <br>
    <a href="./logout.php">Cerrar sesion</a>

</body>

</html>