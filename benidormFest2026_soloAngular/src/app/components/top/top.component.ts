import { Component } from '@angular/core';
import { ParticipantsService } from '../../services/participants.service';
import { MatCard } from '@angular/material/card';

@Component({
  selector: 'app-top',
  imports: [MatCard],
  templateUrl: './top.component.html',
  styleUrl: './top.component.css'
})
export class TopComponent {

  participants: any;
  finalTop: any;

  constructor(private participant: ParticipantsService) { }

  ngOnInit() {
    this.finalTop = Array.from({ length: 18 }, () => null);
    console.log(this.finalTop)

    return this.participants = this.participant.getParticipants();
  }
}
