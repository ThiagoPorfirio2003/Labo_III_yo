namespace Manejador_FrontEnd
{
    export class HTML
    {
        static get_ImageElementById(id : string) : HTMLImageElement
        {
            return <HTMLImageElement>document.getElementById(id);
        }

        static get_InputElementById(id : string) : HTMLInputElement
        {
            //let ele : HTMLInputElement = <HTMLInputElement>document.getElementById(id);
            return <HTMLInputElement>document.getElementById(id);
            //return ele;
        }

        static getValue_InputElementById(id : string) : string
        {
            return (String)(HTML.get_InputElementById(id).value)
        }

        static set_ImageById(id : string, path : string, anchura : number, altura : number) : void
        {
            let image : HTMLImageElement = (HTML.get_ImageElementById(id));
            image.width = anchura;
            image.height = altura;
            image.src = path;
        }

        /*
        set_TxtById(dato : string) : string
        {
            return (<HTMLOutputElement>document.getElementById(dato)).innerHTML = dato;
        }
        */
    }
}