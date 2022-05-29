<?php
require "funciones/conecta.php";
$con = conecta();
//Recibir datos
$id = $_POST['id_sel'];
$nombre = $_POST ['nombre'];
$apellidos = $_POST ['apellidos'];
$correo = $_POST ['correo'];
$pass = $_POST ['password'];
$rol = $_POST ['rol'];

//Consultar para insertar
if ( !empty($_REQUEST['password'])){
    //$passEnc = md5($password);
    $sql = "UPDATE administradores SET nombre='$nombre', apellidos='$apellidos', correo='$correo', pass='$pass', rol=$rol WHERE id=$id";
  }else{
    $sql = "UPDATE administradores SET nombre='$nombre', apellidos='$apellidos', correo='$correo', rol=$rol WHERE id=$id";
  }

/*$sql = "UPDATE administradores set 
    nombre='$nombre', apellidos='$apellidos', correo='$correo', rol=$rol 
    WHERE id = $id";*/

//Ejecutar consulta
$res = $con->query($sql);
echo $res;

//Cerrar conexion
header("location:AdministradoresLista.php");
//echo $sql;
?>