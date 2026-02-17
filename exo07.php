<?php
$collection = [
    [
        "titre" => "Dark picture 8088",
        "prix" => 49.99,
        "genre" => "Survie - Horreur",
        "stock" => 40,
        "scores" => [85, 89, 88, 92, 89]
    ],
    [
        "titre" => "The last of us",
        "prix" => 39.99,
        "genre" => "Aventure",
        "stock" => 30,
        "scores" => [90, 89, 92, 88, 89]
    ],
    [
        "titre" => "Zelda Breath of the Wild",
        "prix" => 49.99,
        "genre" => "Aventure",
        "stock" => 20,
        "scores" => [88, 89, 93, 90, 89]
    ],
    [
        "titre" => "God of War Ragnarock",
        "prix" => 49.99,
        "genre" => "Aventure",
        "stock" => 20,
        "scores" => [87, 91, 92, 89, 89]
    ],
    [
        "titre" => "Flight Sim",
        "prix" => 49.99,
        "genre" => "Simulation",
        "stock" => 20,
        "scores" => [91, 91, 89, 94, 90]
    ],
];

function moyenneScores($jeu) {
    if ($jeu['scores']) {
    }
    return array_sum($jeu['scores']) / count($jeu['scores']);
}

function afficherJeu($jeu)
{
    echo "<br>Titre : " . $jeu['titre'] . "<br>";
    echo "Prix : " . $jeu['prix'] . "<br>";
    echo "Genre : " . $jeu['genre'] . "<br>";
    echo "Stock : " . $jeu['stock'] . "<br>";
    echo "Score moyen : " . (moyenneScores($jeu)) . "<br>";
}

echo "Jeux Pixel Bay<br>";
foreach ($collection as $jeu) {
    afficherJeu($jeu);
}



/*
function trouverMeilleurJeu($collection) {
foreach ($collection['moyenneScores'] as $moyenneScore){
    $moyenneScore > 

}
}

*/