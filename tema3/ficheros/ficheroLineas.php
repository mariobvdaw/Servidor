<?php
    
    if (file_exists("./ficheroLineas.txt")) {
        echo "<h1>Leer fichero lineas</h1>";
        if(!$fp = fopen("./ficheroLineas.txt", "r")){
            echo "<br>Ha habido un error en la apertura del fichero";
        } else {
            // LEER
            echo "<h3>Contenido del fichero:</h3>";
            while($leido = fgets($fp, filesize("./ficheroLineas.txt"))){
                echo "<br>" . $leido;
            }
            fclose($fp);
        }

    } else {
        echo "No existe";
    }

    
    // if (file_exists("./ficheroLineas.txt")) {
    //     echo "<h1>Escribir fichero lineas <small>(al final)</small></h1>";
    //     if(!$fp = fopen("./ficheroLineas.txt", "a")){
    //         echo "<br>Ha habido un error en la apertura del fichero";
    //     } else {
    //         // ESCRIBIR
    //         $texto = "\nMi nueva linea";

    //         if(!fputs($fp, $texto, strlen($texto))){
    //             echo "Error en la escritura";
    //         }
            

    //         fclose($fp);
    //     }

    // } else {
    //     echo "No existe";
    // }

//     if (file_exists("./ficheroLineas.txt")) {
//         echo "<h1>Escribir fichero lineas <small>(al final)</small></h1>";
//         if(!$fp = fopen("./ficheroLineas.txt", "r")){
//             echo "<br>Ha habido un error en la apertura del fichero";
//         } else {
//             // ESCRIBIR
//             $texto = "Mi segunda linea\n";
//             // while($leido = fputs($fp, filesize("./ficheroLineas.txt"))){
//             //     // if (ftell($fp)==strlen($leido)) {
//             //     //     echo "final";
//             //     // }
//             //     if(!fputs($fp, $texto, strlen($texto))){
//             //         echo "Error en la escritura";
//             //     }
//             // }
            
//             fclose($fp);
//         }

//     } else {
//         echo "No existe";
//     }


//     // CUANDO QUEREMOS MODIFICAR UN FICHERO SECUENCIAL
//     //  - creamos un archivo temporal para leerlo y modificarlo
//     //  - borrar el anterior y renombrar el temporal con el nombre original

//     // CREAR FICHERO TEMPORAL

//     $tmp = tempnam(".","temporal.txt");
//     if (file_exists("./ficheroLineas.txt")) {
//         echo "<h1>Leer fichero lineas</h1>";
//         if((!$fp = fopen("./ficheroLineas.txt", "r")) || !$ft = fopen($tmp, "w")){
//             echo "<br>Ha habido un error en la apertura del fichero";
//         } else {
//             $texto = "Linea nueva";
//             $contador = 1;
//             while($leido = fgets($fp, filesize("./ficheroLineas.txt"))){
//                 fputs($ft, $leido, strlen($leido));
//                 if ($contador==1) {
//                     fputs($ft, $leido, strlen($texto));
//                     fputs($ft, "\n", strlen("\n"));

//                     $contador++;
//                 }
//             }

//             fclose($fp);
//             fclose($ft);
//             unlink("ficheroLineas.txt");
//             rename($tmp, "./ficheroLineas.txt");

//         }

//     } else {
//         echo "No existe";
//     }
    
        $tmp = tempnam('.',"tem.txt");
        if(file_exists('ficheroLineas.txt')){
            echo "Existe";
            if((!$fp=fopen('ficheroLineas.txt','r')) || (!$ft = fopen($tmp,'w')))
                echo "Ha habido un problema al abrir el fichero";       
            else{        
                $texto = "Linea nueva";
                $contador = 1;
                while($leido = fgets($fp,filesize("ficheroLineas.txt"))){  
                        fputs($ft,$leido,strlen($leido));
                        if($contador==1){
                            fputs($ft,$texto,strlen($texto));
                            fputs($ft,"\n",strlen('\n'));
                            $contador++;
                        }
                }
                fclose($fp);
                fclose($ft);
                unlink("ficheroLineas.txt");
                rename($tmp,"ficheroLineas.txt");
                chmod("ficheroLineas.txt",0777);
            }
        }else{
            echo "No existe";
        }
// ?>