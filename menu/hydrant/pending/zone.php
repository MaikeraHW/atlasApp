<!------ <?php

include $_SERVER['DOCUMENT_ROOT'] . '/../connect.php';

session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../index.php");
    exit;
}

if (isset($_GET['zone'])) {
    $zone = $_GET['zone'];
} else {
    die("Zona não informada.");
}

$data = new DateTime('first day of last month');
$mes  = $data->format('m');
$ano  = $data->format('Y');
$mesano = $mes . "/" . $ano;
$busca = $mesano;
$boxzone = $zone;

// Prepara a consulta SQL com LIKE
$sql = "SELECT daymonth, boxnum, boxloc FROM boxdata WHERE daymonth LIKE ? AND boxzone LIKE ?";
$stmt = $conn->prepare($sql);
$param = "%" . $busca . "%";
$zoneparam = "%" . $boxzone . "%";
$stmt->bind_param("ss", $param, $zoneparam);

// Executa e pega resultados
$stmt->execute();
$resultado = $stmt->get_result();
?>
----->

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../zones.css" />
    <link rel="stylesheet" href="../../../colors.css" />

    <title>Fire Atlas - <?php echo $_GET['zone'] ?></title>
  </head>
  <body>
    <main class="main-menu">
      <header class="logo"><img src="../../../assets/icons/logo.png" alt="" /></header>
      <h1 class="main-menu-title">Fire Atlas</h1>
      <h2 class="menu-subtitle">Abrigos Pendentes - <?php echo $_GET['zone'] ?></h2>
      <div class="content">
        <table class="table">
          <tr>
            <th>Nº</th>
            <th>Localização</th>
          </tr>
           <?php
              if ($resultado->num_rows > 0) { while ($linha = $resultado->fetch_assoc()) { 
                echo "<tr>"; 
                echo "<td>" . htmlspecialchars($linha["boxnum"]) . "</td>"; 
                echo "<td>" . htmlspecialchars($linha["boxloc"]) . "</td>"; 
                echo "</tr>"; } 
              } else { 
                echo "<tr>"; 
                echo "<td colspan='2'> Nenhum abrigo pendente </td>"; 
                echo "</tr>"; 
                } ?>
        </table>
        <?php
              $stmt->close(); 
              $conn->close(); 
        ?>
      </div>
      <section class="return-div">
        <a class="abutton register-btn" href="index.html">Voltar</a>
      </section>
      <footer class="foot">
        <a href="https://wa.me/5547988129920">
        <p>Powered By</p>
        <img src="../../../assets/icons/codesummit-black.png" alt="" />
        </a>
      </footer>
    </main>
  </body>
</html>
