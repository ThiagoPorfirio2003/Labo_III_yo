/// <reference path="manejoAjax.ts" />
/// <reference path="manejoHTML.ts" />
/// <reference path="manejoJSON.ts" />

namespace Manejadora
{   
    /*
    Listar
    Agregar
    Modificar
    Verificar
    Obtener
    */
    let ajax : Ajax = new Ajax();
    let form : FormData = new FormData();
    let alumnoRecuperado : Alumno;

    function exito_Recuperacion(alumnoJSON : string)
    {
        alumnoRecuperado = JSON.parse(alumnoJSON);
        Manejador_FrontEnd.HTML.set_ImageById("mostrador", alumnoRecuperado.path_foto, 500,500);
        alert(alumnoRecuperado);
    }

    export function ingresarOpcion()
    { 
        let nombre : string = Manejador_FrontEnd.HTML.getValue_InputElementById("nombre");
        let apellido : string = Manejador_FrontEnd.HTML.getValue_InputElementById("apellido");;
        let legajo : string = Manejador_FrontEnd.HTML.getValue_InputElementById("legajo");
        let accion : string = Manejador_FrontEnd.HTML.getValue_InputElementById("accion");
        let foto : any = Manejador_FrontEnd.HTML.get_ImageElementById("foto")
        let activarAlert : boolean = false;
        let mensajeAlert : string = "Alguno de los siguientes datos falta: ";
        let procesar_exito : Function = (mensaje : string) => {alert(mensaje)};
        let procesar_fracaso : Function = (mensaje : string) => {alert(mensaje)};

        switch(accion)
        {
            case "listar":
                break;

            case "agregar":
                if(nombre != "" && apellido != "" && legajo != "" && foto.files[0] != undefined)
                {
                    form.append("nombre", nombre);
                    form.append("apellido", apellido);
                    form.append("legajo", legajo);
                    form.append("accion", accion);
                    form.append("foto", foto.files[0]);
                }
                else
                {
                    activarAlert = true;
                    mensajeAlert += "Nombre, apellido, legajo o la foto";
                }
                break;

            case "modificar":
                if(nombre != "" && apellido != "" && legajo != "" && foto.files[0] != undefined)
                {
                    form.append("nombre", nombre);
                    form.append("apellido", apellido);
                    form.append("legajo", legajo);
                    form.append("accion", accion);
                    form.append("foto", foto.files[0]);
                }
                else
                {
                    activarAlert = true;
                    mensajeAlert += "Nombre, apellido, legajo o la foto";
                }
                break;

            case "verificar":
                if(legajo != "")
                {
                    form.append("legajo", legajo);
                    form.append("accion", accion);
                }
                else
                {
                    activarAlert = true;
                    mensajeAlert += "Legajo";
                }
                break;
                    
            case "obtener":
                if(legajo != "")
                {
                    form.append("legajo", legajo);
                    form.append("accion", accion);
                    procesar_exito = exito_Recuperacion;
                }
                else
                {
                    activarAlert = true;
                    mensajeAlert += "Legajo";
                }
                break;

            default:
                activarAlert = true;
                mensajeAlert = "La accion elegida no es correcta";
                break;
        }

        if(activarAlert)
        {
            alert(mensajeAlert);
        }
        else
        {
            ajax.enviar_POST("./Backend/nexo_poo_fotos.php", form, procesar_exito, procesar_fracaso);
        }
    }
}