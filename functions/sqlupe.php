<?php

	mysql_connect("localhost", "root", "laboratorio");
	mysql_select_db(pizza);

	$user=$_POST["user"];
	$pedido=$_POST["pedido"];
	$especialidad=$_POST["especialidad"];
	$extra=$_POST["extra"];
	$tamano=$_POST["tamano"];
	$cantidad=$_POST["cantidad"];

	if($tamano==""){
		$query="update pedido set id_especialidad='".$especialidad."', id_extra='".$extra."', id_tamano='1', cantidad='".$cantidad."', subtotal=(select precio from extra where id_extra='".$extra."'), total=((cantidad*subtotal)) where id_pedido='".$pedido."' ";
	} else {
		$query="update pedido set id_especialidad='".$especialidad."', id_extra='".$extra."', id_tamano='".$tamano."', cantidad='".$cantidad."', subtotal=(select precio from tamano where id_tamano='".$tamano."'), total=((cantidad*subtotal)+(select precio from extra where id_extra='".$extra."')) where id_pedido='".$pedido."' ";
	}

	mysql_query($query);

	header('Location: ../view/order.php?user='.$user);
