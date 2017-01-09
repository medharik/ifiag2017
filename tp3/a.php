<?php 
extract($_GET);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tp 3 passage de données par formulaire ...</title>
	<meta charset="utf-8">
</head>
<body>

	<?php if (!empty($erreur) && $erreur=="yes"): ?>
<p style="color: red" align="center">		Tous les champs sont obligatoires
</p>
	<?php endif ?>

<form action="b.php" method="post">
	<table align="center" border="0" >	
	<tr>
		<td>Nom & Prénom :</td>
		<td><input type="text" name="nomprenom"></td>
	</tr>
	<tr>
		<td>Email :</td>
		<td><input type="text" name="email"></td>
	</tr>
	<tr>
		<td>Mot de passe :</td>
		<td><input type="password" name="passe"></td>
	</tr>
	<tr>
		<td>Confirmation  :</td>
		<td><input type="password" name="confirmation"></td>
	</tr>
	<tr>
	<td>Homme : <input type="radio" name="hf" value="homme"></td>
		<td>Femme : <input type="radio" name="hf" value="femme" ></td>
	</tr>
	<tr>
		<td>Statut : </td>
		<td>Etudiant : <input type="checkbox" name="statut[]" value="étudiant"><br>
Diplomé : <input type="checkbox" name="statut[]" value="diplomé"><br>
Chomeur : <input type="checkbox" name="statut[]" value="chomeur">
		</td>
	</tr>
	<tr>
		<td>Spécialité :</td>
		<td><select name="specialite">
		<option selected="selected">Choisir une spécilaité</option>
		<option value="info">Informatique</option>
			<option value="Gestion">Gestion</option>
				<option value="info">G. Civile</option>
			
		</select></td>
	</tr>
	<tr>
		<td>Message : </td>
		<td><textarea name="message"></textarea></td>
	</tr>
	<tr>
		
		<td></td>
		<td><input type="submit" name="ok" value="S'inscrire"></td>
	</tr>

	</table>


</form>
</body>
</html>