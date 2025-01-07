<?php
class ClienteModel
{
    protected $db;
 
    private $id_cliente;
    private $nombre;
    private $correo;
    private $telefono;
    private $fecha_creacion;
    
    public function __construct()
    {
        //Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }
 
    public function getCodigo()
    {
        return $this->id_cliente;
    }
    public function setCodigo( $codigo )
    {
        return $this->id_cliente = $codigo;
    }
    
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre( $item )
    {
        return $this->nombre = $item;
    }

    public function getCorreo()
    {
        return $this->correo;
    }
    public function setCorreo( $item )
    {
        return $this->correo = $item;
    }


    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTelefono( $item )
    {
        return $this->telefono = $item;
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
        $consulta = $this->db->prepare('SELECT * FROM clientes');
        $consulta->execute();
        
        $resultado = $consulta->fetchAll(PDO::FETCH_CLASS, "ClienteModel");
        return $resultado;
    }
    
    
     public function getById( $codigo )
    {
        
        
        
        $consulta = $this->db->prepare('SELECT * FROM clientes where id_cliente = ?');
        $consulta->bindParam( 1, $codigo );
        $consulta->execute();

        //$resultado = $gsent->fetch(PDO::FETCH_CLASS, "ItemModel");
        
        $consulta->setFetchMode(PDO::FETCH_CLASS, "ClienteModel");
        $resultado = $consulta->fetch();
        
        
        return $resultado;
    }

    public function getIdByCliente( $codigo )
    {
        
        
        
        $consulta = $this->db->prepare('SELECT id_cliente FROM clientes where nombre = ?');
        $consulta->bindParam( 1, $codigo );
        $consulta->execute();

        //$resultado = $gsent->fetch(PDO::FETCH_CLASS, "ItemModel");
        
        $resultado = $consulta->fetch()[0];
        
        
        return $resultado;
    }

    public function getClienteByOrden( $codigo )
    {
        
        
        
        $consulta = $this->db->prepare('SELECT nombre FROM clientes join ordenes on ordenes.id_cliente = clientes.id_cliente where id_orden = ?');
        $consulta->bindParam( 1, $codigo );
        $consulta->execute();

        //$resultado = $gsent->fetch(PDO::FETCH_CLASS, "ItemModel");
        
        $resultado = $consulta->fetch()[0];
        
        
        return $resultado;
    }

    public function CheckNombre($nombre)
    {

        $consulta = $this->db->prepare('SELECT nombre FROM clientes where nombre = ? ');
        $consulta->bindParam( 1, $nombre );
        $consulta->execute();

        //$resultado = $gsent->fetch(PDO::FETCH_CLASS, "ItemModel");
        
        $resultado = $consulta->fetch();
        
        
        return $resultado;
    }

    public function CheckTelefono($telefono)
    {

        $consulta = $this->db->prepare('SELECT telefono FROM clientes where telefono = ? ');
        $consulta->bindParam( 1, $telefono );
        $consulta->execute();

        //$resultado = $gsent->fetch(PDO::FETCH_CLASS, "ItemModel");
        
        $resultado = $consulta->fetch();
        
        
        return $resultado;
    }

    public function CheckCorreo($correo)
    {

        $consulta = $this->db->prepare('SELECT correo FROM clientes where correo= ? ');
        $consulta->bindParam( 1, $correo );
        $consulta->execute();

        //$resultado = $gsent->fetch(PDO::FETCH_CLASS, "ItemModel");
        
        $resultado = $consulta->fetch();
        
        
        return $resultado;
    }
	
	public function save()
    {
        if( ! isset( $this->id_cliente ) )
		{
			$consulta = $this->db->prepare('INSERT INTO clientes ( nombre,correo,telefono ) values ( ?,?,? )'); 
			$consulta->bindParam( 1, $this->nombre );
            $consulta->bindParam( 2, $this->correo );
            $consulta->bindParam( 3, $this->telefono );
			$consulta->execute();
        }
		else
		{
			$consulta = $this->db->prepare('UPDATE clientes SET nombre = ?, correo = ?, telefono = ? WHERE id_cliente =  ? '); 
			$consulta->bindParam( 1, $this->nombre );
            $consulta->bindParam( 2, $this->correo );
            $consulta->bindParam( 3, $this->telefono );
			$consulta->bindParam( 4, $this->id_cliente );
			$consulta->execute();
		}
    }
	public function delete()
    {
        $consulta = $this->db->prepare('DELETE FROM clientes WHERE id_cliente =  ? '); 
		$consulta->bindParam( 1, $this->id_cliente );
		$consulta->execute();
    }
}
?>