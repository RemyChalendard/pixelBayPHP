<?php
function promotionEte($prix) {
    return round($prix * 0.80, 2);
}

function promotionHiver($prix) {
    return round($prix * 0.70, 2);
}

function promotionSpeciale($prix, $pourcentage) {
    return round($prix * (1 - $pourcentage / 100), 2);
}

function afficherPrix($nomJeu, $prixOriginal, $prixReduit, $promo) {
    echo "$nomJeu : $prixOriginal € → $prixReduit € ($promo)<br>";
}

// Tests
$prixJeu = 59.99;
$nomJeu = "The Last Of US";

afficherPrix($nomJeu, $prixJeu, promotionEte($prixJeu), "Promo ete -20%");
afficherPrix($nomJeu, $prixJeu, promotionHiver($prixJeu), "Promo hiver -30%");
afficherPrix($nomJeu, $prixJeu, promotionSpeciale($prixJeu, 15), "Promo speciale -15%");
?>