<?php
session_start();
if(isset($_SESSION['correo'])){
  header("Location: FindFoodReservacion.php");
}
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>FIND FOOD</title>
    <link rel="stylesheet" href="styleLog.css" />
    <html>

<head>
  <script src = "jquery.js"></script>
  <link rel="stylesheet" type="text/css" href="estiloIndex.css">

  <script>

  function validaDatos(){

    var correo = document.Forma01.correo.value;
    var password = document.Forma01.pass.value;

    if ( correo != "" && password !="") {
      $('#mensaje2').html('Campos llenos');
      setTimeout("$('#mensaje2').html('');", 5000);
      document.Forma01.method = "POST";
      document.Forma01.action = "FindFoodReservacion.php";
      document.Forma01.submit();
    }
    else{
      $('#mensaje2').html('Faltan campos por llenar');
      setTimeout("$('#mensaje2').html('');", 5000);
    }
  }

  function validaMail(){

    var correo = $('#correo').val();
    var pass   = $('#pass').val();
    $.ajax({
          url      : 'correoInicio.php',
          type     : 'post',
          dataType : 'text',
          data     : 'correo='+correo+'&pass='+pass,
          success  : function(res){
            //alert(res);
        if(res == 1 ){
          //alert('Hola');
          document.Forma01.method = "POST";
          document.Forma01.action = "FindFoodReservacion.php";
          document.Forma01.submit();

        }else{
          $('#mensaje1').html('El usuario no existe');
          setTimeout("$('#mensaje1').html('');", 5000);

        }
            },error : function(){
              alert('Usuario no existe');
            }
        });
  }

  function limpiaCampo(){
    $('#mensaje1').html('');
  }

  </script>

  <style>
  .error{
    display:inline;
    color:#FF0000;
  }
  </style>
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      <form name="Forma01" method="post" action="FindFoodReservacion.php">
        <div class="txt_field">
          <input type="text" name="correo" id="correo" required />
          <span></span>
          <label>Usuario</label>
        </div>
        <div class="txt_field">
          <input type="password" name="pass" id="pass" required />
          <span></span>
          <label>Contraseña</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" onclick="validaMail();return false;" value="Iniciar sesion" />
        <div id="mensaje1" class="error"></div>
        <div class="signup_link">
          No eres miembro? <a href="alta_clientes.php">Registrate</a>
        </div>
        <div class="signup_link">
          <a href="index.php">Regresar al menu principal...</a>
        </div>
      </form>
    </div>
  </body>
</html>
