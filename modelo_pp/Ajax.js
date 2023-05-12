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
