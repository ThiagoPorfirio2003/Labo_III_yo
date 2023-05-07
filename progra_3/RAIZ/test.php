<?php

require_once "./clases/Mascota.php";
require_once "./clases/Guarderia.php";

use Animalitos\Mascota;
use Negocios\Guarderia;

    $m1 = new Mascota("Juancito", "Loro");
    $m2 = new Mascota("Juancito", "Perro");

    echo $m1->toString() . "<br>" . Mascota::mostrar($m2);

    echo "<br>Comparacion: " . $m1->equals($m2) . "<br><br>";
    
    $m3 = new Mascota("Esteban", "Gato", 5);
    $m4 = new Mascota("Esteban", "Gato" , 2);

    echo $m3->toString() . "<br>" . Mascota::mostrar($m4);

    echo "<br>Comparacion: " . $m3->equals($m4);

    echo "<br><br>1v3: " . $m1->equals($m3);

    $g = new Guarderia("La guarderia de pancho");

    $g->add($m1);
    $g->add($m2);
    $g->add($m3);
    $g->add($m4);


    echo "MOSTRANDO GUADERIA: <br><br><br>: " . $g->toString();
?>