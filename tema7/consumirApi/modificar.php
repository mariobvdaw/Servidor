<?php
require('curl.php');
require('confApi.php');

if (isset($_REQUEST['modificar'])) {
    $array = array(
        'nombre' => $_REQUEST['nombre'],
        'localidad' => $_REQUEST['localidad'],
        'telefono' => $_REQUEST['telefono'],
    );
    put('institutos', $_REQUEST['id'], $array);
}else if(isset($_REQUEST['eliminar'])){
    del('institutos',$_REQUEST['id']);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert</title>
</head>

<body>

    <h2>Insertar Instituto</h2>
    <form action="" method="post">
        <label for="id">Id:
            <input type="text" name="id" id="id">
        </label>
        <br>
        <label for="nombre">Nombre:
            <input type="text" name="nombre" id="nombre">
        </label>
        <br>
        <label for="localidad">Localidad:
            <input type="text" name="localidad" id="localidad">
        </label>
        <br>
        <label for="telefono">Telefono:
            <input type="text" name="telefono" id="telefono">
        </label>

        <br>
        <br>
        <input type="submit" name="modificar" value="Modificar">
        <input type="submit" name="eliminar" value="Eliminar">
    </form>
</body>

</html>