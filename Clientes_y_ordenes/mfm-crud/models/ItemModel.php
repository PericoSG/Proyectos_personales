<?php
class ItemModel
{
    protected $db;
 
    private $codigo;
    private $item;
    
    public function __construct()
    {
        //Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }
 
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo( $codigo )
    {
        return $this->codigo = $codigo;
    }
    
    public function getItem()
    {
        return $this->item;
    }
    public function setItem( $item )
    {
        return $this->item = $item;
    }
    
    public function getAll()
    {
        //realizamos la consulta de todos los items
        $consulta = $this->db->prepare('SELECT * FROM items');
        $consulta->execute();
       
        
        
        
        $resultado = $consulta->fetchAll(PDO::FETCH_CLASS, "ItemModel");
        return $resultado;
    }
    
    
     public function getById( $codigo )
    {
        
        
        
        $consulta = $this->db->prepare('SELECT * FROM items where codigo = ?');
        $consulta->bindParam( 1, $codigo );
        $consulta->execute();

        //$resultado = $gsent->fetch(PDO::FETCH_CLASS, "ItemModel");
        
        $consulta->setFetchMode(PDO::FETCH_CLASS, "ItemModel");
        $resultado = $consulta->fetch();
        
        
        return $resultado;
    }
	
	public function save()
    {
        if( ! isset( $this->codigo ) )
		{
			$consulta = $this->db->prepare('INSERT INTO items ( item ) values ( ? )'); 
			$consulta->bindParam( 1, $this->item );
			$consulta->execute();
        }
		else
		{
			$consulta = $this->db->prepare('UPDATE items SET item = ? WHERE codigo =  ? '); 
			$consulta->bindParam( 1, $this->item );
			$consulta->bindParam( 2, $this->codigo );
			$consulta->execute();
		}
    }
	public function delete()
    {
        $consulta = $this->db->prepare('DELETE FROM  items WHERE codigo =  ? '); 
		$consulta->bindParam( 1, $this->codigo );
		$consulta->execute();
    }
}
?>