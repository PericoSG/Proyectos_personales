import { Component, Input } from '@angular/core';
import { ArtistasComponent } from '../artistas/artistas.component';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { ArrayServicioService } from '../array-servicio.service';

@Component({
  selector: 'app-tarjeta-artista',
  imports: [RouterLink,RouterLinkActive],
  templateUrl: './tarjeta-artista.component.html',
  styles: ``
})
export class TarjetaArtistaComponent 
{
   @Input() artista:any;

  constructor(private benidormFest2025:ArrayServicioService) {}


  EstaEnMiTop(artista:any)
  {
      return this.benidormFest2025.EstaEnMiTop(artista);
  }
   Agregar_a_top(artista:string)
  {
      return this.benidormFest2025.Agregar_a_top(artista);
  }

}
