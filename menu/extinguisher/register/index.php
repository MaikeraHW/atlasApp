<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../../index.php");
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
    <link rel="stylesheet" href="register.css" />
    <link rel="stylesheet" href="../../../colors.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

    <title>Fire Atlas - Extinguisher Register</title>
  </head>
  <body>
    <form class="register-menu" action="register.php" method="post">
      <header class="logo"><img src="../../../assets/icons/logo.png" alt="" /></header>
      <fieldset>
        <legend class="register-menu-title">Fire Atlas</legend>
        <?php if(isset($_GET['status']) && $_GET['status'] == 'success'){
          echo '<p class="success-message">Registro salvo com sucesso!</p>';
        }     ?>
        <?php if(isset($_GET['status']) && $_GET['status'] == 'failed'){
          echo '<p class="failed-message">Esse extintor já está cadastrado</p>';
        }     ?>
        <table class="extinguisher-informations">
          <tr>
            <th>Nº do Ext.</th>
            <th>Val. Carga</th>
            <th>Val. Cilindro</th>
          </tr>
          <tr>
            <td><input id="extnum" name="extnum" class="registerfield" type="text" placeholder="Digite o nº" required autocomplete="off" minlength="3" maxlength="3" /></td>
            <td><input id="valdate" name="valdate" class="registerfield" type="text" placeholder="Digite a data" minlength="7" maxlength="7"  required /></td>
            <td><input id="valcildate" name="valcildate" class="registerfield" type="text" placeholder="Digite a data" minlength="7" maxlength="7" required /></td>
          </tr>
          <tr>
            <th>Zona</th>
            <th>Capacidade</th>
            <th>Tipo</th>
          </tr>
          <tr>
            <td>
              <select name="extzone" id="extzone" class="registerfield" required>
                <option value="" selected disabled>Selecione</option>
                <option value="Zona 2">Zona 2</option>
                <option value="Zona 3">Zona 3</option>
                <option value="Zona 4">Zona 4</option>
                <option value="Zona 5">Zona 5</option>
                <option value="Zona 6">Zona 6</option>
                <option value="Zona 7">Zona 7</option>
              </select>
            </td>
            <td><input id="extcap" name="extcap" class="registerfield" type="text" placeholder="Digite a capacidade" required autocomplete="off" /></td>
            <td>
              <select name="exttype" id="exttype" class="registerfield" required>
                <option value="" selected disabled>Selecione</option>
                <option value="ABC">ABC</option>
                <option value="AGP">AGP</option>
                <option value="BC">BC</option>
                <option value="CO2">CO2</option>
                <option value="ESPM">ESPM</option>
                <option value="PQS">PQS</option>
              </select>
            </td>
          </tr>
          <tr>
            <th colspan="3">Localização</th>
          </tr>
          <tr>
            <td colspan="3"><input id="extloc" name="extloc" class="registerfield" type="text" placeholder="Qual a localização do extintor?" required autocomplete="off" /></td>
          </tr>
        </table>
        <div class="foot-btn">
          <a href="../" class="abutton">Voltar</a>
          <input class="button" type="submit" value="Cadastrar" />
        </div>
      </fieldset>
      <footer class="foot">
        <a href="https://wa.me/5547988129920">
        <p>Powered By</p>
        <img src="../../../assets/icons/codesummit-black.png" alt="" />
        </a>
      </footer>
    </form>
    <script src="register.js"></script>
    <script>
      $("#valdate").mask("00/0000")
      $("#valcildate").mask("00/0000")

      setTimeout(() => {
        document.querySelector(".success-message")?.remove();
      }, 3000);

      setTimeout(() => {
        document.querySelector(".failed-message")?.remove();
      }, 3000);

      window.history.replaceState({}, document.title, window.location.pathname)
    </script>
  </body>
</html>
