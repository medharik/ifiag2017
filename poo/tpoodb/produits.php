<?php 
include 'produit.class.php';
extract($_POST);
extract($_GET);
$message="";
$btn="Ajouter";

/*//empty => true si la variable :
//n'exsite pas(!isset()), vide, null, 0,0.0,"","0",false
// en gros empty => false
$x=90;
unset($x);
var_dump((bool)$u);*/

//pour ajouter
if (isset($nom) &&  isset($prix) && empty($id)) {
	$produit=new Produit($nom,$prix);
	$produit->add();
$message="Ajout du produit $nom effetué avec succès";
}
//pour supprimer
if (isset($ids)) {
	Produit::supprimer($ids);
	$message="produit supprimé avec succès";
}
if (isset($idc)) {
	$produit_a_consulter=Produit::get_by_id($idc);

}
//recuperer l'element à modifier
if (isset($idm)) {
	$produit_a_modifier=Produit::get_by_id($idm);
	$btn="Modifier";

}
//effectuer la modification
if(!empty($id) && isset($nom) && isset($prix)){
$pm=new Produit($nom,$prix);
$pm->modifier($id);
}
//pour recuprer tous les produits
$produits=Utils::get_all("produit");
//var_dump($produits);
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>produit crud</title>
</head>
<body oncontextmenu="return true">
<?php echo $message; ?>
<form action="<?php echo basename(__FILE__); ?>" method="post">
	<table align="center" >
	<tr>
		<td>id : </td>
		<td><input type="text" name="id" 
		value="<?php
		  if(!empty($produit_a_modifier['id']) ) echo $produit_a_modifier['id'] ?>" ></td>
	</tr>
		<tr>
			<td>Libellé: </td>
			<td><input type="text" name="nom" value="<?php if(!empty($produit_a_modifier['nom']))  echo $produit_a_modifier['nom'] ?>"></td>
		</tr>
		<tr>
			<td>Prix:</td>
			<td><input type="text" name="prix"
			value="<?php if(!empty($produit_a_modifier['prix']) ) echo $produit_a_modifier['prix']; ?>"  ></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="<?php echo $btn; ?>" ></td>
		</tr>
	</table>
</form>
<hr>
<h3>consultation du produit </h3>
<ul>
	<li>Nom: <?php if(!empty($produit_a_consulter['nom'])) echo $produit_a_consulter['nom']; ?></li>
	<li>prix : <?php if(!empty($produit_a_consulter)) echo $produit_a_consulter['prix']; ?></li>
</ul>

<hr>

<!--table>((tr>th*4)+(tr>td*4))-->
<h3>Liste de <?php echo count($produits); ?> Produits</h3>
<table border="1" align="center" width="600">
	<tr>
		<th>id</th>
		<th>nom</th>
		<th>prix</th>
		<th>opérations</th>
	</tr>
<?php foreach ($produits as $ligne): ?>
	<tr>
		<td><?php echo $ligne['id']; ?></td>
		<td><?php echo $ligne['nom']; ?></td>
		<td><?php echo $ligne['prix']; ?></td>
		<td><a href="produits.php?ids=<?php echo $ligne['id']; ?>" 
		 onclick="return confirm('voulez vous vraiment supprimer cet élement?')">Supprimer</a>  |   <a href="produits.php?idc=<?php echo $ligne['id']; ?>" 
		  >consulter</a>
 <a href="produits.php?idm=<?php echo $ligne['id'] ?>">Modifier</a></td>
	</tr>
<?php endforeach ?>
	

</table>
	
</body>
</html>