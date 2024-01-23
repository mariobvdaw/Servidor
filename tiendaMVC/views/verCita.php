<?php


if (isAdmin()) {
    ?>
    <p>Paciente:
        <?php echo $cita->paciente ?>
    </p>
    <?php
}
?>
<p>Especialista:
    <?php
    echo $cita->especialista ?>
</p>
<p>Fecha:
    <?php echo $cita->fecha ?>
</p>
<p>Estado:
    <?php
    if ($cita->activo == 1) {
        echo "Activo";
    } else {
        echo "Inactivo";
    } ?>
</p>