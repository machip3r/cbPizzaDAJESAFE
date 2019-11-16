<?php
	$total = $_POST["total"];
	$user = $_POST["user"];

	mysql_connect("localhost", "root", "laboratorio");
	mysql_select_db('pizza');

	$query1="select COUNT(distinct id_pedido) from pizza";
	$query2="select COUNT(id_especialidad) from pedido where id_especialidad!=1";
	$query3="select COUNT(id_extra) from pedido where id_extra!=1 and id_extra<5";
	$query4="select COUNT(id_extra) from pedido where id_extra!=1 and id_extra>=5";

	$rs1=mysql_query($query1);
	$rs2=mysql_query($query2);
	$rs3=mysql_query($query3);
	$rs4=mysql_query($query4);

	$v1=mysql_fetch_array($rs1);
	$v2=mysql_fetch_array($rs2);
	$v3=mysql_fetch_array($rs3);
	$v4=mysql_fetch_array($rs4);

	if ($v1[0]!=0 && $v2[0]!=0 && $v3[0]!=0 && $v4[0]!=0) {
		$mensaje="Tu orden es: ".$v1[0]." pizza(s) con ingrediente(s), ".$v2[0]." pizza(s) de especialidad, ".$v3[0]." extra(s) (helado, refresco o queso extra), ".$v4[0]." combo(s). Debes pagar: $".$total." MXN";
	}

	if ($v1[0]==0 && $v2[0]==0) {
		$mensaje="Tu orden es: ".$v3[0]." extra(s) (helado, refresco o queso extra), ".$v4[0]." combo(s). <br> Debes pagar: $".$total." MXN";
	} else if($v1[0]==0 && $v3[0]==0){
		$mensaje="Tu orden es: ".$v2[0]." pizza(s) de especialidad, ".$v4[0]." combo(s). <br> Debes pagar: $".$total." MXN";
	} else if($v1[0]==0 && $v4[0]==0){
		$mensaje="Tu orden es: ".$v2[0]." pizza(s) de especialidad, ".$v3[0]." extra(s) (helado, refresco o queso extra). <br> Debes pagar: $".$total." MXN";
	} else if($v2[0]==0 && $v3[0]==0){
		$mensaje="Tu orden es: ".$v1[0]." pizza(s) con ingrediente(s), ".$v4[0]." combo(s). <br> Debes pagar: $".$total." MXN";
	} else if($v2[0]==0 && $v4[0]==0){
		$mensaje="Tu orden es: ".$v1[0]." pizza(s) con ingrediente(s), ".$v3[0]." extra(s) (helado, refresco o queso extra). <br> Debes pagar: $".$total." MXN";
	} else if($v3[0]==0 && $v4[0]==0){
		$mensaje="Tu orden es: ".$v1[0]." pizza(s) con ingrediente(s), ".$v2[0]." pizza(s) de especialidad. <br> Debes pagar: $".$total." MXN";
	} else if($v1[0]==0){
		$mensaje="Tu orden es: ".$v2[0]." pizza(s) de especialidad, ".$v3[0]." extra(s) (helado, refresco o queso extra), ".$v4[0]." combo(s). <br> Debes pagar: $".$total." MXN";
	} else if($v2[0]==0){
		$mensaje="Tu orden es: ".$v1[0]." pizza(s) con ingrediente(s), ".$v3[0]." extra(s) (helado, refresco o queso extra), ".$v4[0]." combo(s). <br> Debes pagar: $".$total." MXN";
	} else if($v3[0]==0){
		$mensaje="Tu orden es: ".$v1[0]." pizza(s) con ingrediente(s), ".$v2[0]." pizza(s) de especialidad, ".$v4[0]." combo(s). <br> Debes pagar: $".$total." MXN";
	} else if($v4[0]==0){
		$mensaje="Tu orden es: ".$v1[0]." pizza(s) con ingrediente(s), ".$v2[0]." pizza(s) de especialidad, ".$v3[0]." extra(s) (helado, refresco o queso extra). <br> Debes pagar: $".$total." MXN";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel='stylesheet' type='text/css' href='../assets/css/estilos.css'>
	<link rel='stylesheet' type='text/css' href='../assets/css/litera.css'>
	<title>Verifica tu orden</title>
</head>
<body>
	<div id="general-container">
		<center>
			<h1>Verifica: </h1>
				<table id='tablaPedido'; width='65%'; bgcolor='white'; border='1'; bordercolor=#FBD800; cellpadding='10'; cellspacing='0' style="margin-top:10px;">
					<thead>
					<tr bgcolor=white style="color:black;">
						<th style="text-align:center; width:500px">Pizza con ingredientes</th>
						<th style="text-align:center; width:500px">Pizza de especialidad</th>
						<th style="text-align:center; width:500px">Extra</th>
						<th style="text-align:center; width:500px">Combo</th>
					</tr>
					<tr>
						<td style="text-align:center;"><h5><?php echo $v1[0]; ?></h5></td><td style="text-align:center;"><h5><?php echo $v2[0]; ?></h5></td><td style="text-align:center;"><h5><?php echo $v3[0]; ?></h5></td><td style="text-align:center;"><h5><?php echo $v4[0]; ?></h5></td>
					</tr>
					</thead>
				</table>
				<br>
				<table>
					<tr>
						<thead><h3>Total:</h3></thead>
					</tr>
					<tr>
						<td><h4 style="color:red">$<?php echo $total; ?> MXN</h4></td>
					</tr>
				</table>
				<div id="ticket-container">
					<div id="ticket">
						<table border=1 style="text-align:center">
							<tr>
								<td style="padding:15px">PIZZA DAJESAFE</td>
							</tr>
							<tr>
								<td>------------------------------------------------------------------------------</td>
							</tr>
							<tr>
								<td>T I C K E T</td>
							</tr>
							<tr>
								<td>------------------------------------------------------------------------------</td>
							</tr>
							<tr>
								<td style="padding:15px"><?php echo $mensaje; ?></td>
							</tr>
							<tr>
								<td>------------------------------------------------------------------------------</td>
							</tr>
							<tr>
								<td>------------------------------------------------------------------------------</td>
							</tr>
							<tr>
								<td style="padding:15px">Total: $<?php echo $total; ?> MXN</td>
							</tr>
						</table>
					</div>
					<br>
					<button type="button" class="btn btn-primary" onclick="printDiv('ticket');">Imprimir ticket</button>
				</div>
			<br>
			<button class="btn btn-info" style="width:600px; height:70px; font-size:25px" onclick="listo();">Todo bien</button>
			<br>
			<br>
			<a href="order.php?user=<?php echo $user; ?>"><button class="btn btn-warning" style="width:600px; height:70px; font-size:25px">Cambiar orden</button></a>
			<h1 id="listo" style="display:none">Perfecto, te enviaremos tu pedido</h1>
			<br>
			<br>
		</center>
	</div>
</body>
<script src="../assets/js/jquery1.js"></script>
<script>
	function listo(){
		$("#listo").css("display", "block");
		setTimeout("location.href='../functions/deleteall.php?user=<?php echo $user; ?>'", 2000);
	}
	function printDiv(nombreDiv) {
     	var contenido= document.getElementById(nombreDiv).innerHTML;
    	var contenidoOriginal= document.body.innerHTML;
     	document.body.innerHTML = contenido;
     	window.print();
     	document.body.innerHTML = contenidoOriginal;
	}
</script>
</html>