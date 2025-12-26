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
    { name: 'Asha', song: 'Turista', image: 'img/asha.jpg', description: '' },
    { name: 'Aytat', song: 'Dopamina', image: 'img/aytat.jpg', description: '' },
    { name: 'Dani J', song: 'Bailandote', image: 'img/danij.jpg', description: '' }
  ];

}
