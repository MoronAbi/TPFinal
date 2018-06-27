import { Component, OnInit } from '@angular/core';
import { AuthenticationService } from '../../services/authentication-service.service';
import { ActivatedRoute, Router } from '@angular/router';
import { LoginComponent } from '../login/login.component';
@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {
  usuarioLogueado = {};
  constructor(public authenticationService:AuthenticationService, private router: Router) { 
    this.usuarioLogueado = localStorage.getItem("usuarioLogueado");

  }


  logout()
  {
    localStorage.removeItem("usuarioLogueado");
    this.authenticationService.logout();
    this.usuarioLogueado = {};
    this.router.navigateByUrl('');
  }

  ngOnInit() {
  }

}
