<?php

	$boton=$_POST["boton"];
	$user=$_POST["user"];
	$password=$_POST["password"];

	mysql_connect("localhost", "root", "laboratorio");
	mysql_select_db(pizza);

	if ($boton == "i") {
		$query="select usuario, contrasena from cliente where usuario='".$user."' and contrasena='".$password."' ";
		$query2="insert into visita(visita) values('COMPRA') ";
	} elseif ($boton == "r") {
		$query2="insert into visita(visita) values('COMPRA') ";
		$cliente=$_POST["cliente"];
		$domicilio=$_POST["domicilio"];
		$telefono=$_POST["telefono"];
		if ($telefono == "") {
			$query="insert into cliente(usuario, contrasena, cliente, domicilio) values('".$user."', '".$password."', '".$cliente."', '".$domicilio."') ";
		} else {
		$query="insert into cliente(usuario, contrasena, cliente, domicilio, telefono) values('".$user."', '".$password."', '".$cliente."', '".$domicilio."', '".$telefono."') ";
		}
	}

	if ($boton == "i") {
		$rs= mysql_query($query);
		$row=mysql_fetch_object($rs);
		$nr = mysql_num_rows($rs);

		if($nr == 0){
			header('Location: ../index.html');
		} else if($nr == 1) {
     		header("Location: ../view/menu.php?user=".$user);
			mysql_query($query2);
		}
	} elseif ($boton == "r") {
		mysql_query($query);
		mysql_query($query2);
     	header("Location: ../view/menu.php?user=".$user);
	}