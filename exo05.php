<?php 

$stockActuel = 12;
$stockCible = 100;
$parLivraison = 8;
$nbLivraisons = 0;

echo "Debut du reapprovisionnement :<br>";

while ($stockActuel < $stockCible) {
    $stockActuel += $parLivraison;
    $nbLivraisons++;
    echo "Livraison $nbLivraisons : stock = $stockActuel<br>";
}


// Exercice 2 : Calendrier avec for
$mois = ["<br>Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin",
         "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre"];

$jeuxPhares = ["Cyber Race", "Pixel Quest", "Block Master", "Sky Pilot",
               "Dungeon Crawl", "Mystic Lands", "Battle Arena", "Escape Room",
               "Neural Rush", "Horror House", "Festival Games", "Winter Sports"];

echo "<br>Calendrier PixelBay<br>";

for ($i = 0; $i < count($mois); $i++) {
    echo $mois[$i]. ": " . $jeuxPhares[$i] . "<br>";
}

?>



