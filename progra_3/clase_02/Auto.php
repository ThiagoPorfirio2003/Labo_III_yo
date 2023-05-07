<?php
/*
class Auto
{
    private string $_color;
    private float $_precio;
    private string $_marca;
    private DateTime $_fecha;

    public function __construct(string $marca, string $color, float $precio = 0, DateTime $fecha = new DateTime("now"))
    {
        $this -> _marca = $marca;
        $this -> _color = $color;
        $this -> _precio = $precio;
        $this -> _fecha = $fecha;    
    }

    public function AgregarImpuestos(float $impuesto) : void
    {
        $this -> _precio += $impuesto; 
    }

    public static function MostrarAuto(Auto $auto) : string
    {
        return "Color: " . $auto -> _color . "<br>Precio: " . $auto->_precio . "<br>Marca: " . 
        $auto -> _marca . "<br>Fecha de fabricacion: " . ($auto ->_fecha)->format('d.m.Y');
    }

    public function Equals(Auto $auto) : bool
    {
        return $this->_marca === $auto->_marca;
    }

    public static function add(Auto $a1, Auto $a2) : float
    {
        $retorno = 0;

        if($a1->Equals($a2) && $a1 -> _color === $a2 -> _color)
        {
            $retorno += $a1-> _precio + $a2->_precio;
        }
        else
        {
            echo "NO SE PUDO COMPARAR <br><br>";
        }

        return $retorno;
    }
}
*/
?>