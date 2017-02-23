<?php 
extract($_POST);

 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php 
if ($hf=="homme") {
	$class="h";
	$p="Mr.";
}else{
$class="f";
$p="Mlle";
}
 ?>


<body class="<?php echo $class; ?>">


<?php echo $p; ?> <?php echo $nom; ?><br>
Vous êtes : <?php echo $hf; ?><br>
<?php if ($age>18): ?>

	<h2>Majeur</h2>
<?php endif ?>

<?php if ($age<=18): ?>
	<h3>Mineur</h3>
<?php endif ?>
 
Votre age est : <?php echo $age; ?>
</body>
</html>