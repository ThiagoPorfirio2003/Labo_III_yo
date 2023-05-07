<?php

/*
require_once "../Biblioteca_Tareas/Rectangulo.php";

use Ejercicio_19\Rectangulo;
*/
/*
abstract class FiguraGeometrica
{
    protected string $_color;
    protected float $_perimetro;
    protected float $_superficie;

    //Toma todo como any, tenemos que crear un constructor?

    
    public function __construct()
    {
        $this-> _color = "";
        $this-> _perimetro = 0;
        $this-> _superficie = 0;
    }

    public function GetColor() : string
    {
        //string $color;
         
        return $this-> _color;
    }
    
    public function SetColor(string $color) : void
    {
        $this -> _color = $color;
    }

    public function ToString() : string
    {
        return "Color: ".$this-> _color . "<br>" . 
        "Perimetro: " . $this-> _perimetro . " cm <br>" . 
        "Superficie: " . $this -> _superficie . " cm";
    }
    public abstract function Dibujar() : void; 
    protected abstract function CalcularDatos() : void; 
}

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
            for($j =0; $j< $this-> _ladoUno; $j++)
            {
                echo "*";
            }
            echo "<br>";
        }
    }    

    protected function CalcularDatos(): void
    {
        $this -> _perimetro = $this -> _ladoUno * 2 + $this -> _ladoDos *2;
        $this -> _superficie = $this -> _ladoUno * $this -> _ladoDos;
    }
}

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
}*/
require_once "../Biblioteca_Tareas/Rectangulo.php";
require_once "../Biblioteca_Tareas/Triangulo.php";
require_once "../Biblioteca_Tareas/FiguraGeometrica.php";
//require_once "../";

use Ejercicio_19\{
    Rectangulo,
    Triangulo
};


$objetoTriangulo = new Triangulo(3,5);
$objetoRectangulo= new Rectangulo(3,3);

echo "forma del rectangulo: <br>";
$objetoRectangulo->Dibujar();

echo "<br>forma del triangulo: <br>";
$objetoTriangulo->Dibujar();

echo "<br>informacion del rectangulo: <br>";
echo $objetoRectangulo->ToString();

echo "<br>informacion del triangulo: <br>";
echo $objetoTriangulo->ToString();

?>