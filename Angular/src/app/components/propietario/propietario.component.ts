import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { PropietarioService } from '../../services/propietario-service';
import {Http, Response, Headers} from "@angular/http";
import "rxjs/add/operator/map";
import {Observable} from "rxjs/Observable";
import { Propietario } from '../../models/propietario';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { Usuario } from '../../models/usuario';

@Component({
  selector: 'app-propietario',
  templateUrl: './propietario.component.html',
  styleUrls: ['./propietario.component.css'],
  providers: [ PropietarioService ]
})
export class PropietarioComponent implements OnInit {
  usuarioLogueado = {};

  public arrayPropietarios: Array<Propietario>;
  public newPropietario:Propietario;
  public editandoProp:Propietario;
  
  constructor(private router: Router, private servicio:PropietarioService, private modalService: NgbModal) { 
    this.usuarioLogueado = localStorage.getItem("usuarioLogueado");
    if(localStorage.getItem("usuarioLogueado") == null)
    {
      router.navigateByUrl('login');
    }

    if(localStorage.getItem("perfil") != "administrativo")
    {
      router.navigateByUrl('home');
    }
    this.newPropietario = new Propietario();
    this.cargarPropietarios();
  }


  cargarPropietarios()
  {
    this.servicio.getPropietarios().subscribe(
      result=>
      {
        this.arrayPropietarios = JSON.parse(result.propietarios);
      },
      error =>
      {
        console.error(error);
      }
    );
  }


  crearPropietario()
  {
    this.servicio.createPropietario(this.newPropietario).subscribe(
      data =>
      {
        this.cargarPropietarios();
        this.newPropietario = new Propietario();
      },
      error => {
        console.error(error);
      }
    );
  }
  editarPropietario(prop:Propietario, modal)
  {
    this.editandoProp = prop;
    this.modalService.open(modal);
  }
  actualizarPropietario()
  {
    this.servicio.updatePropietario(this.editandoProp).subscribe(
      data=> {
        this.cargarPropietarios();
      },
      error =>
      {
        console.error(error);
      }
    );
  }

  borrarPropietario(prop:Propietario)
  {
    this.servicio.eliminarPropietario(prop).subscribe(
      result=>
      {
        this.cargarPropietarios();
      },
      error =>
      {
        console.error(error);
      }
    );
  }
  ngOnInit() {
  }

}
