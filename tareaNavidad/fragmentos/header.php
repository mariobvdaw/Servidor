<header>
    <a href="./home.php" class="logo">
        <img src="./imagenes/logo.png" alt="Imagen del logo">
        <h1>Tienda</h1>
    </a>
    <nav class="navegacion">
        <?php
        session_start();
        if (isset($_SESSION["usuario"])) {
            // print_r($_SESSION["usuario"]);
            echo '<a href="./comprar.php">Comprar</a>';
            if ($_SESSION["usuario"]["perfil"] != "cliente") {
                echo '<a href="./almacen.php">Almacen</a>';
                echo '<a href="./ventas.php">Ventas</a>';
                echo '<a href="./albaranes.php">Albaranes</a>';
            }
        }
        ?>
    </nav>
    <div class="user">
        <?php
        if (isset($_SESSION["usuario"])) {
            echo '<a href="./perfil.php">Ver perfil</a>';
            echo '<a href="./logout.php">Cerrar sesion</a>';

        } else {
            echo '<a href="./login.php">Login</a>';

        }
        ?>
    </div>

</header>