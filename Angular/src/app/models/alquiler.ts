import { Propietario } from "./propietario";
import { Local } from "./local";

export class Alquiler
{
    id:number; propietario:Propietario; local:Local; plazomes:number; costoalquiler:number; fechaAlquiler:Date;
    constructor(id?:number, propietario?:Propietario, local?:Local, plazomes?:number, costoalquiler?:number, fechaAlquiler?:Date){

    }
}