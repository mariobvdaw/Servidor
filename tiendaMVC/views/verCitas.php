<?php

if (isset($sms)) {
    echo $sms;
}

?>
<h2>Citas</h2>
<table>
    <thead>
        <th>Especialista</th>
        <th>Fecha</th>
        <?php
        if (isAdmin() && isset($_REQUEST['Citas_verTodasCitas'])) {
            echo '<th>Paciente</th>';
        }
        ?>
        <th>Ver</th>
        <th>Cancelar</th>
    </thead>
    <?php
    foreach ($arrayCitas as $cita) {
        echo '<tr>';
        echo '<form method="post">';
        echo '<td>' . $cita->especialista . '</td>';
        echo '<td>' . $cita->fecha . '</td>';
        if (isAdmin() && isset($_REQUEST['Citas_verTodasCitas'])) {
            echo '<td>' . $cita->paciente . '</td>';
        }
        echo '<input type="hidden" name="id" value="' . $cita->id . '">';
        echo '<td><input type="submit" name="Cita_verCita" value="Ver Cita"></td>';
        echo '<td><input type="submit" name="Cita_borrarCita" value="Cancelar Cita"></td>';
        echo '</form>';
        echo '</tr>';
    }
    ?>
</table>

<form action="">
    <input type="submit" name="Cita_Pedir" value="Pedir cita">
    <input type="submit" name="Cita_verAnterior" value="Ver citas Anteriores">
</form>