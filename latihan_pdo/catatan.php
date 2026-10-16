<?php
require_once 'DatabaseConnection.php';

class Catatan {
    private $db;
    private $id;
    private $judul;
    private $isi;

    public function __construct() {
        $this->db = DatabaseConnection::getInstance()->getConnection();
    }

    public function setJudul($judul) {
        $this->judul = $judul;
    }

    public function setIsi($isi) {
        $this->isi = $isi;
    }

    // 1. Operasi CREATE
    public function save() {
        $sql = "INSERT INTO catatan (judul, isi) VALUES (:judul, :isi)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':judul', $this->judul);
        $stmt->bindParam(':isi', $this->isi);
        return $stmt->execute();
    }

    // 2. Operasi READ ALL
    public static function getAll() {
        $db = DatabaseConnection::getInstance()->getConnection();
        $stmt = $db->query("SELECT * FROM catatan ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    // 3. Operasi READ BY ID
    public static function getById($id) {
        $db = DatabaseConnection::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM catatan WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    // 4. Operasi UPDATE
    public function update($id) {
        $sql = "UPDATE catatan SET judul = :judul, isi = :isi WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':judul', $this->judul);
        $stmt->bindParam(':isi', $this->isi);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // 5. Operasi DELETE
    public static function delete($id) {
        $db = DatabaseConnection::getInstance()->getConnection();
        $stmt = $db->prepare("DELETE FROM catatan WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>