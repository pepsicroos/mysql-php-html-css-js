

<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">
  <head>
    <script src = "jquery.js"></script>
    <meta charset="utf-8" />
    <title>FIND FOOD</title>
    <link rel="stylesheet" href="styleLog.css" />


    <script>
    function validaDatos(){
    var nombre = document.Forma01.nombre.value;
    var apellidos = document.Forma01.apellidos.value;
    var correo = document.Forma01.correo.value;
    var password = document.Forma01.password.value;

    if (nombre != "" && apellidos != "" && correo != "" && password !="") {
        //alert('Todos los campos han sido llenados');
        document.Forma01.method = "POST";
        document.Forma01.action = "salva_clientes.php";
        document.Forma01.submit();
    }
    else{
        $('#mensaje2').html('Faltan campos por llenar');
        setTimeout("$('#mensaje2').html('');", 5000);
    }
}

function validaMail(){
    var correo = $('#correo').val();
    $.ajax({
      url      : 'correo_clientes.php',
      type     : 'post',
      dataType : 'text',
      data     : 'correo='+correo,
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


</script>

  </head>
  <body>
    <div class="center">
      <h1>Registro</h1>
      <h3><a href="cerrarSesion.php">Cerrar Sesion</a></h3>
      <form name="Forma01" action="salva_clientes.php" method="post" align="center" id="registro">
        <div class="txt_field">
          <input type="text" name="nombre" id="nombre"  required />
         <span></span>
          <label>Nombre</label>
        </div>
        <div class="txt_field">
         
          <div><input type="text" name="apellidos" id="apellidos"  required></div>
          <span></span>
          <label>Apellidos</label>
        </div>
        <div class="txt_field">
          <input type="text" name="correo" id="correo"  onFocus="limpiaCampo();" onBlur="validaMail();" required />
           <div id="mensaje1" class="error"></div>
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password"  required />
          <span></span>
          <label>Contraseña</label>
        </div>
        <input type="submit"  onclick="validaDatos(); return false;" value="Registrate" />
        
        <div class="signup_link">
          <a href="index.php">Regresar al menu principal...</a>
        </div>
      </form>
    </div>
  </body>
</html>
