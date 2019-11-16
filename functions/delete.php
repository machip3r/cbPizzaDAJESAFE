<?php

	mysql_connect("localhost", "root", "laboratorio");
	mysql_select_db(pizza);

	$pedido=$_GET["pedido"];
	$user=$_GET["user"];

	$query="delete from pedido where id_pedido='".$pedido."' ";

	mysql_query($query);

	header("Location: ../view/order.php?user=".$user);