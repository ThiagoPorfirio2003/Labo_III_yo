<?php
/*
Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La función
validará que la cantidad de caracteres que tiene $palabra no supere a $max y además deberá
determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
“Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán:
1 si la palabra pertenece a algún elemento del listado.
0 en caso contrario.
*/
    function validador(string $palabra_Original, int $max) : int
    {
        $retorno = 0;

        $cantidad_caracteres = strlen($palabra_Original);

        if($cantidad_caracteres <= $max &&
        ($cantidad_caracteres == 13 ||
        $cantidad_caracteres == 7 ||
        $cantidad_caracteres == 12))
        {
            $retorno = 1;
        }

        return $retorno;
    }

    echo validador("Eugenios6trew", 13);

?>