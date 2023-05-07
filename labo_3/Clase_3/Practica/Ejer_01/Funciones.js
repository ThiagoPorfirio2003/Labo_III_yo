"use strict";
var Manejadora;
(function (Manejadora) {
    let ajax = new Ajax();
    let form = new FormData();
    function obtenerNumero() {
        return parseInt(document.getElementById("numero").value);
    }
    function validar(numero_reci) {
        //let numero_reci : number = parseInt((<HTMLInputElement>document.getElementById("numero")).value); 
        return numero_reci > 0 && numero_reci % 2 == 0;
        //  return id != undefined && parseInt(id) % 2==0
    }
    /*
    function calcularPares(numeroRecibido : number) : number
    {
        let cantidad : number =0;
        
        for(let i : number =1 ; i<numeroRecibido; i++)
        {
            if(i % 2 != 0)
            {
                cantidad++;
            }
        }

        return cantidad;
    }*/
    /*
    function mostrarDatos(numero_recibido : number, numeros_impares : number)
    {
        (<HTMLParagraphElement>document.getElementById("listado")).innerHTML="Cantidad de numeros impares entre 0 y " + numero_recibido + " es: " + numeros_impares ;
    }*/
    function mostrarDatos(numeros_impares) {
        document.getElementById("listado").innerHTML = "Cantidad de numeros impares: " + numeros_impares;
    }
    function botonPares() {
        let numero_recibido = obtenerNumero();
        // let numeros_impares : number = calcularPares(numero_recibido);
        if (validar(numero_recibido)) {
            form.append("numero", numero_recibido.toString());
            form.append("ruta_actual", "index.html");
            //ajax.enviar_GET("./nexo.php",  "numero="+numero_recibido.toString() + "&ruta_actual=s", mostrarDatos);
            ajax.enviar_POST("./nexo.php", form, mostrarDatos);
        }
        else {
            alert("El numero ingresado no es par o es menor a 1");
        }
    }
    Manejadora.botonPares = botonPares;
})(Manejadora || (Manejadora = {}));
//# sourceMappingURL=Funciones.js.map