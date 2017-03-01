<?php 
include 'Utils.class.php';
class Produit 
{
	private $_nom=null;
	private $_prix=null;



	public function __construct($nom,$prix)
	{
		$this->_nom=$nom;
		$this->_prix=$prix;
	}

	public function add()
	{ 
		$cnx=Utils::connecter_db();
		$rp=$cnx->prepare("insert into produit(nom,prix) values(?,?)");
		$rp->execute(array($this->_nom,$this->_prix));

	}
public static function supprimer($id){
Utils::supprimer($id,"produit");

}
	

	public function modifier($id)
	{
		$cnx=Utils::connecter_db();
		$rp=$cnx->prepare("update produit set 
nom=?,
prix=?
where id=?

			");
	$rp->execute(array($this->_nom,$this->_prix,$id));

	}


	public  static function get_all()
	{
	$cnx=Utils::connecter_db();
	$rp=$cnx->prepare("select * from produit");
	$rp->execute();
	return $rp->fetchAll();
	}



	public  static function get_by_id($id)
	{
	$cnx=Utils::connecter_db();
	$rp=$cnx->prepare("select * from produit where id=?");
	$rp->execute(array($id));
	$resulat= $rp->fetchAll();
	return $resulat[0];
	}


}


 ?>