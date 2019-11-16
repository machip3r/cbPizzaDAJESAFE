<?php

	mysql_connect("localhost", "root", "laboratorio");
	mysql_select_db(pizza);

	$user=$_POST["user"];
	$pizza=$_POST["pizza"];
	$ing=$_POST["cb"];

	$query1="update pizza set id_ingrediente='".$ing[0]."' where id_pizza='".$pizza."' ";

	$query2="update pizza set id_ingrediente='".$ing[1]."' where id_pizza='".$pizza."' ";

	$query3="update pizza set id_ingrediente='".$ing[2]."' where id_pizza='".$pizza."' ";

	mysql_query($query1);
	mysql_query($query2);
	mysql_query($query3);

	header('Location: ../view/order.php?user='.$user);