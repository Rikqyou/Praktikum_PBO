<?php
require_once __DIR__ . '/../config/DatabaseConnection.php';

class Product {
    private PDO $db;

    public function __construct() {
        $this->db = DatabaseConnection::getInstance()->getConnection();
    }

    // 1. save() - Tambah data baru
    public function save($name, $price, $stock): bool {
        $stmt = $this->db->prepare("INSERT INTO products (name, price, stock) VALUES (:name, :price, :stock)");
        return $stmt->execute([':name' => $name, ':price' => $price, ':stock' => $stock]);
    }

    // 2. findAll() - Lihat semua data
    public function findAll(): array {
        $stmt = $this->db->query("SELECT * FROM products ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 3. findById($id) - Lihat satu data berdasarkan ID
    public function findById($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 4. update($id) - Ubah data berdasarkan ID
    public function update($id, $name, $price, $stock): bool {
        $stmt = $this->db->prepare("UPDATE products SET name = :name, price = :price, stock = :stock WHERE id = :id");
        return $stmt->execute([':id' => $id, ':name' => $name, ':price' => $price, ':stock' => $stock]);
    }

    // 5. delete($id) - Hapus data berdasarkan ID
    public function delete($id): bool {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}