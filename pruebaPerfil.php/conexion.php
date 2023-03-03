<?php
$host="localhost";
$database="prueba";
$port = '5000';
$user='root';
$password='';

try{
$con=new PDO("mysql:host=$host;port=$port;dbname=".$database,$user,$password);
//echo ("conexion exitosa");

}catch(PDOException $e){
  echo ("conexion fallida ".$e);
}

?>