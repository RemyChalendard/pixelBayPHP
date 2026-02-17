<?php 

const BOUTIQUE = "PixelBay";
$StockBoutique = 500;
$MoyennePrixJeux = 45;

echo 'Boutique : ' . BOUTIQUE . '<br>';
echo "Stock : $StockBoutique jeux<br>";

$jeuxVendu = 125;
$nouveauStock = $StockBoutique - $jeuxVendu;
$chiffreAffaire = $jeuxVendu * $MoyennePrixJeux;

echo "Jeux Vendu : $jeuxVendu<br>";
echo "Nouveau Stock : $nouveauStock<br>";
echo "Chiffre d'affaire : $chiffreAffaire";



?>