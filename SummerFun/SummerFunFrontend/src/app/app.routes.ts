import { Routes } from '@angular/router';
import { IndexComponent } from './index/index.component';
import { InicioSesionComponent } from './paginas/inicio-sesion/inicio-sesion.component';

export const routes: Routes = [
  { path: '', redirectTo: "inicio", pathMatch: 'full' },
  { path: "inicio", component: IndexComponent },
  { path: "inicioSesion", component: InicioSesionComponent }
];
