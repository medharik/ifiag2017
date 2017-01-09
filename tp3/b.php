<?php 
extract($_POST);
var_dump($_POST);//affiche le type et contenu d'une variable
//redirection vers a.php si email ou nomprenom sont vides 
if (empty($email) || empty($nomprenom)) {
header("location:a.php?erreur=yes");
}


 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>
</head>
<body>
<?php 
if (!preg_match("/^CESA[0-9]{4}/", $passe)) {
	echo "<h2>mot de passe incorrect</h2>";
}
 ?>

<?php if ($passe!=$confirmation): ?>
	<p>Les deux mot de passe ne correspondent pas!!</p>
<?php endif ?>

<?php foreach ($_POST as $cle => $valeur): ?>
<?php if(!is_array($valeur)){ ?>
<?php  echo $cle ?> : <?php echo $valeur ?><br>
<?php } else { 
echo $cle ;
	?>
	:<br>

<?php foreach ($valeur as  $value): ?>
	<?php echo $value; ?><br>
<?php endforeach ?>
<?php } ?>
<?php endforeach ?>
</body>
</html>