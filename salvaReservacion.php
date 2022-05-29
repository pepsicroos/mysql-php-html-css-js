<?php
require "funciones/conecta.php";
$con = conecta();
//Recibir datos
$nombre = $_POST['nombre'];
$fecha = $_POST ['fecha'];
$tiempo = $_POST ['tiempo'];
$personas = $_POST ['personas'];


//Consultar para insertar
$sql = "INSERT INTO reservaciones
		(fecha, tiempo, personas, nombre)
		VALUES ('$fecha', '$tiempo', '$personas', '$nombre')";

//Ejecutar consulta
$res = $con->query($sql);

//Cerrar conexion
//header("CodigoQr.php");
//echo $sql;
require 'CodigoQr/phpqrcode/qrlib.php';

	$dir = 'temp/';

	if(!file_exists($dir))
		mkdir($dir);

	$filename = $dir.$nombre.'.png';

	$tamanio = 10;
	$level = 'M';
	$frameSize = 3;
	$contenido = 'Nombre: '.$nombre.' Fecha:'.$fecha.' Hora:'.$tiempo.' Numero de personas:'.$personas;

	QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);
	echo '<img src="'.$filename.'" />';

?>

<a href="index.php">Regresar Pagina Principal</a>
