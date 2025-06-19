<?php
session_start();

if (!isset($_SESSION['cv'])) {
    echo "Aucune donnée à afficher.";
    exit();
}

$data = $_SESSION['cv'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>CV de <?= htmlspecialchars($data['prenom']) ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="cv-body">
    <div class="cv-wrapper">
        <!-- Partie gauche : Infos personnelles -->
        <div class="cv-colonne gauche">
            <?php if (!empty($data['photo'])): ?>
                <img src="<?= htmlspecialchars($data['photo']) ?>" alt="Photo de profil" class="cv-photo">
            <?php endif; ?>
            <div class="cv-info">
                <p><strong>Nom :</strong> <?= htmlspecialchars($data['nom']) ?></p>
                <p><strong>Prénom :</strong> <?= htmlspecialchars($data['prenom']) ?></p>
                <p><strong>Date de naissance :</strong> <?= htmlspecialchars($data['date_naissance']) ?></p>
                <p><strong>Email :</strong> <?= htmlspecialchars($data['email']) ?></p>
                <p><strong>Adresse :</strong> <?= htmlspecialchars($data['adresse']) ?></p>
                <p><strong>Loisirs :</strong> <?= nl2br(htmlspecialchars($data['loisirs'])) ?></p>
            </div>
        </div>

        <!-- Partie droite : Compétences & expériences -->
        <div class="cv-colonne droite">
            <div class="cv-section">
                <h3>Formations</h3>
                <p><?= nl2br(htmlspecialchars($data['formation'])) ?></p>
            </div>
            <div class="cv-section">
                <h3>Compétences</h3>
                <p><?= nl2br(htmlspecialchars($data['competences'])) ?></p>
            </div>
            <div class="cv-section">
                <h3>Expériences</h3>
                <p><?= nl2br(htmlspecialchars($data['experience'])) ?></p>
            </div>
        </div>
    </div>
</body>
</html>