<?php
$erreurs = [];
$succes = false;

$nom = '';
$prenom = '';
$email = '';
$sujets = ["Question", "Réclamation", "Partenariat", "Autre"];
$message = '';

// Votre logique de traitement ici
// var_dump($_SERVER);
// var_dump($_SERVER['REQUEST_METHOD']); 
// echo "<br>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = trim($_POST['nom'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $mail = filter_var(trim($_POST['email'] ?? ''));
    $sujet = trim($_POST['sujet'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (strlen($nom) < 2 || strlen($nom) > 50) {
        $erreurs[] = "Le nom doit contenir entre 2 et 50 caracteres.";
    } else {
        $succes = " Formulaire valide";
    }

    var_dump($nom);
    var_dump($prenom);
    var_dump($email);
    var_dump($sujet);
    var_dump($message);
}


    // Affichez les erreurs ou le message de succès 

  if (empty($nom) || strlen($nom) < 2 || strlen($nom) > 50) {
        $erreurs[] = "Le nom doit contenir entre 2 et 50 caracteres.";
    }

    if (empty($sujet)) {
        $erreurs[] = "Veuillez selectionner un sujet.";
    }

    if (empty($message) || strlen($message) < 10) {
        $erreurs[] = "Le message doit contenir au moins 10 caracteres.";
    }

    if (empty($erreurs)) {
        $succes = true;
    }

?>

<style>
    h1 {
        text-align: center;
        color: white;

    }

    form {
        text-align: center;
        background-color: magenta;

    }

    header {
        background-color: magenta;

    }

    label {

        font-weight: bold;
        padding: 8px;

    }

   .succes {
     color : green;

    }

   .error {

    color:red;
   
    }


</style>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Contact - PixelBay</title>
</head>

<body>
    <header>
        <h1>Contactez PixelBay</h1>
    </header>

    <form method="post" action="">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="" required> <br><br>

        <label for="prenom">Prenom :</label>
        <input type="text" id="prenom" name="prenom" value="" required> <br><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="" required> <br><br>

        <label for="sujet">Sujet :</label>
        <select name="sujet" id="sujet">

            <!-- Il faut du php dans la boucle -->
            <option value="">--Please choose an option--</option>
            <?php foreach ($sujets as $sujet): ?>
                <option value="<?= htmlspecialchars($sujet) ?>"><?= htmlspecialchars($sujet) ?></option>
            <?php endforeach ?>
        </select>
        </select>

        <label for="message">Message :</label>
        <textarea id="message" name="message" minlength="10" required></textarea> <br><br>

        <button type="submit">Envoyer</button>
    </form>






</body>

</html>