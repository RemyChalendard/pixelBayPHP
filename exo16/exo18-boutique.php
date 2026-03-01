<?php
session_start();
require_once 'config.php';
$_SESSION['panier'] ??= [];

if (isset($_POST['ajouter'])) {
    $idJeu = intval($_POST['ajouter']);
    
    $stmt = $pdo->prepare("SELECT * FROM jeux WHERE id = ? AND stock > 0");
    $stmt->execute([$idJeu]);
    $jeu = $stmt->fetch();

    if ($jeu) {
        $index = array_search($idJeu, array_column($_SESSION['panier'], 'id'));
        
        if ($index !== false) {
            if ($_SESSION['panier'][$index]['quantite'] < $jeu['stock']) {
                $_SESSION['panier'][$index]['quantite']++;
            }
        } else {
            $_SESSION['panier'][] = [
                'id'       => $jeu['id'],
                'titre'    => $jeu['titre'],
                'prix'     => $jeu['prix'],
                'quantite' => 1
            ];
        }
    }

    header("Location: exo18-boutique.php");
    exit;
}

$catalogue   = $pdo->query("SELECT * FROM jeux ORDER BY titre")->fetchAll();
$nbArticles  = array_sum(array_column($_SESSION['panier'], 'quantite'));
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Boutique - PixelBay</title>
    <style>
        .catalogue { display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; max-width: 800px; }
        .jeu       { border: 2px solid #333; padding: 15px; border-radius: 8px; }
        .rupture   { opacity: 0.5; }
        .panier-lien { background: #4CAF50; color: white; padding: 10px 20px;
                       text-decoration: none; border-radius: 5px; display: inline-block; margin-bottom: 20px; }
        button          { padding: 8px 15px; background: #2196F3; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:disabled { background: #9E9E9E; cursor: not-allowed; }
    </style>
</head>
<body>
    <h1>Boutique PixelBay</h1>
    <a class="panier-lien" href="exo18-panier.php">Panier (<?= $nbArticles ?>)</a>

    <div class="catalogue">

        <?php foreach ($catalogue as $jeu):
            $enRupture = $jeu['stock'] <= 0;
        ?>
        <div class="jeu <?= $enRupture ? 'rupture' : '' ?>">
            <h3><?= htmlspecialchars($jeu['titre']) ?></h3>
            <p><?= $jeu['prix'] ?> € — Stock : <?= $jeu['stock'] ?></p>
            <p><em><?= htmlspecialchars($jeu['genre']) ?></em></p>
            <form method="POST">
                <button type="submit" name="ajouter" value="<?= $jeu['id'] ?>" <?= $enRupture ? 'disabled' : '' ?>>
                    <?= $enRupture ? 'Rupture de stock' : 'Ajouter au panier' ?>
                </button>
            </form>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>