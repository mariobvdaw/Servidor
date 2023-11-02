<?php
    
    // COMPROBAR SI EXISTE
    if (file_exists("./fichero.txt")) {
        echo "<h1>Lectura</h1>";
        // echo "Existe <br>";
        // ABRIR (y comprobar que no ha habido ningun fallo)
        if(!$fp = fopen("./fichero.txt", "r")){
            echo "<br>Ha habido un error en la apertura del fichero";
        } else {
            // LEER
            echo "<h3>Contenido del fichero:</h3>";
            $leido = fread($fp, filesize("./fichero.txt"));
            echo $leido;
            fclose($fp);
        }

        echo "";
    } else {
        echo "No existe";


    }

    /*
    // ESCRIBIR SOBRESCRIBIENDO AL COMPLETO
    if (file_exists("./fichero.txt")) {
        echo "<h1>Escritura con w <small>(borra todo el contenido que hubiera)</small></h1>";
        echo "<p>Existe </p>";
        // ABRIR (y comprobar que no ha habido ningun fallo)
        if(!$fp = fopen("./fichero.txt", "w")){
            echo "<br>Ha habido un error en la apertura del fichero";
        } else {
            // ESCRIBIR
            $texto = "Escribiendo...";
            if (!fwrite($fp, $texto, strlen($texto))) {
                echo "Error en la escritura";
            }
            fclose($fp);
        }

        echo "";
    } else {
        echo "No existe";


    }

    // ESCRIBIR AL FINAL
    if (file_exists("./fichero.txt")) {
        echo "<h1>Escritura con a <small>(añade el contenido al final)</small></h1>";
        echo "<p>Existe </p>";
        // ABRIR (y comprobar que no ha habido ningun fallo)
        if(!$fp = fopen("./fichero.txt", "a")){
            echo "<br>Ha habido un error en la apertura del fichero";
        } else {
            // ESCRIBIR
            $texto = "Escribiendo...";
            if (!fwrite($fp, $texto, strlen($texto))) {
                echo "Error en la escritura";
            }
            fclose($fp);
        }

        echo "";
    } else {
        echo "No existe";


    }

    // ESCRIBIR POR ENCIMA
    if (file_exists("./fichero.txt")) {
        echo "<h1>Escritura con c </h1>";
        echo "<p>Existe </p>";
        // ABRIR (y comprobar que no ha habido ningun fallo)
        if(!$fp = fopen("./fichero.txt", "c")){
            echo "<br>Ha habido un error en la apertura del fichero";
        } else {
            // ESCRIBIR
            $texto = "Usando la c...";
            if (!fwrite($fp, $texto, strlen($texto))) {
                echo "Error en la escritura";
            }
            fclose($fp);
        }

        echo "";
    } else {
        echo "No existe";


    }
    */

    // ESCRIBIR EN EL MEDIO
    if (file_exists("./fichero.txt")) {
        echo "<h1>Escritura con c </h1>";
        echo "<p>Existe </p>";
        // ABRIR (y comprobar que no ha habido ningun fallo)
        if(!$fp = fopen("./fichero.txt", "c")){
            echo "<br>Ha habido un error en la apertura del fichero";
        } else {
            // ESCRIBIR
            $texto = " medio ";
            fseek($fp, 20);
            if (!fwrite($fp, $texto, strlen($texto))) {
                echo "Error en la escritura";
            }
            fclose($fp);
        }

        echo "";
    } else {
        echo "No existe";


    }

    



?>