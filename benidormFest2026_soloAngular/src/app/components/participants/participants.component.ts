import { Component } from '@angular/core';
import { MatCard, MatCardModule } from '@angular/material/card';

@Component({
  selector: 'app-participants',
  imports: [MatCardModule],
  templateUrl: './participants.component.html',
  styleUrl: './participants.component.css'
})
export class ParticipantsComponent {

  participants = [
    { name: 'Asha', song: 'Turista', image: 'img/participants/asha.jpg', description: '' },
    { name: 'Atyat', song: 'Dopamina', image: 'img/participants/atyat.jpg', description: '' },
    { name: 'Dani J', song: 'Bailandote', image: 'img/participants/danij.jpg', description: '' },
    { name: 'Dora & Maron Collins', song: 'Rakata', image: 'img/participants/dora&marlon.jpg', description: '' },
    { name: 'Funambulista', song: 'SOBRAN GILLIPO**AS', image: 'img/participants/funambulista.jpg', description: '' },
    { name: 'Greg Taro', song: 'Velita', image: 'img/participants/greg.jpg', description: '' },
    { name: 'Izan Llunas', song: '¿Qué vas a hacer?', image: 'img/participants/izan.jpg', description: '' },
    { name: 'Kenneth', song: 'Los Ojos No Mienten', image: 'img/participants/kenneth.jpg', description: '' },
    { name: 'Kitai', song: 'El Amor No Te Da Miedo', image: 'img/participants/kitai.jpg', description: '' },
    { name: 'Ku Minerva', song: 'No Volveré a Llorar', image: 'img/participants/minerva.jpg', description: '' },
    { name: 'Luna Ki', song: 'Bomba De Amor', image: 'img/participants/lunaKi.jpg', description: '' },
    { name: 'Maria León y Julia Medina', song: 'Las Damas y el Vagabundo', image: 'img/participants/maria&julia.jpg', description: '' },
    { name: 'Mayo', song: 'Tocame', image: 'img/participants/mayo.jpg', description: '' },
    { name: 'Mikel Herzog Jr', song: 'Mi Mitad', image: 'img/participants/mikelHerzog.jpg', description: '' },
    { name: 'Miranda! & Bailamamá', song: 'Despierto Amándote', image: 'img/participants/bailamama.jpg', description: '' },
    { name: 'Rosalinda Galán', song: 'Mataora', image: 'img/participants/rosalinda.jpg', description: '' },
    { name: 'The Quinquis', song: 'Tu No Me Quieres', image: 'img/participants/quinquis.jpg', description: '' },
    { name: 'Tony Grox & LUCYCALYS', song: 'T AMARÉ', image: 'img/participants/Tony&Luci.jpg', description: '' }

  ];

}
