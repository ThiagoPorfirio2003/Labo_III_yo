<?php

//require_once "./IBM.php";

class Usuario implements IBM
{
    public int $id;
    public string $nombre;
    public string $correo;
    public string $clave;
    public int $id_perfil;
    public string $perfil;
    //private static string $_pathFotos = "./fotos/";

    public function __construct(string $nombre, string $correo, string $clave, int $id_perfil=0, $id =-1)
    {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->id_perfil = $id_perfil;
        $this->id = $id;
    }

    public function toJSON() : string
    {
        $obj = new stdClass();

        $obj->nombre =$this->nombre;
        $obj->correo =$this->correo;
        $obj->clave =$this->clave;

        return json_encode($obj);
    }

    public function GuardarEnArchivo(string $path) : string
    {
        $archivo = fopen($path, "a");
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
 
    public static function TraerTodoJSON(string $path) : array
    {
        $retorno = array();
        $archivo = fopen($path, "r");

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
                    new Usuario($obj_recuperado->nombre, $obj_recuperado->correo, $obj_recuperado->clave));
                }
            }
            fclose($archivo);
        }
        return $retorno;
    }
    
    public function Agregar() : bool
    {        
        try
        {
            $pdo = new PDO('mysql:host=localhost;dbname=usuarios_test;charset=utf8', "root", "");
            $pdoStatement = $pdo->prepare('INSERT INTO usuarios (nombre, correo, clave, id_perfil) VALUES (:nombre, :correo, :clave, :id_perfil)');

            $pdoStatement->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
            $pdoStatement->bindValue(':correo', $this->correo, PDO::PARAM_STR);
            $pdoStatement->bindValue(':clave', $this->clave, PDO::PARAM_STR);
            $pdoStatement->bindValue(':id_perfil', $this->id_perfil, PDO::PARAM_INT);

            $retorno = $pdoStatement->execute();
        }
        catch(PDOException)
        {
            $retorno = false;
        }

        return $retorno;
    }

    public static function TraerTodos() : array
    {
        $retorno = array();

        try
        {
            $pdo = new PDO('mysql:host=localhost;dbname=usuarios_test;charset=utf8', "root", "");

            $pdoStatement = $pdo->query("SELECT * FROM usuarios");

            $registros = $pdoStatement->fetchAll();

            foreach($registros as $usuario)
            {
                array_push($retorno, new Usuario($usuario["nombre"], $usuario["correo"], $usuario["clave"], $usuario["id_perfil"], $usuario["id"]));
            }

        }
        catch(PDOException)
        {

        }

        return $retorno;
        
    }/*
        try
        {
            $pdo = new PDO('mysql:host=localhost;dbname=usuarios_test;charset=utf8', "root", "");

            $pdoStatement = $pdo->query("SELECT * FROM usuarios");

            $retorno = $pdoStatement->setFetchMode(PDO::FETCH_INTO, new Usuario);

            
            
        }
        catch(PDOException)
        {
            $retorno = array();
        }*/

            /*
Método de clase TraerUno($params): retorna un objeto de tipo Usuario, de acuerdo al correo y clave que ser
reciben en el parámetro $params.
    */

    public static function TraerUno(string $correo, string $clave) : Usuario
    {
        $retorno = new Usuario("","","");
        try
        {
            $pdo = new PDO('mysql:host=localhost;dbname=usuarios_test;charset=utf8', "root", "");

            $pdoStatement = $pdo->prepare('SELECT * from usuarios WHERE correo = :correo AND clave = :clave');
            
            $pdoStatement->bindValue(':correo', $correo, PDO::PARAM_STR);
            $pdoStatement->bindValue(':clave', $clave, PDO::PARAM_STR);

            $pdoStatement->execute();
            
            $usuario = $pdoStatement->fetch();

            if($usuario != false)
            {
                $retorno->nombre = $usuario["nombre"];
                $retorno->correo = $usuario["correo"];
                $retorno->clave = $usuario["clave"];
                $retorno->id_perfil = $usuario["id_perfil"];
                $retorno->id = $usuario["id"];
            }
        }
        catch(PDOException)
        {
            
        }
        
        return $retorno;
    }

    private static function BuscarUsuarioPorId(int $id) : bool
    {
        $retorno = false;

        try
        {
            $usuarios = self::TraerTodos(); 

            foreach($usuarios as $usuario)
            {
                if($id == $usuario->id)
                {
                    $retorno = true;
                    break;
                }
            }
        }
        catch(PDOException)
        {

        }


        return $retorno;
    }

    public function Modificar() : bool
    {
        $retorno = false;
        try
        {
            if(Usuario::BuscarUsuarioPorId($this->id))
            {
                $pdo = new PDO('mysql:host=localhost;dbname=usuarios_test;charset=utf8', "root", "");
                //UPDATE `usuarios` SET `id`='[value-1]',`correo`='[value-2]',`clave`='[value-3]',`nombre`='[value-4]',`id_perfil`='[value-5]' WHERE 1
                $pdoStatement = $pdo->prepare('UPDATE usuarios SET correo = :correo , clave = :clave , nombre = :nombre ,
                id_perfil = :id_perfil WHERE id = :id');
                //$pdoStatement = $pdo->prepare('INSERT INTO usuarios (nombre, correo, clave, id_perfil) VALUES (:nombre, :correo, :clave, :id_perfil) WHERE id = :id');

                $pdoStatement->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
                $pdoStatement->bindValue(':correo', $this->correo, PDO::PARAM_STR);
                $pdoStatement->bindValue(':clave', $this->clave, PDO::PARAM_STR);
                $pdoStatement->bindValue(':id_perfil', $this->id_perfil, PDO::PARAM_INT);
                $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);

                $retorno = $pdoStatement->execute();
            }
        }
        catch(PDOException)
        {
            
        }

        return $retorno;
    }

    /*
Eliminar (estático): elimina de la base de datos el registro coincidente con el id recibido cómo parámetro.
Retorna true, si se pudo eliminar, false, caso contrario.
    */

    public static function Eliminar(int $id): bool
    {
        $retorno = false;

        try
        {
            if(Usuario::BuscarUsuarioPorId($id))
            {
                $pdo = new PDO('mysql:host=localhost;dbname=usuarios_test;charset=utf8', "root", "");

                $pdoStatement = $pdo->prepare('DELETE FROM usuarios where id = :id');

                $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

                $retorno = $pdoStatement->execute();
                
            }

        }
        catch(PDOException $e)
        {
            //var_dump($e);
        }

        return $retorno;
    }
}
/*
    $db = new PDO('mysql:host=localhost;dbname=cdcol;charset=utf8', USUARIO, CLAVE);
    
    $sql = $db->query('SELECT titel AS titulo, interpret AS interprete, jahr AS anio FROM cds');

    $sql->setFetchMode(PDO::FETCH_INTO, new Cd);
                
    foreach($sql as $cd){
        
        echo "**". $cd->mostrarDatos(). '**
        ';
    }

                //CREO INSTANCIA DE PDO, INDICANDO ORIGEN DE DATOS, USUARIO Y CONTRASEÑA
            $db = new PDO('mysql:host=localhost;dbname=cdcol;charset=utf8', USUARIO, CLAVE);
            
            $sql = $db->query('SELECT titel AS titulo, interpret AS interprete, jahr AS anio FROM cds');

            $tabla = "<table><tr><td>TITULO</td><td>INTERPRETE</td><td>AÑO</td></tr>";

            while ($obj = $sql->fetch(PDO::FETCH_LAZY)) {//FETCH_LAZY -> RETORNA UN OBJETO
                $tabla .= "<tr><td>{$obj->titulo}</td><td>{$obj->interprete}</td><td>{$obj->anio}</td></tr>";
            }
            $tabla .= "</table>";
            
            echo $tabla;
*/
?>