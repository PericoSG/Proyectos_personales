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
form input[type="text"] {
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

form select {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
    box-sizing: border-box;
    background-color: #fff;
}

.error 
 {
    color: red;
 }

	</style>
</head>
<body>


	<form action="index.php" >
	
	<h1>Editar Orden </h1>
	<input type="hidden" name="controlador" value="cliente">
	<input type="hidden" name="accion" value="actualizar_orden">
    <input type="hidden" name="id_orden" value="<?php echo $orden['id_orden'] ?>">
    <input type="hidden" name="cliente" value="<?php echo $_REQUEST['cliente'] ?>">
	
   
		
	<label for="fecha_orden" >Fecha de la Orden:</label>
	<input type="text" readonly name="fecha_orden" value="<?php echo $orden['fecha_orden'] ?>" >
	<?php echo isset( $errores[ "fecha_orden" ] ) ? "<p class='error'>Error en la Fecha</p>":"" ?>


	<label for="total" >Total:</label>
	<input type="text" name="total" value="<?php echo $orden['total']?>" >
	<?php echo isset( $errores[ "total" ] ) ? "<p class='error'>Error en el Total</p>":"" ?>


    <label for="estado">Estado</label>
    <select name="estado" id="">
        
        <option value="0">-</option>
       <?php

        $seleccionada = $orden['estado'];
       foreach($estados as $estado)
       {
            if($seleccionada == $estado['id_estado'])
            {?>
                <option selected value="<?php echo $estado['id_estado'] ?>"><?php echo $estado['nombre_estado']?></option>
            <?php
            }
            else 
            { 
                ?>
                <option value="<?php echo $estado['id_estado'] ?>"><?php echo $estado['nombre_estado']?></option>
                
              <?php
            }
        ?>

        <?php
       } 
       ?> 
    </select>

	 <input type="submit" name="submit" value="Aceptar">

	 <a href="index.php?controlador=cliente&accion=index">Volver</a>
	</form> 
<br>
</body>
</html>