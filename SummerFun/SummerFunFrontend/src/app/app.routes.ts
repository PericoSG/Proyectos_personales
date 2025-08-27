import { Routes } from '@angular/router';
import { LoginComponent } from './auth/login/login.component';
import { IndexComponent } from './pages/index/index.component';

export const routes: Routes = [
  { path: '', redirectTo: "inicio", pathMatch: 'full' },
  { path: "inicio", component: IndexComponent },
  { path: "login", component: LoginComponent }
];
