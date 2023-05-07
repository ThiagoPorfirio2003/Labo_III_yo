<?php
    /*Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
    supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
    se sumaron.*/

    $acumulador;

    $acumulador = 1;


    for($i=0;;$i++)
    {
        if($i+ $acumulador > 1000)
        {
            echo "<br>Cantidad de numeros sumados: " . $i;
            break;
        }
        else
        {   
            if($i % 10 === 0)
            {
                echo "<br>";
            }
            $acumulador = $i+ $acumulador;
            echo $acumulador . " || ";   
        }
    }
?>