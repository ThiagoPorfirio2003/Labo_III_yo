namespace Manejadora
{
    let ajax : Ajax = new Ajax();
    let form : FormData = new FormData();

    function obtenerNumero() : number
    {
        return parseInt((<HTMLInputElement>document.getElementById("numero")).value);
    }

    function validar(numero_reci : number) : boolean
    {
      //let numero_reci : number = parseInt((<HTMLInputElement>document.getElementById("numero")).value); 
        return numero_reci > 0 && numero_reci % 2 ==0;
    //  return id != undefined && parseInt(id) % 2==0
    }

    /*
    function mostrarDatos(numero_recibido : number, numeros_impares : number)
    {
        (<HTMLParagraphElement>document.getElementById("listado")).innerHTML="Cantidad de numeros impares entre 0 y " + numero_recibido + " es: " + numeros_impares ;
    }*/


    function mostrarDatos(numeros_impares : string)
    {
        ho();
        (<HTMLParagraphElement>document.getElementById("listado")).innerHTML="Cantidad de numeros impares: " + numeros_impares;
    }

    export function botonPares()
    {
        let numero_recibido : string = (String)((<HTMLInputElement>document.getElementById("numero")).value)
        ///let numero_recibido : number = obtenerNumero();
       // let numeros_impares : number = calcularPares(numero_recibido);

        mostrarDatos(numero_recibido);

       /*
        if(validar(numero_recibido))
        {
            ///form.append("numero", numero_recibido.toString());
            ///form.append("ruta_actual", "index.html");
            //ajax.enviar_GET("./nexo.php",  "numero="+numero_recibido.toString() + "&ruta_actual=s", mostrarDatos);
            ///ajax.enviar_POST("./nexo.php",  form, mostrarDatos);
        }
        else
        {
            alert("El numero ingresado no es par o es menor a 1")
        }*/
    }

    function ho()
    {
        window.location.href ="./hoa.php" ;
    }
}
    
