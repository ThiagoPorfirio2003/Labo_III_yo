<?php
/*
Generar una aplicación que sea capaz de copiar un archivo de texto (su ubicación se ingresará
por la página) hacia otro archivo que será creado y alojado en
./misArchivos/yyyy_mm_dd_hh_ii_ss.txt, dónde yyyy corresponde al año en curso, mm
al mes, dd al día, hh hora, ii minutos y ss segundos.
*/
    //$path .= isset($_POST["path"]) ? (string)$_POST["path"] : 0; 
    $archivo_nombre = "./archivos/ejer_26txt_";
    //$archivo_nombre .= date("Y_m_d_h_i_s") . ".txt";
    $archivo_nombre .= date("Y_m_d") . ".txt";

    /*
    while(!feof($archivo))
    {
        $txt .= fgets($archivo);
    }*/
    copy((string)$_POST["path"], $archivo_nombre);

    $archivo = fopen($archivo_nombre, "r");    

    $txt = fread($archivo, filesize($archivo_nombre));

    fclose($archivo);

    echo $txt;
?>