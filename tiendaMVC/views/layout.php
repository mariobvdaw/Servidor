<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header
        style="margin-bottom: 20px; background-color: #444;color: white;display: flex;align-items: center; justify-content: space-around;">
        <div>
            <form action="" method="post">
                <input type="submit" name="home" value="Home">
            </form>
        </div>
        <h1>Pagina Web de Mario</h1>
        <nav>
            <div>
                <?php
                if (validado()) {
                    echo "Bienvenido " . $_SESSION['usuario']->descUsuario;
                    // print_r($_SESSION['usuario']);
                    if (isAdmin()) {
                        echo '<form action="" method="post">';
                        echo '<input type="submit" name="Citas_verTodasCitas" value="Ver todas las Citas">';
                        echo '</form>';
                    }
                    ?>
                    <form action="" method="post">
                        <input type="submit" name="Citas_verCitas" value="Citas">
                        <input type="submit" name="User_verPerfil" value="Ver Perfil">
                        <input type="submit" name="logout" value="Cerrar Sesión">
                    </form>
                    <?php

                } else {
                    ?>
                    <form action="" method="post">
                        <input type="submit" name="login" value="Login">
                    </form>
                    <?php
                }
                ?>
            </div>
        </nav>
    </header>

    <main>

        <!-- VISTAS -->

        <?php
        if (!isset($_SESSION['vista'])) {
            require VIEW . 'home.php';
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