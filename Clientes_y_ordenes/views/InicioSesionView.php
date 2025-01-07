<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>MVC - Modelo, Vista, Controlador - Jourmoly</title>

	<style>

		/* Estilos Generales del Formulario */
form {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
    font-family: 'Arial', sans-serif;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Título del formulario */
form h1 {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

/* Estilo para los Labels */
form label {
    font-weight: bold;
    margin-top: 15px;
    display: block;
    color: #555;
}

/* Estilo para los Inputs */
form input[type="text"] , form input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
    box-sizing: border-box;
    background-color: #fff;
}

/* Estilo para los mensajes de error */
form .error {
    color: #ff0000;
    font-size: 14px;
    margin-top: 5px;
}

/* Estilo para el Botón de Enviar */
form input[type="submit"] {
    width: 100%;
    padding: 12px;
    margin-top: 20px;
    border-radius: 5px;
    border: none;
    background-color: #4CAF50;
    color: white;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form input[type="submit"]:hover {
    background-color: #45a049;
}

/* Estilo para el Enlace "Volver" */
form a {
    display: block;
    margin-top: 20px;
    text-align: center;
    font-size: 16px;
    color: #007BFF;
    text-decoration: none;
    font-weight: bold;
}

form a:hover {
    text-decoration: underline;
}

.error 
 {
    color: red;
 }

	</style>
</head>
<body>


	<form action="index.php" >
	
	<h1>Formulario de Administrador </h1>
	<input type="hidden" name="controlador" value="cliente">
	<input type="hidden" name="accion" value="inicio_sesion">
	
   
	<label for="Nombre" >Usuario:</label>
	<input type="text" name="usuario" >
	
    <?php  

        if(isset($errores['usuario']))
        {
            printf("<p class='error'>%s</p>", $errores['usuario']);
        }
    ?>
	<label for="contraseña" >Contraseña:</label>
	<input type="password" name="contraseña">

    <?php  

        if(isset($errores['contraseña']))
        {
            printf("<p class='error'>%s</p>", $errores['contraseña']);
        }
    ?>
	 <input type="submit" name="submit" value="Aceptar">
	</form> 
<br>
</body>
</html>