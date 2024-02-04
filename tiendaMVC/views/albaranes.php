<?php

if (isset($sms))
    echo $sms;

echo '<div class="container">';
echo '<h2>Albaranes</h2>';
echo '<table class="table table-bordered table-striped">';
echo '<thead class="thead-dark">';
echo '<tr>';
echo '<th>Código</th>';
echo '<th>Fecha</th>';
echo '<th>Cod_Producto</th>';
echo '<th>Cantidad</th>';
echo '<th>Usuario</th>';
if ($_SESSION['usuario']->perfil == "administrador") {
    echo '<th>Eliminar</th>';
}
echo '</tr>';
echo '</thead>';
echo '<tbody>';

foreach ($arr_albaranes as $albaran) {
    if ($albaran->activo == "1") {
        echo '<tr>';
        echo '<td>' . $albaran->id . '</td>';
        echo '<td>' . $albaran->fecha . '</td>';
        echo '<td>' . $albaran->cod_producto . '</td>';
        echo '<td>' . $albaran->cantidad . '</td>';
        echo '<td>' . $albaran->usuario . '</td>';
        if ($_SESSION['usuario']->perfil == "administrador") {
            echo '<td>';
            echo '<form action="" method="post">';
            echo '<input type="hidden" name="id" value="' . $albaran->id . '">';
            echo '<button type="submit" class="btn btn-danger btn-sm" name="Albaran_EliminarAlbaran">Eliminar</button>';
            echo '</form>';
            echo '</td>';
        }
        echo '</tr>';
    }
}

echo '</tbody>';
echo '</table>';
echo '</div>';
