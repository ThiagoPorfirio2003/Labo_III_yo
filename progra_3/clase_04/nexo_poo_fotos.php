<?php
    require_once "./Alumno.php";
   // require_once "./Guardador_Archivo.php";

    use Porfirio_04\Alumno;
  //  use Manejo_Archivos\Archivo_Alumno;
    
    $nombre = isset($_POST["nombre"]) ? (string)$_POST["nombre"] : false;
    $apellido = isset($_POST["apellido"]) ? (string)$_POST["apellido"] : false;
    $legajo = isset($_POST["legajo"]) ? (string)$_POST["legajo"] : false;
    $accion = isset($_POST["accion"]) ? (string)$_POST["accion"] : false;
    //$path_Temporal = $_FILES["foto"]["tmp_name"];
    //$archivo = new Archivo_Alumno("./archivos/alumnos.txt");
    $datos_recuperados;
    $mensaje_estado = "Algun POST no tiene valor";
    $mensaje_informacion = "";
    
    if($nombre !== false && $apellido != false && $legajo !== false && $accion !== false)
    {
        switch($accion)
        {
            case "listar":
                $datos_recuperados = Alumno::Recuperar_Datos();
        
                foreach($datos_recuperados as $alumno)
                {
                    echo $alumno->__toString() . "\n";       
                }
                break;

            case "agregar":
                $nuevoNombre_Archivo;
                if(Alumno::AgregarAlumno(new Alumno($legajo, $apellido, $nombre)))
                {
                    $mensaje_estado = "Se agrego exitosamente";
                }
                break;

            case "verificar":
                if(Alumno::Verificar_Alumno($legajo) > -1)
                {
                    $mensaje_estado = "El alumno existe";
                }
                else
                {
                    $mensaje_estado = "No existe el alumno";
                }
                break;

            case "modificar":
                if(Alumno::Modificar_Alumno(new Alumno($legajo, $apellido, $nombre)))
                {
                    $mensaje_estado = "Se mofifico el alumno";
                }
                else
                {
                    $mensaje_estado = "Hubo un error o el legajo no coincide con el de algun alumno";
                }
                break;

                case "obtener";
                    $alumno = Alumno::Obtener_Alumno($legajo);
                    isset($alumno) !== null ? $mensaje_estado = var_dump($alumno) : $mensaje_estado = "No se encontro al alumno";
                  //  $mensaje_estado = var_dump(Alumno::Obtener_Alumno($legajo));
                    break;

                case "redirigir":
                    session_start();
                    //session_unset();
                    $alumno = Alumno::Obtener_Alumno($legajo);
                    if(isset($alumno))
                    {
                        $_SESSION["nombre"] = $alumno->Get_Nombre();
                        $_SESSION["apellido"] = $alumno->Get_Apellido();
                        $_SESSION["foto"] = $alumno->Get_PathFoto();
                    }
                    else
                    {
                        session_destroy();
                        session_start();
                    }
                    $_SESSION["legajo"] = $legajo;
                    
                    header("Location: ./principal.php");
                    break;

            default:
                $mensaje_estado = "Opcion incorrecta";
                break;
        }
    }
    
    ///Recupero y luego listo
    /*
    if($accion === "listar")
    {
        $datos_recuperados = Alumno::Recuperar_Datos_Alumnos();
    
        foreach($datos_recuperados as $alumno)
        {
            echo $alumno->__toString() . "\n";       
        }
    }*/

    
    /*
    if($accion === "agregar")
    {
        if(Alumno::AgregarAlumno(new Alumno($legajo, $apellido, $nombre)))
        {
            $mensaje_estado = "Se agrego exitosamente";
        }


    }*/

    /*
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
    }*/

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

/*
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
    }*/

    //fclose($archivo);

    echo $mensaje_estado;
    
?>