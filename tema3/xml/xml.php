<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            padding: 0;
        }
        td, th{
            border: 1px solid black;
            padding: 0 20px;
        }
    </style>
</head>
<body>
    

<?php
    // phpinfo();
    // echo "<pre>";

    // // LEER FICHERO XML CONOCIENDO EL NOMBRE DE LAS ETIQUETAS
    // if (file_exists('ficheroXML.xml')) {
    //     $xml = simplexml_load_file('ficheroXML.xml');
     
    //     print_r($xml);
    //     foreach ($xml as $key => $elemento) {
    //         echo "<br><br>Id coche: " . $elemento["id"];
    //         echo "<br> Marca coche: " . $elemento->marca;
    //         echo "<br> Modelo coche: " . $elemento->modelo;
    //         // echo "<br> Modelo coche: " . $elemento->color;
    //         // foreach ($elemento as $key2 => $value2) {
    //         //     echo "<br>" . $value2;
    //         // }
    //     }
    // } else {
    //     exit('Error abriendo ficheroXML.xml.');
    // }




    // // LEER EL FICHERO XML SIN CONOCER EL NOMBRE DE LAS ETIQUETAS
    // echo "<br>";
    // echo "<br>";

    // function leerElemento($elemento){
    //     foreach ($elemento->children() as $key => $valor) {
    //         echo $key . ": " . $valor . "<br>";
    //     }
    //     // echo $elemento->children()[1];

    // }
    
    // if (file_exists('ficheroXML.xml')) {
    //     $xml = simplexml_load_file('ficheroXML.xml');
     
    //     print_r($xml);
    //     foreach ($xml as $key => $elemento) {
    //         leerElemento($elemento);
    //         echo "<br>";
            
            
    //     }
    // } else {
    //     exit('Error abriendo ficheroXML.xml.');
    // }


    // ESCRIBIR XML CON simpleXML

    $xml = new SimpleXMLElement("<juegos></juegos>");
    print_r($xml);
    $juego1 = $xml->addChild("juego");
    $juego1->addChild("nombre", "Fifa");
    $juego1->addAttribute("id", "1");
    $juego1->addAttribute("disponible", "si");
    $dispositivos1 = $juego1->addChild("dispositivos");
    $dispositivos1->addChild("dispositivo", "xbox");
    $dispositivos1->addChild("dispositivo", "play");

    $juego2 = $xml->addChild("juego");
    $juego2->addChild("nombre", "GTA");    
    $juego2->addAttribute("id", "2");
    $juego2->addAttribute("disponible", "no");
    $dispositivos2 = $juego2->addChild("dispositivos");
    $dispositivos2->addChild("dispositivo", "play");

    $juego3 = $xml->addChild("juego");
    $juego3->addChild("nombre", "Tetris");    
    $juego3->addAttribute("id", "3");
    $juego3->addAttribute("disponible", "si");
    $dispositivos3 = $juego3->addChild("dispositivos");
    $dispositivos3->addChild("dispositivo", "pc");
    $dispositivos3->addChild("dispositivo", "movil");
    $dispositivos3->addChild("dispositivo", "play");


    $xml->asXML("juegos.xml"); // GUARDA EL XML EN UN FICHERO (lo sobrescribe si existe)
    chmod("juegos.xml", 0777);

    function leerElemento($elemento){
        foreach ($elemento->children() as $key => $valor) {
            echo $key . ": " . $valor . "<br>";
        }
        // echo $elemento->children()[1];

    }
    
    if (file_exists('juegos.xml')) {
        $xml = simplexml_load_file('juegos.xml');
        echo "<pre>";     
        print_r($xml);
        echo "</pre>";

        // CREAR TABLA
        echo "<table>";
        echo "<tr>";        
        echo "<th>";
        echo "Juego";
        echo "</th>";
        echo "<th>";
        echo "Id";
        echo "</th>";
        echo "<th>";
        echo "Disponible";
        echo "</th>";
        echo "<th>";
        echo "Dispositivos";
        echo "</th>";
        echo "</tr>";


        foreach ($xml as $key => $juego) {
            // if ($juego["disponible"]=="si") {
                echo "<tr>";
                echo "<td>";
                    echo $juego->nombre;
                echo "</td>";
                echo "<td>";
                    echo $juego["id"];
                echo "</td>";
                echo "<td>";
                    echo $juego["disponible"];
                echo "</td>";
                echo "<td>";
                echo "<ul>";
                foreach ($juego->dispositivos as $key => $dispositivos) {
                    foreach ($dispositivos as $dispositivo) {
                        echo "<li>";
                        echo $dispositivo;
                        echo "</li>";
                    }
                }
              
                echo "<ul>";
                echo "</td>";

                echo "<tr>";
            // }
            
            
            
        }

        echo "</table>";
        
        
        
        // CAMBIAR DISPONIBILIDAD

        foreach ($xml as $key => $juego) {
            if ($juego["disponible"]=="si") {
                cambioDisponible($juego["id"]);
            } 
            
        }

    } else {
        exit('Error abriendo juegos.xml.');
    }



    function cambioDisponible($id){
        $xml = simplexml_load_file('juegos.xml');
        // echo "El juego " . $id . " esta disponible";
        foreach ($xml as $key => $juego) {
            if ($juego[0]["id"]==$id) {
                if ($juego[0]["disponible" == "si"]) {
                    $juego[0]["disponible"] = "no";
                } else {
                    $juego[0]["disponible"] = "si";

                }
                
            }
            
        }
        $xml->asXML("juegos.xml"); // GUARDA EL XML EN UN FICHERO (lo sobrescribe si existe)
        chmod("juegos.xml", 0777);
    }

  

    ?>
        </table>

    </body>
</html>