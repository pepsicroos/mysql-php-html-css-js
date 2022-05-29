
<html>
<head>
	<title>Lista de Reservaciones</title>
	<h3><a href="cerrarSesion.php">Cerrar Sesion</a></h3>
	<h3><a href="bienvenida.php">Menu</a></h3>
	<link rel="stylesheet" type="text/css" href="estiloAdmin.css">
	<script src = "jquery.js"></script>

	<script>
	function eliminaFilas(eliminado){
		if(confirm("¿Desea eliminar el usuario?") == true){
			$.ajax({
			   url       :   'elimina_reservaciones.php',
			   type      :   'post',
			   dataType  :   'text',
	           data      :   'id='+eliminado,
			   success   :   function(res) {
				//alert(res);
				$('#fila'+ eliminado).hide();
				}, error : function(){
					alert('Error, archivo no encontrado');
				}
				
			});
		}
   	}
	</script>
</head>

<body>

<h1 align="center">Reservaciones</h1> <br>

	<div id="main-container">
	<table class="administradores" border="1" align="center" valig="middle" id="ListaAdmi">
		<thead>
			<tr align="center" id="encabezado">
			<th>id</th>
			<th>nombre</th>
			<th>fecha</th>
			<th>hora</th>
			<th>personas</th>
			<th>eliminar</th>
		</tr>
		</thead>

		<?php 
		require "./funciones/conecta.php";
 		$con=conecta();
		$sql="SELECT * from reservaciones where eliminado = 0";
		$resultado=$con->query($sql);

		while($mostrar=mysqli_fetch_array($resultado)){
		 ?>
		 <?php $id = $mostrar['id'];
		 ?>
		<tr id="fila<?php echo $mostrar['id']?>">
			<td><?php echo $mostrar['id'] ?></td>
			<td><?php echo $mostrar['nombre'] ?></td>
			<td><?php echo $mostrar['fecha'] ?></td>
			<td><?php echo $mostrar['tiempo'] ?></td>
			<td><?php echo $mostrar['personas'] ?></td>
			<td> <button type="button" name="button" onclick="eliminaFilas(<?php echo $mostrar['id'] ?>);">Eliminar registro</button></td>
			
		</tr>
		<?php
		}
	 	?>
	</table>
	</div>
<div id="mensaje"></div>
</body>
</html>