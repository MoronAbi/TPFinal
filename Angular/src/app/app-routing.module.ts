import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './components/login/login.component';
import { HomeComponent } from './components/home/home.component';




const routes: Routes = [
  { path: '', component: LoginComponent},
  { path: 'home', component: HomeComponent}
  /* { path: '', component: Punto1Component},
 { path: 'escuela', component: EscuelaComponent},
  { path: 'categoria', component: CategoriasComponent},
  { path: 'punto2', component: Punto2Component},
  { path: 'punto3', component: Punto3Component},
  { path: 'punto4', component: Punto4Component},
  { path: 'punto5', component: Punto5Component},
  { path: '*', pathMatch: 'full', redirectTo: ''}*/

];

export const Rutas_App = RouterModule.forRoot(routes);
