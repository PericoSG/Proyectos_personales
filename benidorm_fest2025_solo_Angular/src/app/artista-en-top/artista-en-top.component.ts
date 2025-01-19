import { Component, Input } from '@angular/core';
import { ArrayServicioService } from '../array-servicio.service';

@Component({
  selector: 'app-artista-en-top',
  imports: [],
  templateUrl: './artista-en-top.component.html',
  styles: ``
})
export class ArtistaEnTopComponent {

  @Input() artist_top:any;
  @Input() index:any;
  
  constructor(private BenidormFest2025:ArrayServicioService) {}
  
  BorrarDeMiTop(artista:any)
  {
      return this.BenidormFest2025.BorrarDeMiTop(artista);
  }
}
