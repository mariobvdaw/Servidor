<?php
    
    echo 4<=>5; // -1
    echo 6<=>5; // 1
    echo 5<=>5; // 0
    echo "a"<=>"b"; // -1
    echo "b"<=>"a"; // 1
    echo "a"<=>"a"; // 0
    
    echo "<br>";
    echo 5&3;
    echo 5|3;

    // if, else, elseif
    echo "<br>";
    if(2>5){
        echo "Mayor";
        echo "  que ";
    }elseif (2<5){
        echo "Menor";
    }

    echo "<br>";
    // switch ($variable) {
    //     case 'value':
    //         # code...
    //         break;
        
    //     default:
    //         # code...
    //         break;
    // }

    // while
    // primero mira la condicion y despues ejecuta
    $a = 1;
    while ($a <= 10) {
        echo $a;
        $a++;
    }
    echo "<br>";
    // do while
    // primero ejecuta y despues mira la condicion 

    //for
    for ($i=0; $i < 10; $i++) { 
        echo $i;
    }
    
    // foreach
    foreach ($_SERVER as $key => $value) {
        echo "<br>Clave: " . $key . " Valor: " . $value;
    }

    foreach ($_SERVER as $value) {
        echo "<br>Clave: " . $value;
    }
?>