<?php

//

/*
Se quiere realizar una aplicación que lea un archivo (../misArchivos/palabras.txt) y ofrezca
estadísticas sobre cuantas palabras de 1, 2, 3, 4 y más de 4 letras hay en el texto. No tener en
cuenta los espacios en blanco ni saltos de líneas como palabras.
Los resultados mostrarlos en una tabla.
*/
    function analizador(string $txt) : array
    {
        $letras_de_palabra = 0;
        $palabras = array(0,0,0,0,0);
        for($i=0; $i<strlen($txt); $i++)
        {
            if($txt[$i] != ' ' && $txt[$i] != '-' && $txt[$i] != "" && $txt[$i] != '')
            {
                $letras_de_palabra++;
            }
            else
            {
                switch($letras_de_palabra)
                {
                    case 1:
                        $palabras[$letras_de_palabra-1]++;
                        break;

                    case 2:
                        $palabras[$letras_de_palabra-1]++;
                        break;

                    case 3:
                        $palabras[$letras_de_palabra-1]++;
                        break;

                    case 4:
                        $palabras[$letras_de_palabra-1]++;
                        break;

                    default:
                        $palabras[4]++;
                        break;
                }
                $letras_de_palabra=0;
            }
            $letra = $txt[$i];
        }

        switch($letras_de_palabra)
                {
                    case 1:
                        $palabras[$letras_de_palabra-1]++;
                        break;

                    case 2:
                        $palabras[$letras_de_palabra-1]++;
                        break;

                    case 3:
                        $palabras[$letras_de_palabra-1]++;
                        break;

                    case 4:
                        $palabras[$letras_de_palabra-1]++;
                        break;

                    default:
                        $palabras[4]++;
                        break;
                }
        return $palabras;
    }

    /*
Se quiere realizar una aplicación que lea un archivo (../misArchivos/palabras.txt) y ofrezca
estadísticas sobre cuantas palabras de 1, 2, 3, 4 y más de 4 letras hay en el texto. No tener en
cuenta los espacios en blanco ni saltos de líneas como palabras.
Los resultados mostrarlos en una tabla.
*/
    $archivo = fopen("./archivos/ejer_25.txt", "r");

    $archivo_leido = fread($archivo, filesize("./archivos/ejer_25.txt"));

    $contador = analizador($archivo_leido);

    echo $archivo_leido . "<br><br>";

    for($i = 0; $i< count($contador); $i++)
    {
        echo "Palabras de " . $i+1 . " letras: " . $contador[$i] . "<br>\n";
    }

    fclose($archivo);
?>