<?php
$commande = [
    ["nom" => "Cyber Race", "prix_unitaire" => 49.99, "quantite" => 2],
    ["nom" => "Manette Pro", "prix_unitaire" => 59.99, "quantite" => 1],
    ["nom" => "Carte Mémoire 128Go", "prix_unitaire" => 24.99, "quantite" => 3]
];
$tva = 20;

// Vos fonctions et votre code HTML ici
function calculerTTC($prixHT, $tva)
{
    return round($prixHT * (1 + $tva / 100), 2);
}

$totalHT = 0;

foreach ($commande as $article) {
    $totalHT += $article['prix_unitaire'] * $article['quantite'];
}
$montantTVA = round($totalHT * $tva / 100, 2);
$totalTTC = calculerTTC($totalHT, $tva);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture PixelBay</title>
    <style>
        table { border-collapse: collapse; width: 500px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #2196F3; color: white; }
        .total { font-weight: bold; background-color: #f0f0f0; }
    </style>
</head>
<body>
    <h1>Facture PixelBay</h1>
    <table>
        <tr>
            <th>Article</th>
            <th>Prix unitaire</th>
            <th>Quantité</th>
            <th>Sous-total</th>
        </tr>
        <?php foreach ($commande as $article): ?>
        <tr>
            <td><?= $article['nom'] ?></td>
            <td><?= $article['prix_unitaire'] ?> €</td>
            <td><?= $article['quantite'] ?></td>
            <td><?= round($article['prix_unitaire'] * $article['quantite'], 2) ?> €</td>
        </tr>
        <?php endforeach; ?>
        <tr class="total">
            <td colspan="3">Total HT</td>
            <td><?= round($totalHT, 2) ?> €</td>
        </tr>
        <tr class="total">
            <td colspan="3">TVA (<?= $tva ?>%)</td>
            <td><?= $montantTVA ?> €</td>
        </tr>
        <tr class="total">
            <td colspan="3">Total TTC</td>
            <td><?= $totalTTC ?> €</td>
        </tr>
    </table>
</body>
</html>