var Ajax_foto = /** @class */ (function () {
    function Ajax_foto() {
        this._xhttp = new XMLHttpRequest();
        this.DONE = 4;
        this.OK = 200;
    }
    //No valida si es null
    Ajax_foto.prototype.auxiliar_ready = function (exito, error) {
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
    Ajax_foto.prototype.enviar_GET = function (ruta, parametros, /*auxiliar_ready : Function ,*/ exito, error) {
        var _this = this;
        if (parametros === void 0) { parametros = ""; }
        if (ruta != undefined && ruta.length > 0 &&
            parametros != undefined && parametros.length > 0) 
        //&& auxiliar_ready != undefined)
        {
            ruta = parametros.length > 0 ? ruta + "?" + parametros : ruta;
            this._xhttp.open("GET", ruta, true);
            this._xhttp.send();
            this._xhttp.onreadystatechange = function () { return _this.auxiliar_ready(exito, error); };
        }
    };
    Ajax_foto.prototype.enviar_POST = function (ruta, form, /*auxiliar_ready : Function,*/ exito, error) {
        var _this = this;
        if (ruta != undefined && ruta.length > 0 &&
            form != undefined) //&& auxiliar_ready != undefined) 
         {
            this._xhttp.open("POST", ruta, true);
            this._xhttp.setRequestHeader("enctype", "multipart/form-data");
            this._xhttp.send(form);
            this._xhttp.onreadystatechange = function () { return _this.auxiliar_ready(exito, error); };
        }
    };
    return Ajax_foto;
}());
//import { Ajax } from "../Ejer_01/AJAX";
var Manejadora;
(function (Manejadora) {
    var ajax = new Ajax_foto();
    var form = new FormData();
    function obtenerArchivo() {
        return document.getElementById("archivo");
    }
    function cargarForm() {
        var archivo = obtenerArchivo();
        var retorno = false;
        if (archivo != undefined) {
            retorno = true;
            form.append("archivo", archivo.files[0]);
        }
        return retorno;
    }
    function mostrarFoto(info) {
        document.getElementById("mostrador").innerHTML = info;
    }
    function error(mensaje) {
        alert(mensaje);
    }
    function cargarArchivo() {
        if (cargarForm()) {
            ajax.enviar_POST("./nexo.php", form, mostrarFoto, error);
        }
    }
    Manejadora.cargarArchivo = cargarArchivo;
})(Manejadora || (Manejadora = {}));
