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

    public function __construct($n, $c, $m)
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