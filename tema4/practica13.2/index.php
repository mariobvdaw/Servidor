<?php
require("./funcionesBD.php");

if (isset($_REQUEST["crear"])) {
    crearBase();
}

if (isset($_REQUEST["enviar"])) {
    if ($_REQUEST["enviar"] == "modificar") {
        header("Location: ./modificar.php?id=" . $_REQUEST["id"]);
    } elseif ($_REQUEST["enviar"] == "eliminar") {
        delete();
    } elseif ($_REQUEST["enviar"] == "nuevo") {
        header("Location: ./modificar.php");
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR13</title>
    <style>
        tr,
        td {
            border: 1px solid black;
            padding: 10px 20px;
        }
        .warning{
            color: darkorange;
            font-style: italic;
        }
    </style>
</head>

<body>


    <?php
    
        if ($datosTabla = findAll()) {
            if ($_REQUEST["enviar"] == "buscar") {
                $datosTabla = findByName($_REQUEST["nombre"]);
            }
            echo '<table>';

            foreach ($datosTabla as $row) {
                echo "<tr>";
                $id = $row["id"];

                foreach ($row as $value) {
                    echo "";
                    echo "<td>";
                    echo $value;
                    echo "</td>";
                }

                echo '<td>';
                echo '<form action="">';
                echo '<input type="submit" name="enviar" value="modificar">';
                // echo '</td>';
                // echo '<td>';
                echo '<input type="submit" name="enviar" value="eliminar">';
                echo '<input type="hidden" name="id" value="' . $id . '">';
                echo '</form>';
                echo '</td>';
                echo '</tr>';
            }
            echo "</table>";

            echo '<form action="">';
            echo '<input type="submit" name="enviar" value="nuevo">';
            echo '</form>';
            echo '<form action="">';
            echo 'Buscar por nombre: ';
            echo '<input type="text" name="nombre" id="nombre" >';
            echo '<input type="submit" name="enviar" value="buscar">';
            echo '</form>';

        
    }
    ?>
</body>

</html>