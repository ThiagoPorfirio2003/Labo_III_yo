<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
       $mensaje = isset($_GET["mensaje"]) ? $_GET["mensaje"] : '';
       //$mensaje = var_dump()
       echo "$mensaje <br><br>";
    ?>
    <form action="./nexo_poo_fotos.php" method="post" enctype="multipart/form-data">
        <input type="text" name="nombre" placeholder="Nombre">
        <br>
        <input type="text" name="apellido" placeholder="Apellido">
        <br>
        <input type="text" name="legajo" placeholder="Legajo">
        <br>
        <input type="text" name="accion" placeholder="Accion">
        <br>
        <input type="file" name="foto">
        <br>
        <input type="submit" value="Accionar">
        <br>
        <textarea name="txt_area" id="area_alumnos" cols="30" rows="10" disabled>
        </textarea>        
    </form>
</body>
</html>