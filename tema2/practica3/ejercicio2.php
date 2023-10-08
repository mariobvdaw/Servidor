<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Ejercicio 2</title>
</head>
<body>
    
    <?php
            include("./fragmentos/header.html");
    ?>

    <main>
        <h1>Ejercicio 2</h1>
        
        <div class="enunciado">
            <h2>Enunciado:</h2>
            <p class="enunciado">
                Crea una página a la que se le pase por url una variable con el nombre que quieras y muestre el valor de la variable, el tipo, si es numérico o no y si lo es, si es entero o float. (No hace falta usar if)
            </p>
        </div>

        <div class="ejercicio">
            <?php
                $variable=$_GET['variable'];
                
                echo "<br>Valor: " . $variable;
                echo "<br>Tipo: " . gettype($variable);
                echo "<br>Es numerico: " . is_numeric($variable);        
            ?>
        </div>
   
    </main>
    
    <?php
        echo "<p><a href='http://" . $_SERVER['SERVER_ADDR'] . "./verCodigo.php?fichero=".$_SERVER['SCRIPT_FILENAME']."'>Ver codigo</a></p>";
        include("./fragmentos/footer.html");
    ?>
    
</body>
</html>
