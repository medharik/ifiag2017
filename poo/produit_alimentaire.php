<?php 
include_once 'produit.class.php';
class Produit_alimentaire extends Produit
{
	private $_date_expiration=null;
public function __construct($nom="",$prix=0,$date_expiration=""){
		parent::__construct($nom,$prix);
		$this->_date_expiration=$date_expiration;
	}

	public function afficher_date_expiration()
	{
		echo "date d'expiration ".$this->_date_expiration;
		$this->afficher();
	}

public function afficher()
{
	parent::afficher();
	
	echo "et puisque c'est produit alimentaire , on a date d'expiration : ".$this->_date_expiration;
}
public function get_date_expiration()
{
	return $this->_date_expiration;
}


}

 ?>