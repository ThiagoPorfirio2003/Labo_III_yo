<?php

class Punto
{

    /*
    La clase Punto ha de tener dos atributos privados con acceso de sólo lectura (sólo con getters),
    que serán las coordenadas del punto. Su constructor recibirá las coordenadas del punto.
    La clase Rectangulo tiene los atributos privados de tipo Punto _vertice1, _vertice2, _vertice3 y
    _vertice4 (que corresponden a los cuatro vértices del rectángulo).
    La base de todos los rectángulos de esta clase será siempre horizontal. Por lo tanto, debe tener un
    constructor para construir el rectángulo por medio de los vértices 1 y 3.
    Los atributos ladoUno, ladoDos, área y perímetro se deberán inicializar una vez construido el
    rectángulo.
    Desarrollar una aplicación que muestre todos los datos del rectángulo y lo dibuje en la página.
    */

    private int $_x;
    private int $_y;

    public function __construct(int $x, int $y)
    {
        $this -> _x = $x;
        $this -> _y = $y;
    }

    public function GetX() : int
    {
        return $this-> _x;
    }

    public function GetY() : int
    {
        return $this -> _y;
    }

    public function ToString() : string
    {
        return "X= " . $this->_x . "<br>".
        "Y= " . $this->_y;
    }
}

class Rectangulo
{
    private Punto $_vertice1;
    private Punto $_vertice2;
    private Punto $_vertice3;
    private Punto $_vertice4;

    public float $area;
    public int $ladoUno;
    public int $ladoDos;
    public float $perimetro;

    public function __construct(Punto $v1, Punto $v3)
    {
       $this -> _vertice1 = $v1;
       $this -> _vertice3 = $v3;
       
        $this-> _vertice2 = new Punto($this -> _vertice3->GetX(), $this -> _vertice1->GetY());
        $this-> _vertice4 = new Punto($this -> _vertice1->GetX(), $this -> _vertice3->GetY());

        $this -> ladoUno = $this -> _vertice1->GetY() - $this -> _vertice3->GetY();
        if($this->ladoUno < 0)
        {
            $this->ladoUno*=-1;
        }

        $this -> ladoDos = $this -> _vertice1->GetX() - $this -> _vertice3->GetX();
        if($this->ladoDos < 0)
        {
            $this->ladoDos*=-1;
        }

        $this -> area = $this->ladoUno* $this->ladoDos;
        $this -> perimetro = $this->ladoUno * 2 + $this->ladoDos *2;
    }

    public function Dibujar() : string
    {
        $retorno = "";

        for($i =0; $i< $this-> ladoDos; $i++)
        {
            for($j =0; $j< $this -> ladoUno; $j++)
            {
                $retorno .="*";
            }
            $retorno .="<br>";
        }
        return $retorno;
    }

    public function ToString() : string
    {
        return "Perimetro: " . $this->perimetro . "<br>".
        "Area: ".  $this->area ." <br>" .
        "L1: ". $this->ladoUno . "<br>" .
        "L2: " . $this->ladoDos . "<br>" .
        "V1: ". "<br>" .$this -> _vertice1->ToString()  ."<br>" . 
        "V2: ". "<br>" .$this->_vertice2->ToString(). "<br>".
        "V3: ". "<br>" .$this->_vertice3->ToString() . "<br>".
        "V4: ". "<br>" .$this->_vertice4->ToString() . "<br>";
    }
}

    $punto_V1 = new Punto(0,5);
    $punto_V3 = new Punto(-5, -16);

    $rectan = new Rectangulo($punto_V1, $punto_V3);

    echo $rectan -> Dibujar();
    echo "<br>" . $rectan->ToString();
?>