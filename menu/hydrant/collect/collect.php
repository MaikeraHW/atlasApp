<!-- <?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../index.php");
    exit;
}

include $_SERVER['DOCUMENT_ROOT'] . '/../connect.php';

  if($_SERVER["REQUEST_METHOD"]== "POST") {
  $boxnum = mysqli_real_escape_string($conn, $_POST["boxnum"]);
  $informations = "SELECT * FROM boxdata WHERE boxnum = '$boxnum'"; 
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

    <title>Fire Atlas - Hydrant Module</title>
  </head>
  <body>
    <main class="main-menu">
      <header class="logo"><img src="../../../assets/icons/logo.png" alt="" /></header>
      <h1 class="main-menu-title">Fire Atlas</h1>
      <h2 class="main-menu-subtitle">Informações do Abrigo</h2>
      <form class="head-form" action="" method="post">
        <fieldset>
          <div class="search-area">
            <input name="boxnum" class="headextinput" id="boxnum" type="tel" placeholder="Nº do Abrigo" minlength="3" maxlength="3" autofocus required />
            <input type="submit" class="head-button" value="Procurar" />
          </div>
        </fieldset>
        <?php if(isset($_GET['status']) && $_GET['status'] == 'success'){
          echo '<p class="success-message">Registro salvo com sucesso!</p>';
        }     ?>
      </form>
      <form class="body-form" action="update.php" method="post">
        <fieldset>
          <table class="extinguisher-informations">
            <input class="extinput" id="boxnum" name="boxnum" type="hidden" value="<?php echo $row["boxnum"]; ?>" required /></td>
            <input class="extinput" id="userid" name="userid" type="hidden" value="<?php echo $_SESSION['usuario_id']; ?>" required /></td>
            <tr>
              <th>Nº do Abrigo</th>
              <th>Zona</th>
              <th>Lacre Nº</th>
            </tr>
            <tr>
              <td class="empity-output">
                <output class="extinput" id="boxnum" name="boxnum" type="text"> <?php echo $row["boxnum"]; ?> </output>
              </td>
              <td>
                <output class="extinput" id="boxzone" name="boxzone" type="text"> <?php echo $row["boxzone"]; ?> </output>
              <td>
                <input class="extinput" id="boxlacre" name="boxlacre" type="tel" required value="">
              </td>
            </tr>
            <tr>
              <th colspan="3">Localização</th>
            </tr>
            <tr>
              <td class="empity-output" colspan="3">
                <output class="extinput" id="boxloc" name="boxloc" type="text"> <?php echo htmlspecialchars($row["boxloc"]); ?> </output>
              </td>
            </tr>
          </table>
          <table>
            <section class="extinguisher-questionary">
              <article class="extinguisher-question">
                <label class="label-title">Mangueira 1</label>
                 <div class="radios">
                  <label for="hose1s" class="hosequest">Sim <input class="choose" type="radio" name="hose1" id="hose1s" value="Sim" required /><span class="circle"></span></label>
                  <label for="hose1n" class="hosequest">Não <input class="choose" type="radio" name="hose1" id="hose1n" value="Não" required /><span class="circle"></span></label>
                  <label for="hose1v" class="hoseval">Val.:</label> 
                  <input class="hoseinput data-vencimento" type="tel" name="hose1v" id="hose1v" minlength="7" maxlength="7" value="<?php echo $row["hose1"]; ?>"  />
                </div>
              </article>
              <article class="extinguisher-question">
                <label class="label-title">Mangueira 2</label>
                <div class="radios">
                  <label for="hose2s" class="hosequest">Sim <input class="choose" type="radio" name="hose2" id="hose2s" value="Sim" required /><span class="circle"></span></label>
                  <label for="hose2n" class="hosequest">Não <input class="choose" type="radio" name="hose2" id="hose2n" value="Não" required /><span class="circle"></span></label>
                  <label for="hose2v" class="hoseval">Val.:</label>
                  <input class="hoseinput data-vencimento" type="tel" name="hose2v" id="hose2v" minlength="7" maxlength="7" value="<?php echo $row["hose2"]; ?>"  />
                </div>
              </article>
              <article class="extinguisher-question">
                <label class="label-title">Mangueira 3</label>
                <div class="radios">
                  <label for="hose3s" class="hosequest">Sim <input class="choose" type="radio" name="hose3" id="hose3s" value="Sim" required /><span class="circle"></span></label>
                  <label for="hose3n" class="hosequest">Não <input class="choose" type="radio" name="hose3" id="hose3n" value="Não" required /><span class="circle"></span></label>
                  <label for="hose3v" class="hoseval">Val.:</label>
                  <input class="hoseinput data-vencimento" type="tel" name="hose3v" id="hose3v" minlength="7" maxlength="7" value="<?php echo $row["hose3"]; ?>"  />
                </div>
              </article>
              <article class="extinguisher-question">
                <label class="label-title">Mangueira 4</label>
                <div class="radios">
                  <label for="hose4s" class="hosequest">Sim <input class="choose" type="radio" name="hose4" id="hose4s" value="Sim" required /><span class="circle"></span></label>
                  <label for="hose4n" class="hosequest">Não <input class="choose" type="radio" name="hose4" id="hose4n" value="Não" required /><span class="circle"></span></label>
                  <label for="hose4v" class="hoseval">Val.:</label>
                  <input class="hoseinput data-vencimento" type="tel" name="hose4v" id="hose4v" minlength="7" maxlength="7" value="<?php echo $row["hose4"]; ?>"  />
                </div>
                </article>
              <?php if ($boxnum == '176'){
                  echo '
                  <article class="extinguisher-question">
                <label class="label-title">Mangueira 5</label>
                <div class="radios">
                  <label for="hose5s" class="hosequest">Sim <input class="choose" type="radio" name="hose5" id="hose5s" value="Sim" required /><span class="circle"></span></label>
                  <label for="hose5n" class="hosequest">Não <input class="choose" type="radio" name="hose5" id="hose5n" value="Não" required /><span class="circle"></span></label>
                  <label for="hose5v" class="hoseval">Val.:</label>
                  <input class="hoseinput data-vencimento" type="tel" name="hose5v" id="hose5v" minlength="7" maxlength="7" value="'; echo $row["hose5"]; echo '"  />
                </div>
                </article>
                <article class="extinguisher-question">
                <label class="label-title">Mangueira 6</label>
                <div class="radios">
                  <label for="hose6s" class="hosequest">Sim <input class="choose" type="radio" name="hose6" id="hose6s" value="Sim" required /><span class="circle"></span></label>
                  <label for="hose6n" class="hosequest">Não <input class="choose" type="radio" name="hose6" id="hose6n" value="Não" required /><span class="circle"></span></label>
                  <label for="hose6v" class="hoseval">Val.:</label>
                  <input class="hoseinput data-vencimento" type="tel" name="hose6v" id="hose6v" minlength="7" maxlength="7" value="'; echo $row["hose6"]; echo '"  />
                </div>
                </article>
                <article class="extinguisher-question">
                <label class="label-title">Mangueira 7</label>
                <div class="radios">
                  <label for="hose7s" class="hosequest">Sim <input class="choose" type="radio" name="hose7" id="hose7s" value="Sim" required /><span class="circle"></span></label>
                  <label for="hose7n" class="hosequest">Não <input class="choose" type="radio" name="hose7" id="hose7n" value="Não" required /><span class="circle"></span></label>
                  <label for="hose7v" class="hoseval">Val.:</label>
                  <input class="hoseinput data-vencimento" type="tel" name="hose7v" id="hose7v" minlength="7" maxlength="7" value="'; echo $row["hose7"]; echo '"  />
                </div>
                </article>
                  ';
              }              
              ?>
              
              <article class="extinguisher-question">
                <label class="label-title">Esguicho Agulheta</label>
                <div class="radios">
                  <label for="nozzles">Sim <input class="choose" type="radio" name="nozzle" id="nozzles" value="Sim" required /><span class="circle"></span></label>
                  <label for="nozzlen">Não <input class="choose" type="radio" name="nozzle" id="nozzlen" value="Não" required /><span class="circle"></span></label>
                </div>
              </article>
              <article class="extinguisher-question">
                <label class="label-title">Esguicho Elkhart</label>
                <div class="radios">
                  <label for="elkharts">Sim <input class="choose" type="radio" name="elkhart" id="elkharts" value="Sim" required /><span class="circle"></span></label>
                  <label for="elkhartn">Não <input class="choose" type="radio" name="elkhart" id="elkhartn" value="Não" required /><span class="circle"></span></label>
                </div>
              </article>
              <article class="extinguisher-question">
                <label class="label-title">2 Chaves de Mangueira</label>
                <div class="radios">
                  <label for="wrenchs">Sim <input class="choose" type="radio" name="wrench" id="wrenchs" value="Sim" required /><span class="circle"></span></label>
                  <label for="wrenchn">Não <input class="choose" type="radio" name="wrench" id="wrenchn" value="Não" required /><span class="circle"></span></label>
                </div>
              </article>
              <article class="extinguisher-obs">
                <label for="extobs" class="label-title">Observações</label>
                <textarea name="boxobs" id="boxobs" class="textarea"></textarea>
              </article>
            </section> 
          </table>
          <div class="foot-btn">
            <a class="abutton" href="../" class="register-btn">Voltar</a>
            <input type="submit" class="button" value="Salvar" />
          </div>
        </fieldset>
         <footer class="foot">
        <a href="https://wa.me/5547988129920">
        <p>Powered By</p>
        <img src="../../../assets/icons/codesummit-black.png" alt="" />
        </a>
      </footer>
      </form>
    </main>
    <script src="collect.js"></script>
  </body>
</html>
