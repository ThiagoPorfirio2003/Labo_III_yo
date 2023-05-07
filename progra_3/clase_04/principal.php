<?php
/*
En principal.php, agregar un algoritmo que verifique la sesión del usuario, si es válido, mostrará:
en un <h1> el legajo del alumno y
en un <h2> el nombre y apellido del alumno y
en un <img> la foto del alumno.
y en un <table>, el listado completo del archivo ./archivos/alumnos_foto.txt
*/
    session_start();

    $nombre = isset($_SESSION["nombre"]) ? (string)$_SESSION["nombre"] : false;
    $apellido = isset($_SESSION["apellido"]) ? (string)$_SESSION["apellido"] : false;
    $legajo = isset($_SESSION["legajo"]) ? (string)$_SESSION["legajo"] : false;
    $foto = isset($_SESSION["foto"]) ? (string)$_SESSION["foto"] : false;
       
    
    if($nombre === false || $apellido === false /*|| $legajo === false */|| $foto === false) //|| session_status() !== PHP_SESSION_ACTIVE)
    {
        $mensaje = "El alumno con legajo " . $legajo . " no se encuentra en el listado";
        session_destroy();
        header("Location: ./index.php?mensaje= " . $mensaje);
    }
    else
    {
        $mensaje = "{$legajo}-{$apellido}-{$nombre}-{$foto}";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php echo $mensaje?></p>
</body>
</html>

<?php
?>