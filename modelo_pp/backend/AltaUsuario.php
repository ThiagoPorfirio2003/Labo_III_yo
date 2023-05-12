<?php
/*
AltaUsuario.php: Se recibe por POST el correo, la clave, el nombre y el id_perfil. Se invocará al método
Agregar.
Se retornará un JSON que contendrá: éxito(bool) y mensaje(string) indicando lo acontecido.
*/
require_once "./clases/Usuarios.php";

$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$clave = $_POST["clave"];
$id_perfil = (int)$_POST["id_perfil"];

    $usuarioNuevo = new Usuario($nombre, $correo, $clave, $id_perfil);

    $resultado = $usuarioNuevo->Agregar();
    $exito = $resultado ? 'true' : 'false';
    $mensaje = "No se pudo guardar el usuario nuevo";
 

    if($resultado)
    {
        $mensaje = "Se guardo al nuevo usuario";
    }

    //echo ;
    echo '{"exito":' . $exito . ', "mensaje": "'. $mensaje .'"}';
?>