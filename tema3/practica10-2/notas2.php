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
            header('Location: ./modificar2.php?alumno='.$_REQUEST["alumno"]);
            exit;
        }
        // ELIMINAR ALUMNO
        if (isset($_REQUEST["eliminar"])) {
            $tmp = tempnam('.',"tem.csv");
                if(($gestor=fopen('notas.csv','r')) && ($nuevoFichero = fopen($tmp,'w'))){       
                    $contador = 1;
                    while($leido = fgetcsv($gestor,filesize("notas.csv"),";")){  
                        // LEER EL FICHERO VIEJO Y COPIARLO EN EL NUEVO 
                        // SI NO ES EL ALUMNO QUE SE QUIERE BORRAR
                        if($contador!=$_REQUEST["alumno"]){
                            fputcsv($nuevoFichero,$leido,";", ' ');
                        }
                        $contador++;
                    }
                    fclose($gestor);
                    fclose($nuevoFichero);
                    unlink("notas.csv");
                    rename($tmp,"notas.csv");
                    chmod("notas.csv",0777);
                }
                header('Location: ./notas.php');
                exit;
        }
        // CREAR NUEVO ALUMNO
        if (isset($_REQUEST["nuevo"])) {
            header('Location: ./modificar2.php');
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
        <!-- Carga la tabla  -->
        <?php
            $numeroAlumno = 1;
            if (($gestor = fopen("notas.csv", "r"))) {
                while (($datos = fgetcsv($gestor, filesize("notas.csv"), ";"))) {
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