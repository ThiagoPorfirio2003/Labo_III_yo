<?php
/*
EliminarUsuario.php: Si recibe el parámetro id por POST, más el parámetro accion con valor "borrar", se
deberá borrar el usuario (invocando al método Eliminar).
Retornar un JSON que contendrá: éxito(bool) y mensaje(string) indicando lo acontecido.
*/
    require_once "./clases/IBM.php";
    require_once "./clases/Usuarios.php";

    $id = $_POST["id"];
    $exito = "false";
    $mensaje = "No se pudo eliminar al Usuario";

    if(Usuario::Eliminar($id))
    {
        $exito = "true";
        $mensaje = "Se ha eliminado al alumno";
    }

    echo '{"exito":"' . $exito . '", "mensaje": "' . $mensaje . '"}';
?>