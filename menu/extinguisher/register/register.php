<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../../index.php");
    exit;
}

include $_SERVER['DOCUMENT_ROOT'] . '/../connect.php';

//Getting form data
$extnum = mysqli_real_escape_string($conn, $_POST['extnum']);
$extloc = mysqli_real_escape_string($conn, $_POST['extloc']);
$extzone = mysqli_real_escape_string($conn, $_POST['extzone']);
$extcap = mysqli_real_escape_string($conn, $_POST['extcap']);
$exttype = mysqli_real_escape_string($conn, $_POST['exttype']);
$noformatvaldate = mysqli_real_escape_string($conn, $_POST['valdate']);
$noformatvalcildate = mysqli_real_escape_string($conn, $_POST['valcildate']);
$valdate = date('d/m/Y', strtotime($noformatvaldate));
$valcildate = date('d/m/Y', strtotime($noformatvalcildate));
$data = date('d/m/Y');
$hora = date('H:i');

// Prepara e executa a consulta
$consult = "SELECT * FROM testingdata WHERE extingnumber = ?";
$stmt = $conn->prepare($consult);
$stmt->bind_param("s", $extnum);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se encontrou algo
if ($result->num_rows > 0) {
    header("location: index.php?status=failed");
  exit();
} else {
    $smtp = $conn->prepare("INSERT INTO testingdata (extingnumber, extloc, extzone, extingcapacity, extingtype, contentdata, cilinderdata, daymonth, hourtime) VALUE (?,?,?,?,?,?,?,?,?)"); 
    $smtp->bind_param("sssssssss",$extnum,$extloc,$extzone,$extcap,$exttype,$valdate,$valcildate,$data,$hora);

if($smtp->execute()){
  header("location: index.php?status=success");
  exit();
}else{
  echo "erro no envio: ".$smtp->error;
}

}


$stmt->close();
$smtp->close();
$conn->close();