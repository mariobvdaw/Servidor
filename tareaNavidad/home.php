<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/header.css">
    <title>Tienda</title>
</head>

<body>
    <?php
    include("./fragmentos/header.php");
    ?>

    <?php
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
    }
    ?>

</body>

</html>