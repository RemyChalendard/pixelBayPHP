<?php
$catalogue = [
    ["titre" => "Cyber Race", "prix" => 49.99, "genre" => "Course"],
    ["titre" => "Dungeon Crawl", "prix" => 39.99, "genre" => "RPG"],
    ["titre" => "Battle Arena", "prix" => 29.99, "genre" => "Action"],
    ["titre" => "Pixel Quest", "prix" => 19.99, "genre" => "Aventure"],
    ["titre" => "Cyber Punk 2084", "prix" => 59.99, "genre" => "RPG"],
    ["titre" => "Racing Thunder", "prix" => 34.99, "genre" => "Course"]
];

$resultat = [];
$recherche = "";

// Votre code de recherche ici
if (isset($_GET['q']) && !empty($_GET['q'])) {
    $recherche = trim($_GET['q']);

    foreach ($catalogue as $jeu) {
        $titre = $jeu['titre']; 
        if (str_contains(strtolower($titre), strtolower($recherche))) {
            $resultat[] = $jeu;
        }
    }
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche - PixelBay</title>
</head>
<body>
    <h1>Recherche PixelBay</h1>
    <form action="" method="GET">
        <input type="text" name="q" placeholder="Rechercher un jeu..."
               value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
        <button type="submit">Rechercher</button>
    </form>

    <!-- Affichez les résultats ici -->
</body>
</html>
