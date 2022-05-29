<?php
require "funciones/conecta.php";
$con = conecta();
//Recibir datos
$nombre = $_POST ['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];


//Consultar para insertar
$sql = "INSERT INTO contacto
		(nombre, correo, telefono, mensaje)
		VALUES ('$nombre', '$correo', '$telefono', '$mensaje')";

//Ejecutar consulta
$res = $con->query($sql);

//Cerrar conexion
header("location:index.php");
//echo $sql;
?>
