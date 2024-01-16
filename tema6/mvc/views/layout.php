<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header style="background-color: #444;color: white;display: flex;align-items: center; justify-content: space-around;">
        <div>
            <form action="" method="post">
                <input type="submit" name="home" value="Home">
            </form>
        </div>
        <h1>Pagina Web de Mario</h1>
        <nav>
            <div>
                <form action="" method="post">
                    <input type="submit" name="login" value="Login">
                </form>
            </div>
        </nav>
    </header>

    <main>

        <!-- VISTAS -->

        <?php
        if (!isset($_SESSION['vista'])) {
            require VIEW.'home.php';
        } else {
            require $_SESSION['vista'];
        }
        ?>


    </main>

    <footer>
        &copy;
    </footer>

</body>

</html>