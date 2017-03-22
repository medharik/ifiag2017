<?php 
session_start();
include 'm.php';
extract($_POST);
extract($_GET);
$_SESSION['notice']="";
switch ($a) {
	case 'add':
		Model::ajouter($t,$_POST);
		$_SESSION['notice']="ajout du produit $libelle effectué avec succès";
		break;

	case 'del':
		Model::supprimer($t,$id);
		$_SESSION['notice']="suppressione effectuée avec succès";
		break;
	case 'edi':
		# code...
		break;
	case 'upd':
		# code...
		break;
	case 'get':
		# code...
		break;
	default:
		# code...
		break;
}
header("location:v.php");

 ?>