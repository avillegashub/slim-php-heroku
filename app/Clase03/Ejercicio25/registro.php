<?php

include_once "producto.php";


if(isset($_POST["nombre"]) && isset($_POST["codigo"]) && isset($_POST["tipo"]) && isset($_POST["stock"]) && isset($_POST["precio"]) ){
    new Producto ($_POST["nombre"], $_POST["codigo"], $_POST["tipo"], $_POST["stock"], $_POST["precio"]);
}else
{
    echo "Faltan Datos";
}


if( isset($_GET["listado"]) && $_GET["listado"] == "TRUE")
{
    echo Usuario:: MostrarLista(Usuario::_cargarListado());
}

?>