var Ajax = /** @class */ (function () {
    function Ajax() {
        this._xhttp = new XMLHttpRequest();
        this.DONE = 4;
        this.OK = 200;
    }
    //No valida si es null
    Ajax.prototype.auxiliar_ready = function (exito, error) {
        if (this._xhttp.readyState === this.DONE) {
            if (this._xhttp.status === this.OK) {
                if (exito !== undefined) {
                    exito(this._xhttp.responseText);
                }
            }
            else {
                if (error !== undefined) {
                    error(this._xhttp.statusText);
                }
            }
        }
    };
    Ajax.prototype.enviar_GET = function (ruta, parametros, exito, error) {
        var _this = this;
        if (parametros === void 0) { parametros = ""; }
        if (ruta != undefined && ruta.length > 0 &&
            parametros != undefined && parametros.length > 0) {
            ruta = parametros.length > 0 ? ruta + "?" + parametros : ruta;
            this._xhttp.open("GET", ruta, true);
            this._xhttp.send();
            this._xhttp.onreadystatechange = function () { return _this.auxiliar_ready(exito, error); };
        }
    };
    Ajax.prototype.enviar_POST = function (ruta, form, exito, error) {
        var _this = this;
        if (ruta != undefined && ruta.length > 0 &&
            form != undefined) {
            this._xhttp.open("POST", ruta, true);
            this._xhttp.send(form);
            this._xhttp.onreadystatechange = function () { return _this.auxiliar_ready(exito, error); };
        }
    };
    return Ajax;
}());
var Manejadora;
(function (Manejadora) {
    var ajax = new Ajax();
    var form = new FormData();
    function obtenerNumero() {
        return parseInt(document.getElementById("numero").value);
    }
    function validar(numero_reci) {
        //let numero_reci : number = parseInt((<HTMLInputElement>document.getElementById("numero")).value); 
        return numero_reci > 0 && numero_reci % 2 == 0;
        //  return id != undefined && parseInt(id) % 2==0
    }
    /*
    function mostrarDatos(numero_recibido : number, numeros_impares : number)
    {
        (<HTMLParagraphElement>document.getElementById("listado")).innerHTML="Cantidad de numeros impares entre 0 y " + numero_recibido + " es: " + numeros_impares ;
    }*/
    function mostrarDatos(numeros_impares) {
        ho();
        document.getElementById("listado").innerHTML = "Cantidad de numeros impares: " + numeros_impares;
    }
    function botonPares() {
        var numero_recibido = (String)(document.getElementById("numero").value);
        ///let numero_recibido : number = obtenerNumero();
        // let numeros_impares : number = calcularPares(numero_recibido);
        mostrarDatos(numero_recibido);
        /*
         if(validar(numero_recibido))
         {
             ///form.append("numero", numero_recibido.toString());
             ///form.append("ruta_actual", "index.html");
             //ajax.enviar_GET("./nexo.php",  "numero="+numero_recibido.toString() + "&ruta_actual=s", mostrarDatos);
             ///ajax.enviar_POST("./nexo.php",  form, mostrarDatos);
         }
         else
         {
             alert("El numero ingresado no es par o es menor a 1")
         }*/
    }
    Manejadora.botonPares = botonPares;
    function ho() {
        window.location.href = "./hoa.php";
    }
})(Manejadora || (Manejadora = {}));
