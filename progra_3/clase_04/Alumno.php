<?php

namespace Porfirio_04;

use Porfirio\Alumno as PorfirioAlumno;

/*
PARTE 1:
Tomando como punto de partida los ejercicios anteriores (clase03), se pide:
Agregar a la clase Alumno el atributo 'foto' (string) y modificar los métodos necesarios para realizar el CRUD sobre el archivo ./archivos/alumnos_foto.txt, que ahora tendrá el siguiente formato:

legajo - apellido - nombre - foto (el path)

La foto guardarla en ./fotos y su nombre será:
*- legajo.extension

PARTE 2:
Probar que el CRUD funcione correctamente en nexo_poo_foto.php
*/

class Alumno
{
    private string $_nombre;
    private string $_apellido;
    private string $_legajo;
    private string $_pathFoto;
    private static string $_pathDatos = "./archivos/alumnos_foto.json";
    //private static string $_pathFotos = "./fotos/";
    private static $_archivo = false;

    public function __construct(string $legajo, string $apellido="Test", string $nombre="Test"/*, string $path = "./archivos/alumnos.txt"*/)
    {
        $this->_legajo = $legajo;
        $this->_apellido = $apellido;
        $this->_nombre = $nombre;
        $this->_pathFoto = "./fotos/" . $legajo . ".";
        /*
        Alumno::$_pathDatos = "./archivos/alumnos.txt";
        Alumno::$_archivo = false;*/
    }

    public function __toString()
    {
        return "{$this->_legajo}-{$this->_apellido}-{$this->_nombre}-{$this->_pathFoto}";
    }

    public function Get_Lejago()
    {
        return $this->_legajo;
    }

    public function Get_Nombre()
    {
        return $this->_nombre;
    }

    public function Get_Apellido()
    {
        return $this->_apellido;
    }

    public function Get_PathFoto()
    {
        return $this->_pathFoto;
    }

    public function Set_Nombre(string $nombre)
    {
        $this->_nombre = $nombre;
    }

    public function Set_Apellido(string $apellido)
    {
        $this->_apellido = $apellido;
    }

    public function Equals(Alumno $alumno)
    {
        return $alumno->_legajo === $this->_legajo;
    }

    private static function Abrir_Archivo(string $modo_Apertura) : bool 
    {
        $retorno = false;

        if(isset($modo_Apertura))
        {
            Alumno::$_archivo = fopen(Alumno ::$_pathDatos, $modo_Apertura);
        
            if(Alumno::$_archivo !== false)
            {
                $retorno = true;
            }
        }
        return $retorno;
    }
    
    private static function Cerrar_Archivo() : bool
    {
        return fclose(Alumno::$_archivo);
    }

    
    ///No cierra ni abre el archivo, solo escribe 
    private static function Editar_Archivo(Alumno $alumno) : bool 
    {
        $retorno = false;

        if(isset($alumno))
        {           
            $retorno = fwrite(Alumno::$_archivo, $alumno . "\r\n") > 0;
            /*if(fwrite($this->_archivo, $alumno . "\r\n") < 0)
            {
                $retorno = false;
            }*/
        }

        return $retorno;
    }

    public static function Recuperar_Datos() : array 
    {
        $retorno = array();

        if(Alumno::Abrir_Archivo("r", Alumno::$_pathDatos))
        {
            while(!feof(Alumno::$_archivo))
            {
                $dato_recupeado = fgets(Alumno::$_archivo);
                $array_dato_recuperado = explode("-", $dato_recupeado);

                //Tengo que verificar que el primer dato no este vacio, ya que luego de agregar
                $legajo = trim($array_dato_recuperado[0]);
                if($legajo != "")
                {
                    $apellido = trim($array_dato_recuperado[1]);
                    $nombre = trim($array_dato_recuperado[2]);
    
                    array_push($retorno, new alumno($legajo, $apellido, $nombre));
                }
            }
            Alumno::Cerrar_Archivo();
        }
        return $retorno;
    }

    /*
    public function Recuperar_Foto() : bool
    {   
        $retorno = Alumno::Abrir_Archivo("r", Alumno::$_pathFotos . $this->_legajo . ".txt");
        
        if($retorno)
        {
            $this->_foto = fgets(Alumno::$_archivo);
            Alumno::Cerrar_Archivo();
            $retorno = $this->_foto !== false;
        }        

        return $retorno;
    }

    public static function Recuperar_Todo() : array
    {
        $alumnos = Alumno::Recuperar_Datos();

        if(count($alumnos) > 0)
        {
            foreach($alumnos as $alumno)
            {
                $alumno->Recuperar_Foto();
            }
        }
        return $alumnos;
    }*/

    public static function AgregarAlumno(Alumno $alumno) : bool
    {
        $retorno = false;
        if($alumno !== null && isset($_FILES["foto"]))
        {
            if(Alumno::Abrir_Archivo("a"))
            {
                $retorno = Alumno::Editar_Archivo($alumno);
                Alumno::Cerrar_Archivo();
                $alumno->Agregar_Foto();
            }
        }
        return $retorno;
    }

    private function Agregar_Foto()
    {
        //pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
        //$_FILES["foto"]["name"] = $this->_pathFoto . "." .  pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
        //echo $this->_pathFoto;
        $this->_pathFoto .= pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
        //$_FILES["foto"]["name"] = $this->_pathFoto . "." .  pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["foto"]["tmp_name"], $this->_pathFoto);
    }
    
    public static function Verificar_Alumno(string $legajo) : int
    {
        $retorno = -1;
        $alumnos = Alumno::Recuperar_Datos();

        if(count($alumnos) > 0 && isset($legajo))
        {
            foreach($alumnos as $alumno)
            {
                $retorno++;
                if($alumno->Equals(new Alumno($legajo)))
                {
                    $retorno = true;
                    break;
                }
            }
        }
        return $retorno;
    }

    public static function Obtener_Alumno(string $legajo) : Alumno | NULL
    {
        $retorno = null;
        $alumnos = Alumno::Recuperar_Datos();

        if(count($alumnos) > 0 && isset($legajo))
        {
            foreach($alumnos as $alumno)
            {
                if($alumno->Equals(new Alumno($legajo)))
                {
                    $retorno = $alumno;
                    break;
                }
            }
        }
        return $retorno;
    }
    
    /*
    public static function Obtener_Alumno(string $legajo) : Alumno | NULL
    {
        $retorno = null;

        $posicion = Alumno::Verificar_Alumno($legajo);
        
        if($posicion > -1)
        {
            $retorno = Alumno::Recuperar_Datos()[$posicion];
        }

        return $retorno;
    }*/
    
    public static function Modificar_Alumno(Alumno $alumno_modificado) : bool
    {
        $retorno = false;
        $alumnos = Alumno::Recuperar_Datos();
        $nuevo_listado_alumnos = array();
    
        if(count($alumnos) > 0 && $alumno_modificado != null)
        {
            foreach($alumnos as $alumno)
            {
              //var_dump($alumno);
                if($alumno->Equals($alumno_modificado))
                {   
                    $alumno_A_Guadar = $alumno_modificado;
                    $retorno = true;    
                }
                else
                {
                    $alumno_A_Guadar = $alumno;
                }
                array_push($nuevo_listado_alumnos, $alumno_A_Guadar);
            }

            Alumno::Abrir_Archivo("w");

            foreach($nuevo_listado_alumnos as $alumno)
            {
                Alumno::Editar_Archivo($alumno);
            }
            Alumno::Cerrar_Archivo();
        }
        return $retorno;
    }
}

?>