<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificacion</title>
</head>
    <style>
        form{
            border: 1px solid black;
            width: 30%;
            padding: 20px;
        }
    </style>
<body>
    <?php
        $nombre="";
        $n1="";
        $n2="";
        $n3="";
        if (isset($_REQUEST["alumno"])) {
            $alumno=$_REQUEST["alumno"];        
            $numeroAlumno = 1;
            if (($gestor = fopen("notas.csv", "r"))) {
                while (($datos = fgetcsv($gestor, 1000, ";"))) {
                    $numero = count($datos);                    
                    echo "<tr>";
                    if($numeroAlumno==$alumno){
                        $nombre=$datos[0];
                        $n1=$datos[1];
                        $n2=$datos[2];
                        $n3=$datos[3];
                    }
                    $numeroAlumno++;
                }
                fclose($gestor);
            }
        }
        if (isset($_REQUEST["volver"])) {
            header("Location: ./notas.php");
            exit;
        }
        if (isset($_REQUEST["guardar"])) {
            $nombre=$_REQUEST["nombre"];
            $n1=$_REQUEST["nota1"];
            $n2=$_REQUEST["nota2"];
            $n3=$_REQUEST["nota3"];
            $alumno=[$nombre, $n1, $n2, $n3];

            if (($gestor = fopen("notas.csv", "a"))) {

            if (!isset($_REQUEST["alumno"])) {
                    fputcsv($gestor, $alumno,";");
                } else{
                    // $tmp = tempnam('.',"tem.csv");
                    //     if((!$fp=fopen('ficheroLineas.txt','r')) || (!$ft = fopen($tmp,'w')))
                    //     echo "Ha habido un problema al abrir el fichero";       
                    // else{        
                    //     $texto = "Linea nueva";
                    //     $contador = 1;
                    //     while($leido = fgets($fp,filesize("ficheroLineas.txt"))){  
                    //         fputs($ft,$leido,strlen($leido));
                    //         if($contador==1){
                    //             fputs($ft,$texto,strlen($texto));
                    //             fputs($ft,"\n",strlen('\n'));
                    //             $contador++;
                    //         }
                    //     }
                    //         fclose($fp);
                    //         fclose($ft);
                    //         unlink("ficheroLineas.txt");
                    //         rename($tmp,"ficheroLineas.txt");
                    //         chmod("ficheroLineas.txt",0777);
                    // }
                
            }
            fclose($gestor);
            }
            header("Location: ./notas.php");
            exit;
        }

        
    ?>
    <form action="" method="get">
        <label for="nombre">Nombre
            <input type="text" name="nombre" id="nombre" value="<?php 
            echo $nombre;?>" 
            <?php
                if (isset($_REQUEST["alumno"])) {
                    echo "disabled";
                }
            ?>
            >
        </label>
        <br><br>
        <label for="nota1">Nota 1
            <input type="text" name="nota1" id="nota1" value="<?php echo $n1?>">
        </label>
        <br><br>
        <label for="nota2">Nota 2
            <input type="text" name="nota2" id="nota2" value="<?php echo $n2?>">
        </label>
        <br><br>        
        <label for="nota3">Nota 3
            <input type="text" name="nota3" id="nota3" value="<?php echo $n3?>">
        </label>
        <br><br>
        <input type="hidden" name="alumno" value="existe">
        <input type="submit" name="volver" value="volver">
        <input type="submit" name="guardar" value="guardar">
    </form>
</body>
</html>