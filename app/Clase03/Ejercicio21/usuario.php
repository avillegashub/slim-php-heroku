<?php

class Usuario
{
    public $name;
    public $clave;
    public $mail;

    public function __construct($n, $c, $m)
    {
        $this->name = $n;
        $this->clave = $c;
        $this->mail = $m;
    }

    static function _validarUsuario($usuario)
    {
        $estado = NULL;
        
        if(isset($usuario->name) && isset($usuario ->clave) && isset($usuario->mail))
        {
            $usuarioIngresado = $_POST["usuario"];
            $claveIngresada = $_POST["clave"];
            $mailIngresado = $_POST["mail"];

        $miArchivo = fopen("usuarios.csv", "a");
        fwrite($miArchivo, "$usuario->name,$usuario->clave,$usuario->mail\n");
        fclose($miArchivo);
        echo "Alta Exitosa";
        
        }else
        {
            echo "Faltan Datos";
            $estado = "faltan Datos";
        }
  
    }

    static function _cargarListado()
    {   
        $miArchivo = fopen("usuarios.csv", "r");
        $retorno = array ();
        
        if ($miArchivo)
        {
            while(($linea = fgets($miArchivo, 512)) != FALSE)
            {
                $userAux = explode(",", $linea);
                array_push($retorno, new Usuario($userAux[0], $userAux[1], $userAux[2]) );
            }
            Usuario::MostrarLista($retorno);
            return $retorno;
        }
        return NULL;
    }

    public static function MostrarLista($lista)
    {
        print("<ul>");
        foreach ($lista as $key => $value) {
            print("<li>$value->name<li>");
            print("<li>$value->clave<li>");
            print("<li>$value->mail<li>");
        }
        print("<ul>");
    }

}

?>