<?php
 	require "./funciones/conecta.php";
 	$con=conecta();

  $correo = $_POST['correo'];
  $pass   = $_POST['pass'];
  //$passEnc = md5($pass);
  
  session_start();
  //$_SESSION['$correo']=$correo;

	$sql = "SELECT * FROM clientes
			WHERE correo='$correo' AND pass = '$pass'";
	$res = $con->query($sql);
	$fila = $res->num_rows;
	echo $fila;

	$row = $res->fetch_array();
	//$nombre = $row['nombre'].' '.$row['apellidos'];;
	if ($fila == 1) {
		$_SESSION['correo'] = $correo;
	}

?>