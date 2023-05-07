//import { Ajax } from "../Ejer_01/AJAX";
namespace Manejadora
{
    let ajax : Ajax_foto = new Ajax_foto();
    let form : FormData = new FormData();

    function obtenerArchivo() : any
    {
        return (<HTMLImageElement> document.getElementById("archivo"))
    }

    function cargarForm() : boolean
    {
        let archivo : any = obtenerArchivo();
        let retorno : boolean = false;
        
        if(archivo != undefined)
        {
            retorno = true;
            form.append("archivo", archivo.files[0]);
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

    export function cargarArchivo()
    {
        if(cargarForm())
        {
            ajax.enviar_POST("./nexo.php", form, mostrarFoto, error);
        }
    }
}