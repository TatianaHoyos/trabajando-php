<?php
include_once 'conexion.php';

if(isset($_GET['usuario'])){
$usuario=(string) $_GET['usuario'];

$buscar_ClienteID=$con->prepare('SELECT * FROM usuario WHERE usuario=:usuario LIMIT 1');
$buscar_ClienteID->execute(array(
':usuario'=>$usuario

));
$resultado=$buscar_ClienteID->fetch();
}else{
header('Location: index.php');
}


if(isset($_POST['guardar'])){

$usuario=$_POST['usuario'];//pep
$password=$_POST['password'];
$documento=$_POST['documento'];
$rol=$_POST['rol'];
$privilegio=$_POST['privilegio'];

$usuarioInDB=(string) $_GET['usuario'];

if(!empty($usuario)){
$consulta_update=$con->prepare(' UPDATE usuario SET  
usuario=:usuario,password=:password, documento=:documento, rol=:rol, privilegio=:privilegio
WHERE usuario=:usuarioInDB;'
);
$consulta_update->execute(array(
':usuario' =>$usuario,
':usuarioInDB'=>$usuarioInDB,
':password'=>$password,
':documento' =>$documento,
':rol' =>$rol,
':privilegio' =>$privilegio

));
header('Location: index.php');

}else{
echo "<script> alert('Los campos estan vacios');</script>";
}
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar Perfiles De Usuarios</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


</head>
<body style="background-color:#C1EDE6;">

<div class="container text-center p-2 g-col-6">
  <h2><i>Editar Usuarios</i></h2>

  <form name="form" action="" method="post" onsubmit="return validar()">
        <div class="form-group">
           <input class="border border-info" type="text" name="documento" placeholder="Documento" value="<?php if($resultado) echo $resultado['documento']; ?>"><br><br>
           <input class="border border-success" type="text" name="usuario" placeholder="Usuario" value="<?php if($resultado) echo $resultado['usuario']; ?>"><br><br>
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
         </select><br><br>
            <label for="privilegio"><b>Estado:</b></label>
            <select name="privilegio" id="privilegio"  class="btn btn-outline-primary">
              <option value="activo">activo</option>
              <option value="inactivo">inactivo</option>
            </select><br><br>
            <input type="password" name="password"  class="border border-info" placeholder="Password" value="<?php if($resultado) echo $resultado['password']; ?>">

        </div>   <br> <br>
     
        <div>
         <a href="index.php" class="btn btn-success">Cancelar</a>
         <input type="submit" name="guardar" value="Guardar" class="btn btn-primary">
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>

