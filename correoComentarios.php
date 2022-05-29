<?php
 	require "funciones/conecta.php";
 	$con=conecta();
 
	$correo = $_POST['correo'];

	$sql = "SELECT * FROM clientes 
			WHERE correo = '$correo'"; 
	$res = $con->query($sql);
	$fila = $res->num_rows;
	echo $fila;

?>