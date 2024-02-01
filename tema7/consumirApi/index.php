<?php
require('curl.php');
require('confApi.php');


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API</title>
</head>

<body>
    <h1>Lista de institutos</h1>
    <table>

        <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Localidad</th>
            <th>Telefono</th>
        </thead>

        <tbody>

            <?php
            $institutos = get('institutos');
            $institutos = json_decode($institutos, true);
            foreach ($institutos as $insti) {
                echo '<tr>';
                echo '<td>' . $insti['id'] . '</td>';
                echo '<td>' . $insti['nombre'] . '</td>';
                echo '<td>' . $insti['localidad'] . '</td>';
                echo '<td>' . $insti['telefono'] . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <a href="./insertar.php">Insertar</a>
    <a href="./modificar.php">Modificar</a>

</body>

</html>