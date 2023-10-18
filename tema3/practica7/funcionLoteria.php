<?php
include("../../funcionesBasicas/funcionNumAle.php");
    function generaLoteria(){
        $loteria = array();
        $elegidos = array();
        $premios = array();
        rellenarArray($premios, 1, 50, 5);
        
        for ($i=1; $i < 51 ; $i++) { 
            array_push($loteria,$i);
        }
        // Comprueba elecciones completadas
        if (isset($_GET['e1'])) {
            array_push($elegidos,$_GET['e1']);
        } else{
            echo "La elección 1 está vacia <br>";
        }
        if (isset($_GET['e2'])) {
            array_push($elegidos,$_GET['e2']);
        }else{
            echo "La elección 2 está vacia <br>";
        }
        if (isset($_GET['e3'])) {
            array_push($elegidos,$_GET['e3']);
        }else{
            echo "La elección 3 está vacia <br>";
        }
        if (isset($_GET['e4'])) {
            array_push($elegidos,$_GET['e4']);
        }else{
            echo "La elección 4 está vacia <br>";
        }
        if (isset($_GET['e5'])) {
            array_push($elegidos,$_GET['e5']);
        }else{
            echo "La elección 5 está vacia <br>";
        }
      
        echo "<table>";
        echo "</tr>";            
        for ($i=0; $i < count($loteria); $i++) {             
            if ($i%7==0) {
                echo "</tr></tr>";            
            }

            if (in_array($loteria[$i],$elegidos) && in_array($loteria[$i],$premios)) {
                echo "<td class='acierto'>" . $loteria[$i] . "</td>"; // Acertado
            }else{
                if (in_array($loteria[$i],$elegidos)) {
                    echo "<td class='fallo'>" . $loteria[$i] . "</td>"; // Fallado
                } else {
                    if (in_array($loteria[$i],$premios)) {
                        echo "<td class='premio'>" . $loteria[$i] . "</td>"; // Resto de premios
                        
                    }else{
                        echo "<td>" . $loteria[$i] . "</td>";
                    }
                }                
            }
        }   
        echo "</table>";
    }
    function generaLoteria2(){
        $loteria = array();
        $elegidos = array();
        $premios = array();
        rellenarArray($premios, 1, 12, 2);
        
        for ($i=1; $i < 13 ; $i++) { 
            array_push($loteria,$i);
        }

        // Comprueba elecciones completadas
        if (isset($_GET['es1'])) {
            array_push($elegidos,$_GET['es1']);
        } else{
            echo "La elección especial 1 está vacia <br>";
        }
        if (isset($_GET['es2'])) {
            array_push($elegidos,$_GET['es2']);
        }else{
            echo "La elección especial 2 está vacia <br>";
        }
        
      
        echo "<table>";
        echo "</tr>";            
        for ($i=0; $i < count($loteria); $i++) {             
            if ($i%4==0) {
                echo "</tr></tr>";            
            }

            if (in_array($loteria[$i],$elegidos) && in_array($loteria[$i],$premios)) {
                echo "<td class='acierto'>" . $loteria[$i] . "</td>"; // Acertado
            }else{
                if (in_array($loteria[$i],$elegidos)) {
                    echo "<td class='fallo''>" . $loteria[$i] . "</td>"; // Fallado
                } else {
                    if (in_array($loteria[$i],$premios)) {
                        echo "<td class='premio'>" . $loteria[$i] . "</td>"; // Resto de premios
                        
                    }else{
                        echo "<td>" . $loteria[$i] . "</td>";
                    }
                }                
            }
        }   
        echo "</table>";
    }
   
?>

