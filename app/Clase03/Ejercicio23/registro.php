<?php

include_once "usuario.php";


if(isset($_POST["nombre"]) && isset($_POST["clave"]) && isset($_POST["mail"]) && isset($_FILES["foto"])){
    new Usuario ($_POST["nombre"], $_POST["clave"], $_POST["mail"]);
}else
{
    echo "Faltan Datos";
}


?>