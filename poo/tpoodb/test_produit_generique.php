<?php 
 include 'produit.class.php';
extract($_POST);
extract($_GET);
$m="";
//code ajout
if(isset($libelle) and  isset($prix) and empty($id)){
	var_dump($_POST);
Utils::ajouter("produit",$_POST);
$m="ajout ok";
}

//code delete ids
if (!empty($ids)) {
	Utils::supprimer("produit",$ids);
	$m="delete ok";
}
//code editer produit ide
if (isset($ide)) {
	$resultat=Utils::get_by("produit",array('id'=>$ide));
	$pr_a_modif=$resultat[0];
	
}

//code modif
if(isset($libelle) and  isset($prix) and !empty($id)){
$data=$_POST;
unset($data['id']);
Utils::modifier("produit",$data,$id);
$m="modif ok";
}
//code consulter

//code get all
$liste=Utils::get_all("produit");
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="<?=basename(__FILE__); ?>" method="post">
		<table align="center" width="400">
			<tr>
				<td>Libellé : </td>
		<td><input type="text" name="libelle" ></td>
			</tr>
			<tr>
				<td>Prix : </td>
				<td><input type="text" name="prix"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="valider"></td>
			</tr>
		</table>
	</form>
	<hr>

	<table 	align="center" width="90%" border="1">
		<tr>
			<td>id</td>
			<td>libelle</td>
			<td>prix</td>
			<td>Opérations</td>
		</tr>
<?php foreach ($liste as  $produit): 


?>
	<tr>
			<td><?=$produit->id; ?></td>
			<td><?=$produit->libelle; ?></td>
			<td><?=$produit->prix; ?></td>
			<td><a href="<?=basename(__FILE__) ?>?ids=<?=$produit->id;?>">Supprimer</a></td>
		</tr>
<?php endforeach ?>
		
	</table>
</body>
</html>