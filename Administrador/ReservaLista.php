
<html>
<head>
	<title>Lista de Clientes</title>
	<h3><a href="cerrarSesion.php">Cerrar Sesion</a></h3>
	<link rel="stylesheet" type="text/css" href="estiloAdmin.css">
	<script src = "jquery.js"></script>

	<script>
	/*function eliminaFilas(eliminado){
		if(confirm("¿Desea eliminar el usuario?") == true){
			$.ajax({
			   url       :   'elimina_administradores.php',
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
   	}*/

   	/*function detalles(persona){
   		$.ajax({
			   url       :   'administradores_detalle.php',
			   type      :   'post',
			   dataType  :   'text',
	           data      :   'id='+persona,
			   success   :   function(res) {
				//alert(res);
				$('#fila');
				}, error : function(){
					alert('Error, archivo no encontrado');
				}
				
			});
   	}*/
	</script>
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