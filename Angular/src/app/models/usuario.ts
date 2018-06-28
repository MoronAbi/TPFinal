export class Usuario
{
    id: number;
    email: string;
    usuario: string;
    password: string;
    activo: boolean;
    perfil: string;
    constructor(id?:number, email?:string, usuario?:string, password?:string, activo?:boolean, perfil?:string)
    {
        this.id= id;
        this.email = email;
        this.usuario = usuario;
        this.password = password;
        this.activo = activo;
        this.perfil = perfil;
    }
}