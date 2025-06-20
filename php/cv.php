<?php
// Vérifie que les données ont bien été envoyées
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "Aucune donnée à afficher.";
    exit;
}

// Récupération des données
$nom = $_POST["nom"] ?? "";
$prenom = $_POST["prenom"] ?? "";
$date_naissance = $_POST["date_naissance"] ?? "";
$email = $_POST["email"] ?? "";
$adresse = $_POST["adresse"] ?? "";
$loisirs = $_POST["loisirs"] ?? "";
$formations = $_POST["formations"] ?? "";
$competences = $_POST["competences"] ?? "";
$experiences = $_POST["experiences"] ?? "";
$photo = $_FILES["photo"]["name"] ?? "";
$photo_path = "photos/" . $photo;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon CV</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="cv-container" id="cv">

    <!-- Partie gauche -->
    <div class="cv-left">
        <?php if ($photo && file_exists($photo_path)): ?>
            <img src="<?php echo $photo_path; ?>" alt="Photo de profil">
        <?php endif; ?>

        <h2><?php echo htmlspecialchars($prenom . " " . $nom); ?></h2>

        <p><strong>Date de naissance :</strong><br> <?php echo htmlspecialchars($date_naissance); ?></p>
        <p><strong>Email :</strong><br> <?php echo htmlspecialchars($email); ?></p>
        <p><strong>Adresse :</strong><br> <?php echo nl2br(htmlspecialchars($adresse)); ?></p>
        <p><strong>Loisirs :</strong><br> <?php echo nl2br(htmlspecialchars($loisirs)); ?></p>
    </div>

    <!-- Partie droite -->
    <div class="cv-right">
        <section>
            <h3>Formations</h3>
            <p><?php echo nl2br(htmlspecialchars($formations)); ?></p>
        </section>

        <section>
            <h3>Compétences</h3>
            <p><?php echo nl2br(htmlspecialchars($competences)); ?></p>
        </section>

        <section>
            <h3>Expériences</h3>
            <p><?php echo nl2br(htmlspecialchars($experiences)); ?></p>
        </section>
    </div>
</div>

<!-- Bouton pour télécharger en PDF -->
<div class="pdf-button-container">
    <button id="download-pdf">Télécharger le CV en PDF</button>
</div>

<!-- Script pour PDF -->
<script src="js/html2pdf.bundle.min.js"></script>
<script>
    document.getElementById("download-pdf").addEventListener("click", function () {
        const element = document.getElementById("cv");
        html2pdf().from(element).save("Mon_CV.pdf");
    });
</script>

</body>
</html>