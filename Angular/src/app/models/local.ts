export class Local
{
    id:number;
    superficie:number;
    habilitado:boolean;
    costomes:number;
    pathimagen:string;
    alquilado:boolean;
    constructor(id?:number, superficie?:number, habilitado?:boolean, costomes?:number, pathimagen?:string, alquilado?:boolean)
    {
        this.id = id;
        this.superficie = superficie;
        this.habilitado = habilitado;
        this.costomes = costomes;
        this.pathimagen = pathimagen;
        this.alquilado = alquilado;
    }

}