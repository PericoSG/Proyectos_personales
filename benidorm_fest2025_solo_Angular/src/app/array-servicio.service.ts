import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class ArrayServicioService {

  constructor() { }

  private benidormFest2025 = [
    {
      artista: 'Carla Frigo',
      cancion: 'Bésame',
      image: 'assets/img/carla-frigo.jpg',
      semifinal: 'S2'
    },
    {
      artista: 'Celine Van Heel',
      cancion: 'La Casa',
      image: 'assets/img/celine-van-heel.jpg',
      semifinal: 'S2'
    },
    {
      artista: 'Chica Sobresalto',
      cancion: 'Mala Feminista',
      image: 'assets/img/chica-sobresalto.jpg',
      semifinal: 'S1'
    },
    {
      artista: 'Daniela Blasco',
      cancion: 'Uh Nana',
      image: 'assets/img/daniela_blasco.jpg',
      semifinal: 'S1'
    },
    {
      artista: 'David Afonso',
      cancion: 'Amor Barato',
      image: 'assets/img/david-afonso.jpg',
      semifinal: 'S1'
    },
    {
      artista: 'De Teresa',
      cancion: 'La Pena',
      image: 'assets/img/deteresa.jpg',
      semifinal: 'S2'
    },
    {
      artista: 'Henry Semler',
      cancion: 'No Lo Ves',
      image: 'assets/img/henry-semler.jpeg',
      semifinal: 'S2'
    },
    {
      artista: 'JKBello',
      cancion: 'V.I.P',
      image: 'assets/img/jkbello.jpg',
      semifinal: 'S2'
    },
    {
      artista: 'K!ndgom',
      image: 'assets/img/k!ngdom.jpg',
      cancion: 'Me Gustas Tú',
      semifinal: 'S1'
    },
    {
      artista: 'Kuve',
      cancion: 'LocaXTI',
      image: 'assets/img/kuve.jpeg',
      semifinal: 'S1'
    },
    {
      artista: 'LaChispa',
      cancion: 'Hartita de Llorar',
      image: 'assets/img/lachispa.webp',
      semifinal: 'S1'
    },
    {
      artista: 'Lucas Bun',
      cancion: 'Te Escribo en el Cielo',
      image: 'assets/img/lucas-bun.jpg',
      semifinal: 'S1'
    },
    {
      artista: 'Mawot',
      cancion: 'Raggio Di Sole',
      image: 'assets/img/mawot.jpeg',
      semifinal: 'S2'
    },
    {
      artista: 'Melomana',
      cancion: 'I\'m a Queen',
      image: 'assets/img/melomana.jpg',
      semifinal: 'S2'
    },
    {
      artista: 'Melody',
      cancion: 'Esa Diva',
      image: 'assets/img/melody.jpeg',
      semifinal: 'S2'
    },
    {
      artista: 'Sonia y Selena',
      cancion: 'Reinas',
      image: 'assets/img/sonia-selena.jpeg',
      semifinal: 'S1'
    }
  ];

  private mi_top:any [] = [];

  
  getBenidormArtist()
  {
    return this.benidormFest2025;
  }


  Agregar_a_top(artista:any)
  {
    if(!this.EstaEnMiTop(artista) || this.benidormFest2025.length == 0)
    {
        this.mi_top.push(artista);
    }
      

      console.log(this.mi_top);
  }


  EstaEnMiTop(artista: any): boolean {
    return this.mi_top.some((a: any) => a.artista === artista.artista);
  }


  BorrarDeMiTop(artista:any)
  {
    const index = this.mi_top.findIndex((a: any) => a.artista === artista);
  
    // Si se encuentra el artista en la lista
    if (index !== -1) {
      // Eliminar solo el elemento en el índice encontrado (pasando 1 como el segundo parámetro)
      this.mi_top.splice(index, 1); 
      console.log(`Elemento borrado: ${artista.artista}`);
    } else {
      console.log(`No se encontró el artista con el artista: ${artista.artista}`);
    }
  }
  getTop()
  {
    return this.mi_top.reverse();
  }
}
