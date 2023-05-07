<?php
    /*
namespace Manejo_Archivos;

require_once "./alumno.php";

use Porfirio\alumno;

class Archivo_Alumno
{
    private string $_path;
    private /resource | bool/ $_archivo;
    //private string $_modo_Apertura;

    public function __construct(string $path)//, string $modo_Apertura)
    {
        $this->_path = $path;
        $this->_archivo = false;
        //$this->_modo_Apertura =
    }

    private function Abrir(string $modo_Apertura) : bool
    {
        $retorno = false;

        if($modo_Apertura != null)
        {
            $this->_archivo = fopen($this->_path, $modo_Apertura);
        
            if($this->_archivo !== false)
            {
                $retorno = true;
            }
        }
        return $retorno;
    }

    private function Cerrar() : bool
    {
        return fclose($this->_archivo);
    }

    ///No cierra ni abre el archivo, solo escribe 
    private function Editar_Archivo(Alumno $alumno) : bool
    {
        $retorno = false;

        if($alumno !== null )
        {
            $retorno = fwrite($this->_archivo, $alumno . "\r\n") > 0;
            /if(fwrite($this->_archivo, $alumno . "\r\n") < 0)
            {
                $retorno = false;
            }/
        }

        return $retorno;
    }

    public function Recuperar_Datos_Alumnos() : array
    {
        $retorno = array();

        if($this->Abrir("r"))
        {
            while(!feof($this->_archivo))
            {
                $dato_recupeado = fgets($this->_archivo);
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
            $this->Cerrar();
        }
        return $retorno;
    }

    public function AgregarAlumno(Alumno $alumno) : bool
    {
        $retorno = false;
        if($alumno !== null)
        {
            if($this->Abrir("a"))
            {
                $retorno = $this->Editar_Archivo($alumno);
                $this->Cerrar();
            }
        }
        return $retorno;
    }

    public function Verificar_Alumno(string $legajo) : bool
    {
        $retorno = false;
        $alumnos = $this->Recuperar_Datos_Alumnos();

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

    public function Modificar_Alumno(Alumno $alumno_modificado) : bool
    {
        $retorno = false;
        $alumnos = $this->Recuperar_Datos_Alumnos();
        $nuevo_listado_alumnos = array();

        if(count($alumnos) > 0 && $alumno_modificado != null)
        {
            foreach($alumnos as $alumno)
            {
                var_dump($alumno);
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
            $this->Abrir("w");

            foreach($nuevo_listado_alumnos as $alumno)
            {
                $this->Editar_Archivo($alumno);
            }
            
            $this->Cerrar();
        }
        return $retorno;
    }
    /
    public function Listar()
    {
        foreach($this->Recuperar_Datos_Alumnos() as $value)
        {
            echo (alumno)$value;
        }
    }/

}

*/
?>