
<html>
<head>
	<title>Lista de Clientes</title>
	<h3><a href="cerrarSesion.php">Cerrar Sesion</a></h3>
	<h3><a href="bienvenida.php">Menu</a></h3>
	<link rel="stylesheet" type="text/css" href="estiloAdmin.css">
	<script src = "jquery.js"></script>
</head>

<body>

<h1 align="center">Clientes</h1> <br>

	<div id="main-container">
	<table class="administradores" border="1" align="center" valig="middle" id="ListaAdmi">
		<thead>
			<tr align="center" id="encabezado">
			<th>id</th>
			<th>nombre completo</th>
			<th>correo</th>
			<th>Detalles</th>
		</tr>
		</thead>

		<?php 
		require "./funciones/conecta.php";
 		$con=conecta();
		$sql="SELECT * from clientes";
		$resultado=$con->query($sql);

		while($mostrar=mysqli_fetch_array($resultado)){
		 ?>
		 <?php $id = $mostrar['id'];
		 ?>
		<tr>
			<td><?php echo $mostrar['id'] ?></td>
			<td><?php echo $mostrar['nombre'] ?> <?php echo $mostrar['apellidos'] ?></td>
			<td><?php echo $mostrar['correo'] ?></td>
			<td><a href="clientes_detalle.php?id=<?php echo $mostrar['id']?>">Ver detalles</a></td>
			
		</tr>
		<?php
		}
	 	?>
	</table>
	</div>
<div id="mensaje"></div>
</body>
</html>