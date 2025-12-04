<?php
//Getting data from user
$server = '127.0.0.1:3306';
$user = 'u408471695_fireatlasuser';
$password = '29041994Mhw#';
$database = 'u408471695_fireatlas';

$conn = new mysqli($server,$user,$password,$database);

if($conn->connect_error){
  die("Falha de conexão com o databse: ".$conn->connect_error);
}
?>