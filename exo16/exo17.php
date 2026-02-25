<?php
require_once 'config.php';

// Récupérer les genres pour le select
// Construire la requête filtrée
// Afficher les résultats

$genre = ['Course','RPG','Action','Aventure','Simulation','Sport','Course', "Puzzle"];

$genreFiltre = $_GET['genre'] ?? 'tout';
$prixFiltre = $_GET['prix'] ?? 'tout';

echo "Genre sélectionné : $genreFiltre, Prix sélectionné : $prixFiltre";
var_dump($genreFiltre);
var_dump($prixFiltre);


$conditions = [];
$params = [];


if ($genreFiltre !== 'tout') {
    $conditions[] = "genre = :genre";
    $params[':genre'] = $genreFiltre;
}
    
if ($prixFiltre !== 'moins30') {
    $conditions[] = "prix < 30";
} elseif ($prixFiltre === '30-50') {
    $conditions[] = "prix >= 30 AND prix < 50";
} elseif ($prixFiltre === 'plus50') {
    $conditions[] = "prix >= 50";
}

$sql = "SELECT * FROM jeux";





?>
