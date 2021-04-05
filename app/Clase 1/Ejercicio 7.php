<?php   

/*

Alvaro Villegas

Aplicación No 7 (Mostrar impares)
Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números utilizando
las estructuras while y foreach.

*/

$impares =array();
$flag=1;

for($i=1; $i<=19; $i+=2)
{
    $impares[$i]=rand();
    echo $impares[$i];
    
    echo "<br/>";
    
}

echo "<br/>";
echo "While";
echo "<br/>";
while($flag <= 19)
{
   
    echo $impares[$flag];
    echo "<br/>";
    $flag += 2;
}

echo "<br/>";
echo "ForEach";
echo "<br/>";
foreach ($impares as $i => $value) {
    if($value != null)
    echo $value;
    echo "<br/>";
}




