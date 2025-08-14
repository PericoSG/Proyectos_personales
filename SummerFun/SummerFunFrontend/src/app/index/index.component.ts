import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { IndexService } from '../index.service';
import { Comentario } from '../models/comentario';

@Component({
  selector: 'app-index',
  imports: [FormsModule, CommonModule],
  templateUrl: './index.component.html',
  styleUrl: './index.component.css'
})
export class IndexComponent {

  nombre: string = "";
  email: string = "";
  mensaje: string = "";
  comentario: Comentario = { nombre: "", email: "", mensaje: "" };


  constructor(private comentarioService: IndexService) { }
  enviarMensaje() {
    console.log(this.nombre);
    console.log(this.email);
    console.log(this.mensaje)

    this.comentario = { nombre: this.nombre, email: this.email, mensaje: this.mensaje }

    console.log(typeof (this.comentario))
    this.comentarioService.enviarMensaje(this.comentario).subscribe(
      response => {
        alert("Comentario guardado, muchas gracias!")
      },
      error => {
        alert("ha dado un error");
      }
    );
  }

}
