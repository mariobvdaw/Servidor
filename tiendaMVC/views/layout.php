<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Tienda</title>
</head>

<body>
    <?php
    require(VIEW . 'fragmentos/header.php')
        ?>


    <main>

        <!-- VISTAS -->

        <?php
        if (isset($_SESSION['vista']))
            echo $_SESSION['vista'] . "<br>";
        if (isset($_SESSION['controller']))
            echo $_SESSION['controller'] . "<br>";
        if (!isset($_SESSION['vista'])) {
            require VIEW . 'home.php';
        } else {
            require $_SESSION['vista'];
        }
        ?>


    </main>

    <footer>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>