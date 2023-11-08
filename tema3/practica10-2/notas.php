<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
    <style>
        table{
            border: 1px solid black;
        }
        th,td{
            border: 1px solid black;
            padding: 5px 15px;
        }
        
    </style>
</head>
<body>

    <?php
        if (isset($_REQUEST["modificar"])) {
            header('Location: ./modificar.php?alumno='.$_REQUEST["alumno"]);
            exit;
        }
        if (isset($_REQUEST["eliminar"])) {
            echo "has seleccionado eliminar";
        }
        if (isset($_REQUEST["nuevo"])) {
            header('Location: ./modificar.php');
            exit;
        }
    ?>
    <h1>Notas</h1>
    <table>
        <tr>
            <th>Alumno</th>
            <th>Nota 1</th>
            <th>Nota 2</th>
            <th>Nota 3</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
        <?php
            $numeroAlumno = 1;
            if (($gestor = fopen("notas.csv", "r"))) {
                while (($datos = fgetcsv($gestor, 1000, ";"))) {
                    $numero = count($datos);
                    
                    echo "<tr>";
                    echo '<form action="" method="get">';
                    for ($c=0; $c < $numero; $c++) {
                        echo "<td> " . $datos[$c] ."</td>";
                    }
                    echo "<td>";
                    echo '<input type="submit" name="modificar" value="modificar">';
                    echo "<td>";
                    echo '<input type="submit" name="eliminar" value="eliminar">';
                    echo '<input type="hidden" name="alumno" value="'. $numeroAlumno.'">';
                    echo "</tr>";
                    echo '</form>';
                    $numeroAlumno++;
                }
                fclose($gestor);
            }
        ?>
    </table>
    <br>
    <form action="">
        <input type="submit" name="nuevo" value="nuevo">
    </form>

</body>
</html>