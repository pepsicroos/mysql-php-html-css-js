<html>
<head>
	<title>Lista de Contacto</title>
	<h3><a href="cerrarSesion.php">Cerrar Sesion</a></h3>
	<h3><a href="bienvenida.php">Menu</a></h3>
	<link rel="stylesheet" type="text/css" href="estiloAdmin.css">
	<script src = "jquery.js"></script>
</head>

<body>

<h1 align="center">Contacto</h1> <br>

	<div id="main-container">
	<table class="administradores" border="1" align="center" valig="middle" id="ListaAdmi">
		<thead>
			<tr align="center" id="encabezado">
			<th>nombre</th>
			<th>correo</th>
			<th>telefono</th>
			<th>mensaje</th>
		</tr>
		</thead>

		<?php 
		require "./funciones/conecta.php";
 		$con=conecta();
		$sql="SELECT * from contacto";
		$resultado=$con->query($sql);

		while($mostrar=mysqli_fetch_array($resultado)){
		 ?>
		 <?php $id = $mostrar['nombre'];
		 ?>
		<tr>
			<td><?php echo $mostrar['nombre'] ?></td>
			<td><?php echo $mostrar['correo'] ?></td>
			<td><?php echo $mostrar['telefono'] ?></td>
			<td><?php echo $mostrar['mensaje'] ?></td>
			
		</tr>
		<?php
		}
	 	?>
	</table>
	</div>
<div id="mensaje"></div>
</body>
</html>