
<link rel="stylesheet" type="text/css" href="estiloDetalle.css">
<h1><a href="AdministradoresLista.php">Regresar</a></h1> <br>
<h3><a href="cerrarSesion.php">Cerrar Sesion</a></h3>
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
$rol = $row ['rol'];
$rol_txt = ($rol==1) ? 'Gerente' :'Ejecutivo';

//echo $imagen;

?>
<div id="main-container">
<table class="administradores" border="1" align="center" valig="middle" id="Admi">
    <thead>
        <tr align="center" id="encabezado">
            <td>id</td>
            <td>nombre</td>
            <td>apellido</td>
            <td>correo</td>
            <td>rol</td>    
        </tr>
    </thead>
        <tr id="fila<?php echo $mostrar['id']?>">
            <td><?php echo $id ?></td>
            <td><?php echo $nombre ?></td>
            <td><?php echo $apellidos ?></td>
            <td><?php echo $correo ?></td>
            <td><?php echo $rol_txt ?></td>
        </tr>
    </table>
</div>