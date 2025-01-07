<?php
class AdministradoresModel
{
    protected $db;
 
    private $id_administrador;
    private $nombre;
    private $usuario;
    private $contraseña;
    private $fecha_creacion;
    
    public function __construct()
    {
        //Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }
 
    public function getCodigo()
    {
        return $this->id_administrador;
    }
    public function setCodigo( $codigo )
    {
        return $this->id_administrador = $codigo;
    }
    
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre( $item )
    {
        return $this->nombre = $item;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }
    public function setUsuario( $item )
    {
        return $this->usuario = $item;
    }


    public function getContraseña()
    {
        return $this->contraseña;
    }
    public function setContraseña( $item )
    {
        return $this->contraseña = $item;
    }

    public function getFecha()
    {
        return $this->fecha_creacion;
    }
    public function setFecha( $item )
    {
        return $this->fecha_creacion = $item;
    }
    
    public function getAll()
    {
        //realizamos la consulta de todos los items
        $consulta = $this->db->prepare('SELECT * FROM administradores');
        $consulta->execute();
        
        $resultado = $consulta->fetchAll(PDO::FETCH_CLASS, "ClienteModel");
        return $resultado;
    }
    
    
     public function getByUser( $codigo )
    {
        
        
        
        $consulta = $this->db->prepare('SELECT * FROM administradores where usuario = ?');
        $consulta->bindParam( 1, $codigo );
        $consulta->execute();

        //$resultado = $gsent->fetch(PDO::FETCH_CLASS, "ItemModel");
        
        $resultado = $consulta->fetch();
        
        
        return $resultado;
    }

    public function getIdByUser( $codigo )
    {
        
        
        
        $consulta = $this->db->prepare('SELECT id_administrador FROM administradores where usuario = ?');
        $consulta->bindParam( 1, $codigo );
        $consulta->execute();

        //$resultado = $gsent->fetch(PDO::FETCH_CLASS, "ItemModel");
        
        $resultado = $consulta->fetch()[0];
        
        
        return $resultado;
    }

    public function CheckUsuario($usuario)
    {

        $consulta = $this->db->prepare('SELECT usuario FROM administradores where usuario = ?');
        $consulta->bindParam( 1, $usuario );
        $consulta->execute();

        //$resultado = $gsent->fetch(PDO::FETCH_CLASS, "ItemModel");
        
        $resultado = $consulta->fetch();
        
        if( $resultado == null)
        {
            $resultado = false;
        }
        
        return $resultado;
    }

    public function CheckContraseña($contraseña)
    {

        $consulta = $this->db->prepare('SELECT contraseña FROM administradores where contraseña = ? ');
        $consulta->bindParam( 1, $contraseña );
        $consulta->execute();

        //$resultado = $gsent->fetch(PDO::FETCH_CLASS, "ItemModel");
        
        $resultado = $consulta->fetch();
        
        
        return $resultado;
    }

    
	
	// public function save()
    // {
    //     if( ! isset( $this->id_cliente ) )
	// 	{
	// 		$consulta = $this->db->prepare('INSERT INTO clientes ( nombre,correo,telefono ) values ( ?,?,? )'); 
	// 		$consulta->bindParam( 1, $this->nombre );
    //         $consulta->bindParam( 2, $this->correo );
    //         $consulta->bindParam( 3, $this->telefono );
	// 		$consulta->execute();
    //     }
	// 	else
	// 	{
	// 		$consulta = $this->db->prepare('UPDATE clientes SET nombre = ?, correo = ?, telefono = ? WHERE id_cliente =  ? '); 
	// 		$consulta->bindParam( 1, $this->nombre );
    //         $consulta->bindParam( 2, $this->correo );
    //         $consulta->bindParam( 3, $this->telefono );
	// 		$consulta->bindParam( 4, $this->id_cliente );
	// 		$consulta->execute();
	// 	}
    // }
	// public function delete()
    // {
    //     $consulta = $this->db->prepare('DELETE FROM clientes WHERE id_cliente =  ? '); 
	// 	$consulta->bindParam( 1, $this->id_cliente );
	// 	$consulta->execute();
    // }
}
?>