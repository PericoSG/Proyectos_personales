import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { FormBuilder, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';
import { IndexService } from '../index.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-index',
  standalone: true,
  imports: [ReactiveFormsModule, CommonModule],
  templateUrl: './index.component.html',
  styleUrl: './index.component.css'
})
export class IndexComponent {

  comentarioForm: FormGroup;
  generalError: string = "";
  isLoading: boolean = false;
  estaEnviado = false;
  comentarioOK = false;

  constructor(
    private router: Router,
    // private auth: AuthService,
    private index: IndexService,
    private fb: FormBuilder
  ) {
    this.comentarioForm = this.fb.group({
      nombre: ['', [Validators.required, Validators.minLength(3)]],
      email: ['', [Validators.required, Validators.email]],
      mensaje: ['', [Validators.required, Validators.minLength(3)]]
    });
  }

  // ngOnInit(): void {
  //     this.auth.checkSession().subscribe({
  //         next: () => {
  //             sessionStorage.setItem("usuarioActual", "true");
  //             this.router.navigate(['/inicio']);
  //         },
  //         error: () => {
  //             sessionStorage.removeItem("usuarioActual");
  //             console.log("No hay sesión activa");
  //         }
  //     });
  // }

  get f() { return this.comentarioForm.controls; }

  enviarMensaje() {
    this.generalError = "";
    this.estaEnviado = false;
    this.comentarioOK = false;
    this.comentarioForm.markAllAsTouched();

    if (this.comentarioForm.invalid) {
      // Solo error de validación, no se envía nada al servidor
      this.generalError = "Por favor, rellena todos los campos correctamente.";
      return;
    }

    this.isLoading = true;
    this.index.enviarMensaje(this.comentarioForm.value).subscribe({
      next: () => {
        this.isLoading = false;
        this.estaEnviado = true;
        this.comentarioOK = true;
        this.generalError = "";
        this.comentarioForm.reset();
      },
      error: (error) => {
        this.isLoading = false;
        this.estaEnviado = true;
        this.comentarioOK = false;
        this.generalError = "Ha ocurrido un error al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.";
      }
    });
  }
}
