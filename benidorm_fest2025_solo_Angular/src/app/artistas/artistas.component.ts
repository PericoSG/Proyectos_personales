import { Component } from '@angular/core';
import { TarjetaArtistaComponent } from '../tarjeta-artista/tarjeta-artista.component';
import { ArrayServicioService } from '../array-servicio.service';

@Component({
  selector: 'app-artistas',
  imports: [TarjetaArtistaComponent],
  templateUrl: './artistas.component.html',
  styles: ``
})
export class ArtistasComponent {

 constructor(private benidormFest2025:ArrayServicioService) {}


 getBenidormArtist()
 {
    return this.benidormFest2025.getBenidormArtist();
 }
}
