<?php 
$array = [1, 2, 3, 17];

foreach ($array as $key => $value) {
   echo ":)$key => $value.\n";
}

echo "<br>";

$array = [
    "un" => 1,
    "deux" => 2,
    "trois" => 3,
    "dix-sept" => 17
];

foreach ($array as $key => $value) {
    echo ":)$key => $value.\n";
}

echo "<br>";

$grid = [];
$grid[0][0] = "a";
$grid[0][1] = "b";
$grid[1][0] = "y";
$grid[1][1] = "z";

foreach ($grid as $y => $row) {
    foreach ($row as $x => $value) {
        echo "Valeur à la position x=$x et y=$y : $value\n";
    }
}

?>