<?php

class Usuario
{
    public $name;
    public $clave;
    public $mail;

    static function _validarUsuario($usuario)
    {
        $estado = NULL;
        
        if(isset($usuario->name) && isset($usuario ->clave) && isset($usuario->mail))
        {
            $usuarioIngresado = $_POST["usuario"];
            $claveIngresada = $_POST["clave"];
            $mailIngresado = $_POST["mail"];
        
            /*if($usuario->name == "admin" )
            {
                if($usuario->clave == "1234")
                echo "Okey";
                $estado = "OK";
              
            }
            else{
                echo "usuario No registrado";
                $estado = "usuario No registrado";
            }*/
        $miArchivo = fopen("usuarios.csv", "a");
        fwrite($miArchivo, "$usuario->name,$usuario->clave,$usuario->mail\n");
        fclose($miArchivo);
        echo "Alta Exitosa";
        
        }else
        {
            echo "Faltan Datos";
            $estado = "faltan Datos";
        }
        /*$miArchivo = fopen("usuarios.csv", "a");
        fwrite($miArchivo, "Ingreso OK, $estado, $usuario->unUsuario," .time());
        fclose($miArchivo);*/
    }
}

?>