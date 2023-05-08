<?php

require_once "./clases/Usuarios.php";

    foreach(Usuario::TraerTodoJSON() as $usuario)
    {
        echo $usuario->toJSON() . "\n";
    }
?>