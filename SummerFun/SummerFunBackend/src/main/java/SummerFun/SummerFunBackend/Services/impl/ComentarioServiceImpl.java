package SummerFun.SummerFunBackend.Services.impl;

import SummerFun.SummerFunBackend.Entity.Comentario;
import SummerFun.SummerFunBackend.Repository.ComentarioRepository;
import SummerFun.SummerFunBackend.Services.ComentarioService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Service;
import org.w3c.dom.Text;

@Service
public class ComentarioServiceImpl  implements ComentarioService {
    @Autowired
    ComentarioRepository comentarioRepository;

    @Override
    public ResponseEntity<String> crearMensaje(String nombre, String email, String mensaje){
        Comentario nuevoComentario = new Comentario();
        nuevoComentario.setNombre(nombre);
        nuevoComentario.setEmail(email);
        nuevoComentario.setMensaje(mensaje);
        comentarioRepository.save(nuevoComentario);
        return new ResponseEntity<>("¡Se ha guardado tu mensaje, gracias por contactar con nosotros!", HttpStatus.CREATED);

    }
}
