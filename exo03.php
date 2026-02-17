<?php 
$chiffreAffaires = 3500; 

echo "chiffre d'affaire de la journee : $chiffreAffaires €<br>";

if ($chiffreAffaires > 5000) {
    echo "Decision : Commander de nouveaux stocks";
} elseif ($chiffreAffaires >= 2000) {
    echo "Decision : Maintenir la strategie actuelle";
} elseif ($chiffreAffaires >= 500) {
    echo "Decision : Lancer une promotion sur les reseaux sociaux";
} else {
    echo "Decision : Organiser un evenement en magasin";
}

?>