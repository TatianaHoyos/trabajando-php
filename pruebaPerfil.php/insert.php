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
        }else{
      echo "<script> alert('Los campos estan vacios');</script>";
      } }
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
        <form name="form" action="" method="post" onsubmit="return validar()">
          
            <div class="p-2 g-col-6 " >
            <input type="number" name="idPerfil" placeholder="Codigo Perfil" class="border border-info" ><br>
            </div> 
            <div class="p-2 g-col-6" >
              <input type="text" name="nombrePerfil" placeholder="Nombre Perfil" class="border border-warning" >
              </div>
            </div>
            <div class="text-center ">
            <a href="index.php" class="btn btn-success" >Cancelar</a>
            <input type="submit" name="guardar" value="Guardar" class="btn btn-info">
            </div>

        </form>
     </div>
    <div align="justify"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <body> <br> <br>  <br>
  
</html>