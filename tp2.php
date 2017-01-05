<?php 
extract($_POST);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>tp 2 : passage de données par formulaire</title>
</head>
<body>
<?php if(!empty($login)){ ?>
strip tag pour supprimer les tags (les balises et notamment script) ce qui sécurise plus les données à afficher
<p>Votre login est <?php echo strip_tags($login);  ?>

</p>
<?php } ?>
<?php if(!empty($passe)){ ?>
<p>Votre mot de passe est <?php echo $passe;  ?>

</p>
<?php } ?>

<?php if(empty($login) ||  empty($passe) ) { ?>
<form action="tp2.php" method="post">
	
Login : <input type="text" name="login" id="login">
Mot de passe : <input type="password" name="passe">
<input type="submit" name="ok">

</form>
<?php } ?>
</body>
</html>