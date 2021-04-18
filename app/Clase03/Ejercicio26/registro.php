<?php

include_once "producto.php";
include_once "usuario.php";
include_once "venta.php";

if(isset($_POST["codigo"]) && isset($_POST["id"]) && isset($_POST["cantidad"])  ){
    echo Venta::RealizarVenta($_POST["codigo"], $_POST["id"],$_POST["cantidad"]);
}else
{
    echo "Faltan Datos";
}


?>