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
$extnum = mysqli_real_escape_string($conn, $_POST['extingnumber']);
$valdate = mysqli_real_escape_string($conn, $_POST['valdate']);
$valcildate = mysqli_real_escape_string($conn, $_POST['valcildate']);
$extlacre = mysqli_real_escape_string($conn, $_POST['extlacre']);
$extpress = mysqli_real_escape_string($conn, $_POST['extpress']);
$extdesub = mysqli_real_escape_string($conn, $_POST['extdesub']);
$extsolo = mysqli_real_escape_string($conn, $_POST['extsolo']);
$extobs = mysqli_real_escape_string($conn, $_POST['extobs']);
$userid = $realname;
$data = date('d/m/Y');
$hora = date('H:i');

//Salvando o Log
$smtp = $conn->prepare("INSERT INTO extlog (extnum, daymonth, resp) VALUE (?,?,?)"); 
$smtp->bind_param("sss",$extnum,$data,$userid);
$smtp->execute();

//updating data
$query = "UPDATE testingdata SET extresp='$userid', obs='$extobs', extsolo='$extsolo', extdesub='$extdesub', extpress='$extpress', extlacre='$extlacre', contentdata='$valdate', cilinderdata='$valcildate', daymonth='$data', hourtime='$hora' WHERE extingnumber='$extnum'";

$resultado = mysqli_query($conn, $query);

if($resultado){
  header("location: collect.php?status=success");
  exit();
} else {
  echo "algo deu muito errado";
}
?>