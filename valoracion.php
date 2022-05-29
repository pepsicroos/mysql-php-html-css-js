
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src = "jquery.js"></script>
	<title>Valoracion</title>
</head>
<style>
	#reseña{
		background-color: #246355;	
		text-align: left;
		width: 600px;
		margin: 150px;
		padding: 20px;
		border-collapse: collapse;
	}
	*{
		background-color: #0082b4;
		font-family: Arial;
	}
	.tabla1{
		background-color: white;
		width: 70%;
	}
	.cabe{
		background-color: #246355;
		border-bottom: solid 5px #0F362D;
		color: white;
	}
</style>
<body>
	<a href="index.php">Regresar a pagina principal</a>
	<div id="main-container">
	<table border="1" align="center" valig="middle">
		<thead class="cabe" id="cabe">
			<tr align="center" id="encabezado">
			<th class="reseña" id="reseña">nombre</th>
			<th class="reseña" id="reseña">comentario</th>
		</tr>
		</thead>

		<?php 
		require "./funciones/conecta.php";
 		$con=conecta();
		$sql="SELECT nombre, mensaje FROM comentarios";
		$resultado=$con->query($sql);

		while($mostrar=mysqli_fetch_array($resultado)){
		 ?>
		 <?php $nombre = $mostrar['nombre'];
		 ?>
		<tr>
			<td><?php echo $mostrar['nombre'] ?></td>
			<td><?php echo $mostrar['mensaje'] ?></td>
			
		</tr>
		<?php
		}
	 	?>
	</table>
	</div>

</body>
</html>