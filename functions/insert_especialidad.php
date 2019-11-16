<?php

	$pizza=$_POST["pizza"];
	$user=$_POST["user"];

	mysql_connect("localhost", "root", "laboratorio");
	mysql_select_db(pizza);

	if ($pizza=="") {
		$query="insert into pedido(id_cliente, id_especialidad, id_tamano, id_extra, cantidad, subtotal, total, fecha) values((select id_cliente from cliente where usuario='".$user."'), 1, 1, 1, 1, '73.00', ((cantidad*subtotal)+(select precio from extra where id_extra='1')), NOW()) ";
	} else {
		$query="insert into pedido(id_cliente, id_especialidad, id_tamano, id_extra, cantidad, subtotal, total, fecha) values((select id_cliente from cliente where usuario='".$user."'), ".$pizza.", 3, 1, 1, '73.00', ((cantidad*subtotal)+(select precio from extra where id_extra='1')), NOW()) ";
	}

	mysql_query($query);