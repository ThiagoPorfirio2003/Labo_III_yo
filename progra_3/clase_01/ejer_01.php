<?php
/*
Aplicación No 1 (Mostrar variables)
Realizar un programa que guarde su nombre en $nombre y su apellido en $apellido. Luego
mostrar el contenido de las variables con el siguiente formato: Pérez, Juan. Utilizar el operador
de concatenación.
*/

    $apellido = "Porfirio";
    $nombre = "Thiago";

    echo "Mostrar nombre: <br><br>";

    echo "Usando echo $apellido . \", \" . $nombre;<br>";
    echo $apellido . ", " . $nombre . "<br>";

    echo 'Usando print($apellido . \", \" . $nombre . \"<br>\");';
    print($apellido . ", " . $nombre . "<br>");

    echo
    printf('%s, %s <br>', $apellido,$nombre);

?>