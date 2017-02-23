<meta charset="utf-8"><?php 
/**
* 
*/
include_once 'Connection.class.php';
class Produit 
{
	//protected  $_libelle;//utiliusé ici et dans les classes filles 
	public  $_libelle;
	public $_prix;
	 const  TVA=20;
	 public static $devise="DHS";
	public function __construct($libelle="",$prix=0)
	{
		$this->_libelle=$libelle;
		$this->_prix=$prix;
	}


	public function afficher()
	{
		echo "<ul>
		<li>Libellé ".$this->_libelle."</li>
		<li>Prix ".$this->_prix."</li>
		</ul>";
		
	}

public function add(){
	$cnx=Connection::connecter_db();
	$pr=$cnx->prepare("insert into produit(libelle,prix) values(?,?)");
	$pr->execute(array($this->_libelle,$this->_prix));
}


public function delete($id){
	$cnx=Connection::connecter_db();
	$pr=$cnx->prepare("delete from produit where id=?");
	$pr->execute(array($id));
}
public function update($id){
	$cnx=Connection::connecter_db();
	$pr=$cnx->prepare("update produit
set libelle=?,
prix=?
where id=?

		");
	$pr->execute(array($this->_libelle,$this->_prix,$id));
}

public static function get_all()
{
	$cnx=Connection::connecter_db();
	$pr=$cnx->prepare("select * from produit

		");
	$pr->execute();
	return $pr->fetchAll();
}

}



 ?>