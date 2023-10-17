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

        $PuntosZamora=0;
        $PuntosSalamanca=0;
        $PuntosAvila=0;
        $PuntosValladolid=0;
        $GolesFZamora=0;
        $GolesFSalamanca=0;
        $GolesFAvila=0;
        $GolesFValladolid=0;
        $GolesCZamora=0;
        $GolesCSalamanca=0;
        $GolesCAvila=0;
        $GolesCValladolid=0;

        foreach ($liga as $key => $equipo) {
            foreach ($equipo as $rival => $partido) {             
                foreach ($partido as $suceso => $cantidad) {
                    
                    if ($suceso==="Resultado") {
                        ${"GolesF$key"}+=intval(substr($cantidad,0,1));
                        ${"GolesC$rival"}+=intval(substr($cantidad,0,1));
                        ${"GolesF$rival"}+=intval(substr($cantidad,2,1));
                        ${"GolesC$key"}+=intval(substr($cantidad,2,1));
                        if (intval(substr($cantidad,0,1))>intval(substr($cantidad,2,1))) {
                            ${"Puntos$key"}+=3;
                        } else if(intval(substr($cantidad,2,1))>intval(substr($cantidad,0,1))) {
                            ${"Puntos$rival"}+=3;
                        } else{
                            ${"Puntos$key"}+=1;
                            ${"Puntos$rival"}+=1;
                        }
                        
                    }
                }
            }
        }
        ?>

        <table>
            <tr>
                <th>Equipos</th>
                <th>Puntos</th>
                <th>Goles a favor</th>
                <th>Goles en contra</th>
            </tr>
            
                <?php
                    foreach ($liga as $key => $equipo) {
                        echo "<tr>";
                        echo "<th>";
                        echo $key;
                        echo "</th>";
                        echo "<td>";
                        echo ${"Puntos$key"};
                        echo "</td>";
                        echo "<td>";
                        echo ${"GolesF$key"};
                        echo "</td>";
                        echo "<td>";
                        echo ${"GolesC$key"};
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>

        </table>
</body>
</html>
