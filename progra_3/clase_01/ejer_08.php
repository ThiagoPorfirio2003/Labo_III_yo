<?php
/*
Realizar un programa que en base al valor numérico de la variable $num, pueda mostrarse por
pantalla, el nombre del número que tenga dentro escrito con palabras, para los números entre
el 20 y el 60.
*/

    $num = 40;
    $resto;
    $numTxt;

    $num = 26;

    if($num < 61 && $num > 19)
    {
        $res = 1;
        $resto = $num % 10;

        switch((int)($num / 10))
        {
            case 2:
                if($resto==0)
                {
                    $numTxt = "Veinte";
                }
                else
                {
                    $numTxt = "Veinti ";
                }
                break;

            case 3:
                $numTxt = "Treinta";
                break;

            case 4:
                $numTxt = "Cuarenta";
                break;
            
            case 5:
                $numTxt = "Cincuenta";
                break;

            case 6:
                $numTxt = "Sesenta";
                break;
        }

        if((int)($num /10) != 2)
        {
            $numTxt = $numTxt . " y ";
        }

        switch($resto)
        {
            case 1:
                $numTxt .= "uno";
                break;

            case 2:
                $numTxt .= "dos";
                break;

            case 3:
                $numTxt .= "tres";
                break;
            
            case 4:
                $numTxt .= "cuatro";
                break;

            case 5:
                $numTxt .= "cinco";
                break;

            case 6:
                $numTxt .= "seis";
                break;

            case 7:
                $numTxt .= "siete";
                break;

            case 8:
                $numTxt .= "ocho";
                break;
            
            case 9:
                $numTxt .= "nueve";
                break;
        }

        echo $numTxt;
    }


?>