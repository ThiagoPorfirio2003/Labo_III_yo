/// <reference path="Persona.ts" />

namespace Entidades
{
    export class Usuario extends Persona
    {
        private id : number;
        private id_perfil : number;
        private perfil : string;

        public constructor(nombre : string, correo : string, 
            id : number, id_perfil : number, perfil : string)
        {
            super(nombre, correo);

            this.id = id;
            this.id_perfil= id_perfil;
            this.perfil = perfil;
        }

        public ToString(): string 
        {
            return super.ToString() + `"id":` + this.id + `,"id_perfil":` + this.id_perfil + `,"perfil":"` +
            this.perfil + `"}`
        }

        public ToJSON() : JSON
        {
            return JSON.parse(this.ToString());
        }
    }
}