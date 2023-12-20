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
        
        foreach ($liga as $key => $equipo) {
            foreach ($equipo as $rival => $partido) {                    
                    $resultados=$partido["Resultado"];
                    $paginas = explode("-",$resultados);
                    if (intval($paginas[0])>intval($paginas[1])) {
                        if (!isset($clasificacion[$key]["Puntos"])) {
                            $clasificacion[$key]["Puntos"]=3;
                        } else {
                            $clasificacion[$key]["Puntos"]+=3;
                        }
                    } else if(intval($paginas[0])<intval($paginas[1])) {
                        if (!isset($clasificacion[$rival]["Puntos"])) {
                            $clasificacion[$rival]["Puntos"]=3;
                        } else {
                            $clasificacion[$rival]["Puntos"]+=3;
                        }                        
                    } else{
                        if (!isset($clasificacion[$key]["Puntos"])) {
                            $clasificacion[$key]["Puntos"]=1;
                        } else {
                            $clasificacion[$key]["Puntos"]+=1;
                        }
                        if (!isset($clasificacion[$rival]["Puntos"])) {
                            $clasificacion[$rival]["Puntos"]=1;
                        } else {
                            $clasificacion[$rival]["Puntos"]+=1;
                        }
                    }
                    if (!isset($clasificacion[$key]["GolesF"])) {
                        $clasificacion[$key]["GolesF"]=$paginas[0];
                    } else {
                        $clasificacion[$key]["GolesF"]+=$paginas[0];
                    }
                    if (!isset($clasificacion[$key]["GolesC"])) {
                        $clasificacion[$key]["GolesC"]=$paginas[1];
                    } else {
                        $clasificacion[$key]["GolesC"]+=$paginas[1];
                    }
                    if (!isset($clasificacion[$rival]["GolesF"])) {
                        $clasificacion[$rival]["GolesF"]=$paginas[1];
                    } else {
                        $clasificacion[$rival]["GolesF"]+=$paginas[1];
                    }

                    if (!isset($clasificacion[$rival]["GolesC"])) {
                        $clasificacion[$rival]["GolesC"]=$paginas[0];
                    } else {
                        $clasificacion[$rival]["GolesC"]+=$paginas[0];
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
                    foreach ($clasificacion as $equipo => $resultados) {
                        echo "<tr>";
                        echo "<th>";
                        echo $equipo;
                        echo "</th>";
                        echo "<td>";
                        echo $clasificacion[$equipo]["Puntos"];
                        echo "</td>";
                        echo "<td>";
                        echo $clasificacion[$equipo]["GolesF"];
                        echo "</td>";
                        echo "<td>";
                        echo $clasificacion[$equipo]["GolesC"];
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>

        </table>
</body>
</html>
