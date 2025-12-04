<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="main-menu-admin.css" />
    <link rel="stylesheet" href="../colors.css" />

    <title>Fire Atlas - Main Menu</title>
  </head>
  <body>
    <form class="main-menu" action="#" metho="get">
      <fieldset>
        <header class="logo"><img src="../assets/icons/logo.png" alt="" /></header>
        <h1 class="main-menu-title">Fire Atlas</h1>
        <div class="buttons">
          <a href="extinguisher/index.php">Extintores</a>
          <a href="hydrant/index.php">Hidrantes</a>
          <a href="#">Usuários - em breve</a>
        </div>
        <div class="return-div">
          <a class="abutton" href="../">Sair</a>
        </div>
      </fieldset>
      <footer class="foot">
        <a href="https://wa.me/5547988129920">
          <p>Powered By</p>
          <img src="../assets/icons/codesummit-black.png" alt="" />
        </a>
      </footer>
    </form>
  </body>
</html>
