<?php

include $_SERVER['DOCUMENT_ROOT'] . '/../connect.php';

session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../index.php");
    exit;
}

$sessionid = mysqli_real_escape_string($conn, $_SESSION['usuario_id']);
$stmt = $conn->prepare("SELECT username FROM users WHERE user = ?");
$stmt->bind_param("s", $sessionid);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    $realname = $row['username'];
} else {
    die("Usuário não encontrado.");
}



//Getting form data
$boxnum = mysqli_real_escape_string($conn, $_POST['boxnum']);
$boxlacre = mysqli_real_escape_string($conn, $_POST['boxlacre']);
$hose1v = mysqli_real_escape_string($conn, $_POST['hose1v']);
$hose2v = mysqli_real_escape_string($conn, $_POST['hose2v']);
$hose3v = mysqli_real_escape_string($conn, $_POST['hose3v']);
$hose4v = mysqli_real_escape_string($conn, $_POST['hose4v']);
$hose5v = mysqli_real_escape_string($conn, $_POST['hose5v']);
$hose6v = mysqli_real_escape_string($conn, $_POST['hose6v']);
$hose7v = mysqli_real_escape_string($conn, $_POST['hose7v']);
$nozzle = mysqli_real_escape_string($conn, $_POST['nozzle']);
$elkhart = mysqli_real_escape_string($conn, $_POST['elkhart']);
$wrench = mysqli_real_escape_string($conn, $_POST['wrench']);
$userid = $realname;
$boxobs = mysqli_real_escape_string($conn, $_POST['boxobs']);
$data = date('d/m/Y');
$hora = date('H:i');

//updating data
$query = "UPDATE boxdata SET  boxnum='$boxnum', boxlacre='$boxlacre', hose1='$hose1v', hose2='$hose2v', hose3='$hose3v', hose4='$hose4v', 
hose5='$hose5v', hose6='$hose6v', hose7='$hose7v', nozzle='$nozzle',
elkhart='$elkhart', wrench='$wrench', resp='$userid', daymonth='$data', obs='$boxobs' WHERE boxnum='$boxnum'";

$resultado = mysqli_query($conn, $query);

if($resultado){
  header("location: collect.php?status=success");
  exit();
} else {
  echo "algo deu muito errado";
}


?>