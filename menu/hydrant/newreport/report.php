<!-- <?php

session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../index.php");
    exit;
}

include $_SERVER['DOCUMENT_ROOT'] . '/../connect.php';

$sql = " SELECT *,
        (
            (CASE WHEN hose1 LIKE ? THEN 0 ELSE 1 END) +
            (CASE WHEN hose2 LIKE ? THEN 0 ELSE 1 END) +
            (CASE WHEN hose3 LIKE ? THEN 0 ELSE 1 END) +
            (CASE WHEN hose4 LIKE ? THEN 0 ELSE 1 END) +
            (CASE WHEN hose5 LIKE ? THEN 0 ELSE 1 END) +
            (CASE WHEN hose6 LIKE ? THEN 0 ELSE 1 END) +
            (CASE WHEN hose7 LIKE ? THEN 0 ELSE 1 END)
        ) AS vencendo
    FROM boxdata";

$stmt = $conn->prepare($sql);
$busca = '';
$stmt->bind_param("sssssss", $busca, $busca, $busca, $busca, $busca, $busca, $busca);

// Executa e pega resultados
$stmt->execute();
$resultado = $stmt->get_result();
?>
-->

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.22/jspdf.plugin.autotable.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="zones.css" />
    <link rel="stylesheet" href="../../../colors.css" />
    <title>Tabela para PDF</title>
  </head>
  <body>
    <section class="main-menu">
      <header class="logo"><img src="../../../assets/icons/logo.png" alt="" /></header>
      <h1 class="main-menu-title">Fire Atlas</h1>
      <section class="buttons-section">
        <p class="success-message"></p>
        <button class="buttons" onclick="gerarPDF()">Gerar Relatório</button>
      </section>
      <section class="return-div-b">
        <a class="abutton register-btn" href="../">Voltar</a>
      </section>
      <footer class="foot">
        <a href="https://wa.me/5547988129920">
          <p>Powered By</p>
          <img src="../../../assets/icons/codesummit-black.png" alt="" />
        </a>
      </footer>
    </section>

    <!-- Tabela de exemplo -->
    <section class="visible">
      <table id="tabela">
        <thead>
          <tr>
            <th>Nº</th>
            <th>LOCAL</th>
            <th>LACRE</th>
            <th>MANG.</th>
            <th>AGULHETA</th>
            <th>ELKHART</th>
            <th>CHAVES</th>
            <th>DATA</th>
            <th>RESP.</th>
            <th>OBS</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($resultado->num_rows > 0) { while ($linha = $resultado->fetch_assoc()) { echo "
          <tr>
            "; echo "
            <td>" . htmlspecialchars($linha["boxnum"]) . "</td>
            "; echo "
            <td>" . htmlspecialchars($linha["boxloc"]) . "</td>
            "; echo "
            <td>" . htmlspecialchars($linha["boxlacre"]) . "</td>
            "; echo "
            <td>" . htmlspecialchars($linha["vencendo"]) . "</td>
            "; echo "
            <td>" . htmlspecialchars($linha["nozzle"]) . "</td>
            "; echo "
            <td>" . htmlspecialchars($linha["elkhart"]) . "</td>
            "; echo "
            <td>" . htmlspecialchars($linha["wrench"]) . "</td>
            "; echo "
            <td>" . htmlspecialchars($linha["daymonth"]) . "</td>
            "; echo "
            <td>" . htmlspecialchars($linha["resp"]) . "</td>
            "; echo "
            <td>" . htmlspecialchars($linha["obs"]) . "</td>
            "; echo "
          </tr>
          "; }} ?>
        </tbody>
      </table>
    </section>

    <script src="script.js"></script>
  </body>
</html>
