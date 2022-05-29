 <?php
session_start();
if($_SESSION['nombre'] == ''){
	header("Location: index.php");
}
?>
<?php 

	$conexion=mysqli_connect('localhost','root','','restaurante');

 ?>

<html>
<head>
	<title>Lista de Administradores</title>
	<h3><a href="cerrarSesion.php">Cerrar Sesion</a></h3>
	<h3><a href="bienvenida.php">Menu</a></h3>
	<link rel="stylesheet" type="text/css" href="estiloAdmin.css">
	<script src = "jquery.js"></script>

	<script>
	function eliminaFilas(eliminado){
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
   	}

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

<h1 align="center">Administradores</h1> <br>

<h2 align="center"><a href="alta_administradores.php">Nuevo registro</a></h2> <br>
	<div id="main-container">
	<table class="administradores" border="1" align="center" valig="middle" id="ListaAdmi">
		<thead>
			<tr align="center" id="encabezado">
			<th>id</th>
			<th>nombre completo</th>
			<th>correo</th>
			<th>rol</th>	
			<th>Eliminar</th>
			<th>Detalles</th>
			<th>Editar</th>
		</tr>
		</thead>

		<?php 
		$sql="SELECT * from administradores where eliminado = 0";
		$resultado=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($resultado)){
		 ?>
		 <?php $rol = $mostrar['rol'];
		 $rol_txt = ($rol == 1) ?'Gerente' :'Ejecutivo';
		 ?>
		<tr id="fila<?php echo $mostrar['id']?>">
			<td><?php echo $mostrar['id'] ?></td>
			<td><?php echo $mostrar['nombre'] ?> <?php echo $mostrar['apellidos'] ?></td>
			<td><?php echo $mostrar['correo'] ?></td>
			<td><?php echo $rol_txt ?></td>
			<td> <button type="button" name="button" onclick="eliminaFilas(<?php echo $mostrar['id'] ?>);">Eliminar registro</button></td>
			<td><a href="administradores_detalle.php?id=<?php echo $mostrar['id']?>">Ver detalles</a></td>
			<td><a href="editar_administradores.php?id=<?php echo $mostrar['id']?>">Editar</a></td>
			
		</tr>
	<?php
	}
	 ?>
	</table>
	</div>
<div id="mensaje"></div>
</body>
</html>