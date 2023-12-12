<?php

require("./confBD.php");


// SELECT NORMAL
$DSN = "pgsql:host=".IP.';dbname=prueba';
// $DSN = "mysql:host=".IP.';dbname=prueba'; 

try {
    $con = new PDO($DSN,USER,PASS);

    $sql = "select * from tiempo";
    $result = $con->query($sql);
    while ($row = $result->fetch(PDO::FETCH_BOTH)) {
        echo "<br>Tiempo: " . $row[1] . " y hay " . $row[2] . " grados<br>";
    }


} catch (\Throwable $th) {
    //throw $th;
    echo $th->getMessage();
}finally{
    unset($con);
}


// INSERT CONSULTA PREPARADA

try {
    $con = new PDO($DSN,USER,PASS);

    $sql = "insert into tiempo (descripcion, grados) values (?,?)";
    
    // $stmt = $con->prepare($sql);
    // $stmt->execute(array("Hace niebla",5));
    

    $sql = "insert into tiempo (descripcion, grados) values (:desc,:grad)";
    // $stmt = $con->prepare($sql);
    // $desc = "Esta nevando";
    // $grd = 0;
    // $stmt->bindParam(":desc", $desc);
    // $stmt->bindParam(":grad", $grd);
    // $stmt->execute();

} catch (\Throwable $th) {
    //throw $th;
    echo $th->getMessage();
}finally{
    unset($con);
}



// SELECT CON BIND

try {
    $con = new PDO($DSN,USER,PASS);

    $sql = "select * from tiempo where grados < 5 ";
    $stmt = $con->query($sql);
    $stmt->execute();
    $stmt->bindColumn(2,$desc);
    $stmt->bindColumn(3,$grados);
    echo "<br>Dias con menos de 5 grados:";
    while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
        echo "<br>Tiempo: " . $desc . " y hay " . $grados . " grados<br>";
    }
    

} catch (\Throwable $th) {
    //throw $th;
    echo $th->getMessage();
}finally{
    unset($con);
}


?>