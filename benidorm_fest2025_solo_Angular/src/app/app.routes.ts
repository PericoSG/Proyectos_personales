import { Routes } from '@angular/router';
import { InicioComponent } from './inicio/inicio.component';
import { ArtistasComponent } from './artistas/artistas.component';
import { TopComponent } from './top/top.component';
import { Error404Component } from './error404/error404.component';

export const routes: Routes = [

    { path: '', redirectTo: 'inicio', pathMatch: 'full' },
    {path:'inicio', component:InicioComponent},
    {path:'artistas', component:ArtistasComponent},
    {path:'top', component:TopComponent},
    {path:'**', component:Error404Component}
];
