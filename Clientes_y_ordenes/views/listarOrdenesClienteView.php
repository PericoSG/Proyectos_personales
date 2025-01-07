<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>MVC - Modelo, Vista, Controlador - Jourmoly</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

   <style>


body 
{
    font-family: 'Roboto';
}
    /* Estilos generales de la tabla */
table {
    width: 50%;
    border-collapse: collapse;
    margin: 20px 0;
    font-family: Arial, sans-serif;
    background-color: #fff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin: 0 auto;
}

/* Estilo para el título de la tabla */
figcaption {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    text-align: center;
    margin-bottom: 15px;
}

/* Estilo de las cabeceras de la tabla */
th {
    background-color: #4CAF50;
    color: white;
    padding: 12px 15px;
    text-align: left;
    font-size: 16px;
    border: 1px solid #ddd;
}

/* Estilo para las celdas de la tabla */
td {
    padding: 12px 15px;
    text-align: left;
    border: 1px solid #ddd;
    font-size: 14px;
    color: #555;
}

/* Estilo para las filas alternadas (zebra stripes) */
tr:nth-child(even) {
    background-color: #f9f9f9;
}

/* Estilo para los enlaces de acción */
a {
    text-decoration: none;
    color: #007BFF;
    padding: 6px 12px;
    border-radius: 5px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

a:hover {
    background-color: #007BFF;
    color: white;
}

/* Estilo para las celdas de "Acciones" */
td a {
    margin-right: 10px;
}

/* Estilo de la última celda "Acciones" */
th[colspan="2"] {
    text-align: center;
}

/* Agregar espacio entre la tabla y otras secciones */
table {
    margin-top: 30px;
    margin-bottom: 50px;
}


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
form input[type="text"],
form input[type="number"],
form input[type="datetime-local"],
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

form input[type="text"]:disabled,
form input[type="number"]:disabled {
    background-color: #f0f0f0;
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

/* Ajuste en el tamaño de las opciones del select */
form select {
    font-size: 16px;
}

/* Estilo general para el campo de fecha */
input[type="date"] {
    background-color: #fff; /* Color de fondo suave */
    border: 1px solid #ccc; /* Borde gris claro */
    padding: 10px; /* Relleno interno */
    font-size: 16px; /* Tamaño de la fuente */
    border-radius: 8px; /* Bordes redondeados */
    width: 100%; /* Ancho completo */
    max-width: 300px; /* Ancho máximo */
    transition: border 0.3s ease; /* Transición para el borde */
}

/* Efecto cuando el campo recibe el enfoque */
input[type="date"]:focus {
    border-color: #4CAF50; /* Borde verde cuando está en foco */
    outline: none; /* Eliminar el borde de enfoque predeterminado */
    background-color: #e8f5e9; /* Fondo más claro cuando está en foco */
}

/* Contenedor general para mostrar el total de órdenes */
.total-container {
    display: flex;
    justify-content: center; /* Centra el contenido horizontalmente */
    align-items: center; /* Centra el contenido verticalmente */
    background-color: #f4f7fa; /* Fondo suave */
    padding: 20px;
    border-radius: 8px;
    width: 350px; /* Ancho adecuado para el contenido */
    margin: 0 auto; /* Centrado en la página */
    box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.1); /* Sombra suave */
}

/* Estilo para el texto del total */
.total-text {
    font-size: 20px; /* Tamaño de fuente moderado */
    font-weight: 700; /* Negrita para el texto */
    color: #555; /* Color gris oscuro para el texto */
    margin: 0; /* Elimina márgenes para que el texto esté ajustado */
}

/* Estilo para el valor del total */
.total-valor {
    font-size: 22px; /* Tamaño grande para el valor */
    font-weight: 700; /* Negrita para destacar el valor */
    color: #27ae60; /* Verde para el valor */
    margin-left: 10px; /* Espacio entre el texto y el valor */
}



.error 
 {
    color: red;
 }

   </style>
</head>
<body>

<table>

<br><br><br>
<figcaption>Órdenes de <?php echo $_REQUEST['cliente'] ?></figcaption>
    <tr>
        <th>Id Orden</th>
        <th>Fecha de la Orden</th>
        <th>Total</th>
        <th>Estado</th>
        <th colspan="2">Acciones</th>
    </tr>
    <?php
    // $listado es una variable asignada desde el controlador ItemsController.
	
    foreach( $ordenes as $orden )
    {
    ?>
    <tr>
        <td><?php echo $orden['id_orden']?></td>
        <td><?php echo $orden['fecha_orden']?></td>
        <td><?php echo $orden['total'] . " €"?></td>
        <td><?php echo $orden['nombre_estado']?></td>
        <td><a href="index.php?controlador=cliente&accion=actualizar_orden&orden=<?php echo $orden['id_orden'] ?>&cliente=<?php echo $_REQUEST['cliente'] ?>">Editar</a></td>
        <td><a href="index.php?controlador=cliente&accion=eliminar_orden&orden=<?php echo $orden['id_orden'] ?>&cliente=<?php echo $_REQUEST['cliente'] ?>">Eliminar</a></td>
     
    </tr>
    <?php
    }
    ?>
</table>

<div class="total-container">
    <p class="total-text">Total de Órdenes: <span class="total-valor"><?php echo $precio_total . '$' ?></span></p>
</div>




<form action="index.php" >
	
	<h1>Nuevo Orden</h1>
	<input type="hidden" name="controlador" value="cliente">
	<input type="hidden" name="accion" value="nueva_orden">
	

    <?php if(isset($cliente)) 
            {?>
              <label for="cliente" >Cliente:</label>
              <input readonly type="text" name="cliente" value="<?php echo $cliente  ?>" >
              <?php
            } 
          else 
          {?>

                <label for="nombre" >Cliente:</label>
                <input readonly type="text" name="cliente" value="<?php echo $_REQUEST['cliente'] ?>" >
           <?php  
          }
    ?>
		
	<label for="fecha_orden" >Fecha de la Orden:</label>
	<input type="date" name="fecha_orden" max="<?php echo date("Y-m-d") ?>" > <!-- Con esto limitamos la fecha -->
	
    <?php echo isset( $errores[ "fecha_orden" ] ) ? "<p class='error'>Error en la Fecha</p>":"" ?>

	<label for="total" >Total:</label>
	<input type="number" name="total" >
	
    <?php echo isset( $errores[ "total" ] ) ? "<p class='error'>Error en el Precio</p>":"" ?>

    <label for="estado">Estado</label>
    <select name="estado" id="">
        
        <option value="0">-</option>
       <?php foreach($estados as $estado)
       {?>
            <option value="<?php echo $estado['id_estado'] ?>"><?php echo $estado['nombre_estado']?></option>
        <?php
       } 
       ?> 
    </select>

    <?php echo isset( $errores[ "estado" ] ) ? "<p class='error'>Error en el Estado</p>":"" ?>
	<input type="submit" name="submit" value="Guardar Orden">

	 <a href="index.php?controlador=cliente&accion=index">Volver al inicio</a>
	</form> 
</body>
</html>