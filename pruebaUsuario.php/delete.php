<?php

include_once 'conexion.php';
if(isset($_GET['usuario'])){
$usuario=(string) $_GET['usuario'];
$delete=$con->prepare('DELETE FROM usuario WHERE usuario=:usuario ');
$delete->execute(array(
':usuario'=>$usuario
));
header('Location: index.php');
}else{
header('Location: index.php');
}
 ?>

