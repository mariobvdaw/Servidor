<?php
    $arrayNum = array(10);
    print_r($arrayNum);
    echo "<br>";

    $array = array("Lunes", "Martes", "Miercoles");
    print_r($array);
    echo "<br>";

    $array = array("Lunes", 7, "Miercoles");
    print_r($array);
    echo "<br>";
    var_dump($array);
    echo "<br>";

    $arrayCorta = ["Cortado", 14];
    var_dump($arrayCorta);
    echo "<br>";

    $semana = array("Lunes", "Martes", "Miercoles");
    print_r($semana);
    echo "<br>";

    for ($i=0; $i < sizeof($semana) ; $i++) { 
        echo "<br>" . $semana[$i];
    }
    echo "<br>";
    for ($i=0; $i < count($semana) ; $i++) { 
        echo "<br>" . $semana[$i];
    }
    echo "<br>";

    // Arrays dinámicos
    // Modificar el tamaño/contenido 

    $semana[3]="jueves";
    for ($i=0; $i < count($semana) ; $i++) { 
        echo "<br>" . $semana[$i];
    }

    // Añade siempre al final
    // $semana[count($semana)]="ultimo";
    // for ($i=0; $i < count($semana) ; $i++) { 
    //     echo "<br>" . $semana[$i];
    // }

    $semana[9]="ultimo";
    foreach ($semana as $key => $value) {
        // echo "<br>" . $key . $semana[$key];
        echo "<br>" . $key . " " . $value;
    }

    // Indices de un array
    echo "<br>";
    print_r(array_keys($semana));
    echo "<br>";

    // Arrays asociativos

    $notas = array("Smail"=>10, "Mario"=>9, "Manuel"=>"Sobresaliente");
    foreach ($notas as $key => $value) {
        echo "<br> La nota de " . $key . " es: " . $value;
    }

    // Arrays multiples
    
    $arrayDAW = array("PROG"=>"Programacion", "LM"=>"Lenguaje de marcas"); // array asociatico 
    $arrayDAM = array("MO"=>"Movil", "LM"=>"Lenguaje de marcas"); // array asociatico 
    $arrayASIR = array("RED"=>"Redes", "SO"=>"Sistemas Operativos"); // array asociatico 
    $ciclos = array("DAW"=>$arrayDAW,"DAM"=> $arrayDAM,"ASIR"=> $arrayASIR); // array numerico

    echo "<pre>";
    print_r($ciclos);
    echo "</pre>";

    foreach ($ciclos as $key => $value) {
        echo "<br><br>" . $key . " tiene estas asignaturas: ";
        foreach ($value as $key2 => $value2) {
            echo "<br>-" . $value2;
        }
    }
    echo "<br>";echo "<br>";
    // reset para ir al primero
    reset($ciclos);
    while (current($ciclos)) {
        echo "<br><br>" . key($ciclos) . " tiene estas asignaturas: ";
        $ciclo = current($ciclos);
        while (current($ciclo)) {

            echo "<br>- " . key($ciclo) . ":" . current($ciclo);
            next($ciclo);
            
        }
        next($ciclos);
    }
    // 
    // 
    // 
?>