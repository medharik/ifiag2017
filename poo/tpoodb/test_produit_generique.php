<?php 
include 'produit.class.php';
var_dump($_COOKIE);
extract($_POST);
extract($_GET);
Utils::set_value('libelle');
//var_dump($ps);
$btn="Ajouter";
$m="";
//code ajout
if(isset($libelle) and  !empty($prix) and empty($id)){
	//var_dump($_POST);
Utils::ajouter("produit",$_POST);
$m="ajout ok";
}

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

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php echo $m; ?>
	<form action="<?=basename(__FILE__); ?>" method="post" >
	<input type="hidden" name="id" value="<?php if(isset($pr_a_modif)) echo $pr_a_modif->id; ?>">
		<table align="center" width="400">
			<tr>
				<td>Libellé : </td>
		<td><input type="text" name="libelle" value="<?php 

		if(isset($pr_a_modif)) {echo $pr_a_modif->libelle; 
		}
Utils::set_value('libelle');


		 ?>" ></td>
			</tr>
			<tr>
				<td>Prix : </td>
				<td><input type="text" name="prix" value="<?php if(isset($pr_a_modif)) echo $pr_a_modif->prix; ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="<?php echo $btn; ?>"></td>
			</tr>
		</table>
	</form>
	<hr>


<?php if (isset($p_a_consulter)): ?>
	<ul>
		<li>Id : <?php echo $p_a_consulter->id ?></li>
<li>Libellé : <?php echo $p_a_consulter->libelle ?></li>
<li>Prix : <?php echo $p_a_consulter->prix ?></li>
	</ul>
<?php endif ?>
<form action="<?php echo basename(__FILE__); ?>" method="post">
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
			<td>
<a href="<?=basename(__FILE__) ?>?idc=<?=$produit->id;?>">Consulter</a>
			<a href="<?=basename(__FILE__) ?>?ids=<?=$produit->id;?>">Supprimer</a>
<a href="<?=basename(__FILE__) ?>?idm=<?=$produit->id;?>">Modifier</a>
<input type="checkbox" name="ps[]" value="<?=$produit->id;?>" class='sup' onclick="actiongroupe()">


			</td>
		</tr>
<?php endforeach ?>
		
	</table>

<hr>
<div id="options" style="visibility: hidden;">
<input type="submit" id="sp" value="Supprimer"  onclick="return annuler()"  >
</div>
</form>
<script type="text/javascript">
	function annuler() {
		if(! confirm('voulez vous vrm supprimer cces éléments ?')){
sup=document.getElementsByClassName('sup');
for(i=0;i<sup.length;i++){
sup[i].checked=false;
	}
	return false;
}
	return true;
}

function actiongroupe() {
	sup=document.getElementsByClassName('sup');
	c=0;
for(i=0;i<sup.length;i++){
if(sup[i].checked) c++;
if(c>0){
document.getElementById('options').style.visibility='visible';
if(c==1){
	document.getElementById('sp').value='Supprimer le produit';
}else{
	document.getElementById('sp').value='Supprimer les '+ c+' produits';
}
	}else{
	document.getElementById('options').style.visibility='hidden';	
	}
}

}

</script>
</body>
</html>