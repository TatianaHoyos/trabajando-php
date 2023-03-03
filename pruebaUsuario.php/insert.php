<?php
      include_once 'conexion.php';
 
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
          header('Location: index.php'); }

      else{
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
       <form name="form" action="" method="post" onsubmit="return validar()">
          <div class=" p-2 g-col-6">
            <input type="text" name="documento" placeholder="Documento"   class="border border-info"><br><br>
            <input type="text" name="usuario" placeholder="Usuario"   class="border border-success"><br><br>
            <label for="rol"><b>Seleccione un rol:</b></label>
              <select name="rol" id="rol" class="btn btn-outline-warning">
                <option value="1">Administrador</option>
                <option value="2">Operario</option>
              </select><br>
              <input type="hidden" name="privilegio" value="activo" placeholder="privilegio" class="border border-info"><br><br>
              <!--<label for="privilegio">Estado:</label>
              <select name="privilegio" id="privilegio">
                <option value="activo">activo</option>
                <option value="inactivo">inactivo</option>
              </select>-->
              <input type="password" name="password" placeholder="password"  class="border border-info">
          </div>   

          <div>
          <a href="index.php" class="btn btn-success">Cancelar</a>
          <input type="submit" name="guardar" value="Guardar" class="btn btn-primary">
          </div>
      </form>
     </div>
    <div align="justify"></div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <body> <br> <br>  <br>
  
</html>