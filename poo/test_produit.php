<meta charset="utf-8">
<?php 
include("produit.class.php");
include 'produit_alimentaire.php';
Produit::$devise="$";
$hp=new Produit("hp",3000);
$dell=new Produit("dell",5000);
$hp->afficher();
$dell->afficher();
$pa=new Produit_alimentaire("lait uht",10,"10/10/2017");
$commandes=array($hp,$dell,$pa);

 ?>
 <table align="center" border="1">
 	<tr>
 		<td>Libellé</td>
 		<td>prix</td>
 	</tr>
 	<?php foreach ($commandes as $produit): ?>
 	<tr>
 		<td>informations : <?php $produit->afficher(); ?></td>
 		<td></td>
 	</tr>
 	<?php endforeach ?>
 </table>
 <hr>

 <h2>infos sur le produit alimentaire </h2>
 <ul>
 	<li>libellé : <?php echo $pa->_libelle; ?></li>
 	<li>Prix : <?php echo $pa->_prix; ?></li>
 	<li><?php $pa->afficher_date_expiration(); ?></li>
 </ul>

 <hr>
 <h3>Test db </h3>
 <?php 
$mac=new Produit("sony air",16000);
//$mac->add();
$resultat=Produit::get_all();
  ?>

  <h4>liste des produits :</h4>
  <?php foreach ($resultat 	as  $ligne): ?>
 <p>Libellé : <?php echo $ligne["libelle"]; ?></p> 
  <p>Prix : <?php echo $ligne["libelle"]; ?></p> 
   <p>Id : <?php echo $ligne["id"]; ?></p> 
   <p><a href="<?php echo basename(__FILE__); ?>"?>Supprimer</a></p>
   <hr>
  <?php endforeach ?>