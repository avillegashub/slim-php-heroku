<?php
/******************************************************************************

Alvaro Villegas

Aplicación No 13 (Invertir palabra)
Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La
función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
“Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán:
1 si la palabra pertenece a algún elemento del listado.
0 en caso contrario.
*******************************************************************************/

$palabra="Parcial";

echo Validar($palabra, 20);echo "<br/>";


echo Validar("Nada", 4);echo "<br/>";
echo Validar("Nada", 0);


function Validar (string $p, int $max)
{
    if(strlen($p)< $max && ( strcmp($p, "Parcial") || strcmp($p, "Recuperatorio") || strcmp($p, "Programación")) )
    return 1;
    else
    return 0;
}


?>

