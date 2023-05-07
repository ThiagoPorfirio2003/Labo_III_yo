<?php
require "./ejer_21.php";
//require "../Biblioteca_Tareas/ejer_21.php";

/*
Crear la clase Garage que posea como atributos privados:

_razonSocial (String)
_precioPorHora (Double)
_autos (Autos[], reutilizar la clase Auto del ejercicio anterior)

Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:

i. La razón social.
ii. La razón social, y el precio por hora.

Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y que
mostrará todos los atributos del objeto.
Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage” (sólo si
el auto no está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Add($autoUno);
Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del “Garage”
(sólo si el auto está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Remove($autoUno);
En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los métodos.
*/

class Garage
{
    private string $_razonSocial;
    private float $_precioPorHora;
    private $_autos;

    public function __construct(string $_razonSocial, float $precioPorHora = 0)
    {
        $this->_razonSocial = $_razonSocial;
        $this->_precioPorHora = $precioPorHora;
        $this->_autos = array();
    }

    public function MostrarGarage() : string
    {
        $retorno = "";

        $retorno .= "Razon social: " . $this->_razonSocial . "<br>
        Precio X hora: " . $this->_precioPorHora . "<br><br>";

        foreach($this->_autos as $auto)
        {
            $retorno .= Auto::MostrarAuto($auto) . "<br><br>";
        }

        return $retorno;
    }

    public function Equals(Auto $auto_original) : bool
    {
        $retorno = false;

        foreach($this->_autos as $auto)
        {
            if($auto_original -> Equals($auto))
            {
                $retorno = true;
                break;
            }
        }

        return $retorno;
    }

    public function Add(Auto $auto)
    {
        if(!($this->Equals($auto)))
        {   
            //$this->_autos+= $auto;
            array_push($this->_autos, $auto);           
        }
    }

    /*

En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los métodos.
    */

    public function Remove($auto_original) : void
    {
        for($i = 0; $i< count($this->_autos);$i++)
        {
            if($this->_autos[$i]->Equals($auto_original))
            {
                unset($this->_autos[$i]);
            }
        }
    }
}

?>