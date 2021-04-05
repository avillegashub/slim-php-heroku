<?php

class Auto
{

    public $_color;
    public $_precio;
    public $_marca;
    public $_fecha;



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
            case 4:
                self::__construct3($argv[0], $argv[1], $argv[2], $argv[3]);
                break;
        }
    }

    private function __construct1(string $marca, string $color)
    {
        $this->_marca = $marca;
        $this->_color = $color;
    }

    private function __construct2(string $marca, string $color, int $precio)
    {
        $this->__construct1($marca, $color);
        $this->_precio = $precio;
    }

    private  function __construct3(string $marca, string $color, int $precio, string $fecha)
    {
        $this->__construct2($marca, $color, $precio);

        $this->_fecha = $fecha;
    }

    public function AgregarImpuestos($impuesto)
    {
        $this->_precio += $impuesto;
    }

    static function MostrarAuto(Auto $auto)
    {
        echo "<br/>------------------";
        echo "<br/>Marca: $auto->_marca";
        echo "<br/>Color: $auto->_color";
        if ($auto->_precio != NULL) {
            echo "<br/>Precio: $auto->_precio";
        }
        if ($auto->_fecha != NULL) {
            echo "<br/>Fecha: $auto->_fecha<br/><br/>";
        }
    }

    static function Equals(Auto $a1, Auto $a2)
    {
        return $a1->_marca == $a2->_marca;
    }

    static function Add(Auto $a1, Auto $a2)
    {
        if (Auto::Equals($a1,  $a2) && $a1->_color == $a2->_color) {
            return $a1->_precio + $a2->_precio;
        }
        return 0;
    }
}

class Garage
{

    public $_razonSocial;
    public  $_precioPorHora;
    public $_autos = array();

    function __construct()
    {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 1:
                self::__construct1($argv[0]);
                break;
            case 2:
                self::__construct2($argv[0], $argv[1]);
                break;
        }
    }

    private function __construct1(string $razonSocial)
    {
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora = 999;
    }

    private function __construct2(string $razonSocial, $precioPorHora)
    {
        $this->__construct1($razonSocial);
        $this->_precioPorHora = $precioPorHora;
    }

    public function MostrarGarage()
    {
        echo "Razon Social : $this->_razonSocial<br/>";
        echo "Precio Por hora : $this->_precioPorHora<br/>";
        foreach ($this->_autos as $key => $value) {
            Auto::MostrarAuto($value);
        }
    }

    public function Equals($auto)
    {
        foreach ($this->_autos as $key => $value) {
            if ($value == $auto) {
                return TRUE;
            }
        }
        return FALSE;
    }

    public function Add($auto)
    {
        if (!($this->Equals($auto)))
            array_push($this->_autos, $auto);
        else
            echo "<br/><br/>Auto ya está registrado<br/><br/>";
    }
    public function Remove($auto)
    {
        for ($i = 0; $i <  count($this->_autos); $i++) {
            if ($this->_autos[$i]->_marca == $auto->_marca)
            {

                unset($this->_autos[$i]);
                break;
            }
        }
    }
}
