<?php
    if (count($_FILES)!=0) {
        echo "<pre>";
        print_r($_FILES);

        $destino = "/var/www/servidor/tema3/";

            for ($i=0; $i <count($_FILES['archivo']['name']) ; $i++) {
                $destino = "/var/www/servidor/tema3/"; 
                $destino .= $_FILES['archivo']['name'][$i];
                $ruta = $_FILES['archivo']['tmp_name'][$i];
                if(move_uploaded_file($ruta, $destino)){
                    echo "archivo subido";
                } else {
                    echo "subida fallida";
                }
            }

        // $ruta = "/var/www/servidor/tema3/";
        // $ruta .= basename($_FILES['archivo']['name']);
        // if(move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta)){
        //     echo "archivo subido";
        // } else {
        //     echo "subida fallida";
        // }

    }
?>