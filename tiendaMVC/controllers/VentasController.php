<?php

if (!$arr_ventas = CompraDAO::findAll()){
    $sms = "Sin compras aun...";
}else if(isset($_REQUEST['Ventas_EliminarVenta'])){
    if(CompraDAO::delete($_REQUEST['id'])){
        $sms = "Venta eliminada correctamente";
    }
}