<?php
require "funciones/conecta.php";
$con = conecta();
//Recibir datos
$nombre = $_POST ['nombre'];
$apellidos = $_POST ['apellidos'];
$correo = $_POST ['correo'];
$pass = $_POST ['password'];
$rol = $_POST ['rol'];
//$pass = md5($pass);

//Consultar para insertar
$sql = "INSERT INTO administradores
		(nombre, apellidos, correo, pass, rol)
		VALUES ('$nombre', '$apellidos', '$correo', '$pass', $rol)";

//Ejecutar consulta
$res = $con->query($sql);

//Cerrar conexion
header("location:AdministradoresLista.php");
//echo $sql;
?>