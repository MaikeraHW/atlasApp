<!-- <?php

include $_SERVER['DOCUMENT_ROOT'] . '/../connect.php'; 

//sabendo qual é o extintor
  if (isset($_GET['extnum'])) {
    $extnum = trim($_GET['extnum']);
} else {
    die("Extintor não informado.");
}
//pegando dados do extintor
$sql = "SELECT * FROM testingdata WHERE extingnumber = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $extnum);
$stmt->execute();
$resultado = $stmt->get_result();
$extintor = $resultado->fetch_assoc();

//pegando dados do histórico
$sqlhist = "SELECT * FROM extlog WHERE extnum = ? ORDER BY logid DESC LIMIT 10";
$stmthist = $conn->prepare($sqlhist);
$stmthist->bind_param("s", $extnum);
$stmthist->execute();
$resultadohist = $stmthist->get_result();

?>  -->

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="cards.css" />
    <link rel="stylesheet" href="../colors.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

    <title>Fire Atlas - Extinguisher Module</title>
  </head>
  <body>
    <main class="main-menu">
      <header class="logo"><img src="../assets/icons/logo.png" alt="" /></header>
      <h1 class="main-menu-title">Fire Atlas</h1>
      <h2 class="main-menu-subtitle">Informações do Extintor</h2>
      <section class="head-form" action="" method="post">
        <table class="extinguisher-informations">
          <tr>
            <th>Nº do Ext.</th>
            <th>Tipo</th>
            <th>Capacidade</th>
          </tr>
          <tr>
            <td class="empity-output">
              <output class="extinput" id="extingnumber" name="extingnumber" type="text"> <?php echo $extintor["extingnumber"]; ?> </output>
            </td>
            <td class="empity-output">
              <output class="extinput" id="exttype" name="exttype" type="text"> <?php echo $extintor["extingtype"]; ?> </output>
            </td>
            <td class="empity-output">
              <output class="extinput" id="extcap" name="extcap" type="text"> <?php echo $extintor["extingcapacity"]; ?> </output>
            </td>
          </tr>
          <tr>
            <th colspan="3">Localização</th>
          </tr>
          <tr>
            <td class="empity-output" colspan="3">
              <output class="extinput" id="extloc" name="extloc" type="text"> <?php echo htmlspecialchars($extintor["extloc"]); ?> </output>
            </td>
          </tr>
        </table>
        <table class="table">
          <tr>
            <th>Data</th>
            <th>Responsável</th>
          </tr>
          <?php
              if ($resultadohist->num_rows > 0) { while ($linha = $resultadohist->fetch_assoc()) { 
                echo "<tr>"; 
                echo "<td>" . htmlspecialchars($linha["daymonth"]) . "</td>"; 
                echo "<td>" . htmlspecialchars($linha["resp"]) . "</td>"; 
                echo "</tr>"; } 
              } else { 
                echo "<tr>"; 
                echo "<td colspan='2'> Nenhuma inspeção realizada </td>"; 
                echo "</tr>"; 
                } ?>
        </table>
        <?php
              $stmt->close();  
              $stmthist->close(); 
              $conn->close(); ?>
      </section>
      <footer class="foot">
        <p>Powered By</p>
        <img src="../assets/icons/codesummit-black.png" alt="" />
      </footer>
    </main>
  </body>
</html>
