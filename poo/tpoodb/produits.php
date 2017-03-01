<?php 
include 'produit.class.php';
extract($_POST);
extract($_GET);
$message="";
//pour ajouter
if (isset($nom) &&  isset($prix)) {
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
			<td>Libellé: </td>
			<td><input type="text" name="nom"></td>
		</tr>
		<tr>
			<td>Prix:</td>
			<td><input type="text" name="prix"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="valider" ></td>
		</tr>
	</table>
</form>
<hr>
<h3>consultation du produit </h3>
<ul>
	<li>Nom: <?php echo $produit_a_consulter['nom']; ?></li>
	<li>prix : <?php echo $produit_a_consulter['prix']; ?></li>
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
		  >consulter</a></td>
	</tr>
<?php endforeach ?>
	

</table>
	
</body>
</html>