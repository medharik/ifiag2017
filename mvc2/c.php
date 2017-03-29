<?php 
include 'm.php';
extract($_POST);
extract($_GET);//$a,$t,...

switch ($a) {
	case 'add':
		M::ajouter($t,$_POST);
		M::set_notice('notice','Ajout effectué avec succès');
echo "Ajout effectué avec succès";
		break;
		case 'delete':
		M::supprimer($t,$id);
		M::set_notice('notice','suppression effectué avec succès');
		echo "suppression effectué avec succès";
		break;
		case 'edit':
	$element=	M::get($t,$id);
	header('Content-type:application/json');
	echo json_encode($element);	
		break;
	case 'update':
		M::modifier($t,$_POST,$id);
	M::set_notice('notice','modification effectuée avec succès');
	echo "modification effectuée avec succès";
		break;
	case 'get':
		$resutat=M::get_all("produit");
		$js=array();
		foreach ($resutat as $ligne) {
			$js[]=array("id"=>$ligne->id,"nom"=>$ligne->nom,"prix"=>$ligne->prix);
		}
header('Content-type:application/json')		;
echo json_encode($js);
		break;
	default:
	//header("location:error.php");
	
}
//header("location:v.php");
 ?>