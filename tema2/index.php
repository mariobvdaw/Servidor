<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 2</title>
</head>
<body>
    <h1>Tema 2</h1>
    <h2>Echo</h2>
    <?php
	    echo "Hola Mundo";
        echo "<br>Hola mundo","hola";

        print "<br>Hola mundo con print";
        print "<br>";
        print "<h2>Formas de escribir</h2>";
        //17.99 escribirlo como un String
        printf("%s","17,99");
        print "<br>";
        //17.99 escribirlo como un entero
        printf("%d","17,99");
        print "<br>";
        //17.99 escribirlo como un decimal 
          //(hay que usar . en lugar de ,)
        printf("%f","17.99");

        print "<br>Informacion de var_dump<br>";
        var_dump("mario");
        print "<br>";
        var_dump(7);

        //declarar variables
        print "<h2>Variables</h2>";
        print "<h3>Entero</h3>";
        $entero = 6;
        echo "Mi variable es: $entero , es de tipo " . gettype($entero);
        print "<h3>Decimal</h3>";
        $decimal = 6.5;
        echo "Mi variable es: $decimal , es de tipo " . gettype($decimal);

        print "<h3>Boolean</h3>"; 
        $booleano = true;
        echo "Mi variable es: $booleano , es de tipo " . gettype($booleano) . "<br>";
        var_dump($booleano);

        print "<h3>Cadena</h3>";
        $cadena="Hola";
        echo "Mi variable es: $cadena , es de tipo " . gettype($cadena) . "<br>";
        
        print "<h3>Nulo</h3>";
        $nulo = null;
        echo "Mi variable es: $nulo , es de tipo " . gettype($nulo) . "<br>";

        print "<h3>Usos especiales</h3>";
        print "<h4>Comillas</h4>";
        $cadena2 = "se escribe con comillas \" \"";
        print $cadena2 . "<br>";

        print "<h4>Heredoc</h4>";
        $heredoc = <<< TEXT
        Se puede escribir todo lo que se quiera <p> con "comillas" </p>
        TEXT;
        print $heredoc;

        $var = 0x2A;
        print $var;

        echo "<h2>Conversion de tipos</h2>";
        $a = 4;
        $b = 4.5;
        $c = "mario";
        $d = true;
        $e = false;

        $r=$a+$b;
        echo "$a + $b es $r , es de tipo " . gettype($r) . "<br>";
        $r=$a.$c;
        echo "$a + $c es $r , es de tipo " . gettype($r) . "<br>";
        $r=$a.$d;
        echo "$a + $c es $r , es de tipo " . gettype($r) . "<br>";
        $r=$a.$e;
        echo "$a + $c es $r , es de tipo " . gettype($r) . "<br>";


        echo "<h2>Variable de variable</h2>";

        $alumno1 = "miguel";
        $alumno2 = "fernadno";
        $alumno3 = "georgi";
        $alumno4 = "raul";

        $elegido = "alumno" . random_int(1,4);
        echo $$elegido;


    ?>
    <br>
    <a href=mipagina.php?nombre=mario&nombre2=juan>Pasar nombre</a>
</body>
</html>