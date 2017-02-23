<?php 
/**
* 
*/
class Connection 
{
	private static $cnx=null;
	public static function connecter_db()
	{
		if(!self::$cnx){
	self::$cnx=new PDO( 'mysql:host=localhost;dbname=dbphp', "root", "");
}
	return  self::$cnx;	
	}
	
}


 ?>