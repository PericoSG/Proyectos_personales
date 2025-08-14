package SummerFun.SummerFunBackend.Security;

import org.springframework.context.annotation.Configuration;
import org.springframework.web.servlet.config.annotation.CorsRegistry;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurer;

@Configuration
public class CorsConfig implements WebMvcConfigurer {

    @Override
    public void addCorsMappings(CorsRegistry registry) {
        // Permitir solicitudes desde el frontend (Angular) en localhost:4200
        registry.addMapping("/**")  // Aplica a todas las rutas
                .allowedOrigins( "http://localhost:4200","summerfun/*")  // Frontend de Angular -> (localhost:4200)
                .allowedMethods("GET", "POST", "PUT", "DELETE", "OPTIONS")  // Métodos permitidos
                .allowedHeaders("*")  // Permite todos los encabezados
                .allowCredentials(true);  // Permite el envío de cookies y cabeceras de autenticación
    }
}