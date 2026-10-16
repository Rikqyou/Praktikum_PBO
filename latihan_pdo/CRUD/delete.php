<?php
require_once '../Catatan.php';

$id = 1; // ID catatan yang ingin dihapus

if (Catatan::delete($id)) {
    echo "Catatan ($id) berhasil dihapus!";
} else {
    echo "Gagal menghapus catatan.";
}
?>