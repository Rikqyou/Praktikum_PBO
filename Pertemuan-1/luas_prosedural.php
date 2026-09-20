<?php

function hitungLuas($panjang, $lebar) {
    return $panjang * $lebar;
}

$panjang = 10;
$lebar = 5;

$luas = hitungLuas($panjang, $lebar);

echo "Panjang = " . $panjang . "\n";
echo "Lebar = " . $lebar . "\n";
echo "Luas Persegi Panjang = " . $luas;

?>