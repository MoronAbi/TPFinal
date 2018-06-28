import { Usuario } from "./usuario";

export class Novedades
{
    id:number;
    usuario:Usuario;
    Texto:string;
    estado:string;
    constructor(id?:number,usuario?:Usuario,Texto?:string,estado?:string)
    {
        this.id = id;
        this.usuario = usuario;
        this.Texto = Texto;
        this.estado = estado;
    }
}