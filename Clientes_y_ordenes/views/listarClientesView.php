<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>MVC - Modelo, Vista, Controlador - Jourmoly</title>
   <style>

   /* General */
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f9f9f9;
}

/* Contenedor de la tabla y título */
#gestion_cliente {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
    font-weight: bold;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 30px;
}

/* Estilo de las celdas y las filas */
th, td {
    text-align: center;
    padding: 12px 15px;
    border: 1px solid #ddd; /* Borde visible */
    background-color: #fff;
    font-size: 16px;
}

th {
    background-color: #f2f2f2;
    color: #333;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #f9f9f9; /* Fondo alterno para las filas */
}

tr:hover {
    background-color: #f1f1f1; /* Fondo al pasar el ratón por la fila */
}

/* Enlaces de acciones */
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

/* Estilo para el título de la tabla */
figcaption {
    text-align: center;
    font-size: 20px;
    margin-bottom: 15px;
    font-weight: bold;
}

/* Espaciado entre las celdas */
table td, table th {
    padding: 10px 15px;
}

/* Enlaces "Nuevo Cliente" y "Nuevo Pedido" */
/* Enlaces "Nuevo Cliente" y "Nuevo Pedido" */
.gestion {
    text-align: center;
    padding: 10px;
    border: 0;
    background-color: #f9f9f9;
}

.gestion a {
    text-decoration: none;
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    border: none; /* Eliminar bordes */
    box-shadow: none; /* Quitar sombras */
}

.gestion a:hover {
    background-color: #45a049;
}


.admin-info {
    text-align: right;
    font-size: 14px;
    color: #333;
    margin: 10px 20px;
}

.admin-info span {
    font-weight: bold;
}

.admin-info strong {
    color: #4CAF50; /* Puedes cambiar el color según tus preferencias */
}


   </style>
</head>
<body>

<div class="admin-info">

    <?php  
    
    if(isset($administrador['usuario']))
    {?>
        <span>Iniciado como: <strong><?php
        
        echo $administrador['usuario']?></strong></span><br><br>
        <a href="index.php?controlador=cliente&accion=cerrar_sesion">Cerrar Sesión</a>
    <?php
    }
    else 
    {
        header("location:index.php?controlador=cliente&accion=inicio_sesion");
    } 

    
    ?>
    </div>


    <table>
        <figcaption id="gestion_cliente">Gestion de Clientes y Órdenes </figcaption>
        <tr>
            <td class="gestion"><a href="index.php?controlador=cliente&accion=nuevo_cliente">Nuevo Cliente</a></td>
        </tr>
    </table>
<table>

<br><br><br>
<figcaption>Tabla de Clientes</figcaption>
    <tr>
        <th>ID_cliente</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>Fecha de Creación</th>
        <th colspan="3">Acciones</th>
    </tr>
    <?php
    // $listado es una variable asignada desde el controlador ItemsController.
	
    foreach( $clientes as $cliente )
    {
    ?>
    <tr>
        <td><?php echo $cliente->getCodigo()?></td>
        <td><?php echo $cliente->getNombre()?></td>
        <td><?php echo $cliente->getCorreo()?></td>
        <td><?php echo $cliente->getTelefono()?></td>
        <td><?php echo $cliente->getFecha()?></td>
        <td><a href="index.php?controlador=cliente&accion=ordenes&cliente=<?php echo $cliente ->getNombre(); ?>">Ver Ordenes</a></td>
        <td><a href="index.php?controlador=cliente&accion=actualizar_cliente&id_cliente=<?php echo $cliente ->getCodigo(); ?>">Editar</a></td>
        <td><a href="index.php?controlador=cliente&accion=eliminar_cliente&id_cliente=<?php echo $cliente ->getCodigo(); ?>">Eliminar</a></td>
     
    </tr>
    <?php
    }
    ?>
</table>
</body>
</html>