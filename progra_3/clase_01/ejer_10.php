<?php
/*
Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números utilizando
las estructuras while y foreach.
*/

    $impares = array();
    $cantidad =0;
    $numero;
    $numero = 1;

    do{
        if($numero %2 === 1)
        {
            array_push($impares, $numero);
            $cantidad++;
        }
        $numero++;
    }while($cantidad < 10);


    foreach($impares as $valor)
    {
        echo $valor . "<br>";
    }
    
?>