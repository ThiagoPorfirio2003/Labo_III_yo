<?php
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
/*
Realizar una clase llamada “Auto” que posea los siguientes atributos privados:

_color (String)
_precio (Double)
_marca (String).
_fecha (DateTime)

Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:

i. La marca y el color.
ii. La marca, color y el precio.
iii. La marca, color, precio y fecha.

Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble por
parámetro y que se sumará al precio del objeto.
Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto” por
parámetro y que mostrará todos los atributos de dicho objeto.
Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
devolverá TRUE si ambos “Autos” son de la misma marca.
Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son de la
misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con la suma
de los precios o cero si no se pudo realizar la operación.
*/


/*
Crear dos objetos “Auto” de la misma marca y distinto color.
 Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
 Crear un objeto “Auto” utilizando la sobrecarga restante.
 Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500 al
atributo precio.
 Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el resultado
obtenido.
 Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o no.
 Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3, 5)
*/

    $sumaImporte;

    $auto_2_1 = new Auto("Pepe", "Azul");
    $auto_2_2 = new Auto("Pepe", "Rojo");
    $auto_3_1 = new Auto("Ronaldinio", "Verde", 1000);
    $auto_3_2 = new Auto("Ronaldinio", "Verde", 500);
    $auto5 = new Auto("Messi", "Azul", 1500, new DateTime('2003-8-7'));;

    $auto_3_1->AgregarImpuestos(1500);
    $auto_3_2->AgregarImpuestos(1500);
    $auto5->AgregarImpuestos(1500);

    echo Auto::add($auto_2_1, $auto_2_2);

    echo "<br>A1 vs A2: " . $auto_2_1->Equals($auto_2_2);
    echo "<br>A1 vs A5: " . $auto_2_1->Equals($auto5);

    echo "<br><br>" . Auto::MostrarAuto($auto_2_1);
    echo "<br><br>" . Auto::MostrarAuto($auto_3_1);
    echo "<br><br>" . Auto::MostrarAuto($auto5);


?>