
<form action="">
    <label for="pass">Pass:
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
    <label for="pass2">Repite Pass:
        <input type="password" name="pass2" id="pass2">
    </label>
    <p class="error">
        <?php
        if (isset($errores)) {
            errores($errores, "pass2");
        }
        ?>
    </p>
    <?php
        if (isset($errores)) {
            errores($errores, "igual");
            errores($errores, "update");
        }
        ?>
    <p class="error">
        <?php
        if (isset($errores)) {
            errores($errores, "validado");
        }
        ?>
    </p>
    <br>
    <input type="submit" name="Login_IniciarSesion" value="Inicia Sesion">
</form>