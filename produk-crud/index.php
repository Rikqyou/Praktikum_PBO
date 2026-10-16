<?php
require_once 'classes/Product.php';

$productObj = new Product();
$message = '';
$editData = null;

// Hapus Data
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    if ($productObj->delete($_GET['id'])) {
        header("Location: index.php");
        exit;
    }
}

// Ambil Data untuk Edit
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $editData = $productObj->findById($_GET['id']);
}

// Simpan atau Update Data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['name'] ?? '');
    $price = $_POST['price'] ?? 0;
    $stock = $_POST['stock'] ?? 0;
    $id    = $_POST['id'] ?? '';

    if (!empty($name) && $price > 0) {
        if (!empty($id)) {
            if ($productObj->update($id, $name, $price, $stock)) {
                header("Location: index.php");
                exit;
            }
        } else {
            if ($productObj->save($name, $price, $stock)) {
                header("Location: index.php");
                exit;
            }
        }
    } else {
        $message = "Nama produk dan harga wajib diisi dengan benar!";
    }
}

$products = $productObj->findAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Product Management System - CRUD OOP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Sistem Manajemen Produk (CRUD OOP & Singleton)</h2>

        <?php if (!empty($message)): ?>
            <div class="alert"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        <!-- Form Tambah / Edit -->
        <div class="form-card">
            <h3><?= $editData ? 'Edit Data Produk' : 'Tambah Produk Baru' ?></h3>
            <form action="index.php" method="POST">
                <input type="hidden" name="id" value="<?= $editData['id'] ?? '' ?>">
                
                <div class="form-group">
                    <label>Nama Produk:</label>
                    <input type="text" name="name" value="<?= htmlspecialchars($editData['name'] ?? '') ?>" required>
                </div>

                <div class="form-group">
                    <label>Harga (Rp):</label>
                    <input type="number" name="price" value="<?= $editData['price'] ?? '' ?>" required>
                </div>

                <div class="form-group">
                    <label>Stok:</label>
                    <input type="number" name="stock" value="<?= $editData['stock'] ?? '' ?>" required>
                </div>

                <div style="margin-top: 20px;">
                    <button type="submit" class="btn"><?= $editData ? 'Update Produk' : 'Simpan Produk' ?></button>
                    <?php if ($editData): ?>
                        <a href="index.php" class="btn btn-secondary">Batal</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <!-- Tabel Data -->
        <div class="table-card">
            <h3>Daftar Produk</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($products)): ?>
                        <tr><td colspan="5" style="text-align:center;">Belum ada data produk.</td></tr>
                    <?php else: ?>
                        <?php foreach ($products as $p): ?>
                        <tr>
                            <td><?= $p['id'] ?></td>
                            <td><?= htmlspecialchars($p['name']) ?></td>
                            <td>Rp <?= number_format($p['price'], 0, ',', '.') ?></td>
                            <td><?= $p['stock'] ?></td>
                            <td>
                                <a href="index.php?action=edit&id=<?= $p['id'] ?>" class="btn-action btn-edit">Edit</a>
                                <a href="index.php?action=delete&id=<?= $p['id'] ?>" class="btn-action btn-delete" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>