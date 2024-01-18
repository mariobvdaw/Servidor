
<form action="">
    <label for="cod">codUsuario:
        <input type="text" readonly name="cod" id="cod" value="<?php echo $_SESSION['usuario']->codUsuario?>">
    </label>
    <br>
    <br>
    <label for="nombre">descUsuario:
        <input type="text" name="nombre" id="nombre" value="<?php echo $_SESSION['usuario']->descUsuario?>">
    </label>
    <br>
    <br>
    <label for="fecha">Fecha Ultima Conexion:
        <input type="text" readonly name="fecha" id="fecha" value="<?php echo $_SESSION['usuario']->fechaUltimaConexion?>">
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