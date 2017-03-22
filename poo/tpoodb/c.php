<?php 

include 'produit.class.php';
//var_dump($_COOKIE);
extract($_POST);
extract($_GET);
Utils::set_value('libelle');
//var_dump($ps);
$btn="Ajouter";
$m="";


//code delete ids
if (!empty($ids) ) {
	Utils::supprimer("produit",$ids);
	$m="delete ok";
}
//code de suppression multiple
if(!empty($ps)){
foreach ($ps as $id) {
	Utils::supprimer("produit",$id);
	$m="delete multiple ok";
}
}
//code editer produit idm (preprare la modif)
if (isset($idm)) {
	$resultat=Utils::get_by("produit",array('id'=>$idm));

	$pr_a_modif=$resultat[0];
$btn="Modifier";
	
}

//code modif
if(isset($libelle) and  isset($prix) and !empty($id)){
$data=$_POST;
unset($data['id']);
Utils::modifier("produit",$data,$id);
$m="modif ok";
}
//code consulter
if (!empty($idc)) {
	$resultat=Utils::get_by("produit",array('id'=>$idc));
	$p_a_consulter=$resultat[0];
}
//code get all
$liste=Utils::get_all("produit");
 ?>
 ?>