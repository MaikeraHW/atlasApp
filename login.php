<?php
session_start();

include $_SERVER['DOCUMENT_ROOT'] . '/../connect.php';

//Getting data from user
$name = mysqli_real_escape_string($conn, $_POST['usersign']);
$passwordsign = mysqli_real_escape_string($conn, $_POST['passwordsign']);

$stmt = $conn->prepare("SELECT * FROM users WHERE user = ?");
$stmt->bind_param("s", $name);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if($row['password'] === $passwordsign){
    $_SESSION['usuario_id'] = $name;
    $_SESSION['nivel'] = $row['usertype'];
     header("location: menu/index.php");
  exit();
  } else {
  header("location: index.php?status=failed");
  exit();
}
$stmt->close();
$conn->close();


?>
