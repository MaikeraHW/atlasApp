<!-- <?php

 session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../index.php");
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
    <link rel="stylesheet" href="collect.css" />
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
            <input type="submit" class="head-button" value="Procurar" />
          </div>
        </fieldset>
        <?php if(isset($_GET['status']) && $_GET['status'] == 'success'){
          echo '<p class="success-message">Registro salvo com sucesso!</p>';
        }     ?>
      </form>
      <form action="update.php" method="post">
        <fieldset>
          <table class="extinguisher-informations">
            <input class="extinput" id="extingnumber" name="extingnumber" type="hidden" value="<?php echo $row["extingnumber"]; ?>" required/></td>
            <input class="extinput" id="userid" name="userid" type="hidden" value="<?php echo $_SESSION['usuario_id']; ?>" required/></td>
            <tr>
              <th>Nº do Ext.</th>
              <th>Val. Carga</th>
              <th>Val. Cilindro</th>
            </tr>
            <tr>
              <td class="empity-output">
                <output class="extinput" id="extingnumber" name="extingnumber" type="tel"> <?php echo $row["extingnumber"]; ?> </output>
              </td>
              <td class="vencimentotd">
                <input class="extinput data-vencimento" id="valdate" name="valdate" type="tel" required minlength="7" value="<?php 
              $data_mysql = $row["contentdata"];
              $partes_data = explode('-', $data_mysql);
              $data_brasileira = implode('/', array_reverse($partes_data));
              echo $data_brasileira;
              ?>" />
              </td>
              <td class="vencimentotd">
                <input class="extinput data-vencimento" id="valcildate" name="valcildate" type="tel" minlength="7" required value="<?php 
              $data_mysql = $row["cilinderdata"];
              $partes_data = explode('-', $data_mysql);
              $data_brasileira = implode('/', array_reverse($partes_data));
              echo $data_brasileira;
              ?>" />
              </td>
            </tr>
            <tr>
              <th>Tipo</th>
              <th>Capacidade</th>
              <th>Zona</th>
            </tr>
            <tr>
              <td class="empity-output">
                <output class="extinput" id="exttype" name="exttype" type="text"> <?php echo $row["extingtype"]; ?> </output>
              </td>
              <td class="empity-output">
                <output class="extinput" id="extcap" name="extcap" type="text"> <?php echo $row["extingcapacity"]; ?> </output>
              </td>
              <td class="empity-output">
                <output class="extinput" id="extzone" name="extzone" type="text"> <?php echo $row["extzone"]; ?> </output>
              </td>
            </tr>
            <tr>
              <th colspan="3">Localização</th>
            </tr>
            <tr>
              <td class="empity-output" colspan="3">
                <output class="extinput" id="extloc" name="extloc" type="text"> <?php echo htmlspecialchars($row["extloc"]); ?> </output>
              </td>
            </tr>
          </table>
          <table>
            <section class="extinguisher-questionary">
              <article class="extinguisher-question">
                <label class="label-title">Exintor está Lacrado?</label>
                <div class="radios">
                  <label for="lacres">Sim <input class="choose" type="radio" name="extlacre" id="lacres" value="sim" required /><span class="circle"></span></label>
                  <label for="lacren">Não <input class="choose" type="radio" name="extlacre" id="lacren" value="nao" required /><span class="circle"></span></label>
                </div>
              </article>
              <article class="extinguisher-question">
                <label class="label-title">Extintor está Pressurizado?</label>
                <div class="radios">
                  <label for="pressures">Sim <input class="choose" type="radio" name="extpress" id="pressures" value="sim" required /><span class="circle"></span></label>
                  <label for="pressuren">Não <input class="choose" type="radio" name="extpress" id="pressuren" value="nao" required /><span class="circle"></span></label>
                </div>
              </article>
              <article class="extinguisher-question">
                <label class="label-title">Extintor está desubstruído?</label>
                <div class="radios">
                  <label for="desobss">Sim <input class="choose" type="radio" name="extdesub" id="desobss" value="sim" required /><span class="circle"></span></label>
                  <label for="desobsn">Não <input class="choose" type="radio" name="extdesub" id="desobsn" value="nao" required /><span class="circle"></span></label>
                </div>
              </article>
              <article class="extinguisher-question">
                <label class="label-title">Pintura de solo/suporte está integro?</label>
                <div class="radios">
                  <label for="paintsuports">Sim <input class="choose" type="radio" name="extsolo" id="paintsuports" value="sim" required /><span class="circle"></span></label>
                  <label for="paintsuportn">Não <input class="choose" type="radio" name="extsolo" id="paintsuportn" value="nao" required /><span class="circle"></span></label>
                </div>
              </article>
              <article class="extinguisher-obs">
                <label for="extobs" class="label-title">Observações</label>
                <textarea name="extobs" id="extobs" class="textarea"></textarea>
              </article>
            </section>
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
    <script src="script.js"></script>
  </body>
</html>
