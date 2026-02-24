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

    $name = trim(htmlspecialchars($_POST["name"] ?? ""));
    $surname = trim(htmlspecialchars($_POST["surname"] ?? ""));
    $email = trim(htmlspecialchars($_POST["email"] ?? ""));
    $age = $_POST["age"] ?? "";
    $password = $_POST["password"] ?? "";
    $passConfirm = $_POST["passwordConfirm"] ?? "";
    $cgu = isset($_POST["cgu"]);

    if (empty($name) || strlen($name) < 2 || strlen($name) > 50) {
        $erreurs[] = "Le nom doit contenir entre 2 et 50 caracteres.";
    }

    if (empty($surname) || strlen($surname) < 2 || strlen($surname) > 30) {
        $erreurs[] = "Le prenom doit contenir entre 2 et 30 caracteres.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = "L'adresse email n'est pas valide.";
    }

    if (!is_numeric($age) || $age < 16 || $age > 120) {
        $erreurs[] = "Vous devez avoir entre 16 et 120 ans.";
    }

    // Verification du mot de passe
    if (strlen($password) < 8) {
        $erreurs[] = "Le mot de passe doit contenir au moins 8 caracteres.";
    }

    if ($password !== $passConfirm) {
        $erreurs[] = "Les mots de passe ne correspondent pas.";
    }


    if (!$cgu) {
        $erreurs[] = "Vous devez accepter les conditions generales.";
    }

    if (empty($erreurs)) {
        $succes = true;
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        echo "Message envoyer avec succes";
    }

    

    var_dump($erreurs);
    var_dump($password);
    var_dump($passConfirm);
}


?>
<!-- Votre formulaire HTML ici -->
<form method="post" action="">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" value="<?= ($name ?? '') ?>"> <br><br>

    <label for="surname">Prenom :</label>
    <input type="text" id="surname" name="surname" value="<?= ($surname ?? '') ?>"> <br><br>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" value="<?= ($email ?? '') ?>"> <br><br>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" minlength="8"> <br><br>

    <label for="passwordConfirm">Confirmer votre mot de passe :</label>
    <input type="password" id="passwordConfirm" name="passwordConfirm" minlength="8"> <br><br>

    <label for="age">Age : </label>
    <input type="number" id="age" name="age" min="16" max="120"> <br><br>

    <label for="cgu">J'accepte les conditions générales :</label>
    <input type="checkbox" id="cgu" name="cgu" required> <br><br>

    <button type="submit">Envoyer</button>
</form>