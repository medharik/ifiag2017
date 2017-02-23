<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<pre>
form.classform>table#idtable>tr*2>(td>label{libellé}+td>input[type="text"])+tr>(td+td>input[type="submit"])
</pre>
<form action="" class="classform">
	<table id="idtable">
		<tr>
			<td>
				<label for="">libellé</label>
				<td><input type="text"></td>
			</td>
			<tr>
				<td></td>
				<td><input type="submit"></td>
			</tr>
		</tr>
		<tr>
			<td>
				<label for="">libellé</label>
				<td><input type="text"></td>
			</td>
			<tr>
				<td></td>
				<td><input type="submit"></td>
			</tr>
		</tr>
	</table>
</form>

</body>
</html>