<?php
/*
Crear una aplicación Web que permita realizar un ABM de distintos usuarios y empleados.
Usuario.php. Crear, en ./backend/clases, la clase Usuario con atributos públicos (id, nombre, correo, clave,
id_perfil y perfil) y un método de instancia ToJSON(), que retornará los datos de la instancia nombre, correo y
clave (en una cadena con formato JSON).
Agregar los siguientes métodos:
Método de instancia GuardarEnArchivo(), que agregará al usuario en ./backend/archivos/usuarios.json.
Retornará un JSON que contendrá: éxito(bool) y mensaje(string) indicando lo acontecido.
Método de clase TraerTodosJSON(), que retornará un array de objetos de tipo Usuario, recuperado del
archivo usuarios.json.
Método de instancia Agregar(): agrega, a partir de la instancia actual, un nuevo registro en la tabla usuarios
(id,nombre, correo, clave e id_perfil), de la base de datos usuarios_test. Retorna true, si se pudo agregar,
false, caso contrario.
Método de clase TraerTodos(): retorna un array de objetos de tipo Usuario, recuperados de la base de datos
(con la descripción del perfil correspondiente).
Método de clase TraerUno($params): retorna un objeto de tipo Usuario, de acuerdo al correo y clave que ser
reciben en el parámetro $params.

*/


/*
id, nombre, correo, clave,
id_perfil y perfil) y un método de instancia ToJSON(), que retornará los datos de
 la instancia nombre, correo y
clave (en una cadena con formato JSON
*/

use JetBrains\PhpStorm\ArrayShape;
use Porfirio\Alumno;

class Usuario
{

    private static string $_path = "./archivos/usuarios.json"; 
    public int $_id;
    public string $_nombre;
    public string $_correo;
    public string $_clave;
    public string $_id_perfil;
    public string $_perfil;
    //private static string $_pathFotos = "./fotos/";

    public function __construct(string $nombre, string $correo, string $clave)
    {
        $this->_nombre = $nombre;
        $this->_correo = $correo;
        $this->_clave = $clave;
    }

    public function toJSON() : string
    {
        $obj = new stdClass();

        $obj->_nombre =$this->_nombre;
        $obj->_correo =$this->_correo;
        $obj->_clave =$this->_clave;

        return json_encode($obj);
    }

    public function GuardarEnArchivo() : string
    {
        $archivo = fopen(Usuario::$_path, "a");
        $std = new stdClass();

        $std->exito= false;
        $std->mensaje= "No se pudo guardar el alumno";


        if($archivo != false)
        {
            $retorno = fwrite($archivo, $this->toJSON() . "\r\n");
            fclose($archivo);
            if($retorno > 0)
            {
                $std->exito= true;
                $std->mensaje= "El alumno se guardo con exito";
            }
        }
        return json_encode($std);
    }

        /*
Método de clase TraerTodosJSON(), que retornará un array de objetos de tipo Usuario, recuperado del
archivo usuarios.json
    */

    public static function TraerTodoJSON() : array
    {
        $retorno = array();
        $archivo = fopen(Usuario :: $_path, "r");

        if($archivo != false)
        {
            while(!feof($archivo))
            {
                $JSON_recupeado = fgets($archivo);
                $JSON_recupeado = trim($JSON_recupeado);
                //Tengo que verificar que el primer dato no este vacio, ya que luego de agregar
                if($JSON_recupeado != "")
                {   
                    $obj_recuperado = json_decode($JSON_recupeado);
                    array_push($retorno, 
                    new Usuario($obj_recuperado->_nombre, $obj_recuperado->_correo, $obj_recuperado->_clave));
                }
            }

            fclose($archivo);
        }
        
        return $retorno;
    }   
}

?>