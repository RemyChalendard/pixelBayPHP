<?php
$erreurs = [];
$succes = false;

$nom = '';
$prenom = '';
$email = '';
$sujet = '';
$message = '';

// Votre logique de traitement ici
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = trim($_POST['nom'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $mail = filter_var (trim($_POST['email'] ?? ''));
    $sujet = trim($_POST['sujet'] ?? '');
    $message = trim($_POST['message'] ?? '');

  if (strlen($nom) < 2 || strlen($nom) > 50) {
        $erreurs[] = "Le nom doit contenir entre 2 et 50 caracteres.";

        if (strlen($nom) > 2 || strlen($nom) < 50) {
           $succes = " Formulaire valide";
        }
  }

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact - PixelBay</title>
</head>
<body>
    <h1>Contactez PixelBay</h1>

    <!-- Affichez les erreurs ou le message de succès -->
    <!-- Votre formulaire ici -->
</body>
</html>

