<?php
    if (count($_FILES)!=0) {
        echo "<pre>";
        print_r($_FILES);
        $ruta = "/var/www/servidor/Tema3/";
        $ruta .= basename($_FILES['archivo']['name']);
        echo $ruta;

    }
?>