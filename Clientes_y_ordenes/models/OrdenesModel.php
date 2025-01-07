<?php
class OrdenesModel
{
    protected $db;
 
    private $id_cliente;
    private $id_orden;
    private $fecha_orden;
    private $total;
    private $estado;
    
    public function __construct()
    {
        //Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }
 

    public function getIdOrden()
    {
        return $this->id_orden;
    }
    public function setIdOrden( $codigo )
    {
        return $this->id_orden = $codigo;
    }
    
    public function getIdCliente()
    {
        return $this->id_cliente;
    }
    public function setIdCliente( $codigo )
    {
        return $this->id_cliente = $codigo;
    }

    public function getFechaOrden()
    {
        return $this->fecha_orden;
    }
    public function setFechaOrden( $item )
    {
        return $this->fecha_orden = $item;
    }
    
    public function getTotal()
    {
        return $this->total;
    }
    public function setTotal( $item )
    {
        return $this->total = $item;
    }

    public function getEstado()
    {
        return $this->estado;
    }
    public function setEstado( $item )
    {
        return $this->estado = $item;
    }


    
    public function getAll()
    {
        //realizamos la consulta de todos los items
        $consulta = $this->db->prepare('SELECT * FROM ordenes');
        $consulta->execute();
        
        $resultado = $consulta->fetchAll(PDO::FETCH_CLASS, "OrdenesModel");
        return $resultado;
    }
    
    
     public function getById( $codigo )
    {
        
        
        
        $consulta = $this->db->prepare('SELECT * FROM ordenes where id_orden = ?');
        $consulta->bindParam( 1, $codigo );
        $consulta->execute();

        //$resultado = $gsent->fetch(PDO::FETCH_CLASS, "ItemModel");
        
        $resultado = $consulta->fetch();
        
        
        return $resultado;
    }

    public function GetOrdenByCliente($codigo)
    {
        $consulta = $this->db->prepare("select * from ordenes join clientes on ordenes.id_cliente = clientes.id_cliente join estados on ordenes.estado = estados.id_estado where nombre = ? ORDER BY id_orden ASC");

        $consulta->bindParam( 1, $codigo );
        $consulta->execute();

        $resultado = $consulta ->fetchAll();

        return $resultado;
    }

    public function PrecioTotalOrdenes($nombre)
    {
        $consulta = $this->db->prepare("select SUM(total) as precio_total from ordenes join clientes on ordenes.id_cliente = clientes.id_cliente join estados on ordenes.estado = estados.id_estado where clientes.nombre = ? AND (estados.nombre_estado!= 'Cancelado' AND estados.nombre_estado != 'Reembolsado')");
        $consulta->bindParam( 1, $nombre );
        $consulta->execute();

        $resultado = $consulta ->fetch();

        return $resultado;
    }

    public function GetEstados()
    {
        $consulta = $this->db->prepare("select * from estados");
        $consulta->execute();

        $resultado = $consulta ->fetchAll();

        return $resultado;
    }
	
	public function save()
    {
        if( !isset( $this->id_orden ) )
		{
			$consulta = $this->db->prepare('INSERT INTO ordenes ( id_cliente,fecha_orden,total,estado ) values ( ?,?,?,? )'); 
			$consulta->bindParam( 1, $this->id_cliente );
            $consulta->bindParam( 2, $this->fecha_orden );
            $consulta->bindParam( 3, $this->total );
            $consulta->bindParam( 4, $this->estado );
			$consulta->execute();
        }
		else
		{
			$consulta = $this->db->prepare('UPDATE ordenes SET total = ?, estado = ? WHERE id_orden =  ? '); 
            $consulta->bindParam( 1, $this->total );
            $consulta->bindParam( 2, $this->estado );
			$consulta->bindParam( 3, $this->id_orden );
			$consulta->execute();
		}
    }
	public function delete()
    {
        $consulta = $this->db->prepare('DELETE FROM ordenes WHERE id_orden =  ? '); 
		$consulta->bindParam( 1, $this->id_orden );
		$consulta->execute();
    }
}
?>