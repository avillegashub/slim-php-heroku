<?php

class Usuario
{
    public $id;
    public $name;
    public $clave;
    public $mail;
    public $fechaRegistro;

    public function GetId(){ return $this->id;}
    public function GetName(){return $this->name;}
    public function GetClave(){return $this->clave;}
    public function GetMail(){return $this->mail;}
    public function GetFechaRegistro(){return $this->fechaRegistro;}



    function __construct()
    {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 3:
                self::__construct1($argv[0], $argv[1], $argv[2]);
                break;
            case 5:
                self::__construct2($argv[0], $argv[1], $argv[2], $argv[3], $argv[4]);
                break;
                    }
    }

    public function __construct1($n, $c, $m)
    {
       if(!(Usuario::UsuarioRegistrado($m)))
       {
           $this->id = Usuario::GetNextId() + 1;
           $this->name = $n;
           $this->clave = $c;
           $this->mail = $m;
           $this->fechaRegistro = date("d.m.y");
           Usuario::_RegistrarUsuario($this);
           Usuario::_uploadFoto($m);
        }else{ echo "Mail previamente registrado";}
    }
    
    public function __construct2($i, $n, $c, $m, $f)
    {
           $this->id = $i;
           $this->name = $n;
           $this->clave = $c;
           $this->mail = $m;
           $this->fechaRegistro = $f;
    }

    static function _uploadFoto($m)
    {
        $aux = $_FILES["foto"]["name"];
        $tipoArchivo = pathinfo($aux, PATHINFO_EXTENSION);
        $destino = "uploads/" . $m .".". $tipoArchivo;
        move_uploaded_file($_FILES["foto"]["tmp_name"],
        $destino); 
    }

    static function GetNextId()
    {
       if(Usuario::_cargarListado()!=NULL)
       {
            $cuenta = count(Usuario::_cargarListado());
            $aux = Usuario::_cargarListado()[$cuenta - 1];
            return   (int)$aux["id"];
       }
       return NULL;

    }

    static function _RegistrarUsuario($usuario)
    {   
        $usuarios = array();
        array_push($usuarios, $usuario);
        $miArchivo = fopen("usuarios.json", "a");
        foreach($usuarios as $value)
        {
            fwrite($miArchivo, json_encode($value)."\n");
        }
        fclose($miArchivo);
        echo "Alta Exitosa";
    }
    
    static function _ValidarUsuario($u)
    {
        if(Usuario::UsuarioRegistrado($u->mail))
        {   
            if(Usuario::VerificaClave($u->clave))
            {
                echo "Login Exitoso";
            }
            else{
                echo "Clave Incorrecta";
            }
        }
        else{
            echo "Usuario no está registrado";
        }
    }        
    
    static function UsuarioRegistrado($mail)
    {
        if(Usuario::_cargarListado() != null)
        {
            $lista = Usuario::_cargarListado();
            foreach ( $lista as $value) {
                if(strcmp($value["mail"], $mail) == 0)
                {
                    return TRUE;
                }
            }
            return FALSE;
        }
        else{
            return FALSE;
        }
    }
    
    static function VerificaClave($clave)
    {
        foreach (Usuario::_cargarListado() as $value) {
            if(strcmp($value->clave, $clave) == 0)
            {
                return TRUE;
            }
        }
        return FALSE;
        
    }
    
    
    static function _cargarListado()
    {   
        if(file_exists("usuarios.json"))
        {
            $miArchivo = fopen("usuarios.json", "r");
            $retorno = array();
            
            while(($linea = fgets($miArchivo,512)) != FALSE)
            {
                array_push($retorno, json_decode($linea, true ));
            }
            fclose($miArchivo);
            return $retorno;
        }
        return NULL;
    }
    
    
    public static function FormatLista($lista)
    {
        $array = array();
        foreach ($lista as $value)
        {
            array_push($array, new Usuario($value["id"],$value["name"],$value["clave"],$value["mail"],$value["fechaRegistro"]));
        }
       
        return $array;

    }
    public static function MostrarLista($lista)
    {
        
            $arrayAux = Usuario::FormatLista($lista);

        $sB = NULL;

        $sB.= "<ul>";
        foreach ($arrayAux as $value) {
            $sB.=("<li>$value->name, $value->mail <img src = ./uploads/$value->mail.jpg><li>");
            
        }
        $sB.="</ul>";
        return $sB;
    }

}

?>