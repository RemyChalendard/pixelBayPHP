<? 
session_start();
require_once 'config.php';

// if (isset($_SESSION['user_id'])) {
//     header("Location: dashboard.php");
//     exit;
// }   

// var_dump($_SESSION);

$erreur = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars(filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL));
    $password = ($_POST['password'] ?? '');

   
    if (empty($email) || empty($password)) {
        $erreur = "Veuillez remplir tous les champs.";

    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch();
        // var_dump($user);
      
        if ($user && password_verify($password, $user['password'])) {
            
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['prenom'] . ' ' . $user['nom'];
            $_SESSION['user_role'] = $user['role'];
            header("Location: dashboard.php");
            exit;
        } else {
            $erreur = "Email ou mot de passe incorrect.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - PixelBay</title>
    <style>
        form { max-width: 400px; margin: 50px auto; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input { width: 100%; padding: 8px; margin-top: 4px; }
        button { margin-top: 15px; padding: 10px 20px; }
        .erreur { color: red; }
    </style>
</head>
<body>
    <form action="" method="POST">
        <h1>Connexion PixelBay</h1>

        <?php if (!empty($erreur)): ?>
            <p class="erreur"><?= $erreur ?></p>
        <?php endif; ?>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Se connecter</button>
        <p><a href="inscription.php">Pas de compte ? Inscrivez-vous</a></p>
    </form>
</body>
</html>