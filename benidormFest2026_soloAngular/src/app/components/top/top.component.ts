import { Component } from '@angular/core';
import { ParticipantsService } from '../../services/participants.service';
import { MatCard } from '@angular/material/card';
import { DragDropModule, CdkDragDrop } from '@angular/cdk/drag-drop';
@Component({
  selector: 'app-top',
  imports: [MatCard, DragDropModule],
  templateUrl: './top.component.html',
  styleUrl: './top.component.css'
})
export class TopComponent {

  participants: any;
  top18: any;

  connectedDropLists = ['pool', ...Array.from({ length: 18 }, (_, i) => `slot-${i}`)]; // esto devuelve slot-0,slot-1...slot-18



  constructor(private participant: ParticipantsService) { }

  ngOnInit() {
    this.top18 = Array.from({ length: 18 }, () => null);
    console.log(this.top18)

    return this.participants = this.participant.getParticipants();
  }

  // Cuando sueltas un artista en una posición del TOP
  onDropToSlot(event: CdkDragDrop<any>, index: number) {
    const participant = event.item.data; // Si ya estaba en otra posición del TOP
    const previousIndex = this.top18.findIndex((a: any) => a?.id === participant.id);
    if (previousIndex !== -1) {
      this.top18[previousIndex] = null; // Si estaba en el array, lo quitamos
    }
    this.participants = this.participants.filter((a: any) => a.id !== participant.id);
    // Si ya hay alguien en esa posición, lo devolvemos al array de participantes
    if (this.top18[index]) {
      this.participants.push(this.top18[index]);
    } // Colocamos el nuevo artista en esa posición
    this.top18[index] = participant;
  }

  // Cuando devuelves un artista al pool
  onDropToParticipant(event: CdkDragDrop<any>) {
    const participant = event.item.data; // Lo quitamos del TOP si estaba
    const index = this.top18.findIndex((a: any) => a?.id === participant.id);
    if (index !== -1) {
      this.top18[index] = null;
    }
    // Lo añadimos al pool si no estaba ya
    if (!this.participants.find((a: any) => a.id === participant.id)) {
      this.participants.push(participant);
    }
  }
}
