<?php

namespace Ejercicio_19;

//require "../Biblioteca_Tareas/FiguraGeometrica.php";

class Triangulo extends FiguraGeometrica
{
    private float $_altura;
    private float $_base;

    public function __construct(float $l1, float $l2)
    {
        parent :: __construct();
        $this-> _altura = $l1;
        $this -> _base = $l2;
        $this -> CalcularDatos();
    }

    public function ToString(): string
    {
        return "Figura: Triangulo <br>" . parent :: ToString();
    }

    public function Dibujar() : void
    {
 
        for($i = $this-> _base; $i > 0; $i--)
        {
            for($j = 0; $j< $i; $j++)
            {
                echo "-";
            }

            for($j = $this -> _base; $j>= $i; $j--)
            {
                echo "*";
            }

            echo "<br>";
        }
    }    

    protected function CalcularDatos(): void
    {
        $this -> _perimetro = $this -> _base * 3;
        $this -> _superficie = $this -> _base * $this -> _altura;
    }
}
?>