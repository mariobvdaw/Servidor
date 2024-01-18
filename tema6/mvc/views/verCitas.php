
<?php

$arrayCitas = CitaDAO::findByPaciente($_SESSION['usuario']);
$arrayCitas_pasadas = CitaDAO::findByPacienteH($_SESSION['usuario']);



?>
<h2>Citas</h2>
<table>
    <thead>
        <th>Especialista</th>
        <th>Fecha</th>
        <th>Ver</th>
        <th>Cancelar</th>
    </thead>
    <?php
    foreach ($arrayCitas as $cita) {
        echo '<tr>';
        echo '<form method="post">';
        echo '<td>' . $cita->especialista . '</td>';
        echo '<td>' . $cita->fecha . '</td>';
        echo '<input type="hidden" name="id" value="' . $cita->id . '">';
        echo '<input type="submit" name="User_verPerfil" value="Ver Perfil">';
        echo '<input type="submit" name="logout" value="Cerrar Sesión">';
        echo '</form>';
        echo '</tr>';
    }
    ?>
</table>
<h2>Citas Pasadas</h2>
<table>
    <thead>
        <th>Especialista</th>
        <th>Fecha</th>
        <th>Ver</th>
        <th>Cancelar</th>
    </thead>
    <?php
    foreach ($arrayCitas_pasadas as $cita) {
        echo '<tr>';
        echo '<form method="post">';
        echo '<td>' . $cita->especialista . '</td>';
        echo '<td>' . $cita->fecha . '</td>';
        echo '<input type="hidden" name="id" value="' . $cita->id . '">';
        echo '<input type="submit" name="User_verPerfil" value="Ver Perfil">';
        echo '<input type="submit" name="logout" value="Cerrar Sesión">';
        echo '</form>';
        echo '</tr>';
    }
    ?>
</table>