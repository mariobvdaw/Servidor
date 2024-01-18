<h1>Registro</h1>

<form action="">
    <label for="cod">codUsuario:
        <input type="text" name="cod" id="cod">
    </label>
    <p class="error">
        <?php
        if (isset($errores)) {
            errores($errores, "cod");
        }
        ?>
    </p>
    <br>
    <label for="desc">descUsuario:
        <input type="text" name="desc" id="desc">
    </label>
    <p class="error">
        <?php
        if (isset($errores)) {
            errores($errores, "desc");
        }
        ?>
    </p>
    <br>
    <label for="pass">Contraseña:
        <input type="password" name="pass" id="pass">
    </label>
    <p class="error">
        <?php
        if (isset($errores)) {
            errores($errores, "pass");
        }
        ?>
    </p>
    <br>
    <label for="pass2">Repetir Contraseña:
        <input type="password" name="pass2" id="pass2">
    </label>
    <p class="error">
        <?php
        if (isset($errores)) {
            errores($errores, "pass2");
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
    <p class="error">
        <?php
        if (isset($errores)) {
            errores($errores, "registro");
        }
        ?>
    </p>
    <br>
    <input type="submit" name="Login_GuardaRegistro" value="Registrarme">
</form>