<?php


abstract class FiguraGeometrica{
    
    
    protected $_color;
    protected $_perimetro;
    protected $_superficie;

    public function __construct()
    {
        
    }

    public function GetColor()
    {
        return $this->$_color;
    }

    public function SetColor( string $c)
    {
        $this->$_color = $c;
    }

    abstract function ToString();
    

    public abstract function Dibujar()
    {

    }

    protected abstract function CalcularDatos()
    {

    }

}

class Rectangulo extends FiguraGeometrica
{
    protected $_ladoDos;
    protected $_ladoUno;

    public function __construct()
    {

    } 
}