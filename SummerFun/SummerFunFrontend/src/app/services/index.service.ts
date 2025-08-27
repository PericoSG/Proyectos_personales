import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Comentario } from '../models/comentario';

@Injectable({
  providedIn: 'root'
})
export class IndexService {

  apiBase: string = "http://localhost:8082/summerfun"
  constructor(private http: HttpClient) { }

  enviarMensaje(mensaje: Comentario) {
    return this.http.post(this.apiBase + "/crearMensaje", mensaje)
  }
}
