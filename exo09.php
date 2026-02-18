<?php
$catalogue = [
    ["titre" => "Cyber Race", "prix" => 49.99, "genre" => "Course"],
    ["titre" => "Dungeon Crawl", "prix" => 39.99, "genre" => "RPG"],
    ["titre" => "Battle Arena", "prix" => 29.99, "genre" => "Action"],
    ["titre" => "Pixel Quest", "prix" => 19.99, "genre" => "Aventure"],
    ["titre" => "Cyber Punk 2084", "prix" => 59.99, "genre" => "RPG"],
    ["titre" => "Racing Thunder", "prix" => 34.99, "genre" => "Course"]
];

$resultats = [];
$recherche = "";

// Recherche
if (isset($_GET['q']) && !empty($_GET['q'])) {
    $recherche = trim($_GET['q']);

    foreach ($catalogue as $jeu) {
        $titre = $jeu['titre'];
        if (str_contains(strtolower($titre), strtolower($recherche))) {
            $resultats[] = $jeu;
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

    <?php if (!empty($recherche)) : ?>
        <h2>Résultats pour "<?= htmlspecialchars($recherche); ?>"</h2>

    <?php if (!empty($resultats)) : ?>
            <?php foreach ($resultats as $jeu): ?>
                <li>
                    <strong><?= htmlspecialchars($jeu['titre']) ?></strong>
                    - <?= $jeu['prix'] ?> €
                    (<?= htmlspecialchars($jeu['genre']) ?>)
                </li>
            <?php endforeach; ?>
            <p><?= count($resultats) ?> résultat(s) trouvé(s).</p>
            <?php else: ?>
                <p>Aucun jeu trouvé pour "<?= htmlspecialchars($recherche) ?>".</p>
            <?php endif; ?>
            <?php endif; ?>
</body>
</html>
