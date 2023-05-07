<?php
/*
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado.
*/

    $enteros;
    $acumulador = 0;
    $promedio;
    $mensaje;

    $mensaje = "<br>Promedio = ";

    for($i =0; $i<6; $i++)
    {
        $enteros[$i] = rand(6,6);
        echo var_dump($enteros[$i]) . "<br>";
    }

    echo "<br>";

    foreach($enteros as $valor)
    {      
        $acumulador+= $valor;   
        echo $valor . "<br>"; 
    }

    $promedio = $acumulador /6;

    if($promedio < 6)
    {
        $mensaje .= "Menor a 6";
    }
    else if($promedio == 6)
    {
        $mensaje .= " 6";
    }
    else
    {
        $mensaje .= "Mayor a 6";
    }

    echo $mensaje;
?>