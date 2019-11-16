<?php

	mysql_connect("localhost", "root", "laboratorio");
	mysql_select_db(pizza);

	$user=$_GET["user"];
	$pizza=$_GET["pizza"];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../assets/css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/litera.css">
	<title>Actualiza tu pizza</title>
</head>
<body style="background-color:#FBD800">
	<div id="general-container" style="background-color:#F28C00">			
	<center>
		<div style="background-color:#FCE555; width:90%; border-radius:8%">
			<br>
			<h1>Edita tu pizza</h1>
			<br>
		</div>
		<br>
		<br>
		<form action="../functions/sqlupi.php" method="POST" id="ingredient-form" name="ingredients">
		<input type="hidden" id="user" name="user" value="<?php echo $user; ?>">
		<input type="hidden" id="pizza" name="pizza" value="<?php echo $pizza; ?>">
			<table style="width:70%; text-align:center; height:300px; margin-left:150px;">
					<tr>
					<td><h6 style="color:black;"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="cb[]" id="option-radio1" value="2">JAMON</label></h6></td><td><h6 style="color:black;"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="cb[]" id="option-radio2" value="3">CEBOLLÍN</label></h6></td><td><h6 style="color:black;"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="cb[]" id="option-radio3" value="4">ADEREZO DE CILANTRO</label></h6></td>
					</tr>
					<tr>
					<td><h6 style="color:black;"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="cb[]" id="option-radio4" value="5">SALCHICHA</label></h6></td><td><h6 style="color:black;"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="cb[]" id="option-radio5" value="6">CHILE GÜERO</label></h6></td><td><h6 style="color:black;"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="cb[]" id="option-radio6" value="7">CEBOLLA MORADA</label></h6></td>
					</tr>
					<tr>
					<td><h6 style="color:black;"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="cb[]" id="option-radio7" value="9">CHORIZO</label></h6></td><td rowspan="2"><h6 style="color:black;"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="cb[]" id="option-radio8" value="8">CARNE ASADA</label></h6></td><td><h6 style="color:black;"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="cb[]" id="option-radio9" value="10">ACEITUNA NEGRA</label></h6></td>
					</tr>
					<tr>
					<td><h6 style="color:black;"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="cb[]" id="option-radio10" value="11">TOCINO</label></h6></td><td><h6 style="color:black;"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="cb[]" id="option-radio11" value="12">CARNE ITALIANA</label></h6></td>
					</tr>
					<tr>
					<td><h6 style="color:black;"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="cb[]" id="option-radio12" value="13">PEPERONI</label></h6></td><td><h6 style="color:black;"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="cb[]" id="option-radio13" value="14">CHAMPIÑON</label></h6></td><td><h6 style="color:black;"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="cb[]" id="option-radio14" value="15">PIMIENTO VERDE</label></h6></td>
					</tr>
					<tr>
					<td><h6 style="color:black;"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="cb[]" id="option-radio15" value="16">POLLO</label></h6></td><td><h6 style="color:black;"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="cb[]" id="option-radio16" value="17">ELOTE</label></h6></td><td><h6 style="color:black;"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="cb[]" id="option-radio17" value="18">CHILE TOREADO</label></h6></td>
					</tr>
					<tr>
					<td><h6 style="color:black;"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="cb[]" id="option-radio18" value="19">PIÑA</label></h6></td><td><h6 style="color:black;"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="cb[]" id="option-radio19" value="20">JALAPEÑO</label></h6></td><td><h6 style="color:black;"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="cb[]" id="option-radio20" value="21">CHILE CHIPOTLE</label></h6></td>
					</tr>
			</table>
		<br>
		<button class="btn btn-success" onclick="return funcion();" style="width:60%; height:60px; font-size:25px;">Actualizar ingrediente</button>
		</form>
	</center>
	<br>
	</div>
</body>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>
	var contador = 0;
	function funcion() {
		for (var i=0;i < document.forms["ingredients"].elements.length;i++) {
			inpt = document.forms[0].elements[i];
			if (inpt.checked) {
				contador++;
			}
		}
	if(contador > 3) {
			alert('No puedes seleccionar más de 3 ingredientes');
			document.getElementById("ingredient-form").reset();
			contador = 0;
			return false;
		}
	}
</script>
</html>