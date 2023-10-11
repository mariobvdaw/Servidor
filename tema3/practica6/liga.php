<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liga</title>

</head>
<body>
    <?php
        $liga =
        array(
            "Zamora" =>  array(
                "Salamanca" => array(
                    "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
                ),
                "Avila" => array(
                    "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
                ),
                "Valladolid" => array(
                    "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 1, "Penalti" => 1
                )
            ),
            "Salamanca" =>  array(
                "Zamora" => array(
                    "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
                ),
                "Avila" => array(
                    "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
                ),
                "Valladolid" => array(
                    "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 2, "Penalti" => 1
                )
            ),
            "Avila" =>  array(
                "Zamora" => array(
                    "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 2
                ),
                "Salamanca" => array(
                    "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 3, "Penalti" => 0
                ),
                "Valladolid" => array(
                    "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 0, "Penalti" => 1
                )
            ),
            "Valladolid" =>  array(
                "Zamora" => array(
                    "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
                ),
                "Salamanca" => array(
                    "Resultado" => "3-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
                ),
                "Avila" => array(
                    "Resultado" => "1-1", "Roja" => 1, "Amarilla" => 1, "Penalti" => 2
                )
            ),
        );
        // foreach ($liga as $key => $equipo) {
        //     foreach ($equipo as $rival => $partido) {
        //             echo $key."-";
        //             echo $rival;
        //         foreach ($partido as $suceso => $cantidad) {
        //             // echo $key;
        //             // echo $rival;
        //             // print_r($suceso);
        //             // echo "&nbsp";
        //             // print_r($cantidad);
        //             // echo "&nbsp";
        //         }
        //         echo "<br>";
        //     }

        // }
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";
        ?>

        <table>
            <tr>
                <th>Equipos</th>
                <?php
                $Zamora="Zamora";
                $Salamanca="Salamanca";
                $Valladolid="Valladolid";
                $Avila="Avila";
                    foreach ($liga as $key => $equipo) {
                        echo "<th>";
                        echo $key;
                        echo "</th>";
                    }
                ?>
            </tr>
                <?php
                $cont1=0;
                    foreach ($liga as $key => $equipo) {
                        echo "<tr>";
                        echo "<th>";
                        echo $$key;
                        echo "</th>";
                        $cont2=0;
                        foreach ($equipo as $rival => $partido) {
                            if ($cont1==$cont2) {
                                echo "<td></td>";
                            }
                            echo "<td>";
                            $contS=0;
                            foreach ($partido as $suceso => $cantidad) {
                                echo($cantidad);
                                echo "&nbsp";
                                $contS++;

                            }
                            echo "</td>";
                        
                        $cont2++;
                        }
                        echo "</tr>";
                        $cont1++;
                    }
                ?>

        </table>
</body>
</html>
