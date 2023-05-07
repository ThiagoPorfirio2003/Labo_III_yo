<?php

    $sin_explode = "Juan-Hernesto-Renzo-Thiago";
    $con_explode = explode("-",$sin_explode);
    $con_trim = [trim($con_explode[0]), trim($con_explode[1]), trim($con_explode[2]), trim($con_explode[3])];

    echo $sin_explode . "<br>";

    foreach($con_explode as $value)
    {
        echo $value; //. " ";
    }

    echo "<br>";

    foreach($con_trim as $value)
    {
        echo $value ;//. " ";
    }
?>