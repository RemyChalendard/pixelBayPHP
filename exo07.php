<?php
$collection = [
    [
        "titre" => "Dark picture 8088",
        "prix" => 49.99,
        "genre" => "Survie - Horreur",
        "stock" => 40,
        "scores" => [85, 89, 88, 92, 89]
    ],
    

    // Ajoutez au moins 3 autres jeux

    [
        "titre" => "The last of us",
        "prix" => 39.99,
        "genre" => "aventure",
        "stock" => 30,
        "scores" => [90, 89, 92, 88, 89]
    ],

    [
        "titre" => "Zelda breath of the wild",
        "prix" => 49.99,
        "genre" => "aventure",
        "stock" => 20,
        "scores" => [88, 89, 93, 90, 89]
    ],

    [
        "titre" => "God of war ragnarock",
        "prix" => 49.99,
        "genre" => "aventure",
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

// Vos fonctions ici

function afficherJeu($jeu)
{
    echo "<br>Titre : " . $jeu['titre'] . "<br>";
    echo " Prix :  " . $jeu['prix'] . "<br>";
    echo " Genre : " . $jeu['genre'] . "<br>";
    echo " Stock : " . $jeu['stock'] . "<br>";
    echo " Score : " . ($jeu['scores'] ?? "") . "<br>";
}

echo "Jeux Pixel Bay<br>";
foreach ($collection as $jeu) {
    afficherJeu($jeu);
}

function moyenneScores($jeu) {
    foreach ($jeu['scores'] as $score) {
        $somme += $score;
    }
    return array_sum($jeu['scores']) / count($jeu['scores']);
}


/*
function trouverMeilleurJeu($collection) {
foreach ($collection['moyenneScores'] as $moyenneScore){
    $moyenneScore > 

}
}

*/