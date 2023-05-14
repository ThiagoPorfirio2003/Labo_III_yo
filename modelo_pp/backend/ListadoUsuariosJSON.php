<?php

require_once "./clases/Usuarios.php";

    foreach(Usuario::TraerTodoJSON("./archivos/usuarios.json") as $usuario)
    {
        echo $usuario->toJSON() . "\n";
    }
?>