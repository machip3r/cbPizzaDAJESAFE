<?php 

	$pizza=$_GET["pizza"];
	$user=$_GET["user"];

	mysql_connect("localhost", "root", "laboratorio");
	mysql_select_db(pizza);

	$query="delete from pizza where id_pedido='".$pizza."' ";
	$query2="delete from pedido where id_pedido='".$pizza."' ";

	mysql_query($query);
	mysql_query($query2);

	header("Location: ../view/menu.php?user=".$user);