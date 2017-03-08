<?php 
class Utils 
{
	private static $cnx=null;
	public static function connecter_db()
	{
		if(!self::$cnx){
	self::$cnx=new PDO( 'mysql:host=localhost;dbname=dbphp', "root", "");
}
	return  self::$cnx;	
	}

	public static function supprimer($table,$id,$nomid="id"){
	$cnx=Utils::connecter_db();
	$pr=$cnx->prepare("delete from $table where $nomid=?");
	$pr->execute(array($id));
}

public static function ajouter($table,$data=array()){
	$names=array();
	$values=array();
	$trous=array();
	foreach ($data as $key => $value) {
		$names[]=$key;
		$values[]=$value;
$trous[]='?';
	}
	$trousdb=implode(',', $trous);
	$namesdb=implode(',', $names);
	$cnx=Utils::connecter_db();
	$pr=$cnx->prepare("insert into $table ($namesdb) values($trousdb)");
	$pr->execute($values);

	
}

public static function modifier($table,$data=array(),$id,$nomid="id"){
	$names=array();
	$values=array();
	$trous=array();
	foreach ($data as $key => $value) {
		$names[]="$key=?";
		$values[]=$value;

	}
	
	$namesdb=implode(',', $names);
	$cnx=Utils::connecter_db();
	$pr=$cnx->prepare("update $table set $namesdb where

		$nomid=?


		");
	$values[]=$id;
	$pr->execute($values);

	
}

public static function get_all($table)
{
	$cnx=Utils::connecter_db();
	$pr=$cnx->prepare("select * from $table

		");
	$pr->execute();
	return $pr->fetchAll(PDO::FETCH_OBJ);
}

public static function get_by($table,$data=array())
{$names=array();
	$values=array();
	
	foreach ($data as $key => $value) {
		$names[]="$key=?";
		$values[]=$value;

	}
	$namesdb=implode(" and ", $names);
	$cnx=Utils::connecter_db();
	$pr=$cnx->prepare("select * from $table
where $namesdb;
		");
	$pr->execute($values);
	return $pr->fetchAll(PDO::FETCH_OBJ);
}



}
 ?>