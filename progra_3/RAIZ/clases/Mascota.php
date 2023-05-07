<?php

namespace Animalitos;

class Mascota
{
    public string $_nombre;
    public string $_tipo;
    public int $_edad;

    public function __construct(string $nombre, string $tipo, int $edad=0)
    {
        $this->_nombre = $nombre;
        $this->_tipo = $tipo;
        $this->_edad = $edad;
    }

    public function toString() : string
    {
        return $this->_nombre . " - " . $this->_tipo . " - " . $this->_edad;
    }

    public static function mostrar(Mascota $m) : string
    {
        return $m->toString();
    }

    public function equals(Mascota $m1) : bool
    {
        return $this->_nombre == $m1->_nombre && $this->_tipo == $m1->_tipo; 
    }

}

?>