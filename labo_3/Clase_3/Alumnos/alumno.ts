class Alumno
{
    public nombre : string;
    public apellido : string;
    public legajo : string;
    public path_foto : string;
    //private static Ajax : Ajax;

    public constructor(nombre : string, apellido : string, legajo : string, path_foto : string)
    {
        this.nombre = nombre;
        this.apellido = apellido;
        this.legajo = legajo;
        this.path_foto = path_foto;
    }

    public modificarDatos(nombre : string, apellido : string, legajo : string, path_foto : string)
    {
        this.nombre = nombre;
        this.apellido = apellido;
        this.legajo = legajo;
        this.path_foto = path_foto;
    }

    public toString() : string
    {
        return `${this.nombre} - ${this.apellido} - ${this.legajo} - ${this.path_foto}`
    }
}