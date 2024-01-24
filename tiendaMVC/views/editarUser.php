<h2>Editar Usuario</h2>
<form action="" method="post">
    <label for="user">Usuario:
        <input type="text" readonly name="user" id="user" value="<?php echo $_SESSION['usuario']->user?>">
    </label>
    <br>
    <br>
    <label for="email">Email:
        <input type="email" name="email" id="email" value="<?php echo $_SESSION['usuario']->email?>">
    </label>
    <br>
    <br>
    <label for="fecha">Fecha de Nacimiento:
        <input type="text" name="fecha" id="fecha" value="<?php echo $_SESSION['usuario']->fechaNacimiento?>">
    </label>
    <br>
    <br>
    <label for="perfil">Perfil:
        <input type="text" readonly name="perfil" id="perfil" value="<?php echo $_SESSION['usuario']->perfil?>">
    </label>
    <br>
    <br>
    <p class="error">
        <?php
        if (isset($errores)) {
            errores($errores, "nombre");
        }
        ?>
    </p>
    <p class="error">
        <?php
        if (isset($errores)) {
            errores($errores, "update");
        }
        ?>
    </p>
    <p class="error">
        <?php
        if (isset($errores)) {
            errores($errores, "validado");
        }
        ?>
    </p>
    <br>
    <input type="submit" name="User_Guardar" value="Guardar Cambios">
    <input type="submit" name="User_CambiaContraseña" value="Cambiar Contraseña">
</form>