<?php
/*
VerificarUsuarioJSON.php: (POST) Se recibe el parámetro usuario_json (correo y clave, en formato de cadena
JSON) y se invoca al método TraerUno.
Se retornará un JSON que contendrá: éxito(bool) y mensaje(string) indicando lo acontecido.
*/

require_once "./clases/Usuarios.php"; 

    $usuario_json = $_POST["usuario_json"];

    $exito = "false";
    $mensaje = "El alumno no exite";

    $datos = json_decode($usuario_json);

    $usuarioRecuperado = Usuario::TraerUno($datos->correo, $datos->clave);

    if($usuarioRecuperado->nombre != "")
    {
        $exito = "true";
        $mensaje = "Se encontro al alumno";
    }

    echo '{"exito": "' . $exito . '", "mensaje": "' . $mensaje . '"}';
?>