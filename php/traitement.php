<?php
// Récupération des données du formulaire
$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$email = htmlspecialchars($_POST['email']);
$telephone = htmlspecialchars($_POST['telephone']);
$resume = htmlspecialchars($_POST['resume']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Mon CV - BENHY'S CvMAKER</title>
  <link rel="stylesheet" href="../css/style.css">
  <script src="../js/html2pdf.bundle.min.js"></script>
</head>
<body>
  <div id="cv">
    <h1><?php echo $prenom . ' ' . $nom; ?></h1>
    <p><strong>Email :</strong> <?php echo $email; ?></p>
    <p><strong>Téléphone :</strong> <?php echo $telephone; ?></p>
    <h2>Résumé Professionnel</h2>
    <p><?php echo nl2br($resume); ?></p>
  </div>

  <button onclick="downloadPDF()">📄 Télécharger en PDF</button>

  <script>
    function downloadPDF() {
      const element = document.getElementById("cv");
      html2pdf().from(element).save("Mon_CV.pdf");
    }
  </script>
</body>
</html>