<?php

namespace Porfirio;

class Alumno
{
    private string $_nombre;
    private string $_apellido;
    private string $_legajo;
    private static $_path = "./archivos/alumnos.txt";
    private static $_archivo = false;

    public function __construct(string $legajo, string $apellido="Test", string $nombre="Test"/*, string $path = "./archivos/alumnos.txt"*/)
    {
        $this->_legajo = $legajo;
        $this->_apellido = $apellido;
        $this->_nombre = $nombre;
        /*
        Alumno::$_path = "./archivos/alumnos.txt";
        Alumno::$_archivo = false;*/
    }

    public function __toString()
    {
        return "{$this->_legajo}-{$this->_apellido}-{$this->_nombre}";
    }

    public function Get_Lejago()
    {
        return $this->_legajo;
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

    /*
    public function __construct(string $path)//, string $modo_Apertura)
    {
        $this->_path = $path;
        $this->_archivo = false;
        //$this->_modo_Apertura =
    }*/

    private static function Abrir_Archivo(string $modo_Apertura) : bool
    {
        $retorno = false;

        if($modo_Apertura != null)
        {
            Alumno::$_archivo = fopen(Alumno::$_path, $modo_Apertura);
        
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

        if($alumno !== null )
        {
            $retorno = fwrite(Alumno::$_archivo, $alumno . "\r\n") > 0;
            /*if(fwrite($this->_archivo, $alumno . "\r\n") < 0)
            {
                $retorno = false;
            }*/
        }

        return $retorno;
    }

    public static function Recuperar_Datos_Alumnos() : array
    {
        $retorno = array();

        if(Alumno::Abrir_Archivo("r"))
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

    
    public static function AgregarAlumno(Alumno $alumno) : bool
    {
        $retorno = false;
        if($alumno !== null)
        {
            if(Alumno::Abrir_Archivo("a"))
            {
                $retorno = Alumno::Editar_Archivo($alumno);
                Alumno::Cerrar_Archivo();
            }
        }
        return $retorno;
    }
    
    public static function Verificar_Alumno(string $legajo) : bool
    {
        $retorno = false;
        $alumnos = Alumno::Recuperar_Datos_Alumnos();

        if(count($alumnos) > 0 && $legajo != null)
        {
            foreach($alumnos as $alumno)
            {
                if($alumno->Equals(new Alumno($legajo)))
                {
                    $retorno = true;
                    break;
                }
            }
        }
        return $retorno;
    }
    
    public static function Modificar_Alumno(Alumno $alumno_modificado) : bool
    {
        $retorno = false;
        $alumnos = Alumno::Recuperar_Datos_Alumnos();
        $nuevo_listado_alumnos = array();
    
        if(count($alumnos) > 0 && $alumno_modificado != null)
        {
            foreach($alumnos as $alumno)
            {
               // var_dump($alumno);
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