<?php
session_start();
if($_SESSION['nombre'] == ''){
	header("Location: index.php");
}
?>
<?php
//admimistradores_detalle.php
require "./funciones/conecta.php";
$con = conecta();
$id = $_REQUEST['id'];

$sql = "SELECT *
		FROM administradores
		WHERE id = $id";

$res = $con->query($sql);
$row = $res->fetch_assoc();

$nombre = $row ['nombre'];
$apellidos = $row ['apellidos'];
$correo = $row ['correo'];
$rol = $row['rol'];
$rol_txt = ($rol==1) ? 'Gerente' :'Ejecutivo';
//$imagen = $row['archivo_n'];

?>

<html>

<head>
	<title>Edicion Administradores</title>
	<script src = "jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="estiloAlta.css">

	<script>

	function validaDatos(){
		var nombre = document.Forma01.nombre.value;
		var apellidos = document.Forma01.apellidos.value;
		var correo = document.Forma01.correo.value;
		var password = document.Forma01.password.value;
		var rol = document.Forma01.rol.value;

		if (nombre != "" && apellidos != "" && correo != "" && rol != 0) {
			//alert('Todos los campos han sido llenados');
			document.Forma01.method = "POST";
			document.Forma01.action = "salvaEditar_admin.php";
			document.Forma01.submit();
		}
		else{
			$('#mensaje2').html('Faltan campos por llenar');
			setTimeout("$('#mensaje2').html('');", 5000);
		}
	}
	
	function validaMail(){
		var correo = $('#correo').val();
		var id = $('#id_sel').val();
		$.ajax({
          url      : 'correoEditar_admi.php',
          type     : 'post',
          dataType : 'text',
          data     : 'correo='+correo+'&id_sel='+id,
          success  : function(res){
			  //alert(res);
			  if(res == 1){
              $('#mensaje1').html('El correo '+correo+' ya existe');
              $('#correo').val("");
              setTimeout("$('#mensaje1').html('');", 5000);
			  }
            },error : function(){
              alert('Error archivo no encontrado');
            }
        });
	}
	
	function limpiaCampo(){
		$('#mensaje1').html('');
	}
	
	function valorRol(){
		var rol = $('#rol').val();
		//alert(rol);
	}
	
	</script>

	<style>
	.error{
		display:inline;
		color:#dc0a00;
	}
	</style>


	</head>

<body>
	<h2><a href="AdministradoresLista.php">Regresar</a></h2> <br>
	<h3><a href="cerrarSesion.php">Cerrar Sesion</a></h3>


	<form name="Forma01" action="salvaEditar_admin.php" method="post" align="center" id="editar"enctype="multipart/form-data" class="form-register">
		<h1 align="center">Edicion Administradores</h1> <br>
      <input type="text" name="nombre" id="nombre" class="controls" placeholder="Escribe tu nombre" value="<?php echo $nombre;?>"/> <br>
			<input type="text" name="apellidos" id="apellidos" class="controls" placeholder="Escribe tus apellidos" value="<?php echo $apellidos;?>"/> <br>
			<input type="text" name="correo" id="correo" class="controls" placeholder="Escribe tu correo" onFocus="limpiaCampo();" onBlur="validaMail();" value="<?php echo $correo;?>"/> <br>
			<div id="mensaje1" class="error"></div><br>
            <input type="password" name="password" id="password" class="controls" placeholder="Escribe tu contrasena" /><br>
            <select name="rol" id="rol" onChange="valorRol();" value="<?php echo $rol;?>">
                <option value="<?php echo $rol;?>" selected="selected"><?php echo $rol_txt;?></option>
            		<option value="0">Seleccionar</option>
                <option value="1">Gerente</option>
                <option value="2">Ejecutivo</option>
            </select><br><br>
            <input type="submit" value="Actualizar" class="botons" onclick="validaDatos(); return false;" /><br>	
            <div id="mensaje2" class="error"></div><br>
			<input type="hidden" id="id_sel" name="id_sel" value="<?php echo $id;?>" />
    </form>

</body>

</html>