import { Injectable } from '@angular/core';
import {Http, Response, Headers, RequestOptions} from "@angular/http";
import "rxjs/add/operator/map";
import {Observable} from "rxjs/Observable";

@Injectable()
export class PropietarioService {
    constructor(private _http: Http) {

    }
    getPropietarios()
    {
        return this._http.get("http://localhost/proyectoFinal/web/app_dev.php/propietario/")
        .map(res => res.json());
    }

    createPropietario(propietario) {
        let headers = new Headers({ 'Content-Type': 'application/json' });
        let options = new RequestOptions({ headers: headers });
        let body = JSON.stringify(propietario);
        return this._http.post('http://localhost/proyectoFinal/web/app_dev.php/propietario/new', body, options).map((res: Response) => res.json());
    }
    
    updatePropietario(propietario)
    {
      let headers = new Headers({ 'Content-Type': 'application/json' });
      let options = new RequestOptions({ headers: headers });
      let body = JSON.stringify(propietario);
      let postURL = "http://localhost/proyectoFinal/web/app_dev.php/propietario/" + propietario.id + "/edit"
      return this._http.post(postURL, body, options).map((res: Response) => res.json());
    }
    eliminarPropietario(propietario)
    {
      let headers = new Headers({ 'Content-Type': 'application/json' });
      let options = new RequestOptions({ headers: headers });
      let body = JSON.stringify(propietario);
  
      let postURL = "http://localhost/proyectoFinal/web/app_dev.php/propietario/"+propietario.id;
      return this._http.delete(postURL, options).map((res: Response) => res.json());
    }
    

}