<?php

    /*
    Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden de las
    letras del Array.
    */
    function inversor_arrays($palabra)
    {
        $nueva_Palabra = array();
        for($i = strlen($palabra)-1; $i > -1;$i--)
        {
            array_push($nueva_Palabra, $palabra[$i]);
        }

        return $nueva_Palabra;
        //return strrev($palabra);
    }

    $palabra_Original = "Esteban";

    //echo $palabra_original . "<br>" . inversor_Arrays($palabra_original);

    echo $palabra_Original . "<br>";

    foreach(inversor_arrays($palabra_Original) as $value)
    {
        echo $value;
    }
?>