<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escritura</title>
</head>
<body>
    <?php
        $fichero = $_REQUEST["fichero"];
        $existeAntes = file_exists("./".$fichero);
        if (isset($_REQUEST["volver"])) {
            header("Location: ./seleccionar.php");
            exit;
        } elseif(isset($_REQUEST["guardar"])) {
            if(!$fp = fopen("./".$fichero , "w")){
                echo "<br>Ha habido un error en la apertura del fichero";
            } else {
                if (!fwrite($fp, $_REQUEST["texto"], strlen($_REQUEST["texto"]))) {
                    echo "Error en la escritura";
                }
                fclose($fp);
            }


            header("Location: ./leer.php?fichero=".$fichero);
            exit;
        }

        if (file_exists("./".$fichero)) {
            $fichero = $_REQUEST["fichero"];
            if(!$fp = fopen("./".$fichero, "r")){
                echo "<br>Ha habido un error en la apertura del fichero";
            } else {
                $leido = fread($fp, filesize("./".$fichero));
                fclose($fp);
            }
        } else{
            echo "Creando nuevo fichero...";
            $nuevoFichero = tempnam("./",$fichero);
            if(!$ficheroAbierto= fopen($nuevoFichero,'w')){
                echo "Ha habido un problema al abrir el fichero";       
            }
            fclose($ficheroAbierto);
            rename($nuevoFichero,$fichero);
            chmod($fichero,0777);


        }
    ?>
    <form action="" method="get">
        <input name="fichero" type="hidden" value="<?php echo $fichero?>" />
        <textarea name="texto" id="texto" cols="50" rows="10"><?php if ($existeAntes) echo $leido;?></textarea>
        <input type="submit" name="volver" value="volver">
        <input type="submit" name="guardar" value="guardar">
    </form>
</body>
</html>