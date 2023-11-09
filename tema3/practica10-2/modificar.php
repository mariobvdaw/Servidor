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
        
        if (isset($_REQUEST["alumno"]) && $_REQUEST["alumno"]!="") {
            $existe="si"; 
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
        } else{
            $existe="no";
        }

        if (isset($_REQUEST["volver"])) {
            header("Location: ./notas.php");
            exit;
        }
        if (isset($_REQUEST["guardar"])) {
            if ($existe=="si") {
                $nombre=$_REQUEST["nombreOculto"];
            }else{
                $nombre=$_REQUEST["nombre"];
            }
            $n1=$_REQUEST["nota1"];
            $n2=$_REQUEST["nota2"];
            $n3=$_REQUEST["nota3"];
            $datosAlumno=[$nombre, $n1, $n2, $n3];

            if (($_REQUEST["existe"])=="no") {
                if (($gestor = fopen("notas.csv", "a"))) {
                    fputcsv($gestor, $datosAlumno,";");
                    fclose($gestor);
                }
            } else{
                $tmp = tempnam('.',"tem.csv");
                if(($gestor=fopen('notas.csv','r')) && ($nuevoFichero = fopen($tmp,'w'))){       
                    $contador = 1;
                    while($leido = fgetcsv($gestor,filesize("notas.csv"))){  
                        if($contador==$_REQUEST["id"]){
                            fputcsv($nuevoFichero, $datosAlumno,";", ' ');
                        } else{
                            fputcsv($nuevoFichero,$leido,";", ' ');
                        }
                        $contador++;
                    }
                        fclose($gestor);
                        fclose($nuevoFichero);
                        unlink("notas.csv");
                        rename($tmp,"notas.csv");
                        chmod("notas.csv",0777);
                }
            
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
        <input type="hidden" name="alumno" value="<?php echo $nombre?>">
        <input type="submit" name="volver" value="volver">
        <input type="submit" name="guardar" value="guardar">
        <input type="hidden" name="existe" value="<?php echo $existe?>">
        <input type="hidden" name="nombreOculto" value="<?php echo $nombre;?>">
        <input type="hidden" name="id" value="<?php echo $alumno;?>">

    </form>
</body>
</html>