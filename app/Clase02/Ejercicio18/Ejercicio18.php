<?php

/*
Alvaro Villegas

Aplicación Nº 18 (Auto - Garage)
Crear la clase Garage que posea como atributos privados:
_razonSocial (String)
_precioPorHora (Double)
_autos (Autos[], reutilizar la clase Auto del ejercicio anterior)
Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:
i. La razón social.
ii. La razón social, y el precio por hora.
Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
que mostrará todos los atributos del objeto.
Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
(sólo si el auto no está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Add($autoUno);
Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
“Garage” (sólo si el auto está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Remove($autoUno);
En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los
métodos.*/

include_once "Clases.php";

$garage1 = new Garage("Garage1");
$garage2 = new Garage("Garage2", 1000);

$auto1 = new Auto("Marca1", "Verde", 100000, date("d.m.y"));
$auto2 = new Auto("Marca2", "Rojo", 200000, date("d.m.y"));
$auto3 = new Auto("Marca3", "Azul", 300000, date("d.m.y"));
$auto4 = new Auto("Marca4", "Negro", 400000, date("d.m.y"));
$auto5 = new Auto("Marca5", "Blanco", 500000, date("d.m.y"));

$garage1->Add($auto1);
$garage1->Add($auto2);
$garage1->Add($auto3);
$garage1->MostrarGarage();
$garage1->Add($auto1);
$garage1->MostrarGarage();
$garage1->Remove($auto2);
$garage1->MostrarGarage();

$garage2->Add($auto4);
$garage2->Add($auto5);
$garage2->MostrarGarage();


?>