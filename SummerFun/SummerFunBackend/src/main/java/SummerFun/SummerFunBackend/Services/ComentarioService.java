package SummerFun.SummerFunBackend.Services;

import org.springframework.http.ResponseEntity;
import org.w3c.dom.Text;

public interface ComentarioService {
     ResponseEntity<String> crearMensaje(String nombre, String email, String mensaje);
}
