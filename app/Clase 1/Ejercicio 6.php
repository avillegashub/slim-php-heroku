<?php

/*

Alvaro Villegas

Aplicación No 6 (Carga aleatoria)
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado.

*/

$enteros = array();
$suma = 0;



for($i=0; $i<5; $i++)
{
    $enteros[$i] =rand(min:1, max:10);
}

foreach($enteros as $e)
{
    $suma+=$e;
}

$suma /= 5;

if($suma > 6)
echo "El promedio es mayor de 6";
else if ($suma < 6)
echo "El promedio es menor de 6";
else
echo "El promedio es 6";
