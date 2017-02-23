<?php 
/**
* 
*/
class Pere 
{
	protected $_nom;
	function __construct($nom="")
	{
$this->_nom=$nom;
		

	}

	public function afficher()
	{
	
	echo "<br>Prere ,  Nom: " .$this->_nom;
	self::test();
	}
public static function test($value='')
{
	echo "saluutt satatic";
}
}


/**
* 
*/
class Enfant extends Pere
{
	private $_age;
	
	function __construct($nom="",$age=0)
	{

parent::__construct($nom);
$this->_age=$age;

}

	public function afficher()
	{
		parent::afficher();
		echo "<br>age est ".$this->_age."<br>";
		parent::test();
	}
}

$p=new Pere("harik");
$e=new Enfant("mido",20);
$p->afficher();
$e->afficher();
 ?>