<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transforma</title>
</head>

<body>
    <!-- CON XML -->
    <?php
    

    // LEER FICHERO CSV Y GUARDAR LOS DATOS EN XML
    $xml = new SimpleXMLElement("<notas></notas>");
    if (($gestor = fopen("notas.csv", "r"))) {
        while (($datos = fgetcsv($gestor, filesize("notas.csv"), ";"))) {
            $numero = count($datos);
            $datosAlumno = array();
            $alumno = $xml->addChild("alumno");
            for ($c = 0; $c < $numero; $c++) {
                array_push($datosAlumno, $datos[$c]);
            }
            $alumno->addChild("nombre", $datosAlumno[0]);
            $alumno->addChild("nota1", $datosAlumno[1]);
            $alumno->addChild("nota2", $datosAlumno[2]);
            $alumno->addChild("nota3", $datosAlumno[3]);
        }
        fclose($gestor);
    }

    $xml->asXML("notas.xml");
    chmod("notas.xml", 0777);
    ?>

    <h1>Notas</h1>
    <table>
        <tr>
            <th>Alumno</th>
            <th>Nota 1</th>
            <th>Nota 2</th>
            <th>Nota 3</th>
            <th>Editar</th>
        </tr>


        <?php
        // RELLENAR LA TABLA
        $xml = simplexml_load_file('notas.xml');
        foreach ($xml as $alumno) {
            echo "<tr>";
            foreach ($alumno as $datos) {
                echo "<td>" . $datos . "</td>";
            }
            echo "</tr>";

        }

        ?>


</body>

</html>