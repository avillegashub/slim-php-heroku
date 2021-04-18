<?php

class Producto implements JsonSerializable
{
   public $id;
   public $name;
   public $codigo;
   public $tipo;
   public $stock;
   public $precio;

    public function GetId(){ return $this->id;}
    public function GetName(){return $this->name;}
    public function GetClave(){return $this->codigo;}
    public function GetMail(){return $this->tipo;}
    public function GetFechaRegistro(){return $this->stock;}

    public function jsonSerialize()
            {
                return get_object_vars($this);
            }


    function __construct()
    {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 5:
                self::__construct1($argv[0], $argv[1], $argv[2], $argv[3], $argv[4]);
                break;
            case 6:
                self::__construct2($argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5]);
                break;
                    }
    }

    public function __construct1($n, $c, $t, $s, $p)
    {
           $this->id = 1;
           $this->name = $n;
           $this->codigo = $c;
           $this->tipo = $t;
           $this->precio = $p;
           $this->stock = $s;
    }
    
    public function __construct2($i, $n, $c, $t, $s, $p)
    {
        $this->id = $i;
        $this->name = $n;
        $this->codigo = $c;
        $this->tipo = $t;
        $this->precio = $p;
        $this->stock = $s;
    }

    static function GetNextId()
    {
       if(Producto::_cargarListado()!=NULL)
       {
            $cuenta = count(Producto::_cargarListado());
            $aux = Producto::_cargarListado()[$cuenta - 1];
            return   (int)$aux["id"];
       }
       return NULL;

    }

    static function _RegistrarProducto($usuario)
    {   
        $usuarios = array();
        array_push($usuarios, $usuario);
        $miArchivo = fopen("productos.json", "a");
        foreach($usuarios as $value)
        {
            fwrite($miArchivo, json_encode($value)."\n");
        }
        fclose($miArchivo);
    }

    
    
    static function ProductoRegistrado($codigo)
    {
        if(Producto::_cargarListado() != null)
        {
            $lista = Producto::_cargarListado();
            foreach ( $lista as $value) {
                if(strcmp($value["codigo"], $codigo) == 0)
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

    static function ModificarStock($codigo, $cantidad)
    {
        $lista = Producto::_cargarListado();

        for ($i=0; $i < count($lista) ; $i++) { 

            if(Producto::VerificaCodigo($codigo, $lista) != NULL)
            {
                $lista[$i]["stock"] -= $cantidad;
            }
        }
        Producto::GuardarListaProductos($lista);
    }
    
    static function GuardarListaProductos($lista)
    {
        $miArchivo = fopen("productos.json", "w");
        fwrite($miArchivo, json_encode($lista));
        fclose($miArchivo);
    }


    static function VerificaCodigo($codigo, $lista)
    {
        foreach ($lista as $value) {
            if(strcmp($value["codigo"], $codigo) == 0)
            {
                return $value;
            }
        }
        return NULL;
    }

    static function _VerificarStock($producto, $cantidad)
    {
            if((int)$producto["stock"] >= (int)$cantidad)
            {
                return -1;
            }
        return (int)$producto["stock"];
    }
    
     static function _cargarListado()
    {   
        if(file_exists("productos.json"))
        {
            return json_decode(file_get_contents("productos.json"), true);
        }
        return NULL;
    }
    
    
    
    public static function FormatLista($lista)
    {
        $array = array();
        foreach ($lista as $value)
        {
            array_push($array, new Producto($value["id"],$value["name"],$value["codigo"],$value["tipo"],$value["stock"],$value["precio"]));
        }
       
        return $array;

    }
    public static function MostrarLista($lista)
    {
        
            $arrayAux = Producto::FormatLista($lista);

        $sB = NULL;

        $sB.= "<ul>";
        foreach ($arrayAux as $value) {
            $sB.=("<li>$value->name, $value->tipo <img src = ./uploads/$value->tipo.jpg><li>");
            
        }
        $sB.="</ul>";
        return $sB;
    }

}

?>