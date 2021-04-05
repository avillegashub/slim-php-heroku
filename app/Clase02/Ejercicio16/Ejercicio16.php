<?php

/*
Alvaro Villegas

La clase Punto ha de tener dos atributos privados con acceso de sólo lectura (sólo con
getters), que serán las coordenadas del punto. Su constructor recibirá las coordenadas del
punto.
La clase Rectangulo tiene los atributos privados de tipo Punto _vertice1, _vertice2, _vertice3
y _vertice4 (que corresponden a los cuatro vértices del rectángulo).
La base de todos los rectángulos de esta clase será siempre horizontal. Por lo tanto, debe tener
un constructor para construir el rectángulo por medio de los vértices 1 y 3.
Los atributos ladoUno, ladoDos, área y perímetro se deberán inicializar una vez construido el
rectángulo.
Desarrollar una aplicación que muestre todos los datos del rectángulo y lo dibuje en la página. 

*/
$punto1 = new Punto(1, 10);
$punto2 = new Punto(30, 60);
$rectangulo = new Rectangulo($punto1, $punto2);





$rectangulo->Dibujar();

class Rectangulo
{
    private  Punto $_vertice1;
    private  Punto $_vertice2;
    private  Punto $_vertice3;
    private  Punto $_vertice4;

    public $area;
    public $ladoDos;
    public $ladoUno;
    public $perimetro;

    function __construct($v1, $v3)
    {
        $this->_vertice1 = $v1;
        $this->_vertice3 = $v3;
        $this->ladoUno = rand(1, 20);
        $this->ladoDos = rand(1, 20);
        $this->perimetro = ($this->ladoDos + $this->ladoUno) * 2;
        $this->area = pow($this->ladoDos + $this->ladoUno, 2);
    }

    function Dibujar()
    {
        echo "Perimetro: $this->perimetro <br/>";
        echo "Area: $this->area<br/>";
        /* no sé como se dibuja con las Coordenadas !!! */
    }
}


class Punto
{

    private int $_x;
    private int $_y;

    public function __construct($x, $y)
    {
        $this->_x = $x;
        $this->_y = $y;
    }

    function GetX()
    {
        return $_x;
    }

    function GetY()
    {
        return $_y;
    }
}
