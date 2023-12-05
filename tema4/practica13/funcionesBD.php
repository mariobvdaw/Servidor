<?php
require("./conexionBD.php");

function cargarTabla()
{
    try {
        $con = mysqli_connect(IP, USER, PASS, "banco");

        $sql = "select * from clientes";

        $result = mysqli_query($con, $sql);

        echo '<table>';
        // echo "<tr>";
        // echo "<th>Nombre</th>";
        // echo "<th>Edad</th>";
        // echo "<th>Id</th>";
        // echo "<tr>";
        // CARGAR DATOS DE LA TABLA
        while ($fila = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($fila as $valor) {
                echo "<td>";
                echo $valor;
                echo "</td>";
            }
            echo '<form action="">';
            echo '<td>';
            echo '<input type="submit" name="enviar" value="modificar">';
            echo '</td>';
            echo '<td>';
            echo '<input type="submit" name="enviar" value="eliminar">';
            echo '</td>';
            echo '<input type="hidden" name="id" value="">';
            echo '</form>';
            echo '</tr>';

        }

        echo "</table>";

        echo '<form action="">';
        echo '<input type="submit" name="enviar" value="nuevo">';
        echo '</form>';



        mysqli_close($con);

    } catch (\Throwable $th) {

        switch ($th->getCode()) {
            // ERRORES CONEXION
            case '2002':
                echo "Dirección de servidor erronea";
                break;
            case '1045':
                echo "Usuario o contraseña no válidos";
                break;

            case '1049':
                echo "<p>La base de datos no existe ¿Quieres crearla? </p>";
                echo '<form action=""><input type="submit" name="crear" value="crear"></form>';
                break;


            // ERRORES CONSULTAS
            case '1062':
                echo "Id duplicado";
                break;

            default:
                echo $th->getMessage();
        }
    }

}


function crearBase()
{
    $con = new mysqli();

    try {
        $con->connect(IP, USER, PASS);

        // CARGA SCRIPT
        $script = file_get_contents("./banco.sql");
        $con->multi_query($script);
        do {
            $con->store_result();
            if (!$con->next_result()) {
                break;
            }
        } while (true);

        $con->close();

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            // ERRORES CONEXION
            case '2002':
                echo "Dirección de servidor erronea";
                break;
            case '1045':
                echo "Usuario o contraseña no válidos";
                break;

            case '1049':
                echo "<p>La base de datos no existe ¿Quieres crearla? </p>";
                echo '<form action=""><input type="submit" name="crear" value="crear"></form>';
                break;

            default:
                echo $th->getMessage();
        }
    }
}




?>