<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>MiPagina</title>
</head>
<body>
    
    <?php
        include("../fragmentos/header.html");
        echo "<main>";
        echo "Hola " . $_GET['nombre']. " y hola " . $_GET['nombre2'];
        echo "</main>";
        include("../fragmentos/footer.html");
    ?>
    
</body>
</html>
