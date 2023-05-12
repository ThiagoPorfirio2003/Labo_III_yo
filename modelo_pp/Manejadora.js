/// <reference path="./Ajax.ts" />
var ModeloParcial;
(function (ModeloParcial) {
    /*
MostrarUsuariosJSON. Recuperará (por AJAX) todos los usuarios del archivo usuarios.json y generará un
listado dinámico, crear una tabla HTML con cabecera (en el FRONTEND) que mostrará toda la información de
cada uno de los usuarios. Invocar a “./BACKEND/ListadoUsuariosJSON.php”, recibe la petición (por GET) y
retornará
el listado de todos los usuarios en formato JSON.
VerificarUsuarioJSON. Verifica que el usuario exista. Para ello, invocará (por AJAX) a
“./BACKEND/VerificarUsuarioJSON.php”. Se recibe por POST parámetro usuario_json (correo y clave, en
    formato de
cadena JSON).
Retornar un JSON que contendrá: éxito(bool) y mensaje(string) indicando lo acontecido
(agregar el mensaje obtenido del método de
clase).
Se mostrará (por consola y alert) lo acontecido.
    */
    var Manejadora = /** @class */ (function () {
        function Manejadora() {
        }
        /*
        AgregarUsuarioJSON. Obtiene el nombre, el correo y la clave desde la página usuario_json.html y se enviará
(por AJAX) hacia “./BACKEND/AltaUsuarioJSON.php” que invocará al método de instancia GuardarEnArchivo(), que
agregará al usuario en ./backend/archivos/usuarios.json. Retornará un JSON que contendrá: éxito(bool)
y mensaje(string) indicando
lo acontecido.
Informar por consola y alert el mensaje recibido.
        */
        Manejadora.AgregarUsuarioJSON = function () {
            var nombre = document.getElementById("nombre").value;
            var correo = document.getElementById("correo").value;
            var clave = document.getElementById("clave").value;
            var dataForm = new FormData();
            dataForm.append("nombre", nombre);
            dataForm.append("correo", correo);
            dataForm.append("clave", clave);
            Manejadora.ajax.enviar_POST("./backend/AltaUsuarioJSON.php", dataForm, function (respuesta) {
                var jsonRecibido = JSON.parse(respuesta);
                console.log(jsonRecibido.mensaje);
                alert(jsonRecibido.mensaje);
            });
        };
        Manejadora.ajax = new Ajax();
        return Manejadora;
    }());
    ModeloParcial.Manejadora = Manejadora;
})(ModeloParcial || (ModeloParcial = {}));
