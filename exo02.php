<?php 

$jeux = ["God Of War","Zelda", "Pokemon", "Hitman", "Flight Sim"];

echo "Le deuxieme jeu est : " . $jeux[1];
echo "<br>";

$jeuxStar = [
    "titre" => "The last of us",
    "prix" => 49.99,
    "genre" => "aventure",
    "stock" => 30
];

echo "Le jeux star est : " . $jeuxStar["titre"];
echo "<br>";

echo "Le prix du jeux star est : " . $jeuxStar["prix"];
echo "<br>";

echo "Le genre du jeux star est : " . $jeuxStar["genre"];
echo "<br>";

echo "Le nombre de jeux en stock du jeux star est de : " . $jeuxStar["stock"];
echo "<br>";


// A faire la boucle foreach

?>
