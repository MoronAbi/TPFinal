import { Injectable } from '@angular/core';

import { Http, Headers, Response } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';

@Injectable()
export class AuthenticationService {
  userLoggedIn : boolean = false;
  nombreLogueado:string;
  perfil:string;
  constructor(private http:Http) { }

  login(username: string, password: string) {
      return this.http.post('http://localhost/proyectoFinal/web/app_dev.php/usuario/authenticate', JSON.stringify({ username: username, password: password }))
          .map(res => res.json());
  }

  logout() {
      // remove user from local storage to log user out
      localStorage.removeItem('usuarioLogueado');
      this.userLoggedIn = false;
  } 

}
