<?php
      include_once 'conexion.php';
 
     if(isset($_POST['guardar'])){
         $idPerfil=$_POST['idPerfil'];
         $nombrePerfil=$_POST['nombrePerfil'];

     if(!empty($idPerfil) && !empty($nombrePerfil)){

      echo ($idPerfil."-".$nombrePerfil);

          $consulta_insert=$con->prepare('INSERT INTO perfil (idPerfil, nombrePerfil) VALUES(:idPerfil, :nombrePerfil)');
          
          $consulta_insert->execute(array(
          ':idPerfil' =>$idPerfil,
          ':nombrePerfil' =>$nombrePerfil
          ));
          header('Location: index.php'); 
        }
       }
    ?>

<!DOCTYPE html>
<html>
  <head>
    <title>NUEVO PERFIL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <meta name="description" content="website description" />
    <meta name="keywords" content="website keywords, website keywords" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  </head>

  <body style="background-color:#C1EDE6;">
   <div >
      <div class=" text-center ">
        <h2><i>REGISTRAR PERFIL</i></h2> <br> 
        <form id="form" name="form" action="" method="post" onsubmit="return validar()">
          
            <div class="p-2 g-col-6 " >
            <input type="text" id="idPerfil" name="idPerfil" placeholder="Codigo Perfil" class="border border-info" onkeypress="return validarNumero(event)" ><br>
            </div> 
            <div class="p-2 g-col-6" >
              <input type="text" id="nombrePerfil" name="nombrePerfil" placeholder="Nombre Perfil" class="border border-warning" onkeypress="return sololetras(event)" >
              </div>
            </div>
            <div class="text-center ">
            <a href="index.php" class="btn btn-success" >Cancelar</a>
            <input type="submit" name="guardar" value="Guardar" class="btn btn-info">
            </div>

        </form>
     </div>
    <div align="justify"></div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
    function validarNumero(e){
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true;
            patron =/[0-9]/;
            te = String.fromCharCode(tecla);
            return patron.test(te)
        }

    function sololetras(e){
            key= e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = "àèìòùabcdefghijklmnñopqrstuvwxyz";
            especiales = "8-37-38-46-164";

            tecla_especial = false
            for(var i in especiales){
                if(key == especiales[i]){
                    tecla_especial = true;
                    break;
                }
            }

            if(letras.indexOf(tecla)==-1 && !tecla_especial){
                return false;
            }
        }

    
  </script>
  <script>

$("#form").submit(function(){
 
 if($("#idPerfil").val().length <1)
{
   Swal.fire({
     icon: 'warning',
     title:'Error',
     text:'Por favor ingresar un idPerfil',
     footer:'<p> Sistema de informacion</p>'
   })
   return false;
}

if($("#nombrePerfil").val().length<1)
 {
   Swal.fire({
     icon: 'warning',
     title:'Error',
     text:'Por favor ingrese un nombre de Perfil',
     footer:'<p> Sistema de informacion</p>'
   })
   return false;
 }

});
</script>


  <body> <br> <br>  <br>
  
</html>