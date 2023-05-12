namespace Entidades
{
    export class Persona
    {
        private nombre : string;
        private correo : string;
        private clave : string;
        
        protected constructor(nombre : string, correo : string)
        {
            this.nombre = nombre;
            this.correo = correo;
            this.clave = "";
        }

        public ToString() : string
        {
            return `{"nombre":"` + this.nombre + `","correo":"` + this.correo +`","clave":"` + this.clave + `",`;
        }
    }
}