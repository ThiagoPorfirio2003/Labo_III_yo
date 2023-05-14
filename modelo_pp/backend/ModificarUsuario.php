<?php
/*
    ModificarUsuario.php: Se recibirán por POST los siguientes valores: usuario_json (id, nombre, correo, clave y
id_perfil, en formato de cadena JSON), para modificar un usuario en la base de datos. Invocar al método
Modificar.
Retornar un JSON que contendrá: éxito(bool) y mensaje(string) indicando lo acontecido.
*/
    require_once "./clases/IBM.php";
    require_once "./clases/Usuarios.php";

    $json = $_POST["usuario_json"];

    $exito = "false";
    $mensaje = "No se pudo modificar el usuario";

    $usuarioSTD = json_decode($json); 

    $usuariRecuperado = new Usuario($usuarioSTD->nombre, $usuarioSTD->correo, $usuarioSTD->clave, $usuarioSTD->id_perfil, $usuarioSTD->id);

    if($usuariRecuperado->Modificar())
    {
        $exito = "true";
        $mensaje = "Se ha modificado con exito el usuario";
    }

    echo '{"exito":"' . $exito . '", "mensaje": "' . $mensaje . '"}';
?>