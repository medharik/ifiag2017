<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>crud mvc</title>
</head>
<body>
	<h3><?php 
	if(isset($_SESSION['notice']))
	echo $_SESSION['notice']; 
unset($_SESSION['notice']);
	?></h3>
<form action="c.php?a=add&t=produit"  method="post" id="monform" >
	<table align="center">
		<tr>
			<td>Libellé :</td>
			<td><input type="text" name="libelle"></td>
		</tr>
		<tr>
			<td>Prix:</td>
			<td><input type="text" name="prix"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="valider"></td>
		</tr>
	</table>
	<hr>
		<table 	align="center" width="90%" border="1" id="liste">
		<thead>
		<tr>
			<td>id</td>
			<td>libelle</td>
			<td>prix</td>
			<td>Opérations</td>
		</tr>
</thead>
		
<tbody id="corps">
	

</tbody>

<?php 
include 'm.php';
$liste=Model::get_all("produit");
foreach ($liste as  $produit): 


?>
	<tr>
			<td class="idproduit"><?=$produit->id; ?></td>
			<td><?=$produit->libelle; ?></td>
			<td><?=$produit->prix; ?></td>
			<td>
	<a href="c.php?id=<?=$produit->id;?>">Consulter</a>
			<a href="c.php?a=del&t=produit&id=<?=$produit->id;?>"   class="supprimer">Supprimer</a>
	<a href="c.php"  class="modifier">Modifier</a>
	
	
	
			</td>
		</tr> 
<?php  endforeach ?>
		
	</table>


</form>
<script
			  src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
			  integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc="
			  crossorigin="anonymous"></script>
<script type="text/javascript">
	
$('#monform').submit(function(event) {
	event.preventDefault();
$.ajax({
	url: 'c.php?a=add&t=produit',
	type: 'POST',
	//dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
	data: $('#monform').serialize(),
})
.done(function() {
	console.log("success");
	
})
.fail(function() {
	console.log("error");
})
.always(function() {
	console.log("complete");
});

});

</script>

</body>
</html>