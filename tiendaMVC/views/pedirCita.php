<?php


?>


<form action="">
    <label for="especialista">Especialista:
        <input type="text" name="especialista" id="especialista">
    </label>
    <p class="error">
        <?php
        if (isset($errores)) {
            errores($errores, "especialista");
        }
        ?>
    </p>
    <br>
    <label for="fecha">Fecha:
        <input type="date" name="fecha" id="fecha">
    </label>
    <p class="error">
        <?php
        if (isset($errores)) {
            errores($errores, "fecha");
        }
        ?>
    </p>
    <br>
    <label for="motivo">Motivo:
        <textarea name="motivo" id="motivo" cols="30" rows="10"></textarea>
    </label>
    <p class="error">
        <?php
        if (isset($errores)) {
            errores($errores, "motivo");
        }
        ?>
    </p>

    <p class="error">
        <?php
        if (isset($errores)) {
            errores($errores, "insertar");
        }
        ?>
    </p>
    <br>
    <input type="submit" name="Cita_GuardaCita" value="Guardar">
</form>