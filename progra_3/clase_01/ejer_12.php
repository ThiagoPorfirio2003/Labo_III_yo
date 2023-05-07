<?php

    /*
    Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
    contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
    lapiceras.
    */

    // Si quiero hacer esto $lapiceras = array('juan' => , );


    $lapiceras = array('color' => array(), 'marca' => array(), 'trazo' => array(), 'precio' => array());

    $lapiceras['color'][0] = "Amarillo";
    $lapiceras['color'][1] = "Rojo";
    $lapiceras['color'][2] = "Verde";

    $lapiceras['marca'][0] = "AMD";
    $lapiceras['marca'][1] = "Ryzer";
    $lapiceras['marca'][2] = "Bic";

    $lapiceras['trazo'][0] = "Fino";
    $lapiceras['trazo'][1] = "Mediano";
    $lapiceras['trazo'][2] = "Grueso";

    $lapiceras['precio'][0] = '$50';
    $lapiceras['precio'][1] = '$100';
    $lapiceras['precio'][2] = '$150';

    for($i = 0; $i<3; $i++)
    {        
        foreach($lapiceras as $k => $value)
        {
            echo $value[$i] . "<br>";
        }
        echo "<br>";
    }


?>