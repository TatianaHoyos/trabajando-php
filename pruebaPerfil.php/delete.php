<?php

include_once 'conexion.php';
if(isset($_GET['idPerfil'])){
$idPerfil=(int) $_GET['idPerfil'];
$delete=$con->prepare('DELETE FROM perfil WHERE idPerfil=:idPerfil');
$delete->execute(array(
':idPerfil'=>$idPerfil
));
header('Location: index.php');
}else{
header('Location: index.php');
}
 ?>

