import { Routes } from '@angular/router';
import { HomeComponent } from './components/home/home.component';
import { ParticipantsComponent } from './components/participants/participants.component';

export const routes: Routes = [
  { path: '', redirectTo: 'home', pathMatch: 'full' },
  { path: 'home', component: HomeComponent },
  { path: 'participantes', component: ParticipantsComponent }
];
