<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php");
    exit;
}

include $_SERVER['DOCUMENT_ROOT'] . '/../connect.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="menu.css" />
    <link rel="stylesheet" href="../../colors.css" />

    <title>Fire Atlas - Abrigos & Hidrantes</title>
  </head>
  <body>
    <main class="main-menu">
      <header class="logo"><img src="../../assets/icons/logo.png" alt="" /></header>
      <h1 class="main-menu-title">Fire Atlas</h1>
      <section class="buttons-section">
        <a class="buttons" href="collect/collect.php">Inspecionar</a>
        <a class="buttons" href="pending">Pendentes</a>
        <a class="buttons" href="expiring">A vencer</a>
        <?php
        if ($_SESSION['nivel'] === 'useradmin'){
        echo '<a class="buttons" href="newreport/report.php">Relatório</a>';
        }?>
      </section>
      <section class="return-div">
        <a class="abutton register-btn" href="../">Voltar</a>
      </section>
      <footer class="foot">
        <a href="https://wa.me/5547988129920">
        <p>Powered By</p>
        <img src="../../assets/icons/codesummit-black.png" alt="" />
        </a>
      </footer>
    </main>
  </body>
</html>
