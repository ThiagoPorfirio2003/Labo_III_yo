<?php 


    //Esto crea una constante
    define("VALOR", 3);


    $nombre = "juan";
    $numero = "25";
    $esVerdad = false;
    $nulo;

    //Esto causa error porque la variable no esta inicializada  
    //$algo;
    //echo $algo;

    enum Enumerado
    {
    	Case Uno;
    	Case Dos;
	    Case tres;
    }

    $mi_DatoEnum = Enumerado :: Dos;

    // Sirve para saber si no esta seteado, si tiene o no valor
    $nulo = isset($nulo) ? $h +1 : 0; 

    if($esVerdad)
    {
        echo "<br>";
        printf("%s", $numero);
    }
    else
    {
        $esVerdad = true;
    }

    echo $nombre;

    if($esVerdad)
    {
        echo "<br>";
        printf("\n %s \n", $numero);
    }


    echo "Sirve?\n\a";
    echo "Funciona!!\t";

?>