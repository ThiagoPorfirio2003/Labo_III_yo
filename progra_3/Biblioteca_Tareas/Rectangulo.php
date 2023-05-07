<?php

namespace Ejercicio_19;

//require_once "./FiguraGeometrica.php";

class Rectangulo extends FiguraGeometrica
{
    private float $_ladoDos;
    private float $_ladoUno;

    public function __construct(float $l1, float $l2)
    {
        parent :: __construct();
        $this-> _ladoUno = $l1;
        $this -> _ladoDos = $l2;
        $this -> CalcularDatos();
    }

    public function ToString(): string
    {
        return "Figura: Rectangulo <br>" . parent :: ToString();
    }

    public function Dibujar() : void
    {
        for($i =0; $i< $this-> _ladoDos; $i++)
        {
            for($i =0; $i< $this-> _ladoUno; $i++)
            {
                echo "*";
            }
            echo "br";
        }
    }    

    protected function CalcularDatos(): void
    {
        $this -> _perimetro = $this -> _ladoUno * 2 + $this -> _ladoDos *2;
    }



}

?>
