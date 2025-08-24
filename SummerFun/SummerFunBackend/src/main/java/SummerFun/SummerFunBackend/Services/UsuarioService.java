package SummerFun.SummerFunBackend.Services;

import SummerFun.SummerFunBackend.Entity.Usuario;
import SummerFun.SummerFunBackend.Repository.UsuarioRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Service;

import java.util.Date;
import java.util.Calendar;
import java.util.List;

@Service
public interface UsuarioService {
    List<Usuario> mostrarTodosUsuarios();

    ResponseEntity<?> crearUsuario(String nombre, String ap1, String ap2, String email, String password,
            Date fechaNacimiento,
            String tlf, String dni, String nie);

    ResponseEntity<?> editarUsuario(Integer id, String nombre, String ap1, String ap2, Date fechaNacimiento,
            String email, String password,
            String tlf, String dni, String nie);

    ResponseEntity<?> borrarUsuario(Integer id);

    ResponseEntity<?> login(String email, String password);

    // Métodos auxiliares
    default boolean validarEmail(String email) {
        return email != null && email.matches("^[A-Za-z0-9+_.-]+@(.+)$");
    }

    default ResponseEntity<?> validarFechaNacimiento(Date fechaNacimiento) {
        if (fechaNacimiento == null) {
            return ResponseEntity.badRequest().body("La fecha de nacimiento es obligatoria");
        }

        Date hoy = new Date();

        if (fechaNacimiento.after(hoy)) {
            return ResponseEntity.badRequest().body("La fecha de nacimiento no puede ser futura");
        }

        Calendar limite = Calendar.getInstance();
        limite.add(Calendar.YEAR, -120);
        if (fechaNacimiento.before(limite.getTime())) {
            return ResponseEntity.badRequest().body("La fecha de nacimiento no es válida (muy antigua)");
        }

        Calendar nacimiento = Calendar.getInstance();
        nacimiento.setTime(fechaNacimiento);

        Calendar actual = Calendar.getInstance();

        int edad = actual.get(Calendar.YEAR) - nacimiento.get(Calendar.YEAR);

        // corregir si todavía no ha cumplido este año
        if (actual.get(Calendar.DAY_OF_YEAR) < nacimiento.get(Calendar.DAY_OF_YEAR)) {
            edad--;
        }

        if (edad < 16) {
            return ResponseEntity.badRequest().body("Debes tener al menos 16 años");
        }

        return ResponseEntity.ok("Fecha de nacimiento válida");
    }

    boolean EmailExistente(String email);

    boolean DniExistente(String email);

    boolean NieExistente(String nie);

}
