<?php
include_once 'conexion.php';

$sentencia_select=$con->prepare('SELECT * FROM usuario ORDER BY usuario ASC');
$sentencia_select->execute();
$resultado=$sentencia_select->fetchAll();

// metodo buscar
if(isset($_POST['btn_buscar'])){
$buscar_text=$_POST['buscar'];
$select_buscar=$con->prepare('SELECT * FROM usuario WHERE usuario LIKE :campo OR usuario LIKE :campo;');
$select_buscar->execute(array(':campo' =>"%".$buscar_text."%"));
$resultado=$select_buscar->fetchAll();
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Nuevo Usuario  </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <meta name="description" content="website description" />
    <meta name="keywords" content="website keywords, website keywords" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

</head>

<body style="background-color:#C1EDE6;">
<div>
    <div class="container text-center p-2 g-col-6">
      <h2><i>Perfiles De Usuario</i></h2>

        <form action="" method="post">
        <input type="text" name="buscar" placeholder="buscar perfil o nombre"  class="border border-info" value="<?php if(isset($buscar_text)) echo $buscar_text; ?>">
        <input type="submit" name="btn_buscar" value="Buscar" class="btn btn-outline-primary">
        <a href="insert.php" class="btn btn-outline-warning" > usuario</a>
        </form>
    </div>
    <div class="container text-center">
    <table class="table table-success table-striped-columns">
        <tr class="head">
        <td><b>Documento</b></td>
        <td><b>Usuario</b></td>
        <td><b>Rol</b></td>
        <td><b>Privilegio</b></td>
        <td><b>Acción</b></td>
      </tr>
      <?php foreach($resultado as $fila):?>
        <tr>
        <td><?php echo $fila['documento'];?></td>
        <td><?php echo $fila['usuario'];?></td>
        <td><?php echo $fila['rol'];?></td>
        <td><?php echo $fila['privilegio'];?></td>
        
      <td>

      <a class="btn btn-primary" href="update.php?usuario=<?php echo $fila['usuario']; ?>">Editar</a>
      <a class="btn btn-success" href="delete.php?usuario=<?php echo $fila['usuario']; ?>">Eliminar</a>
      </td>

      </tr>
      <?php endforeach ?>
      </table>
    </div>
</div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body> <br> <br>  <br>


</html>