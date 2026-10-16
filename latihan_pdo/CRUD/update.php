<?php
require_once '../Catatan.php';

$id = 1; // ID catatan yang ingin diubah
$catatan = new Catatan();
$catatan->setJudul('Belajar PBO dan PDO (Diperbarui)');
$catatan->setIsi('Praktikum PBO - Materi PDO dan Singleton berhasil diperbarui.');

if ($catatan->update($id)) {
    echo "Catatan ($id) berhasil diperbarui!";
} else {
    echo "Gagal memperbarui catatan.";
}
?>