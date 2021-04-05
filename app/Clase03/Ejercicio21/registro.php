<?php

//echo "Array get:";

//var_dump($_GET);

//echo "<br/>Array post:";

//var_dump($_POST);
/*
if(isset($_POST["usuario"]) && isset($_POST["clave"])){
    $usuarioIngresado = $_POST["usuario"];
    $claveIngresada = $_POST["clave"];

    if($usuarioIngresado == "admin" && $claveIngresada == )
    {
        echo "Okey";
    }
    else{
        echo "usuario No registrado";
    }

}else
{
    echo "Faltan Datos";
}

$nuevoUsuario =new Usuario();
$listado = array();

$nuevoUsuario->name = $_POST["usuario"];
$nuevoUsuario->clave = $_POST["clave"];
$nuevoUsuario->mail = $_POST["mail"];
echo Usuario::_validarUsuario($nuevoUsuario);

*/
include_once "usuario.php";


if( $_GET["listado"] == "TRUE")
{
    Usuario::_cargarListado();
}


?>