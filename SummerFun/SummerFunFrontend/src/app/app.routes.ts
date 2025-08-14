import { Routes } from '@angular/router';
import { IndexComponent } from './index/index.component';

export const routes: Routes = [
  { path: '', redirectTo: "inicio", pathMatch: 'full' },
  { path: "inicio", component: IndexComponent }
];
