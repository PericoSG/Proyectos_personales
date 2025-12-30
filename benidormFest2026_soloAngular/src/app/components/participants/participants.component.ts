import { Component, model } from '@angular/core';
import { MatCard, MatCardModule } from '@angular/material/card';
import { MatIcon, MatIconModule } from '@angular/material/icon';

@Component({
  selector: 'app-participants',
  imports: [MatCardModule, MatIconModule, MatIcon],
  templateUrl: './participants.component.html',
  styleUrl: './participants.component.css'
})
export class ParticipantsComponent {

  participants = [
    {
      id: 1,
      name: 'Asha',
      song: 'Turista',
      image: 'img/participants/asha.jpg',

      description: `
      <p><strong>Asha</strong> compite en el Benidorm Fest 2026 con un estilo vibrante y personal.
      Su propuesta destaca por su energía, su identidad artística y una sensibilidad que mezcla
      emoción y movimiento.</p>

      <p>En el escenario, Asha combina presencia, carisma y una estética muy cuidada,
      creando una experiencia visual y musical que conecta con el público desde el primer segundo.</p>
    `,

      songDescription: `
      <p><em>“Turista”</em> es un tema compuesto por Asha junto a Eyla y BENGRO.
      La canción explora el amor, la distancia y la identidad desde la mirada de una mujer
      en constante movimiento.</p>

      <p>Narra un romance fugaz bajo el sol del Mediterráneo, de esos que ocurren una sola vez
      y que con el tiempo se desvanecen en la memoria. La protagonista recorre estaciones, playas
      y recuerdos mientras busca a alguien que ya no está, preguntándose si aquello fue real
      o simplemente parte del viaje.</p>
    `
    },
    { id: 2, name: 'Atyat', song: 'Dopamina', image: 'img/participants/atyat.jpg', description: '', songDescription: '' },
    { id: 3, name: 'Dani J', song: 'Bailandote', image: 'img/participants/danij.jpg', description: '', songDescription: '' },
    { id: 4, name: 'Dora & Maron Collins', song: 'Rakata', image: 'img/participants/dora&marlon.jpg', description: '', songDescription: '' },
    { id: 5, name: 'Funambulista', song: 'SOBRAN GILLIPO**AS', image: 'img/participants/funambulista.jpg', description: '', songDescription: '' },
    { id: 6, name: 'Greg Taro', song: 'Velita', image: 'img/participants/greg.jpg', description: '', songDescription: '' },
    { id: 7, name: 'Izan Llunas', song: '¿Qué vas a hacer?', image: 'img/participants/izan.jpg', description: '', songDescription: '' },
    { id: 8, name: 'Kenneth', song: 'Los Ojos No Mienten', image: 'img/participants/kenneth.jpg', description: '', songDescription: '' },
    { id: 9, name: 'Kitai', song: 'El Amor No Te Da Miedo', image: 'img/participants/kitai.jpg', description: '', songDescription: '' },
    { id: 10, name: 'Ku Minerva', song: 'No Volveré a Llorar', image: 'img/participants/minerva.jpg', description: '', songDescription: '' },
    { id: 11, name: 'Luna Ki', song: 'Bomba De Amor', image: 'img/participants/lunaKi.jpg', description: '', songDescription: '' },
    { id: 12, name: 'Maria León y Julia Medina', song: 'Las Damas y el Vagabundo', image: 'img/participants/maria&julia.jpg', description: '', songDescription: '' },
    { id: 13, name: 'Mayo', song: 'Tocame', image: 'img/participants/mayo.jpg', description: '', songDescription: '' },
    { id: 14, name: 'Mikel Herzog Jr', song: 'Mi Mitad', image: 'img/participants/mikelHerzog.jpg', description: '', songDescription: '' },
    { id: 15, name: 'Miranda! & Bailamamá', song: 'Despierto Amándote', image: 'img/participants/bailamama.jpg', description: '', songDescription: '' },
    { id: 16, name: 'Rosalinda Galán', song: 'Mataora', image: 'img/participants/rosalinda.jpg', description: '', songDescription: '' },
    { id: 17, name: 'The Quinquis', song: 'Tu No Me Quieres', image: 'img/participants/quinquis.jpg', description: '', songDescription: '' },
    { id: 18, name: 'Tony Grox & LUCYCALYS', song: 'T AMARÉ', image: 'img/participants/Tony&Luci.jpg', description: '', songDescription: '' }

  ];

  modalOpen: boolean = false;
  participantModal: any = "";

  OpenModal(participantId: number) {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    }); // Esto sube hasta arriba para no tener que hacer scroll para ir al modal

    this.participantModal = this.buscaParticipante(participantId)

    this.modalOpen = true;
  }

  closeModal() {
    this.modalOpen = false;
  }

  buscaParticipante(participantId: number) {
    const participant = this.participants.find(p => p.id === participantId);
    console.log(participant)
    return participant;
  }


}
