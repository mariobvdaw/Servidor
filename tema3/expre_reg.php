<?php

    echo "<pre>";
    $exp= "/mario/";
    echo preg_match($exp, "mario esta en el texto");
    echo preg_match($exp, "maria esta en el texto");


    echo "<p>Uso del comodin /mari./ </p>";
    $exp= "/mari./";
    echo preg_match($exp, "mario esta en el texto");
    echo preg_match($exp, "maria esta en el texto");

    // echo "<h1>Nombre</h1>";
    // $nombre = "/^[A-Za-z]{3,}\s[A-Za-z]{3,}$/";
    
    
    // echo preg_match($nombre, "a");
    // echo preg_match($nombre, "amw aw");
    // echo preg_match($nombre, "amwas aweqwe");
    // if (preg_match($nombre, "adsaaas")) {
    //     echo "<br>correcto";
    // } else {
    //     echo "<br>no correcto";
        
    // }
    
    // echo "<br>";
    // $fecha = "/[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/";
    // echo preg_match($fecha, "a");
    // echo preg_match($fecha, "02/12/2023");
    // echo preg_match($fecha, "02/1/2023");
    // echo preg_match($fecha, "02/02/223");

    // echo "<br>";
    // echo "<br>";
    
    // $dni = "/^[0-9]{8}[A-Z]{1}$/";
    // echo preg_match($dni, "71052293A");
    // echo preg_match($dni, "7105293A");
    // echo preg_match($dni, "71052293");
    // echo preg_match($dni, "asd71052293A");

    
    // $correo = "/^[A-Za-z0-9]{1,}@[A-Za-z0-9]{1,}[.][A-Za-z0-9]{2,}$/";
    // // echo preg_match($correo, "1@a.aa");

    // $contrasenia = "/[A-Za-z0-9]{1,}/";
    // echo preg_match($contrasenia, "aAa3");


    
    // $stringFecha = "06/11/2004";
    // $arrayFecha = explode("/",$stringFecha);
    // print_r($arrayFecha);
    // $fecha1 = new DateTime($arrayFecha[0]."-".$arrayFecha[1]."-".$arrayFecha[2]);
    // $fecha2 = new DateTime();  
    // $edad = ($fecha1->diff($fecha2))->y;
    // echo $edad;
    
    // if(preg_match("/[.](png|jpg|bmp)$/", "asbmp.a.png")){
    //     echo "Formato válido";
    // }else{
    //     echo "Formato no válido";

    // }
    // echo "<br>";
    // echo "<br>";
    // echo "<br>";
    // $letrasDNI = "TRWAGMYFPDXBNJZSQVHLCKE";
    // $_FILES["dni"]="71052293A";  
    // $dni = $_FILES["dni"];
    // $letra = substr($dni, strlen($dni)-1, 1);
    // $numeros = intval(substr($dni, 0, strlen($dni)-1));
    // $letraCorrecta = $letrasDNI[$numeros%23];
    // echo $letra;
    // echo $letraCorrecta;
    // echo $numeros;
    // echo "<br>";

    // echo $dni;
    // echo "<br>";
    // echo "<br>";
    // echo "<br>";

    echo "<p>Uso de o /maria o /mario </p>";
    $exp= "/mari[ao]/";
    echo preg_match($exp, "mario esta en el texto");
    echo preg_match($exp, "maria esta en el texto");

    echo "<p>Uso de espacios (espacio[letra]espacio) </p>";
    $exp = "/\s[A-Za-z]\s/";
    $frase = "Hoy es Hallowen y salimos a tomar";
    echo preg_match($exp, $frase);
    echo "<p>Valores que coinciden con la expresion regular (array)</p>";
    $array = array();
    preg_match_all($exp, $frase, $array);
    print_r($array);

    echo "<p>Numerico</p>";
    $frase = "Hoy es 31 y salimos a tomar";
    $exp = "/[0-9]/";
    $exp = "/\d/";
    echo preg_match($exp, $frase);
    echo "<br>";
    preg_match_all($exp, $frase, $array);
    print_r($array);
    echo "<br>";
    $exp = "/\d\d/";
    preg_match_all($exp, $frase, $array);
    print_r($array);
    echo "<br>";
    $frase = "Hoy es 31 y salimos a tomar 2023";
    $exp = "/\d{4}/";
    preg_match_all($exp, $frase, $array);
    print_r($array);

    echo "<p>Iban</p>";
    
    $frase = "ES00 0000 0000 00 0000000000";
    $exp = "/^[A-Z]{2}\d{2}\s\d{4}\s\d{4}\s\d{2}\s\d{10}$/"; 
    // se usa ^ para indicar el inicio de una linea
    // se usa $ para indicar el final de una linea
    echo preg_match($exp, $frase);

    echo "<p>Uso de no contiene ^ </p>";
    $exp= "/mari[^ao]/";
    echo preg_match($exp, "mario esta en el texto");
    echo preg_match($exp, "maril esta en el texto");

    // nov, noviembre, november
    echo "<p>nov, noviembre, november</p>";

    $exp= "/^nov(iembre|ember)?$/";
    echo preg_match($exp, "nov");
    echo preg_match($exp, "noviembre");
    echo preg_match($exp, "november");
    echo preg_match($exp, "novebr");
    echo preg_match($exp, "nova");

    echo "<p>Buscar en array</p>";
    $exp= "/es$/";
    $array = ['Lunes','Martes', 'Sabado'];
    print_r(preg_grep($exp, $array));

    echo "<p>Modificar array (preg_replace)</p>"; // Devuelve todo el array con los cambios
    $array = [1,'a', 'B', 4];
    $exp= ["/^\d$/", "/^\D$/"];
    $cambio = ["numero", "letra"];
    print_r(preg_filter($exp, $cambio, $array));

    echo "<p>Modificar array (preg_filter)</p>"; // Solo devuelve los cambios
    $array = [1,'a', 'B', 4];
    $exp= ["/^\d$/"];
    $cambio = "numero";
    print_r(preg_filter($exp, $cambio, $array));
    
    echo "<p>Modificar frase (preg_filter)</p>"; 
    $frase = "mario esta en el texto";
    $patron = "/a/";
    $cambio = "@";
    print_r(preg_filter($patron, $cambio, $frase));

    $frase = "Si hay una fecha 01/02/2012 esta bien pero 1/2/25 mal, 15/12/21 mal";
    // si el mes tien un solo digito se añade un 0 delante
    // si el dia tien un solo digito se añade un 0 delante
    // si el año tiene 2 digitos => menor que 23 añado 20 delante y < añado 19 delante

    function corrige($coincide){
        print_r($coincide);
        if ($coincide[1]<10 && strlen($coincide[1])<2) {
            $coincide[1]= "0" . $coincide[1];
        }
        if ($coincide[3]<10 && strlen($coincide[3])<2) {
            $coincide[3]= "0" . $coincide[3];
        }
        if ($coincide[5]<=23 && strlen($coincide[5])==2) {
            $coincide[5]= "20" . $coincide[5];

        }elseif($coincide[5]<100) {
            $coincide[5]= "19" . $coincide[5];

        }
        return $coincide[1].$coincide[2].$coincide[3].$coincide[4].$coincide[5];
    }

    $exp = "/(\d{1,2})(\/)(\d{1,2})(\/)(\d{2,4})/";
    // preg_match_all($exp,$frase, $array);
    // print_r($array);
    print_r(preg_replace_callback($exp,"corrige",$frase));



?>