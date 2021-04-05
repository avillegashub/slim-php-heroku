<?php

/*

Alvaro Villegas

Aplicación No 10 (Arrays de Arrays)
Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
Arrays de Arrays.

*/

$lapiceraIndex = array();
$lapiceraAsoc = array();

$lapiceraIndex[0] = array("color"=>"rojo", "marca"=>"uno", "trazo" => "Thick", "precio"=> 100);
$lapiceraIndex[1] = array("color"=>"azul", "marca"=>"dos", "trazo" => "Thin", "precio"=> 200);
$lapiceraIndex[2] = array("color"=>"verde", "marca"=>"tres", "trazo" => "invisible", "precio"=> 300);

$lapiceraAsoc["uno"] = $lapiceraIndex[0];
$lapiceraAsoc["dos"] = $lapiceraIndex[1];
$lapiceraAsoc["tres"] = $lapiceraIndex[2];


foreach ($lapiceraIndex as $key => $value) {
    echo "---------------<br/>";
    echo "Color:" . $value["color"] . "<br/>";
    echo "Marca:" . $value["marca"] . "<br/>";
    echo "Trazo:" . $value["trazo"] . "<br/>";
    echo "Precio:" . $value["precio"] . "<br/>";
    

}

echo"------------------ Segundo Array --------------------";

foreach ($lapiceraAsoc as $key => $value) {
    echo "---------------<br/>";
    echo "Color:" . $value["color"] . "<br/>";
    echo "Marca:" . $value["marca"] . "<br/>";
    echo "Trazo:" . $value["trazo"] . "<br/>";
    echo "Precio:" . $value["precio"] . "<br/>";
    

}