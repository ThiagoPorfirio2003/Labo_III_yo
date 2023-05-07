<?php

class Pasajero
{
    private string $_apellido;
    private string $_nombre;
    private string $_dni;
    private bool $_esPlus;

    public function __construct(string $apellido, string $nombre, string $dni, bool $esPlus)
    {
        $this->_apellido = $apellido;
        $this->_nombre = $nombre;
        $this->_dni = $dni;
        $this->_esPlus = $esPlus;
    }

    public function Equals(Pasajero $pasajero) : bool
    {
        return $this->_dni === $pasajero->_dni;
    }

    public function GetInfoPasajero() : string
    {
        return "Apellido: " . $this->_apellido . "<br>Nombre: " . $this->_nombre . "<br>DNI: " . $this->_dni . 
        "<br>Es plus: " . $this->_esPlus;
    }

    public static function MostrarPasajero(Pasajero $pasajero) : string
    {
        return $pasajero ->GetInfoPasajero();
    }
}

?>