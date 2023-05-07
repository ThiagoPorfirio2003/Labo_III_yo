<?php

namespace Negocios;

require_once "./clases/Mascota.php";

use Animalitos\Mascota;

class Guarderia
{
    public string $_nombre;
    //public Mascota $mascotas;
    public array $_mascotas;

    public function __construct(string $nombre)
    {
        $this->_nombre = $nombre;
        $this->_mascotas = array();
    } 

    public static function equals(Guarderia $g, Mascota $m) : bool
    {
        $retorno = false;

        foreach($g->_mascotas as $auxiliar)
        {
            if($m->equals($auxiliar))
            {
                $retorno = true;
                break;
            }
        }

        return $retorno;
    }

    public function add(Mascota $m) : bool
    {
        $retorno = Guarderia::equals($this,$m);

        if(!$retorno)
        {
            array_push($this->_mascotas, $m);
        }

        return $retorno;
    }

    public function toString() : string
    {
        $retorno = "";
        $promedioEdad = 0;

        $retorno .= $this->_nombre . "<br>";

        foreach($this->_mascotas as $m)
        {
            $retorno .= "<br>" . Mascota::mostrar($m);//$m->toString();
            $promedioEdad += $m->_edad;
        }

        $promedioEdad = $promedioEdad / count($this->_mascotas); 

        return $retorno;
    }
}


?>