<?php 
	mysql_connect("localhost", "root", "laboratorio");
	mysql_select_db("pizza");

	$user=$_GET["user"];

	$query="select b.especialidad, c.extra, d.tamano, a.cantidad, a.subtotal, a.total, a.id_pedido from pedido a inner join especialidad b on(a.id_especialidad=b.id_especialidad) inner join extra c on(a.id_extra=c.id_extra) inner join tamano d on(a.id_tamano=d.id_tamano) where a.id_cliente=(select id_cliente from cliente where usuario='".$user."') and LEFT(a.fecha, 10)=LEFT(NOW(),10) and subtotal!=0.00 order by a.id_pedido ";

	$query2="select c.id_pedido, b.ingrediente, b.precio, a.id_pizza from pizza a inner join ingrediente b on(a.id_ingrediente=b.id_ingrediente) inner join pedido c on(a.id_pedido=c.id_pedido) order by c.id_pedido ";

	$query3="select SUM(total) from pedido where id_cliente=(select id_cliente from cliente where usuario='".$user."') and LEFT(fecha, 10)=LEFT(NOW(),10) ";

	$query4="select SUM(subtotal) from pizza ";

	$datos=mysql_query($query);
	$datosI=mysql_query($query2);
	$datosTE=mysql_query($query3);
	$datosTI=mysql_query($query4);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../assets/css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/litera.css">
	<title>Orden</title>
</head>
<body>
	<center>
		<h1 style="margin-top:10px;">Esta es tu orden</h1>
		<table id='tablaPedido'; width='95%'; bgcolor='white'; border='1'; bordercolor=#FBD800; cellpadding='10'; cellspacing='0' style="margin-top:10px; visibility:<?php if(mysql_num_rows($datos)==0){ echo "hidden;"; } else { echo "visible;"; } ?>">
			<thead>
			<tr bgcolor=white style="color:black;">
				<th style="text-align:center">No. Pedido</th>
				<th style="text-align:center">Especialidad</th>
				<th style="text-align:center">Extra</th>
				<th style="text-align:center">Tamaño</th>
				<th style="text-align:center">Cantidad</th>
				<th style="text-align:center">Subtotal</th>
				<th style="text-align:center">Total</th>
				<th style="text-align:center">Acciones</th>
			</tr>
			</thead>
			<?php
				while($value=mysql_fetch_array($datos)){
					echo "<tr>";
					echo "<td style='text-align:center;'>".$value[6]."</td><td style='text-align:center;'>".$value[0]."</td><td style='text-align:center;'>".$value[1]."</td><td style='text-align:center;'>".$value[2]."</td><td style='text-align:center;'>".$value[3]."</td><td style='text-align:center;'>".$value[4]."</td><td style='text-align:center;'>".$value[5]."</td><td style='text-align:center;'><a href='updateespecialidad.php?user=".$user."&pedido=".$value[6]."&especialidad=".$value[0]."&extra=".$value[1]."&tamano=".$value[2]."&ingrediente=NINGUNO&cantidad=".$value[3]."&subtotal=".$value[4]."&total=".$value[5]."'><button id='update' type='button' name='boton' value='' class='btn btn-warning'>Actualizar</button></a>&emsp;<a href='delete.php?user=".$user."&pedido=".$value[6]."'><button id='delete' type='button' class='btn btn-danger'>Eliminar</button></a></td>";
					echo "</tr>";
				}
			?>
		</table>
		<br>
		<h3 style="visibility:<?php if(mysql_num_rows($datosI)==0){ echo "hidden;"; } else { echo "visible;"; } ?>">Con diferentes ingredientes</h3>
		<table id='tablaPedido'; width='70%'; bgcolor='white'; border='1'; bordercolor=#FBD800; cellpadding='10'; cellspacing='0' style="margin-top:10px; visibility:<?php if(mysql_num_rows($datosI)==0){ echo "hidden;"; } else { echo "visible;"; } ?>">
			<thead>
			<tr bgcolor=white style="color:black;">
				<th style="text-align:center">No. Pizza</th>
				<th style="text-align:center">Ingrediente</th>
				<th style="text-align:center">Precio</th>
				<th style="text-align:center">Acciones</th>
			</tr>
			</thead>
			<?php
				while($valueI=mysql_fetch_array($datosI)){
					echo "<tr>";
					echo "<td style='text-align:center;'>".$valueI[0]."</td><td style='text-align:center;'>".$valueI[1]."</td><td style='text-align:center;'>".$valueI[2]."</td><td style='text-align:center;'><a href='../functions/deletepizza2.php?user=".$user."&pizza=".$valueI[0]."'><button id='update' type='button' name='boton' value='' class='btn btn-warning'>Actualizar</button></a>&emsp;<a href='../functions/deletepizza.php?user=".$user."&pizza=".$valueI[0]."'><button id='delete' type='button' class='btn btn-danger'>Eliminar</button></a></td>";
					echo "</tr>";
				}
			?>
		</table>
		<br>
		<br>
		<form action="terms.php" method="POST">
		<input type="hidden" name="user" value='<?php echo $user; ?>'>
		<input type="hidden" value='<?php while($valueTE=mysql_fetch_array($datosTE)){ if($valueTE[0]==""){ $totalE=0.00; echo $totalE; } else {  $totalE=$valueTE[0]; echo $totalE; } } ?>'>
		<input type="hidden" value='<?php while($valueTI=mysql_fetch_array($datosTI)){ if($valueTI[0]==""){ $totalI=0.00; echo $totalI; } else {  $totalI=$valueTI[0]; echo $totalI; } } ?>'>
		<input name="totalInput" type="hidden" value='<?php echo $totalE+$totalI; ?>'>
		<a href="menu.php?user=<?php echo $user; ?>"><button type="button" class="btn btn-danger" style="width:500px; height:60px; font-size:25px">Pedir más cosas</button></a>&emsp;<button type="submit" class="btn btn-secondary" style="width:500px; height:60px; font-size:25px">Comprar</button>
		<br>
		<br>
		</form>
	</center>
</body>
<script src="../assets/js/jquery1.js"></script>
</html>