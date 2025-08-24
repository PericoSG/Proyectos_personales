package SummerFun.SummerFunBackend.Controllers;

import SummerFun.SummerFunBackend.Entity.Usuario;
import SummerFun.SummerFunBackend.Services.UsuarioService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("summerfun/")
public class UsuarioController {
    @Autowired
    private UsuarioService usuarioService;

    @GetMapping("usuarios")
    private List<Usuario> mostrarTodosUsuarios(){
        return usuarioService.mostrarTodosUsuarios();
    }

    @PostMapping("crearUsuario")
    private ResponseEntity<?> crearUsuario(@RequestBody Usuario nuevoUsuario){
        return usuarioService.crearUsuario(nuevoUsuario.getNombre(),nuevoUsuario.getAp1(),nuevoUsuario.getAp2(),nuevoUsuario.getEmail(),
                nuevoUsuario.getPassword(),nuevoUsuario.getFechaNacimiento(),nuevoUsuario.getTlf(),
                nuevoUsuario.getDni(),nuevoUsuario.getNie());
    }

    @PutMapping("editarUsuario/{id}")
    private ResponseEntity<?> editarUsuario(@RequestBody Usuario usuarioExistente, @PathVariable Integer id){
        return usuarioService.editarUsuario(id,usuarioExistente.getNombre(),usuarioExistente.getAp1(),usuarioExistente.getAp2(), usuarioExistente.getFechaNacimiento(),
                usuarioExistente.getEmail(),
                usuarioExistente.getPassword(),usuarioExistente.getTlf(),
                usuarioExistente.getDni(),usuarioExistente.getNie());
    }

    @DeleteMapping("borrarUsuario/{id}")
    private ResponseEntity<?> borrarUsuario( @PathVariable Integer id){
        return usuarioService.borrarUsuario(id);
    }
}
