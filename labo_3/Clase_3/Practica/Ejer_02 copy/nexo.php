<?php
    $archivo = isset($_POST["path"]) ? (string)($_POST["path"]) : false;

    //echo var_dump($archivo);
    
    if($archivo != false)
    {
        if(file_exists($archivo))
        {
            $ar_leido = fopen($archivo, "r");
            $lectura = fread($ar_leido, filesize($archivo));

            fclose($ar_leido);
    
            echo $lectura;
        }
        else
        {
            echo "Path incorrecto";
        }   
        //echo $archivo["tmp_file"];
    }

?>