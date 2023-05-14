<?php
require_once "./clases/Usuarios.php";
    //la noche brillara
    //peacefull 
    /*
    ListadoUsuarios.php: (GET) Se mostrará el listado completo de los usuarios, exepto la clave (obtenidos de la
base de datos) en una tabla (HTML con cabecera). Invocar al método TraerTodos. 
    */

    $usuarios = Usuario ::TraerTodos();

    /*
The <tr> element defines a table row, the <th> element defines a table header, and the <td> element defines a table cell.
    */
    $tabla= "<table><tr><th>ID</th><th>NOMBRE</th><th>CORREO</th><th>ID PERFIL</th></tr>";

    /*
        public int $id;
    public string $nombre;
    public string $correo;
    public string $clave;
    public int $id_perfil;
    */
    foreach($usuarios as $usuario)
    {
        $tabla.= "<tr><td>{$usuario->id}</td><td>{$usuario->nombre}</td><td>{$usuario->correo}</td><td>{$usuario->id_perfil}</td></tr>";
    }   

    $tabla.= "</table>";

    echo $tabla;

?>