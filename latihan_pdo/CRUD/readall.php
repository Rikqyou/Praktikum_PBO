<?php
require_once '../Catatan.php';

$daftarCatatan = Catatan::getAll();

echo "<h2>Daftar Catatan (Read All)</h2>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr><th>ID</th><th>Judul</th><th>Isi</th></tr>";

foreach ($daftarCatatan as $catatan) {
    echo "<tr>";
    echo "<td>" . $catatan['id'] . "</td>";
    echo "<td>" . htmlspecialchars($catatan['judul']) . "</td>";
    echo "<td>" . htmlspecialchars($catatan['isi']) . "</td>";
    echo "</tr>";
}

echo "</table>";
?>