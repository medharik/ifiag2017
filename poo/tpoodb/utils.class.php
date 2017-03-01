<?php 
/**
* 
*/
class Utils 
{
	
	private static $cnx=null;
	public static function connecter_db()
	{
		if(!self::$cnx){
	self::$cnx=new PDO( 'mysql:host=localhost;dbname=dbcesa2017', "root", "");
}
	return  self::$cnx;	
	}


	public static  function supprimer($id,$table)
	{
		$cnx=Utils::connecter_db();
		$rp=$cnx->prepare("delete from $table where id=?");
		$rp->execute(array($id));

	}

	public  static function get_all($table="produit")
	{
	$cnx=Utils::connecter_db();
	$rp=$cnx->prepare("select * from $table");
	$rp->execute();
	return $rp->fetchAll();
	}

public  static function get_by_id($id,$table)
	{
	$cnx=Utils::connecter_db();
	$rp=$cnx->prepare("select * from ".$table." where id=?");
	$rp->execute(array($id));
	return $rp->fetchAll(PDO::FETCH_OBJ);
	}
	public function notice($message)
	{
		return "<div class='alert'>$message</div>";
		
	
	}
}

 ?>