<?php

function hitungNilaiAkhir($uts, $uas, $tugas) {

    $nilaiAkhir = ($uts * 0.30) +
                  ($uas * 0.40) +
                  ($tugas * 0.30);

    return (float)$nilaiAkhir;
}

$uts = 80;
$uas = 85;
$tugas = 90;

$hasil = hitungNilaiAkhir($uts, $uas, $tugas);

echo "Soal 1: Nilai Akhir\n";
echo "Nilai UTS: $uts\n";
echo "Nilai UAS: $uas\n";
echo "Nilai Tugas: $tugas\n";
echo "Nilai Akhir: $hasil\n";

echo "\nSoal 2: Deret Fibonacci\n";

$a = 0;
$b = 1;

for ($i = 1; $i <= 10; $i++) {
    echo $a . " ";

    $c = $a + $b;
    $a = $b;
    $b = $c;
}

?>