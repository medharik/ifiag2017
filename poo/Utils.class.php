<?php
class Utils{
private static $cnx=null;
public static function connecter(){
	$options=array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'");
//singleton
if(! self::$cnx){
	self::$cnx= new PDO('mysql:host=localhost;dbname=vimeo', "root", "",$options);
	
}	
	
	
	return self::$cnx;
}
	
	public static  function delete($table,$id){
		try{
			$cnx=Utils::connecter();
		$s=$cnx->prepare("delete from ".$table."   where id=?");
		
		$s->execute(array($id));
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public static  function deleteBy($table,$attr,$val){
		try{
			$cnx=Utils::connecter();
		$s=$cnx->prepare("delete from ".$table."   where ".$attr." =?");
		
		$s->execute(array($val));
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}	
		public static  function getAll($table){
			$cnx=Utils::connecter();
		$s=$cnx->prepare("select * from ".$table."  order by id desc");
		try{
		$s->execute();
		return $s->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		
	}
	
	public static function getById($table,$id){
			$cnx=Utils::connecter();
		$s=$cnx->prepare("select * from ".$table." where id=? order by id desc ");
		try{
		$s->execute(array($id));
		return $s->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		
	}
	
	
		public static function getBy($table,$attr,$val){
			$cnx=Utils::connecter();
		$s=$cnx->prepare("select * from ".$table." where ".$attr." =?  order by id desc");
		try{
		$s->execute(array($val));
		return $s->fetchAll();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		
	}
	public static function v($valeur){
		if(!empty($valeur)){
		return htmlentities($valeur);
		}else return "";
		
	}
	
	public static  function tabTiUrl($tableau){
		$t=serialize($tableau);
		$t=urlencode($t);
		return $t;
	}
	public static  function urlToData($dataUrl){
		$t=urlencode($dataUrl);
		$t=unserialize($t);
		
		return $t;
	}
	
	public static function redirect($baseUrl,$data){
		header("location:".$baseUrl."?data=".self::tabTiUrl($data));
		
	}
	public static function extraire($tableau){
	return "";	
		
	}
	public static function charger($infos,$dossier="images/"){
	$target_dir = $dossier;
if(empty($infos['name'])) return "images/defaut.png";
$target_file = $target_dir .date('dmYihs'). basename($infos["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


    $check = getimagesize($infos["tmp_name"]);
    if($check !== false) {
     if( move_uploaded_file($infos['tmp_name'],$target_file)){
		return $target_file;
	}
	  
	  
    } else {
       die("ce n'est pas une image ou la taille du fichier est > 8Mo <a href='javascript:window.history.go(-1)'>retour</a>");
    }



	}
public static   function creerSession(){
if(empty($_SESSION)){
session_start();
session_regenerate_id();	
}	
}
public static   function detruireSession(){

unset($_SESSION);
session_destroy();
	

}
public static   function vers($vue="index.php"){
	header("location:../v/".$vue);


}	 
static function  verifier($login,$passe){

	
	//connection
	$cnx=self::connecter();
	//preparation de la requete qu cherche par login et passe 
	$rp=$cnx->prepare("select * from droit where login=? and passe =?");
//execution de la requete en lui donnant les infos adequates
	$rp->execute(array($login,crypt($passe,'harik')));
	//verification du nombre d'utilisateur ayant ce login et passe
	$nombreLignes= $rp->rowCount();
	//s'l n'ya aucun on retourne false
	//var_dump(array($login,$passe));
						
	
	
	if($nombreLignes==0){

		header('location:../index.php?cn=no');
		
	}else{
		
		//sinon on fait un fetch pour recuperer la ligne qui conntient les infos de l'user
		//par fetch
		
		//on creer une session
		
		self::creerSession();
		//on stoque le nom et le nom dans la session  
$ligne=$rp->fetch();
			$_SESSION['login']=$ligne->login;
			$_SESSION['passe']=$passe;		
			$_SESSION['droit']=$ligne->droit;
			$_SESSION['nom']=$ligne->nom;
			$_SESSION['id']=$ligne->id;
	//	var_dump($_SESSION);
	//	exit(-1);
		//on retourne true
		return true;	
	}
}
}
?>
