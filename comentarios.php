<?php
require "funciones/conecta.php";
$con = conecta();
//Recibir datos
$nombre = $_POST ['nombre'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];


//Consultar para insertar
$sql = "INSERT INTO comentarios
		(nombre, correo, mensaje)
		VALUES ('$nombre', '$correo', '$mensaje')";

//Ejecutar consulta
$res = $con->query($sql);

//Cerrar conexion
header("location:valoracion.php");
echo $sql;
?>
