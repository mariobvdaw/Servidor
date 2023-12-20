<?php
require('./funciones/conexionBD.php');
session_start();

if(!isset($_SESSION['usuario'])){
    $_SESSION['error']="No tiene permisos para entrar en PaginaUser";
    header('Location: ./login.php');
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
    <h1>Pagina user</h1>
    <?php

    echo "Bienvenido " . $_SESSION['usuario']['nombre'];
    $paginas = paginasPermitidas($_SESSION['user']);
    foreach ($paginas as $indice =>$pagina) {
        $numPagina = $indice +1;
        echo "<br>";
        echo '<a href="'.$pagina.'">Pagina '.$numPagina.'</a>';
        echo "<br>";
    }
    ?>
    <br>
    <a href="./logout.php">Cerrar sesion</a>

</body>

</html>