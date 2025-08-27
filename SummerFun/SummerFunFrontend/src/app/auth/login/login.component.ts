import { Component } from '@angular/core';
import { FormBuilder, FormGroup, FormsModule, ReactiveFormsModule, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { LoginService } from '../../services/login.service';
import { LoginDTO } from '../../models/loginDTO';
import { HttpErrorResponse } from '@angular/common/http';

@Component({
  selector: 'app-login',
  imports: [FormsModule, ReactiveFormsModule],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})
export class LoginComponent {
  loginForm: FormGroup;
  generalError: string = "";
  isLoading: boolean = false;
  estaEnviado = false;
  comentarioOK = false;
  loginDto: LoginDTO = { email: "", password: "" }

  constructor(
    private router: Router,
    private login: LoginService,
    private fb: FormBuilder
  ) {
    this.loginForm = this.fb.group({
      email: ['', [Validators.required, Validators.email]],
      password: ['', [Validators.required, Validators.minLength(4)]]
    });
  }

  get f() { return this.loginForm.controls; }

  enviarMensaje() {
    this.generalError = "";
    this.isLoading = true;

    this.loginForm.markAllAsTouched();

    const { email, password } = this.loginForm.value;

    this.login.login(email, password).subscribe({
      next: (response) => {
        sessionStorage.setItem("usuarioActual", JSON.stringify(response));
        this.router.navigate(['/inicio']);
        this.isLoading = false;
      },
      error: (error: HttpErrorResponse) => {
        console.log(error);
        this.isLoading = false;

        // Caso: backend devuelve texto plano (ej: "Email incorrecto")
        if (error.status === 401) {
          this.generalError = "Email o contraseña incorrectos";

        } else {
          this.generalError = "Ha ocurrido un error inesperado. Por favor, inténtalo más tarde.";
        }
      }

    });
  }

}
