<?php

	$user=$_GET["user"];

	mysql_connect("localhost", "root", "laboratorio");
	mysql_select_db(pizza);

	$query1="delete from pedido where id_cliente=(select id_cliente from cliente where usuario='".$user."') ";
	$query2="delete from pizza ";

	mysql_query($query1);
	mysql_query($query2);

	header("Location: ../index.html");
?>