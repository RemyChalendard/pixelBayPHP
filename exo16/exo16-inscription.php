<?php
session_start();
require_once 'config.php';

$erreurs = [];
$succes = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = htmlspecialchars(trim($_POST['prenom'] ?? ''));
    $nom = htmlspecialchars(trim($_POST['nom'] ?? ''));
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $password = ($_POST['password'] ?? '');
    $password_confirm = ($_POST['password_confirm'] ?? '');

    //Verification Prenom et Nom
    if (empty($prenom) || strlen($prenom) < 2) {
        $erreurs[] = "Le prenom est requis et doit contenir au moins 2 caracteres.";
    }

    if (empty($nom) || strlen($nom) < 2) {
        $erreurs[] = "Le nom est requis et doit contenir au moins 2 caracteres.";
    }

    // Verification du Mail 
    if (empty($email)) {
        $erreurs[] = "L'email est requis.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = "L'email n'est pas valide.";
    }

    // Verifie si le mail existe deja dans la BDD
    if (empty($erreurs)) {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->execute([':email' => $email]);
        if ($stmt->fetch()) {
            $erreurs[] = "Cet email est déjà utilisé.";
        }
    }

    // Verification du Mot de Passe
    if (empty($password)) {
        $erreurs[] = "Le mot de passe est requis.";
    } elseif (strlen($password) < 6) {
        $erreurs[] = "Le mot de passe doit contenir au moins 6 caracteres.";
    }

    // Verification de la Confirmation du Mot de Passe
    if ($password !== $password_confirm) {
        $erreurs[] = "La confirmation du mot de passe ne correspond pas.";
    }

  // Insertion dans la BDD
  if (empty($servers)) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare(
            "INSERT INTO users (prenom, nom, email, password) VALUES (:prenom, :nom, :email, :password)"
            );
        $stmt->execute([
            ':prenom' => $prenom,
            ':nom' => $nom,
            ':email' => $email,
            ':password' => $password_hash
        ]);
        $succes = true;
    }
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - PixelBay</title>
    <style>
        form { max-width: 400px; margin: 20px auto; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input { width: 100%; padding: 8px; margin-top: 4px; }
        button { margin-top: 15px; padding: 10px 20px; }
        .erreur { color: red; }
        .succes { color: green; }
    </style>
</head>
<body>
    <form action="" method="POST">
        <h1>Inscription PixelBay</h1>

    <?php if ($succes): ?>
        <p class="succes">Inscription réussie ! Vous pouvez maintenant vous connecter.
        <a href="exo16-connexion.php">Se connecter</a></p>
    <?php else: ?>

        <?php if (!empty($erreurs)): ?>
            <div class="erreur">
                <ul>
                    <?php foreach ($erreurs as $erreur): ?>
                        <li><?= $erreur ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>

        <label for="password_confirm">Confirmez le mot de passe :</label>
        <input type="password" id="password_confirm" name="password_confirm" required>

        <button type="submit">S'inscrire</button>
        <p><a href="exo16-connexion.php">Déjà un compte ? Se connecter</a></p>
        <?php endif; ?>
    </form>
</body>
</html>