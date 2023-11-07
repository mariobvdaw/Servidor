<!DOCTYPE html>
<html lang="eS">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccion</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <?php
        $errores ="";
        if (isset($_REQUEST["fichero"]) && ($_REQUEST["fichero"])=="") {
            $errores = "<p class='error'>Rellena el campo del fichero</p>";
        } elseif(isset($_REQUEST["fichero"])){
            $fichero = $_REQUEST["fichero"];

            if (isset($_REQUEST["leer"])) {
                if (file_exists("./".$fichero)) {
                    header("refresh:2;url=./leer.php?fichero=" . $fichero);
                } else{
                    $errores = "<p class='error'>El fichero no existe</p>";
                }
            }elseif (isset($_REQUEST["escribir"])) {
                header("Location: ./escribir.php?fichero=" . $fichero);
                
            }
        }
    ?>
    <form action="" method="get">
        <label for="fichero">Nombre del fichero
            <input type="text" name="fichero" id="fichero">
        </label>
        <?php echo $errores?>
        <br>
        <input type="submit" name="leer" value="leer">
        <input type="submit" name="escribir" value="escribir">
    </form>
</body>
</html>