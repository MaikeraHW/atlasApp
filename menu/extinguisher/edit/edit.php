<!-- <?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php");
    exit;
}

include $_SERVER['DOCUMENT_ROOT'] . '/../connect.php';

  if($_SERVER["REQUEST_METHOD"]== "POST") {
  $extnumber = mysqli_real_escape_string($conn, $_POST["extinput"]);
  $informations = "SELECT * FROM testingdata WHERE extingnumber = '$extnumber'"; 
  $result = $conn->query($informations); 
  $row = $result->fetch_assoc();
}

?>  -->

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="edit.css" />
    <link rel="stylesheet" href="../../../colors.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

    <title>Fire Atlas - Extinguisher Module</title>
  </head>
  <body>
    <main class="main-menu">
      <header class="logo"><img src="../../../assets/icons/logo.png" alt="" /></header>
      <h1 class="main-menu-title">Fire Atlas</h1>
      <h2 class="main-menu-subtitle">Informações do Extintor</h2>
      <form class="head-form" action="" method="post">
        <fieldset>
          <div class="search-area">
            <input name="extinput" class="headextinput" id="extnum" type="tel" placeholder="Nº do Extintor" minlength="3" maxlength="3" autofocus required />
            <input type="submit" class="headbutton" value="Procurar" />
          </div>
        </fieldset>
      </form>
      <?php if(isset($_GET['status']) && $_GET['status'] == 'success'){
          echo '<p class="success-message">Registro salvo com sucesso!</p>';
        }     ?>
      <form action="update.php" method="post">
        <fieldset>
          <table class="extinguisher-informations">
            <input class="extinput" id="extingnumber" name="extingnumber" type="hidden" value="<?php echo $row["extingnumber"]; ?>" required/></td>
            <tr>
              <th>Nº do Ext.</th>
              <th>Val. Carga</th>
              <th>Val. Cilindro</th>
            </tr>
            <tr>
              <td class="empity-output">
                <output class="extinput" id="extingnumber" name="extingnumber" type="text"> <?php echo $row["extingnumber"]; ?> </output>
              </td>
              <td>
                <input class="extinput" id="valdate" name="valdate" type="text" minlength="7" maxlength="7" value="<?php 
              $data_mysql = $row["contentdata"];
              $partes_data = explode('-', $data_mysql);
              $data_brasileira = implode('/', array_reverse($partes_data));
              echo $data_brasileira;
              ?>" required/>
              </td>
              <td>
                <input class="extinput" id="valcildate" name="valcildate" type="text" minlength="7" maxlength="7" value="<?php 
              $data_mysql = $row["cilinderdata"];
              $partes_data = explode('-', $data_mysql);
              $data_brasileira = implode('/', array_reverse($partes_data));
              echo $data_brasileira;
              ?>" required/>
              </td>
            </tr>
            <tr>
              <th>Tipo</th>
              <th>Capacidade</th>
              <th>Zona</th>
            </tr>
            <tr>
              <td class="empity-output">
              <select class="extinput" name="exttype" id="exttype" class="registerfield" required>
                <option value="<?php echo $row["extingtype"]; ?>" selected > <?php echo $row["extingtype"]; ?> </option>
                <option value="ABC">ABC</option>
                <option value="AGP">AGP</option>
                <option value="BC">BC</option>
                <option value="CO2">CO2</option>
                <option value="ESPM">ESPM</option>
                <option value="PQS">PQS</option>
              </select>
              </td>
              <td class="empity-output">
                <input class="extinput" id="extcap" name="extcap" type="text" value="<?php echo $row["extingcapacity"]; ?>" >
              </td>
              <td class="empity-output">
                <select class="extinput" name="extzone" id="extzone" class="registerfield" required>
                <option value="<?php echo $row["extzone"]; ?>" selected > <?php echo $row["extzone"]; ?> </option>
                <option value="Zona 2">Zona 2</option>
                <option value="Zona 3">Zona 3</option>
                <option value="Zona 4">Zona 4</option>
                <option value="Zona 5">Zona 5</option>
                <option value="Zona 6">Zona 6</option>
                <option value="Zona 7">Zona 7</option>
              </select>
              </td>
            </tr>
            <tr>
              <th colspan="3">Localização</th>
            </tr>
            <tr>
              <td class="empity-output" colspan="3">
                <input class="extinput" id="extloc" name="extloc" type="text" value="<?php echo htmlspecialchars($row["extloc"]); ?>" >
              </td>
            </tr>
          </table>
          <div class="foot-btn">
            <a class="abutton" href="../" class="register-btn">Voltar</a>
            <input type="submit" class="button" value="Salvar" />
          </div>
        </fieldset>
      </form>
      <footer class="foot">
        <a href="https://wa.me/5547988129920">
        <p>Powered By</p>
        <img src="../../../assets/icons/codesummit-black.png" alt="" />
        </a>
      </footer>
    </main>
    <script>
      $('#valdate').mask('00/0000');
      $('#valcildate').mask('00/0000');

      setTimeout(() => {
        document.querySelector(".success-message")?.remove();
      }, 3000);

      window.history.replaceState({}, document.title, window.location.pathname)
    </script>
  </body>
</html>
