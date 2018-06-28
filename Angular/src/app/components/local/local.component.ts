import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { LocalService } from '../../services/local-service';
import {Http, Response, Headers} from "@angular/http";
import "rxjs/add/operator/map";
import {Observable} from "rxjs/Observable";
import { Local } from '../../models/local';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { Usuario } from '../../models/usuario';

@Component({
  selector: 'app-local',
  templateUrl: './local.component.html',
  styleUrls: ['./local.component.css'],
  providers: [ LocalService ]
})
export class LocalComponent implements OnInit {
  usuarioLogueado = {};

  public arrayLocals: Array<Local>;
  public newLocal:Local;
  public editandoLoc:Local;
  
  constructor(private router: Router, private servicio:LocalService, private modalService: NgbModal) { 
    this.usuarioLogueado = localStorage.getItem("usuarioLogueado");
    if(localStorage.getItem("usuarioLogueado") == null)
    {
      router.navigateByUrl('login');
    }

    if(localStorage.getItem("perfil") != "administrativo")
    {
      router.navigateByUrl('home');
    }
    this.newLocal = new Local();
    this.cargarLocals();
  }


  cargarLocals()
  {
    this.servicio.getLocals().subscribe(
      result=>
      {
        this.arrayLocals = JSON.parse(result.locals);
      },
      error =>
      {
        console.error(error);
      }
    );
  }


  crearLocal()
  {
    this.servicio.createLocal(this.newLocal).subscribe(
      data =>
      {
        this.cargarLocals();
        this.newLocal = new Local();
      },
      error => {
        console.error(error);
      }
    );
  }
  editarLocal(loc:Local, modal)
  {
    this.editandoLoc = loc;
    this.modalService.open(modal);
  }
  actualizarLocal()
  {
    this.servicio.updateLocal(this.editandoLoc).subscribe(
      data=> {
        this.cargarLocals();
      },
      error =>
      {
        console.error(error);
      }
    );
  }

  borrarLocal(loc:Local)
  {
    this.servicio.eliminarLocal(loc).subscribe(
      result=>
      {
        this.cargarLocals();
      },
      error =>
      {
        console.error(error);
      }
    );
  }
  getHabilitado(loc:Local):string
  {
      return (loc.habilitado) ? "SI" : "NO";
  }
  getAlquilado(loc:Local):string
  {
      return (loc.alquilado) ? "Alquilado" : "Libre";
  }

  ngOnInit() {
  }

}
