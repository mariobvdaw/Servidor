<?php

if (!$arr_albaranes = AlbaranDAO::findAll()){
    $sms = "Sin albaranes aun...";
}else if(isset($_REQUEST['Albaran_EliminarAlbaran'])){
    if(AlbaranDAO::delete($_REQUEST['id'])){
        $sms = "Albaran eliminado correctamente";
    }
}