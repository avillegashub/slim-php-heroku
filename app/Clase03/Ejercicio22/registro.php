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

//echo Usuario::_validarUsuario(new Usuario(NULL,"1234", "1asd@asd.com"));


if( isset($_POST["mail"]) && isset($_POST["clave"]))
{
    
    echo Usuario::_validarUsuario(new Usuario(NULL,$_POST["clave"], $_POST["mail"]));
}
else
{
    echo "Faltan Datos";
}


?>