<?php include 'm.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>mvc poo crud revision</title>
</head>
<body onload="recup()">
<div align="center" id="message"></div>
	<h3><?php echo M::get_notice('notice') ?></h3>
	<!-- form>table>tr*3>((th>label)+(td>input)) -->
	<form action="c.php?a=add&t=produit" method="post" id="f">
		<table align="center" >
			<tr>
		<th><label for=""></label>Nom</th>
	<td><input type="text" name="nom" id="nom">
<input type="hidden" name="id" id="id">
	</td>
			</tr>
			<tr>
				<th><label for=""></label>Prix</th>
				<td><input type="text" name="prix" id="prix" required></td>
			</tr>
			<tr>
				<th><label for=""></label></th>
				<td><input type="submit" id="btn" value="valider"></td>
			</tr>
		</table>
	</form>
	<hr>
	<table align="center" border="1" width="400">
<thead>
		<tr>
			<td>id</td>
			<td>nom</td>
			<td>prix</td>
			<td>actions</td>
		</tr>
</thead>
<tbody id="corps">
		
		</tbody>


	</table>
	<?php //echo htmlentities("<h3>tets</h3>"); ?>
	<script src="js/jquery.js"></script>

<script type="text/javascript">
	$('#f').submit(function(event) {
		event.preventDefault();
		if($('#btn').val()!="Modifier"){
	$.ajax({
			url: 'c.php?a=add&t=produit',
			type: 'POST',
			//dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data:$(this).serialize(),
		})
		.done(function(data) {
			console.log("success ");
		recup();
			//window.location="http://localhost/cesa2017/mvc2/v.php";
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
			}else{

				$.ajax({
					url: 'c.php?a=update&t=produit',
					type: 'POST',
					//dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
					data:$(this).serialize(),
				})
				.done(function(data) {
					console.log("success");
					$('#message').html(data);
					recup();
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
				
			}

	});

//recuperer les données

function recup() {
	$.ajax({
	url: 'c.php',
	type: 'GET',
	dataType: 'json',
	data: {a: 'get',t:'produit'},
})
.done(function(data) {
	console.log("success ");
	result="";
	for (var i = 0; i < data.length; i++) {
result+="<tr><td>"+data[i].id+"</td>";
result+="<td>"+data[i].nom+"</td>";
result+="<td>"+data[i].prix+"</td>";
result+="<td><a onclick=supprimer("+data[i].id+") href=#>Supprimer</a></td>";
result+="<td><a onclick=editer("+data[i].id+") href=#>editer</a></td>";
result+="<td><a onclick=consulter("+data[i].id+") href=#>Consulter</a></td>";
result+="</tr>";
	}
	$('#corps').html(result);
})
.fail(function() {
	console.log("error");
})
.always(function() {
	console.log("complete");
});

}
function supprimer(id) {
$.ajax({

	url: 'c.php?a=delete&t=produit',
	type: 'GET',
data:{id:id}
})
.done(function(data) {
	console.log("success");
	recup();
	$('#message').html(data);
	
})
.fail(function() {
	console.log("error");
})
.always(function() {
	console.log("complete");
});


	
}
//fin supprimer
//debut editer

function editer(id) {
$.ajax({

	url: 'c.php?a=edit&t=produit',
	type: 'GET',
data:{id:id}
})
.done(function(data) {
	console.log("success");
	$('#id').val(data.id);
$('#nom').val(data.nom);
	$('#prix').val(data.prix);
$('#btn').val("Modifier");
	

	//$('#message').html(data);
	
})
.fail(function() {
	console.log("error");
})
.always(function() {
	console.log("complete");
});


	
}

//fin editer

</script>




</body>
</html>