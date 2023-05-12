/// <reference path="./Usuario.ts" />

namespace Entidades
{
    export class Empleado extends Usuario
    {   
        private sueldo : number;
        private foto : string;

        public constructor(nombre : string, correo : string, 
            id : number, id_perfil : number, perfil : string,
            sueldo : number, foto : string)
        {
            super(nombre, correo, id, id_perfil, perfil);

            this.sueldo = sueldo;
            this.foto = foto;
        }
    }
}