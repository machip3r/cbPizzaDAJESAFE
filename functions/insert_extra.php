<?php

	$extra=$_POST["extra"];
	$user=$_POST["user"];

	mysql_connect("localhost", "root", "laboratorio");
	mysql_select_db(pizza);

	$query="insert into pedido(id_cliente, id_especialidad, id_tamano, id_extra, cantidad, subtotal, total, fecha) values((select id_cliente from cliente where usuario='".$user."'), 1, 1, ".$extra.", 1, (select precio from extra where id_extra='".$extra."'), (cantidad*(select precio from extra where id_extra='".$extra."')), NOW()) ";


	mysql_query($query);
