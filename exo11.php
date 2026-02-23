<?php
$erreurs = [];
$succes = false;
$name = "";
$surname = "";
$email = "";
$password = "";
$age = "";

// Votre logique de validation ici
  if (empty($nom) || strlen($nom) < 2 || strlen($nom) > 50) {
        $erreurs[] = "Le nom doit contenir entre 2 et 50 caracteres.";
    }

    if (empty($prenom) || strlen($prenom) < 2 || strlen($prenom) > 30) {
        $erreurs[] = "Le prenom doit contenir entre 2 et 30 caracteres.";
    }

    if (empty($nom) || strlen($nom) < 2 || strlen($nom) > 30) {
        $erreurs[] = "Le nom doit contenir entre 2 et 30 caracteres.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = "L'adresse email n'est pas valide.";
    }

    if ($age < 16 || $age > 120) {
        $erreurs[] = "Vous devez avoir entre 16 et 120 ans.";
    }

    if (strlen($mdp) < 8) {
        $erreurs[] = "Le mot de passe doit contenir au moins 8 caracteres.";
    }

?>
<!-- Votre formulaire HTML ici -->
     <form method="post" action="">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="" required> <br><br>

        <label for="prenom">Prenom :</label>
        <input type="text" id="prenom" name="prenom" value="" required> <br><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="" required> <br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" minlength="8" required> <br><br>

        <button type="submit">Envoyer</button>
    </form>