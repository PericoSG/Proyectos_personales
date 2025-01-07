<?php
class IndexController
{
    function __construct()
    {
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new View();
    }
 
    
    public function index()
    {
        //Incluye el modelo que corresponde
        require_once 'models/ItemModel.php';
 
        //Creamos una instancia de nuestro "modelo"
        $items = new ItemModel();
 
        //Le pedimos al modelo todos los items
        $listado = $items->getAll();
 
        //Pasamos a la vista toda la información que se desea representar
        $data['items'] = $listado;
 
        //Finalmente presentamos nuestra plantilla
        $this->view->show("listarView.php", $data);
    }

    public function listar()
    {
        //Incluye el modelo que corresponde
        require_once 'models/ItemModel.php';
 
        //Creamos una instancia de nuestro "modelo"
        $items = new ItemModel();
 
        //Le pedimos al modelo todos los items
        $listado = $items->getAll();
 
        //Pasamos a la vista toda la información que se desea representar
        $data['items'] = $listado;
 
        //Finalmente presentamos nuestra plantilla
        $this->view->show("listarView.php", $data);
    }
    public function nuevo()
    {
        require 'models/ItemModel.php';
		$item = new ItemModel();	
		
		$errores = array();
		
		if( isset( $_REQUEST['submit']))
		{
			
			if( ! isset( $_REQUEST['item'] ) || empty($_REQUEST['item'] ) )
					$errores['item'] = "* Item: Error";
			
				
			if( empty($errores) )
			{
				
				
				$item->setItem($_REQUEST[ 'item' ]);
				$item->save();
				header( "Location: index.php?controlador=index&accion=listar");
			}				
		}
		
		
        $this->view->show("nuevoView.php", array( 'errores' => $errores ));
			
 
        
    }

	public function editar()
    {
        
		require 'models/ItemModel.php';
		$items = new ItemModel();	
		
		$item =$items->getById( $_REQUEST['codigo'] );
		
		$errores = array();
				
		if( isset( $_REQUEST[ 'submit' ] ) )
        {
            if( ! isset( $_REQUEST['item'] ) || empty($_REQUEST['item'] ) )
					$errores['item'] = "* Item: Error";
			
				
			if( empty($errores) )
			{
				
				$item->setItem($_REQUEST[ 'item' ]);
				$item->save();
				header( "Location: index.php?controlador=index&accion=listar");
			}				
		}
		
		
				
        $this->view->show("editarView.php", array( 'item' => $item,'errores' => $errores ));
			
 
        
    }	
	
	public function borrar()
    {
        //Incluye el modelo que corresponde
        require_once 'models/ItemModel.php';
 
        //Creamos una instancia de nuestro "modelo"
        $items = new ItemModel();
 
        //Le pedimos al modelo todos los items
        $item = $items->getById( $_REQUEST['codigo']);
 
		$item->delete();
		
		header("Location: index.php");
		
    }
	
}
?>