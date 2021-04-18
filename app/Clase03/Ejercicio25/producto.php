<?php

class Producto
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
       if(!(Producto::ProductoRegistrado($c)))
       {
           $this->id = Producto::GetNextId() + 1;
           $this->name = $n;
           $this->codigo = $c;
           $this->tipo = $t;
           $this->precio = $p;
           $this->stock = $s;
           Producto::_RegistrarProducto($this);
        }else{ 
            Producto::ModificarStock($c,$s );
            echo "Producto ya existe";}
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
        echo "Alta Exitosa";
    }
    
    static function _ValidarProducto($u)
    {
        if(Producto::ProductoRegistrado($u->tipo))
        {   
            if(Producto::VerificaClave($u->codigo))
            {
                echo "Login Exitoso";
            }
            else{
                echo "Clave Incorrecta";
            }
        }
        else{
            echo "Producto no está registrado";
        }
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

    static function ModificarStock($codigo, $stock)
    {
        $lista = Producto::_cargarListado();
        $lista = Producto::FormatLista($lista);

        for ($i=0; $i < count($lista) ; $i++) { 
            
            if( strcmp($lista[$i]->codigo, $codigo) == 0)
            {
                echo "Lista[".$i."]->codigo: " . $lista[$i]->codigo ."- Codigo: ". $codigo;
                $lista[$i]->stock += $stock;
                break;
            }

        }

        Producto::CargarListaProductos($lista);
    }
    
    static function CargarListaProductos($lista)
    {
        $miArchivo = fopen("productos.json", "w+");
        fclose($miArchivo);

        foreach ($lista as $value) {
            Producto::_RegistrarProducto(($value));
        }


    }


    static function VerificaClave($codigo)
    {
        foreach (Producto::_cargarListado() as $value) {
            if(strcmp($value->codigo, $codigo) == 0)
            {
                return TRUE;
            }
        }
        return FALSE;
        
    }
    
    
    static function _cargarListado()
    {   
        if(file_exists("productos.json"))
        {
            $miArchivo = fopen("productos.json", "r");
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