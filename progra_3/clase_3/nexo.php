<?php

    require_once "./alumno.php";
   // require_once "./Guardador_Archivo.php";
 
    use Porfirio\Alumno;
  //  use Manejo_Archivos\Archivo_Alumno;

    $nombre = (string)$_POST["nombre"];
    $apellido = (string)$_POST["apellido"];
    $legajo = (string)$_POST["legajo"];
    $accion = (string)$_POST["accion"]; 
  //$archivo = new Archivo_Alumno("./archivos/alumnos.txt");
    $datos_recuperados;
    $mensaje_estado = "Error";
    $mensaje_informacion = "";
    
    ///Recupero y luego listo
    if($accion === "listar")
    {
        $datos_recuperados = Alumno::Recuperar_Datos_Alumnos();
    
        foreach($datos_recuperados as $alumno)
        {
            echo $alumno->__toString() . "\n";       
        }
    }

    
    if($accion === "agregar")
    {

        if(Alumno::AgregarAlumno(new Alumno($legajo, $apellido, $nombre)))
        {
            $mensaje_estado = "Se agrego exitosamente";
        }
    }

    if($accion === "verificar")
    {
        if(Alumno::Verificar_Alumno($legajo))
        {
            $mensaje_estado = "El alumno existe";
        }
        else
        {
            $mensaje_estado = "No existe el alumno";
        }
    }

/*
Enviar (por POST) a la página nexo.php:
*-accion => 'modificar'
*-nombre => 'un nombre'
*-apellido => 'un apellido'
*-legajo => 'un legajo'

Recuperar los valores enviados y buscar en el archivo ./archivos/alumnos.txt la existencia de un registro que coincida con el legajo recuperado.
Si se encuentra, reemplazar el apellido y el nombre del archivo, por los valores recuperados por POST.
Mostrar un mensaje que diga:
'El alumno con legajo 'xxx' se ha modificado'
Si no se encuentra, mostrar el siguiente mensaje:
'El alumno con legajo 'xxx' no se encuentra en el listado'
Siendo 'xxx' el valor del legajo enviado por POST.
*/

    if($accion === "modificar")
    {   
        if(Alumno::Modificar_Alumno(new Alumno($legajo, $apellido, $nombre)))
        {
            $mensaje_estado = "Se mofifico el alumno";
        }
        else
        {
            $mensaje_estado = "Hubo un error o el legajo no coincide con el de algun alumno";
        }
    }

    //fclose($archivo);

    echo $mensaje_estado;
    
?>