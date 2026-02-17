<?php
$codeRayon = "R";

echo "Code rayon : $codeRayon <br>";

switch ($codeRayon) {
    case "A":
        echo "Rayon Action Aventure : Allee numero 1";
        break;

    case "R":
        echo "Rayon RPG :  Allee numero 2";
        break;

    case "S":
        echo "Rayon Sport :  Allee numero 3";
        break;

    case "C":
        echo "Rayon Course : Allee numero 4";
        break;

    case "P":
        echo "Rayon Puzzle Reflexion : Allee numero 5";
        break;

    default:
        echo "Inconnu";
}
?>