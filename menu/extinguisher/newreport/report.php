<!-- <?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../index.php");
    exit;
}

include $_SERVER['DOCUMENT_ROOT'] . '/../connect.php';

  // Prepara a consulta SQL com LIKE
$sql = "SELECT * FROM testingdata";
$stmt = $conn->prepare($sql);

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
            <th>TIPO</th>
            <th>PESO</th>
            <th>LOCAL</th>
            <th>VAL. CARGA</th>
            <th>VAL. HIDRO</th>
            <th>LACRE</th>
            <th>PINTURA</th>
            <th>PRESSAO</th>
            <th>INSPEÇÃO</th>
            <th>RESP</th>
            <th>OBS</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($resultado->num_rows > 0) { while ($linha = $resultado->fetch_assoc()) { echo "
          <tr>
            "; echo "
            <td>" . htmlspecialchars($linha["extingnumber"]) . "</td>
            "; echo "
            <td>" . htmlspecialchars($linha["extingtype"]) . "</td>
            "; echo "
            <td>" . htmlspecialchars($linha["extingcapacity"]) . "</td>
            "; echo "
            <td>" . htmlspecialchars($linha["extloc"]) . "</td>
            "; echo "
            <td>" . htmlspecialchars($linha["contentdata"]) . "</td>
            "; echo "
            <td>" . htmlspecialchars($linha["cilinderdata"]) . "</td>
            "; echo "
            <td>" . htmlspecialchars($linha["extlacre"]) . "</td>
            "; echo "
            <td>" . htmlspecialchars($linha["extsolo"]) . "</td>
            "; echo "
            <td>" . htmlspecialchars($linha["extpress"]) . "</td>
            "; echo "
            <td>" . htmlspecialchars($linha["daymonth"]) . "</td>
            "; echo "
            <td>" . htmlspecialchars($linha["extresp"]) . "</td>
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
