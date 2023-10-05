<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/estilo.css">
    <title>PR03</title>
</head>
<body>
    <?php
            include("../../fragmentos/header.html");
    ?>
    <main>
        <ul>
            <li><a href="./ejercicio1.php">Ejercicio 1</a></li>
            <li><a href="./ejercicio2.php?variable=prueba">Ejercicio 2 (variable = prueba)</a></li>
            <li><a href="./ejercicio2.php?variable=1">Ejercicio 2 (variable = 1)</a></li>
            <li><a href="./ejercicio3.php?anio=2023&mes=10&dia=3">Ejercicio 3</a></li>
            <li><a href="./ejercicio4.php?anio1=2000&mes1=3&dia1=16&anio2=2010&mes2=6&dia2=18">Ejercicio 4</a></li>
        
        </ul>
    </main>
    
    <?php
            include("../../fragmentos/footer.html");
    ?>

</body>
</html>