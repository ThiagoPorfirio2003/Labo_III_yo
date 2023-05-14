<?php

require_once "./clases/Usuarios.php";

//private static string $_path = "./clases/archivos/usuarios.json";

$correo = $_POST["correo"];
$clave = $_POST["clave"];
$nombre = $_POST["nombre"];

    $usuario = new Usuario($nombre, $correo, $clave);

    echo($usuario->GuardarEnArchivo("./archivos/usuarios.json"));
?>