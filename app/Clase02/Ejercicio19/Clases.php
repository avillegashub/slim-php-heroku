<?php

class Pasajero{


    private $_apellido;
    private $_nombre;
    private $_dni;
    private $_esPlus;

    public function __construct($a, $n, $d, $e)
    {
        $this->_apellido = $a;
        $this->_nombre = $n;
        $this->_dni = $d;
        $this->_esPlus = $e;
    }

    public static function Equals ($p1, $p2)
    {
        if($p1->_dni == $p2->_dni)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function GetInfoPasajero()
    {
        $info = $this->_apellido;
        $info .= ", ";
        $info .= $this->_nombre;
        $info .= ", ";
        $info .= $this->_dni;
        $info .= ", ";
        if($this->_esPlus)
        $info .= "Plus<br/>";
        else
        $info .= "Simple<br/>";

        
        return  $info;
    }

    public function MostrarPasajero()
    {
        echo "Apellido: $this->_apellido<br/>";
        echo "Nombre: $this->_nombre<br/>";
        echo "DNI: $this->_dni<br/>";
        echo "Plus: $this->_esPlus<br/>";
    }

    public function GetPlus()
    {
        return $this->_esPlus;
    }

}

class Vuelo
{
    private $_fecha;
    private $_empresa;
    private $_precio;
    private $_listaDePasajeros;
    private $_cantMaxima;

    public function GetCantMax()
    {
        return $this->_cantMaxima;
    }

   

    function __construct()
    {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 2:
                self::__construct1($argv[0], $argv[1]);
                break;
            case 3:
                self::__construct2($argv[0], $argv[1], $argv[2]);
                break;
                }
    }

    private function __construct1($e, $p)
    {
        $this->_fecha = date("d.m.y");
        $this->_empresa = $e;
        $this->_precio = $p;
        $this->_listaDePasajeros = array();
        $this->_cantMaxima = 100;
    }

    private function __construct2($e, $p, $c)
    {
        $this->__construct1($e, $p);
        $this->_cantMaxima = $c;

    }

    function GetInfo()
    {
        $info = "Fecha: $this->_fecha<br/>";
        $info .= "Empresa: $this->_empresa<br/>";
        $info .= "Precio: $this->_precio<br/>";
        $info .= "Cantidad Maxima: $this->_cantMaxima<br/>";
        $info .= "Pasajeros:<br/>";
        
        if(count($this->_listaDePasajeros)>0)
        foreach ($this->_listaDePasajeros as $key => $value) {
            $info .=$value->GetInfoPasajero();
        }
        $info .= "<br/>";
        return $info;
    }

    function AgregarPasajero( $p)
    {
        if(!($this->Equals($p)) && $this->_cantMaxima > count($this->_listaDePasajeros))
        {
            array_push( $this->_listaDePasajeros, $p );
            return 0;
        }
        return -1;
    }
    
    function Equals($p)
    {   //if($this->_listaDePasajeros != NULL && count($this->_listaDePasajeros) >0)
        foreach ($this->_listaDePasajeros as $key => $value) {
                    if(Pasajero::Equals($p, $value))
                        return TRUE;
        }      
        return FALSE; 
    }

    public static function Add($v1, $v2)
    {
        $recaudado = 0;
        foreach ($v1->_listaDePasajeros as $key => $value) {
            if($value->GetPlus())
            {
                $recaudado += $v1->_precio * 80 / 100;
            }
            else{
                $recaudado += $v1->_precio;
            }
        }
        foreach ($v2->_listaDePasajeros as $key => $value) {
            if($value->GetPlus())
            {
                $recaudado += $v2->_precio * 80 / 100;
            }
            else{
                $recaudado += $v2->_precio;
            }
        }
        return $recaudado;
    }

    public static function Remove($v, $p)
    {
        if($v->Equals($p))
        {
            for ($i=0; $i < count($v->_listaDePasajeros) ; $i++) { 

                if(Pasajero::Equals($v->_listaDePasajeros[$i], $p))
                {
                    unset($v->_listaDePasajeros[$i]);
                    return $v;
                }
            }
        }
        return $v;
    }

}



?>