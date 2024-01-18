<?php
if (isset($sms)) {
    echo $sms;
} ?>

<form action="">
    <label for="nombre">Nombre:
        <input type="text" name="nombre" id="nombre">
    </label>
    <p class="error">
        <?php
        if (isset($errores)) {
            errores($errores, "nombre");
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
    <p class="error">
        <?php
        if (isset($errores)) {
            errores($errores, "validado");
        }
        ?>
    </p>
    <br>
    <input type="submit" name="Login_IniciarSesion" value="Inicia Sesion">
    <input type="submit" name="Login_Registro" value="Registrarme">
</form>