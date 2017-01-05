<?php
extract($_GET);
?>
<!DOCTYPE html>
<html>
<head>
	<title>tp1 (passage dde données par lien)</title>
</head>
<body>

<?php if(isset($nom)){ ?>
<h3>
Nom : <?php echo $nom; ?></h3>
<?php }?>
<?php if(!empty($age)) {?>
<h4>Age : <?php echo $age; ?></h4>
<?php } ?>
</body>
</html>