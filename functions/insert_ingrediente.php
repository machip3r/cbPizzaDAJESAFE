<?php

	$user=$_GET["user"];
	$ing=$_GET["cb"];

	mysql_connect("localhost", "root", "laboratorio");
	mysql_select_db(pizza);

	$query1="insert into pedido(id_cliente, id_especialidad, id_tamano, id_extra, cantidad, subtotal, total, fecha) values((select id_cliente from cliente where usuario='".$user."'), 1, 1, 1, 1, 0.00, 0.0, NOW()) ";

	$query3="insert into pizza(id_pedido, id_ingrediente, subtotal) values((select id_pedido from pedido where LEFT(fecha, 18)=LEFT(NOW(), 18)), ".$ing[0].", (select precio from ingrediente where id_ingrediente='".$ing[0]."')) ";

	$query4="insert into pizza(id_pedido, id_ingrediente, subtotal) values((select id_pedido from pedido where LEFT(fecha, 18)=LEFT(NOW(), 18)), ".$ing[1].", (select precio from ingrediente where id_ingrediente='".$ing[1]."')) ";

	$query5="insert into pizza(id_pedido, id_ingrediente, subtotal) values((select id_pedido from pedido where LEFT(fecha, 18)=LEFT(NOW(), 18)), ".$ing[2].", (select precio from ingrediente where id_ingrediente='".$ing[2]."')) ";

	if ($ing[0]!="" && $ing[1]!="" && $ing[2]!="") {
		$query6="update pedido set subtotal=10.00, total=(subtotal*3) where id_pedido=(select a.id_pedido from pizza a inner join pedido b on(a.id_pedido=b.id_pedido) where LEFT(b.fecha, 18)=LEFT(NOW(), 18)) ";
	} elseif ($ing[0]!="" && $ing[1]!="" && $ing[2]=="") {
		$query6="update pedido set subtotal=10.00, total=(subtotal*2) where id_pedido=(select a.id_pedido from pizza a inner join pedido b on(a.id_pedido=b.id_pedido) where LEFT(b.fecha, 18)=LEFT(NOW(), 18)) ";
	} elseif ($ing[0]!="" && $ing[1]=="" && $ing[2]!="") {
		$query6="update pedido set subtotal=10.00, total=(subtotal*2) where id_pedido=(select a.id_pedido from pizza a inner join pedido b on(a.id_pedido=b.id_pedido) where LEFT(b.fecha, 18)=LEFT(NOW(), 18)) ";
	} elseif ($ing[0]=="" && $ing[1]!="" && $ing[2]!="") {
		$query6="update pedido set subtotal=10.00, total=(subtotal*2) where id_pedido=(select a.id_pedido from pizza a inner join pedido b on(a.id_pedido=b.id_pedido) where LEFT(b.fecha, 18)=LEFT(NOW(), 18)) ";
	}  elseif ($ing[0]=="" && $ing[1]=="" && $ing[2]!="") {
		$query6="update pedido set subtotal=10.00, total=(subtotal*1) where id_pedido=(select a.id_pedido from pizza a inner join pedido b on(a.id_pedido=b.id_pedido) where LEFT(b.fecha, 18)=LEFT(NOW(), 18)) ";
	} elseif ($ing[0]=="" && $ing[1]!="" && $ing[2]=="") {
		$query6="update pedido set subtotal=10.00, total=(subtotal*1) where id_pedido=(select a.id_pedido from pizza a inner join pedido b on(a.id_pedido=b.id_pedido) where LEFT(b.fecha, 18)=LEFT(NOW(), 18)) ";
	} elseif ($ing[0]!="" && $ing[1]=="" && $ing[2]=="") {
		$query6="update pedido set subtotal=10.00, total=(subtotal*1) where id_pedido=(select a.id_pedido from pizza a inner join pedido b on(a.id_pedido=b.id_pedido) where LEFT(b.fecha, 18)=LEFT(NOW(), 18)) ";
	}

	mysql_query($query1);
	mysql_query($query2);
	mysql_query($query3);
	mysql_query($query4);
	mysql_query($query5);
	mysql_query($query6);

	header("Location: ../view/menu.php?user=".$user);