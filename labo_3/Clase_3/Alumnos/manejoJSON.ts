/// <reference path="Validador.ts" />

namespace Manejador_FrontEnd
{
    //Sintaxis. JSON.parse transforma un string de tipo JSON en un obj
    // y JSON.stringify transforma un objeto en un string de tipo JSON
    export class Mi_JSON
    {
        //Para evitar problemas se recomienda que cualquier de valor de el parametro 'datos' sea un numero o un string
        // retorna solo "" si alguno de los valores es nulo o indefinido
        static crearJson(nombres : Array<string>, datos : Array<any>) : string
        {
            let json : string = ""
            if(!Validaciones.esNullOUndefined(nombres) && Validaciones.esNullOUndefined(datos))
            {
                let cantidad_Nombres = nombres.length;

                if(cantidad_Nombres == datos.length)
                {
                    for(let i:number =0; i<cantidad_Nombres;i++)
                    {
                        json+= `"${nombres[i]}":"${datos}"`
                        if(i < cantidad_Nombres-1)
                        {
                            json+= ","
                        }
                    }
                    json+="}"
                }
            }
            return json;
        } 
    }
}