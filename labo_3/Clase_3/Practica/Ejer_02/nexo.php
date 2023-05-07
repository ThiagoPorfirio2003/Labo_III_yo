<?php
    $archivo = isset($_FILES["archivo"]) ? $_FILES["archivo"] : false;

    if($archivo != false)
    {
        move_uploaded_file($archivo["tmp_name"], "./foto/hola.txt");
        $ar_leido = fopen("./foto/hola.txt", "r");

        $lectura = fread($ar_leido, filesize("./foto/hola.txt"));

        fclose($ar_leido);

        echo $lectura;
        //echo $archivo["tmp_file"];
    }
    else
    {
        var_dump($archivo);
        echo "Path incorrecto";
    }
?>