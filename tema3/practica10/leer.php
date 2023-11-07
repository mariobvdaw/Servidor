<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lectura</title>
</head>
<body>
    <?php
        $fichero = $_REQUEST["fichero"];
            if(!$fp = fopen("./".$fichero, "r")){
                echo "<br>Ha habido un error en la apertura del fichero";
            } else {
                $leido = fread($fp, filesize("./".$fichero));
                fclose($fp);
            }
            if (isset($_REQUEST["volver"])) {
                header("Location: ./seleccionar.php");
            } elseif(isset($_REQUEST["modificar"])) {
                header("Location: ./escribir.php?fichero=".$fichero);
            }
            
    ?>
    <form action="" method="get">
        <input name="fichero" type="hidden" value="<?php echo $fichero?>" />
        <textarea name="texto" id="texto" cols="50" rows="10" disabled><?php echo $leido?></textarea>
        <input type="submit" name="volver" value="volver">
        <input type="submit" name="modificar" value="modificar">
    </form>

</body>
</html>