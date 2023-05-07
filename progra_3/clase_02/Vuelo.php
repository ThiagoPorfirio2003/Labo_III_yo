<?php

require_once "./Pasajero.php";

class Vuelo
{
    private DateTime $_fecha;
    private string $_empresa;
    private float $_precio;
    private $_listaDePasajeros;
    private int $_cantidadMaxima;

    public function __construct(string $empresa, float $precio, int $cantidadMaxima =5)
    {
        $this->_cantidadMaxima = $cantidadMaxima;
        $this->_empresa = $empresa;
        $this->_precio = $precio;
        $this->_listaDePasajeros = array();
        $this->_fecha = $cantidadMaxima;

    }
    
/*

Crear un método de instancia llamado AgregarPasajero, en el caso que no exista en la lista, se
agregará (utilizar Equals). Además tener en cuenta la capacidad del vuelo. El valor de retorno de
este método indicará si se agregó o no.

Crear el método de clase “Add” para que permita sumar dos vuelos. El valor devuelto deberá ser de
tipo numérico, y representará el valor recaudado por los vuelos. Tener en cuenta que si un pasajero
es Plus, se le hará un descuento del 20% en el precio del vuelo.
Crear el método de clase “Remove”, que permite quitar un pasajero de un vuelo, siempre y cuando
el pasajero esté en dicho vuelo, caso contrario, informarlo. El método retornará un objeto de tipo
Vuelo.
*/

    public function GetInfo() : bool
    {
        return "Fecha: " . $this-> _fecha . 
        "Empresa: " . $this->_empresa . 
        "Precio: " . $this->_precio .
        "Cantidad maxima de pasajero: " . $this->_cantidadMaxima .
        "Pasajeros: <br><br>";

        foreach($this->_listaDePasajeros as $pasajero)
        {
            //echo (Pasajero)($pasajero->GetInfo);
            echo $pasajero->GetInfo . "<br><br>";
        }
    }

    /*

Crear un método de instancia llamado AgregarPasajero, en el caso que no exista en la lista, se
agregará (utilizar Equals). Además tener en cuenta la capacidad del vuelo. El valor de retorno de
este método indicará si se agregó o no.

*/

    public function AgregarPasajero(Pasajero $nuevoPasajero) : bool
    {
        $retorno = false;

        if(count($this->_listaDePasajeros) <$this->_cantidadMaxima)
        {
            foreach($this->_listaDePasajeros as $pasajero)
            {
                if(!($nuevoPasajero->Equals($pasajero)))
                {
                    array_push($this->_listaDePasajeros, $pasajero);
                    $this->_cantidadMaxima++;
                    $retorno =true;
                    break;
                }
            }
        }

        return $retorno;
    }

    public static function Add() : void
    {

    }

}

?>