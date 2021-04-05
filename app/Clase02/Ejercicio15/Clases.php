<?php


abstract class FiguraGeometrica{
    
    
    protected $_color;
    protected $_perimetro;
    protected $_superficie;

    public function __construct()
    {
        $this->SetColor("red");
    }

    public function GetColor()
    {
        return $this->_color;
    }

    public function SetColor($c)
    {
        $this->_color = $c;
    }

    function ToString()
    {
        echo "Perimetro : $this->_perimetro<br/>";
        echo "Superficio : $this->_superficie<br/>";
    }
    
    abstract function Dibujar();
    
    protected abstract function CalcularDatos();

}

class Rectangulo extends FiguraGeometrica
{
    protected $_ladoDos;
    protected $_ladoUno;

    function ToString()
    {
        echo "--- Rectangulo ---<br/>";
        echo parent::ToString();
        echo "<br/>";
        $this->Dibujar();

    }

    function Dibujar()
    {
        $color = $this->GetColor();

        for ($i=0; $i < 4; $i++) { 
            echo "<font color=$color>     ********** </font><br/> ";
          }
    }

    protected function CalcularDatos()
    {
            $this->_perimetro = ($this->_ladoUno + $this->_ladoDos) * 2;
            $this->_superficie = $this->_ladoUno * $this->_ladoDos;
    }

    public function __construct($l1, $l2)
    {   
        parent:: __construct();
        $this->_ladoUno = $l1;
        $this->_ladoDos = $l2;
        
        $this->CalcularDatos();

    } 
}

class Triangulo extends FiguraGeometrica
{
    protected $_altura;
    protected $_base;

    function ToString()
    {
        echo "--- Triangulo ---<br/>";
        echo parent::ToString();
        echo "<br/>";
        $this->Dibujar();
    }

    function Dibujar()
    {
        $color = $this->GetColor();
        
        echo "<font color=$color >      * </font> <br/>";
        echo "<font color=$color >    *** </font> <br/>";
        echo "<font color=$color >   ***** </font> <br/>";
    }

    protected function CalcularDatos()
    {
        $this->_perimetro = $this->_base * 3;


        $this->_superficie = $this->_altura * $this->_base / 2;
    }

    public function __construct($b, $h)
    {
        parent:: __construct();
        $this->_base = $b;
        $this->_altura = $h;
        $this->CalcularDatos();
    } 
}


?>