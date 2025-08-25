package SummerFun.SummerFunBackend.Services.impl;

import SummerFun.SummerFunBackend.Entity.Usuario;
import SummerFun.SummerFunBackend.Repository.UsuarioRepository;
import SummerFun.SummerFunBackend.Services.UsuarioService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.autoconfigure.graphql.GraphQlProperties;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.stereotype.Service;

import java.util.Date;
import java.sql.Timestamp;
import java.util.List;
import java.util.Optional;

@Service
public class UsuarioServiceimpl implements UsuarioService {
    @Autowired
    private UsuarioRepository usuarioRepository;

    @Autowired
    private PasswordEncoder passwordEncoder;

    @Override
    public List<Usuario> mostrarTodosUsuarios() {
        return usuarioRepository.findAll();
    }

    public ResponseEntity<?> crearUsuario(String nombre, String ap1, String ap2, String email, String password,
            Date fechaNacimiento, String tlf, String dni, String nie) {
        if (nombre == null || nombre.trim().isEmpty()) {
            return new ResponseEntity<>("El nombre es obligatorio", HttpStatus.BAD_REQUEST);
        }

        if (ap1 == null || ap1.trim().isEmpty()) {
            return new ResponseEntity<>("El primer apellido es obligatorio", HttpStatus.BAD_REQUEST);
        }

        if (EmailExistente(email)) {
            return new ResponseEntity<>("El email ya esta registrado", HttpStatus.BAD_REQUEST);
        }

        if (!validarEmail(email)) {
            return new ResponseEntity<>("Email sin rellenar o formato incorrecto", HttpStatus.BAD_REQUEST);
        }

        if ((dni != null && !dni.isBlank()) && (nie != null && !nie.isBlank())) {
            // Los dos están rellenos → ERROR
            return ResponseEntity.badRequest().body("No puedes registrar DNI y NIE al mismo tiempo");
        }

        if ((dni == null || dni.isBlank()) && (nie == null || nie.isBlank())) {
            // Los dos vacíos → ERROR
            return ResponseEntity.badRequest().body("Debes indicar DNI o NIE");
        }

        if (dni != null && !dni.isBlank()) {
            if (DniExistente(dni)) {
                return ResponseEntity.badRequest().body("El DNI ya está registrado");
            }
        }

        if (nie != null && !nie.isBlank()) {
            if (NieExistente(nie)) {
                return ResponseEntity.badRequest().body("El NIE ya está registrado");
            }
        }

        ResponseEntity<?> fechaError = validarFechaNacimiento(fechaNacimiento);
        if (fechaError.getStatusCode().isError())
            return fechaError;

        Usuario usuario = new Usuario();
        usuario.setNombre(nombre);
        usuario.setAp1(ap1);
        usuario.setAp2(ap2);
        usuario.setEmail(email);
        usuario.setPassword(hashPassword(password)); // ⚠️ Recuerda encriptar en la vida real
        usuario.setFechaNacimiento((java.sql.Date) fechaNacimiento);
        usuario.setTlf(tlf);
        usuario.setDni(dni);
        usuario.setNie(nie);
        usuario.setFechaRegistro(new Timestamp(System.currentTimeMillis()));

        usuarioRepository.save(usuario);

        return new ResponseEntity<>(usuario, HttpStatus.CREATED);

    }

    @Override
    public ResponseEntity<?> editarUsuario(Integer id, String nombre, String ap1, String ap2, Date fechaNacimiento,
            String email, String password, String tlf, String dni, String nie) {
        Usuario usuarioEncontrado = usuarioRepository.findById(id).orElse(null);

        if (usuarioEncontrado != null) {
            if (nombre == null || nombre.trim().isEmpty()) {
                return new ResponseEntity<>("El nombre es obligatorio", HttpStatus.BAD_REQUEST);
            }

            if (ap1 == null || ap1.trim().isEmpty()) {
                return new ResponseEntity<>("El primer apellido es obligatorio", HttpStatus.BAD_REQUEST);
            }

            if (usuarioRepository.existsByEmailAndIdNot(email, id)) {
                return ResponseEntity.badRequest().body("El email ya está registrado por otro usuario");
            }

            if (!validarEmail(email)) {
                return new ResponseEntity<>("Email sin rellenar o formato incorrecto", HttpStatus.BAD_REQUEST);
            }

            if ((dni != null && !dni.isBlank()) && (nie != null && !nie.isBlank())) {
                // Los dos están rellenos → ERROR
                return ResponseEntity.badRequest().body("No puedes registrar DNI y NIE al mismo tiempo");
            }

            if ((dni == null || dni.isBlank()) && (nie == null || nie.isBlank())) {
                // Los dos vacíos → ERROR
                return ResponseEntity.badRequest().body("Debes indicar DNI o NIE");
            }

            if (dni != null && !dni.isBlank()) {
                if (usuarioRepository.existsByDniAndIdNot(dni, id)) {
                    return ResponseEntity.badRequest().body("El DNI ya está registrado por otro usuario");
                }
                usuarioEncontrado.setDni(dni);
            }

            if (nie != null && !nie.isBlank()) {
                if (usuarioRepository.existsByNieAndIdNot(nie, id)) {
                    return ResponseEntity.badRequest().body("El NIE ya está registrado por otro usuario");
                }
                usuarioEncontrado.setNie(nie);
            }

            ResponseEntity<?> fechaError = validarFechaNacimiento(fechaNacimiento);
            if (fechaError.getStatusCode().isError())
                return fechaError;

            usuarioEncontrado.setNombre(nombre);
            usuarioEncontrado.setAp1(ap1);
            usuarioEncontrado.setAp2(ap2);
            usuarioEncontrado.setEmail(email);
            usuarioEncontrado.setPassword(hashPassword(password)); // ⚠️ Recuerda encriptar en la vida real
            usuarioEncontrado.setFechaNacimiento((java.sql.Date) fechaNacimiento);
            usuarioEncontrado.setTlf(tlf);
            usuarioEncontrado.setDni(dni);
            usuarioEncontrado.setNie(nie);
            usuarioRepository.save(usuarioEncontrado);

            return new ResponseEntity<>(usuarioEncontrado, HttpStatus.ACCEPTED);
        } else
            return new ResponseEntity<>("Usuario no encontrado", HttpStatus.BAD_REQUEST);
    }

    @Override
    public ResponseEntity<?> borrarUsuario(Integer id) {
        Usuario usuarioEncontrado = usuarioRepository.findById(id).orElse(null);

        if (usuarioEncontrado != null) {
            usuarioRepository.delete(usuarioEncontrado);
            return new ResponseEntity<>("Usuario borrado", HttpStatus.OK);
        } else {
            return new ResponseEntity<>("Usuario no encontrado", HttpStatus.OK);
        }
    }

    @Override
    public ResponseEntity<?> login(String email, String password) {
        Optional<Usuario> usuarioEncontrado = usuarioRepository.findByEmail(email);

        if(usuarioEncontrado.isEmpty()){
            return new ResponseEntity<>("Email incorrecto",HttpStatus.OK);
        }

        if(!comprobarPassword(password, usuarioEncontrado.get().getPassword())){
            return new ResponseEntity<>("Contraseña incorrecta",HttpStatus.BAD_REQUEST);
        }

        return new ResponseEntity<>(HttpStatus.OK);
    }

    @Override
    public boolean EmailExistente(String email) {
        return usuarioRepository.existsByEmail(email);
    }

    @Override
    public boolean DniExistente(String dni) {
        return usuarioRepository.existsByDni(dni);
    }

    @Override
    public boolean NieExistente(String nie) {
        return usuarioRepository.existsByNie(nie);
    }

    @Override
    public boolean comprobarPassword(String password, String passwordUsuarioBD) {
        return passwordEncoder.matches(password, passwordUsuarioBD);
    }

    @Override
    public String hashPassword(String password) {
        return passwordEncoder.encode(password);
    }

    // Métodos auxiliares
}
