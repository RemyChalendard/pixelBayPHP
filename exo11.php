<?php
$erreurs = [];
$succes = false;
$name = "name";
$surname = "surname";
$email = "email";
$password = "password";

// Votre logique de validation ici
  if (empty($nom) || strlen($nom) < 2 || strlen($nom) > 50) {
        $erreurs[] = "Le nom doit contenir entre 2 et 50 caracteres.";
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