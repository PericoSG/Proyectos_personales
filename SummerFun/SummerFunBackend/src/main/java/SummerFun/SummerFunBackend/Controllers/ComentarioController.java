package SummerFun.SummerFunBackend.Controllers;

import SummerFun.SummerFunBackend.Entity.Comentario;
import SummerFun.SummerFunBackend.Services.ComentarioService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
@RequestMapping("summerfun/")
public class ComentarioController {
    @Autowired
    ComentarioService comentarioService;

    @PostMapping("crearMensaje")
    public ResponseEntity<?> crearMensaje(@RequestBody Comentario comentario){
        System.out.println(comentario.getNombre());
        return comentarioService.crearMensaje(comentario.getNombre(), comentario.getEmail(), comentario.getMensaje());
    }
}
