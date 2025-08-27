import { HttpClient, HttpErrorResponse } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { LoginDTO } from '../models/loginDTO';
import { catchError, tap, throwError } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class LoginService {
  apiBase: string = "http://localhost:8082/summerfun"

  constructor(private http: HttpClient) { }

  /**
     * Realiza el login del usuario
     * @param email Email de usuario
     * @param password Contraseña del usuario
     * @returns Observable con la respuesta del servidor
     */
  login(email: string, password: string) {
    const body: LoginDTO = { email: email, password: password };
    return this.http.post(this.apiBase + "/login", body, { withCredentials: true, responseType: 'text' }).pipe(
      catchError(this.handleError)
    );
  }

  /**
   * Registra un nuevo usuario
   * @param email Email de usuario
   * @param password Contraseña del usuario
   * @returns Observable con la respuesta del servidor
   */
  logout() {
    return this.http.post(this.apiBase + "/logout", {}, { withCredentials: true }).pipe(
      tap(() => { sessionStorage.removeItem("usuarioActual") }),
      catchError(this.handleError)
    );
  }

  /**
   * Verifica si el usuario está logueado
   * @returns true si el usuario está logueado, false en caso contrario
   */
  estaLogueado() {
    return !!sessionStorage.getItem("usuarioActual");
  }

  /**
   * Obtiene el nombre de usuario del usuario logueado
   * @returns Nombre de usuario si está logueado, null en caso contrario
   */
  private handleError(error: HttpErrorResponse) {
    let errorMessage = 'Error desconocido!';
    if (error.error instanceof ErrorEvent) {
      errorMessage = `Error: ${error.error.message}`;
    } else {
      if (error.status === 401) {
        errorMessage = 'Credenciales inválidas.';
      } else if (error.status === 404) {
        errorMessage = 'Recurso no encontrado.';
      } else {
        errorMessage = `Error del servidor: ${error.status} ${error.message || ''}. ${error.error || ''}`;
      }
    }
    console.error(errorMessage);
    return throwError(() => error);
  }

  /**
   * Verifica si la sesión del usuario es válida
   * @returns Observable que emite true si la sesión es válida, false en caso contrario
   */
  checkSession() {
    return this.http.get(this.apiBase + "/check-session", { withCredentials: true }).pipe(
      tap(() => sessionStorage.setItem("usuarioActual", "true")),
      catchError(() => {
        sessionStorage.removeItem("usuarioActual");
        return throwError(() => new Error("Sesión inválida"));
      })
    );
  }
}
