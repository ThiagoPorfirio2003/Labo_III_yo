<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---<script src="./Funciones.js"></script> --->  
    <script src="./testMajeaAJAX.js"></script>
    <title>Document</title>
</head>
<body>
    <p>Ingrese un numero PAR para saber la cantidad de numeros impares entre este y el 0</p>
    <input type="text" id="numero" placeholder="Ingrese un numero">
    <br>
    <input type="button" value="Ingresar" onclick="Manejadora.botonPares()">
    <br>
    <p id="listado"></p>
</body>
</html>