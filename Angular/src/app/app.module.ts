import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';



import { FormsModule } from '@angular/forms';
import { Rutas_App } from './/app-routing.module';

import { HeaderComponent } from './components/header/header.component';

import {HttpClientModule} from '@angular/common/http';
import {HttpModule} from '@angular/http';
import {DataTableModule} from "angular2-datatable";

import { LoginComponent } from './components/login/login.component';
import { HomeComponent } from './components/home/home.component';

import { AuthenticationService } from './services/authentication-service.service';
import { PropietarioComponent } from './components/propietario/propietario.component';
import { VisitanteComponent } from './components/visitante/visitante.component';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { LocalComponent } from './components/local/local.component';

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    HeaderComponent,
    HomeComponent,
    PropietarioComponent,
    VisitanteComponent,
    LocalComponent
  ],
  imports: [
    BrowserModule, Rutas_App, FormsModule, HttpClientModule, HttpModule, DataTableModule, NgbModule.forRoot()
  ],
  providers: [AuthenticationService],
  bootstrap: [AppComponent]
})
export class AppModule { }
