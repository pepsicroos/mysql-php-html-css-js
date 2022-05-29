<?php
require "funciones/conecta.php";
$con = conecta();
//Recibir datos
$nombre = $_POST ['nombre'];
$apellidos = $_POST ['apellidos'];
$correo = $_POST ['correo'];
$pass = $_POST ['password'];
//$pass = md5($pass);


//Consultar para insertar
$sql = "INSERT INTO clientes
		(nombre, apellidos, correo, pass)
		VALUES ('$nombre', '$apellidos', '$correo', '$pass')";

//Ejecutar consulta
$res = $con->query($sql);

//Cerrar conexion
header("location:index.php");
//echo $sql;
?>