<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    $_SESSION['cv'] = $_POST;

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo_name = basename($_FILES['photo']['name']);
        $target_path = "photos/" . $photo_name;

        move_uploaded_file($_FILES['photo']['tmp_name'], $target_path);
        $_SESSION['cv']['photo'] = $target_path;
    }

    header("Location: cv.php");
    exit();
} else {
    echo "Accès non autorisé.";
}