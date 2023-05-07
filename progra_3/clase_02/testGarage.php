<?php

require "./ejer_22.php";

    $auto_2_1 = new Auto("Pepe", "Azul");
    $auto_2_2 = new Auto("Pepe", "Rojo");
    $auto_3_1 = new Auto("Ronaldinio", "Verde", 1000);
    $auto_3_2 = new Auto("Ronaldinio", "Verde", 500);
    $auto_5 = new Auto("Messi", "Azul", 1500, new DateTime('2003-8-7'));;

    $garage_1 = new Garage("Escape");
    $garage_2 = new Garage("Trafico", 5000);

    echo "<br><br>Mostrar g1: <br><br>" . $garage_1->MostrarGarage() . "<br><br>";
    echo "Mostrar g2: <br><br>" . $garage_2->MostrarGarage() . "<br><br>";

    $garage_1->Add($auto_2_1);
    $garage_1->Add($auto_3_1);
    $garage_1->Add($auto_5);

    $garage_2->Add($auto_2_2);
    $garage_2->Add($auto_3_1);

    echo "Mostrar g1: <br><br>" . $garage_1->MostrarGarage() . "<br><br>";
    echo "Mostrar g2: <br><br>" . $garage_2->MostrarGarage() . "<br><br>";

    $garage_1->Remove($auto_5);

    echo "Mostrar g1: <br><br>" . $garage_1->MostrarGarage() . "<br><br>";


?>