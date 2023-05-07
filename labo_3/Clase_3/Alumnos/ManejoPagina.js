var Alumno = /** @class */ (function () {
    //private static Ajax : Ajax;
    function Alumno(nombre, apellido, legajo, path_foto) {
        this.nombre = nombre;
        this.apellido = apellido;
        this.legajo = legajo;
        this.path_foto = path_foto;
    }
    Alumno.prototype.modificarDatos = function (nombre, apellido, legajo, path_foto) {
        this.nombre = nombre;
        this.apellido = apellido;
        this.legajo = legajo;
        this.path_foto = path_foto;
    };
    Alumno.prototype.toString = function () {
        return "".concat(this.nombre, " - ").concat(this.apellido, " - ").concat(this.legajo, " - ").concat(this.path_foto);
    };
    return Alumno;
}());
//namespace Manejador_FrontEnd
//{
/*export*/ var Ajax = /** @class */ (function () {
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
            this._xhttp.open("GET", ruta);
            this._xhttp.send();
            this._xhttp.onreadystatechange = function () { return _this.auxiliar_ready(exito, error); };
        }
    };
    Ajax.prototype.enviar_POST = function (ruta, form, exito, error) {
        var _this = this;
        if (ruta != undefined && ruta.length > 0 &&
            form != undefined) {
            this._xhttp.open("POST", ruta, true);
            this._xhttp.setRequestHeader("enctype", "multipart/form-data");
            this._xhttp.send(form);
            this._xhttp.onreadystatechange = function () { return _this.auxiliar_ready(exito, error); };
        }
    };
    return Ajax;
}());
//}
var Manejador_FrontEnd;
(function (Manejador_FrontEnd) {
    var HTML = /** @class */ (function () {
        function HTML() {
        }
        HTML.get_ImageElementById = function (id) {
            return document.getElementById(id);
        };
        HTML.get_InputElementById = function (id) {
            //let ele : HTMLInputElement = <HTMLInputElement>document.getElementById(id);
            return document.getElementById(id);
            //return ele;
        };
        HTML.getValue_InputElementById = function (id) {
            return (String)(HTML.get_InputElementById(id).value);
        };
        HTML.set_ImageById = function (id, path, anchura, altura) {
            var image = (HTML.get_ImageElementById(id));
            image.width = anchura;
            image.height = altura;
            image.src = path;
        };
        return HTML;
    }());
    Manejador_FrontEnd.HTML = HTML;
})(Manejador_FrontEnd || (Manejador_FrontEnd = {}));
var Validaciones;
(function (Validaciones) {
    function esNullOUndefined(cosa) {
        return cosa == null || cosa == undefined;
    }
    Validaciones.esNullOUndefined = esNullOUndefined;
})(Validaciones || (Validaciones = {}));
/// <reference path="Validador.ts" />
var Manejador_FrontEnd;
(function (Manejador_FrontEnd) {
    //Sintaxis. JSON.parse transforma un string de tipo JSON en un obj
    // y JSON.stringify transforma un objeto en un string de tipo JSON
    var Mi_JSON = /** @class */ (function () {
        function Mi_JSON() {
        }
        //Para evitar problemas se recomienda que cualquier de valor de el parametro 'datos' sea un numero o un string
        // retorna solo "" si alguno de los valores es nulo o indefinido
        Mi_JSON.crearJson = function (nombres, datos) {
            var json = "";
            if (!Validaciones.esNullOUndefined(nombres) && Validaciones.esNullOUndefined(datos)) {
                var cantidad_Nombres = nombres.length;
                if (cantidad_Nombres == datos.length) {
                    for (var i = 0; i < cantidad_Nombres; i++) {
                        json += "\"".concat(nombres[i], "\":\"").concat(datos, "\"");
                        if (i < cantidad_Nombres - 1) {
                            json += ",";
                        }
                    }
                    json += "}";
                }
            }
            return json;
        };
        return Mi_JSON;
    }());
    Manejador_FrontEnd.Mi_JSON = Mi_JSON;
})(Manejador_FrontEnd || (Manejador_FrontEnd = {}));
/// <reference path="manejoAjax.ts" />
/// <reference path="manejoHTML.ts" />
/// <reference path="manejoJSON.ts" />
var Manejadora;
(function (Manejadora) {
    /*
    Listar
    Agregar
    Modificar
    Verificar
    Obtener
    */
    var ajax = new Ajax();
    var form = new FormData();
    var alumnoRecuperado;
    function exito_Recuperacion(alumnoJSON) {
        alumnoRecuperado = JSON.parse(alumnoJSON);
        Manejador_FrontEnd.HTML.set_ImageById("mostrador", alumnoRecuperado.path_foto, 500, 500);
        alert(alumnoRecuperado);
    }
    function ingresarOpcion() {
        var nombre = Manejador_FrontEnd.HTML.getValue_InputElementById("nombre");
        var apellido = Manejador_FrontEnd.HTML.getValue_InputElementById("apellido");
        ;
        var legajo = Manejador_FrontEnd.HTML.getValue_InputElementById("legajo");
        var accion = Manejador_FrontEnd.HTML.getValue_InputElementById("accion");
        var foto = Manejador_FrontEnd.HTML.get_ImageElementById("foto");
        var activarAlert = false;
        var mensajeAlert = "Alguno de los siguientes datos falta: ";
        var procesar_exito = function (mensaje) { alert(mensaje); };
        var procesar_fracaso = function (mensaje) { alert(mensaje); };
        switch (accion) {
            case "listar":
                break;
            case "agregar":
                if (nombre != "" && apellido != "" && legajo != "" && foto.files[0] != undefined) {
                    form.append("nombre", nombre);
                    form.append("apellido", apellido);
                    form.append("legajo", legajo);
                    form.append("accion", accion);
                    form.append("foto", foto.files[0]);
                }
                else {
                    activarAlert = true;
                    mensajeAlert += "Nombre, apellido, legajo o la foto";
                }
                break;
            case "modificar":
                if (nombre != "" && apellido != "" && legajo != "" && foto.files[0] != undefined) {
                    form.append("nombre", nombre);
                    form.append("apellido", apellido);
                    form.append("legajo", legajo);
                    form.append("accion", accion);
                    form.append("foto", foto.files[0]);
                }
                else {
                    activarAlert = true;
                    mensajeAlert += "Nombre, apellido, legajo o la foto";
                }
                break;
            case "verificar":
                if (legajo != "") {
                    form.append("legajo", legajo);
                    form.append("accion", accion);
                }
                else {
                    activarAlert = true;
                    mensajeAlert += "Legajo";
                }
                break;
            case "obtener":
                if (legajo != "") {
                    form.append("legajo", legajo);
                    form.append("accion", accion);
                    procesar_exito = exito_Recuperacion;
                }
                else {
                    activarAlert = true;
                    mensajeAlert += "Legajo";
                }
                break;
            default:
                activarAlert = true;
                mensajeAlert = "La accion elegida no es correcta";
                break;
        }
        if (activarAlert) {
            alert(mensajeAlert);
        }
        else {
            ajax.enviar_POST("./Backend/nexo_poo_fotos.php", form, procesar_exito, procesar_fracaso);
        }
    }
    Manejadora.ingresarOpcion = ingresarOpcion;
})(Manejadora || (Manejadora = {}));
