<?php

class Auto
{

    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;



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
            echo "<br/>Precio: $auto->_fecha";
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
