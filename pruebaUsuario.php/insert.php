<?php
      include_once 'conexion.php';
      $saveSucess=false;
 
     if(isset($_POST['guardar'])){
         $usuario=$_POST['usuario'];
         $password=$_POST['password'];
         $documento=$_POST['documento'];
         $rol=$_POST['rol'];
         $privilegio=$_POST['privilegio'];


     if(!empty($usuario) && !empty($password) && !empty($documento)
     && !empty($rol) && !empty($privilegio)){
          $consulta_insert=$con->prepare('INSERT INTO usuario (usuario, password, documento, rol, privilegio) VALUES(:usuario, :password, :documento, :rol, :privilegio)');
          $consulta_insert->execute(array(
          ':usuario' =>$usuario,
          ':password' =>$password,
          ':documento' =>$documento,
          ':rol' =>$rol,
          ':privilegio' =>$privilegio,
          ));
          $saveSucess=true;
          //echo "<script type='text/javascript'> saveUser(); </script>";
          //header('Location: index.php'); 
        } else {
      echo "<script> alert('Los campos estan vacios');</script>";
      } }
    ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Nuevo Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="description" content="website description" />
    <meta name="keywords" content="website keywords, website keywords" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  </head>

  <body style="background-color:#C1EDE6;">
 <div class=" text-center  p-2 g-col-6 ">
    <div >
      
      <h2><i>Registrar Usuario</i></h2> 
       <form id="form" name="form" action="" method="post">
          <div class=" p-2 g-col-6">
            <input type="text" id="documento" name="documento" placeholder="Documento"   class="border border-info" onkeypress="return validarNumero(event)"><br><br>
            <input type="text" id="usuario" name="usuario" placeholder="Usuario"   class="border border-success" onkeypress="return sololetras(event)"><br><br>
            <label for="rol"><b>Seleccione un rol:</b></label>
             <select id="rol" name="rol">
          <option placeholder="0">Rol o Cargo</option>
           <?php
            $query = $con-> prepare ('SELECT * FROM perfil');
             $query->execute();
              foreach ($query as $valores){
                echo '<option value= "'.$valores['idPerfil'].'">'.$valores['nombrePerfil'].'</option>';
                }
            ?>
         </select>
     <br>
              <input type="hidden" name="privilegio" value="activo" placeholder="privilegio" class="border border-info"><br><br>
              <input type="password" id="password" name="password" placeholder="password"  class="border border-info" onkeypress="return contrasena(event)">
          </div>   

          <div>
          <a href="index.php" class="btn btn-success">Cancelar</a>
          <input type="submit" name="guardar" value="Guardar" class="btn btn-primary">
          </div>
      </form>
     </div>
    <div align="justify"></div>
  </div>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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

    function contrasena(e){
          key1= e.keyCode || e.which;
          tecla1 = String.fromCharCode(key1).toLowerCase();
          contrasena1 = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ0123456789";
          especialesContra = "8-34-35-36-37-38-43-45-46-164-64";
          tecla_contra = false;
            for(var i in especialesContra){
                if(key1 == especialesContra[i]){
                    tecla_contra = true;
                    break;
                }
            }

            if(contrasena1.indexOf(tecla1)==-1 && !tecla_contra){
                return false;
            }
        }
  </script>
    <script>
      $(document).ready(function (){
        <?php 
          if ($saveSucess) {
            echo "saveUserSuccessful();";
          }
          ?>
      });
      function saveUserSuccessful() {
        Swal.fire({
            icon: 'success',
            title:'Usuario guardado exitosamente',
            confirmButtonText: 'Confirmar'
          }).then((result) => {
            //redirect
            $(location).attr('href','index.php');
        })
      }

       $("#form").submit(function(){
        if($("#documento").val().length <1)
      {
          Swal.fire({
            icon: 'warning',
            title:'Oops',
            text:'Debe ingresar documento',
            footer:'<p> Sistema de informacion</p>'
          })
          return false;
      }

      if($("#usuario").val().length<1)
        {
          Swal.fire({
            icon: 'warning',
            title:'Error',
            text:'Por favor ingrese un usuario',
            footer:'<p> Sistema de informacion</p>'
          })
          return false;
        }

        var valueInt = parseInt($("#rol").val());
        if(!Number.isInteger(valueInt))
        {
          Swal.fire({
            icon: 'warning',
            title:'Error',
            text:'Por favor seleccione un rol para usuario',
            footer:'<p> Sistema de informacion</p>'
          })
          return false;
        }

      if($("#password").val().length <1)
      {
          Swal.fire({
            icon: 'warning',
            title:'Oops',
            text:'Debe ingresar una contrasena',
            footer:'<p> Sistema de informacion</p>'
          })
          return false;
      }
     
     
    });
    </script>
  <body> <br> <br>  <br>
  
</html>