<?php
/*
Cargar los tres arrays con los siguientes valores y luego ‘juntarlos’ en uno. Luego mostrarlo por
pantalla.
“Perro”, “Gato”, “Ratón”, “Araña”, “Mosca”
“1986”, “1996”, “2015”, “78”, “86”
“php”, “mysql”, “html5”, “typescript”, “ajax”
*/

    $animales = array('Perro', 'Gato', 'Raton', 'Araña', 'Mosca');
    $fechas = array(1986, 1996, 2015, 78, 86);
    $lenguajes = array("php", "mysql", "html5", "typescript", "ajax");

    $arrays = array();

    array_push($arrays, $animales);
    array_push($arrays, $fechas);
    array_push($arrays, $lenguajes);

    foreach($arrays as $dato)
    {    
        foreach($dato as $valor)
        {
            echo $valor . " || ";
        } 
        echo "<br>";
    }

/*
    $animales = array('Perro', 'Gato', 'Raton', 'Araña', 'Mosca');
    $fechas = array(1986, 1996, 2015, 78, 86);
    $lenguajes = array("php", "mysql", "html5", "typescript", "ajax");

    $cosas_fucionadas = array_merge($animales, $fechas, $lenguajes);

    foreach($cosas_fucionadas as $dato)
    {
        //
        foreach($dato as $valor)
        {
            echo $valor . " || ";
        }
        //

        echo $dato . " || ";
        echo "<br>";
    }*/
?>