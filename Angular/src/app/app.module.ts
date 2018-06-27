import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';



import { FormsModule } from '@angular/forms';
import { Rutas_App } from './/app-routing.module';

import { HeaderComponent } from './components/header/header.component';

import {HttpClientModule} from '@angular/common/http';
import {HttpModule} from '@angular/http';


import { LoginComponent } from './components/login/login.component';
import { HomeComponent } from './components/home/home.component';

import { AuthenticationService } from './services/authentication-service.service';

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    HeaderComponent,
    HomeComponent
  ],
  imports: [
    BrowserModule, Rutas_App, FormsModule, HttpClientModule, HttpModule
  ],
  providers: [AuthenticationService],
  bootstrap: [AppComponent]
})
export class AppModule { }
