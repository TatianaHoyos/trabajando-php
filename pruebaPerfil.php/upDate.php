<?php
include_once 'conexion.php';

if(isset($_GET['idPerfil'])){
$idPerfil=(int) $_GET['idPerfil'];

$buscar_ClienteID=$con->prepare('SELECT * FROM perfil WHERE idPerfil=:idPerfil  LIMIT 1');
$buscar_ClienteID->execute(array(
':idPerfil'=>$idPerfil
));
$resultado=$buscar_ClienteID->fetch();
}else{
header('Location: index.php');
}


if(isset($_POST['guardar'])){
$nombrePerfil=$_POST['nombrePerfil'];

$idPerfil=(int) $_GET['idPerfil'];

if(!empty($nombrePerfil)){

$consulta_update=$con->prepare(' UPDATE perfil SET  
nombrePerfil=:nombrePerfil
WHERE idPerfil=:idPerfil;'
);
$consulta_update->execute(array(
':nombrePerfil' =>$nombrePerfil,
':idPerfil' =>$idPerfil
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
<title>Editar Perfiles</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


</head>
<body style="background-color:#C1EDE6;"> 

    <div class=" text-center p-2 g-col-6 " >
        <h2><i>Editar Clientes</i></h2>
        
        <form action="" method="post">
        <div>
        <input type="text" name="nombrePerfil"  class="border border-info"  value="<?php if($resultado) echo $resultado['nombrePerfil']; ?>">

        </div>

        <div class="p-2 g-col-6">
        <a href="index.php"  class="btn btn-success" >Cancelar</a>
        <input type="submit" name="guardar" value="Guardar"  class="btn btn-primary" >
        </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>

