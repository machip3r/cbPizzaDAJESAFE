<?php

	mysql_connect("localhost", "root", "laboratorio");
	mysql_select_db(pizza);

	$user=$_GET["user"];
	$pedido=$_GET["pedido"];
	$especialidad=$_GET["especialidad"];
	$extra=$_GET["extra"];
	$tamano=$_GET["tamano"];
	$cantidad=$_GET["cantidad"];
	$subtotal=$_GET["subtotal"];
	$total=$_GET["total"];

	$query2="select id_especialidad from especialidad where especialidad='".$especialidad."' ";
	$rs2=mysql_query($query2);

	$query3="select id_extra from extra where extra='".$extra."' ";
	$rs3=mysql_query($query3);

	$query4="select id_tamano from tamano where tamano='".$tamano."' ";
	$rs4=mysql_query($query4);

	$query5="select * from extra where id_extra>=5 ";
	$rs5=mysql_query($query5);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../assets/css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/litera.css">
	<title>Actualiza tu orden</title>
</head>
<body style="background-color:#FBD800">
	<div id="general-container" style="background-color:#F28C00">			
	<center>
		<div style="background-color:#FCE555; width:90%; border-radius:8%">
			<br>
			<h1>Edita tu orden</h1>
			<br>
		</div>
		<br>
		<br>
		<form action="../functions/sqlupe.php" method="POST">
		<input type="hidden" id="user" name="user" value="<?php echo $user; ?>">
		<input type="hidden" id="pedido" name="pedido" value="<?php echo $pedido; ?>">
			<table align="center" style="width:100%; background-color:white">
				<tr>
					<td><img class="pizza"; id="molocay"; src="../assets/img/category/MOLOCAY.png" width="210px"></td><td><img class="pizza"; id="impala"; src="../assets/img/category/IMPALA.png" width="210px"></td><td><img class="pizza"; id="vienna"; src="../assets/img/category/VIENNA.png" width="210px"></td><td><img class="pizza"; id="siliciana"; src="../assets/img/category/SILICIANA.png" width="210px"></td><td><img class="pizza"; id="europea"; src="../assets/img/category/EUROPEA.png" width="210px"></td><td><img class="pizza"; id="bbq"; src="../assets/img/category/BBQ.png" width="210px"></td>
				</tr>
				<tr>
					<td><img class="pizza"; id="vegetariana"; src="../assets/../assets/img/category/VEGETARIANA.png" width="210px"></td><td><img class="pizza"; id="texana"; src="../assets/img/category/TEXANA.png" width="210px"></td><td><img class="pizza"; id="portos"; src="../assets/img/category/PORTOS.png" width="210px"></td><td><img class="pizza"; id="cordica" src="../assets/img/category/CORDICA.png" width="210px"></td><td><img class="pizza"; id="chickem"; src="../assets/img/category/CHICKEN.png" width="210px"></td><td><img class="pizza"; id="mantova"; src="../assets/img/category/MANTOVA.png" width="210px"></td>
				</tr>
			</table>
			<br>
		<select name="especialidad" id="especialidad" class="form-control" style="width:50%;">
			<option value="1">NINGUNO</option>
			<option value='2'>MOLOCAY</option>
			<option value='3'>IMPALA</option>
			<option value='4'>VIENNA</option>
			<option value='5'>SILICIANA</option>
			<option value='6'>EUROPEA</option>
			<option value='7'>BBQ</option>
			<option value='8'>VEGETARIANA</option>
			<option value='9'>TEXANA</option>
			<option value='10'>PORTOS</option>
			<option value='11'>CORDICA</option>
			<option value='12'>CHICKEN</option>
			<option value='13'>MANTOVA</option>
		</select>
		<br>
		<br>
		<table style="width:100%; text-align:center; background-color:white">
			<tr>
				<td><img class="ofert"; src="../assets/img/ofert/refresco.png" width="280px"></td><td><img class="ofert"; src="../assets/img/ofert/helado.png" width="280px"></td><td><img class="ofert"; src="../assets/img/ofert/queso_extra.png" width="280px"></td>
			</tr>
		</table>
		<br>
		<select name="extra" id="extra" class="form-control" style="width:50%;">
			<option value="1">NINGUNO</option>
			<option value='2' id="cheese">QUESO EXTRA</option>
			<option value='3'>REFRESCO 2L</option>
			<option value='4'>HELADO</option>
			<?php
				while ($value=mysql_fetch_array($rs5)) {
					echo "<option value='".$value[0]."'>".$value[1]."</option>";
				}
			?>
		</select>
		<br>
		<br>
		<table style="width:100%; text-align:center; background-color:white">
			<tr>
					<td><div style="width:560px"><h2>FAMILIAR</h2></div></td><td><div style="width:560px"><h2>MEDIANA</h2></div></td>
			</tr>
		</table>
		<br>
		<select name="tamano" id="tamano" class="form-control" style="width:50%;">
			<option value='2'>FAMILIAR</option>
			<option value='3'>MEDIANA</option>
		</select>
		<br>
		<h2>¿Cuántos de éstos deseas?</h2>
		<input class="form-control" style="width:40%" type="number" name="cantidad" placeholder="Cantidad" required autocomplete="off" value="1">
		<br>
		<br>
		<button class="btn btn-success" style="width:60%; height:60px; font-size:25px;">Actualizar pedido</button>
		</form>
	</center>
	<br>
	</div>
</body>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>
    $(function(){
        $("#especialidad option[value='<?php while($valueE=mysql_fetch_array($rs2)){ echo $valueE[0]; } ?>']").attr('selected','selected')
    });

    $(function(){
        $("#extra option[value='<?php while($valueEx=mysql_fetch_array($rs3)){ echo $valueEx[0]; } ?>']").attr('selected','selected')
    });

    $(function(){
        $("#tamano option[value='<?php while($valueT=mysql_fetch_array($rs4)){ echo $valueT[0]; } ?>']").attr('selected','selected')
    });

    $(function(){
    	if ($("#especialidad").val()=='1') {
    		document.getElementById("tamano").disabled=true;
    		document.getElementById("cheese").disabled=true;
    	} else if ($("#especialidad").val()!='1') {
    		document.getElementById("tamano").disabled=false;
    		document.getElementById("cheese").disabled=false;
    	}
    });

     $("#especialidad").change(function(){
    	if ($("#especialidad").val()=='1') {
    		document.getElementById("tamano").disabled=true;
    		document.getElementById("cheese").disabled=true;
    	} else if ($("#especialidad").val()!='1') {
    		document.getElementById("tamano").disabled=false;
    		document.getElementById("cheese").disabled=false;
    	}
    });
</script>
</html>