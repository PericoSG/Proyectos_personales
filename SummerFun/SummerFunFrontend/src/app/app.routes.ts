import { Routes } from '@angular/router';
import { IndexComponent } from './index/index.component';
import { LoginComponent } from './auth/login/login.component';

export const routes: Routes = [
  { path: '', redirectTo: "inicio", pathMatch: 'full' },
  { path: "inicio", component: IndexComponent },
  { path: "login", component: LoginComponent }
];
