<?php
require_once '../Catatan.php';

// Mengambil catatan berdasarkan ID tertentu (misal ID 1)
$catatan = Catatan::getById(1);

if ($catatan) {
    echo "<h2>Detail Catatan (ID: 1)</h2>";
    echo "<strong>Judul:</strong> " . htmlspecialchars($catatan['judul']) . "<br>";
    echo "<strong>Isi:</strong> " . htmlspecialchars($catatan['isi']);
} else {
    echo "Catatan tidak ditemukan.";
}
?>