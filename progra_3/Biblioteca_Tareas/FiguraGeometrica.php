<?php

namespace Ejercicio_19;


 /*
La clase FiguraGeometrica posee: todos sus atributos protegidos, un constructor por defecto, un
método getter y setter para el atributo _color, un método virtual (ToString) y dos métodos
abstractos: Dibujar (público) y CalcularDatos (protegido).
CalcularDatos será invocado en el constructor de la clase derivada que corresponda, su
funcionalidad será la de inicializar los atributos _superficie y _perimetro.
Dibujar, retornará un string (con el color que corresponda) formando la figura geométrica del objeto
que lo invoque (retornar una serie de asteriscos que modele el objeto).
Ejemplo:
  *   *******
 ***  *******
***** *******
 */
abstract class FiguraGeometrica
{
    protected string $_color;
    protected float $_perimetro;
    protected float $_superficie;

    //Toma todo como any, tenemos que crear un constructor?

    
    
    public function __construct()
    {
        $this-> _color = null;
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
        return "Color: $this-> _color <br> 
        Perimetro: $this-> _perimetro cm <br>
        Superficie: $this -> _superfice cm";
    }

    public abstract function Dibujar() : void; 
    protected abstract function CalcularDatos() : void; 

}


?>