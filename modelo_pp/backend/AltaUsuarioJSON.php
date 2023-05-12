<?php

require_once "./clases/Usuarios.php";

$correo = $_POST["correo"];
$clave = $_POST["clave"];
$nombre = $_POST["nombre"];

    $usuario = new Usuario($nombre, $correo, $clave);

    echo($usuario->GuardarEnArchivo());

?>