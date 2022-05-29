<?php

	require "funciones/conecta.php";
	$con=conecta();

	$tiempo   = $_POST['tiempo'];
	$fecha   = $_POST['fecha'];

	$sql = "SELECT * FROM reservaciones
			WHERE tiempo = '$tiempo' AND fecha='$fecha' ";
	$res = $con->query($sql);
	$fila = $res->num_rows;
	echo $fila;

?>