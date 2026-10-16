<?php
require_once '../Catatan.php';

$catatanBaru = new Catatan();
$catatanBaru->setJudul('Belajar PBO dan PDO');
$catatanBaru->setIsi('Praktikum Pemrograman Berorientasi Objek menghubungkan database menggunakan PDO dan Singleton.');

if ($catatanBaru->save()) {
    echo "Berhasil disimpan ke database!";
} else {
    echo "Gagal menyimpan data.";
}
?>