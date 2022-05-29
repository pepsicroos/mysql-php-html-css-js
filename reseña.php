<!DOCTYPE html>
<html lang="en">
<head>
    <title>FIND FOOD</title>
    <!-- GOOGLE FONTs -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <script src = "jquery.js"></script>
</head>
<body>
            <style>
            body{ 
                background-size: 100vw 100vh;
                background-attachment: fixed;
                background-color: #88b0da;
                margin:0;
            }
            form{
                width: 450px;
                height: 560px;
                margin: auto;
                background: rgba(0,0,0,0.4);
                padding: 10px 20px;
                box-sizing: border-box;
                margin-top: -80px;
                border-radius: 7px;
            }
            h2{ 
                color: rgb(255, 255, 255);
                text-align: center;
                margin: 0;
                font-size: 30px;
                margin-bottom: 20px;
            }
            input, textarea { 
                width: 100%;
                margin-bottom: 20px;
                box-sizing: border-box; 
                font-size: 17px;
                border: none;
            }
        
            textarea{ 
                min-height: 50px;
                max-height: 200px; 
                max-width: 100%;   
            }
            #boton{ 
                background: #4d927b;
                color: #fff;
                padding: 20px;
            }
            #boton:hover{ 
                cursor: pointer;
            }
        
            @media (max-width:480px){ 
                form{ 
                width: 100%;
                }
            }
            h1{ 
                text-align: center;
                color: #fff;
                font-size: 40px;
                background: rgba(0,0,0,0.4);
            }
            h3{
                color: #fff;
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            }   
            .reg{
                text-align: center;
            }
            </style>
            <script>

           /* function validaDatos(){

                var nombre = document.Forma01.nombre.value;
                var correo = document.Forma01.correo.value;
                var mensaje = document.Forma01.mensaje.value;

                if ( nombre != "" && correo != "" && mensaje != "") {
              $('#mensaje2').html('Campos llenos');
              setTimeout("$('#mensaje2').html('');", 5000);
                    document.Forma01.method = "POST";
                    document.Forma01.action = "comentarios.php";
                    document.Forma01.submit();
                }
                else{
                    $('#mensaje2').html('Faltan campos por llenar');
                    setTimeout("$('#mensaje2').html('');", 5000);
                }
            }*/
            
           function validaMail(){

                var correo = $('#correo').val();
                $.ajax({
                      url      : 'correoComentarios.php',
                      type     : 'post',
                      dataType : 'text',
                      data     : 'correo='+correo,
                      success  : function(res){
                       // alert(res);
                    if(res == 1 ){
                      //alert('Hola');
                      document.Forma01.method = "POST";
                      document.Forma01.action = "comentarios.php";
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
            <br><br><br><br><br><br><form name="Forma01" action="comentarios.php" method="post">
                <h2>RESEÑA</h2>
                <h3>Nombre</h3>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
                <h3>Correo</h3>
                <input type="text" name="correo" id="correo" placeholder="Correo" required>
                <div id="mensaje1" class="error"></div>
                <h3>Mensaje</h3>
                <textarea name="mensaje" id="mensaje" placeholder="Escriba aqui su mensaje..." required></textarea>
                <input type="submit" value="ENVIAR" id="boton" onclick="validaMail();return false;"></br>
                <a href="valoracion.php" id="reg">Ver reseñas</a> 
                <br>
                <a href="index.php" id="reg">Regresar al menu principal...</a>
                </form>
            </br>
</body>
</html>