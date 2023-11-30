<?php
require("./confBD.php");

// try {
//     $con = mysqli_connect(IP, USER, PASS, "prueba");
//     echo "Se ha conectado";

//     $rnombre = "miguel";
//     $redad = 37;

//     // $sql = "insert into alumnos values ('pepito',20,1)";
//     // $sql = "insert into alumnos values ('mario',20,null)";
//     // $sql = "insert into alumnos values ('mario',20,id)";
//     // $sql = "insert into alumnos (nombre,edad) values ('" .$rnombre ."','" . $redad . "')";
    
//     // mysqli_query($con, $sql);


//     // CONSULTAS PREPARADAS

//     $sql = "insert into alumnos (nombre,edad) values (?,?)";

//     $stmt = mysqli_prepare($con, $sql);
//     mysqli_stmt_bind_param($stmt, "si", $rnombre, $redad);
//     mysqli_stmt_execute($stmt);



//     mysqli_close($con);

// } catch (\Throwable $th) {

//     switch ($th->getCode()) {
//         case '1062':
//             echo "Id duplicado";
//             break;

//         default:
//             echo $th->getMessage();
//     }

//     echo mysqli_errno($con);
//     echo mysqli_error($con);

//     echo mysqli_connect_errno();
//     echo mysqli_connect_error();
//     mysqli_close($con);


//     // POSIBLES ERRORES 
//     // CONEXION
//     // 2002 No route to host
//     // 2002 Connection refused
//     // 1045 Access denied for user 'A'@'192.168.7.206' (using password: YES)
//     // 1049 Unknown database

//     // INSERCCIÓN DE DATOS
//     // 1062 Duplicate entry '1' for key 'alumnos.PRIMARY'0
// }

try {
    $con = mysqli_connect(IP, USER, PASS, "prueba");
    echo "Se ha conectado";

    $sql = "delete from alumnos where id > 5";
    $result = mysqli_query($con, $sql);
    // while($array = mysqli_fetch_assoc($result)){
    //     echo "<pre>";
    //     print_r($array);
    // }
    echo mysqli_affected_rows($con);

    mysqli_close($con);

} catch (\Throwable $th) {

    switch ($th->getCode()) {
        case '1062':
            echo "Id duplicado";
            break;

        default:
            echo $th->getMessage();
    }

    echo mysqli_errno($con);
    echo mysqli_error($con);

    echo mysqli_connect_errno();
    echo mysqli_connect_error();
    mysqli_close($con);


}


?>