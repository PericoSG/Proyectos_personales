package SummerFun.SummerFunBackend.Repository;

import SummerFun.SummerFunBackend.Entity.Comentario;
import org.springframework.data.jpa.repository.JpaRepository;

public interface ComentarioRepository extends JpaRepository<Comentario,Integer> {
}
