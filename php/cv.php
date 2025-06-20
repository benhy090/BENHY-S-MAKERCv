<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = htmlspecialchars($_POST["nom"] ?? '');
    $prenom = htmlspecialchars($_POST["prenom"] ?? '');
    $date_naissance = htmlspecialchars($_POST["date_naissance"] ?? '');
    $email = htmlspecialchars($_POST["email"] ?? '');
    $adresse = htmlspecialchars($_POST["adresse"] ?? '');
    $loisirs = htmlspecialchars($_POST["loisirs"] ?? '');
    $formations = htmlspecialchars($_POST["formations"] ?? '');
    $competences = htmlspecialchars($_POST["competences"] ?? '');
    $experiences = htmlspecialchars($_POST["experiences"] ?? '');

    // Traitement photo
    $photoPath = "";
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $fileTmpPath = $_FILES['photo']['tmp_name'];
        $fileName = basename($_FILES['photo']['name']);
        $photoPath = $uploadDir . $fileName;
        move_uploaded_file($fileTmpPath, $photoPath);
    }
} else {
    echo "Aucune donnée à afficher.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Votre CV</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="cv-body">
    <div class="cv-container" id="cv">
        <div class="cv-left">
            <?php if (!empty($photoPath)): ?>
                <img src="<?php echo $photoPath; ?>" alt="Photo" class="photo-cv">
            <?php endif; ?>
            <h2><?php echo $prenom . " " . $nom; ?></h2>
            <p><strong>Date de naissance :</strong> <?php echo $date_naissance; ?></p>
            <p><strong>Email :</strong> <?php echo $email; ?></p>
            <p><strong>Adresse :</strong> <?php echo $adresse; ?></p>
            <p><strong>Loisirs :</strong> <?php echo $loisirs; ?></p>
        </div>

        <div class="cv-right">
            <section>
                <h3>Formations</h3>
                <p><?php echo nl2br($formations); ?></p>
            </section>
            <section>
                <h3>Compétences</h3>
                <p><?php echo nl2br($competences); ?></p>
            </section>
            <section>
                <h3>Expériences</h3>
                <p><?php echo nl2br($experiences); ?></p>
            </section>
        </div>
    </div>

    <div class="pdf-button-container">
        <button id="download-pdf" onclick="downloadPDF()">Télécharger le CV en PDF</button>
    </div>

    <script src="js/html2pdf.bundle.min.js"></script>
    <script>
        function downloadPDF() {
            const element = document.getElementById("cv");
            html2pdf().from(element).save("cv-benhy.pdf");
        }
    </script>
</body>
</html>