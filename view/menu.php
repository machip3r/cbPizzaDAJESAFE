<?php
	$user=$_GET["user"];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<link rel='stylesheet' type='text/css' href='../assets/css/estilos.css'>
	<link rel='stylesheet' type='text/css' href='./assets/css/litera.css'>
	<title>Menu</title>
</head>
<body style="background-color:#FBD800">
	<div id="general-container" style="background-color:#F28C00">
		<center>
			<br>
			<div style="background-color:#FCE555; width:90%; border-radius:8%">
				<br>
				<h1 style="color:black">Bienvenido a <img src="../assets/img/logo/letrasLogo.png" style="width:150px"></h1>
				<h4>Tú la pides, nosotros la llevamos</h4>
				<br>
			</div>
			<img id="menu-pizza" src="" style="width:100%">
			<hr>
			<h2 style="color:black">OFERTAS</h2>
			<marquee scrollamount=15 direction="right" behavior="alternate">
				<img src="../assets/img/ofert/ofert1.jpg" style="width:200px; height:300px"><img src="../assets/img/ofert/ofert2.jpg" style="width:200px; height:300px"><img src="../assets/img/ofert/ofert3.jpg" style="width:200px; height:300px"><img src="../assets/img/ofert/ofert1.jpg" style="width:200px; height:300px"><img src="../assets/img/ofert/ofert2.jpg" style="width:200px; height:300px"><img src="../assets/img/ofert/ofert3.jpg" style="width:200px; height:300px"><img src="../assets/img/ofert/ofert1.jpg" style="width:200px; height:300px"><img src="../assets/img/ofert/ofert2.jpg" style="width:200px; height:300px"><img src="../assets/img/ofert/ofert3.jpg" style="width:200px; height:300px">
			</marquee>
			<br>
			<br>
			<hr>
			<br>
			<h2 style="color:black">Selecciona la pizza que te agrade</h2>
			<br>
			<input type="hidden" id="user" name="user" value="<?php echo $user; ?>">
			<table align="center" style="width:100%; background-color:white">
				<tr>
					<td><img class="pizza"; id="molocay"; src="../assets/img/category/MOLOCAY.png" width="210px"><button id="add" onclick="insertar(this);" type="button" name="pizza" value="2" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></button></td><td><img class="pizza"; id="impala"; src="../assets/img/category/IMPALA.png" width="210px"><button id="add" onclick="insertar(this);" type="button" name="pizza" value="3" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></button></td><td><img class="pizza"; id="vienna"; src="../assets/img/category/VIENNA.png" width="210px"><button id="add" onclick="insertar(this);" type="button" name="pizza" value="4" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></button></td><td><img class="pizza"; id="siliciana"; src="../assets/img/category/SILICIANA.png" width="210px"><button id="add" type="button" onclick="insertar(this);" name="pizza" value="5" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></button></td><td><img class="pizza"; id="europea"; src="../assets/img/category/EUROPEA.png" width="210px"><button id="add" onclick="insertar(this);" type="button" name="pizza" value="6" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></button></td><td><img class="pizza"; id="bbq"; src="../assets/img/category/BBQ.png" width="210px"><button id="add" onclick="insertar(this);" type="button" name="pizza" value="7" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></button></td>
				</tr>
				<tr>
					<td><img class="pizza"; id="vegetariana"; src="../assets/img/category/VEGETARIANA.png" width="210px"><button id="add"  onclick="insertar(this);" type="button" name="pizza" value="8" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></button></td><td><img class="pizza"; id="texana"; src="../assets/img/category/TEXANA.png" width="210px"><button id="add" onclick="insertar(this);" type="button" name="pizza" value="9" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></button></td><td><img class="pizza"; id="portos"; src="../assets/img/category/PORTOS.png" width="210px"><button id="add" type="button" name="pizza" value="10" class="btn btn-outline-secondary" onclick="insertar(this);"><img src="../assets/img/icon/add_icon.png" width="20px"></button></td><td><img class="pizza"; id="cordica" src="../assets/img/category/CORDICA.png" width="210px"><button id="add" onclick="insertar(this);" type="button" name="pizza" value="11" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></button></td><td><img class="pizza"; id="chickem"; src="../assets/img/category/CHICKEN.png" width="210px"><button id="add" onclick="insertar(this);" type="button" name="pizza" value="12" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></button></td><td><img class="pizza"; id="mantova"; src="../assets/img/category/MANTOVA.png" width="210px"><button id="add" onclick="insertar(this);" type="button" name="pizza" value="13" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></button></td>
				</tr>
			</table>
			<br>
			<hr>
			<h1 style="color:black;">O si prefieres elegir los ingredientes...</h1>
			<h2 style="color:black">¿Con qué ingredientes te gustaría?</h2>
			<br>
			<form action="../functions/insert_ingrediente.php"  method="GET" id="ingredient-form" name="ingredients"> 
				<input type="hidden" id="user" name="user" value="<?php echo $user; ?>">
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
			<button type="submit" onclick="return funcion();" class="btn btn-secondary" style="width:150px; height:60px; font-size:25px">¡Pedir!</button>
			</form>
			<br>
			<hr>
			<br>
			<h1 style="color:black;">Opciones extra</h1>
			<br>
			<table style="width:100%; text-align:center; background-color:white">
				<tr>
					<td><img class="ofert"; src="../assets/img/ofert/refresco.png" width="280px"><button id="add_extra" onclick="insertarExtra(this);" value="3" type="button" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></td><td><img class="ofert"; src="../assets/img/ofert/helado.png" width="280px"><button id="add_extra" onclick="insertarExtra(this);" value="4" type="button" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></td><td><img class="ofert"; src="../assets/img/ofert/queso_extra.png" width="280px"><button id="add_extra" onclick="insertarExtra(this);" value="2" type="button" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></td>
				</tr>
			</table>
			<hr>
			<br>
			<br>
			<h1>Combos extra</h1>
			<br id="bc">
			<button class="btn btn-info" id="mc" style="width:400px; height:60px; font-size:20px" onclick="mostrarCombos();">Mostrar combos extra</button>
			<br>
			<div id="container-combo" style="width:100%; text-align:center; background-color:white; display:none">
				<table style="width:100%; text-align:center; background-color:white">
				<tr>
					<td><h1>1</h1></td><td><h1>2</h1></td><td><h1>3</h1></td>
				</tr>
				<tr>
					<td><img class="combo"; src="../assets/img/combo/combo1.jpg" width="280px"><button id="add_extra" onclick="insertarExtra(this);" value="5" type="button" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></td><td><img class="combo"; src="../assets/img/combo/combo2.jpg" width="280px"><button id="add_extra" onclick="insertarExtra(this);" value="6" type="button" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></td><td><img class="combo"; src="../assets/img/combo/combo3.jpg" width="280px"><button id="add_extra" onclick="insertarExtra(this);" value="7" type="button" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></td>
				</tr>
				<tr>
					<td><h1>4</h1></td><td><h1>5</h1></td><td><h1>6</h1></td>
				</tr>
				<tr>
					<td><img class="combo"; src="../assets/img/combo/combo4.jpg" width="280px"><button id="add_extra" onclick="insertarExtra(this);" value="8" type="button" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></td><td><img class="combo"; src="../assets/img/combo/combo5.jpg" width="280px"><button id="add_extra" onclick="insertarExtra(this);" value="9" type="button" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></td><td><img class="combo"; src="../assets/img/combo/combo6.jpg" width="280px"><button id="add_extra" onclick="insertarExtra(this);" value="10" type="button" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></td>
				</tr>
				<tr>
					<td><h1>7</h1></td><td><h1>8</h1></td><td><h1>9</h1></td>
				</tr>
				<tr>
					<td><img class="combo"; src="../assets/img/combo/combo7.jpg" width="280px"><button id="add_extra" onclick="insertarExtra(this);" value="11" type="button" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></td><td><img class="combo"; src="../assets/img/combo/combo8.jpg" width="280px"><button id="add_extra" onclick="insertarExtra(this);" value="12" type="button" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></td><td><img class="combo"; src="../assets/img/combo/combo9.jpg" width="280px"><button id="add_extra" onclick="insertarExtra(this);" value="13" type="button" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></td>
				</tr>
				<tr>
					<td><h1>10</h1></td><td><h1></h1></td><td><h1>11</h1></td>
				</tr>
				<tr>
					<td><img class="combo"; src="../assets/img/combo/combo10.jpg" width="280px"><button id="add_extra" onclick="insertarExtra(this);" value="14" type="button" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></td><td></td><td><img class="combo"; src="../assets/img/combo/combo11.jpg" width="280px"><button id="add_extra" onclick="insertarExtra(this);" value="15" type="button" class="btn btn-outline-secondary"><img src="../assets/img/icon/add_icon.png" width="20px"></td>
				</tr>
			</table>
			<br>
			</div>
			<br>
			<div class="alert alert-dismissible alert-success">
 				<h5><font color="red"><b>Nota:</b></font> puedes eliminar los elementos que si te decidiste a no incluirlos en la siguiente sección.</h5>
			</div>
			<br>
			<form action="order.php" method="GET">
			<input type="hidden" name="user" value="<?php echo $user; ?>">
			<button type="submit" class="btn btn-secondary" style="width:500px; height:60px; font-size:25px">Siguiente</button>
			</form>
			<br>
			<br>
		</center>
	</div>
</body>
<script src="../assets/js/jquery1.js"></script>
<script type="text/javascript">
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

	function insertar(element){
		$.post("../functions/insert_especialidad.php", {
        	pizza:$(element).val(),
        	user:$("#user").val()
		}, function (data, status){
			console.log("Listo");
		});
	}

	function insertarExtra(element){
		$.post("../functions/insert_extra.php", {
        	extra:$(element).val(),
        	user:$("#user").val()
		}, function (data, status){
			console.log("Listo");
		});
	}

	function mostrarCombos(){
		$("#mc").css("display", "none");
		$("#bc").css("display", "none");
		$("#container-combo").css("display", "block");
	}
</script>
</html>