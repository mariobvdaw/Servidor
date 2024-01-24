<header>
    <a href="./index.php?home" class="logo">
        <?php
        echo '<img src="' . IMG . 'logo.png" alt="Imagen del logo">';
        ?>
        <h1>Tienda</h1>
    </a>
    <nav class="navegacion">
        <?php
        if (validado()) {
            // print_r($_SESSION["usuario"]);
            echo '<form action="" method="post">';
            echo '<input type="submit" name="login" value="Comprar">';
            if (isAdmin()) {
                echo '<input type="submit" name="login" value="Almacen">';
                echo '<input type="submit" name="login" value="Ventas">';
                echo '<input type="submit" name="login" value="Albaranes">';
                echo '</form>';

            }
        }
        ?>
    </nav>
    <div class="user">
        <?php
        if (validado()) {
            echo '<form action="" method="post">';

            echo '<input type="submit" name="User_verPerfil" value="Ver Perfil">';
            echo '<a href="./views/logout.php">Cerrar sesion</a>';
            echo '</form>';

        } else {
            echo '<form action="" method="post">';
            echo '<input type="submit" name="login" value="Login">';
            echo '</form>';

        }
        ?>
    </div>

</header>