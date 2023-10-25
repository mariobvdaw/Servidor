<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Segunda parte</title>
</head>
<body>
    
    <?php
            include("../fragmentos/header.html");
    ?>
    <main>
    <pre>
        <?php
            print_r($_SERVER);
            print_r($_GET);
        ?>
    </pre>

    <?php
    echo "<h2>Ambito de las variables</h2>";
    $contador = 5;
        echo "<h3>Prueba variable 1</h3>";
        function PruebaVariable(){
            echo $contador;
        }
    
        PruebaVariable();
        echo "<p>No puede acceder</p>";

        echo "<h3>Prueba variable 2</h3>";
        function PruebaVariable2($contador){
            echo $contador;
            $contador++;
            echo $contador;
        }
        PruebaVariable2($contador);
        echo "<p>Accede sin problemas al pasarlo como parámetro (no modifica el valor)</p>";

        echo $contador;

        echo "<h3>Prueba variable Referencia</h3>";
        function PruebaVariableReferencia(&$contador){
            echo $contador;
            $contador++;
            echo $contador;
        }
        PruebaVariableReferencia($contador);
        echo "<p>Accede sin problemas al pasarlo como parámetro y 
        además modifica el valor al pasarle la variable como referencia</p>";
        echo $contador;

        echo "<h3>Prueba variable Global</h3>";
        function PruebaVariableGlobal(){
            global $contador;
            echo $contador;
            $contador++;
            echo $contador;
        }
        PruebaVariableGlobal();
        echo "<p>Modifica la variable y no hay que pasarlo como parametro</p>";

        echo "<h2>Static</h2>";
        function FuncionContador(){
            static $c = 0;
            $c++;
            echo $c . "<br>";

        }
        FuncionContador();
        FuncionContador();
        FuncionContador();
        FuncionContador();


        echo "<h2>Constantes</h2>";
        define("USER","Mario");
        echo USER;

        echo "<h2>Include</h2>";
        include("./carpetaInclude/pruebainclude.html");
        
    ?>
    </main>
    <?php
            include("../fragmentos/footer.html");
    ?>
</body>
</html>