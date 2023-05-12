"use strict";
var Entidades;
(function (Entidades) {
    class Persona {
        constructor(nombre, correo) {
            this.nombre = nombre;
            this.correo = correo;
            this.clave = "";
        }
        ToString() {
            return `{"nombre":"` + this.nombre + `","correo":"` + this.correo + `","clave":"` + this.clave + `",`;
        }
    }
    Entidades.Persona = Persona;
})(Entidades || (Entidades = {}));
//# sourceMappingURL=Persona.js.map