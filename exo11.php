<?php
$erreurs = [];
$succes = false;
$name = "";
$surname = "";
$email = "";
$password = "";
$passConfirm = "";
$age = "";
$cgu = "";

// Votre logique de validation ici

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = trim($_POST["nom"] ?? "");
    $prenom = trim($_POST["prenom"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";
    $passConfirm = $_POST["passwordConfirm"] ?? "";
    $age = intval($_POST["age"] ?? 0);
    $cgu = isset($_POST["cgu"]) ? true : false;
}


// Boucles de validation
if (empty($nom) || strlen($nom) < 2 || strlen($nom) > 50) {
    $erreurs[] = "Le nom doit contenir entre 2 et 50 caracteres.";
} else {
    $succesMessages[] = "Nom valide.";
}


if (empty($prenom) || strlen($prenom) < 2 || strlen($prenom) > 30) {
    $erreurs[] = "Le prenom doit contenir entre 2 et 30 caracteres.";
} else {
    $succesMessages[] = "Prenom valide.";
}


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erreurs[] = "L'adresse email n'est pas valide.";
} else {
    $succesMessages[] = "Email valide.";
}


if ($age < 16 || $age > 120) {
    $erreurs[] = "Vous devez avoir entre 16 et 120 ans.";
} else {
    $succesMessages[] = "Age valide.";
}


if (strlen($password) < 8) {
    $erreurs[] = "Le mot de passe doit contenir au moins 8 caracteres.";
} elseif ($password !== $passConfirm) {
    $erreurs[] = "Les mots de passe ne correspondent pas.";
} else {
    $succesMessages[] = "Mot de passe valide.";
}


if (!$cgu) {
    $erreurs[] = "Vous devez accepter les conditions generales.";
} else {
    $succesMessages[] = "Conditions generales acceptees.";
}


if (empty($erreurs)) {
    $succes = true;
    $messageFinal = "Inscription reussie !";
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

    <label for="passwordConfirm">Confirmer votre mot de passe :</label>
    <input type="password" id="passwordConfirm" name="passwordConfirm" minlength="8" required> <br><br>

    <label for="age">Age : </label>
    <input type="number" id="age" name="age" min="16" max="120" required> <br><br>

    <label for="cgu">J'accepte les conditions générales :</label>
    <input type="checkbox" id="cgu" name="cgu" required> <br><br>

    <button type="submit">Envoyer</button>
</form>