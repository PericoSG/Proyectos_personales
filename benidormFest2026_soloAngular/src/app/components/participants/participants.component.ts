import { Component, model } from '@angular/core';
import { MatCard, MatCardModule } from '@angular/material/card';
import { MatIcon, MatIconModule } from '@angular/material/icon';
import { DomSanitizer, SafeResourceUrl } from '@angular/platform-browser';
import { ParticipantsService } from '../../services/participants.service';

@Component({
  selector: 'app-participants',
  imports: [MatCardModule, MatIconModule, MatIcon],
  templateUrl: './participants.component.html',
  styleUrl: './participants.component.css'
})
export class ParticipantsComponent {

  view: string = "grid"


  participants: any = [];
  modalOpen: boolean = false;
  safeVideoUrl!: SafeResourceUrl
  participantModal: any = "";

  constructor(private sanitizer: DomSanitizer, private participant: ParticipantsService) { }


  ngOnInit() {
    return this.participants = this.participant.getParticipants();
  }


  OpenModal(participantId: number) {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    }); // Esto sube hasta arriba para no tener que hacer scroll para ir al modal

    this.participantModal = this.buscaParticipante(participantId)
    this.safeVideoUrl = this.sanitizer.bypassSecurityTrustResourceUrl(this.participantModal.video); // Con esto no bloquea la seguridad del iframe


    this.modalOpen = true;
  }

  closeModal() {
    this.modalOpen = false;
  }

  buscaParticipante(participantId: number) {
    const participant = this.participants.find((p: any) => p.id === participantId);
    console.log(participant)
    return participant;
  }

  changeView(newView: string) {
    this.view = newView;
  }


}
