export class Propietario
{
    id:number;
    apellido:string;
    nombres:string;
    dni:number;
    email:string;
    telefono:number;
    constructor(id?:number, apellido?:string, nombres?:string, dni?:number, email?:string, telefono?:number)
    {
        this.id = id;
        this.apellido = apellido;
        this.nombres = nombres;
        this.dni = dni;
        this.email = email;
        this.telefono = telefono;
    }
}