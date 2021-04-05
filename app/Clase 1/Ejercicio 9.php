<?php
/*
Alvaro Villegas
Aplicación No 9 (Arrays asociativos)
Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
lapiceras.
*/


$lapicera = array();

$lapicera[0] = array("color"=>"rojo", "marca"=>"uno", "trazo" => "Thick", "precio"=> 100);

$lapicera[1] = array("color"=>"azul", "marca"=>"dos", "trazo" => "Thin", "precio"=> 200);

$lapicera[2] = array("color"=>"verde", "marca"=>"tres", "trazo" => "invisible", "precio"=> 300);

foreach ($lapicera as $key => $value) {
    echo "---------------<br/>";
    echo "Color:" . $value["color"] . "<br/>";
    echo "Marca:" . $value["marca"] . "<br/>";
    echo "Trazo:" . $value["trazo"] . "<br/>";
    echo "Precio:" . $value["precio"] . "<br/>";
    

}