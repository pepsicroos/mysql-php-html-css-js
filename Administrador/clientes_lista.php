<?php
//administradores_lista.php
require "funciones/conecta.php";
$con = conecta();

$sql = "SELECT *FROM clientes";
$res = $con->query($sql);

while($row = $res->fetch_array()){
	$id = $row ["id"];
	$nombre = $row ["nombre"];
	$apellidos = $row ["apellidos"];
	echo "$id $nombre $apellidos &nbsp;&nbsp;&nbsp;";
	echo "<br>";
}

?>