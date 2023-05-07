<?php

/*
Mostrar por pantalla las primeras 4 potencias de los números del uno 1 al 4 (hacer una función que
las calcule invocando la función pow).
*/

//require_once "../Biblioteca_Tareas/Manejo_Numeros.php";

    /*
    use Manejo_Numeros\ 
    {
        function get_potencias
    };*/

    function get_potencias(int $numero = 1, int $cantidad_potencias = 1) : array
    {
        $potencias = array();
        for($i = 1; $i<$cantidad_potencias+1;$i++)
        {
            array_push($potencias, pow($numero, $i));
        }
        return $potencias;
    }

    for($i =1; $i<5; $i++)
    {
        echo "Potencias de: " . $i . "<br>";
        foreach(get_potencias($i,4) as $value)
        {
            echo $value . "<br>";
        }
        echo "<br>";
    }

?>