<?php

/*  
Alvaro Villegas

Aplicación Nº 20 (Operario - Fabrica)
SetAumentarSalario: Sólo permite asignar un nuevo salario al operario. La asignación
consiste en incrementar el salario de acuerdo al porcentaje que recibe como parámetro.
Constructores: realizar los constructores para cada clase (Fabrica y Operario) con los
parámetros que se detallan en la imagen.
En la clase Fabrica, la cantidad máxima de operarios será inicializada en 5.
Métodos (en Operario)
GetNombreApellido (de instancia): Retorna un String que tiene concatenado el nombre y el
apellido del operario separado por una coma.
Mostrar (de instancia): Retorna un String con toda la información del operario. Utilizar el
método GetNombreApellido.
Mostrar (de clase): Recibe un operario y retorna un String con toda la información del
mismo (utilizar el método Mostrar de instancia)
Crear el método de instancia “Equals” que permita comparar al objeto actual con otro de tipo
Operario. Retronará un booleano informando si el nombre, apellido y el legajo de los operarios
coinciden al mismo tiempo.
Métodos (en Fabrica)
RetornarCostos (de instancia, privado): Retorna el dinero que la fábrica tiene que gastar en
concepto de salario de todos sus operarios.
MostrarOperarios (de instancia, privado): Recorre el Array de operarios de la fábrica y
muestra el nombre, apellido y el salario de cada operario (utilizar el método Mostrar de
operario).
MostrarCosto (de clase): muestra la cantidad total del costo de la fábrica en concepto de
salarios (utilizar el método RetornarCostos).
Crear el método de clase “Equals”, recibe una Fábrica y un Operario. Retronará un booleano
informando si el operario se encuentra en la fábrica o no. Reutilizar código.
Add (de instancia): Agrega un operario al Array de tipo Operario, siempre y cuando haya
lugar disponible en la fábrica y el operario no se encuentre ya ingresado. Reutilizar código.
Retorna TRUE si pudo ingresar al operario, FALSE, caso contrario.
Remove (de instancia): Recibe a un objeto de tipo Operario y lo saca de la fábrica, siempre y
cuando el operario se encuentre en el Array de tipo Operario. Retorna TRUE si pudo quitar al
operario, FALSE, caso contrario.
Crear los objetos necesarios en testFabrica.php como para probar el buen funcionamiento de
las clases.

*/

include_once "Clases.php";

$fabrica = new Fabrica("Fabrica1");
$operario1 = new Operario ("111111111", "Alvarez", "Alberto")      ; 
$operario2 = new Operario ("222222222", "Barracas", "Beatriz")     ; 
$operario3 = new Operario ("333333333", "Carrero", "Carlos")       ; 
$operario4 = new Operario ("444444444", "Davila", "David")         ; 
$operario5 = new Operario ("555555555", "Esposito", "Ernesto")     ; 
$operario6 = new Operario ("666666666", "Fernandez", "Fabio")     ; 

$fabrica->Add($operario1);
$fabrica->Add($operario2);
$fabrica->Add($operario3);
$fabrica->Add($operario4);
$fabrica->Add($operario5);
$fabrica->Add($operario6);

echo $fabrica->Mostrar();

$fabrica->AumentarSalario(10, $operario1);

echo $fabrica->Mostrar();

$fabrica->Remove($operario2);

echo $fabrica->Mostrar();
