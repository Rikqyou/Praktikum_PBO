<?php
require_once 'DatabaseConnection.php';

// Menguji instansiasi singleton
$db1 = DatabaseConnection::getInstance()->getConnection();
$db2 = DatabaseConnection::getInstance()->getConnection();

if ($db1 === $db2) {
    echo "Pola Singleton BERHASIL: Kedua objek koneksi identik (menggunakan instance yang sama).<br>";
} else {
    echo "Pola Singleton GAGAL: Objek koneksi berbeda.<br>";
}

echo "Koneksi ke database 'latihan_pdo' via PDO berhasil!";
?>