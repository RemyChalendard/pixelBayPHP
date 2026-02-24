<?php
require_once 'data.php';

$genreFiltre = $_GET['genre'] ?? 'tout';
$prixFiltre = $_GET['prix'] ?? 'tout';

$resultats = [];

// Votre logique de filtrage ici
foreach ($catalogue as $jeu) {
    $genreOk = ($genreFiltre === 'tout' || $jeu['genre'] === $genreFiltre);
    $prix0k = true;

    $prixOk = true;
    if ($prixFiltre === 'moins30') {
        $prixOk = $jeu['prix'] < 30;
    } elseif ($prixFiltre === '30-50') {
        $prixOk = $jeu['prix'] >= 30 && $jeu['prix'] <= 50;
    } elseif ($prixFiltre === 'plus50') {
        $prixOk = $jeu['prix'] > 50;
    }

    if ($genreOk && $prixOk) {
        $resultats[] = $jeu;
    }

    // var_dump($jeu);
    // var_dump($prixFiltre);
}

?>
<!-- Votre formulaire et tableau HTML ici -->
 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Catalogue - PixelBay</title>
    <style>
        table { border-collapse: collapse; width: 600px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #2196F3; color: white; }
        form { margin-bottom: 20px; }
        select, button { padding: 8px; }
    </style>
</head>
<body>
    <h1>Catalogue PixelBay</h1>

    <form action="" method="GET">
        <label for="genre">Genre :</label>
        <select name="genre" id="genre">
            <option value="tout" <?= $genreFiltre === 'tout' ? 'selected' : '' ?>>Tous</option>
            <option value="Course" <?= $genreFiltre === 'Course' ? 'selected' : '' ?>>Course</option>
            <option value="RPG" <?= $genreFiltre === 'RPG' ? 'selected' : '' ?>>RPG</option>
            <option value="Action" <?= $genreFiltre === 'Action' ? 'selected' : '' ?>>Action</option>
            <option value="Aventure" <?= $genreFiltre === 'Aventure' ? 'selected' : '' ?>>Aventure</option>
            <option value="Puzzle" <?= $genreFiltre === 'Puzzle' ? 'selected' : '' ?>>Puzzle</option>
        </select>

        <label for="prix">Prix :</label>
        <select name="prix" id="prix">
            <option value="tout" <?= $prixFiltre === 'tout' ? 'selected' : '' ?>>Tous</option>
            <option value="moins30" <?= $prixFiltre === 'moins30' ? 'selected' : '' ?>>Moins de 30 €</option>
            <option value="30-50" <?= $prixFiltre === '30-50' ? 'selected' : '' ?>>30 - 50 €</option>
            <option value="plus50" <?= $prixFiltre === 'plus50' ? 'selected' : '' ?>>Plus de 50 €</option>
        </select>

        <button type="submit">Filtrer</button>
    </form>

    <p><?= count($resultats) ?> jeu(x) trouvé(s)</p>

    <table>
        <tr>
            <th>Titre</th>
            <th>Prix</th>
            <th>Genre</th>
            <th>Stock</th>
        </tr>
        <?php foreach ($resultats as $jeu): ?>
        <tr>
            <td><?= htmlspecialchars($jeu['titre']) ?></td>
            <td><?= $jeu['prix'] ?> €</td>
            <td><?= htmlspecialchars($jeu['genre']) ?></td>
            <td><?= $jeu['stock'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>