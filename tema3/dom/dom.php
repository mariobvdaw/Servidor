<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOM</title>
</head>
<body>
    

    <?php
        // ESCRIBIR
        $dom = new DOMDocument("1.0", "utf-8");
        $raiz = $dom->appendChild($dom->createElement("instrumentos"));
        $instrumento = $dom->createElement("instrumento");
        $nombre = $dom->createElement("nombre", "guitarra");
        $familia = $dom->createElement("familia", "cuerda");
        $anios = $dom->createElement("antigüedad", "5 años");
        $raiz->appendChild($instrumento);
        $instrumento->appendChild($nombre);
        $instrumento->appendChild($familia);
        $instrumento->appendChild($anios);
        $instrumento->setAttribute("id", "1");

        // FORMA MÁS CORTA
        $instrumento = $raiz->appendChild($dom->createElement("instrumento"));
        $instrumento->setAttribute("id", "2");
        $instrumento->appendChild($dom->createElement("nombre", "violin"));
        $instrumento->appendChild($dom->createElement("familia", "cuerda"));




        $dom->formatOutput = true; // LE DA FORMATO Y ORDENA LA ESTRUCTURA XML

        $dom->save("instrumentos.xml");

        chmod("instrumentos.xml", 0777);

        // LEER

        // $dom->load("instrumentos.xml");
        // echo "<pre>";
        // print_r($dom);
        // foreach ($dom->childNodes as $instrumentos) {
        //     foreach ($instrumentos->childNodes as $instrumento) {
        //             echo "\nNombre" . $instrumento->firstChild->nodeValue; // DOMElement

        //             echo "\nNombre" . $instrumento->firstChild->firstChild->data; //DOMText

        //         echo "";
        //     }
        // }

            $dom->load("instrumentos.xml");
            echo "<pre>";
            // print_r($dom);
            foreach ($dom->childNodes as $instrumentoLista) {
                foreach ($instrumentoLista->childNodes as $instrumento) {
                    if ($instrumento->nodeType == 1) {
                        echo "\nInstrumento nº " . $instrumento->getAttribute("id");
                        $nodo = $instrumento->firstChild;
                        if ($instrumento->nodeType == 1) {
                            do {
                                if ($nodo->nodeType == 1) {
                                    echo "\n" . $nodo->tagName . ": " . $nodo->nodeValue;
                                }
                            } while ($nodo = $nodo->nextSibling);
                        }
                    }
                    echo "";
                }
            }

            $instrumentoLista = $dom->getElementsByTagName("instrumento");
            // print_r($instrumentoLista);
            echo "<br>";
            foreach ($instrumentoLista as $instrumento) {
                // print_r($instrumento);
                $a = $instrumento->getElementsByTagName("nombre");
                echo "\n" . $a->item(0)->tagName. ":" . $a->item(0)->nodeValue;
                $b = $instrumento->getElementsByTagName("familia");
                echo "\n" . $b->item(0)->tagName. ":" . $b->item(0)->nodeValue;


            }

    ?>
    <br>
    <a href="./descarga.php">Descargar</a>
</body>
</html>