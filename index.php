<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="colors.css" />
    <link rel="manifest" href="manifest.json" />
    <script>
      if (typeof navigator.serviceWorker !== "undefined") {
        navigator.serviceWorker.register("pwabuilder-sw.js")
      }
    </script>

    <title>Fire Atlas - Login</title>
  </head>
  <body>
    <form class="login-screen" action="login.php" method="post">
      <fieldset>
        <header class="logo"><img src="assets/icons/logo.png" alt="" /></header>
        <h1 class="login-screen-title">Fire Atlas</h1>
        <p class="title-description">Faça seu Login</p>
        <article class="field <?php if(isset($_GET['status']) && $_GET['status'] == 'failed'){
          echo 'fields'; } ?>">
          <div class="icon"><ion-icon class="icongrey <?php if(isset($_GET['status']) && $_GET['status'] == 'failed'){
          echo 'iconred'; } ?>" name="person-outline"></ion-icon></div>
          <input class="to-fill <?php if(isset($_GET['status']) && $_GET['status'] == 'failed'){
          echo 'to-fills'; } ?> " name="usersign" id="user" type="text" min-lenght="3" required autocomplete="off" placeholder="Usuário" />
        </article>
        <article class="field <?php if(isset($_GET['status']) && $_GET['status'] == 'failed'){
          echo 'fields'; } ?>">
          <div class="icon"><ion-icon class="icongrey <?php if(isset($_GET['status']) && $_GET['status'] == 'failed'){
          echo 'iconred'; } ?>" name="lock-closed-outline"></ion-icon></div>
          <input class="to-fill <?php if(isset($_GET['status']) && $_GET['status'] == 'failed'){
          echo 'to-fills'; } ?> " name="passwordsign" id="password" type="password" min-lenght="3" required placeholder="Senha" />
        </article>
        <?php if(isset($_GET['status']) && $_GET['status'] == 'failed'){
          echo '<p class="error-text">Usuário ou Senha incorretos</p>'; } ?>
        <div class="btn">
          <input class="button" type="submit" value="Login" />
        </div>
      </fieldset>
      <footer class="foot">
        <a href="https://wa.me/5547988129920">
        <p>Powered By</p>
        <img src="assets/icons/codesummit-black.png" alt="" />
        </a>
      </footer>
    </form>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </body>
</html>
