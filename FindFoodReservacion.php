<?php
session_start();
if($_SESSION['correo'] == ''){
	header("Location: log_in.php");
}
?>
<html>

<head>
	<script src = "jquery.js"></script>

	<script>

	function validaFecha(){

		var fecha = $('#fecha').val();
		var tiempo   = $('#tiempo').val();
		//alert('hola');
		$.ajax({
          url      : 'VerificarFindFood.php',
          type     : 'post',
          dataType : 'text',
          data     : 'fecha='+fecha+'&tiempo='+tiempo,
          success  : function(res){
            //alert(res);
			  if(res == 1 ){
          $('#mensaje1').html('El horario '+tiempo+'ya se encuentra ocupado');
          $('#fecha').val("");
          $('#tiempo').val("");
          setTimeout("$('#mensaje1').html('');", 5000);

			  }else{
          document.Forma01.method = "POST";
					document.Forma01.action = "salvaReservacion.php";
					document.Forma01.submit();

        }
         },error : function(){
              alert('Usuario no existe');
            }
        });
	}

	function limpiaCampo(){
		$('#mensaje1').html('');
	}

	function valorRol(){
		var rol = $('#rol').val();
	}

	</script>

	<style>
	.error{
		display:inline;
		color:#FF0000;
	}
	</style>
	<link rel="stylesheet" href="style_reservation.css" />

</head>

<body>


<div class="center"> 
<h1>RESERVACION</h1>
<a href="index.php">Regresar Pagina Principal</a>
	<h3><a href="cerrarSesion.php">Cerrar Sesion</a></h3>
	<form name="Forma01" action="salvaReservacion.php" method="post" align="center">
    
	<div class="txt_field">
	<div for="fecha">Fecha reservacion:</div>
	<div>
	<input type="date" id="fecha" name="fecha">
	</div><br>
	
	
	<br>
	</div>

	<div class="txt_field ">
    <div> Horarios </div>
	<select name="tiempo" id="tiempo">
      <option value="0">selecciona</option>
      <?php
      	$start=9;
      	$end=10;
        for($i=1;$i<=9;$i++){
          echo "<option value=\"$start:00-$end:00\">$start:00-$end:00</option>";
           $start= $start + 1;
           $end= $end + 1;
        }
      ?>
    </select><br><br>
	
    <label style="position: absolute; top: 10%; left: 5px;color: #adadad; transform: translateY(-150%); font-size: 16px;pointer-events: none;
	transition: .5s;" for="appt">Hora:</label>
    
	<small>Horario de 9am a 6pm</small><br><br>
	</div>

   
	<div class="txt_field ">
	<div> Numero de Personas </div>
	<select name="personas" id="personas">
      <option value="0">selecciona</option>
      <?php
        for($i=1;$i<=10;$i++){
          echo "<option value=\"$i\">$i</option>";
        }
      ?>
    </select><br><br>
	<span></span>
	
	</div>
    <label>Ingrese de nuevo su nombre</label><br>
    <input type="text" name="nombre" id="nombre"><br><br><br>

    <input type="submit" value="CONFIRMAR" onclick="validaFecha(); return false" /><br><br>
    <div id="mensaje1" class="error" align="right"></div><br>
 		<input type="hidden" id="id_sel" name="id_sel" value="0" />
    </form>
	</div>

</body>

</html>
