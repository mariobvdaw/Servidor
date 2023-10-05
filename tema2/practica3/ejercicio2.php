<?php
    $variable=$_GET['variable'];
    
    echo "<br>Valor: " . $variable;
    echo "<br>Tipo: " . gettype($variable);
    echo "<br>Es numerico: " ;
    var_dump($variable);
    // echo "<br>Entero o float: " ;
    
    echo "<p><a href='http://" . $_SERVER['SERVER_ADDR'] . "./verCodigo.php?fichero=".$_SERVER['SCRIPT_FILENAME']."'>Ver codigo</a></p>";
?>