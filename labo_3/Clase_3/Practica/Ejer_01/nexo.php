<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
    $numero = isset($_POST["numero"]) ? (int)($_POST["numero"]) : false;
    $ruta_Actual = isset($_GET["ruta_actual"]) ? (string)($_GET["ruta_actual"]) : false;

   
   //var_dump($numero);
    //header("Location: ./hoa.php");

    if($numero !== false)// && $ruta_Actual !== false)
    {
        echo $numero /2;
        //header("Location: hoa.php");
    }
?>