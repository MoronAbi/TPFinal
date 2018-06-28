import { Injectable } from '@angular/core';
import {Http, Response, Headers, RequestOptions} from "@angular/http";
import "rxjs/add/operator/map";
import {Observable} from "rxjs/Observable";

@Injectable()
export class LocalService {
    constructor(private _http: Http) {

    }
    getLocals()
    {
        return this._http.get("http://localhost/proyectoFinal/web/app_dev.php/local/")
        .map(res => res.json());
    }

    createLocal(local) {
        let headers = new Headers({ 'Content-Type': 'application/json' });
        let options = new RequestOptions({ headers: headers });
        let body = JSON.stringify(local);
        return this._http.post('http://localhost/proyectoFinal/web/app_dev.php/local/new', body, options).map((res: Response) => res.json());
    }
    
    updateLocal(local)
    {
      let headers = new Headers({ 'Content-Type': 'application/json' });
      let options = new RequestOptions({ headers: headers });
      let body = JSON.stringify(local);
      let postURL = "http://localhost/proyectoFinal/web/app_dev.php/local/" + local.id + "/edit"
      return this._http.post(postURL, body, options).map((res: Response) => res.json());
    }
    eliminarLocal(local)
    {
      let headers = new Headers({ 'Content-Type': 'application/json' });
      let options = new RequestOptions({ headers: headers });
      let body = JSON.stringify(local);
  
      let postURL = "http://localhost/proyectoFinal/web/app_dev.php/local/"+local.id;
      return this._http.delete(postURL, options).map((res: Response) => res.json());
    }
    

}