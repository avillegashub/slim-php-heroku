<?php
/******************************************************************************

Alvaro Villegas

Aplicación No 11 (Potencias de números)
Mostrar por pantalla las primeras 4 potencias de los números del uno 1 al 4 (hacer una función
que las calcule invocando la función pow).

*******************************************************************************/

for ($i=1; $i<5 ; $i++) { 

    for ($e= 1; $e < 5; $e++) { 
        echo $i," ^ " ,$e, " = " ,pow($i, $e);
        echo "<br/>";
    }
}


?>

