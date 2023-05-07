//import { Ajax } from "../Ejer_01/AJAX";
namespace Manejadora
{
    let ajax : Ajax_foto_copy = new Ajax_foto_copy();
    let form : FormData = new FormData();

    function obtenerArchivo() : any
    {
        return (String)((<HTMLInputElement> document.getElementById("path")).value)
    }

    function cargarForm() : boolean
    {
        let archivo : string = obtenerArchivo();
        let retorno : boolean = false;
        
        if(archivo != undefined)
        {
            retorno = true;
            form.append("path", archivo);
        }

        return retorno;
    }

    function mostrarFoto(info : string) : void
    {
        (<HTMLDivElement>document.getElementById("mostrador")).innerHTML = info;
    }
    
    function error(mensaje : string)
    {
        alert(mensaje);
    }

    export function cargarPath()
    {
        if(cargarForm())
        {
            ajax.enviar_POST("./nexo.php", form, mostrarFoto, error);
        }
    }
}