<header class="d-flex justify-content-between align-items-center bg-dark ps-2 pe-2 shadow">
    <form action="" method="post" class="d-flex align-items-end">
        <button type="submit" class="btn btn-link d-flex align-items-end" name="home">

            <?php
            echo '<img style="height:60px;" src="' . IMG . 'logo.png" alt="Imagen del logo">';
            ?>
            <h1 class="text-light">Tienda</h1>
        </button>
    </form>
    <nav class="">
        <?php
        if (validado()) {
            echo '<form action="" method="post">';
            echo '<input class="btn btn-outline-light ms-1 me-1" type="submit" name="Producto_ComprarProductos" value="Comprar">';
            if (isAdmin()) {
                echo '<input class="btn btn-outline-light ms-1 me-1" type="submit" name="Producto_VerAlmacen" value="Almacen">';
                echo '<input class="btn btn-outline-light ms-1 me-1" type="submit" name="Ventas_VerVentas" value="Ventas">';
                echo '<input class="btn btn-outline-light ms-1 me-1" type="submit" name="Albaranes_VerAlbaranes" value="Albaranes">';
                echo '</form>';

            }
        }
        ?>
    </nav>
    <div class="user">
        <?php
        if (validado()) {
            echo '<form action="" method="post">';

            echo '<input class="btn btn-link text-light" type="submit" name="User_verPerfil" value="Ver Perfil">';
            echo '<a class="btn btn-link  text-light" href="./views/logout.php">Cerrar sesion</a>';
            echo '</form>';

        } else {
            echo '<form action="" method="post">';
            echo '<input class="btn btn-outline-light" type="submit" name="login" value="Login">';
            echo '</form>';

        }
        ?>
    </div>

</header>