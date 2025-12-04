<?php

include $_SERVER['DOCUMENT_ROOT'] . '/../connect.php';

//Getting form data
$extnum = mysqli_real_escape_string($conn, $_POST['extingnumber']);
$valdate = mysqli_real_escape_string($conn, $_POST['valdate']);
$valcildate = mysqli_real_escape_string($conn, $_POST['valcildate']);
$exttype = mysqli_real_escape_string($conn, $_POST['exttype']);
$extcap = mysqli_real_escape_string($conn, $_POST['extcap']);
$extzone = mysqli_real_escape_string($conn, $_POST['extzone']);
$extloc = mysqli_real_escape_string($conn, $_POST['extloc']);
$data = date('d/m/Y');
$hora = date('H:i');

//updating data
$query = "UPDATE testingdata SET extloc='$extloc', extzone='$extzone', extingcapacity='$extcap', extingtype='$exttype', contentdata='$valdate', cilinderdata='$valcildate', daymonth='$data', hourtime='$hora' WHERE extingnumber='$extnum'";

$resultado = mysqli_query($conn, $query);

if($resultado){
  header("location: edit.php?status=success");
  exit();
} else {
  echo "algo deu muito errado";
}


?>