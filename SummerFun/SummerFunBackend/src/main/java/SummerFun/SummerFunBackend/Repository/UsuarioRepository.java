package SummerFun.SummerFunBackend.Repository;

import SummerFun.SummerFunBackend.Entity.Usuario;
import org.springframework.data.jpa.repository.JpaRepository;

public interface UsuarioRepository extends JpaRepository<Usuario,Integer> {
    boolean existsByEmail(String email);
    boolean existsByDni(String dni);
    boolean existsByNie(String nie);
    boolean existsByEmailAndIdNot(String email, Integer id);
    boolean existsByDniAndIdNot(String dni, Integer id);
    boolean existsByNieAndIdNot(String nie, Integer id);

}
