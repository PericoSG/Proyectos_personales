<?php


class ClienteController
{
    function __construct()
    {
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new View();
    }
 
    /* Mostrar */
    // ___________________________________________________________________
    public function index()
    {
        //Incluye el modelo que corresponde
        require_once 'models/ClienteModel.php';
        require_once 'models/AdministradoresModel.php';
 
        //Creamos una instancia de nuestro "modelo"
        $cliente = new ClienteModel();
        $administrador = new AdministradoresModel();
 
        //Le pedimos al modelo todos los items
        $listado = $cliente->getAll();
        $admin = $administrador->getByUser($_SESSION['usuario']);
 
        //Pasamos a la vista toda la información que se desea representar
        $data['clientes'] = $listado;
        $data['administrador'] = $admin;
 
        //Finalmente presentamos nuestra plantilla
        $this->view->show("listarClientesView.php", $data);
    }

    public function ordenes()
    {
        require 'models/OrdenesModel.php';

        $orden = new OrdenesModel();


        $ordenes = $orden ->GetOrdenByCliente($_REQUEST['cliente']);
        $precio_total = $orden ->PrecioTotalOrdenes($_REQUEST['cliente']);

        $estados = $orden ->GetEstados();

        if($precio_total[0] == NULL)
        {
            $precio_total[0] = 0;
        }

        $data['ordenes'] = $ordenes;
        $data['estados'] = $estados;
        $data['precio_total'] = $precio_total[0];
 
        
        $this->view->show("listarOrdenesClienteView.php", $data);
    }

    public function inicio_sesion()
    {
        require_once 'models/AdministradoresModel.php';

        $administrador = new AdministradoresModel();

        $campos_incorrectos = [];
        

        if(isset($_SESSION['logueado']) && $_SESSION['logueado'] == true)
        {
            header("location: index.php?controlador=cliente&accion=index");
        }
        else 
        {
            if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == "Aceptar")
            {
                if($_REQUEST['usuario'] != null)
                {

                
                    if(!$administrador ->CheckUsuario($_REQUEST['usuario']))
                    {
                        $campos_incorrectos['usuario'] = "Usuario no Encontrado";
                    }
                }
                else 
                {
                    $campos_incorrectos['usuario'] = "Usuario Vacio";
                }
                
                if ($_REQUEST['contraseña'] != null)
                {
                    if(!$administrador ->CheckContraseña($_REQUEST['contraseña']))
                    {
                        $campos_incorrectos['contraseña'] = "Credenciales no existen";
                    }
                }
                else 
                {
                    $campos_incorrectos['contraseña'] = "Credenciales Vacias";
                }

                if($campos_incorrectos == null)
                {
                    $_SESSION['logueado'] = true;
                    $_SESSION['usuario'] = $_REQUEST['usuario'];
                    header("location: index.php?controlador=cliente&accion=index");
                }
            }
        }
        
        $this->view->show("InicioSesionView.php", array('errores' => $campos_incorrectos));
    }

    public function cerrar_sesion()
    {
        session_unset();

        header("location:index.php");
    }


    // ___________________________________________________________________


    /* Agregar  */
    // __________________________________________________________________
    public function nuevo_cliente()
    {
        require_once 'models/ClienteModel.php';

        $cliente = new ClienteModel();

        $campos_incorrectos = [];
        

        if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == "Aceptar")
        {
            if($_REQUEST['nombre'] != null)
            {

               
                if($cliente ->CheckNombre($_REQUEST['nombre']))
                {
                    $campos_incorrectos['nombre'] = "Nombre Duplicado";
                }
            }
            else 
            {
                $campos_incorrectos['nombre'] = "Error Nombre";
            }
            
            if ($_REQUEST['correo'] != null)
            {
                if($cliente ->CheckCorreo($_REQUEST['correo']))
                {
                    $campos_incorrectos['correo'] = "Correo Duplicado";
                }
            }
            else 
            {
                $campos_incorrectos['correo'] = "Error Correo";
            }

            if ($_REQUEST['telefono'] != null)
            {
                if($cliente ->CheckTelefono($_REQUEST['telefono']))
                {
                    $campos_incorrectos['telefono'] = "Télefono Duplicado";
                }
            }
            else 
            {
                $campos_incorrectos['telefono'] = "Error Teléfono";
            }

            if($campos_incorrectos == null)
            {
                

                $cliente ->setNombre($_REQUEST['nombre']);
                $cliente ->setCorreo($_REQUEST['correo']);
                $cliente ->setTelefono($_REQUEST['telefono']);
                
                $cliente ->save();

                header("location: index.php?controlador=cliente&accion=index");
            }
        }

        $this->view->show("nuevoClienteView.php", array('errores' =>$campos_incorrectos));
    }

    public function nueva_orden()
    {
        require_once 'models/OrdenesModel.php';
        require_once 'models/ClienteModel.php';

        $campos_incorrectos = [];
        

        if(isset($_REQUEST['submit']))
        {
            if($_REQUEST['cliente'] == null)
            {
                $campos_incorrectos['cliente'] = "Error Nombre";
            }
            
            if ($_REQUEST['fecha_orden'] == null)
            {
                $campos_incorrectos['fecha_orden'] = "Error en Fecha";
            }

            if ($_REQUEST['total'] == null || $_REQUEST['total'] <=0)
            {
                $campos_incorrectos['total'] = "Error en Precio";
            }

            if ($_REQUEST['estado'] <=0)
            {
                $campos_incorrectos['estado'] = "Error en Estado";
            }


            if($campos_incorrectos == null)
            {

                $orden = new OrdenesModel();
                $el_cliente = new ClienteModel();

                $cliente = $_REQUEST['cliente'];
                $id = $el_cliente ->getIdByCliente($cliente);

                // echo $id . "<br>";
                // echo $_REQUEST['fecha_orden']. "<br>";
                // echo $_REQUEST['total'];
                // echo $_REQUEST['estado'];
                $orden ->setIdCliente($id);
                $orden ->setFechaOrden($_REQUEST['fecha_orden']);
                $orden ->setTotal($_REQUEST['total']);
                $orden ->setEstado($_REQUEST['estado']);
                
                $orden ->save();
                header("location: index.php?controlador=cliente&accion=ordenes&cliente=".$cliente);
            }
            else 
            {
                // No se puede redireccionar por campos_incorrectos
                $orden = new OrdenesModel();

                $cliente = $_REQUEST['cliente'];


                $ordenes = $orden ->GetOrdenByCliente($_REQUEST['cliente']);

                $precio_total = $orden ->PrecioTotalOrdenes($_REQUEST['cliente']);

                if($precio_total[0] == NULL)
                {
                    $precio_total[0] = 0;
                }
                $estados = $orden ->GetEstados();

                $data['ordenes'] = $ordenes;
                $data['estados'] = $estados;
                $data['errores'] = $campos_incorrectos;
                $data['cliente'] = $cliente;
                $data['precio_total'] = $precio_total[0];
                $this->view->show("listarOrdenesClienteView.php", $data);
            }
        }

    }

    

    // __________________________________________________________________


    /* Editar */

    // __________________________________________________________________

    public function actualizar_cliente()
    {
        require 'models/ClienteModel.php';
		$cliente = new ClienteModel();	
		

        $el_cliente = $cliente ->getById($_REQUEST['id_cliente']);
		$campos_incorrectos = array();


        if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == "Aceptar")
        {
            if($_REQUEST['nombre'] == null)
            {
                $campos_incorrectos['nombre'] = "Error Nombre";
            }
            
            if ($_REQUEST['correo'] == null)
            {
                $campos_incorrectos['correo'] = "Error Correo";
            }

            if ($_REQUEST['telefono'] == null)
            {
                $campos_incorrectos['telefono'] = "Error Teléfono";
            }

            if($campos_incorrectos == null)
            {
                $cliente = new ClienteModel();
                $cliente ->setCodigo($_REQUEST['id_cliente']);
                $cliente ->setNombre($_REQUEST['nombre']);
                $cliente ->setCorreo($_REQUEST['correo']);
                $cliente ->setTelefono($_REQUEST['telefono']);
                
                $cliente ->save();

                header("location: index.php?controlador=cliente&accion=index");
            }
        }
		
		
        $this->view->show("editarClienteView.php", array( 'errores' => $campos_incorrectos, 'cliente' => $el_cliente ));
			
 
        
    }

    public function actualizar_orden()
    {
        require 'models/ClienteModel.php';
        require 'models/OrdenesModel.php';
		$orden = new OrdenesModel();	
		
        $campos_incorrectos = array();

        if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == "Aceptar")
        {
            if ($_REQUEST['total'] == null || $_REQUEST['total'] <=0)
            {
                $campos_incorrectos['total'] = "Error en Precio";
            }

            if ($_REQUEST['estado'] <=0)
            {
                $campos_incorrectos['estado'] = "Error en Estado";
            }

            if($campos_incorrectos == null)
            {
                $cliente = new ClienteModel();

                $id = $cliente ->getById($_REQUEST['cliente']);
                $orden ->setIdOrden($_REQUEST['id_orden']);
                $orden ->setIdCliente($id);
                $orden ->setTotal($_REQUEST['total']);
                $orden ->setEstado($_REQUEST['estado']);
                
                $orden ->save();


                    header("Location: index.php?controlador=cliente&accion=ordenes&cliente=" . $_REQUEST['cliente']);
                    // Manejar el caso en que el parámetro 'cliente' no está presente
                    echo "El parámetro cliente no está presente.";
                
            }
        }
		
        $la_orden = $orden ->getById($_REQUEST['orden']);
        $estados =  $orden ->GetEstados();
		
		
        $this->view->show("editarOrdenClienteView.php", array( 'errores' => $campos_incorrectos, 'orden' => $la_orden, 'estados' => $estados ));
			
 
        
    }

    // __________________________________________________________________



    /* Eliminar */

    // ___________________________________________________________________


    public function eliminar_cliente()
    {
        require_once 'models/ClienteModel.php';

        $cliente = new ClienteModel();


        $cliente ->setCodigo($_REQUEST['id_cliente']);

        $cliente ->delete();

        header("location: index.php?controlador=cliente&accion=index");
    }

    public function eliminar_orden()
    {
        require_once 'models/OrdenesModel.php';

        $orden = new OrdenesModel();


        $orden ->setIdOrden($_REQUEST['orden']);
        
        $orden ->delete();

        header("location: index.php?controlador=cliente&accion=ordenes&cliente=" . $_REQUEST['cliente']);
    }


    // __________________________________________________________________
	
}
?>