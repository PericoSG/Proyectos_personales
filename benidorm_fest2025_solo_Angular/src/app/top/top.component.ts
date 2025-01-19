import { Component, Input } from '@angular/core';
import { ArtistaEnTopComponent } from "../artista-en-top/artista-en-top.component";
import { ArrayServicioService } from '../array-servicio.service';

@Component({
  selector: 'app-top',
  imports: [ArtistaEnTopComponent],
  templateUrl: './top.component.html',
  styles: ``
})
export class TopComponent {

  
  constructor( private benidormFest2025:ArrayServicioService) {}

  maxItems = 16;
  getTop()
  {
      return this.benidormFest2025.getTop()
  }

  getIndex(index: number): number {
    return this.maxItems - this.getTop().length + index + 1;
  }
}
